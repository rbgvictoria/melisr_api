<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $localityDetailID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $baseMeridian
 * @property string $drainage
 * @property float $startDepth
 * @property string $startdepthunit
 * @property string $startDepthVerbatim
 * @property float $endDepth
 * @property string $enddepthunit
 * @property string $endDepthVerbatim
 * @property string $gML
 * @property string $hucCode
 * @property string $island
 * @property string $islandGroup
 * @property string $mgrsZone
 * @property string $nationalParkName
 * @property float $number1
 * @property float $number2
 * @property string $rangeDesc
 * @property string $rangeDirection
 * @property string $section
 * @property string $sectionPart
 * @property string $text1
 * @property string $text2
 * @property string $township
 * @property string $townshipDirection
 * @property string $utmDatum
 * @property float $utmEasting
 * @property int $utmFalseEasting
 * @property int $utmFalseNorthing
 * @property float $utmNorthing
 * @property float $utmOrigLatitude
 * @property float $utmOrigLongitude
 * @property float $utmScale
 * @property int $utmZone
 * @property string $waterBody
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $modifiedByAgentID
 * @property int $localityID
 * @property int $createdByAgentID
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $paleoLat
 * @property string $paleoLng
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Locality $locality
 */
class LocalityDetail extends BaseModel
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
    protected $table = 'localitydetail';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LocalityDetailID';

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
    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class, 'LocalityID', 'LocalityID');
    }


}
