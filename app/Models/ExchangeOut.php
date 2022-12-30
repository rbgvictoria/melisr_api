<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $exchangeOutID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $descriptionOfMaterial
 * @property string $exchangeDate
 * @property float $number1
 * @property float $number2
 * @property int $quantityExchanged
 * @property string $remarks
 * @property string $srcGeography
 * @property string $srcTaxonomy
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $sentToOrganizationID
 * @property int $addressOfRecordID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $divisionID
 * @property int $catalogedByID
 * @property string $contents
 * @property string $exchangeOutNumber
 * @property int $deaccessionID
 * @property Agent $catalogedBy
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Division $division
 * @property Agent $sentToOrganization
 * @property Deaccession $deaccession
 * @property AddressOfRecord $addressOfRecord
 * @property ExchangeOutPrep[] $exchangeOutPreps
 * @property ExchangeOutAttachment[] $exchangeOutAttachments
 * @property Shipment[] $shipments
 */
class ExchangeOut extends BaseModel
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
    protected $table = 'exchangeout';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ExchangeOutID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catalogedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CatalogedByID', 'AgentID');
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
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sentToOrganization(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'SentToOrganizationID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deaccession(): BelongsTo
    {
        return $this->belongsTo(Deaccession::class, 'DeaccessionID', 'DeaccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addressOfRecord(): BelongsTo
    {
        return $this->belongsTo(AddressOfRecord::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOutPreps(): HasMany
    {
        return $this->hasMany(ExchangeOutPrep::class, 'ExchangeOutID', 'ExchangeOutID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOutAttachments(): HasMany
    {
        return $this->hasMany(ExchangeOutAttachment::class, 'ExchangeOutID', 'ExchangeOutID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'ExchangeOutID', 'ExchangeOutID');
    }

}
