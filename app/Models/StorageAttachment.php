<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $storageAttachmentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $ordinal
 * @property string $remarks
 * @property int $storageID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $attachmentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Attachment $attachment
 * @property Storage $storage
 */
class StorageAttachment extends BaseModel
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
    protected $table = 'storageattachment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'StorageAttachmentID';

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
    public function attachment(): BelongsTo
    {
        return $this->belongsTo(Attachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class, 'StorageID', 'StorageID');
    }


}
