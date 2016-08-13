<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{


    /**
     * Subscribers email input
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
       public function addSubscriber(Request $request){

           $this->validate($request, [
               'subscriber_email' => 'required|email',

           ]);
           $email = $request->subscriber_email;

           $subs = Subscriber::where('subscriber_email','=',$email )->count();

           if($subs != 0){
             return   redirect()->back()->with('error', 'Email Already is in subscriber list');
           }
           else{
               $subs = new Subscriber();
               $subs->subscriber_email = $email;
               if($subs->save()){
                   return  redirect()->back()->with('success', 'Thank You for Subscribe');
               }

           }
       }


}
