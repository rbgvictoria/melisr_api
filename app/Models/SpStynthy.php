<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $spStynthyID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property string $metaXML
 * @property int $updatePeriodDays
 * @property string $lastExported
 * @property int $collectionID
 * @property string $mappingXML
 * @property string $key1
 * @property string $key2
 */
class SpStynthy extends BaseModel
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
    protected $table = 'spstynthy';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'SpStynthyID';

    /**
     * @var array
     */
    protected $guarded = [];



}
