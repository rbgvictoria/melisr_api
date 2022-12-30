<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $referenceWorkID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $gUID
 * @property boolean $isPublished
 * @property string $iSBN
 * @property string $libraryNumber
 * @property float $number1
 * @property float $number2
 * @property string $pages
 * @property string $placeOfPublication
 * @property string $publisher
 * @property int $referenceWorkType
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property string $title
 * @property string $uRL
 * @property string $volume
 * @property string $workDate
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $modifiedByAgentID
 * @property int $journalID
 * @property int $institutionID
 * @property int $createdByAgentID
 * @property int $containedRFParentID
 * @property string $doi
 * @property string $uri
 * @property ReferenceWork $containedRFParent
 * @property Agent $modifiedByAgent
 * @property Journal $journal
 * @property Agent $createdByAgent
 * @property Institution $institution
 * @property AccessionCitation[] $accessionCitations
 * @property CommonNameTxCitation[] $commonNameTxCitations
 * @property Author[] $authors
 * @property CollectionObjectCitation[] $collectionObjectCitations
 * @property DeterminationCitation[] $determinationCitations
 * @property Exsiccata[] $exsiccatas
 * @property LocalityCitation[] $localityCitations
 * @property ReferenceWork[] $referenceWorks
 * @property TaxonCitation[] $taxonCitations
 * @property DNASequencingRunCitation[] $dNASequencingRunCitations
 */
class ReferenceWork extends BaseModel
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
    protected $table = 'referencework';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ReferenceWorkID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function containedRFParent(): BelongsTo
    {
        return $this->belongsTo(ReferenceWork::class, 'ContainedRFParentID', 'ReferenceWorkID');
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
    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class, 'JournalID', 'JournalID');
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
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class, 'InstitutionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessionCitations(): HasMany
    {
        return $this->hasMany(AccessionCitation::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commonNameTxCitations(): HasMany
    {
        return $this->hasMany(CommonNameTxCitation::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authors(): HasMany
    {
        return $this->hasMany(Author::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectionObjectCitations(): HasMany
    {
        return $this->hasMany(CollectionObjectCitation::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function determinationCitations(): HasMany
    {
        return $this->hasMany(DeterminationCitation::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exsiccatas(): HasMany
    {
        return $this->hasMany(Exsiccata::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localityCitations(): HasMany
    {
        return $this->hasMany(LocalityCitation::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referenceWorks(): HasMany
    {
        return $this->hasMany(ReferenceWork::class, 'ContainedRFParentID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxonCitations(): HasMany
    {
        return $this->hasMany(TaxonCitation::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dNASequencingRunCitations(): HasMany
    {
        return $this->hasMany(DNASequencingRunCitation::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

}
