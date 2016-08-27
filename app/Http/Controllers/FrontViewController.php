<?php

namespace App\Http\Controllers;
use App\Resource;
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
