<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $collectingTripID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $collectingtripname
 * @property string $endDate
 * @property string $endDateVerbatim
 * @property int $endTime
 * @property string $remarks
 * @property string $sponsor
 * @property string $startDate
 * @property string $startDateVerbatim
 * @property int $startTime
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $disciplineID
 * @property int $endDatePrecision
 * @property int $number1
 * @property int $number2
 * @property int $startDatePrecision
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property string $cruise
 * @property string $expedition
 * @property string $vessel
 * @property string $date1
 * @property int $date1Precision
 * @property string $date2
 * @property int $date2Precision
 * @property string $text5
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $text9
 * @property int $agent2ID
 * @property int $collectingTripAttributeID
 * @property int $agent1ID
 * @property CollectingTripAttribute $collectingTripAttribute
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $agent1
 * @property Agent $agent2
 * @property CollectingTripAuthorization[] $collectingTripAuthorizations
 * @property CollectingEvent[] $collectingEvents
 * @property CollectingTripAttachment[] $collectingTripAttachments
 */
class CollectingTrip extends BaseModel
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
    protected $table = 'collectingtrip';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectingTripID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectingTripAttribute(): BelongsTo
    {
        return $this->belongsTo(CollectingTripAttribute::class, 'CollectingTripAttributeID', 'CollectingTripAttributeID');
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingTripAuthorizations(): HasMany
    {
        return $this->hasMany(CollectingTripAuthorization::class, 'CollectingTripID', 'CollectingTripID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEvents(): HasMany
    {
        return $this->hasMany(CollectingEvent::class, 'CollectingTripID', 'CollectingTripID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingTripAttachments(): HasMany
    {
        return $this->hasMany(CollectingTripAttachment::class, 'CollectingTripID', 'CollectingTripID');
    }

}
