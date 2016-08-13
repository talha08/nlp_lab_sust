<?php

namespace App\Http\Controllers;

use App\Paper;
use App\PaperPeople;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PaperRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaperFile;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $papers = Paper::orderBy('id', 'desc')->get();
        return view('paper.index', compact('papers'))->with('title',"All Paper List");
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paperType =[
            'journal' => 'journal',
            'conference' => 'conference',
            'book' => 'book',
        ];
         $teacher = User::where('is_teacher','=',1 )->lists('name','id')->all();
        //developer can be a student or alumni
         $students = User::where('is_teacher','=',0 )->orWhere('is_teacher','=',2 )->lists('name','id')->all();
        return view('paper.create', compact('students','teacher', 'paperType'))->with('title',"Create New Paper");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PaperRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PaperRequest $request)
    {
        $paper = new Paper();
        $paper->paper_title = $request->paper_title;
        $paper->paper_details = $request->paper_details;
        $paper->paper_url = $request->paper_url;
        $paper->paper_type = $request->paper_type;
        $paper->paper_meta_data =  str_slug($request->paper_title);
        $paper->paper_publish_date =  $request->paper_publish_date;
       // $paper->paper_pdf = $request->paper_pdf;
        if($paper->save()){

            //file save
            if( $request->hasFile('file')) {
                $files = $request->file;
                foreach ($files as $file) {
                    $destinationPath = public_path() . '/upload/paperFile';
                    $extension = $file->getClientOriginalExtension();
                    $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
                    $file->move($destinationPath, $fileName); // uploading file to given path

                    $paperFile = new PaperFile();
                    $paperFile->paper_id = $paper->id;
                    $paperFile->paper_file_title = $request->paper_file_title;
                    $paperFile->paper_file = '/upload/paperFile/' . $fileName;
                    $paperFile->save();
                   // return redirect()->back()->with('success', "File Successfully Added");
                }
            }


            //author many to many
            $paper->users()->attach($request->paper_author);
            $paper->users()->attach($request->paper_supervisor);

            return redirect()->route('paper.index')->with('success', 'Paper Successfully Created');
        }
        return redirect()->back()->with('error', 'Something went wrong');

    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $paperType =[
            'journal' => 'journal',
            'conference' => 'conference',
            'book' => 'book',
        ];

        $teacher = User::where('is_teacher','=',1 )->lists('name','id')->all();
        //developer can be a student or alumni
        $students = User::where('is_teacher','=',0 )->orWhere('is_teacher','=',2 )->lists('name','id')->all();
        $x= PaperPeople::where('paper_id',$id)->lists('user_id','user_id')->all();
        $paper = paper::findOrFail($id);
        return view('paper.edit', compact('paper','students','teacher','x','paperType'))->with('title',"Edit Paper");
    }




    /**
     * Update the specified resource in storage.
     *
     * @param PaperRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PaperRequest $request, $id)
    {
        $paper = Paper::findOrFail($id);
        $paper->paper_title = $request->paper_title;
        $paper->paper_details = $request->paper_details;
        $paper->paper_url = $request->paper_url;
        // $paper->paper_pdf = $request->paper_pdf;
         $paper->paper_publish_date =  $request->paper_publish_date;
         $paper->paper_meta_data =  str_slug($request->paper_title);
        if( $paper->save()){

            $paper->users()->sync($request->paper_author);
            $paper->users()->attach($request->paper_supervisor);

            return redirect()->route('paper.index')->with('success', 'Paper Successfully Updated');
        }

        return redirect()->back()->with('error', 'Something Went Wrong');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paper::destroy($id);
        return redirect()->route('paper.index')->with('success',"Paper Successfully deleted");
    }

}
