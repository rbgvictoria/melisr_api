<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $pickListID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $fieldName
 * @property string $filterFieldName
 * @property string $filterValue
 * @property string $formatter
 * @property boolean $isSystem
 * @property string $name
 * @property boolean $readOnly
 * @property int $sizeLimit
 * @property int $sortType
 * @property string $tableName
 * @property int $type
 * @property int $modifiedByAgentID
 * @property int $collectionID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Collection $collection
 * @property PickListItem[] $pickListItems
 */
class PickList extends BaseModel
{
    const CREATED_AT = 'TimestampCreated';
    const UPDATED_AT = 'TimestampModified';

    /**
     * The database connection for the model
     *
     * @var string
     */
    protected $connection = 'specify_db';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picklist';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'PickListID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modifiedByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ModifiedByAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CreatedByAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'CollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pickListItems(): HasMany
    {
        return $this->hasMany(PickListItem::class, 'PickListID', 'PickListID');
    }

}
