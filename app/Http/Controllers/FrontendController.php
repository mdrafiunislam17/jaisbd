<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\Tours;
use App\Models\TourCategories;
use App\Models\Setting;
use App\Models\Visa;
use App\Models\VisaCategories;
use App\Models\ConsultancyMedicine;
use App\Models\ConsultancyMedicineCategories;
use App\Models\StudyAbroad;
use App\Models\StudyAbroadCategories;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Management;
use App\Models\Designation;
use App\Models\Blog;
use App\Models\Contact;

class FrontendController extends Controller
{
    //

    public function index()
    {
        // Logic to handle the frontend index page

        $sliders = Slider::where('status', 1)
            // ->orderBy('sort', 'asc')
            ->get();
        $tours = Tours::with('category')->get();
        $tourCategories = TourCategories::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $visa = Visa::with('category')->get();
        $visaCategories = VisaCategories::all();
        $consultancyMedicine = ConsultancyMedicine::with('category')->get();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroad = StudyAbroad::with('category')->get();
        $studyAbroadCategories = StudyAbroadCategories::all();
        return view('frontend.index', compact('sliders', 'tours','tourCategories','consultancyMedicine','consultancyMedicineCategories','studyAbroad', 'settings','studyAbroadCategories', 'visa', 'visaCategories'));
    }


    // public function toursByCategory(Request $request , $name)
    // {
    //     $category = TourCategories::where('name', $name)->firstOrFail();
    //     $tours = Tours::where('category_id', $category->id)->get();
    //     $tourCategories = TourCategories::all();
    //     $visaCategories = VisaCategories::all();
    //     $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
    //     $studyAbroadCategories = StudyAbroadCategories::all();
    //    $searchQuery = $request->input('search');


    //     if ($searchQuery) {
    //         $searchChars = str_split($searchQuery);

    //         $tours->where(function ($query) use ($searchChars) {
    //             foreach ($searchChars as $char) {
    //                 $query->where('location', 'like', '%' . $char . '%');
    //             }
    //         });
    //     }
    //     $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    //     return view('frontend.category_tours', compact('category', 'tours','tourCategories','visaCategories','studyAbroadCategories','consultancyMedicineCategories','settings'));
    // }



    public function toursByCategory(Request $request , $name)
    {
        $category = TourCategories::where('name', $name)->firstOrFail();

        $query = Tours::where('category_id', $category->id);

        $searchQuery = $request->input('location');
        if ($searchQuery) {
            $query->where('location', 'like', '%' . $searchQuery . '%');
        }

        $tours = $query->get();

        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $allLocations = Tours::where('category_id', $category->id)
                ->pluck('location')
                ->unique()
                ->filter()
                ->values();


        return view('frontend.category_tours', compact(
            'category',
            'tours',
            'allLocations',
            'tourCategories',
            'visaCategories',
            'studyAbroadCategories',
            'consultancyMedicineCategories',
            'settings'
        ));
    }



    public function visaByCategory($name)
    {
        $category = VisaCategories::where('name', $name)->firstOrFail();
        $visas = Visa::where('category_id', $category->id)->get();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $allLocations = Visa::where('category_id', $category->id)
            ->pluck('location')
            ->unique()
            ->filter()
            ->values();

        return view('frontend.category_visas', compact('category','allLocations', 'visas', 'tourCategories', 'visaCategories', 'studyAbroadCategories', 'consultancyMedicineCategories', 'settings'));
    }

    public function consultancyByCategory($name)
    {
        $category = ConsultancyMedicineCategories::where('name', $name)->firstOrFail();
        $consultancyMedicine = ConsultancyMedicine::where('category_id', $category->id)->get();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $allLocations = ConsultancyMedicine::where('category_id', $category->id)
            ->pluck('location')
            ->unique()
            ->filter()
            ->values();

        return view('frontend.category_consultancy', compact('allLocations','category', 'consultancyMedicine', 'tourCategories', 'visaCategories', 'studyAbroadCategories', 'consultancyMedicineCategories', 'settings'));
    }

    public function consultancyShow($slug)
    {
        $consultancy = ConsultancyMedicine::where('slug', $slug)->firstOrFail();

        return view('frontend.consultancy_details', compact('consultancy'));
    }




    public function studyAbroadByCategory($name)
    {
        $category = StudyAbroadCategories::where('name', $name)->firstOrFail();
        $studyAbroad = StudyAbroad::where('category_id', $category->id)->get();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $allLocations = StudyAbroad::where('category_id', $category->id)
            ->pluck('location')
            ->unique()
            ->filter()
            ->values();

        return view('frontend.category_study_abroad', compact('allLocations','category', 'studyAbroad', 'tourCategories', 'visaCategories', 'studyAbroadCategories', 'consultancyMedicineCategories', 'settings'));
    }




    // public function visaByCategory($name)
    // {
    //     $visaCategories = VisaCategories::where('name', $name)->firstOrFail();
    //     $visas = Visa::where('category_id', $category->id)->get();
    //     $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    //     return view('frontend.category_visa', compact( 'visas','visaCategories','settings'));
    // }

    // public function visaByCategory($name)
    // {
    //     // Get the visa category by name
    //     $category = VisaCategories::where('name', $name)->firstOrFail();

    //     // Get all visas that belong to this category
    //     $visas = Visa::where('category_id', $visaCategories->id)->get();

    //     // Get all settings in key-value format
    //     $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    //     $tourCategories = TourCategories::all();
    //     $visaCategories = VisaCategories::all();
    //     // Return the view with data
    //     return view('frontend.category_visa', compact('visas', 'visaCategories','category','tourCategories', 'settings'));
    // }





    public function search(Request $request, $name)
    {
        $query = Tours::query();

        if ($request->filled('destination')) {
            $query->where('destination', 'like', '%' . $request->destination . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
         if ($request->filled('price')) {
            $query->where('price', 'like', '%' . $request->price . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('duration')) {
            $duration = explode('-', $request->duration);
            if (count($duration) === 2) {
                $query->whereBetween('duration_days', [(int)$duration[0], (int)$duration[1]]);
            }
        }

        if ($request->filled('guests')) {
            $query->where('max_guests', '>=', $request->guests);
        }

        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }



        $tours = $query->get();

        // Get all unique filter options
        $locations = Tours::select('location')->distinct()->pluck('location');
        $durations = Tours::select('duration')->distinct()->pluck('duration');
        $tourCategories = TourCategories::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $category = TourCategories::where('name', $name)->firstOrFail();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        return view('frontend.category_tours', compact('tours','category',
        'tourCategories','settings', 'locations',
        'durations','visaCategories', 'consultancyMedicineCategories',
        'studyAbroadCategories'));
    }



    public function show($slug   )
    {
        $tour = Tours::where('slug', $slug)->firstOrFail();
          $tourCategories = TourCategories::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $category = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        return view('frontend.tourDetails', compact('tour','tourCategories','settings', 'category',
        'visaCategories', 'consultancyMedicineCategories', 'studyAbroadCategories'));
    }



    public function aboutUs()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $about = About::latest()->first();
        // $category = About::where('title', $title)->firstOrFail();
        return view('frontend.about', compact('settings',
            'tourCategories',
            'visaCategories',
            'consultancyMedicineCategories',
            'studyAbroadCategories',
            'about',
            // 'category'
        ));
    }


    public function teamMember()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $managements = Management::all();
        $designations = Designation::all();
        $teamMembers = TeamMember::all(); // Assuming you have a TeamMember model
        return view('frontend.team_member', compact('settings',
            'tourCategories',
            'visaCategories',
            'consultancyMedicineCategories',
            'studyAbroadCategories',
            'teamMembers',
            'managements',
            'designations'

        ));
    }

    public function teamMemberDetails($name)
    {
        $teamMember = TeamMember::where('name', $name)->firstOrFail();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $managements = Management::all();
        $designations = Designation::all();
        return view('frontend.team_member_details', compact('teamMember', 'settings',
            'tourCategories',
            'visaCategories',
            'consultancyMedicineCategories',
            'studyAbroadCategories',
            'teamMember',
            'managements',
            'designations'

        ));
    }


    public function blog(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $blogs = Blog::where('status', 1)
             ->orderBy('posted_on', 'desc')
             ->paginate(3);
        // $blog = Blog::all();

         $recentBlogs = Blog::where('status', 1)
         ->orderBy('posted_on', 'desc')
         ->get();

        return view('frontend.blog', compact('settings',
            'tourCategories',
            'visaCategories',
            'consultancyMedicineCategories',
            'studyAbroadCategories',
            'blogs',
            'recentBlogs'
        ));
    }


    public function blogDetails($title)
    {
        $blog = Blog::where('title', $title)->firstOrFail();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $tourCategories = TourCategories::all();
        $visaCategories = VisaCategories::all();
        $consultancyMedicineCategories =ConsultancyMedicineCategories::all();
        $studyAbroadCategories = StudyAbroadCategories::all();
        $recentBlogs = Blog::where('status', 1)
         ->orderBy('posted_on', 'desc')
         ->get();
        return view('frontend.blog_details', compact('blog', 'settings',
            'tourCategories',
            'visaCategories',
            'consultancyMedicineCategories',
            'studyAbroadCategories',
            'recentBlogs'
        ));
    }









      public function contact()
        {

            $tourCategories = TourCategories::all();
            $visaCategories = VisaCategories::all();
            $consultancyMedicineCategories = ConsultancyMedicineCategories::all();
            $studyAbroadCategories = StudyAbroadCategories::all();
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('frontend.contact',compact('settings',
                'tourCategories',
                'visaCategories',
                'consultancyMedicineCategories',
                'studyAbroadCategories'
                ));
        }


       public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();

         return redirect()->back()->with('success', 'Contact created successfully.');
    }


}
