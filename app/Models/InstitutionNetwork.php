<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $institutionNetworkID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $altName
 * @property string $code
 * @property string $copyright
 * @property string $description
 * @property string $disclaimer
 * @property string $iconURI
 * @property string $ipr
 * @property string $license
 * @property string $name
 * @property string $remarks
 * @property string $termsOfUse
 * @property string $uri
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $addressID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Address $address
 * @property Agent[] $agents
 * @property Collection[] $collections
 */
class InstitutionNetwork extends BaseModel
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
    protected $table = 'institutionnetwork';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'InstitutionNetworkID';

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
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'AddressID', 'AddressID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents(): HasMany
    {
        return $this->hasMany(Agent::class, 'InstitutionTCID', 'InstitutionNetworkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class, 'InstitutionNetworkID', 'InstitutionNetworkID');
    }

}
