<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $geographyTreeDefItemID
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
 * @property int $geographyTreeDefID
 * @property int $parentItemID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property GeographyTreeDefItem $parentItem
 * @property GeographyTreeDef $geographyTreeDef
 * @property Geography[] $geographies
 * @property GeographyTreeDefItem[] $geographyTreeDefItems
 */
class GeographyTreeDefItem extends BaseModel
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
    protected $table = 'geographytreedefitem';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GeographyTreeDefItemID';

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
        return $this->belongsTo(GeographyTreeDefItem::class, 'ParentItemID', 'GeographyTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geographyTreeDef(): BelongsTo
    {
        return $this->belongsTo(GeographyTreeDef::class, 'GeographyTreeDefID', 'GeographyTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function geographies(): HasMany
    {
        return $this->hasMany(Geography::class, 'GeographyTreeDefItemID', 'GeographyTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function geographyTreeDefItems(): HasMany
    {
        return $this->hasMany(GeographyTreeDefItem::class, 'ParentItemID', 'GeographyTreeDefItemID');
    }

}
