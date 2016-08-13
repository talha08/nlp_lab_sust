<?php

namespace App\Http\Controllers;

use App\Award;
use App\User;
use Illuminate\Http\Request;
use App\AwardPeople;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AwardRequest;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $award = Award::orderBy('id', 'desc')->get();
        //$award = AwardPeople::orderBy('id', 'desc')->get();
        return view('award.index', compact('award'))->with('title',"All Award List");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = User::where('is_teacher',1)->lists('name','id');
        $student = User::where('is_teacher',0)->where('status',1)->lists('name','id');
        return view('award.create',compact('teacher','student'))->with('title',"Create New Award");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AwardRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AwardRequest $request)
    {
        if( $request->hasFile('image')) {
            $file = $request->image;
            //getting the file extension
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            //path set
            $img_url = 'upload/award/img-'.$fileName;

            //resize and crop image using Image Intervention
            //Image::make($file)->crop(558, 221, 0, 0)->save(public_path($img_url));
            Image::make($file)->resize(558, 221)->save(public_path($img_url));

            $award = new Award();
            $award->award_title = $request->award_title;
            $award->award_details = $request->award_details;
            $award->award_position = $request->award_position;
            $award->award_meta_data =  str_slug($request->award_title).rand(2345,23142);
            $award->award_image = $img_url;


            if($award->save()){
                $award->users()->attach($request->award_supervisor);
                $award->users()->attach($request->award_developer);

                return redirect()->back()->with('success', 'Award Successfully Created');

            }else{
                return redirect()->back()->with('error', 'Something went wrong, Please try again');
            }

        }else{
            return redirect()->back()->with('error', 'Image Upload Problem, Please Try Again');
        }


   }








    /** vg
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $x= AwardPeople::where('award_id',$id)->lists('user_id','user_id')->all();
        $teacher = User::where('is_teacher',1)->lists('name','id')->all();
        $student = User::where('is_teacher',0)->where('status',1)->lists('name','id')->all();
        $award = Award::findOrFail($id);
        return view('award.edit', compact('award','teacher','student','super','x'))->with('title',"Edit Award");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param AwardRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AwardRequest $request, $id)
    {
        $award = Award::findOrFail($id);
        $award->award_title = $request->award_title;
        $award->award_details = $request->award_details;
        $award->award_position = $request->award_position;
        //$award->award_image = $request->award_image;
        $award->award_meta_data =  str_slug($request->award_title).rand(2345,23142);
        if( $award->save()){

            $award->users()->sync($request->award_supervisor);
            $award->users()->attach($request->award_developer);

            return redirect()->back()->with('success', 'Award Successfully Updated');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Award::destroy($id);

        return redirect()->route('award.index')->with('success',"Award Successfully deleted");
    }
}
