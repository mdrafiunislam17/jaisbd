<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Choose;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Slider;
use App\Models\ProjectCategory;
use App\Models\ProjectInfo;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class FrontedController extends Controller
{
    //

     public function index ()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $slider = Slider::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $about = About::latest()->first();

      $services = Service::query()
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->take(4) // অথবা ->limit(4)
            ->get();

        $choose = Choose::latest()->first();
        $projects = Project::query()
                        ->where('status', 1)
                        ->orderBy('id', 'desc')
                        ->take(6)
                        ->get();
        $projectInfo = ProjectCategory::all();

         $teamMembers = TeamMember::with(['management', 'designation'])
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();
        $blogs = Blog::query()
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $clients = Client::all();

        return view('fronted.index',
            compact('settings', 'slider', 'about', 'services',
             'choose', 'projects', 'projectInfo','teamMembers',
             'blogs','clients'));
    }

public function aboutus()
{
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    $about = About::latest()->first();

    return view('fronted.aboutus',
            compact('settings', 'about',));

}


public function projectus(){

     $settings = Setting::query()->pluck("value", "setting_name")->toArray();
      $projects = Project::query()
                        ->where('status', 1)
                        ->orderBy('id', 'desc')
                        ->get();
        $projectInfo = ProjectCategory::all();
        return view('fronted.projectus',
            compact('settings', 'projects', 'projectInfo',));

}


public function servicesDetails($slug)
{
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    // যেই slug ইউজার ক্লিক করেছে, সেটা অনুযায়ী সার্ভিস খুঁজে আনা
    $service = Service::query()
        ->where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

    // সাইডবারে সব সার্ভিস দেখানোর জন্য
    $services = Service::query()
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->get();



    return view('fronted.services', compact('settings', 'service', 'services'));
}


public function chooseDetails($slug)
{
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    $choose = Choose::query()
        ->where('status', 1)
        ->firstOrFail(); // or use ->first() with null check
    return view('fronted.choose', compact('settings', 'choose'));
}


public function projectDetails($title)
{
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    $project = Project::query()
        ->where('title', $title)
        ->where('status', 1)
        ->firstOrFail();

    $projectInfo = ProjectInfo::find($project->project_info_id);



    return view('fronted.project', compact('settings', 'project', 'projectInfo'));
}

public function ourBlog(){

    $settings = Setting::query()->pluck("value", "setting_name")->toArray();



    $blogs = Blog::query()
        ->where('status', 1)
        ->orderBy('id', 'desc')
          ->paginate(6);

    return view('fronted.blogStandard',compact('settings',  'blogs'));

}

public function blogDetails($title)
{
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    $blog = Blog::query()
        ->where('title', $title)
        ->where('status', 1)
        ->firstOrFail();

    $blogs = Blog::query()
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->get();

    return view('fronted.blogDetails', compact('settings', 'blog', 'blogs'));
}

public function ourTeam(){
$settings = Setting::query()->pluck("value", "setting_name")->toArray();
     $teamMembers = TeamMember::query()
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();
    return view('fronted.team', compact('settings',  'teamMembers'));

}


public function teamDetails($name){
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();
   $teamMember = TeamMember::with(['management', 'designation'])
                ->where('name', $name)
                ->where('status', 1)
                ->firstOrFail();

    return view('fronted.teamDetails', compact('settings',  'teamMember'));

}

public function contact(){
     $settings = Setting::query()->pluck("value", "setting_name")->toArray();

     return view('fronted.contact',compact('settings'));
}

}
