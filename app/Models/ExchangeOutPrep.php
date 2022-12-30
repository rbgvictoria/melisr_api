<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $exchangeOutPrepID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $comments
 * @property string $descriptionOfMaterial
 * @property int $number1
 * @property int $quantity
 * @property string $text1
 * @property string $text2
 * @property int $exchangeOutID
 * @property int $preparationID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $disciplineID
 * @property Preparation $preparation
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property ExchangeOut $exchangeOut
 */
class ExchangeOutPrep extends BaseModel
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
    protected $table = 'exchangeoutprep';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ExchangeOutPrepID';

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
    public function exchangeOut(): BelongsTo
    {
        return $this->belongsTo(ExchangeOut::class, 'ExchangeOutID', 'ExchangeOutID');
    }


}
