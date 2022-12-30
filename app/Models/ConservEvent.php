<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $conservEventID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $advTestingExam
 * @property string $advTestingExamResults
 * @property string $completedComments
 * @property string $completedDate
 * @property string $conditionReport
 * @property string $curatorApprovalDate
 * @property string $examDate
 * @property string $photoDocs
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property int $number1
 * @property int $number2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property string $treatmentCompDate
 * @property string $treatmentReport
 * @property int $treatedByAgentID
 * @property int $conservDescriptionID
 * @property int $createdByAgentID
 * @property int $curatorID
 * @property int $modifiedByAgentID
 * @property int $examinedByAgentID
 * @property int $completedDatePrecision
 * @property int $curatorApprovalDatePrecision
 * @property int $examDatePrecision
 * @property int $treatmentCompDatePrecision
 * @property Agent $examinedByAgent
 * @property Agent $modifiedByAgent
 * @property Agent $treatedByAgent
 * @property Agent $createdByAgent
 * @property Agent $curator
 * @property ConservDescription $conservDescription
 * @property ConservEventAttachment[] $conservEventAttachments
 */
class ConservEvent extends BaseModel
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
    protected $table = 'conservevent';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ConservEventID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examinedByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ExaminedByAgentID', 'AgentID');
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
    public function treatedByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'TreatedByAgentID', 'AgentID');
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
    public function curator(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CuratorID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conservDescription(): BelongsTo
    {
        return $this->belongsTo(ConservDescription::class, 'ConservDescriptionID', 'ConservDescriptionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservEventAttachments(): HasMany
    {
        return $this->hasMany(ConservEventAttachment::class, 'ConservEventID', 'ConservEventID');
    }

}
