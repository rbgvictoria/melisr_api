<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $accessionCitationID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $figureNumber
 * @property boolean $isFigured
 * @property string $pageNumber
 * @property string $plateNumber
 * @property string $remarks
 * @property int $referenceWorkID
 * @property int $createdByAgentID
 * @property int $accessionID
 * @property int $modifiedByAgentID
 * @property Accession $accession
 * @property Agent $modifiedByAgent
 * @property ReferenceWork $referenceWork
 * @property Agent $createdByAgent
 */
class AccessionCitation extends BaseModel
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
    protected $table = 'accessioncitation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'AccessionCitationID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accession(): BelongsTo
    {
        return $this->belongsTo(Accession::class, 'AccessionID', 'AccessionID');
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
