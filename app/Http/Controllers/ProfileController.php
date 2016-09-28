<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Support\Facades\File;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Http\Requests\ProfileRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\PhotoRequest;
class ProfileController extends Controller
{


    //blogger profile
    public function profile()
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
            'M.S.'=>'M.S.',

        ];

        $semester= [
            '1st'=>'1st',
            '2nd'=>'2nd',
        ];


        $teacher =Teacher::where('user_id',Auth::user()->id)->first();
        $student =Student::where('user_id',Auth::user()->id)->first();
        $blog= Blog::where('user_id',Auth::User()->id)->orderBy('id','desc')->get();
        return view('auth.profile')
            ->with('title', 'Profile')
            ->with('blog',$blog)
            ->with('user', Auth::user())
            ->with('teacher', $teacher)
            ->with('student', $student)
            ->with('year', $year)
            ->with('semester', $semester)
            ->with('level', $level);



    }






    public function updateTeacher(ProfileRequest $request)
    {
        try{

            Teacher::where('user_id','=',Auth::user()->id)->update([

                'phone'=>$request->phone,
                'position'=>$request->position,
                'organization'=>$request->organization,
                //'in_leave'=>$request->in_leave,
                'linkedIn_user'=>$request->linkedIn_user,
                'github_user'=>$request->github_user,
                'about_me'=>$request->about_me,

            ]);

            return redirect()->back()->with('title', 'Profile')->with('success','Profile Updated Successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong, Please try Again.');
        }

    }






    public function updateStudent(ProfileRequest $request)
    {
     //  return $request->all();
        try{
            Student::where('user_id','=',Auth::user()->id)->update([

                'phone'=>$request->phone,
                'position'=>$request->position,
                'platform'=> $request->platform,
                'organization'=>$request->organization,
                'linkedIn_user'=>$request->linkedIn_user,
                'github_user'=>$request->github_user,
                'about_me'=>$request->about_me,
                'study_level'=>$request->study_level,
                'year'=>$request->year,
                'semester'=>$request->semester,
                'reg'=>$request->reg

            ]);



            return redirect()->back()->with('title', 'Profile')->with('success','Profile Updated Successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong, Please try Again.');
        }

    }







    /**
     * Update image and Resize using Intervention
     * @param PhotoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function photoUpload(PhotoRequest $request){

        if ($request->hasFile('image'))
        {
             $image = $request->file('image');


            //deleting previous file
            if(Auth::user()->is_teacher ==1){
                $prev_avatar_url = Auth::user()->teachers->img_url;
                if($prev_avatar_url != 'uploads/profile/default/avatar.jpg'){
                    if (\File::exists($prev_avatar_url)) {
                        \File::delete($prev_avatar_url);
                    }
                    $prev_icon_url = Auth::user()->teachers->thumb_url;
                    if (\File::exists($prev_icon_url)) {
                        \ File::delete($prev_icon_url);
                    }
                }
            }
            else{
                $prev_avatar_url = Auth::user()->students->img_url;
                if($prev_avatar_url != 'uploads/profile/default/avatar.jpg'){
                    if (\File::exists($prev_avatar_url)) {
                        \File::delete($prev_avatar_url);
                    }
                    $prev_icon_url = Auth::user()->students->thumb_url;
                    if (\File::exists($prev_icon_url)) {
                        \ File::delete($prev_icon_url);
                    }
                }
            }

            $avatar_url = 'upload/profile/avatar/avatar-'.Auth::user()->id.rand(135,348).'.' . $image->getClientOriginalExtension();
            $icon_url = 'upload/profile/icon/icon-'.Auth::user()->id . rand(135,348).'.' . $image->getClientOriginalExtension();

            //resize image using Intervention
            Image::make($image)->resize(200, 200)->save(public_path($avatar_url));
            Image::make($image)->resize(45, 45)->save(public_path($icon_url));

            // check and insert into associate table
            if(Auth::user()->is_teacher ==1){
                $profile = Teacher::where('user_id',Auth::user()->id)
                    ->update(array(
                        'img_url' => $avatar_url,
                        'thumb_url' => $icon_url
                    ));
            }else{
                $profile = Student::where('user_id',Auth::user()->id)
                    ->update(array(
                        'img_url' => $avatar_url,
                        'thumb_url' => $icon_url
                    ));
            }


            if($profile){
                return redirect()->back()->with('success','Avatar updated successfully');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }

        }else{

            return redirect()->back()->with(['error'=>'Image could not be uploaded']);
        }
    }

















}
