<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectsPeople;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::orderBy('id', 'desc')->get();
        return view('project.index', compact('projects'))->with('title',"All Project List");
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = User::where('is_teacher','=',1 )->lists('name','id')->all();
        //developer can be a student or alumni
        $students = User::where('is_teacher','=',0 )->orWhere('is_teacher','=',2 )->lists('name','id')->all();
        return view('project.create',compact('teacher','students'))->with('title',"Create New Project");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $request)
    {

        $project = new Project();
        $project->project_title = $request->project_title;
        $project->project_details = $request->project_details;
        $project->project_url = $request->project_url;
        $project->project_meta_data =  str_slug($request->project_title);

        $language = implode(",", $request->project_language);
        $project->project_language = $language ;
        //$project->project_image = $request->project_image;

        if($project->save()){
            $project->users()->attach($request->project_developer);
            $project->users()->attach($request->project_supervisor);

            return redirect()->route('project.index')->with('success', 'Project Successfully Created');
        }
        return redirect()->back()->with('error', 'Something Went Wrong');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::where('is_teacher','=',1 )->lists('name','id')->all();
        //developer can be a student or alumni
        $students = User::where('is_teacher','=',0 )->orWhere('is_teacher','=',2 )->lists('name','id')->all();
        $x= ProjectsPeople::where('project_id',$id)->lists('user_id','user_id')->all();
        $projects = Project::findOrFail($id);
        return view('project.edit', compact('projects','teacher','students','x'))->with('title',"Edit Project");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->project_title = $request->project_title;
        $project->project_details = $request->project_details;
        //$project->project_status = $request->project_status;
        $project->project_url = $request->project_url;
        $project->project_meta_data =  str_slug($request->project_title);

        $language = implode(",", $request->project_language);
        $project->project_language = $language ;
        //$project->project_image = $request->project_image;

        if( $project->save()){

            $project->users()->sync($request->project_developer);
            $project->users()->attach($request->project_supervisor);

            return redirect()->back()->with('success', 'Project Successfully Updated');
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
        Project::destroy($id);
        return redirect()->route('project.index')->with('success',"Project Successfully deleted");
    }


    public function changeStatus($id){


//        Project::where('id','=',$id)->update([
//            'project_status' => 0
//        ]);

        $project = Project::findOrFail($id);
        if($project->project_status == 1){
            $project->project_status = 0;
            $project->save();
        }else{
            $project->project_status = 1;
            $project->save();
        }


        return redirect()->back()->with('success', 'Status Successfully Updated');
    }
}
