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
        $order = [
            '1' => 'Professor',
            '2' => 'Associate Professor',
            '3' => 'Assistant Professor',
            '4' => 'Lecturer',
            '5' => 'Undergraduate Student',
            '6' => 'Masters Student',
            '7' => 'Phd Student',
            '8' => 'Visiting Scholar',
            '9' => 'Industry Affiliates',
        ];
        return view('auth.userAdd',compact('order'))
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
        $user->order = $request->order;



        if($request->order == 1 ){      //professor
            $user->is_teacher = 1;
        }
        elseif($request->order == 2){    //associate pro
            $user->is_teacher = 1;
        }
        elseif($request->order == 3){   //assistant pro
            $user->is_teacher = 1;
        }
        elseif($request->order == 4 ){      //lecturer
            $user->is_teacher = 1;
        }
        elseif($request->order == 8){   //visiting scholars
            $user->is_teacher = 5;
        }
        elseif($request->order == 9){   //  industry affiliates
            $user->is_teacher = 5;
        }
        else{
            $user->is_teacher = 0;     // students
        }



        $passwordRandom = 'user'.rand(234574,315457);
        $user->password = \Hash::make($passwordRandom);
        $user->password = \Hash::make('a');

        if($user->save()){

            if($request->order == 1 ){
                $profile = new Teacher();
                $profile->user_id = $user->id;
                $profile->position = "Professor";

                $role = Role::find(1);  //role attach 1
                $user->attachRole($role);
            }
            elseif($request->order == 2 ){
                $profile = new Teacher();
                $profile->user_id = $user->id;
                $profile->position = "Associate Professor";

                $role = Role::find(1);  //role attach 1
                $user->attachRole($role);
            }
            elseif($request->order == 3 ){
                $profile = new Teacher();
                $profile->user_id = $user->id;
                $profile->position = "Assistant Professor";

                $role = Role::find(1);  //role attach 1
                $user->attachRole($role);
            }
            elseif($request->order == 4 ){
                $profile = new Teacher();
                $profile->user_id = $user->id;
                $profile->position = "Lecturer";

                $role = Role::find(1);  //role attach 1
                $user->attachRole($role);
            }

            elseif($request->order == 5){
                $profile = new Student();
                $profile->user_id = $user->id;
                $profile->position = "Undergraduate Student";
                $profile->study_level = "Undergraduate";

                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            } elseif($request->order == 6){
                $profile = new Student();
                $profile->user_id = $user->id;
                $profile->position = "Masters Student";
                $profile->study_level = "Masters";

                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }
            elseif($request->order == 7){
                $profile = new Student();
                $profile->user_id = $user->id;
                $profile->position = "Phd Student";
                $profile->study_level = "Phd";

                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }
            elseif($request->order == 8 ){
                $profile = new OtherUser();
                $profile->user_id = $user->id;
                $profile->user_type = 'Scholar';
                $profile->position = 'Position';


                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }
            elseif($request->order == 9 ){
                $profile = new OtherUser();
                $profile->user_id = $user->id;
                $profile->user_type = 'Affiliates';
                $profile->position = 'Position';


                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }
            else{
                $profile = new Student();
                $profile->user_id = $user->id;
                $profile->position = "Student";

                $role = Role::find(2);  //role attach 2
                $user->attachRole($role);
            }

            if($profile->save()){




                $datatopass = [
                    'user' => $user,
                    'password' => $passwordRandom
                    //'password' => 'a'
                ];

                Mail::send('emails.teacherAdd', $datatopass, function ($m) use ($user) {
                    $m->from('noreply@nlp.sust.edu', 'Membership At SUST NLP Research Group');

                    $m->to($user->email, $user->name)->subject('Membership At SUST NLP Research Group!');
                });


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
