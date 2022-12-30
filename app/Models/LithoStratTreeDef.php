<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $lithoStratTreeDefID
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
 * @property Discipline[] $disciplines
 * @property LithoStratTreeDefItem[] $lithoStratTreeDefItems
 * @property LithoStrat[] $lithoStrats
 */
class LithoStratTreeDef extends BaseModel
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
    protected $table = 'lithostrattreedef';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LithoStratTreeDefID';

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
    public function disciplines(): HasMany
    {
        return $this->hasMany(Discipline::class, 'LithoStratTreeDefID', 'LithoStratTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lithoStratTreeDefItems(): HasMany
    {
        return $this->hasMany(LithoStratTreeDefItem::class, 'LithoStratTreeDefID', 'LithoStratTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lithoStrats(): HasMany
    {
        return $this->hasMany(LithoStrat::class, 'LithoStratTreeDefID', 'LithoStratTreeDefID');
    }

}
