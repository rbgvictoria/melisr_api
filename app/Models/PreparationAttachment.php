<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $preparationAttachmentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property int $ordinal
 * @property string $remarks
 * @property int $preparationID
 * @property int $createdByAgentID
 * @property int $attachmentID
 * @property int $modifiedByAgentID
 * @property Preparation $preparation
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Attachment $attachment
 */
class PreparationAttachment extends BaseModel
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
    protected $table = 'preparationattachment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'PreparationAttachmentID';

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
    public function attachment(): BelongsTo
    {
        return $this->belongsTo(Attachment::class, 'AttachmentID', 'AttachmentID');
    }


}
