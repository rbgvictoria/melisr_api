<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $exchangeInPrepID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $comments
 * @property string $descriptionOfMaterial
 * @property int $number1
 * @property int $quantity
 * @property string $text1
 * @property string $text2
 * @property int $exchangeInID
 * @property int $createdByAgentID
 * @property int $preparationID
 * @property int $modifiedByAgentID
 * @property int $disciplineID
 * @property Preparation $preparation
 * @property ExchangeIn $exchangeIn
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 */
class ExchangeInPrep extends BaseModel
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
    protected $table = 'exchangeinprep';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ExchangeInPrepID';

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
    public function exchangeIn(): BelongsTo
    {
        return $this->belongsTo(ExchangeIn::class, 'ExchangeInID', 'ExchangeInID');
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


}
