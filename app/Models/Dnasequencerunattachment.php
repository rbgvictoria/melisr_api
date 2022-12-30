<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $dnaSequencingRunAttachmentId
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $ordinal
 * @property string $remarks
 * @property int $modifiedByAgentID
 * @property int $attachmentID
 * @property int $createdByAgentID
 * @property int $dnaSequencingRunID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property DNASequencingRun $dnaSequencingRun
 * @property Attachment $attachment
 */
class Dnasequencerunattachment extends BaseModel
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
    protected $table = 'dnasequencerunattachment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DnaSequencingRunAttachmentId';

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
    public function dnaSequencingRun(): BelongsTo
    {
        return $this->belongsTo(DNASequencingRun::class, 'DnaSequencingRunID', 'DNASequencingRunID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attachment(): BelongsTo
    {
        return $this->belongsTo(Attachment::class, 'AttachmentID', 'AttachmentID');
    }


}
