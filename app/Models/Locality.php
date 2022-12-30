<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $localityID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $datum
 * @property float $elevationAccuracy
 * @property string $elevationMethod
 * @property string $gML
 * @property string $gUID
 * @property string $lat1Text
 * @property string $lat2Text
 * @property float $latLongAccuracy
 * @property string $latLongMethod
 * @property string $latLongType
 * @property float $latitude1
 * @property float $latitude2
 * @property string $localityName
 * @property string $long1Text
 * @property string $long2Text
 * @property float $longitude1
 * @property float $longitude2
 * @property float $maxElevation
 * @property float $minElevation
 * @property string $namedPlace
 * @property string $originalElevationUnit
 * @property int $originalLatLongUnit
 * @property string $relationToNamedPlace
 * @property string $remarks
 * @property string $shortName
 * @property int $srcLatLongUnit
 * @property string $text1
 * @property string $text2
 * @property string $verbatimElevation
 * @property int $visibility
 * @property int $geographyID
 * @property int $visibilitySetByID
 * @property int $disciplineID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $sGRStatus
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property string $verbatimLatitude
 * @property string $verbatimLongitude
 * @property int $paleoContextID
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property string $uniqueIdentifier
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property SpecifyUser $visibilitySetBy
 * @property PaleoContext $paleoContext
 * @property Geography $geography
 * @property CollectingEvent[] $collectingEvents
 * @property LatLonPolygon[] $latLonPolygons
 * @property LocalityAttachment[] $localityAttachments
 * @property LocalityCitation[] $localityCitations
 * @property LocalityNameAlias[] $localityNameAliass
 * @property LocalityDetail $localityDetail
 * @property GeoCoordDetail $geoCoordDetail
 */
class Locality extends BaseModel
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
    protected $table = 'locality';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LocalityID';

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
    public function visibilitySetBy(): BelongsTo
    {
        return $this->belongsTo(SpecifyUser::class, 'VisibilitySetByID', 'SpecifyUserID');
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
    public function geography(): BelongsTo
    {
        return $this->belongsTo(Geography::class, 'GeographyID', 'GeographyID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingEvents(): HasMany
    {
        return $this->hasMany(CollectingEvent::class, 'LocalityID', 'LocalityID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function latLonPolygons(): HasMany
    {
        return $this->hasMany(LatLonPolygon::class, 'LocalityID', 'LocalityID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localityAttachments(): HasMany
    {
        return $this->hasMany(LocalityAttachment::class, 'LocalityID', 'LocalityID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localityCitations(): HasMany
    {
        return $this->hasMany(LocalityCitation::class, 'LocalityID', 'LocalityID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localityNameAliass(): HasMany
    {
        return $this->hasMany(LocalityNameAlias::class, 'LocalityID', 'LocalityID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function localityDetail(): HasOne
    {
        return $this->hasOne(LocalityDetail::class, 'LocalityID', 'LocalityID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function geoCoordDetail(): HasOne
    {
        return $this->hasOne(GeoCoordDetail::class, 'LocalityID', 'LocalityID');
    }

}
