<?php

namespace App\Http\Controllers;

use App\Award;
use App\Event;
use App\News;
use App\Paper;
use App\PaperPeople;
use App\Project;
use App\ProjectsPeople;
use App\Slider;
use App\Student;
use App\Tag;
use App\User;
use App\Welcome;
use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests\BlogRequest;
use Mockery\CountValidator\Exception;
use Redirect;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination;

class LabFrontController extends Controller
{


    /*==================================================*/
    //Home PAGE
    /*==================================================*/
    public function index()
    {

        $event = Event::take(3)->orderBy('id', 'desc')->get();

        // foreach ($event as $events) {
        //   $today =Carbon::now()->formatLocalized('%m/%d/%Y'); //day date month year
        //      $format = "m/d/y";
        //      $date1  = \DateTime::createFromFormat($format, $events->event_start);
        //      $date2  = \DateTime::createFromFormat($format, $today);
        //      var_dump($date1 > $date1) ;
        // }
        $news = News::take(3)->orderBy('id', 'desc')->get();

        $blog = Blog::take(4)->orderBy('id', 'desc')->get();
        $project = Project::take(5)->orderBy('id', 'desc')->get();
        $paper = Paper::take(5)->orderBy('id', 'desc')->get();
        $slider = Slider::take(1)->orderBy('id', 'desc')->first();
        $sliders = Slider::take(3)->skip(1)->orderBy('id', 'desc')->get();
        $welcome = Welcome::findOrFail(1);

        return view('labfront.index', compact('event', 'news', 'blog', 'project', 'paper', 'sliders', 'slider', 'welcome'))
            ->with('title', 'Home | SUST CSE NLP Lab');
    }

    /*==================================================*/
    //View all blog list, descending order
    /*==================================================*/
    public function blog()
    {
        $tag = Tag::all();
        $recent = Blog::take(3)->orderBy('id', 'desc')->get(); //recent 3 news
        $blog = Blog::orderBy('id', 'desc')->paginate(5);

        return view('labfront.blog', compact('blog', 'recent', 'tag'))->with('title', "Blog | NLP Lab ");
    }


    /*==================================================*/
    //View blog details
    /*==================================================*/
    public function frontBlogDetails($meta_data)
    {
        try {
            $tag = Tag::all();
            $blog = Blog::where('meta_data', '=', $meta_data)->first();
            $recent = Blog::take(3)->orderBy('id', 'desc')->get(); //recent 3 news
            return view('labfront.blog_details', compact('blog', 'recent', 'tag'))->with('title', "Details Blog ");
        } catch (\Exception $e) {
            return "Sorry, Page not Found ";
        }

    }

    /*==================================================*/
    //Getting these Blog Associate which associate with
    // selected tag
    /*==================================================*/
    public function tagAssociateBlog($tag_name)
    {
        try {
            $tag = Tag::all();
            $recent = Blog::take(3)->orderBy('id', 'desc')->get(); //recent 3 news
            $blog = Blog::where('tag', '=', $tag_name)->orderBy('id', 'desc')->paginate(5);
            $bing = str_slug($tag_name, "+");
            return view('labfront.blog', compact('blog', 'recent', 'tag', 'bing'))->with('title', "Tag :||: $tag_name");

        } catch (\Exception $e) {

            return "Sorry, Page not Found ";
        }
    }

    /*==================================================*/
    //For Search any blog with blog title or blog details
    /*==================================================*/

    public function search()
    {

        $search_value = \Input::get('search_value');
        try {
            $tag = Tag::all();
            $recent = Blog::take(3)->orderBy('id', 'desc')->get(); //recent 3 news
            $blog = Blog::where('details', 'like', '%' . $search_value . '%')
                ->orWhere('details', 'like', $search_value . '%')
                ->orWhere('title', 'like', $search_value . '%')
                ->orWhere('title', 'like', '%' . $search_value . '%')
                ->orderBy('id', 'desc')
                ->paginate(5);
            $bing = str_slug($search_value, "+");

            return view('labfront.blog', compact('blog', 'recent', 'tag', 'bing'))->with('title', "Search | $search_value");
        } catch (Exception $e) {

            return "Sorry, Page not Found ";
        }
    }















    /*==================================================*/
    //Blog Archive
    /*==================================================*/

    public function archive()
    {
        try {
            $tag = Tag::all();
            // $blog = Blog::where('meta_data','=',$meta_data)->first();
            $blog = Blog::all()->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->formatLocalized('%B %Y');
            });

            $recent = Blog::take(3)->orderBy('id', 'desc')->get(); //recent 3 news

            return view('labfront.archive_blog', compact('blog', 'recent', 'tag'))->with('title', "Archive |  Blog");
        } catch (Exception $e) {
            return "Sorry, Page not Found ";
        }

    }

    /*==================================================*/
    //Supervisor List
    /*==================================================*/

    public function supervisor()
    {
//        $news = News::take(3)->orderBy('id', 'desc')->get();
        $user = User::where('is_teacher', 1)
            ->where('status', 1)
            ->orderBy('rank')
            ->paginate(5);
        return view('labfront.supervisor', compact(['user']))->with('title', 'Faculty');
    }









    /*==================================================*/
    //Other user List
    /*==================================================*/
    public function userScholar()
    {
        $user = \DB::table('users')
            ->join('other_user', 'users.id', '=', 'other_user.user_id')
            ->where('users.status', 1)
            ->where('users.is_teacher', 5)//scholar and affiliates
            ->where('other_user.user_type', "Scholar")
            ->orderBy('order')
            ->simplePaginate(5);

        $news = News::take(3)->orderBy('id', 'desc')->get();
        return view('labfront.student', compact('user', 'news'))->with('title', 'Visiting Scholar');
    }


    public function userAffiliates()
    {
        $user = \DB::table('users')
            ->join('other_user', 'users.id', '=', 'other_user.user_id')
            ->where('users.status', 1)
            ->where('users.is_teacher', 5)//scholar and affiliates
            ->where('other_user.user_type', "Affiliates")
            ->orderBy('order')
            ->simplePaginate(5);

        $news = News::take(3)->orderBy('id', 'desc')->get();
        return view('labfront.student', compact('user', 'news'))->with('title', 'Industry Affiliates');
    }



    /*==================================================*/
    //Student List
    /*==================================================*/

    public function phdStudent()
    {
        $user = \DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->where('users.status', 1)
            ->where('users.is_teacher', 0)
            ->where('students.study_level', "Phd")
            ->simplePaginate(5);


        $news = News::take(3)->orderBy('id', 'desc')->get();
        return view('labfront.student', compact('user', 'news'))->with('title', 'PhD');
    }


    public function mastersStudent()
    {
        $user = \DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->where('users.status', 1)
            ->where('users.is_teacher', 0)
            ->where('students.study_level', "Masters")
            ->simplePaginate(5);


        $news = News::take(3)->orderBy('id', 'desc')->get();
        return view('labfront.student', compact('user', 'news'))->with('title', 'Masters(MS) Student');
    }


    public function undergraduatesStudents()
    {
        $user = \DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->where('users.status', 1)
            ->where('users.is_teacher', 0)
            ->where('students.study_level', "Undergraduate")
            ->simplePaginate(5);


        $news = News::take(3)->orderBy('id', 'desc')->get();
        return view('labfront.student', compact('user', 'news'))->with('title', 'Undergraduate Students');
    }









    /*==================================================*/
    //Alumni List
    /*==================================================*/

    public function alumni()
    {
        $user = User::where('is_teacher', 2)
            ->where('status', 1)
            ->simplePaginate(5);
        $news = News::take(3)->orderBy('id', 'desc')->get();
        return view('labfront.alumni', compact('user', 'news'))->with('title', 'Lab Alumni');
    }










    /*==================================================*/
    //front full  peopleProfile
    /*==================================================*/

    public function peopleProfile($id)
    {
        $papers = PaperPeople::where('user_id', $id)->get();
        $projects = ProjectsPeople::where('user_id', $id)->get();
        $user = User::findOrFail($id);
        $news = News::take(3)->orderBy('id', 'desc')->get();
        return view('labfront.peopleProfile', compact('user', 'news', 'projects', 'papers'))->with('title', 'Profile');
    }








    /*==================================================*/
    //Event List
    /*==================================================*/

    public function events()
    {
        $event = Event::orderBy('id', 'desc')->paginate(5);
        $news = News::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.events', compact('event', 'news'))->with('title', 'Event List');
    }










    /*==================================================*/
    //Event details
    /*==================================================*/
    public function fullEvent($meta_data)
    {
        try {
            $events = Event::where('event_meta_data', '=', $meta_data)->first();
            $event = Event::take(4)->orderBy('id', 'desc')->get(); //recent 3 news
            return view('labfront.event_single', compact('events', 'event'))->with('title', "Details Event");
        } catch (\Exception $e) {
            return "Sorry, Page not Found ";
        }

    }














    /*==================================================*/
    //News List
    /*==================================================*/

    public function news()
    {
        $news = News::orderBy('id', 'desc')->paginate(6);
        $event = Event::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.news', compact('event', 'news'))->with('title', 'News List');
    }










    /*==================================================*/
    //News details
    /*==================================================*/
    public function fullNews($meta_data)
    {
        try {
            $news = News::where('news_meta_data', '=', $meta_data)->first();
            $recent = News::take(4)->orderBy('id', 'desc')->get(); //recent 3 news
            return view('labfront.full_news', compact('news', 'recent'))->with('title', "Details News");
        } catch (\Exception $e) {
            return "Sorry, Page not Found ";
        }

    }










    /*==================================================*/
    //Running Project List
    /*==================================================*/

    public function runningProject()
    {
        $projects = Project::orderBy('id', 'desc')->where('project_status', 1)->paginate(5);
        $news = News::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.project', compact('projects', 'news'))->with('title', 'Running Project');
    }











    /*==================================================*/
    //Complete Project List
    /*==================================================*/

    public function completeProject()
    {
        $projects = Project::orderBy('id', 'desc')->where('project_status', 0)->paginate(5);
        $news = News::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.project', compact('projects', 'news'))->with('title', 'Complete Project');
    }










    /*==================================================*/
    //Project details
    /*==================================================*/
    public function fullProject($meta_data)
    {
        try {
            $project = Project::where('project_meta_data', '=', $meta_data)->first();
            $news = News::take(4)->orderBy('id', 'desc')->get(); //recent 3 news
            return view('labfront.project_single', compact('project', 'news'))->with('title', "Project Details");
        } catch (\Exception $e) {
            return "Sorry, Page not Found ";
        }

    }









    /*==================================================*/
    //Publication/paper Section
    /*==================================================*/

    //show all paper
    public function paper()
    {
        // $papers =   Paper::orderBy('id', 'desc')->paginate(6);
        $journals = Paper::with('users')->where('paper_type', 'journal')->get();
        $conferences = Paper::with('users')->where('paper_type', 'conference')->get();
        $books = Paper::with('users')->where('paper_type', 'book')->get();

        //$event =  Event::take(5)->orderBy('id','desc')->get();
        return view('labfront.publication', compact('event', 'papers', 'journals', 'conferences', 'books'))->with('title', 'Publications');
    }


    //show all journal
    public function journal()
    {
        $papers = Paper::where('paper_type', 'journal')->paginate(6);
        $event = Event::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.paper', compact('event', 'papers'))->with('title', 'Journal Lists');
    }

    //show all conference paper
    public function conference()
    {
        $papers = Paper::where('paper_type', 'conference')->paginate(6);
        $event = Event::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.paper', compact('event', 'papers'))->with('title', 'Conference Papers');
    }

    //show all books
    public function books()
    {
        $papers = Paper::orderBy('id', 'desc')->where('paper_type', 'book')->paginate(6);
        $event = Event::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.paper', compact('event', 'papers'))->with('title', 'Book Lists');
    }


    public function publicationSearch(Request $request)
    {

        return $request->all();
    }


    /*==================================================*/
    //Paper details
    /*==================================================*/
    public function fullPaper($meta_data)
    {
        try {
            $paper = Paper::where('paper_meta_data', '=', $meta_data)->first();
            $news = News::take(4)->orderBy('id', 'desc')->get(); //recent 3 news
            return view('labfront.paper_single', compact('paper', 'news'))->with('title', "Paper Details");
        } catch (\Exception $e) {
            return "Sorry, Page not Found ";
        }

    }


    public function sendAuthorForPaper()
    {
        try {
            $authors = PaperPeople::where('paper_id', '=', 1)->lists('user_id');
            foreach ($authors->paper as $author) {
                return $author;
            }
            return redirect()->back()->with('title', "Paper Details")->with('success', 'Paper Request successfully sent to Paper Author.');
        } catch (\Exception $e) {
            return redirect()->back()->with('title', "Paper Details")->with('error', 'Something went wrong, Please try again.');
        }

    }










    /*==================================================*/
    //Award List
    /*==================================================*/

    public function award()
    {
        $awards = Award::orderBy('id', 'desc')->paginate(6);
        $event = Event::take(5)->orderBy('id', 'desc')->get();
        return view('labfront.award', compact('event', 'awards'))->with('title', 'Award');
    }



    /*==================================================*/
    //Award details
    /*==================================================*/
    public function awardDetails($meta_data)
    {
        try {
            $award = Award::where('award_meta_data', '=', $meta_data)->first();
            $news = News::take(4)->orderBy('id', 'desc')->get(); //recent 3 news
            return view('labfront.award_single', compact('award', 'news'))->with('title', "Award Details");
        } catch (\Exception $e) {
            return "Sorry, Page not Found ";
        }

    }



    /*==================================================*/
    //Backend Error Page
    /*==================================================*/

    public function error()
    {
        return view('error')->with('title', 'Error');
    }

    /*==================================================*/
    //Front end Error Page
    /*==================================================*/

    public function frontError()
    {
        return view('labfront.error')->with('title', 'Error');
    }


}