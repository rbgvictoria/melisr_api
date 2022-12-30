<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $collectionObjectAttributeID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property float $number1
 * @property float $number10
 * @property float $number11
 * @property float $number12
 * @property float $number13
 * @property float $number14
 * @property float $number15
 * @property float $number16
 * @property float $number17
 * @property float $number18
 * @property float $number19
 * @property float $number2
 * @property float $number20
 * @property float $number21
 * @property float $number22
 * @property float $number23
 * @property float $number24
 * @property float $number25
 * @property float $number26
 * @property float $number27
 * @property float $number28
 * @property float $number29
 * @property float $number3
 * @property int $number30
 * @property float $number31
 * @property float $number32
 * @property float $number33
 * @property float $number34
 * @property float $number35
 * @property float $number36
 * @property float $number37
 * @property float $number38
 * @property float $number39
 * @property float $number4
 * @property float $number40
 * @property float $number41
 * @property float $number42
 * @property float $number5
 * @property float $number6
 * @property float $number7
 * @property int $number8
 * @property float $number9
 * @property string $remarks
 * @property string $text1
 * @property string $text10
 * @property string $text11
 * @property string $text12
 * @property string $text13
 * @property string $text14
 * @property string $text15
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
 * @property boolean $yesNo6
 * @property boolean $yesNo7
 * @property int $createdByAgentID
 * @property int $modifiedByAgentID
 * @property float $bottomDistance
 * @property string $direction
 * @property string $distanceUnits
 * @property string $positionState
 * @property float $topDistance
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
 * @property string $text16
 * @property string $text17
 * @property string $text18
 * @property string $text19
 * @property string $text20
 * @property string $text21
 * @property string $text22
 * @property string $text23
 * @property string $text24
 * @property string $text25
 * @property string $text26
 * @property string $text27
 * @property string $text28
 * @property string $text29
 * @property string $text30
 * @property boolean $yesNo10
 * @property boolean $yesNo11
 * @property boolean $yesNo12
 * @property boolean $yesNo13
 * @property boolean $yesNo14
 * @property boolean $yesNo15
 * @property boolean $yesNo16
 * @property boolean $yesNo17
 * @property boolean $yesNo18
 * @property boolean $yesNo19
 * @property boolean $yesNo20
 * @property boolean $yesNo8
 * @property boolean $yesNo9
 * @property string $date1
 * @property int $date1Precision
 * @property int $agent1ID
 * @property string $text31
 * @property string $text32
 * @property string $text33
 * @property string $text34
 * @property string $text35
 * @property string $text36
 * @property string $text37
 * @property string $text38
 * @property string $text39
 * @property string $text40
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $agent1
 * @property CollectionObject $collectionObject
 */
class CollectionObjectAttribute extends BaseModel
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
    protected $table = 'collectionobjectattribute';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectionObjectAttributeID';

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
    public function agent1(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent1ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function collectionObject(): HasOne
    {
        return $this->hasOne(CollectionObject::class, 'CollectionObjectAttributeID', 'CollectionObjectAttributeID');
    }

}
