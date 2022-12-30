<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $conservDescriptionID
 * @property string $timestampCreated
 * @property string $timestampModified
 * @property int $version
 * @property string $backgroundInfo
 * @property string $composition
 * @property string $description
 * @property string $displayRecommendations
 * @property float $height
 * @property string $lightRecommendations
 * @property float $objLength
 * @property string $otherRecommendations
 * @property string $remarks
 * @property string $shortDesc
 * @property string $source
 * @property string $units
 * @property float $width
 * @property int $divisionID
 * @property int $modifiedByAgentID
 * @property int $createdByAgentID
 * @property int $collectionObjectID
 * @property string $catalogedDate
 * @property int $determinedDatePrecision
 * @property int $preparationID
 * @property string $date1
 * @property int $date1Precision
 * @property string $date2
 * @property int $date2Precision
 * @property string $date3
 * @property int $date3Precision
 * @property string $date4
 * @property int $date4Precision
 * @property string $date5
 * @property int $date5Precision
 * @property int $integer1
 * @property int $integer2
 * @property int $integer3
 * @property int $integer4
 * @property int $integer5
 * @property float $number1
 * @property float $number2
 * @property float $number3
 * @property float $number4
 * @property float $number5
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property boolean $yesNo1
 * @property boolean $yesNo2
 * @property boolean $yesNo3
 * @property boolean $yesNo4
 * @property boolean $yesNo5
 * @property Preparation $preparation
 * @property Agent $modifiedByAgent
 * @property CollectionObject $collectionObject
 * @property Agent $createdByAgent
 * @property Division $division
 * @property ConservDescriptionAttachment[] $conservDescriptionAttachments
 * @property ConservEvent[] $conservEvents
 */
class ConservDescription extends BaseModel
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
    protected $table = 'conservdescription';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ConservDescriptionID';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preparation(): BelongsTo
    {
        return $this->belongsTo(Preparation::class, 'PreparationID', 'PreparationID');
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
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'DivisionID', 'UserGroupScopeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservDescriptionAttachments(): HasMany
    {
        return $this->hasMany(ConservDescriptionAttachment::class, 'ConservDescriptionID', 'ConservDescriptionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conservEvents(): HasMany
    {
        return $this->hasMany(ConservEvent::class, 'ConservDescriptionID', 'ConservDescriptionID');
    }

}
