<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $morphBankViewID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $developmentState
 * @property string $form
 * @property string $imagingPreparationTechnique
 * @property string $imagingTechnique
 * @property int $morphBankExternalViewID
 * @property string $sex
 * @property string $specimenPart
 * @property string $viewAngle
 * @property string $viewName
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property AttachmentImageAttribute[] $attachmentImageAttributes
 */
class MorphBankView extends BaseModel
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
    protected $table = 'morphbankview';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'MorphBankViewID';

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
    public function attachmentImageAttributes(): HasMany
    {
        return $this->hasMany(AttachmentImageAttribute::class, 'MorphBankViewID', 'MorphBankViewID');
    }

}
