<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $permitID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $endDate
 * @property string $issuedDate
 * @property float $number1
 * @property float $number2
 * @property string $permitNumber
 * @property string $remarks
 * @property string $renewalDate
 * @property string $startDate
 * @property string $text1
 * @property string $text2
 * @property string $type
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $issuedByID
 * @property int $issuedToID
 * @property int $institutionID
 * @property string $copyright
 * @property boolean $isAvailable
 * @property boolean $isRequired
 * @property string $permitText
 * @property int $reservedInteger1
 * @property int $reservedInteger2
 * @property string $reservedText3
 * @property string $reservedText4
 * @property string $status
 * @property string $statusQualifier
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Institution $institution
 * @property Agent $issuedBy
 * @property Agent $issuedTo
 * @property AccessionAuthorization[] $accessionAuthorizations
 * @property CollectingTripAuthorization[] $collectingTripAuthorizations
 * @property CollectingEventAuthorization[] $collectingEventAuthorizations
 * @property PermitAttachment[] $permitAttachments
 */
class Permit extends BaseModel
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
    protected $table = 'permit';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'PermitID';

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
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class, 'InstitutionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issuedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'IssuedByID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issuedTo(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'IssuedToID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessionAuthorizations(): HasMany
    {
        return $this->hasMany(AccessionAuthorization::class, 'PermitID', 'PermitID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingTripAuthorizations(): HasMany
    {
        return $this->hasMany(CollectingTripAuthorization::class, 'PermitID', 'PermitID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAuthorizations(): HasMany
    {
        return $this->hasMany(CollectingEventAuthorization::class, 'PermitID', 'PermitID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permitAttachments(): HasMany
    {
        return $this->hasMany(PermitAttachment::class, 'PermitID', 'PermitID');
    }

}
