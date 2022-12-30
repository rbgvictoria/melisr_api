<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $columns
 * @property string $data
 * @property string $uploadplan
 * @property string $uploaderstatus
 * @property string $uploadresult
 * @property string $rowresults
 * @property int $collectionId
 * @property int $specifyuserId
 * @property string $visualorder
 * @property string $importedfilename
 * @property string $remarks
 * @property string $timestampcreated
 * @property string $timestampmodified
 * @property int $createdbyagentId
 * @property int $modifiedbyagentId
 * @property Collection $collection
 * @property Agent $createdbyagent
 * @property Agent $modifiedbyagent
 * @property SpecifyUser $specifyuser
 */
class Spdataset extends BaseModel
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
    protected $table = 'spdataset';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdbyagent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'createdbyagent_id', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modifiedbyagent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'modifiedbyagent_id', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specifyuser(): BelongsTo
    {
        return $this->belongsTo(SpecifyUser::class, 'specifyuser_id', 'SpecifyUserID');
    }


}
