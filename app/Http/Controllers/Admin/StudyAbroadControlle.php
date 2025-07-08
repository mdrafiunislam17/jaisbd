<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudyAbroad;
use App\Models\Setting;
use App\Models\StudyAbroadCategories;

class StudyAbroadControlle extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('permission:study-abroad-list|study-abroad-create|study-abroad-edit|study-abroad-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:study-abroad-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:study-abroad-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:study-abroad-delete', ['only' => ['destroy']]);
    }

    private function uploadImage($image): string
        {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/studyAbroad'), $imageName);
            return $imageName;
        }


    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $studyAbroads = StudyAbroad::with('category')->latest()->get();
        return view('admin.study_abroad.index', compact('studyAbroads', 'settings'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $categories = StudyAbroadCategories::all();
        return view('admin.study_abroad.create', compact('settings', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:study_abroad_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);
        try{
            $studyAbroads = New StudyAbroad();
            $studyAbroads->fill([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'location' => $request->input('location'),
                'duration' => $request->input('duration'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'price' => $request->input('price'),
                'guests' => $request->input('guests'),
                'discount' => $request->input('discount'),
                'status' => $request->input('status'),
            ]);

             if ($request->hasFile('image')) {
                $studyAbroads->image = $this->uploadImage($request->file('image'));
            }
            $studyAbroads->save();
            return redirect()->route('study-abroad.index')->with('success', 'Study Abroad created successfully.');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create Study Abroad: ' . $e->getMessage());
        }

    }


    public function edit(StudyAbroad $study_abroad)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = StudyAbroadCategories::all();
        return view('admin.study_abroad.edit', compact('study_abroad', 'settings', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:study_abroad_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        try {
            $studyAbroad = StudyAbroad::findOrFail($id);

            $studyAbroad->fill([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'location' => $request->input('location'),
                'duration' => $request->input('duration'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'price' => $request->input('price'),
                'guests' => $request->input('guests'),
                'discount' => $request->input('discount'),
                'status' => $request->input('status'),
            ]);

            if ($request->hasFile('image')) {
                // Optional: Delete old image if exists
                if ($studyAbroad->image && file_exists(public_path('uploads/' . $studyAbroad->image))) {
                    unlink(public_path('uploads/' . $studyAbroad->image));
                }

                $studyAbroad->image = $this->uploadImage($request->file('image'));
            }

            $studyAbroad->save();

            return redirect()->route('study-abroad.index')->with('success', 'Study Abroad updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Study Abroad: ' . $e->getMessage());
        }
    }
    public function destroy(StudyAbroad $study_abroad)
    {
        try {
            // Optional: Delete image if exists
            if ($study_abroad->image && file_exists(public_path('uploads/' . $study_abroad->image))) {
                unlink(public_path('uploads/' . $study_abroad->image));
            }

            $study_abroad->delete();
            return redirect()->route('study-abroad.index')->with('success', 'Study Abroad deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Study Abroad: ' . $e->getMessage());
        }
    }






}
