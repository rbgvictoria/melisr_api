<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $collectionObjectPropertyID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $date1
 * @property string $date10
 * @property string $date11
 * @property string $date12
 * @property string $date13
 * @property string $date14
 * @property string $date15
 * @property string $date16
 * @property string $date17
 * @property string $date18
 * @property string $date19
 * @property string $date2
 * @property string $date20
 * @property string $date3
 * @property string $date4
 * @property string $date5
 * @property string $date6
 * @property string $date7
 * @property string $date8
 * @property string $date9
 * @property string $gUID
 * @property int $integer1
 * @property int $integer10
 * @property int $integer11
 * @property int $integer12
 * @property int $integer13
 * @property int $integer14
 * @property int $integer15
 * @property int $integer16
 * @property int $integer17
 * @property int $integer18
 * @property int $integer19
 * @property int $integer2
 * @property int $integer20
 * @property int $integer21
 * @property int $integer22
 * @property int $integer23
 * @property int $integer24
 * @property int $integer25
 * @property int $integer26
 * @property int $integer27
 * @property int $integer28
 * @property int $integer29
 * @property int $integer3
 * @property int $integer30
 * @property int $integer4
 * @property int $integer5
 * @property int $integer6
 * @property int $integer7
 * @property int $integer8
 * @property int $integer9
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
 * @property float $number30
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
 * @property string $text18
 * @property string $text19
 * @property string $text2
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
 * @property string $text3
 * @property string $text30
 * @property string $text31
 * @property string $text32
 * @property string $text33
 * @property string $text34
 * @property string $text35
 * @property string $text36
 * @property string $text37
 * @property string $text38
 * @property string $text39
 * @property string $text4
 * @property string $text40
 * @property string $text5
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $text9
 * @property boolean $yesNo1
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
 * @property boolean $yesNo2
 * @property boolean $yesNo20
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property boolean $yesNo6
 * @property boolean $yesNo7
 * @property boolean $yesNo8
 * @property boolean $yesNo9
 * @property int $agent11ID
 * @property int $agent10ID
 * @property int $agent5ID
 * @property int $createdByAgentID
 * @property int $agent12ID
 * @property int $agent2ID
 * @property int $agent18ID
 * @property int $agent6ID
 * @property int $agent8D
 * @property int $agent9ID
 * @property int $agent4ID
 * @property int $agent15ID
 * @property int $agent13ID
 * @property int $agent17ID
 * @property int $modifiedByAgentID
 * @property int $agent16ID
 * @property int $agent3ID
 * @property int $agent1ID
 * @property int $collectionObjectID
 * @property int $agent19ID
 * @property int $agent7ID
 * @property int $agent20ID
 * @property int $agent14ID
 * @property Agent $agent10
 * @property Agent $agent11
 * @property Agent $agent12
 * @property Agent $agent13
 * @property Agent $agent14
 * @property Agent $agent15
 * @property Agent $agent16
 * @property Agent $agent17
 * @property Agent $agent18
 * @property Agent $agent19
 * @property Agent $agent20
 * @property Agent $agent
 * @property Agent $modifiedByAgent
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 * @property Agent $agent1
 * @property Agent $agent2
 * @property Agent $agent3
 * @property Agent $agent4
 * @property Agent $agent5
 * @property Agent $agent6
 * @property Agent $agent7
 * @property Agent $agent9
 */
class CollectionObjectProperty extends BaseModel
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
    protected $table = 'collectionobjectproperty';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CollectionObjectPropertyID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent10(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent10ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent11(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent11ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent12(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent12ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent13(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent13ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent14(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent14ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent15(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent15ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent16(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent16ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent17(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent17ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent18(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent18ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent19(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent19ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent20(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent20ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent8D', 'AgentID');
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
    public function collectionObject(): BelongsTo
    {
        return $this->belongsTo(CollectionObject::class, 'CollectionObjectID', 'CollectionObjectID');
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent2(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent2ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent3(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent3ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent4(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent4ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent5(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent5ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent6(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent6ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent7(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent7ID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent9(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'Agent9ID', 'AgentID');
    }


}
