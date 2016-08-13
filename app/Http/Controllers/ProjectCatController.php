<?php

namespace App\Http\Controllers;

use App\ProjectCat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class projectCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projectCat = ProjectCat::all();

        return view('projectCat.index', compact('projectCat'))->with('title',"Project Category");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projectCat.create')->with('title',"Create Project Category");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectCat = new ProjectCat();
        $projectCat->cat_name = $request->cat_name;
        $projectCat->cat_details = $request->cat_details;
        $projectCat->save();
        return \Redirect::route('projectCat.index')->with('success','Project Category Successfully Created');
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
        $projectCat = ProjectCat::findOrFail($id);

        return view('projectCat.edit', compact('projectCat'))->with('title',"Edit Project Category");
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
        $projectCat = ProjectCat::findOrFail($id);
        $projectCat->cat_name = $request->cat_name;
        $projectCat->cat_details = $request->cat_details;
        $projectCat->save();

        return \Redirect::route('projectCat.index')->with('success','Project Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProjectCat::destroy($id);

        return \Redirect::route('projectCat.index')->with('success',"Project Category Successfully deleted");
    }
}
