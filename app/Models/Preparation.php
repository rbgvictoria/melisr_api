<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $preparationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property int $countAmt
 * @property string $description
 * @property float $number1
 * @property float $number2
 * @property string $preparedDate
 * @property int $preparedDatePrecision
 * @property string $remarks
 * @property string $sampleNumber
 * @property string $status
 * @property string $storageLocation
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property int $createdByAgentID
 * @property int $storageID
 * @property int $collectionObjectID
 * @property int $preparedByID
 * @property int $prepTypeID
 * @property int $modifiedByAgentID
 * @property int $preparationAttributeID
 * @property int $integer1
 * @property int $integer2
 * @property int $reservedInteger3
 * @property int $reservedInteger4
 * @property string $gUID
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property string $date1
 * @property int $date1Precision
 * @property string $date2
 * @property int $date2Precision
 * @property string $date3
 * @property int $date3Precision
 * @property string $date4
 * @property int $date4Precision
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $text9
 * @property int $alternateStorageID
 * @property string $barCode
 * @property string $text10
 * @property string $text11
 * @property string $text12
 * @property string $text13
 * @property PreparationAttribute $preparationAttribute
 * @property Agent $modifiedByAgent
 * @property PrepType $prepType
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 * @property Storage $storage
 * @property Storage $alternateStorage
 * @property Agent $preparedBy
 * @property ConservDescription[] $conservDescriptions
 * @property ExchangeInPrep[] $exchangeInPreps
 * @property ExchangeOutPrep[] $exchangeOutPreps
 * @property GiftPreparation[] $giftPreparations
 * @property PreparationProperty[] $preparationProperties
 * @property MaterialSample[] $materialSamples
 * @property LoanPreparation[] $loanPreparations
 * @property PreparationAttachment[] $preparationAttachments
 * @property PreparationAttr[] $preparationAttrs
 * @property DisposalPreparation[] $disposalPreparations
 */
class Preparation extends BaseModel
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
    protected $table = 'preparation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'PreparationID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preparationAttribute(): BelongsTo
    {
        return $this->belongsTo(PreparationAttribute::class, 'PreparationAttributeID', 'PreparationAttributeID');
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
    public function prepType(): BelongsTo
    {
        return $this->belongsTo(PrepType::class, 'PrepTypeID', 'PrepTypeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectionObject(): BelongsTo
    {
        return $this->belongsTo(CollectionObject::class, 'CollectionObjectID', 'CollectionObjectID');
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
    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class, 'StorageID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alternateStorage(): BelongsTo
    {
        return $this->belongsTo(Storage::class, 'AlternateStorageID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preparedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'PreparedByID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservDescriptions(): HasMany
    {
        return $this->hasMany(ConservDescription::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeInPreps(): HasMany
    {
        return $this->hasMany(ExchangeInPrep::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOutPreps(): HasMany
    {
        return $this->hasMany(ExchangeOutPrep::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function giftPreparations(): HasMany
    {
        return $this->hasMany(GiftPreparation::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preparationProperties(): HasMany
    {
        return $this->hasMany(PreparationProperty::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialSamples(): HasMany
    {
        return $this->hasMany(MaterialSample::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanPreparations(): HasMany
    {
        return $this->hasMany(LoanPreparation::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preparationAttachments(): HasMany
    {
        return $this->hasMany(PreparationAttachment::class, 'PreparationID', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preparationAttrs(): HasMany
    {
        return $this->hasMany(PreparationAttr::class, 'PreparationId', 'PreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disposalPreparations(): HasMany
    {
        return $this->hasMany(DisposalPreparation::class, 'PreparationID', 'PreparationID');
    }

}
