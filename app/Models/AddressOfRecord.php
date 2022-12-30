<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $addressOfRecordID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $address
 * @property string $address2
 * @property string $city
 * @property string $country
 * @property string $postalCode
 * @property string $remarks
 * @property string $state
 * @property int $createdByAgentID
 * @property int $agentID
 * @property int $modifiedByAgentID
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Borrow[] $borrows
 * @property Accession[] $accessions
 * @property RepositoryAgreement[] $repositoryAgreements
 * @property ExchangeOut[] $exchangeOuts
 * @property Gift[] $gifts
 * @property Loan[] $loans
 * @property ExchangeIn[] $exchangeIns
 */
class AddressOfRecord extends BaseModel
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
    protected $table = 'addressofrecord';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AddressOfRecordID';

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
    public function borrows(): HasMany
    {
        return $this->hasMany(Borrow::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessions(): HasMany
    {
        return $this->hasMany(Accession::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function repositoryAgreements(): HasMany
    {
        return $this->hasMany(RepositoryAgreement::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOuts(): HasMany
    {
        return $this->hasMany(ExchangeOut::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gifts(): HasMany
    {
        return $this->hasMany(Gift::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeIns(): HasMany
    {
        return $this->hasMany(ExchangeIn::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

}
