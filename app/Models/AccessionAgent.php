<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $accessionAgentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $remarks
 * @property string $role
 * @property int $repositoryAgreementID
 * @property int $modifiedByAgentID
 * @property int $agentID
 * @property int $createdByAgentID
 * @property int $accessionID
 * @property Agent $agent
 * @property Accession $accession
 * @property RepositoryAgreement $repositoryAgreement
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 */
class AccessionAgent extends BaseModel
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
    protected $table = 'accessionagent';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AccessionAgentID';

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
    public function repositoryAgreement(): BelongsTo
    {
        return $this->belongsTo(RepositoryAgreement::class, 'RepositoryAgreementID', 'RepositoryAgreementID');
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


}
