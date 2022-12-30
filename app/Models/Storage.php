<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $storageID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $abbrev
 * @property string $fullName
 * @property int $highestChildNodeNumber
 * @property boolean $isAccepted
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
 * @property int $modifiedByAgentID
 * @property int $parentID
 * @property int $storageTreeDefItemID
 * @property int $storageTreeDefID
 * @property int $createdByAgentID
 * @property Storage $accepted
 * @property StorageTreeDefItem $storageTreeDefItem
 * @property Agent $modifiedByAgent
 * @property StorageTreeDef $storageTreeDef
 * @property Agent $createdByAgent
 * @property Storage $parent
 * @property Preparation[] $preparations
 * @property Preparation[] $alternatStorageFor
 * @property Storage[] $synonyms
 * @property Storage[] $children
 * @property Container[] $containers
 * @property StorageAttachment[] $storageAttachments
 */
class Storage extends BaseModel
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
    protected $table = 'storage';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'StorageID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accepted(): BelongsTo
    {
        return $this->belongsTo(Storage::class, 'AcceptedID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function storageTreeDefItem(): BelongsTo
    {
        return $this->belongsTo(StorageTreeDefItem::class, 'StorageTreeDefItemID', 'StorageTreeDefItemID');
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Storage::class, 'ParentID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preparations(): HasMany
    {
        return $this->hasMany(Preparation::class, 'StorageID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alternateStorageFor(): HasMany
    {
        return $this->hasMany(Preparation::class, 'AlternateStorageID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function synonyms(): HasMany
    {
        return $this->hasMany(Storage::class, 'AcceptedID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Storage::class, 'ParentID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containers(): HasMany
    {
        return $this->hasMany(Container::class, 'StorageID', 'StorageID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storageAttachments(): HasMany
    {
        return $this->hasMany(StorageAttachment::class, 'StorageID', 'StorageID');
    }

}
