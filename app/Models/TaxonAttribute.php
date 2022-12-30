<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $taxonAttributeID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $date1
 * @property int $date1Precision
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
 * @property string $text41
 * @property string $text42
 * @property string $text43
 * @property string $text44
 * @property string $text45
 * @property string $text46
 * @property string $text47
 * @property string $text48
 * @property string $text49
 * @property string $text5
 * @property string $text50
 * @property string $text51
 * @property string $text52
 * @property string $text53
 * @property string $text54
 * @property string $text55
 * @property string $text56
 * @property string $text57
 * @property string $text58
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
 * @property boolean $yesNo21
 * @property boolean $yesNo22
 * @property boolean $yesNo23
 * @property boolean $yesNo24
 * @property boolean $yesNo25
 * @property boolean $yesNo26
 * @property boolean $yesNo27
 * @property boolean $yesNo28
 * @property boolean $yesNo29
 * @property boolean $yesNo3
 * @property boolean $yesNo30
 * @property boolean $yesNo31
 * @property boolean $yesNo32
 * @property boolean $yesNo33
 * @property boolean $yesNo34
 * @property boolean $yesNo35
 * @property boolean $yesNo36
 * @property boolean $yesNo37
 * @property boolean $yesNo38
 * @property boolean $yesNo39
 * @property boolean $yesNo4
 * @property boolean $yesNo40
 * @property boolean $yesNo41
 * @property boolean $yesNo42
 * @property boolean $yesNo43
 * @property boolean $yesNo44
 * @property boolean $yesNo45
 * @property boolean $yesNo46
 * @property boolean $yesNo47
 * @property boolean $yesNo48
 * @property boolean $yesNo49
 * @property boolean $yesNo5
 * @property boolean $yesNo50
 * @property boolean $yesNo51
 * @property boolean $yesNo52
 * @property boolean $yesNo53
 * @property boolean $yesNo54
 * @property boolean $yesNo55
 * @property boolean $yesNo56
 * @property boolean $yesNo57
 * @property boolean $yesNo58
 * @property boolean $yesNo59
 * @property boolean $yesNo6
 * @property boolean $yesNo60
 * @property boolean $yesNo61
 * @property boolean $yesNo62
 * @property boolean $yesNo63
 * @property boolean $yesNo64
 * @property boolean $yesNo65
 * @property boolean $yesNo66
 * @property boolean $yesNo67
 * @property boolean $yesNo68
 * @property boolean $yesNo69
 * @property boolean $yesNo7
 * @property boolean $yesNo70
 * @property boolean $yesNo71
 * @property boolean $yesNo72
 * @property boolean $yesNo73
 * @property boolean $yesNo74
 * @property boolean $yesNo75
 * @property boolean $yesNo76
 * @property boolean $yesNo77
 * @property boolean $yesNo78
 * @property boolean $yesNo79
 * @property boolean $yesNo8
 * @property boolean $yesNo80
 * @property boolean $yesNo81
 * @property boolean $yesNo82
 * @property boolean $yesNo9
 * @property int $agent1ID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property Agent $modifiedByAgent
 * @property Agent $createdByAgent
 * @property Agent $agent1
 * @property Taxon $taxon
 */
class TaxonAttribute extends BaseModel
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
    protected $table = 'taxonattribute';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'TaxonAttributeID';

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
    public function taxon(): HasOne
    {
        return $this->hasOne(Taxon::class, 'TaxonAttributeID', 'TaxonAttributeID');
    }

}
