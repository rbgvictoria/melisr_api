<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $borrowID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $currentDueDate
 * @property string $dateClosed
 * @property string $invoiceNumber
 * @property boolean $isClosed
 * @property boolean $isFinancialResponsibility
 * @property float $number1
 * @property float $number2
 * @property string $originalDueDate
 * @property string $receivedDate
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $modifiedByAgentID
 * @property int $addressOfRecordID
 * @property int $createdByAgentID
 * @property string $borrowDate
 * @property int $borrowDatePrecision
 * @property int $numberOfItemsBorrowed
 * @property string $status
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property AddressOfRecord $addressOfRecord
 * @property BorrowAgent[] $borrowAgents
 * @property BorrowMaterial[] $borrowMaterials
 * @property Shipment[] $shipments
 */
class Borrow extends BaseModel
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
    protected $table = 'borrow';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'BorrowID';

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
    public function addressOfRecord(): BelongsTo
    {
        return $this->belongsTo(AddressOfRecord::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrowAgents(): HasMany
    {
        return $this->hasMany(BorrowAgent::class, 'BorrowID', 'BorrowID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrowMaterials(): HasMany
    {
        return $this->hasMany(BorrowMaterial::class, 'BorrowID', 'BorrowID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'BorrowID', 'BorrowID');
    }

}
