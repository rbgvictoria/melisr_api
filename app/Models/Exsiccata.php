<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $exsiccataID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $title
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $referenceWorkID
 * @property string $remarks
 * @property string $schedae
 * @property Agent $modifiedByAgent
 * @property ReferenceWork $referenceWork
 * @property Agent $createdByAgent
 * @property ExsiccataItem[] $exsiccataItems
 */
class Exsiccata extends BaseModel
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
    protected $table = 'exsiccata';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ExsiccataID';

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
    public function referenceWork(): BelongsTo
    {
        return $this->belongsTo(ReferenceWork::class, 'ReferenceWorkID', 'ReferenceWorkID');
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
    public function exsiccataItems(): HasMany
    {
        return $this->hasMany(ExsiccataItem::class, 'ExsiccataID', 'ExsiccataID');
    }

}
