<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tags';
    protected $fillable =['name'];

    //tag belongs to many blog
    public function blogs() {
        return $this->belongsToMany('App\Blog');
    }


    // many to many relation with resource table
    public function resource(){
        return $this->belongsToMany('App\Resource','resource_tag','resource_id','tag_id');
    }



}
