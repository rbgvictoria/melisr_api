<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $commonNameTxID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $author
 * @property string $country
 * @property string $language
 * @property string $name
 * @property string $variant
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property int $taxonID
 * @property Taxon $taxon
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property CommonNameTxCitation[] $commonNameTxCitations
 */
class CommonNameTx extends BaseModel
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
    protected $table = 'commonnametx';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CommonNameTxID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxon(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'TaxonID', 'TaxonID');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commonNameTxCitations(): HasMany
    {
        return $this->hasMany(CommonNameTxCitation::class, 'CommonNameTxID', 'CommonNameTxID');
    }

}
