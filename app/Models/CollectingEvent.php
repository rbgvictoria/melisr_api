<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $collectingEventID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $endDate
 * @property int $endDatePrecision
 * @property string $endDateVerbatim
 * @property int $endTime
 * @property string $method
 * @property string $remarks
 * @property string $startDate
 * @property int $startDatePrecision
 * @property string $startDateVerbatim
 * @property int $startTime
 * @property string $stationFieldNumber
 * @property string $verbatimDate
 * @property string $verbatimLocality
 * @property int $visibility
 * @property int $createdByAgentID
 * @property int $collectingTripID
 * @property int $visibilitySetByID
 * @property int $modifiedByAgentID
 * @property int $localityID
 * @property int $collectingEventAttributeID
 * @property int $disciplineID
 * @property int $sGRStatus
 * @property string $gUID
 * @property int $integer1
 * @property int $integer2
 * @property int $reservedInteger3
 * @property int $reservedInteger4
 * @property string $reservedText1
 * @property string $reservedText2
 * @property string $text1
 * @property string $text2
 * @property int $paleoContextID
 * @property string $stationFieldNumberModifier1
 * @property string $stationFieldNumberModifier2
 * @property string $stationFieldNumberModifier3
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $uniqueIdentifier
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property CollectingTrip $collectingTrip
 * @property Agent $createdByAgent
 * @property SpecifyUser $visibilitySetBy
 * @property PaleoContext $paleoContext
 * @property Locality $locality
 * @property CollectingEventAttribute $collectingEventAttribute
 * @property Collector[] $collectors
 * @property CollectingEventAttachment[] $collectingEventAttachments
 * @property CollectingEventAttribute[] $collectingEventAttributes
 * @property CollectingEventAuthorization[] $collectingEventAuthorizations
 * @property CollectionObject[] $collectionObjects
 */
class CollectingEvent extends BaseModel
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
    protected $table = 'collectingevent';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectingEventID';

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
    public function collectingTrip(): BelongsTo
    {
        return $this->belongsTo(CollectingTrip::class, 'CollectingTripID', 'CollectingTripID');
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
    public function visibilitySetBy(): BelongsTo
    {
        return $this->belongsTo(SpecifyUser::class, 'VisibilitySetByID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paleoContext(): BelongsTo
    {
        return $this->belongsTo(PaleoContext::class, 'PaleoContextID', 'PaleoContextID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class, 'LocalityID', 'LocalityID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectingEventAttribute(): BelongsTo
    {
        return $this->belongsTo(CollectingEventAttribute::class, 'CollectingEventAttributeID', 'CollectingEventAttributeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectors(): HasMany
    {
        return $this->hasMany(Collector::class, 'CollectingEventID', 'CollectingEventID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAttachments(): HasMany
    {
        return $this->hasMany(CollectingEventAttachment::class, 'CollectingEventID', 'CollectingEventID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAttributes(): HasMany
    {
        return $this->hasMany(CollectingEventAttribute::class, 'CollectingEventID', 'CollectingEventID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAuthorizations(): HasMany
    {
        return $this->hasMany(CollectingEventAuthorization::class, 'CollectingEventID', 'CollectingEventID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'CollectingEventID', 'CollectingEventID');
    }

}
