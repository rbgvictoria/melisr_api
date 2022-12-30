<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $userGroupScopeId
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property string $abbrev
 * @property string $altName
 * @property string $description
 * @property string $disciplineType
 * @property int $divisionId
 * @property string $iconURI
 * @property string $name
 * @property string $regNumber
 * @property string $remarks
 * @property string $uri
 * @property int $institutionID
 * @property int $addressID
 * @property Institution $institution
 * @property Address $address
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent[] $agents
 * @property Collector[] $collectors
 * @property Accession[] $accessions
 * @property ConservDescription[] $conservDescriptions
 * @property Discipline[] $disciplines
 * @property GroupPerson[] $groupPersons
 * @property RepositoryAgreement[] $repositoryAgreements
 * @property ExchangeOut[] $exchangeOuts
 * @property Gift[] $gifts
 * @property TreatmentEvent[] $treatmentEvents
 * @property Loan[] $loans
 * @property ExchangeIn[] $exchangeIns
 */
class Division extends BaseModel
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
    protected $table = 'division';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'UserGroupScopeId';

    /**
     * @var array
     */
    protected $guarded = [];

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
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'AddressID', 'AddressID');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents(): HasMany
    {
        return $this->hasMany(Agent::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectors(): HasMany
    {
        return $this->hasMany(Collector::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessions(): HasMany
    {
        return $this->hasMany(Accession::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservDescriptions(): HasMany
    {
        return $this->hasMany(ConservDescription::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disciplines(): HasMany
    {
        return $this->hasMany(Discipline::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groupPersons(): HasMany
    {
        return $this->hasMany(GroupPerson::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function repositoryAgreements(): HasMany
    {
        return $this->hasMany(RepositoryAgreement::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOuts(): HasMany
    {
        return $this->hasMany(ExchangeOut::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gifts(): HasMany
    {
        return $this->hasMany(Gift::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentEvents(): HasMany
    {
        return $this->hasMany(TreatmentEvent::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeIns(): HasMany
    {
        return $this->hasMany(ExchangeIn::class, 'DivisionID', 'UserGroupScopeId');
    }

}
