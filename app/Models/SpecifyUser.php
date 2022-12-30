<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $specifyUserID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $accumMinLoggedIn
 * @property string $eMail
 * @property boolean $isLoggedIn
 * @property boolean $isLoggedInReport
 * @property string $loginCollectionName
 * @property string $loginDisciplineName
 * @property string $loginOutTime
 * @property string $name
 * @property string $password
 * @property string $userType
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent[] $agents
 * @property CollectingEvent[] $collectingEvents
 * @property Spdataset[] $spdatasets
 * @property Spuserrole[] $spuserroles
 * @property Spuserpolicy[] $spuserpolicys
 * @property Attachment[] $attachments
 * @property Taxon[] $taxa
 * @property Locality[] $localities
 * @property CollectionObject[] $collectionObjects
 * @property Spuserexternalid[] $spuserexternalids
 * @property RecordSet[] $recordSets
 */
class SpecifyUser extends BaseModel
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
    protected $table = 'specifyuser';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'SpecifyUserID';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents(): HasMany
    {
        return $this->hasMany(Agent::class, 'SpecifyUserID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEvents(): HasMany
    {
        return $this->hasMany(CollectingEvent::class, 'VisibilitySetByID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spdatasets(): HasMany
    {
        return $this->hasMany(Spdataset::class, 'specifyuser_id', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spuserroles(): HasMany
    {
        return $this->hasMany(Spuserrole::class, 'specifyuser_id', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spuserpolicys(): HasMany
    {
        return $this->hasMany(Spuserpolicy::class, 'specifyuser_id', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class, 'VisibilitySetByID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxa(): HasMany
    {
        return $this->hasMany(Taxon::class, 'VisibilitySetByID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class, 'VisibilitySetByID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'VisibilitySetByID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spuserexternalids(): HasMany
    {
        return $this->hasMany(Spuserexternalid::class, 'specifyuser_id', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recordSets(): HasMany
    {
        return $this->hasMany(RecordSet::class, 'SpecifyUserID', 'SpecifyUserID');
    }

}
