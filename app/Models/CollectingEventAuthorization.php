<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $collectingEventAuthorizationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $remarks
 * @property int $modifiedByAgentID
 * @property int $permitID
 * @property int $collectingEventID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Permit $permit
 * @property CollectingEvent $collectingEvent
 */
class CollectingEventAuthorization extends BaseModel
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
    protected $table = 'collectingeventauthorization';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectingEventAuthorizationID';

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
    public function permit(): BelongsTo
    {
        return $this->belongsTo(Permit::class, 'PermitID', 'PermitID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectingEvent(): BelongsTo
    {
        return $this->belongsTo(CollectingEvent::class, 'CollectingEventID', 'CollectingEventID');
    }


}
