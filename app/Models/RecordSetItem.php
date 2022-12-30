<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $recordSetItemID
 * @property int $recordId
 * @property int $recordSetID
 * @property int $orderNumber
 * @property RecordSet $recordSet
 */
class RecordSetItem extends BaseModel
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
    protected $table = 'recordsetitem';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'RecordSetItemID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recordSet(): BelongsTo
    {
        return $this->belongsTo(RecordSet::class, 'RecordSetID', 'RecordSetID');
    }


}
