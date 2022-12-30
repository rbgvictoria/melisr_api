<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $projectID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $endDate
 * @property string $grantAgency
 * @property string $grantNumber
 * @property float $number1
 * @property float $number2
 * @property string $projectDescription
 * @property string $projectName
 * @property string $projectNumber
 * @property string $remarks
 * @property string $startDate
 * @property string $text1
 * @property string $text2
 * @property string $uRL
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $modifiedByAgentID
 * @property int $projectAgentID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $projectAgent
 * @property Agent $createdByAgent
 * @property CollectionObject[] $collectionObjects
 */
class Project extends BaseModel
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
    protected $table = 'project';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ProjectID';

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
    public function projectAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ProjectAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CreatedByAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function collectionObjects(): BelongsToMany
    {
        return $this->belongsToMany(CollectionObject::class, 'project_colobj', 'ProjectID', 'CollectionObjectID');
    }


}
