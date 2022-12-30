<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $referenceWorkAttachmentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $ordinal
 * @property string $remarks
 * @property int $attachmentID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $referenceWorkID
 */
class ReferenceWorkAttachment extends BaseModel
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
    protected $table = 'referenceworkattachment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ReferenceWorkAttachmentID';

    /**
     * @var array
     */
    protected $guarded = [];



}
