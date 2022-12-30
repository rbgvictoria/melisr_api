<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $storageTreeDefItemID
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
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $parentItemID
 * @property int $storageTreeDefID
 * @property string $title
 * @property StorageTreeDefItem $parentItem
 * @property Agent $modifiedByAgent
 * @property StorageTreeDef $storageTreeDef
 * @property Agent $createdByAgent
 * @property Storage[] $storages
 * @property StorageTreeDefItem[] $storageTreeDefItems
 */
class StorageTreeDefItem extends BaseModel
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
    protected $table = 'storagetreedefitem';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'StorageTreeDefItemID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentItem(): BelongsTo
    {
        return $this->belongsTo(StorageTreeDefItem::class, 'ParentItemID', 'StorageTreeDefItemID');
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
    public function storageTreeDef(): BelongsTo
    {
        return $this->belongsTo(StorageTreeDef::class, 'StorageTreeDefID', 'StorageTreeDefID');
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
    public function storages(): HasMany
    {
        return $this->hasMany(Storage::class, 'StorageTreeDefItemID', 'StorageTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storageTreeDefItems(): HasMany
    {
        return $this->hasMany(StorageTreeDefItem::class, 'ParentItemID', 'StorageTreeDefItemID');
    }

}
