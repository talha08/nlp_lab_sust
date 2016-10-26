<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperAuthor extends Model
{
    protected $table = 'paper_author';
    protected $fillable = ['name'];
    public $timestamps =false;

    public function paper(){
        return $this->belongsTo('App\Paper', 'paper_id', 'id');
    }
}
