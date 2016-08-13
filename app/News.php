<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';

    //parse created_at date and return full date
    public static function fullDate($id){
        $blog = \App\News::findOrFail($id)->created_at;
        $dt = \Carbon\Carbon::parse($blog);
        return  $dt->formatLocalized('%A %d %B %Y');//day date month year
    }




}
