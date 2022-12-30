<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $lithoStratTreeDefItemID
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
 * @property int $lithoStratTreeDefID
 * @property int $parentItemID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Agent $modifiedByAgent
 * @property LithoStratTreeDef $lithoStratTreeDef
 * @property Agent $createdByAgent
 * @property LithoStratTreeDefItem $parentItem
 * @property LithoStratTreeDefItem[] $lithoStratTreeDefItems
 * @property LithoStrat[] $lithoStrats
 */
class LithoStratTreeDefItem extends BaseModel
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
    protected $table = 'lithostrattreedefitem';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LithoStratTreeDefItemID';

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
    public function parentItem(): BelongsTo
    {
        return $this->belongsTo(LithoStratTreeDefItem::class, 'ParentItemID', 'LithoStratTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lithoStratTreeDefItems(): HasMany
    {
        return $this->hasMany(LithoStratTreeDefItem::class, 'ParentItemID', 'LithoStratTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lithoStrats(): HasMany
    {
        return $this->hasMany(LithoStrat::class, 'LithoStratTreeDefItemID', 'LithoStratTreeDefItemID');
    }

}
