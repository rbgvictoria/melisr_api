<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $repositoryAgreementID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $dateReceived
 * @property string $endDate
 * @property float $number1
 * @property float $number2
 * @property string $remarks
 * @property string $repositoryAgreementNumber
 * @property string $startDate
 * @property string $status
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $divisionID
 * @property int $modifiedByAgentID
 * @property int $agentID
 * @property int $createdByAgentID
 * @property int $addressOfRecordID
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Division $division
 * @property AddressOfRecord $addressOfRecord
 * @property AccessionAgent[] $accessionAgents
 * @property AccessionAuthorization[] $accessionAuthorizations
 * @property Accession[] $accessions
 * @property RepositoryAgreementAttachment[] $repositoryAgreementAttachments
 */
class RepositoryAgreement extends BaseModel
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
    protected $table = 'repositoryagreement';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'RepositoryAgreementID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'AgentID', 'AgentID');
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
    public function accessionAgents(): HasMany
    {
        return $this->hasMany(AccessionAgent::class, 'RepositoryAgreementID', 'RepositoryAgreementID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessionAuthorizations(): HasMany
    {
        return $this->hasMany(AccessionAuthorization::class, 'RepositoryAgreementID', 'RepositoryAgreementID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessions(): HasMany
    {
        return $this->hasMany(Accession::class, 'RepositoryAgreementID', 'RepositoryAgreementID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function repositoryAgreementAttachments(): HasMany
    {
        return $this->hasMany(RepositoryAgreementAttachment::class, 'RepositoryAgreementID', 'RepositoryAgreementID');
    }

}
