<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaCategories;
use App\Models\Setting;
use Illuminate\Http\Request;

class VisaCategoriesController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('permission:visa-categories-list|visa-categories-create|visa-categories-edit|visa-categories-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:visa-categories-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:visa-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:visa-categories-delete', ['only' => ['destroy']]);
    }


     public function index(){
        $categories = VisaCategories::latest()->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.visa_categories.index', compact('categories', 'settings'));
    }


     public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.visa_categories.create', compact('settings'));
    }


       public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        VisaCategories::create($validated);
        return redirect()->route('visa-categories.index')->with('success', 'Tour Category created successfully.');
    }

   public function edit(VisaCategories $visa_category)
{
    $settings = Setting::pluck("value", "setting_name")->toArray();
    return view('admin.visa_categories.edit', compact('visa_category', 'settings'));
}


    public function update(Request $request, VisaCategories $visa_category){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $visa_category->update($validated);
        return redirect()->route('visa-categories.index')->with('success', 'Tour Category updated successfully.');
    }

    public function destroy(VisaCategories $visa_category){
        try {
            $visa_category->delete();
            return redirect()->route('visa-categories.index')->with('success', 'Tour Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('visa-categories.index')->with('error', 'Error deleting Tour Category: ' . $e->getMessage());
        }
    }
}
