<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $treatmentEventID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $dateBoxed
 * @property string $dateCleaned
 * @property string $dateCompleted
 * @property string $dateReceived
 * @property string $dateToIsolation
 * @property string $dateTreatmentEnded
 * @property string $dateTreatmentStarted
 * @property string $fieldNumber
 * @property string $storage
 * @property string $remarks
 * @property string $treatmentNumber
 * @property string $type
 * @property int $divisionID
 * @property int $accessionID
 * @property int $collectionObjectID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $number1
 * @property int $number2
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property int $authorizedByID
 * @property int $performedByID
 * @property Accession $accession
 * @property Agent $performedBy
 * @property Agent $modifiedByAgent
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 * @property Agent $authorizedBy
 * @property Division $division
 * @property TreatmentEventAttachment[] $treatmentEventAttachments
 */
class TreatmentEvent extends BaseModel
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
    protected $table = 'treatmentevent';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'TreatmentEventID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accession(): BelongsTo
    {
        return $this->belongsTo(Accession::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function performedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'PerformedByID', 'AgentID');
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
    public function collectionObject(): BelongsTo
    {
        return $this->belongsTo(CollectionObject::class, 'CollectionObjectID', 'CollectionObjectID');
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
    public function authorizedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'AuthorizedByID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentEventAttachments(): HasMany
    {
        return $this->hasMany(TreatmentEventAttachment::class, 'TreatmentEventID', 'TreatmentEventID');
    }

}
