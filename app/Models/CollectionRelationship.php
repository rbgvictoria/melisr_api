<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $collectionRelationshipID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $text1
 * @property string $text2
 * @property int $modifiedByAgentID
 * @property int $collectionRelTypeID
 * @property int $leftSideCollectionID
 * @property int $rightSideCollectionID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property CollectionRelType $collectionRelType
 * @property Agent $createdByAgent
 * @property CollectionObject $leftSideCollection
 * @property CollectionObject $rightSideCollection
 */
class CollectionRelationship extends BaseModel
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
    protected $table = 'collectionrelationship';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectionRelationshipID';

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
    public function collectionRelType(): BelongsTo
    {
        return $this->belongsTo(CollectionRelType::class, 'CollectionRelTypeID', 'CollectionRelTypeID');
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
        return $this->belongsTo(CollectionObject::class, 'LeftSideCollectionID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rightSideCollection(): BelongsTo
    {
        return $this->belongsTo(CollectionObject::class, 'RightSideCollectionID', 'CollectionObjectID');
    }


}
