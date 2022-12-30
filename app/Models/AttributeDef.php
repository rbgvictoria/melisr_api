<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $attributeDefID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $dataType
 * @property string $fieldName
 * @property int $tableType
 * @property int $modifiedByAgentID
 * @property int $prepTypeID
 * @property int $createdByAgentID
 * @property int $disciplineID
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property PrepType $prepType
 * @property Agent $createdByAgent
 * @property CollectingEventAttribute[] $collectingEventAttributes
 * @property CollectionObjectAttr[] $collectionObjectAttrs
 * @property PreparationAttr[] $preparationAttrs
 */
class AttributeDef extends BaseModel
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
    protected $table = 'attributedef';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AttributeDefID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'DisciplineID', 'UserGroupScopeId');
    }

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
    public function prepType(): BelongsTo
    {
        return $this->belongsTo(PrepType::class, 'PrepTypeID', 'PrepTypeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CreatedByAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAttributes(): HasMany
    {
        return $this->hasMany(CollectingEventAttribute::class, 'AttributeDefID', 'AttributeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjectAttrs(): HasMany
    {
        return $this->hasMany(CollectionObjectAttr::class, 'AttributeDefID', 'AttributeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preparationAttrs(): HasMany
    {
        return $this->hasMany(PreparationAttr::class, 'AttributeDefID', 'AttributeDefID');
    }

}
