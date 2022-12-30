<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $attachmentImageAttributeID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $creativeCommons
 * @property int $height
 * @property float $magnification
 * @property int $mBImageID
 * @property float $resolution
 * @property string $timestampLastSend
 * @property string $timestampLastUpdateCheck
 * @property int $width
 * @property int $modifiedByAgentID
 * @property int $morphBankViewID
 * @property int $createdByAgentID
 * @property string $imageType
 * @property float $number1
 * @property float $number2
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property string $viewDescription
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property MorphBankView $morphBankView
 * @property Attachment $attachment
 */
class AttachmentImageAttribute extends BaseModel
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
    protected $table = 'attachmentimageattribute';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AttachmentImageAttributeID';

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
    public function morphBankView(): BelongsTo
    {
        return $this->belongsTo(MorphBankView::class, 'MorphBankViewID', 'MorphBankViewID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function attachment(): HasOne
    {
        return $this->hasOne(Attachment::class, 'AttachmentImageAttributeID', 'AttachmentImageAttributeID');
    }

}
