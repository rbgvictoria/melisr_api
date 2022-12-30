<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $taxonTreeDefItemID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $formatToken
 * @property string $fullNameSeparator
 * @property boolean $isEnforced
 * @property boolean $isInFullName
 * @property string $name
 * @property int $rankID
 * @property string $remarks
 * @property string $textAfter
 * @property string $textBefore
 * @property string $title
 * @property int $parentItemID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $taxonTreeDefID
 * @property Agent $modifiedByAgent
 * @property TaxonTreeDefItem $parentItem
 * @property Agent $createdByAgent
 * @property TaxonTreeDef $taxonTreeDef
 * @property TaxonTreeDefItem[] $taxonTreeDefItems
 * @property Taxon[] $taxa
 */
class TaxonTreeDefItem extends BaseModel
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
    protected $table = 'taxontreedefitem';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'TaxonTreeDefItemID';

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
    public function parentItem(): BelongsTo
    {
        return $this->belongsTo(TaxonTreeDefItem::class, 'ParentItemID', 'TaxonTreeDefItemID');
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
    public function taxonTreeDef(): BelongsTo
    {
        return $this->belongsTo(TaxonTreeDef::class, 'TaxonTreeDefID', 'TaxonTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxonTreeDefItems(): HasMany
    {
        return $this->hasMany(TaxonTreeDefItem::class, 'ParentItemID', 'TaxonTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxa(): HasMany
    {
        return $this->hasMany(Taxon::class, 'TaxonTreeDefItemID', 'TaxonTreeDefItemID');
    }

}
