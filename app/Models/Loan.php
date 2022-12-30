<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $loanID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $currentDueDate
 * @property string $dateClosed
 * @property string $dateReceived
 * @property boolean $isClosed
 * @property boolean $isFinancialResponsibility
 * @property string $loanDate
 * @property string $loanNumber
 * @property float $number1
 * @property float $number2
 * @property string $originalDueDate
 * @property string $overdueNotiSetDate
 * @property string $purposeOfLoan
 * @property string $receivedComments
 * @property string $remarks
 * @property string $specialConditions
 * @property string $srcGeography
 * @property string $srcTaxonomy
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $disciplineID
 * @property int $divisionID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $addressOfRecordID
 * @property string $contents
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property string $status
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Division $division
 * @property AddressOfRecord $addressOfRecord
 * @property LoanAgent[] $loanAgents
 * @property LoanAttachment[] $loanAttachments
 * @property LoanPreparation[] $loanPreparations
 * @property Shipment[] $shipments
 */
class Loan extends BaseModel
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
    protected $table = 'loan';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LoanID';

    /**
     * @var array
     */
    protected $guarded = [];

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
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addressOfRecord(): BelongsTo
    {
        return $this->belongsTo(AddressOfRecord::class, 'AddressOfRecordID', 'AddressOfRecordID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanAgents(): HasMany
    {
        return $this->hasMany(LoanAgent::class, 'LoanID', 'LoanID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanAttachments(): HasMany
    {
        return $this->hasMany(LoanAttachment::class, 'LoanID', 'LoanID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanPreparations(): HasMany
    {
        return $this->hasMany(LoanPreparation::class, 'LoanID', 'LoanID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'LoanID', 'LoanID');
    }

}
