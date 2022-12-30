<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $containerID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $description
 * @property string $name
 * @property int $number
 * @property int $type
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $storageID
 * @property int $parentID
 * @property Container $parent
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Storage $storage
 * @property Container[] $containers
 * @property CollectionObject[] $collectionObjects
 * @property CollectionObject[] $collectionObjects
 */
class Container extends BaseModel
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
    protected $table = 'container';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ContainerID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Container::class, 'ParentID', 'ContainerID');
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
    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class, 'StorageID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containers(): HasMany
    {
        return $this->hasMany(Container::class, 'ParentID', 'ContainerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'ContainerOwnerID', 'ContainerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'ContainerID', 'ContainerID');
    }

}
