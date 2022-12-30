<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $lithoStratID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $fullName
 * @property string $gUID
 * @property int $highestChildNodeNumber
 * @property boolean $isAccepted
 * @property string $name
 * @property int $nodeNumber
 * @property float $number1
 * @property float $number2
 * @property int $rankID
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $parentID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $lithoStratTreeDefItemID
 * @property int $lithoStratTreeDefID
 * @property int $acceptedID
 * @property Agent $modifiedByAgent
 * @property LithoStratTreeDef $lithoStratTreeDef
 * @property Agent $createdByAgent
 * @property LithoStrat $accepted
 * @property LithoStrat $parent
 * @property LithoStratTreeDefItem $lithoStratTreeDefItem
 * @property PaleoContext[] $paleoContexts
 * @property LithoStrat[] $lithoStrats
 * @property LithoStrat[] $lithoStrats
 */
class LithoStrat extends BaseModel
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
    protected $table = 'lithostrat';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LithoStratID';

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
    public function lithoStratTreeDef(): BelongsTo
    {
        return $this->belongsTo(LithoStratTreeDef::class, 'LithoStratTreeDefID', 'LithoStratTreeDefID');
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
    public function accepted(): BelongsTo
    {
        return $this->belongsTo(LithoStrat::class, 'AcceptedID', 'LithoStratID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(LithoStrat::class, 'ParentID', 'LithoStratID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lithoStratTreeDefItem(): BelongsTo
    {
        return $this->belongsTo(LithoStratTreeDefItem::class, 'LithoStratTreeDefItemID', 'LithoStratTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paleoContexts(): HasMany
    {
        return $this->hasMany(PaleoContext::class, 'LithoStratID', 'LithoStratID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function synonyms(): HasMany
    {
        return $this->hasMany(LithoStrat::class, 'AcceptedID', 'LithoStratID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(LithoStrat::class, 'ParentID', 'LithoStratID');
    }

}
