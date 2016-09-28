<?php

namespace App\Http\Controllers;

use App\OtherUser;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use Mail;
use App\User;
use App\Http\Requests\UserAddRequest;


class UserAddController extends Controller
{


    /**
     * User Add form
     * Add by Admin
     *
     * @return $this
     */
    public function userAdd()
    {
        return view('auth.userAdd')
            ->with('title', 'Add Teacher, Student, Visiting Scholar, Industry Affiliates ');
    }





    /**
     * store user data
     *
     * @param UserAddRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userStore(UserAddRequest $request)
    {

        //return  $request->all();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = 1;

        if($request->type == 1 ){      //teachers
            $user->is_teacher = 1;
        }
        elseif($request->type == 2){   // others user mean  visiting scholars, industry affiliates
            $user->is_teacher = 5;
        }
        elseif($request->type == 3){   // others user mean  visiting scholars, industry affiliates
            $user->is_teacher = 5;
        }
        else{
            $user->is_teacher = 0;     // students
        }

        $passwordRandom = 'user'.rand(234574,315457);
        //$user->password = \Hash::make($passwordRandom);
        $user->password = Hash::make('a');

        if($user->save()){

            if($request->type == 1 ){
                $profile = new Teacher();
                $profile->user_id = $user->id;

                $role = Role::find(1);  //role attach 2
                $user->attachRole($role);
            }
            elseif($request->type == 2 ){
                $profile = new OtherUser();
                $profile->user_id = $user->id;
                $profile->user_type = 'Scholar';

                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }
            elseif($request->type == 3 ){
                $profile = new OtherUser();
                $profile->user_id = $user->id;
                $profile->user_type = 'Affiliates';

                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }
            else{
                $profile = new Student();
                $profile->user_id = $user->id;

                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }

            if($profile->save()){




//                $datatopass = [
//                    'user' => $user,
//                    'password' => $passwordRandom
//                ];

//                Mail::send('emails.teacherAdd', $datatopass, function ($m) use ($user) {
//                    $m->from('noreply@nlp.sust.edu', 'Membership At NLP Lab');
//
//                    $m->to($user->email, $user->name)->subject('Membership At NLP Lab!');
//                });


                return redirect()->route('auth.userAdd')
                    ->with('success','User Add Successfully and a Mail sent to him/her');

            }else{
                User::destroy($user->id);
                return redirect()->back()
                    ->with('error','Something went wrong.Please Try again.');
            }
        }else{
            return redirect()->back()
                ->with('error',"Something went wrong.Please Try again.");
        }
    }





}
