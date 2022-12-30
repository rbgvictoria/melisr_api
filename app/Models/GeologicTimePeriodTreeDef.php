<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $geologicTimePeriodTreeDefID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $fullNameDirection
 * @property string $name
 * @property string $remarks
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property GeologicTimePeriodTreeDefItem[] $geologicTimePeriodTreeDefItems
 * @property Discipline[] $disciplines
 * @property GeologicTimePeriod[] $geologicTimePeriods
 */
class GeologicTimePeriodTreeDef extends BaseModel
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
    protected $table = 'geologictimeperiodtreedef';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GeologicTimePeriodTreeDefID';

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
    public function geologicTimePeriodTreeDefItems(): HasMany
    {
        return $this->hasMany(GeologicTimePeriodTreeDefItem::class, 'GeologicTimePeriodTreeDefID', 'GeologicTimePeriodTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disciplines(): HasMany
    {
        return $this->hasMany(Discipline::class, 'GeologicTimePeriodTreeDefID', 'GeologicTimePeriodTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function geologicTimePeriods(): HasMany
    {
        return $this->hasMany(GeologicTimePeriod::class, 'GeologicTimePeriodTreeDefID', 'GeologicTimePeriodTreeDefID');
    }

}
