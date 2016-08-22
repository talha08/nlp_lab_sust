<?php

namespace App\Http\Controllers;

use App\Resource;
use App\ResourceFile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class BookController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::orderBy('id', 'desc')->get();
        return view('book.index', compact('resources'))->with('title',"All Resource List");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resourceType =[
            'software' => 'software',
            'tutorial' => 'tutorial',
            'presentation' => 'presentation',
            'book' => 'book',
        ];

        return view('book.create', compact('resourceType'))->with('title',"Add new Resource");
    }











    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $resource = new Resource();
        $resource->resource_type = $request->resource_type;
        $resource->resource_name = $request->resource_name;
        $resource->resource_link1 = $request->resource_link1;
        $resource->resource_link2 = $request->resource_link2;
        $resource->resource_link3 = $request->resource_link3;
        $resource->resource_details = $request->resource_details;
        $resource->user_id =  \Auth::user()->id;
        $resource->resource_meta_data =  md5($request->resource_name);

        //image save
        if( $request->hasFile('image')) {
            $file = $request->image;
            //getting the file extension
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            //path set
            $img_url = 'upload/resourceImage/img-'.$fileName;

            //resize and crop image using Image Intervention
            // Image::make($file)->crop(558, 221, 30, 30)->save(public_path($img_url));
            Image::make($file)->resize(200, 200)->save(public_path($img_url));

            $resource->resource_image_url = $img_url;
        }
        if($resource->save()){

            //file save
            if( $request->hasFile('file')) {
                $files = $request->file;
                foreach ($files as $file) {
                    $destinationPath = public_path() . '/upload/resourceFile';
                    $extension = $file->getClientOriginalExtension();
                    $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
                    $file->move($destinationPath, $fileName); // uploading file to given path

                    $paperFile = new ResourceFile();
                    $paperFile->resource_id = $resource->id;
                    $paperFile->resource_file_title = $request->resource_file_title;
                    $paperFile->resource_file = '/upload/resourceFile/' . $fileName;
                    $paperFile->save();
                    // return redirect()->back()->with('success', "File Successfully Added");
                }
            }



            return redirect()->route('book.index')->with('success', 'Resource Successfully Created');
        }

        return redirect()->back()->with('success', 'Book Successfully Added');
    }










    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $resourceType =[
            'software' => 'software',
            'tutorial' => 'tutorial',
            'presentation' => 'presentation',
            'book' => 'book',
        ];
        $resource = Resource::findOrFail($id);
        return view('book.edit', compact('resource','resourceType'))->with('title',"Edit Resource");
    }











    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();

        $resource = Resource::findOrFail($id);
        $resource->resource_type = $request->resource_type;
        $resource->resource_name = $request->resource_name;
        $resource->resource_link1 = $request->resource_link1;
        $resource->resource_link2 = $request->resource_link2;
        $resource->resource_link3 = $request->resource_link3;
        $resource->resource_details = $request->resource_details;
        $resource->user_id =  \Auth::user()->id;
        $resource->resource_meta_data =  md5($request->resource_name);

        if($resource->save()){
            return redirect()->route('book.index')->with('success', 'Resource Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Something went wrong');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resource::destroy($id);
        return redirect()->route('book.index')->with('success',"Resource Successfully deleted");
    }



}
