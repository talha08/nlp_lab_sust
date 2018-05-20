<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;

use App\Student;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Mail;
use Validator;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use Input;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{
    /**
     * List all User including teacher, student and alumni
     *
     * @return $this
     */
    public function index()
    {
        $user = User::get();
        return view('user.index', compact('user'))
            ->with('title', 'All User List');
    }

    /**
     * List of all students
     *
     * @return $this
     */
    public function student()
    {
        $user = User::where('status', 1)->where('is_teacher','=',0)->get();
        return view('user.student', compact('user'))
            ->with('title', 'All Student List');
    }

    /**
     * List of all Teachers
     *
     * @return $this
     */
    public function teacher()
    {
        $user = User::where('status', 1)->where('is_teacher','=',1)->orderBy('rank')->get();
        return view('user.teacher', compact('user'))
            ->with('title', 'All Teacher List');
    }

    public function teacherSort()
    {
//        return Input::all();
        $id = Input::get('id');
        $user = User::where('status', 1)->where('is_teacher','=',1)->orderBy('rank')->get();
        $t = [];
        for($i=0; $i<sizeof($id); $i++)
        {
            $t[$i] = 0;
        }
        foreach ($id as $i=>$a)
        {
            $t[$a] = $i;
        }
        foreach ($user as $i=> $a)
        {
            $u = User::findOrFail($a->id);
            $u->rank = $t[$i];
            $u->save();
        }
        $user = User::where('status', 1)->where('is_teacher','=',1)->orderBy('rank')->get();
        return "DONE";

    }

    /**
     * List of all other user like scholar,affiliates
     *
     * @return $this
     */
    public function otherUser()
    {
        $user = User::where('status', 1)->where('is_teacher','=',5)->get();
        return view('user.other_user', compact('user'))
            ->with('title', 'Visiting Scholar and Industry Affiliates List');
    }

    /**
     * List of all Alumni
     *
     * @return $this
     */
    public function alumni()
    {
        $user = User::where('status', 1)->where('is_teacher','=',2)->get();
        return view('user.alumni', compact('user'))
            ->with('title', 'All Alumni List');
    }

    /**
     * This function is for making a student to alumni
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function makeAlumni($id){
        $user = User::findOrFail($id);
        $user->is_teacher = 2;
        if($user->save()){
            return redirect()->back()->with('success', 'User Successfully as a Alumni');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong, Try Again');
        }
    }

    /**
     * all waiting user list
     * waiting for admin approval
     * @return $this
     */
    public function applyList()
    {
        $user = User::where('status', 0)->where('order', '!=' ,100)->get();
        return view('user.applyList', compact('user'))
            ->with('title', 'All Apply List');
    }

    /**
     * This function is for approve waiting users
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id){
        try
        {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->status = 1;
            $user->save();
            /*            Approved Mail                   */
            $datatopass = [
                'user' => $user,
            ];
            Mail::send('emails.studentApproval', $datatopass, function ($m) use ($user) {
                $m->from('noreply@nlp.sust.edu', 'SUST NLP Research Group');

                $m->to($user->email, $user->name)->subject('Membership Approval At SUST NLP Research Group!');
            });
            DB::commit();
            return redirect()->back()->with('success', 'User Approved');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

    /**
     * All User Profile
     * Admin can view all user
     * @param $id
     * @return $this
     */
    public function userProfile($id){
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'))
            ->with('title', 'User Profile');
    }

    /**
     * Student Sign up Form view
     *
     * @return $this
     */
    public function create()
    {
        $level= [
            'Undergraduate'=>'Undergraduate',
            'Masters'=>'Masters',
            'Phd'=>'Phd',
        ];

        $year= [
            '1st'=>'1st',
            '2nd'=>'2nd',
            '3rd'=>'3rd',
            '4th'=>'4th',

        ];

        $semester= [
            '1st'=>'1st',
            '2nd'=>'2nd',
        ];

        return view('user.create',compact('platform','level','year','semester'))
            ->with('title', 'Apply For Membership');
    }

    /**
     * Store Student Data in Database from Signup Form
     *
     * @param UserRequest $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request) {
        //return  $request->all();

        $user = new User;
        $user->name = $request->name;
        $user->is_teacher = 0;  //student
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

      if ($user->save()) {
              $student = new Student();
              $student->user_id = $user->id;
              $student->study_level = $request->study_level;
              $student->phone = $request->phone;
              $student->github_user = $request->github_user;
              $student->linkedIn_user = $request->linkedIn_user;
              $student->platform = $request->platform;


          if($request->has('reg')) {
              $student->reg = $request->reg;
          }

          if($request->has('year')) {
              $student->year = $request->year;
          }
          if($request->has('semester')){
              $student->semester = $request->semester;
          }

          //image section
          if ($request -> hasFile('image')) {
                  $image = $request->file('image');
                  $avatar_url = 'upload/profile/avatar/avatar-'.rand(111111, 99999). '.'.$image->getClientOriginalExtension();
                  $icon_url = 'upload/profile/icon/icon-'.rand(111111, 99999). '.'.$image->getClientOriginalExtension();
                  Image::make($image)->resize(200, 200)->save(public_path($avatar_url));
                  Image::make($image)->resize(45, 45)->save(public_path($icon_url));
                  $student->img_url = $avatar_url;
                  $student->thumb_url = $icon_url;

                  if ($student->save()) {

                        $role = Role::find(2);
                        $user-> attachRole($role);

                         Auth::logout();
                         return redirect()->route('login')
                             ->with('success', 'Registered successfully.Now you have to wait for admin verification.');
                  } else {
                        User::destroy($user->id);
                        return redirect()->back()
                             ->withInput()
                             ->with('error', 'Something went wrong.Please Try again.');
                  }

              } else {
                    User::destroy($user->id);
                    return redirect()->back()
                          ->withInput()
                          ->with('error', 'Please Select an Image.');
              }
          } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', "Something went wrong.Please Try again.");
          }
    }

    /**
     * Delete Student/Teacher/alumni
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back()->with('success', "User Successfully deleted");
    }

    /**
     * 3rd party account information
     *
     * @return $this
     */
    public function help(){
          return view('help')->with('title','3rd Party Account Information');
    }
}
