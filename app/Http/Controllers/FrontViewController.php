<?php

namespace App\Http\Controllers;
use App\Resource;
use App\ResourceTag;
use App\Tag;
use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests\BlogRequest;
use Redirect;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination;
class FrontViewController extends Controller
{


     public function software(){

         $resources = Resource::where('resource_type', 'software')->simplePaginate(5);

         return view('labfront.resource', compact('resources'))->with('title',"Resource | Software ");
     }


    public function tutorial(){

        $resources = Resource::where('resource_type', 'tutorial')->simplePaginate(5);

        return view('labfront.resource', compact('resources'))->with('title',"Resource | Tutorial ");
    }


    public function presentation(){

        $resources = Resource::where('resource_type', 'presentation')->simplePaginate(5);

        return view('labfront.resource', compact('resources'))->with('title',"Resource | Presentation ");
    }


    public function book(){

        $resources = Resource::where('resource_type', 'book')->simplePaginate(5);

        return view('labfront.resource', compact('resources'))->with('title',"Resource | Book ");
    }


    public function publication(){

        $tag = Tag::all();
        $resources = Resource::where('resource_type', 'publication')->simplePaginate(10);

        return view('labfront.publicationOthers', compact('resources','tag'))->with('title',"Resource | Publication ");
    }



    public function tagAssociatePublication($tag_name){
        try{
            $tag= Tag::all();

             $tag_id = Tag::where('name',$tag_name)->pluck('id');
             $pub = ResourceTag::where('tag_id',$tag_id)->lists('resource_id','resource_id');
             $resources = Resource::where('resource_type', 'publication')->whereIn('id',$pub)->simplePaginate(10);

            $bing = str_slug($tag_name." schoolar papers", "+" );

            return view('labfront.publicationOthers', compact('resources','tag','bing'))->with('title',"Publication :||: $tag_name" );

        }
        catch(\Exception $e){

            return "Sorry, Page not Found ";
        }
    }





    public function publicationOthetDetails($meta_data){

        $tag = Tag::all();
        $resource = Resource::where('resource_meta_data',$meta_data)->first();

        return view('labfront.publicationOthetDetails', compact('resource','tag'))->with('title',"Resource | Publication |".$resource->resource_name );
    }





    public function fullPaper($meta_data)
    {
        try{
            $resource = Resource::where('resource_meta_data','=',$meta_data)->first();

            return view('labfront.resource_single', compact('resource'))->with('title',"Resource Details" );
        }catch(\Exception $e){
            return "Sorry, Page not Found ";
        }

    }






}
