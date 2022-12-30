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
 * @property string $catalogFormatNumName
 * @property string $code
 * @property int $collectionId
 * @property string $collectionName
 * @property string $collectionType
 * @property string $dbContentVersion
 * @property string $description
 * @property string $developmentStatus
 * @property int $estimatedSize
 * @property string $gUID
 * @property string $institutionType
 * @property boolean $isEmbeddedCollectingEvent
 * @property string $isaNumber
 * @property string $kingdomCoverage
 * @property string $preservationMethodType
 * @property string $primaryFocus
 * @property string $primaryPurpose
 * @property string $regNumber
 * @property string $remarks
 * @property string $scope
 * @property string $webPortalURI
 * @property string $webSiteURI
 * @property int $disciplineID
 * @property int $institutionNetworkID
 * @property int $adminContactID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Discipline $discipline
 * @property Agent $adminContact
 * @property InstitutionNetwork $institutionNetwork
 * @property Institution $institutionNetwork
 * @property Agent[] $agents
 * @property Agent[] $agents
 * @property CollectionRelType[] $collectionRelTypes
 * @property CollectionRelType[] $collectionRelTypes
 * @property Spdataset[] $spdatasets
 * @property FieldNotebook[] $fieldNotebooks
 * @property Spuserpolicy[] $spuserpolicys
 * @property PickList[] $pickLists
 * @property PrepType[] $prepTypes
 * @property Sprole[] $sproles
 * @property CollectionObject[] $collectionObjects
 */
class Collection extends BaseModel
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
    protected $table = 'collection';

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
    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminContact(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'AdminContactID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institutionNetwork(): BelongsTo
    {
        return $this->belongsTo(InstitutionNetwork::class, 'InstitutionNetworkID', 'InstitutionNetworkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function institutionNetwork(): BelongsTo
    // {
    //     return $this->belongsTo(Institution::class, 'InstitutionNetworkID', 'UserGroupScopeId');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function agents(): HasMany
    // {
    //     return $this->hasMany(Agent::class, 'CollectionCCID', 'UserGroupScopeId');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function agents(): HasMany
    // {
    //     return $this->hasMany(Agent::class, 'CollectionTCID', 'UserGroupScopeId');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function collectionRelTypes(): HasMany
    // {
    //     return $this->hasMany(CollectionRelType::class, 'LeftSideCollectionID', 'UserGroupScopeId');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function collectionRelTypes(): HasMany
    // {
    //     return $this->hasMany(CollectionRelType::class, 'RightSideCollectionID', 'UserGroupScopeId');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spdatasets(): HasMany
    {
        return $this->hasMany(Spdataset::class, 'collection_id', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebooks(): HasMany
    {
        return $this->hasMany(FieldNotebook::class, 'CollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spuserpolicys(): HasMany
    {
        return $this->hasMany(Spuserpolicy::class, 'collection_id', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pickLists(): HasMany
    {
        return $this->hasMany(PickList::class, 'CollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prepTypes(): HasMany
    {
        return $this->hasMany(PrepType::class, 'CollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sproles(): HasMany
    {
        return $this->hasMany(Sprole::class, 'collection_id', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'CollectionID', 'UserGroupScopeId');
    }

}
