<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $materialSampleID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property float $gGBNAbsorbanceRatio260230
 * @property float $gGBNAbsorbanceRatio260280
 * @property string $gGBNRAbsorbanceRatioMethod
 * @property float $gGBNConcentration
 * @property string $gGBNConcentrationUnit
 * @property string $gGBNMaterialSampleType
 * @property string $gGBNMedium
 * @property string $gGBNPurificationMethod
 * @property string $gGBNQuality
 * @property string $gGBNQualityCheckDate
 * @property string $gGBNQualityRemarks
 * @property string $gGBNSampleDesignation
 * @property float $gGBNSampleSize
 * @property float $gGBNVolume
 * @property string $gGBNVolumeUnit
 * @property float $gGBNWeight
 * @property string $gGBNWeightMethod
 * @property string $gGBNWeightUnit
 * @property string $gUID
 * @property int $integer1
 * @property int $integer2
 * @property float $number1
 * @property float $number2
 * @property string $remarks
 * @property int $reservedInteger3
 * @property int $reservedInteger4
 * @property float $reservedNumber3
 * @property float $reservedNumber4
 * @property string $reservedText3
 * @property string $reservedText4
 * @property string $sRABioProjectID
 * @property string $sRABioSampleID
 * @property string $sRAProjectID
 * @property string $sRASampleID
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $modifiedByAgentID
 * @property int $preparationID
 * @property int $createdByAgentID
 * @property string $extractionDate
 * @property int $extractorID
 * @property Preparation $preparation
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $extractor
 * @property DnaSequence[] $dnaSequences
 */
class MaterialSample extends BaseModel
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
    protected $table = 'materialsample';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'MaterialSampleID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preparation(): BelongsTo
    {
        return $this->belongsTo(Preparation::class, 'PreparationID', 'PreparationID');
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
    public function extractor(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ExtractorID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dnaSequences(): HasMany
    {
        return $this->hasMany(DnaSequence::class, 'MaterialSampleID', 'MaterialSampleID');
    }

}
