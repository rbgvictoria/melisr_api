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
 * @property string $altName
 * @property string $code
 * @property string $copyright
 * @property string $description
 * @property string $disclaimer
 * @property boolean $hasBeenAsked
 * @property string $iconURI
 * @property int $institutionId
 * @property string $ipr
 * @property boolean $isAccessionsGlobal
 * @property boolean $isAnonymous
 * @property boolean $isSecurityOn
 * @property boolean $isServerBased
 * @property boolean $isSharingLocalities
 * @property boolean $isSingleGeographyTree
 * @property string $license
 * @property string $lsidAuthority
 * @property string $name
 * @property string $regNumber
 * @property string $remarks
 * @property string $termsOfUse
 * @property string $uri
 * @property int $storageTreeDefID
 * @property int $addressID
 * @property string $currentManagedRelVersion
 * @property string $currentManagedSchemaVersion
 * @property boolean $isReleaseManagedGlobally
 * @property int $minimumPwdLength
 * @property string $gUID
 * @property StorageTreeDef $storageTreeDef
 * @property Address $address
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent[] $agents
 * @property Agent[] $agents
 * @property Collection[] $collections
 * @property Division[] $divisions
 * @property Journal[] $journals
 * @property ReferenceWork[] $referenceWorks
 * @property Permit[] $permits
 */
class Institution extends BaseModel
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
    protected $table = 'institution';

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
    public function storageTreeDef(): BelongsTo
    {
        return $this->belongsTo(StorageTreeDef::class, 'StorageTreeDefID', 'StorageTreeDefID');
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
    public function contentContact(): HasMany
    {
        return $this->hasMany(Agent::class, 'InstitutionCCID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function technicalContacts(): HasMany
    {
        return $this->hasMany(Agent::class, 'InstitutionTCID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class, 'InstitutionNetworkID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class, 'InstitutionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journals(): HasMany
    {
        return $this->hasMany(Journal::class, 'InstitutionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referenceWorks(): HasMany
    {
        return $this->hasMany(ReferenceWork::class, 'InstitutionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permits(): HasMany
    {
        return $this->hasMany(Permit::class, 'InstitutionID', 'UserGroupScopeId');
    }

}
