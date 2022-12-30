<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $collectionObjectCitationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property boolean $isFigured
 * @property string $remarks
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $collectionObjectID
 * @property int $referenceWorkID
 * @property string $figureNumber
 * @property string $pageNumber
 * @property string $plateNumber
 * @property Agent $modifiedByAgent
 * @property ReferenceWork $referenceWork
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 */
class CollectionObjectCitation extends BaseModel
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
    protected $table = 'collectionobjectcitation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectionObjectCitationID';

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
    public function referenceWork(): BelongsTo
    {
        return $this->belongsTo(ReferenceWork::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectionObject(): BelongsTo
    {
        return $this->belongsTo(CollectionObject::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CreatedByAgentID', 'AgentID');
    }


}
