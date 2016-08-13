<?php

namespace App\Http\Controllers;

use App\Welcome;
use Illuminate\Http\Request;
use App\Http\Requests\WelcomeRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    /**
     * Welcome note view
     *
     * @return $this
     */
    public function index(){
        $welcome = Welcome::findOrFail(1);
        return view('welcome.index', compact('welcome'))->with('title'," Welcome Note");
    }

    /**
     * Edit view for welcome note
     *
     * @return $this
     */
    public function edit()
    {
        $welcome = Welcome::findOrFail(1);
        return view('welcome.edit', compact('welcome'))->with('title',"Edit Welcome Note");
    }


    /**
     * Updated data store
     *
     * @param WelcomeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(WelcomeRequest $request)
    {
        $welcome = Welcome::findOrFail(1);
        $welcome->welcome_title = $request->welcome_title;
        $welcome->welcome_details = $request->welcome_details;
        $welcome->save();

        return redirect()->back()->with('success', 'Welcome Note Successfully Updated');
    }


}
