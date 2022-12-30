<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $collectingEventAttributeID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property float $number1
 * @property float $number10
 * @property float $number11
 * @property float $number12
 * @property float $number13
 * @property float $number2
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property float $number6
 * @property float $number7
 * @property float $number8
 * @property float $number9
 * @property string $remarks
 * @property string $text1
 * @property string $text10
 * @property string $text11
 * @property string $text12
 * @property string $text13
 * @property string $text14
 * @property string $text15
 * @property string $text16
 * @property string $text17
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $text9
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property int $modifiedByAgentID
 * @property int $disciplineID
 * @property int $createdByAgentID
 * @property int $hostTaxonID
 * @property int $integer1
 * @property int $integer10
 * @property int $integer2
 * @property int $integer3
 * @property int $integer4
 * @property int $integer5
 * @property int $integer6
 * @property int $integer7
 * @property int $integer8
 * @property int $integer9
 * @property Taxon $hostTaxon
 * @property Discipline $discipline
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property CollectingEvent $collectingEvent
 */
class CollectingEventAttribute extends BaseModel
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
    protected $table = 'collectingeventattribute';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectingEventAttributeID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hostTaxon(): BelongsTo
    {
        return $this->belongsTo(Taxon::class, 'HostTaxonID', 'TaxonID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'DisciplineID', 'UserGroupScopeId');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function collectingEvent(): HasOne
    {
        return $this->hasOne(CollectingEvent::class, 'CollectingEventAttributeID', 'CollectingEventAttributeID');
    }

}
