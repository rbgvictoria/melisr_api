<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $provider
 * @property string $providerid
 * @property int $specifyuserId
 * @property int $enabled
 * @property string $idtoken
 * @property SpecifyUser $specifyuser
 */
class Spuserexternalid extends BaseModel
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
    protected $table = 'spuserexternalid';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specifyuser(): BelongsTo
    {
        return $this->belongsTo(SpecifyUser::class, 'specifyuser_id', 'SpecifyUserID');
    }


}
