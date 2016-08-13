<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='blog';


    //user table relation
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }


   //blog belong to many tag
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }





    //parse created_at date and return month
    public static function customMonth($id){
        $blog = \App\Blog::findOrFail($id)->created_at;
        $dt = \Carbon\Carbon::parse($blog);
        return  $dt->formatLocalized('%B');//  return month
    }

   //parse created_at date and return date
    public static function customDay($id){
        $blog = \App\Blog::findOrFail($id)->created_at;
        $dt = \Carbon\Carbon::parse($blog);
        //$dt->formatLocalized('%A %d %B %Y');  //day date month year
        return  $dt->formatLocalized('%d');//  return date
    }

    //parse created_at date and return full date
    public static function fullDate($id){
        $blog = \App\Blog::findOrFail($id)->created_at;
        $dt = \Carbon\Carbon::parse($blog);
        return  $dt->formatLocalized('%A %d %B %Y');//day date month year
    }


   //for count views
    public static function viewCountIncrease($id){
        $blog= Blog::where('id','=',$id)->pluck('views');
        Blog::where('id','=',$id)->update([
            'views' => $blog+1,
        ]);
    }

}
