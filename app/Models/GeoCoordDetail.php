<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $geoCoordDetailID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $geoRefAccuracyUnits
 * @property string $geoRefDetDate
 * @property string $geoRefDetRef
 * @property string $geoRefRemarks
 * @property string $geoRefVerificationStatus
 * @property float $maxUncertaintyEst
 * @property string $maxUncertaintyEstUnit
 * @property string $uncertaintyPolygon
 * @property string $errorPolygon
 * @property float $namedPlaceExtent
 * @property string $noGeoRefBecause
 * @property string $originalCoordSystem
 * @property string $protocol
 * @property string $source
 * @property string $validation
 * @property int $createdByAgentID
 * @property int $localityID
 * @property int $agentID
 * @property int $modifiedByAgentID
 * @property float $geoRefAccuracy
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $geoRefCompiledDate
 * @property int $compiledByID
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property int $integer4
 * @property int $integer5
 * @property float $number1
 * @property float $number2
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $text4
 * @property string $text5
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $compiledBy
 * @property Locality $locality
 */
class GeoCoordDetail extends BaseModel
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
    protected $table = 'geocoorddetail';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GeoCoordDetailID';

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
    public function compiledBy(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CompiledByID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class, 'LocalityID', 'LocalityID');
    }


}
