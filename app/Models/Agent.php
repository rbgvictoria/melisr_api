<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $agentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $abbreviation
 * @property int $agentType
 * @property string $dateOfBirth
 * @property int $dateOfBirthPrecision
 * @property string $dateOfDeath
 * @property int $dateOfDeathPrecision
 * @property string $email
 * @property string $firstName
 * @property string $gUID
 * @property string $initials
 * @property string $interests
 * @property string $jobTitle
 * @property string $lastName
 * @property string $middleInitial
 * @property string $remarks
 * @property string $title
 * @property int $dateType
 * @property string $uRL
 * @property int $modifiedByAgentID
 * @property int $institutionTCID
 * @property int $collectionCCID
 * @property int $parentOrganizationID
 * @property int $divisionID
 * @property int $specifyUserID
 * @property int $institutionCCID
 * @property int $collectionTCID
 * @property int $createdByAgentID
 * @property string $suffix
 * @property string $date1
 * @property int $date1Precision
 * @property string $date2
 * @property int $date2Precision
 * @property int $integer1
 * @property int $integer2
 * @property string $text1
 * @property string $text2
 * @property string $verbatimDate1
 * @property string $verbatimDate2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property Collection $collectionCC
 * @property Collection $collectionTC
 * @property SpecifyUser $specifyUser
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $parentOrganization
 * @property Institution $institutionCC
 * @property Institution $institutionTC
 * @property Division $division
 * @property AgentAttachment[] $agentAttachments
 * @property AgentGeography[] $agentGeographies
 * @property AgentSpecialty[] $agentSpecialties
 * @property AgentVariant[] $agentVariants
 */
class Agent extends BaseModel
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
    protected $table = 'agent';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AgentID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectionCC(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'CollectionCCID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectionTC(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'CollectionTCID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specifyUser(): BelongsTo
    {
        return $this->belongsTo(SpecifyUser::class, 'SpecifyUserID', 'SpecifyUserID');
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
    public function parentOrganization(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ParentOrganizationID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institutionCC(): BelongsTo
    {
        return $this->belongsTo(Institution::class, 'InstitutionCCID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institutionTC(): BelongsTo
    {
        return $this->belongsTo(Institution::class, 'InstitutionTCID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentAttachments(): HasMany
    {
        return $this->hasMany(AgentAttachment::class, 'AgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentGeographies(): HasMany
    {
        return $this->hasMany(AgentGeography::class, 'AgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentSpecialties(): HasMany
    {
        return $this->hasMany(AgentSpecialty::class, 'AgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentVariants(): HasMany
    {
        return $this->hasMany(AgentVariant::class, 'AgentID', 'AgentID');
    }

}
