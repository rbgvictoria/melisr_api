<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $agentGeographyID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $remarks
 * @property string $role
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $agentID
 * @property int $geographyID
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Geography $geography
 */
class AgentGeography extends BaseModel
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
    protected $table = 'agentgeography';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AgentGeographyID';

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
    public function geography(): BelongsTo
    {
        return $this->belongsTo(Geography::class, 'GeographyID', 'GeographyID');
    }


}
