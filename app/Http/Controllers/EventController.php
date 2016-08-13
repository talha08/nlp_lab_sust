<?php

namespace App\Http\Controllers;

use App\EventFile;
use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
//use Request;
use Response;
use App\Http\Requests\EventFileRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::orderBy('id', 'desc')->get();
        return view('event.index', compact('event'))->with('title',"All Event List");
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create')->with('title',"Create New Event");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EventRequest $request)
    {

        if( $request->hasFile('image')) {
            $file = $request->image;
            //getting the file extension
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            //path set
            $img_url = 'upload/event/img-'.$fileName;

            //resize and crop image using Image Intervention
            //Image::make($file)->crop(558, 221, 0, 0)->save(public_path($img_url));
            Image::make($file)->resize(558, 221)->save(public_path($img_url));

            $event = new Event();
            $event->event_title = $request->event_title;
            $event->event_details = $request->event_details;
            $event->event_start = $request->event_start;
            $event->event_end = $request->event_end;
            $event->event_time = $request->event_time;
            $event->event_image = $img_url;
            $event->event_meta_data =  str_slug($request->event_title).rand(2345,23142);

            if($event->save()){
                return redirect()->back()->with('success', 'Event Successfully Created');
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
        $event = Event::findOrFail($id);
        return view('event.edit', compact('event'))->with('title',"Edit Event");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->event_title = $request->event_title;
        $event->event_details = $request->event_details;
        $event->event_start = $request->event_start;
        $event->event_end = $request->event_end;
        $event->event_time = $request->event_time;
        //$award->event_image = $request->event_image;
        $event->event_meta_data =  str_slug($request->event_title).rand(2345,23142);
        $event->save();

        return redirect()->back()->with('success', 'Event Successfully Updated');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('event.index')->with('success',"Event Successfully deleted");
    }





    /**
     * File upload View
     *
     * @return $this
     */
    public function fileUploadView(){

         $events= Event::lists('event_title','id')->all();
        return view('event.eventFileUpload',compact('events'))->with('title',"Upload file");
    }





    /**
     * File upload from Dropdown event list
     *
     * @param EventFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fileUpload(EventFileRequest $request) {

          //  return $request->all();
           try{

               if( $request->hasFile('file')) {
                   $files = $request->file;
                   foreach ($files as $file) {
                       $destinationPath = public_path() . '/upload/eventFile';
                       $extension = $file->getClientOriginalExtension();
                       $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
                       $file->move($destinationPath, $fileName); // uploading file to given path

                       $event = new EventFile();
                       $event->event_id = $request->event_id;
                       $event->event_file_title = $request->event_file_title;
                       $event->event_file = '/upload/eventFile/' . $fileName;
                       $event->save();
                       return redirect()->back()->with('success', "File Successfully Added");
                   }
               }
               else{
                   return redirect()->back()->with('error',"Please select files First");
               }
               }catch(\Exception $ex){
                   return redirect()->back()->with('error',"Something went wrong");
               }
        }




    /**
     * File Upload store method for modal view
     *
     * @param EventFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function singleFileUpload(EventFileRequest $request) {
        try{

            if( $request->hasFile('file')) {
                $files = $request->file;
                foreach ($files as $file) {
                    $destinationPath = public_path() . '/upload/eventFile';
                    $extension = $file->getClientOriginalExtension();
                    $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
                    $file->move($destinationPath, $fileName); // uploading file to given path

                    $event = new EventFile();
                    $event->event_id = Input::get('id');
                    $event->event_file_title = $request->event_file_title;
                    $event->event_file = '/upload/eventFile/' . $fileName;
                    $event->save();
                    return redirect()->back()->with('success', "File Successfully Added");
                }
            }
            else{
                return redirect()->back()->with('error',"Please select files First");
            }
        }catch(\Exception $ex){
            return redirect()->back()->with('error',"Something went wrong");
        }
    }




//    public function getDownload($event_file)
//    {
//        $headers = array(
//            'Content-Type: application/txt',
//        );
//        return response()->download($event_file, 'filename.txt', $headers);
//    }
}
