<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $otherIdentifierID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $identifier
 * @property string $institution
 * @property string $remarks
 * @property int $createdByAgentID
 * @property int $collectionObjectID
 * @property int $modifiedByAgentID
 * @property string $date1
 * @property int $date1Precision
 * @property string $date2
 * @property int $date2Precision
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property int $agent2ID
 * @property int $agent1ID
 * @property Agent $modifiedByAgent
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 * @property Agent $agent1
 * @property Agent $agent2
 */
class OtherIdentifier extends BaseModel
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
    protected $table = 'otheridentifier';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'OtherIdentifierID';

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent1(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent1ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent2(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent2ID', 'AgentID');
    }


}
