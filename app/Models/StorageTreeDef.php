<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $storageTreeDefID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $fullNameDirection
 * @property string $name
 * @property string $remarks
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Institution[] $institutions
 * @property Storage[] $storages
 * @property StorageTreeDefItem[] $storageTreeDefItems
 */
class StorageTreeDef extends BaseModel
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
    protected $table = 'storagetreedef';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'StorageTreeDefID';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function institutions(): HasMany
    {
        return $this->hasMany(Institution::class, 'StorageTreeDefID', 'StorageTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storages(): HasMany
    {
        return $this->hasMany(Storage::class, 'StorageTreeDefID', 'StorageTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storageTreeDefItems(): HasMany
    {
        return $this->hasMany(StorageTreeDefItem::class, 'StorageTreeDefID', 'StorageTreeDefID');
    }

}
