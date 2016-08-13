<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperFile extends Model
{
    protected $table ='paper_file';


    /**
     * One to many relationship with EventFile
     * EventFile belongsTo Event
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paper()
    {
        return $this->belongsTo('App\Paper','paper_id','id');
    }
}
