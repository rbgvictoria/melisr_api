<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $latLonPolygonID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $description
 * @property boolean $isPolyline
 * @property string $name
 * @property int $localityID
 * @property int $spVisualQueryID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Locality $locality
 * @property LatLonPolygonPnt[] $latLonPolygonPnts
 */
class LatLonPolygon extends BaseModel
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
    protected $table = 'latlonpolygon';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LatLonPolygonID';

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function latLonPolygonPnts(): HasMany
    {
        return $this->hasMany(LatLonPolygonPnt::class, 'LatLonPolygonID', 'LatLonPolygonID');
    }

}
