<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $dNASequencingRunID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property float $number1
 * @property float $number2
 * @property float $number3
 * @property int $ordinal
 * @property boolean $pCRCocktailPrimer
 * @property string $pCRForwardPrimerCode
 * @property string $pCRPrimerName
 * @property string $pCRPrimerSequence53
 * @property string $pCRReversePrimerCode
 * @property string $readDirection
 * @property string $remarks
 * @property string $runDate
 * @property string $scoreFileName
 * @property boolean $sequenceCocktailPrimer
 * @property string $sequencePrimerCode
 * @property string $sequencePrimerName
 * @property string $sequencePrimerSequence53
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $traceFileName
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $dNASequenceID
 * @property int $runByAgentID
 * @property int $preparedByAgentID
 * @property string $geneSequence
 * @property string $dryadDOI
 * @property string $sRAExperimentID
 * @property string $sRARunID
 * @property string $sRASubmissionID
 * @property int $dNAPrimerID
 * @property DnaSequence $dNASequence
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $runByAgent
 * @property DNAPrimer $dNAPrimer
 * @property Agent $preparedByAgent
 * @property Agent $preparedByAgent
 * @property Agent $runByAgent
 * @property Dnasequencerunattachment[] $dnasequencerunattachments
 * @property DNASequencingRunCitation[] $dNASequencingRunCitations
 */
class DNASequencingRun extends BaseModel
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
    protected $table = 'dnasequencingrun';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DNASequencingRunID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dNASequence(): BelongsTo
    {
        return $this->belongsTo(DnaSequence::class, 'DNASequenceID', 'DnaSequenceID');
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
    public function runByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'RunByAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dNAPrimer(): BelongsTo
    {
        return $this->belongsTo(DNAPrimer::class, 'DNAPrimerID', 'DNAPrimerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preparedByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'PreparedByAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dnasequencerunattachments(): HasMany
    {
        return $this->hasMany(Dnasequencerunattachment::class, 'DnaSequencingRunID', 'DNASequencingRunID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dNASequencingRunCitations(): HasMany
    {
        return $this->hasMany(DNASequencingRunCitation::class, 'DNASequencingRunID', 'DNASequencingRunID');
    }

}
