<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $userGroupScopeId
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $disciplineId
 * @property string $name
 * @property string $regNumber
 * @property string $type
 * @property int $taxonTreeDefID
 * @property int $dataTypeID
 * @property int $geologicTimePeriodTreeDefID
 * @property int $lithoStratTreeDefID
 * @property int $geographyTreeDefID
 * @property int $divisionID
 * @property boolean $isPaleoContextEmbedded
 * @property string $paleoContextChildTable
 * @property LithoStratTreeDef $lithoStratTreeDef
 * @property Division $division
 * @property GeologicTimePeriodTreeDef $geologicTimePeriodTreeDef
 * @property GeographyTreeDef $geographyTreeDef
 * @property DataType $dataType
 * @property TaxonTreeDef $taxonTreeDef
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property AttributeDef[] $attributeDefs
 * @property CollectingEvent[] $collectingEvents
 * @property CollectingTripAttribute[] $collectingTripAttributes
 * @property Collection[] $collections
 * @property ExchangeInPrep[] $exchangeInPreps
 * @property ExchangeOutPrep[] $exchangeOutPreps
 * @property FieldNotebook[] $fieldNotebooks
 * @property FieldNotebookPage[] $fieldNotebookPages
 * @property FieldNotebookPageSet[] $fieldNotebookPageSets
 * @property GiftAgent[] $giftAgents
 * @property GiftPreparation[] $giftPreparations
 * @property PaleoContext[] $paleoContexts
 * @property CollectingTrip[] $collectingTrips
 * @property LoanAgent[] $loanAgents
 * @property LoanPreparation[] $loanPreparations
 * @property LoanReturnPreparation[] $loanReturnPreparations
 * @property LocalityCitation[] $localityCitations
 * @property CollectingEventAttribute[] $collectingEventAttributes
 * @property LocalityNameAlias[] $localityNameAliass
 * @property Shipment[] $shipments
 * @property Gift[] $gifts
 * @property Locality[] $localities
 * @property Loan[] $loans
 */
class Discipline extends BaseModel
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
    protected $table = 'discipline';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'UserGroupScopeId';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lithoStratTreeDef(): BelongsTo
    {
        return $this->belongsTo(LithoStratTreeDef::class, 'LithoStratTreeDefID', 'LithoStratTreeDefID');
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
    public function geologicTimePeriodTreeDef(): BelongsTo
    {
        return $this->belongsTo(GeologicTimePeriodTreeDef::class, 'GeologicTimePeriodTreeDefID', 'GeologicTimePeriodTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geographyTreeDef(): BelongsTo
    {
        return $this->belongsTo(GeographyTreeDef::class, 'GeographyTreeDefID', 'GeographyTreeDefID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataType(): BelongsTo
    {
        return $this->belongsTo(DataType::class, 'DataTypeID', 'DataTypeID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxonTreeDef(): BelongsTo
    {
        return $this->belongsTo(TaxonTreeDef::class, 'TaxonTreeDefID', 'TaxonTreeDefID');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeDefs(): HasMany
    {
        return $this->hasMany(AttributeDef::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEvents(): HasMany
    {
        return $this->hasMany(CollectingEvent::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingTripAttributes(): HasMany
    {
        return $this->hasMany(CollectingTripAttribute::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeInPreps(): HasMany
    {
        return $this->hasMany(ExchangeInPrep::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangeOutPreps(): HasMany
    {
        return $this->hasMany(ExchangeOutPrep::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebooks(): HasMany
    {
        return $this->hasMany(FieldNotebook::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookPages(): HasMany
    {
        return $this->hasMany(FieldNotebookPage::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldNotebookPageSets(): HasMany
    {
        return $this->hasMany(FieldNotebookPageSet::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function giftAgents(): HasMany
    {
        return $this->hasMany(GiftAgent::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function giftPreparations(): HasMany
    {
        return $this->hasMany(GiftPreparation::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paleoContexts(): HasMany
    {
        return $this->hasMany(PaleoContext::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingTrips(): HasMany
    {
        return $this->hasMany(CollectingTrip::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanAgents(): HasMany
    {
        return $this->hasMany(LoanAgent::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanPreparations(): HasMany
    {
        return $this->hasMany(LoanPreparation::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanReturnPreparations(): HasMany
    {
        return $this->hasMany(LoanReturnPreparation::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localityCitations(): HasMany
    {
        return $this->hasMany(LocalityCitation::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEventAttributes(): HasMany
    {
        return $this->hasMany(CollectingEventAttribute::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localityNameAliass(): HasMany
    {
        return $this->hasMany(LocalityNameAlias::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gifts(): HasMany
    {
        return $this->hasMany(Gift::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class, 'DisciplineID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'DisciplineID', 'UserGroupScopeId');
    }

}
