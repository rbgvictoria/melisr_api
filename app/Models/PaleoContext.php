<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $paleoContextID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $chronosStratEndID
 * @property int $lithoStratID
 * @property int $bioStratID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $chronosStratID
 * @property float $number1
 * @property float $number2
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $paleoContextName
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property int $disciplineID
 * @property GeologicTimePeriod $chronosStratEnd
 * @property Discipline $discipline
 * @property GeologicTimePeriod $chronosStrat
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property GeologicTimePeriod $bioStrat
 * @property LithoStrat $lithoStrat
 * @property CollectingEvent[] $collectingEvents
 * @property Locality[] $localities
 * @property CollectionObject[] $collectionObjects
 */
class PaleoContext extends BaseModel
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
    protected $table = 'paleocontext';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'PaleoContextID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chronosStratEnd(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriod::class, 'ChronosStratEndID', 'GeologicTimePeriodID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chronosStrat(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriod::class, 'ChronosStratID', 'GeologicTimePeriodID');
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
    public function bioStrat(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriod::class, 'BioStratID', 'GeologicTimePeriodID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lithoStrat(): BelongsTo
    {
        return $this->belongsTo(LithoStrat::class, 'LithoStratID', 'LithoStratID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEvents(): HasMany
    {
        return $this->hasMany(CollectingEvent::class, 'PaleoContextID', 'PaleoContextID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class, 'PaleoContextID', 'PaleoContextID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'PaleoContextID', 'PaleoContextID');
    }

}
