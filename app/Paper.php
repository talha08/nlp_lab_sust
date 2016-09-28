<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table='paper';

    //protected $dates = ['paper_publish_date'];

    /**
     * For User and Paper Many To Many RelationShip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\User','paper_user','paper_id','user_id');
    }

    /**
     * One to many relationship with PaperFile
     * Event Has Many eventFile
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paperFile(){
        return $this->hasMany('App\PaperFile','paper_id','id');
    }



    //parse created_at date and return full date
    public static function year($date){
        $dt = \Carbon\Carbon::parse($date);
        return  $dt->formatLocalized(' %Y');//day date month year
    }

    //many to many relation with tag
    public function tags(){
        return $this->belongsToMany('App\Tag','paper_tag','paper_id','tag_id');
    }

}
