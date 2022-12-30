<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $dNAPrimerID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $integer1
 * @property int $integer2
 * @property float $number1
 * @property float $number2
 * @property string $primerDesignator
 * @property string $primerNameForward
 * @property string $primerNameReverse
 * @property string $primerReferenceCitationForward
 * @property string $primerReferenceCitationReverse
 * @property string $primerReferenceLinkForward
 * @property string $primerReferenceLinkReverse
 * @property string $primerSequenceForward
 * @property string $primerSequenceReverse
 * @property string $purificationMethod
 * @property string $remarks
 * @property int $reservedInteger3
 * @property int $reservedInteger4
 * @property float $reservedNumber3
 * @property float $reservedNumber4
 * @property string $reservedText3
 * @property string $reservedText4
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property DNASequencingRun[] $dNASequencingRuns
 */
class DNAPrimer extends BaseModel
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
    protected $table = 'dnaprimer';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DNAPrimerID';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dNASequencingRuns(): HasMany
    {
        return $this->hasMany(DNASequencingRun::class, 'DNAPrimerID', 'DNAPrimerID');
    }

}
