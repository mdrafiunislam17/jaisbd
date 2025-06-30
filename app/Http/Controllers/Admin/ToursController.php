<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Setting;
use App\Models\TourCategories;
use App\Models\Tours;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('permission:tour-list|tour-create|tour-edit|tour-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:tour-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tour-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tour-delete', ['only' => ['destroy']]);
    }

      private function uploadImage($image): string
        {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/tour'), $imageName);
            return $imageName;
        }

    public function index()
    {
         $settings = Setting::pluck("value", "setting_name")->toArray();
         $tours = Tours::with('category')->latest()->get();
        return view('admin.tours.index', compact('tours', 'settings'));
    }

    public function create()
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = TourCategories::all();
        return view('admin.tours.create', compact('settings', 'categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:tour_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);
        try{
            $tour = New Tours();

            $tour->file([
                'title' => $request->input('name'),
                'slug' => $request->input('name'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'location' => $request->input('location'),
                'duration' => $request->input('duration'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'price' => $request->input('price'),
                'status' => $request->input('status', 0),
            ]);
            if ($request->hasFile('image')) {
                $tour->image = $this->uploadImage($request->file('image'));
            }

            $tour->save();
            return redirect()->route('tours.index')->with('success', 'Tour created successfully.');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating tour: ' . $e->getMessage());
        }
        // return redirect()->route('tours.index')->with('success', 'Tour created successfully.');
    }
}
