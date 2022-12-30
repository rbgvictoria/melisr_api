<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $latLonPolygonPntID
 * @property int $elevation
 * @property float $latitude
 * @property float $longitude
 * @property int $ordinal
 * @property int $latLonPolygonID
 * @property LatLonPolygon $latLonPolygon
 */
class LatLonPolygonPnt extends BaseModel
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
    protected $table = 'latlonpolygonpnt';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'LatLonPolygonPntID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function latLonPolygon(): BelongsTo
    {
        return $this->belongsTo(LatLonPolygon::class, 'LatLonPolygonID', 'LatLonPolygonID');
    }


}
