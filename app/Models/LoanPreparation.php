<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $loanPreparationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $descriptionOfMaterial
 * @property string $inComments
 * @property boolean $isResolved
 * @property string $outComments
 * @property int $quantity
 * @property int $quantityResolved
 * @property int $quantityReturned
 * @property string $receivedComments
 * @property int $modifiedByAgentID
 * @property int $preparationID
 * @property int $loanID
 * @property int $createdByAgentID
 * @property int $disciplineID
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property Preparation $preparation
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Loan $loan
 * @property LoanReturnPreparation[] $loanReturnPreparations
 */
class LoanPreparation extends BaseModel
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
    protected $table = 'loanpreparation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LoanPreparationID';

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
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'LoanID', 'LoanID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanReturnPreparations(): HasMany
    {
        return $this->hasMany(LoanReturnPreparation::class, 'LoanPreparationID', 'LoanPreparationID');
    }

}
