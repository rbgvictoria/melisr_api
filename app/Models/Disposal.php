<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $disposalID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $disposalDate
 * @property string $disposalNumber
 * @property boolean $doNotExport
 * @property float $number1
 * @property float $number2
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property string $type
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $createdByAgentID
 * @property int $deaccessionID
 * @property int $modifiedByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Deaccession $deaccession
 * @property DisposalPreparation[] $disposalPreparations
 * @property DisposalAgent[] $disposalAgents
 * @property DisposalAttachment[] $disposalAttachments
 */
class Disposal extends BaseModel
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
    protected $table = 'disposal';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DisposalID';

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
    public function deaccession(): BelongsTo
    {
        return $this->belongsTo(Deaccession::class, 'DeaccessionID', 'DeaccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disposalPreparations(): HasMany
    {
        return $this->hasMany(DisposalPreparation::class, 'DisposalID', 'DisposalID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disposalAgents(): HasMany
    {
        return $this->hasMany(DisposalAgent::class, 'DisposalID', 'DisposalID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disposalAttachments(): HasMany
    {
        return $this->hasMany(DisposalAttachment::class, 'DisposalID', 'DisposalID');
    }

}
