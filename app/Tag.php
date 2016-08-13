<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tags';

    //tag belongs to many blog
    public function blogs() {
        return $this->belongsToMany('App\Blog');
    }
}
