<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $collectionRelTypeID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $name
 * @property string $remarks
 * @property int $rightSideCollectionID
 * @property int $modifiedByAgentID
 * @property int $leftSideCollectionID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Collection $leftSideCollection
 * @property Collection $rightSideCollection
 * @property CollectionRelationship[] $collectionRelationships
 */
class CollectionRelType extends BaseModel
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
    protected $table = 'collectionreltype';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectionRelTypeID';

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
    public function leftSideCollection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'LeftSideCollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rightSideCollection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'RightSideCollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionRelationships(): HasMany
    {
        return $this->hasMany(CollectionRelationship::class, 'CollectionRelTypeID', 'CollectionRelTypeID');
    }

}
