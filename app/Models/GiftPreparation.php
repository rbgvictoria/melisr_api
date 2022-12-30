<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $giftPreparationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $descriptionOfMaterial
 * @property string $inComments
 * @property string $outComments
 * @property int $quantity
 * @property string $receivedComments
 * @property int $preparationID
 * @property int $createdByAgentID
 * @property int $giftID
 * @property int $disciplineID
 * @property int $modifiedByAgentID
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property Preparation $preparation
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Gift $gift
 */
class GiftPreparation extends BaseModel
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
    protected $table = 'giftpreparation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GiftPreparationID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preparation(): BelongsTo
    {
        return $this->belongsTo(Preparation::class, 'PreparationID', 'PreparationID');
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
    public function gift(): BelongsTo
    {
        return $this->belongsTo(Gift::class, 'GiftID', 'GiftID');
    }


}
