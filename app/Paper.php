<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table='paper';

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
}
