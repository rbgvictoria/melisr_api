<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $loanReturnPreparationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $quantityResolved
 * @property int $quantityReturned
 * @property string $remarks
 * @property string $returnedDate
 * @property int $receivedByID
 * @property int $disciplineID
 * @property int $modifiedByAgentID
 * @property int $loanPreparationID
 * @property int $createdByAgentID
 * @property int $deaccessionPreparationID
 * @property Agent $receivedBy
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property LoanPreparation $loanPreparation
 * @property DisposalPreparation[] $disposalPreparations
 */
class LoanReturnPreparation extends BaseModel
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
    protected $table = 'loanreturnpreparation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LoanReturnPreparationID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receivedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'ReceivedByID', 'AgentID');
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
    public function loanPreparation(): BelongsTo
    {
        return $this->belongsTo(LoanPreparation::class, 'LoanPreparationID', 'LoanPreparationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disposalPreparations(): HasMany
    {
        return $this->hasMany(DisposalPreparation::class, 'LoanReturnPreparationID', 'LoanReturnPreparationID');
    }

}
