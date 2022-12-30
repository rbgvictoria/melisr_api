<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $shipmentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $insuredForAmount
 * @property float $number1
 * @property float $number2
 * @property int $numberOfPackages
 * @property string $remarks
 * @property string $shipmentDate
 * @property string $shipmentMethod
 * @property string $shipmentNumber
 * @property string $text1
 * @property string $text2
 * @property string $weight
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $borrowID
 * @property int $shipperID
 * @property int $loanID
 * @property int $shippedToID
 * @property int $disciplineID
 * @property int $shippedByID
 * @property int $giftID
 * @property int $exchangeOutID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Gift $gift
 * @property Loan $loan
 * @property ExchangeOut $exchangeOut
 * @property Agent $shippedBy
 * @property Agent $shippedTo
 * @property Agent $shipper
 * @property Borrow $borrow
 */
class Shipment extends BaseModel
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
    protected $table = 'shipment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ShipmentID';

    /**
     * @var array
     */
    protected $guarded = [];

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
    public function gift(): BelongsTo
    {
        return $this->belongsTo(Gift::class, 'GiftID', 'GiftID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'LoanID', 'LoanID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exchangeOut(): BelongsTo
    {
        return $this->belongsTo(ExchangeOut::class, 'ExchangeOutID', 'ExchangeOutID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ShippedByID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippedTo(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ShippedToID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipper(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ShipperID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function borrow(): BelongsTo
    {
        return $this->belongsTo(Borrow::class, 'BorrowID', 'BorrowID');
    }


}
