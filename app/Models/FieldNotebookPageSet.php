<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $fieldNotebookPageSetID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $description
 * @property string $endDate
 * @property string $method
 * @property int $orderNumber
 * @property string $startDate
 * @property int $fieldNotebookID
 * @property int $disciplineID
 * @property int $agentID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Agent $agent
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property FieldNotebook $fieldNotebook
 * @property FieldNotebookPage[] $fieldNotebookPages
 * @property FieldNotebookPageSetAttachment[] $fieldNotebookPageSetAttachments
 */
class FieldNotebookPageSet extends BaseModel
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
    protected $table = 'fieldnotebookpageset';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FieldNotebookPageSetID';

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
    public function fieldNotebook(): BelongsTo
    {
        return $this->belongsTo(FieldNotebook::class, 'FieldNotebookID', 'FieldNotebookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookPages(): HasMany
    {
        return $this->hasMany(FieldNotebookPage::class, 'FieldNotebookPageSetID', 'FieldNotebookPageSetID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookPageSetAttachments(): HasMany
    {
        return $this->hasMany(FieldNotebookPageSetAttachment::class, 'FieldNotebookPageSetID', 'FieldNotebookPageSetID');
    }

}
