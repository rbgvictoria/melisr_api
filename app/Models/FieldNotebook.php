<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $fieldNotebookID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $description
 * @property string $endDate
 * @property string $storage
 * @property string $name
 * @property string $startDate
 * @property int $collectionID
 * @property int $agentID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $disciplineID
 * @property Agent $agent
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Collection $collection
 * @property FieldNotebookAttachment[] $fieldNotebookAttachments
 * @property FieldNotebookPageSet[] $fieldNotebookPageSets
 */
class FieldNotebook extends BaseModel
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
    protected $table = 'fieldnotebook';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FieldNotebookID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'AgentID', 'AgentID');
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
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'CollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookAttachments(): HasMany
    {
        return $this->hasMany(FieldNotebookAttachment::class, 'FieldNotebookID', 'FieldNotebookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookPageSets(): HasMany
    {
        return $this->hasMany(FieldNotebookPageSet::class, 'FieldNotebookID', 'FieldNotebookID');
    }

}
