<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $addressID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $address
 * @property string $address2
 * @property string $address3
 * @property string $address4
 * @property string $address5
 * @property string $city
 * @property string $country
 * @property string $endDate
 * @property string $fax
 * @property boolean $isCurrent
 * @property boolean $isPrimary
 * @property boolean $isShipping
 * @property int $ordinal
 * @property string $phone1
 * @property string $phone2
 * @property string $positionHeld
 * @property string $postalCode
 * @property string $remarks
 * @property string $roomOrBuilding
 * @property string $startDate
 * @property string $state
 * @property string $typeOfAddr
 * @property int $modifiedByAgentID
 * @property int $agentID
 * @property int $createdByAgentID
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Division[] $divisions
 * @property Institution[] $institutions
 * @property InstitutionNetwork[] $institutionNetworks
 */
class Address extends BaseModel
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
    protected $table = 'address';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AddressID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'AgentID', 'AgentID');
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
    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class, 'AddressID', 'AddressID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function institutions(): HasMany
    {
        return $this->hasMany(Institution::class, 'AddressID', 'AddressID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function institutionNetworks(): HasMany
    {
        return $this->hasMany(InstitutionNetwork::class, 'AddressID', 'AddressID');
    }

}
