<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $commonNameTxCitationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property float $number1
 * @property float $number2
 * @property string $remarks
 * @property string $text1
 * @property string $text2
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property int $modifiedByAgentID
 * @property int $referenceWorkID
 * @property int $createdByAgentID
 * @property int $commonNameTxID
 * @property string $figureNumber
 * @property boolean $isFigured
 * @property string $pageNumber
 * @property string $plateNumber
 * @property CommonNameTx $commonNameTx
 * @property Agent $modifiedByAgent
 * @property ReferenceWork $referenceWork
 * @property Agent $createdByAgent
 */
class CommonNameTxCitation extends BaseModel
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
    protected $table = 'commonnametxcitation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CommonNameTxCitationID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commonNameTx(): BelongsTo
    {
        return $this->belongsTo(CommonNameTx::class, 'CommonNameTxID', 'CommonNameTxID');
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
    public function referenceWork(): BelongsTo
    {
        return $this->belongsTo(ReferenceWork::class, 'ReferenceWorkID', 'ReferenceWorkID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdByAgent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'CreatedByAgentID', 'AgentID');
    }


}
