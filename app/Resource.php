<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    protected $table = 'resource';

    //user table relation
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }



    /**
     * One to many relationship with ResourceFile
     * Resource Has Many ResourceFile
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resourceFile(){
        return $this->hasMany('App\ResourceFile','resource_id','id');
    }

}
