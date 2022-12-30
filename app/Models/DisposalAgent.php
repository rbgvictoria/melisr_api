<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $disposalAgentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $remarks
 * @property string $role
 * @property int $agentID
 * @property int $disposalID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Disposal $disposal
 */
class DisposalAgent extends BaseModel
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
    protected $table = 'disposalagent';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DisposalAgentID';

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
    public function disposal(): BelongsTo
    {
        return $this->belongsTo(Disposal::class, 'DisposalID', 'DisposalID');
    }


}
