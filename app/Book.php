<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'book';

    //user table relation
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
