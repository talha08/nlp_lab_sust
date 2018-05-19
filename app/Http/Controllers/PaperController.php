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
use Illuminate\Support\Facades\DB;

class PaperController extends Controller
{

    public function index()
    {
//        return Paper::findOrFail(71)->users;
        $papers = Paper::orderBy('id', 'desc')->get();
        return view('paper.index', compact('papers'))->with('title',"All Paper List");
    }

    public function create()
    {
        $paperType =[
            'journal' => 'Journal',
            'conference' => 'Conference',
            'book' => 'Book',
        ];
        $teacher = User::lists('name','name');
        //developer can be a student or alumni
       // $students = User::where('is_teacher','=',0 )->orWhere('is_teacher','=',2 )->lists('name','id')->all();
        return view('paper.create', compact('teacher', 'paperType'))->with('title',"Add New Publication");
    }

    public function store(PaperRequest $request)
    {
        DB::beginTransaction();
        try
        {
            //for adding unknown user
            foreach ($request->paper_supervisor as $supervisor) {
                $tag = User::where('name', $supervisor)->first();
                if(empty($tag)){
                    $author = new User();
                    $author->name = $supervisor;
                    $author->order = 100;
                    $author->email = str_slug($supervisor).'@automated_mail.com' ;
                    $author->is_teacher = 100;
                    $author->password = \Hash::make('a');
                    $author->status = false;
                    $author->save();
                }
            }

            $paper = new Paper();
            $paper->paper_title = $request->paper_title;
            $paper->paper_details = $request->paper_details;
            $paper->paper_url = $request->paper_url;
            $paper->paper_type = $request->paper_type;
            $paper->paper_meta_data =  str_slug($request->paper_title);
            $paper->paper_publish_date =  $request->paper_publish_date;
            $paper->paper_cite = $request->paper_cite;
            $paper->publication_name = $request->publication_name;
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
                $sync_data = [];
                $i = 1;
                foreach ($request->paper_supervisor as $author)
                {
                    $userId = User::where('name', $author)->first()->id;
                    array_push($sync_data, [$userId , ['order' => $i]]);
                    $i++;
                }
                foreach ($sync_data as $data)
                {
//                    return [$data[0] => $data[1]];
                    $paper->users()->attach([$data[0] => $data[1]]);
                }

                DB::commit();
                return redirect()->route('paper.index')->with('success', 'Paper Successfully Created');
            }
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {

        $paperType =[
            'journal' => 'Journal',
            'conference' => 'Conference',
            'book' => 'Book',
        ];

        $teacher = User::lists('name','name');
        //developer can be a student or alumni
       // $students = User::where('is_teacher','=',0 )->orWhere('is_teacher','=',2 )->lists('name','id')->all();

        $associateAuthors= PaperPeople::where('paper_id',$id)
            ->lists('user_id','user_id')
            ->all();
        foreach($associateAuthors as $aa){
            $x[] = User::where('id',$aa)->pluck('name');
        }
        $paper = paper::findOrFail($id);
//        return $teacher;
        return view('paper.edit', compact('paper','teacher','x','paperType'))->with('title',"Edit Paper");
    }

    public function update(PaperRequest $request, $id)
    {
        try
        {
            DB::beginTransaction();
            //for adding unknown user
            foreach ($request->paper_supervisor as $supervisor) {
                $tag = User::where('name',$supervisor)->first();
                if(empty($tag)){
                    $author = new User();
                    $author->name = $supervisor;
                    $author->order = 100;
                    $author->email = str_slug($supervisor).'@automated_mail.com' ;
                    $author->is_teacher = 100;
                    $author->password = \Hash::make('a');
                    $author->status = false;
                    $author->save();
                }
            }
//        $userIds = User::whereIn('name',$request->paper_supervisor)->lists('id');

            $paper = Paper::findOrFail($id);
            $paper->paper_title = $request->paper_title;
            $paper->paper_details = $request->paper_details;
            $paper->paper_url = $request->paper_url;
            $paper->paper_type = $request->paper_type;
            $paper->paper_cite = $request->paper_cite;
            $paper->publication_name = $request->publication_name;
            // $paper->paper_pdf = $request->paper_pdf;
            $paper->paper_publish_date =  $request->paper_publish_date;

            //$paper->paper_meta_data =  str_slug($request->paper_title).rand(rand(12223,4579),1234243344);

            if( $paper->save()){

                //author many to many

                $paper->users()->detach();
                $sync_data = [];
                $i = 1;
                foreach ($request->paper_supervisor as $author)
                {
                    $userId = User::where('name', $author)->first()->id;
                    array_push($sync_data, [$userId , ['order' => $i]]);
                    $i++;
                }
                foreach ($sync_data as $data)
                {
                    $paper->users()->attach([$data[0] => $data[1]]);
                }
//            return $sync_data;
                DB::commit();
                return redirect()->route('paper.index')->with('success', 'Paper Successfully Updated');
            }
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        Paper::destroy($id);
        return redirect()->route('paper.index')->with('success',"Paper Successfully deleted");
    }

}