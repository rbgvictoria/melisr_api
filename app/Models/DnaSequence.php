<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $dnaSequenceID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property int $ambiguousResidues
 * @property string $bOLDBarcodeID
 * @property string $bOLDLastUpdateDate
 * @property string $bOLDSampleID
 * @property string $bOLDTranslationMatrix
 * @property int $compA
 * @property int $compC
 * @property int $compG
 * @property int $compT
 * @property string $genBankAccessionNumber
 * @property string $geneSequence
 * @property string $moleculeType
 * @property float $number1
 * @property float $number2
 * @property float $number3
 * @property string $remarks
 * @property string $targetMarker
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property int $totalResidues
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property int $collectionObjectID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $agentID
 * @property int $materialSampleID
 * @property string $extractionDate
 * @property int $extractionDatePrecision
 * @property string $sequenceDate
 * @property int $sequenceDatePrecision
 * @property int $extractorID
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 * @property MaterialSample $materialSample
 * @property Agent $extractor
 * @property DNASequencingRun[] $dNASequencingRuns
 * @property DnaSequenceAttachment[] $dnaSequenceAttachments
 * @property Extractor[] $extractors
 * @property PcrPerson[] $pcrPersons
 */
class DnaSequence extends BaseModel
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
    protected $table = 'dnasequence';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DnaSequenceID';

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
    public function materialSample(): BelongsTo
    {
        return $this->belongsTo(MaterialSample::class, 'MaterialSampleID', 'MaterialSampleID');
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
    public function dNASequencingRuns(): HasMany
    {
        return $this->hasMany(DNASequencingRun::class, 'DNASequenceID', 'DnaSequenceID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dnaSequenceAttachments(): HasMany
    {
        return $this->hasMany(DnaSequenceAttachment::class, 'DnaSequenceID', 'DnaSequenceID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extractors(): HasMany
    {
        return $this->hasMany(Extractor::class, 'DNASequenceID', 'DnaSequenceID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pcrPersons(): HasMany
    {
        return $this->hasMany(PcrPerson::class, 'DNASequenceID', 'DnaSequenceID');
    }

}
