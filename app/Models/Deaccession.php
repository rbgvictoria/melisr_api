<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $deaccessionID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $date1
 * @property string $date2
 * @property string $deaccessionDate
 * @property string $deaccessionNumber
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property int $integer4
 * @property int $integer5
 * @property float $number1
 * @property float $number2
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $remarks
 * @property string $status
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property string $type
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property int $agent2ID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $agent1ID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $agent1
 * @property Agent $agent2
 * @property ExchangeOut[] $exchangeOuts
 * @property Gift[] $gifts
 * @property DeaccessionAgent[] $deaccessionAgents
 * @property Disposal[] $disposals
 * @property DeaccessionAttachment[] $deaccessionAttachments
 */
class Deaccession extends BaseModel
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
    protected $table = 'deaccession';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DeaccessionID';

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
    public function agent1(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent1ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent2(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent2ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOuts(): HasMany
    {
        return $this->hasMany(ExchangeOut::class, 'DeaccessionID', 'DeaccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gifts(): HasMany
    {
        return $this->hasMany(Gift::class, 'DeaccessionID', 'DeaccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deaccessionAgents(): HasMany
    {
        return $this->hasMany(DeaccessionAgent::class, 'DeaccessionID', 'DeaccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disposals(): HasMany
    {
        return $this->hasMany(Disposal::class, 'DeaccessionID', 'DeaccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deaccessionAttachments(): HasMany
    {
        return $this->hasMany(DeaccessionAttachment::class, 'DeaccessionID', 'DeaccessionID');
    }

}
