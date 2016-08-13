<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherUser extends Model
{
    protected $table ='other_user';


    /**
     * Teacher belongsTo User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
