<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $geologicTimePeriodID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property float $endPeriod
 * @property float $endUncertainty
 * @property string $fullName
 * @property string $gUID
 * @property int $highestChildNodeNumber
 * @property boolean $isAccepted
 * @property boolean $isBioStrat
 * @property string $name
 * @property int $nodeNumber
 * @property int $rankID
 * @property string $remarks
 * @property string $standard
 * @property float $startPeriod
 * @property float $startUncertainty
 * @property string $text1
 * @property string $text2
 * @property int $parentID
 * @property int $geologicTimePeriodTreeDefItemID
 * @property int $acceptedID
 * @property int $geologicTimePeriodTreeDefID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property GeologicTimePeriod $accepted
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property GeologicTimePeriodTreeDef $geologicTimePeriodTreeDef
 * @property GeologicTimePeriodTreeDefItem $geologicTimePeriodTreeDefItem
 * @property GeologicTimePeriod $parent
 * @property PaleoContext[] $paleoContexts
 * @property PaleoContext[] $paleoContexts
 * @property PaleoContext[] $paleoContexts
 * @property GeologicTimePeriod[] $geologicTimePeriods
 * @property GeologicTimePeriod[] $geologicTimePeriods
 */
class GeologicTimePeriod extends BaseModel
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
    protected $table = 'geologictimeperiod';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GeologicTimePeriodID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accepted(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriod::class, 'AcceptedID', 'GeologicTimePeriodID');
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
    public function geologicTimePeriodTreeDef(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriodTreeDef::class, 'GeologicTimePeriodTreeDefID', 'GeologicTimePeriodTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geologicTimePeriodTreeDefItem(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriodTreeDefItem::class, 'GeologicTimePeriodTreeDefItemID', 'GeologicTimePeriodTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriod::class, 'ParentID', 'GeologicTimePeriodID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chronosStratEndOf(): HasMany
    {
        return $this->hasMany(PaleoContext::class, 'ChronosStratEndID', 'GeologicTimePeriodID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chronosStratOf(): HasMany
    {
        return $this->hasMany(PaleoContext::class, 'ChronosStratID', 'GeologicTimePeriodID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bioStartOf(): HasMany
    {
        return $this->hasMany(PaleoContext::class, 'BioStratID', 'GeologicTimePeriodID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function synonyms(): HasMany
    {
        return $this->hasMany(GeologicTimePeriod::class, 'AcceptedID', 'GeologicTimePeriodID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(GeologicTimePeriod::class, 'ParentID', 'GeologicTimePeriodID');
    }

}
