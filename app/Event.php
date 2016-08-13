<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table='events';


    //protected $dates = ['event_start','event_end'];


    //parse created_at date and return full date
    // $id= id $date = created-at, updated_at, others-at  .....
       public static function fullDate($date){
        $event = $date;
        $dt = \Carbon\Carbon::parse($event);
        return  $dt->formatLocalized('%d %B %Y');//day date month year
    }

    public static function fullEndDate($date){
        $event = $date;
        $dt = \Carbon\Carbon::parse($event);
        return  $dt->formatLocalized('%d %B %Y');//day date month year
    }


    //parse created_at date and return full date
    public static function fullTime($date){
        $event = $date;
        $dt = \Carbon\Carbon::parse($event);
        return $dt->format('h:i A');

    }


    /**
     * One to many relationship with EventFile
     * Event Has Many eventFile
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventFile(){
        return $this->hasMany('App\EventFile','event_id','id');
    }

}
