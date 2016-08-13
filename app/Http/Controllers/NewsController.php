<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('news.index', compact('news'))->with('title',"All News List");
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create')->with('title',"Create New News");
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsRequest $request)
    {

        if( $request->hasFile('image')) {
            $file = $request->image;
            //getting the file extension
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            //path set
            $img_url = 'upload/news/img-'.$fileName;

            //resize and crop image using Image Intervention
           // Image::make($file)->crop(558, 221, 30, 30)->save(public_path($img_url));
           Image::make($file)->resize(558, 221)->save(public_path($img_url));

            $news = new News();
            $news->news_title = $request->news_title;
            $news->news_details = $request->news_details;
            $news->news_meta_data =  str_slug($request->news_title).rand(23525,21414);
            $news->news_image = $img_url;


            if($news->save()){
                return redirect()->back()->with('success', "News Successfully Created");
            }else{
                return redirect()->back()->with('error', 'Something went wrong, Please try again');
            }

        }else{
            return redirect()->back()->with('error', 'Image Upload Problem, Please Try Again');
        }

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'))->with('title',"Edit News");
    }




    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->news_title = $request->news_title;
        $news->news_details = $request->news_details;
        //$news->news_image = $request->event_image;
        $news->news_meta_data =  str_slug($request->news_title).rand(23525,21414);
        $news->save();

        return redirect()->back()->with('success', 'News Successfully Updated');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('news.index')->with('success',"News Successfully deleted");
    }
}
