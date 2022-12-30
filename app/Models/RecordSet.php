<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $recordSetID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property int $allPermissionLevel
 * @property int $tableID
 * @property int $groupPermissionLevel
 * @property string $name
 * @property int $ownerPermissionLevel
 * @property string $remarks
 * @property int $type
 * @property int $modifiedByAgentID
 * @property int $infoRequestID
 * @property int $spPrincipalID
 * @property int $specifyUserID
 * @property int $createdByAgentID
 * @property InfoRequest $infoRequest
 * @property SpecifyUser $specifyUser
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property RecordSetItem[] $recordSetItems
 */
class RecordSet extends BaseModel
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
    protected $table = 'recordset';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'RecordSetID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function infoRequest(): BelongsTo
    {
        return $this->belongsTo(InfoRequest::class, 'InfoRequestID', 'InfoRequestID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specifyUser(): BelongsTo
    {
        return $this->belongsTo(SpecifyUser::class, 'SpecifyUserID', 'SpecifyUserID');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recordSetItems(): HasMany
    {
        return $this->hasMany(RecordSetItem::class, 'RecordSetID', 'RecordSetID');
    }

}
