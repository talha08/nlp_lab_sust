<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventFile extends Model
{
    protected $table ='event_file';


    /**
     * One to many relationship with EventFile
     * EventFile belongsTo Event
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event','event_id','id');
    }
}
