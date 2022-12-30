<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $appraisalID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $appraisalDate
 * @property string $appraisalNumber
 * @property float $appraisalValue
 * @property string $monetaryUnitType
 * @property string $notes
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $agentID
 * @property int $accessionID
 * @property Agent $agent
 * @property Accession $accession
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property CollectionObject[] $collectionObjects
 */
class Appraisal extends BaseModel
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
    protected $table = 'appraisal';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AppraisalID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'AgentID', 'AgentID');
    }

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
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'AppraisalID', 'AppraisalID');
    }

}
