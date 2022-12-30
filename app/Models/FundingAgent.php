<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $fundingAgentID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property boolean $isPrimary
 * @property int $orderNumber
 * @property string $remarks
 * @property string $type
 * @property int $divisionID
 * @property int $collectingTripID
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $agentID
 */
class FundingAgent extends BaseModel
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
    protected $table = 'fundingagent';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FundingAgentID';

    /**
     * @var array
     */
    protected $guarded = [];



}
