<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests\BlogRequest;
use Redirect;
use App\User;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination;

class ContactController extends Controller
{

    public function contact()
    {
        return view('labfront.contact')->with('title',"Contact | Data Science Lab");
    }



    public function getContactUsForm(){

        //Get all the data and store it inside Store Variable
        $data = \Input::all();

        //Validation rules
        $rules = array (
            //'name' => 'required|alpha',
            //'phone_number'=>'numeric|min:11',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:25'
        );

        //Validate data
        $validator = \Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes()){



                //Send email using Laravel send function
            \Mail::send('emails.contact', $data, function($message) use ($data)
            {
                //$user = User::findOrFail(1)->pluck('email');
                $message->from($data['email'],'User email From SUST Data Science Lab');
                $message->to('talhaqc@gmail.com')->cc('talhaqc@gmail.com')->subject('Your Reminder!');

            });


            return redirect()->back()->with('success','Your message has been sent');
        }else{
            //return contact form with errors
            return \Redirect::to('contact')->withErrors($validator)->with('title','Contact | Data Science Lab')->with('error','Something Went Wrong, Please Try Again');
        }
    }

}