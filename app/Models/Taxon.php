<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $taxonID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $author
 * @property string $citesStatus
 * @property string $cOLStatus
 * @property string $commonName
 * @property string $cultivarName
 * @property string $environmentalProtectionStatus
 * @property string $esaStatus
 * @property string $fullName
 * @property string $groupNumber
 * @property string $gUID
 * @property int $highestChildNodeNumber
 * @property boolean $isAccepted
 * @property boolean $isHybrid
 * @property string $isisNumber
 * @property string $labelFormat
 * @property string $name
 * @property string $ncbiTaxonNumber
 * @property int $nodeNumber
 * @property int $number1
 * @property int $number2
 * @property int $rankID
 * @property string $remarks
 * @property string $source
 * @property string $taxonomicSerialNumber
 * @property string $text1
 * @property string $text2
 * @property string $unitInd1
 * @property string $unitInd2
 * @property string $unitInd3
 * @property string $unitInd4
 * @property string $unitName1
 * @property string $unitName2
 * @property string $unitName3
 * @property string $unitName4
 * @property string $usfwsCode
 * @property int $visibility
 * @property int $hybridParent1ID
 * @property int $acceptedID
 * @property int $taxonTreeDefID
 * @property int $modifiedByAgentID
 * @property int $parentID
 * @property int $hybridParent2ID
 * @property int $createdByAgentID
 * @property int $visibilitySetByID
 * @property int $taxonTreeDefItemID
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property int $integer4
 * @property int $integer5
 * @property string $text10
 * @property string $text11
 * @property string $text12
 * @property string $text13
 * @property string $text14
 * @property string $text15
 * @property string $text16
 * @property string $text17
 * @property string $text18
 * @property string $text19
 * @property string $text20
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $text9
 * @property boolean $yesNo10
 * @property boolean $yesNo11
 * @property boolean $yesNo12
 * @property boolean $yesNo13
 * @property boolean $yesNo14
 * @property boolean $yesNo15
 * @property boolean $yesNo16
 * @property boolean $yesNo17
 * @property boolean $yesNo18
 * @property boolean $yesNo19
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property boolean $yesNo6
 * @property boolean $yesNo7
 * @property boolean $yesNo8
 * @property boolean $yesNo9
 * @property string $lSID
 * @property int $taxonAttributeID
 * @property Taxon $accepted
 * @property Agent $modifiedByAgent
 * @property Taxon $hybridParent1
 * @property Taxon $hybridParent2
 * @property Agent $createdByAgent
 * @property SpecifyUser $visibilitySetBy
 * @property TaxonAttribute $taxonAttribute
 * @property TaxonTreeDefItem $taxonTreeDefItem
 * @property Taxon $parent
 * @property TaxonTreeDef $taxonTreeDef
 * @property CommonNameTx[] $commonNameTxs
 * @property CollectingEventAttribute[] $collectingEventAttributes
 * @property TaxonAttachment[] $taxonAttachments
 * @property TaxonCitation[] $taxonCitations
 * @property Taxon[] $hybridParent1Of
 * @property Taxon[] $hybridParent2Of
 * @property Taxon[] $synonyms
 * @property Determination[] $determinations
 * @property Taxon[] $children
 */
class Taxon extends BaseModel
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
    protected $table = 'taxon';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'TaxonID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accepted(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'AcceptedID', 'TaxonID');
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
    public function hybridParent1(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'HybridParent1ID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hybridParent2(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'HybridParent2ID', 'TaxonID');
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
    public function taxonAttribute(): BelongsTo
    {
        return $this->belongsTo(TaxonAttribute::class, 'TaxonAttributeID', 'TaxonAttributeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxonTreeDefItem(): BelongsTo
    {
        return $this->belongsTo(TaxonTreeDefItem::class, 'TaxonTreeDefItemID', 'TaxonTreeDefItemID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'ParentID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxonTreeDef(): BelongsTo
    {
        return $this->belongsTo(TaxonTreeDef::class, 'TaxonTreeDefID', 'TaxonTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Taxon::class, 'ParentID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commonNameTxs(): HasMany
    {
        return $this->hasMany(CommonNameTx::class, 'TaxonID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAttributes(): HasMany
    {
        return $this->hasMany(CollectingEventAttribute::class, 'HostTaxonID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxonAttachments(): HasMany
    {
        return $this->hasMany(TaxonAttachment::class, 'TaxonID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxonCitations(): HasMany
    {
        return $this->hasMany(TaxonCitation::class, 'TaxonID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function synonyms(): HasMany
    {
        return $this->hasMany(Taxon::class, 'AcceptedID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hybridParent1Of(): HasMany
    {
        return $this->hasMany(Taxon::class, 'HybridParent1ID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hybridParent2Of(): HasMany
    {
        return $this->hasMany(Taxon::class, 'HybridParent2ID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function determinations(): HasMany
    {
        return $this->hasMany(Determination::class, 'TaxonID', 'TaxonID');
    }

}
