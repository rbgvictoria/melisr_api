<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $borrowMaterialID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $description
 * @property string $inComments
 * @property string $materialNumber
 * @property string $outComments
 * @property int $quantity
 * @property int $quantityResolved
 * @property int $quantityReturned
 * @property int $borrowID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property string $text1
 * @property string $text2
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Borrow $borrow
 * @property BorrowReturnMaterial[] $borrowReturnMaterials
 */
class BorrowMaterial extends BaseModel
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
    protected $table = 'borrowmaterial';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'BorrowMaterialID';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function borrow(): BelongsTo
    {
        return $this->belongsTo(Borrow::class, 'BorrowID', 'BorrowID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrowReturnMaterials(): HasMany
    {
        return $this->hasMany(BorrowReturnMaterial::class, 'BorrowMaterialID', 'BorrowMaterialID');
    }

}
