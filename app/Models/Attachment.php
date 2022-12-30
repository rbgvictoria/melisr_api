<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $attachmentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $attachmentLocation
 * @property string $copyrightDate
 * @property string $copyrightHolder
 * @property string $credit
 * @property string $dateImaged
 * @property string $fileCreatedDate
 * @property string $license
 * @property string $mimeType
 * @property string $origFilename
 * @property string $remarks
 * @property string $title
 * @property int $tableID
 * @property int $scopeID
 * @property int $scopeType
 * @property string $gUID
 * @property int $visibility
 * @property int $attachmentImageAttributeID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $visibilitySetByID
 * @property boolean $isPublic
 * @property int $creatorID
 * @property string $captureDevice
 * @property string $licenseLogoUrl
 * @property string $metadataText
 * @property string $subjectOrientation
 * @property string $subtype
 * @property string $type
 * @property string $attachmentStorageConfig
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property SpecifyUser $visibilitySetBy
 * @property Agent $creator
 * @property AttachmentImageAttribute $attachmentImageAttribute
 * @property AccessionAttachment[] $accessionAttachments
 * @property AgentAttachment[] $agentAttachments
 * @property AttachmentMetadata[] $attachmentMetadatas
 * @property AttachmentTag[] $attachmentTags
 * @property CollectingEventAttachment[] $collectingEventAttachments
 * @property CollectingTripAttachment[] $collectingTripAttachments
 * @property CollectionObjectAttachment[] $collectionObjectAttachments
 * @property ConservDescriptionAttachment[] $conservDescriptionAttachments
 * @property ConservEventAttachment[] $conservEventAttachments
 * @property DnaSequenceAttachment[] $dnaSequenceAttachments
 * @property Dnasequencerunattachment[] $dnasequencerunattachments
 * @property FieldNotebookAttachment[] $fieldNotebookAttachments
 * @property FieldNotebookPageAttachment[] $fieldNotebookPageAttachments
 * @property FieldNotebookPageSetAttachment[] $fieldNotebookPageSetAttachments
 * @property ExchangeOutAttachment[] $exchangeOutAttachments
 * @property LoanAttachment[] $loanAttachments
 * @property LocalityAttachment[] $localityAttachments
 * @property ExchangeInAttachment[] $exchangeInAttachments
 * @property PermitAttachment[] $permitAttachments
 * @property PreparationAttachment[] $preparationAttachments
 * @property RepositoryAgreementAttachment[] $repositoryAgreementAttachments
 * @property StorageAttachment[] $storageAttachments
 * @property TaxonAttachment[] $taxonAttachments
 * @property TreatmentEventAttachment[] $treatmentEventAttachments
 * @property DisposalAttachment[] $disposalAttachments
 * @property DeaccessionAttachment[] $deaccessionAttachments
 */
class Attachment extends BaseModel
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
    protected $table = 'attachment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AttachmentID';

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
    public function visibilitySetBy(): BelongsTo
    {
        return $this->belongsTo(SpecifyUser::class, 'VisibilitySetByID', 'SpecifyUserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CreatorID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attachmentImageAttribute(): BelongsTo
    {
        return $this->belongsTo(AttachmentImageAttribute::class, 'AttachmentImageAttributeID', 'AttachmentImageAttributeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessionAttachments(): HasMany
    {
        return $this->hasMany(AccessionAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentAttachments(): HasMany
    {
        return $this->hasMany(AgentAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachmentMetadatas(): HasMany
    {
        return $this->hasMany(AttachmentMetadata::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachmentTags(): HasMany
    {
        return $this->hasMany(AttachmentTag::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAttachments(): HasMany
    {
        return $this->hasMany(CollectingEventAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingTripAttachments(): HasMany
    {
        return $this->hasMany(CollectingTripAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjectAttachments(): HasMany
    {
        return $this->hasMany(CollectionObjectAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservDescriptionAttachments(): HasMany
    {
        return $this->hasMany(ConservDescriptionAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservEventAttachments(): HasMany
    {
        return $this->hasMany(ConservEventAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dnaSequenceAttachments(): HasMany
    {
        return $this->hasMany(DnaSequenceAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dnasequencerunattachments(): HasMany
    {
        return $this->hasMany(Dnasequencerunattachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookAttachments(): HasMany
    {
        return $this->hasMany(FieldNotebookAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookPageAttachments(): HasMany
    {
        return $this->hasMany(FieldNotebookPageAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookPageSetAttachments(): HasMany
    {
        return $this->hasMany(FieldNotebookPageSetAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOutAttachments(): HasMany
    {
        return $this->hasMany(ExchangeOutAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanAttachments(): HasMany
    {
        return $this->hasMany(LoanAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localityAttachments(): HasMany
    {
        return $this->hasMany(LocalityAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeInAttachments(): HasMany
    {
        return $this->hasMany(ExchangeInAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permitAttachments(): HasMany
    {
        return $this->hasMany(PermitAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preparationAttachments(): HasMany
    {
        return $this->hasMany(PreparationAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function repositoryAgreementAttachments(): HasMany
    {
        return $this->hasMany(RepositoryAgreementAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storageAttachments(): HasMany
    {
        return $this->hasMany(StorageAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxonAttachments(): HasMany
    {
        return $this->hasMany(TaxonAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentEventAttachments(): HasMany
    {
        return $this->hasMany(TreatmentEventAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disposalAttachments(): HasMany
    {
        return $this->hasMany(DisposalAttachment::class, 'AttachmentID', 'AttachmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deaccessionAttachments(): HasMany
    {
        return $this->hasMany(DeaccessionAttachment::class, 'AttachmentID', 'AttachmentID');
    }

}
