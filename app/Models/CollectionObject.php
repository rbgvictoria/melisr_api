<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $collectionObjectID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $altCatalogNumber
 * @property string $availability
 * @property string $catalogNumber
 * @property string $catalogedDate
 * @property int $catalogedDatePrecision
 * @property string $catalogedDateVerbatim
 * @property int $countAmt
 * @property boolean $deaccessioned
 * @property string $description
 * @property string $fieldNumber
 * @property string $gUID
 * @property string $inventoryDate
 * @property string $modifier
 * @property string $name
 * @property string $notifications
 * @property float $number1
 * @property float $number2
 * @property string $objectCondition
 * @property string $projectNumber
 * @property string $remarks
 * @property string $restrictions
 * @property string $text1
 * @property string $text2
 * @property float $totalValue
 * @property string $oCR
 * @property int $visibility
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property boolean $yesNo6
 * @property int $appraisalID
 * @property int $modifiedByAgentID
 * @property int $collectionID
 * @property int $collectingEventID
 * @property int $createdByAgentID
 * @property int $containerID
 * @property int $accessionID
 * @property int $catalogerID
 * @property int $paleoContextID
 * @property int $collectionObjectAttributeID
 * @property int $containerOwnerID
 * @property int $visibilitySetByID
 * @property int $fieldNotebookPageID
 * @property int $sGRStatus
 * @property string $reservedText
 * @property string $text3
 * @property int $integer1
 * @property int $integer2
 * @property int $reservedInteger3
 * @property int $reservedInteger4
 * @property string $reservedText2
 * @property string $reservedText3
 * @property int $inventorizedByID
 * @property string $date1
 * @property int $date1Precision
 * @property int $inventoryDatePrecision
 * @property int $agent1ID
 * @property int $numberOfDuplicates
 * @property string $embargoReason
 * @property string $embargoReleaseDate
 * @property int $embargoReleaseDatePrecision
 * @property string $embargoStartDate
 * @property int $embargoStartDatePrecision
 * @property string $text4
 * @property string $text5
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $uniqueIdentifier
 * @property int $embargoAuthorityID
 * @property Accession $accession
 * @property Agent $cataloger
 * @property Agent $modifiedByAgent
 * @property FieldNotebookPage $fieldNotebookPage
 * @property Agent $createdByAgent
 * @property SpecifyUser $visibilitySetBy
 * @property Collection $collection
 * @property PaleoContext $paleoContext
 * @property Agent $inventorizedBy
 * @property CollectionObjectAttribute $collectionObjectAttribute
 * @property Container $containerOwner
 * @property Appraisal $appraisal
 * @property CollectingEvent $collectingEvent
 * @property Agent $agent1
 * @property Agent $embargoAuthority
 * @property Container $container
 * @property CollectionObjectAttr[] $collectionObjectAttrs
 * @property CollectionObjectProperty[] $collectionObjectProperties
 * @property CollectionObjectCitation[] $collectionObjectCitations
 * @property CollectionObjectAttachment[] $collectionObjectAttachments
 * @property CollectionRelationship[] $leftSideCollections
 * @property CollectionRelationship[] $rightSideCollections
 * @property ConservDescription[] $conservDescriptions
 * @property DnaSequence[] $dnaSequences
 * @property ExsiccataItem[] $exsiccataItems
 * @property VoucherRelationship[] $voucherRelationships
 * @property OtherIdentifier[] $otherIdentifiers
 * @property Preparation[] $preparations
 * @property TreatmentEvent[] $treatmentEvents
 * @property Determination[] $determinations
 * @property Project[] $projects
 */
class CollectionObject extends BaseModel
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
    protected $table = 'collectionobject';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectionObjectID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accession(): BelongsTo
    {
        return $this->belongsTo(Accession::class, 'AccessionID', 'AccessionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cataloger(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CatalogerID', 'AgentID');
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
    public function fieldNotebookPage(): BelongsTo
    {
        return $this->belongsTo(FieldNotebookPage::class, 'FieldNotebookPageID', 'FieldNotebookPageID');
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
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'CollectionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paleoContext(): BelongsTo
    {
        return $this->belongsTo(PaleoContext::class, 'PaleoContextID', 'PaleoContextID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventorizedBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'InventorizedByID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectionObjectAttribute(): BelongsTo
    {
        return $this->belongsTo(CollectionObjectAttribute::class, 'CollectionObjectAttributeID', 'CollectionObjectAttributeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function containerOwner(): BelongsTo
    {
        return $this->belongsTo(Container::class, 'ContainerOwnerID', 'ContainerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appraisal(): BelongsTo
    {
        return $this->belongsTo(Appraisal::class, 'AppraisalID', 'AppraisalID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collectingEvent(): BelongsTo
    {
        return $this->belongsTo(CollectingEvent::class, 'CollectingEventID', 'CollectingEventID');
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
    public function embargoAuthority(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'EmbargoAuthorityID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function container(): BelongsTo
    {
        return $this->belongsTo(Container::class, 'ContainerID', 'ContainerID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_colobj', 'CollectionObjectID', 'ProjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjectAttrs(): HasMany
    {
        return $this->hasMany(CollectionObjectAttr::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjectProperties(): HasMany
    {
        return $this->hasMany(CollectionObjectProperty::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjectCitations(): HasMany
    {
        return $this->hasMany(CollectionObjectCitation::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjectAttachments(): HasMany
    {
        return $this->hasMany(CollectionObjectAttachment::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leftSideCollections(): HasMany
    {
        return $this->hasMany(CollectionRelationship::class, 'LeftSideCollectionID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rightSideCollections(): HasMany
    {
        return $this->hasMany(CollectionRelationship::class, 'RightSideCollectionID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservDescriptions(): HasMany
    {
        return $this->hasMany(ConservDescription::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dnaSequences(): HasMany
    {
        return $this->hasMany(DnaSequence::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exsiccataItems(): HasMany
    {
        return $this->hasMany(ExsiccataItem::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voucherRelationships(): HasMany
    {
        return $this->hasMany(VoucherRelationship::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function otherIdentifiers(): HasMany
    {
        return $this->hasMany(OtherIdentifier::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preparations(): HasMany
    {
        return $this->hasMany(Preparation::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentEvents(): HasMany
    {
        return $this->hasMany(TreatmentEvent::class, 'CollectionObjectID', 'CollectionObjectID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function determinations(): HasMany
    {
        return $this->hasMany(Determination::class, 'CollectionObjectID', 'CollectionObjectID');
    }

}
