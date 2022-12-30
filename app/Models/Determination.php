<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $determinationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $addendum
 * @property string $alternateName
 * @property string $confidence
 * @property string $determinedDate
 * @property int $determinedDatePrecision
 * @property string $featureOrBasis
 * @property boolean $isCurrent
 * @property string $method
 * @property string $nameUsage
 * @property float $number1
 * @property float $number2
 * @property string $qualifier
 * @property string $varQualifer
 * @property string $remarks
 * @property string $subSpQualifier
 * @property string $text1
 * @property string $text2
 * @property string $typeStatusName
 * @property string $varQualifier
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property string $gUID
 * @property int $collectionObjectID
 * @property int $determinerID
 * @property int $preferredTaxonID
 * @property int $taxonID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property int $integer4
 * @property int $integer5
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property Taxon $taxon
 * @property Taxon $preferredTaxon
 * @property Agent $modifiedByAgent
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 * @property Agent $determiner
 * @property DeterminationCitation[] $determinationCitations
 * @property Determiner[] $determiners
 */
class Determination extends BaseModel
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
    protected $table = 'determination';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DeterminationID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxon(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'TaxonID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preferredTaxon(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'PreferredTaxonID', 'TaxonID');
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
    public function collectionObject(): BelongsTo
    {
        return $this->belongsTo(CollectionObject::class, 'CollectionObjectID', 'CollectionObjectID');
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
    public function determiner(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'DeterminerID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function determinationCitations(): HasMany
    {
        return $this->hasMany(DeterminationCitation::class, 'DeterminationID', 'DeterminationID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function determiners(): HasMany
    {
        return $this->hasMany(Determiner::class, 'DeterminationID', 'DeterminationID');
    }

}
