<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Tag;
use App\Http\Requests\BlogRequest;
use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
class BlogController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('id', 'desc')->get();
        return view('blog.index', compact('blog'))->with('title',"All Blog List");
    }


    //Blogger own blog
    public function myBlog()
    {
        $blog = Blog::orderBy('id', 'desc')->where('user_id', \Auth::user()->id)->get();
        return view('blog.own', compact('blog'))->with('title', "Your Blog List");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag= Tag::lists('name','name');
        return view('blog.create',compact('tag'))->with('title',"Create New Blog");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BlogRequest $request
     * @return \Illuminate\Http\Response
     */

    public function store(BlogRequest $request)
    {

        //return $request->all();
        $blog = new Blog();

        /**************************Image*******************/
        if($request->hasFile('image')){

            $image = $request->file('image');
            $fullImage = '/upload/blog/fullImage/image-' . str_slug($request->title, "-") . strtotime(date('Y-m-d H:i:s')) . '.' . $image->getClientOriginalExtension();
            $thumbnail = '/upload/blog/thumbnail/thumbnail-' . str_slug($request->title, "-") . strtotime(date('Y-m-d H:i:s')) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(720, 300)->save(public_path($fullImage));
            Image::make($image)->resize(81, 81)->save(public_path($thumbnail));

             $blog->image = $fullImage;
            $blog->img_thumbnail = $thumbnail;

        }else{

            $blog->image = 'upload/default/big.jpg';
            $blog->img_thumbnail = 'upload/default/small.jpg';
        }
        /**************************Image*******************/


        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->tag = $request->tag;
        //$blog->meta_data = str_slug($request->title, "-");
        $blog->meta_data = md5($request->title);
        $blog->user_id =  \Auth::user()->id;
        $blog->save();

        return redirect()->back()->with('success', 'Blog Successfully Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag= Tag::lists('name','name');
        $tag_type=  Blog::where('id',$id)->pluck('tag');
        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('blog','tag_type','tag'))->with('title',"Edit Blog");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BlogRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->tag = $request->tag;
        //$blog->meta_data = str_slug($request->title, "-");
        $blog->meta_data = md5($request->title);
        //$blog->image = $request->image;
        $blog->save();

        return redirect()->back()->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Blog::destroy($id);

        return redirect()->route('blog.index')->with('success',"Blog Successfully deleted");
    }


}
