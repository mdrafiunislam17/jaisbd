<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudyAbroad;
use App\Models\Setting;
use App\Models\StudyAbroadCategories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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

    private function uploadImage($image): ?string
    {
        if ($image && $image->isValid()) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/studyAbroad'), $imageName);
            return $imageName;
        }

        return null;  // No image uploaded or invalid file
    }

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $studyAbroads = StudyAbroad::with('category')->orderBy('sort', 'asc')->get();
        return view('admin.study_abroad.index', compact('studyAbroads', 'settings'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $categories = StudyAbroadCategories::all();
        return view('admin.study_abroad.create', compact('settings', 'categories'));
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'category_id' => 'required|exists:study_abroad_categories,id',
    //         'description' => 'nullable|string',
    //         'price' => 'nullable|numeric',
    //         // Add other validation rules as needed
    //     ]);
    //     try{
    //         $studyAbroads = New StudyAbroad();
    //         $studyAbroads->fill([
    //             'title' => $request->input('title'),
    //             'slug' => $request->input('slug'),
    //             'description' => $request->input('description'),
    //             'category_id' => $request->input('category_id'),
    //             'location' => $request->input('location'),
    //             'duration' => $request->input('duration'),
    //             'start_date' => $request->input('start_date'),
    //             'end_date' => $request->input('end_date'),
    //             'price' => $request->input('price'),
    //             'guests' => $request->input('guests'),
    //             'discount' => $request->input('discount'),
    //             'status' => $request->input('status'),
    //         ]);

    //          if ($request->hasFile('image')) {
    //             $studyAbroads->image = $this->uploadImage($request->file('image'));
    //         }
    //         $studyAbroads->save();
    //         return redirect()->route('study-abroad.index')->with('success', 'Study Abroad created successfully.');
    //     }catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to create Study Abroad: ' . $e->getMessage());
    //     }

    // }


     public function store(Request $request)
    {
        // Step 1: Validate incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|array|min:1',
            'category_id.*' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|max:10240',
        ]);

        try {
            $selectedCategoryIds = $request->input('category_id');

            // Step 2: Resolve categories
            if (in_array('all', $selectedCategoryIds)) {
                $categories = StudyAbroadCategories::all();
            } else {
                $categories = StudyAbroadCategories::whereIn('id', $selectedCategoryIds)->get();
            }

            // Step 3: Handle image upload once
            $imagePath = $this->uploadImage($request->file('image'));

            // Step 4: Prepare base slug
            $baseSlug = Str::slug($request->input('slug') ?: $request->input('title'));
            $slugCount = 1;

            // Step 5: Create visa records for each category
            foreach ($categories as $category) {
                $studyAbroads = new StudyAbroad();

                // Ensure unique slug
                $slug = $baseSlug;
                while (StudyAbroad::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $slugCount++;
                }

                $studyAbroads->fill([
                    'title'       => $request->input('title'),
                    'slug'        => $slug,
                    'description' => $request->input('description'),
                    'category_id' => $category->id,
                    'location'    => $request->input('location'),
                    'duration'    => $request->input('duration'),
                    'start_date'  => $request->input('start_date'),
                    'end_date'    => $request->input('end_date'),
                    'price'       => $request->input('price'),
                    'discount'    => $request->input('discount'),
                    'guests'      => $request->input('guests'),
                    'status'      => $request->input('status'),
                     'sort' => $request->input('sort'),
                    'image'       => $imagePath,
                ]);

                $studyAbroads->save();
            }

            // Step 6: Redirect success
            return redirect()->route('study-abroad.index')->with('success', 'studyAbroads(s) created successfully.');

        } catch (\Exception $e) {
            // Step 7: Log and redirect error
            Log::error('Error creating studyAbroads: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Error creating studyAbroads: ' . $e->getMessage());
        }
    }


    public function edit(StudyAbroad $study_abroad)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = StudyAbroadCategories::all();
        return view('admin.study_abroad.edit', compact('study_abroad', 'settings', 'categories'));
    }


    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'category_id' => 'required|exists:study_abroad_categories,id',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         // Add other validation rules as needed
    //     ]);

    //     try {
    //         $studyAbroad = StudyAbroad::findOrFail($id);

    //         $studyAbroad->fill([
    //             'title' => $request->input('title'),
    //             'slug' => $request->input('slug'),
    //             'description' => $request->input('description'),
    //             'category_id' => $request->input('category_id'),
    //             'location' => $request->input('location'),
    //             'duration' => $request->input('duration'),
    //             'start_date' => $request->input('start_date'),
    //             'end_date' => $request->input('end_date'),
    //             'price' => $request->input('price'),
    //             'guests' => $request->input('guests'),
    //             'discount' => $request->input('discount'),
    //             'status' => $request->input('status'),
    //         ]);

    //         if ($request->hasFile('image')) {
    //             // Optional: Delete old image if exists
    //             if ($studyAbroad->image && file_exists(public_path('uploads/' . $studyAbroad->image))) {
    //                 unlink(public_path('uploads/' . $studyAbroad->image));
    //             }

    //             $studyAbroad->image = $this->uploadImage($request->file('image'));
    //         }

    //         $studyAbroad->save();

    //         return redirect()->route('study-abroad.index')->with('success', 'Study Abroad updated successfully.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to update Study Abroad: ' . $e->getMessage());
    //     }
    // }


    public function update(Request $request, StudyAbroad $study_abroad)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|array|min:1',
        'category_id.*' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'image' => 'nullable|image|max:10240',
        'location' => 'nullable|string|max:255',
        'duration' => 'nullable|string|max:255',
        'discount' => 'nullable|numeric',
        'guests' => 'nullable|integer',
        'status' => 'required|boolean',
        'slug' => 'nullable|string|max:255',
    ]);

    try {
        // Fetch selected categories
        $selectedCategoryIds = $request->input('category_id');

        $categories = in_array('all', $selectedCategoryIds)
            ? StudyAbroadCategories::all()
            : StudyAbroadCategories::whereIn('id', $selectedCategoryIds)->get();

        $categoryIds = $categories->pluck('id')->toArray();

        // Fetch all existing tours with same title (e.g., "Dubai Tour")
        $existingTours = StudyAbroad::where('title', $study_abroad->title)->get()->keyBy('category_id');

        // Delete stale category mappings
        foreach ($existingTours as $existingCategoryId => $existingTour) {
            if (!in_array($existingCategoryId, $categoryIds)) {
                $existingTour->delete();
            }
        }

        // Image processing
        $imagePath = $study_abroad->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('uploads/studyAbroad/' . $study_abroad->image);
            if (!empty($study_abroad->image) && file_exists($oldPath)) {
                unlink($oldPath);
                Log::info("Old image deleted: {$oldPath}");
            }

            $imagePath = $this->uploadImage($request->file('image'));
        }

        // Slug logic
        $inputSlug = $request->input('slug') ?: $request->input('title');
        $baseSlug = Str::slug($inputSlug);
        $slugCount = 1;

        foreach ($categories as $category) {
            $study_abroad = $existingTours->get($category->id) ?? new StudyAbroad();

            // Ensure unique slug
            $slug = $baseSlug;
            while (
                StudyAbroad::where('slug', $slug)
                    ->where('id', '!=', $study_abroad->id ?? null)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $slugCount++;
            }

            $study_abroad->fill([
                'title' => $request->input('title'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'category_id' => $category->id,
                'location' => $request->input('location'),
                'duration' => $request->input('duration'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'guests' => $request->input('guests'),
                'status' => $request->input('status'),
                 'sort' => $request->input('sort'),
                'image' => $imagePath,
            ]);

            $study_abroad->save();
        }

        return redirect()->route('study-abroad.index')->with('success', 'study-abroad(s) updated successfully.');

    } catch (\Exception $e) {
        Log::error('Tour update failed', [
            'studyAbroad_id' => $study_abroad->id,
            'user_id' => auth()->id(),
            'error' => $e->getMessage()
        ]);

        return redirect()->back()->withInput()->with('error', 'Error updating tour: ' . $e->getMessage());
    }
}
    // public function destroy(StudyAbroad $StudyAbroad)
    // {
    //     try {
    //         // Optional: Delete image if exists
    //         if ($study_abroad->image && file_exists(public_path('uploads/' . $study_abroad->image))) {
    //             unlink(public_path('uploads/' . $study_abroad->image));
    //         }

    //         $study_abroad->delete();
    //         return redirect()->route('study-abroad.index')->with('success', 'Study Abroad deleted successfully.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to delete Study Abroad: ' . $e->getMessage());
    //     }
    // }


//     public function destroy(StudyAbroad $study_abroad)
// {
//     try {
//         $filePath = 'uploads/studyAbroad/' . $study_abroad->image;

//         if (!empty($study_abroad->image) && Storage::disk('public')->exists($filePath)) {
//             Storage::disk('public')->delete($filePath);
//             Log::info("Deleted study_abroad image from storage: {$filePath}");
//         } else {
//             Log::warning("File not found in storage: {$filePath}");
//         }

//         $study_abroad->delete();

//         return redirect()->route('study_abroads.index')->with('success', 'study_abroad deleted successfully.');
//     } catch (\Exception $e) {
//         Log::error("Error deleting study_abroad (ID: {$study_abroad->id}): " . $e->getMessage());

//         return redirect()->route('study_abroads.index')->with('error', 'Error deleting study_abroad: ' . $e->getMessage());
//     }
// }


public function destroy(StudyAbroad $study_abroad)
{
    try {
        $filePath = 'uploads/studyAbroad/' . $study_abroad->image;

        if (!empty($study_abroad->image) && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            Log::info("Deleted study_abroad image from storage: {$filePath}");
        } else {
            Log::warning("study_abroad image file not found in storage: {$filePath}");
        }

        $study_abroad->delete();

        return redirect()->route('study-abroad.index')->with('success', 'study_abroads deleted successfully.');
    } catch (\Exception $e) {
        Log::error("Error deleting study_abroad (ID: {$study_abroad->id}): " . $e->getMessage());

        return redirect()->route('study-abroad.index')->with('error', 'Error deleting visa: ' . $e->getMessage());
    }
}




}
