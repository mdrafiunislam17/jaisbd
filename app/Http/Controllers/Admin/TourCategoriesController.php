<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourCategories;
use App\Models\Setting;
use Illuminate\Http\Request;

class TourCategoriesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('permission:tour-categorics-list|tour-categorics-create|tour-categorics-edit|tour-categorics-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:tour-categorics-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tour-categorics-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tour-categorics-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $categories = TourCategories::latest()->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.tour_categories.index', compact('categories', 'settings'));
    }

    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.tour_categories.create', compact('settings'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TourCategories::create($validated);
        return redirect()->route('visa-categories.index')->with('success', 'Tour Category created successfully.');
    }

    // public function edit(TourCategories  $tourCategories){
    //     $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    //     return view('admin.tour_categories.edit', compact('tourCategories', 'settings'));
    // }


    public function edit(TourCategories $tour_categoric)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('admin.tour_categories.edit', compact('tour_categoric', 'settings'));
    }

    public function update(Request $request, TourCategories $tour_categoric){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tour_categoric->update($validated);
        return redirect()->route('visa-categories.index')->with('success', 'Tour Category updated successfully.');
    }

    public function destroy(TourCategories $tour_categoric){
        try {
            $tour_categoric->delete();
            return redirect()->route('visa-categories.index')->with('success', 'Tour Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('visa-categories.index')->with('error', 'Error deleting Tour Category: ' . $e->getMessage());
        }
    }
}
