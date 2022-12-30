<?php
/**
 * Copyright 2022 Royal Botanic Gardens Victoria
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class GenerateModelService {

    /**
     * @var String
     */
    protected $schema;

    /**
     * @var String
     */
    protected $table;

    /**
     * @var String
     */
    protected $types;

    /**
     * @var String
     */
    protected $type;

    /**
     * @var String[]
     */
    protected $excludeTables;

    /**
     * @var \Illuminate\Database\Connection
     */
    protected $conn;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $columns;

    protected $primaryKey;

    protected $properties = [];

    protected $keyColumnUsages;
    protected $keyColumnUsagesReferencedMany;

    protected $belongsTos = [];
    protected $hasManies = [];

    protected $tableRelationshipTypes = [];

    public function __construct($schema, $table)
    {
        $this->table = $table;
        $this->schema = $schema;
        $this->types = config('melisr-api.types');
        $this->type = $this->types[$table];
        $this->excludeTables = config('melisr-api.exclude_tables');
        $this->conn = DB::connection('information_schema');
        $this->columns = $this->getColumns();
        $this->getPrimaryKeyColumn();
        $this->getPrimaryKeyColumn();
        $this->getProperties();
        $this->keyColumnUsages = $this->getKeyColumnUsages();
        if ($this->keyColumnUsages && $this->keyColumnUsages->count()) {
            $this->getBelongsTos();
        }
        $this->keyColumnUsagesReferencedMany = $this->getKeyColumnUsagesReferencedMany();
        if ($this->keyColumnUsagesReferencedMany) {
            $this->getHasManies();
        }
        $this->keyColumnUsagesReferencedOne = $this->getKeyColumnUsagesReferencedOne();
        if ($this->keyColumnUsagesReferencedOne) {
            $this->getHasOnes();
        }
        $this->otherRelationships();
        file_put_contents(app_path('Models/' . $this->type . '.php'), $this->generateModel());
    }

    protected function getColumns()
    {
        return $this->conn->table('COLUMNS')
                ->where('TABLE_SCHEMA', $this->schema)
                ->where('TABLE_NAME', $this->table)
                ->select('column_name', 'is_nullable', 'data_type', 'column_type', 'column_key')
                ->get();
    }

    protected function getKeyColumnUsages()
    {
        $result = $this->conn->table('KEY_COLUMN_USAGE')
                ->where('table_schema', $this->schema)
                ->where('table_name', $this->table)
                ->whereNotNull('referenced_table_name')
                ->select('constraint_name', 'table_name', 'column_name', 'referenced_table_name', 'referenced_column_name')
                ->get();

        switch ($this->type) {
            case 'Agent':
                return $result->filter(function($item, $key) {
                    return isset($this->types[$item->referenced_table_name])
                        && $item->referenced_table_name != 'institutionnetwork';
                });
            default:
                return $result->filter(function($item, $key) {
                    return isset($this->types[$item->referenced_table_name]);
                });
        }
    }

    protected function getKeyColumnUsagesReferencedMany()
    {
        $result = $this->conn->select("select constraint_name, table_name, column_name, referenced_table_name, referenced_column_name
                from KEY_COLUMN_USAGE
                where TABLE_SCHEMA='melisr'
                    and referenced_table_name='$this->table'
                    and !((REFERENCED_TABLE_NAME='locality' and table_name in ('geocoorddetail', 'localitydetail')) or (REFERENCED_TABLE_NAME in (select table_name from TABLES where substring(table_name, -9)='attribute')));");

        switch ($this->type) {
            case 'Agent':
                return collect($result)->filter(function($item, $key) {
                    return isset($this->types[$item->table_name])
                        && in_array($item->table_name, ['agentgeography', 'agentspecialty', 'agentvariant', 'agentattachment'])
                        && !in_array($item->column_name, ['ModifiedByAgentID', 'CreatedByAgentID']);
                });
            case 'Taxon':
                return collect($result)->filter(function($item, $key) {
                    return isset($this->types[$item->table_name])
                        && $item->column_name != 'PreferredTaxonID';
                });
            default:
                return collect($result)->filter(function($item, $key) {
                    return isset($this->types[$item->table_name]);
                });
        }
    }

    protected function getKeyColumnUsagesReferencedOne()
    {
        return $this->conn->select("select constraint_name, table_name, column_name, referenced_table_name, referenced_column_name
                from KEY_COLUMN_USAGE
                where TABLE_SCHEMA='melisr'
                    and referenced_table_name='$this->table'
                    and ((REFERENCED_TABLE_NAME='locality' and table_name in ('geocoorddetail', 'localitydetail')) or (REFERENCED_TABLE_NAME in (select table_name from TABLES where substring(table_name, -9)='attribute')));");
    }

    protected function getPrimaryKeyColumn()
    {
        $this->primaryKey = $this->columns->filter(function($column, $key) {
            return $column->column_key == 'PRI';
        })[0]->column_name;
    }

    protected function getProperties()
    {
        $map = config('melisr-api.data_type_mapping_orm');

        foreach ($this->columns as $col) {
            $this->properties[] = ' * @property ' . $map[$col->data_type] . ' $' . Str::camel($col->column_name);
        }
    }

    protected function getBelongsTos()
    {
        $this->tableRelationshipTypes[] = "use Illuminate\Database\Eloquent\Relations\BelongsTo;";
        $map = config('melisr-api.data_type_mapping_orm');
        foreach ($this->keyColumnUsages as $use) {
            $type = $this->types[$use->referenced_table_name];
            $property = Str::camel(substr($use->column_name, 0, strlen($use->column_name)-2));
            $foreignKey = $use->column_name;
            $ownerKey = $use->referenced_column_name;

            $this->properties[] = ' * @property ' . $type . ' $' . $property;

            $this->belongsTos[] = <<<EOT
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function $property(): BelongsTo
    {
        return \$this->belongsTo($type::class, '$foreignKey', '$ownerKey');
    }

EOT;
        }
    }

    protected function getHasManies()
    {
        $this->tableRelationshipTypes[] = "use Illuminate\Database\Eloquent\Relations\HasMany;";
        $map = config('melisr-api.data_type_mapping_orm');
        foreach ($this->keyColumnUsagesReferencedMany as $use) {
            $type = $this->types[$use->table_name];
            $property = Str::camel($type) . 's';
            $plurals = [
                'Taxon' => 'taxa',
                'Geography' => 'geographies',
                'Locality' => 'localities',
                'AgentGeography' => 'agentGeographies',
                'AgentSpecialty' => 'agentSpecialties',
                'CollectionObjectProperty' => 'collectionObjectProperties',
                'PreparationProperty' => 'preparationProperties'
            ];
            if (isset($plurals[$type])) {
                $property = Str::camel($plurals[$type]);
            }

            $foreignKey = $use->column_name;
            $ownerKey = $use->referenced_column_name;

            if ($this->type == 'CollectionObject' && $property == 'collectionRelationships') {
                $property = Str::camel(substr($foreignKey, 0, strlen($foreignKey)-2) . 's');
            }

            $this->properties[] = ' * @property ' . $type . '[] $' . $property;

            $this->hasManies[] = <<<EOT
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function $property(): HasMany
    {
        return \$this->hasMany($type::class, '$foreignKey', '$ownerKey');
    }

EOT;
        }
    }

    protected function getHasOnes()
    {
        $this->tableRelationshipTypes[] = "use Illuminate\Database\Eloquent\Relations\HasOne;";
        $map = config('melisr-api.data_type_mapping_orm');
        foreach ($this->keyColumnUsagesReferencedOne as $use) {
            $type = $this->types[$use->table_name];
            $property = Str::camel($type);
            $foreignKey = $use->column_name;
            $ownerKey = $use->referenced_column_name;

            $this->properties[] = ' * @property ' . $type . ' $' . $property;

            $this->hasManies[] = <<<EOT
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function $property(): HasOne
    {
        return \$this->hasOne($type::class, '$foreignKey', '$ownerKey');
    }

EOT;
        }
    }

    protected function otherRelationships()
    {
        switch ($this->type) {
            case 'CollectionObject':
                $this->tableRelationshipTypes[] = "use Illuminate\Database\Eloquent\Relations\BelongsToMany;";
                $this->properties[] = " * @property Project[] \$projects";
                $this->belongsTos[] = <<<EOT
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return \$this->belongsToMany(Project::class, 'project_colobj', 'CollectionObjectID', 'ProjectID');
    }

EOT;
                break;

            case 'Project':
                $this->tableRelationshipTypes[] = "use Illuminate\Database\Eloquent\Relations\BelongsToMany;";
                $this->properties[] = " * @property CollectionObject[] \$collectionObjects";
                $this->belongsTos[] = <<<EOT
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function collectionObjects(): BelongsToMany
    {
        return \$this->belongsToMany(CollectionObject::class, 'project_colobj', 'ProjectID', 'CollectionObjectID');
    }

EOT;
                break;

            case 'Taxon':
                $this->properties[] = " * @property Taxon[] \$children";
                $this->belongsTos[] = <<<EOT
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return \$this->hasMany(Taxon::class, 'ParentID', 'TaxonID');
    }

EOT;
                break;

            default:
                break;
        }
    }

    protected function generateModel() {
        $tableRelationshipTypes = implode("\n", $this->tableRelationshipTypes);
        $properties = implode("\n", $this->properties);
        $belongsTo = implode("\n", $this->belongsTos);
        $hasMany = implode("\n", $this->hasManies);

        $doc = <<<EOT
<?php

namespace App\Models;

use App\Models\BaseModel;
$tableRelationshipTypes

/**
$properties
 */
class $this->type extends BaseModel
{
    const CREATED_AT = 'TimestampCreated';
    const UPDATED_AT = 'TimestampModified';

    /**
     * The database connection for the model
     *
     * @var string
     */
    protected \$connection = 'specify_db';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected \$table = '$this->table';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected \$primaryKey = '$this->primaryKey';

    /**
     * @var array
     */
    protected \$guarded = [];

$belongsTo
$hasMany
}

EOT;
        return $doc;
    }
}
