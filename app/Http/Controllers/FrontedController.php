<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Choose;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
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

         $teamMembers = TeamMember::query()
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();

        return view('fronted.index',
            compact('settings', 'slider', 'about', 'services',
             'choose', 'projects', 'projectInfo','teamMembers'));
    }

// public function servicesDetails($slug)
// {
//     $settings = Setting::query()->pluck("value", "setting_name")->toArray();

//     $service = Service::query()
//         ->where('status', 1)
//         ->firstOrFail(); // or use ->first() with null check



//     return view('fronted.services', compact('settings', 'service'));
// }


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

    // public function servicesDetails(Service $service)
    // {
    //     $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    //     $services = Service::query()
    //         ->where('status', 1)
    //         ->orderBy('id', 'asc')
    //         ->get();

    //     return view('fronted.services', compact('settings', 'services'));

    // }
}
