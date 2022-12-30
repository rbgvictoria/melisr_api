<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $preparationAttributeID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property int $collectionMemberID
 * @property string $attrdate
 * @property float $number1
 * @property float $number2
 * @property float $number3
 * @property int $number4
 * @property int $number5
 * @property int $number6
 * @property int $number7
 * @property int $number8
 * @property int $number9
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
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Preparation $preparation
 */
class PreparationAttribute extends BaseModel
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
    protected $table = 'preparationattribute';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'PreparationAttributeID';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function preparation(): HasOne
    {
        return $this->hasOne(Preparation::class, 'PreparationAttributeID', 'PreparationAttributeID');
    }

}
