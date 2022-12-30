<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $giftID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $dateReceived
 * @property string $giftDate
 * @property string $giftNumber
 * @property boolean $isFinancialResponsibility
 * @property float $number1
 * @property float $number2
 * @property string $purposeOfGift
 * @property string $receivedComments
 * @property string $remarks
 * @property string $specialConditions
 * @property string $srcGeography
 * @property string $srcTaxonomy
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $divisionID
 * @property int $modifiedByAgentID
 * @property int $disciplineID
 * @property int $createdByAgentID
 * @property int $addressOfRecordID
 * @property string $contents
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property string $date1
 * @property int $date1Precision
 * @property string $status
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property int $deaccessionID
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Division $division
 * @property Deaccession $deaccession
 * @property AddressOfRecord $addressOfRecord
 * @property GiftAgent[] $giftAgents
 * @property GiftPreparation[] $giftPreparations
 * @property Shipment[] $shipments
 */
class Gift extends BaseModel
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
    protected $table = 'gift';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GiftID';

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
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'DivisionID', 'UserGroupScopeId');
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
    public function giftAgents(): HasMany
    {
        return $this->hasMany(GiftAgent::class, 'GiftID', 'GiftID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function giftPreparations(): HasMany
    {
        return $this->hasMany(GiftPreparation::class, 'GiftID', 'GiftID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'GiftID', 'GiftID');
    }

}
