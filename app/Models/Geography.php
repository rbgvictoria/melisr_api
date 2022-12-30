<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $geographyID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $abbrev
 * @property float $centroidLat
 * @property float $centroidLon
 * @property string $commonName
 * @property string $fullName
 * @property string $geographyCode
 * @property string $gML
 * @property string $gUID
 * @property int $highestChildNodeNumber
 * @property boolean $isAccepted
 * @property boolean $isCurrent
 * @property string $name
 * @property int $nodeNumber
 * @property int $number1
 * @property int $number2
 * @property int $rankID
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property string $timestampVersion
 * @property int $acceptedID
 * @property int $parentID
 * @property int $geographyTreeDefID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $geographyTreeDefItemID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Geography $parent
 * @property GeographyTreeDef $geographyTreeDef
 * @property GeographyTreeDefItem $geographyTreeDefItem
 * @property Geography $accepted
 * @property AgentGeography[] $agentGeographies
 * @property Geography[] $children
 * @property Geography[] $synonyms
 * @property Locality[] $localities
 */
class Geography extends BaseModel
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
    protected $table = 'geography';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GeographyID';

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
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Geography::class, 'ParentID', 'GeographyID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geographyTreeDef(): BelongsTo
    {
        return $this->belongsTo(GeographyTreeDef::class, 'GeographyTreeDefID', 'GeographyTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geographyTreeDefItem(): BelongsTo
    {
        return $this->belongsTo(GeographyTreeDefItem::class, 'GeographyTreeDefItemID', 'GeographyTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accepted(): BelongsTo
    {
        return $this->belongsTo(Geography::class, 'AcceptedID', 'GeographyID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentGeographies(): HasMany
    {
        return $this->hasMany(AgentGeography::class, 'GeographyID', 'GeographyID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Geography::class, 'ParentID', 'GeographyID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function synonyms(): HasMany
    {
        return $this->hasMany(Geography::class, 'AcceptedID', 'GeographyID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class, 'GeographyID', 'GeographyID');
    }

}
