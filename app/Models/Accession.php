<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $accessionID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $accessionCondition
 * @property string $accessionNumber
 * @property string $dateAccessioned
 * @property string $dateAcknowledged
 * @property string $dateReceived
 * @property float $number1
 * @property float $number2
 * @property string $remarks
 * @property string $status
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property float $totalValue
 * @property string $type
 * @property string $verbatimDate
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $divisionID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $addressOfRecordID
 * @property int $repositoryAgreementID
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property string $text4
 * @property string $text5
 * @property RepositoryAgreement $repositoryAgreement
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Division $division
 * @property AddressOfRecord $addressOfRecord
 * @property AccessionAgent[] $accessionAgents
 * @property AccessionAttachment[] $accessionAttachments
 * @property AccessionAuthorization[] $accessionAuthorizations
 * @property AccessionCitation[] $accessionCitations
 * @property Appraisal[] $appraisals
 * @property TreatmentEvent[] $treatmentEvents
 * @property CollectionObject[] $collectionObjects
 */
class Accession extends BaseModel
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
    protected $table = 'accession';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AccessionID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repositoryAgreement(): BelongsTo
    {
        return $this->belongsTo(RepositoryAgreement::class, 'RepositoryAgreementID', 'RepositoryAgreementID');
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
        return $this->hasMany(AccessionAgent::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessionAttachments(): HasMany
    {
        return $this->hasMany(AccessionAttachment::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessionAuthorizations(): HasMany
    {
        return $this->hasMany(AccessionAuthorization::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessionCitations(): HasMany
    {
        return $this->hasMany(AccessionCitation::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appraisals(): HasMany
    {
        return $this->hasMany(Appraisal::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentEvents(): HasMany
    {
        return $this->hasMany(TreatmentEvent::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjects(): HasMany
    {
        return $this->hasMany(CollectionObject::class, 'AccessionID', 'AccessionID');
    }

}
