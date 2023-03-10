<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use HasFactory;

    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->relations)) {
            return parent::getAttribute($key);
        } else {
            return parent::getAttribute(Str::studly($key));
        }
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute(Str::studly($key), $value);
    }

    public function getDateFormat()
    {
         return 'Y-m-d H:i:s.u';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modifiedByAgent()
    {
        return $this->belongsTo(Agent::class, 'ModifiedByAgentID', 'AgentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdByAgent()
    {
        return $this->belongsTo(Agent::class, 'CreatedByAgentID', 'AgentID');
    }
}
