<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudyAbroadCategories;
use App\Models\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudyAbroadCategoriesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('permission:study-abroad-categories-list|study-abroad-categories-create|study-abroad-categories-edit|study-abroad-categories-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:study-abroad-categories-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:study-abroad-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:study-abroad-categories-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $categories = StudyAbroadCategories::latest()->get();
        return view('admin.study_abroad_categories.index', compact('categories', 'settings'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.study_abroad_categories.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        StudyAbroadCategories::create($validated);
        return redirect()->route('study-abroad-categories.index')->with('success', 'Study Abroad Category created successfully.');
    }

    public function edit(StudyAbroadCategories $study_abroad_category)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('admin.study_abroad_categories.edit', compact('study_abroad_category', 'settings'));
    }


    public function update(Request $request, StudyAbroadCategories $study_abroad_category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $study_abroad_category->update($validated);
        return redirect()->route('study-abroad-categories.index')->with('success', 'Study Abroad Category updated successfully.');
    }

    public function destroy(StudyAbroadCategories $study_abroad_category)
    {
        $study_abroad_category->delete();
        return redirect()->route('study-abroad-categories.index')->with('success', 'Study Abroad Category deleted successfully.');
    }
}
