<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $giftAttachmentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $ordinal
 * @property string $remarks
 * @property int $giftID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $attachmentID
 */
class GiftAttachment extends BaseModel
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
    protected $table = 'giftattachment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GiftAttachmentID';

    /**
     * @var array
     */
    protected $guarded = [];



}
