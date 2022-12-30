<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $geologicTimePeriodTreeDefItemID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $fullNameSeparator
 * @property boolean $isEnforced
 * @property boolean $isInFullName
 * @property string $name
 * @property int $rankID
 * @property string $remarks
 * @property string $textAfter
 * @property string $textBefore
 * @property string $title
 * @property int $modifiedByAgentID
 * @property int $geologicTimePeriodTreeDefID
 * @property int $parentItemID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property GeologicTimePeriodTreeDefItem $parentItem
 * @property GeologicTimePeriodTreeDef $geologicTimePeriodTreeDef
 * @property GeologicTimePeriodTreeDefItem[] $geologicTimePeriodTreeDefItems
 * @property GeologicTimePeriod[] $geologicTimePeriods
 */
class GeologicTimePeriodTreeDefItem extends BaseModel
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
    protected $table = 'geologictimeperiodtreedefitem';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GeologicTimePeriodTreeDefItemID';

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
    public function parentItem(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriodTreeDefItem::class, 'ParentItemID', 'GeologicTimePeriodTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geologicTimePeriodTreeDef(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriodTreeDef::class, 'GeologicTimePeriodTreeDefID', 'GeologicTimePeriodTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function geologicTimePeriodTreeDefItems(): HasMany
    {
        return $this->hasMany(GeologicTimePeriodTreeDefItem::class, 'ParentItemID', 'GeologicTimePeriodTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function geologicTimePeriods(): HasMany
    {
        return $this->hasMany(GeologicTimePeriod::class, 'GeologicTimePeriodTreeDefItemID', 'GeologicTimePeriodTreeDefItemID');
    }

}
