<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $borrowAttachmentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $ordinal
 * @property string $remarks
 * @property int $attachmentID
 * @property int $createdByAgentID
 * @property int $borrowID
 * @property int $modifiedByAgentID
 */
class BorrowAttachment extends BaseModel
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
    protected $table = 'borrowattachment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'BorrowAttachmentID';

    /**
     * @var array
     */
    protected $guarded = [];



}
