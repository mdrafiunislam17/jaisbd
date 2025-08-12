<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Setting;
use App\Models\TourCategories;
use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

     private function uploadImage($image): ?string
    {
        if ($image && $image->isValid()) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/tour'), $imageName);
            return $imageName;
        }

        // Return null or empty string when no image uploaded
        return null;
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


    // public function store(Request $request)
    // {
    //      $request->validate([
    //         'title' => 'required|string|max:255',
    //         'category_id' => 'required|exists:tour_categories,id',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         // Add other validation rules as needed
    //     ]);
    //     try{
    //         $tour = New Tours();

    //         $tour->fill([
    //             'title' => $request->input('title'),
    //             'slug' => $request->input('slug'),
    //             'description' => $request->input('description'),
    //             'category_id' => $request->input('category_id'),
    //             'location' => $request->input('location'),
    //             'duration' => $request->input('duration'),
    //             'start_date' => $request->input('start_date'),
    //             'end_date' => $request->input('end_date'),
    //             'price' => $request->input('price'),
    //             'discount' => $request->input('discount'),
    //             'guests' => $request->input('guests'),
    //             'status' => $request->input('status'),
    //         ]);
    //         if ($request->hasFile('image')) {
    //             $tour->image = $this->uploadImage($request->file('image'));
    //         }

    //         $tour->save();
    //         return redirect()->route('tours.index')->with('success', 'Tour created successfully.');
    //     }catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Error creating tour: ' . $e->getMessage());
    //     }
    //     // return redirect()->route('tours.index')->with('success', 'Tour created successfully.');
    // }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|array|min:1',
        'category_id.*' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'image' => 'nullable|image|max:10240',
        // other validations...
    ]);

    try {
        $selectedCategoryIds = $request->input('category_id');

        // Get all category IDs if 'all' is selected
        if (in_array('all', $selectedCategoryIds)) {
            $categories = TourCategories::all();
        } else {
            // Get only selected categories
            $categories = TourCategories::whereIn('id', $selectedCategoryIds)->get();
        }

        // Handle image upload once
        $imagePath = $this->uploadImage($request->file('image'));

        // Generate a base slug
        $baseSlug = Str::slug($request->input('slug') ?: $request->input('title'));
        $slugCount = 1;

        foreach ($categories as $category) {
            $tour = new Tours();

            // Generate unique slug for each tour
            $slug = $baseSlug;
            while (Tours::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $slugCount++;
            }

            $tour->fill([
                'title' => $request->input('title'),
                'slug' => $slug, // Use the unique slug
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
                'image' => $imagePath,
            ]);

            $tour->save();
        }

        return redirect()->route('tours.index')->with('success', 'Tour(s) created successfully.');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error creating tour: ' . $e->getMessage());
    }
}

    public function edit(Tours $tour)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = TourCategories::all();
        return view('admin.tours.edit', compact('tour', 'settings', 'categories'));
    }

//    public function update(Request $request, Tours $tour)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'category_id' => 'required|exists:tour_categories,id',
//         'description' => 'nullable|string',
//         'price' => 'required|numeric',
//         // other rules...
//     ]);

//     try {
//         // Update database fields
//         $tour->update([
//             'title' => $request->input('title'),
//             'slug' => $request->input('slug'),
//             'description' => $request->input('description'),
//             'category_id' => $request->input('category_id'),
//             'location' => $request->input('location'),
//             'duration' => $request->input('duration'),
//             'start_date' => $request->input('start_date'),
//             'end_date' => $request->input('end_date'),
//             'price' => $request->input('price'),
//             'discount' => $request->input('discount'),
//             'guests' => $request->input('guests'),
//             'status' => $request->input('status'),
//         ]);

//         // Handle image update
//         if ($request->hasFile('image')) {
//             $imagePath = public_path('uploads/tour/' . $tour->image);

//             if (!empty($tour->image) && file_exists($imagePath)) {
//                 unlink($imagePath);
//                 Log::info("Old tour image deleted: {$imagePath}");
//             } else {
//                 Log::warning("Old image not found during update: {$imagePath}");
//             }

//             $tour->image = $this->uploadImage($request->file('image'));
//             $tour->save(); // Save the new image path
//         }

//         return redirect()->route('tours.index')->with('success', 'Tour updated successfully.');
//     } catch (\Exception $e) {
//         Log::error("Error updating tour (ID: {$tour->id}): " . $e->getMessage());
//         return redirect()->back()->with('error', 'Error updating tour: ' . $e->getMessage());
//     }
// }


public function update(Request $request, Tours $tour)
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
            ? TourCategories::all()
            : TourCategories::whereIn('id', $selectedCategoryIds)->get();

        $categoryIds = $categories->pluck('id')->toArray();

        // Fetch all existing tours with same title (e.g., "Dubai Tour")
        $existingTours = Tours::where('title', $tour->title)->get()->keyBy('category_id');

        // Delete stale category mappings
        foreach ($existingTours as $existingCategoryId => $existingTour) {
            if (!in_array($existingCategoryId, $categoryIds)) {
                $existingTour->delete();
            }
        }

        // Image processing
        $imagePath = $tour->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('uploads/tour/' . $tour->image);
            if (!empty($tour->image) && file_exists($oldPath)) {
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
            $currentTour = $existingTours->get($category->id) ?? new Tours();

            // Ensure unique slug
            $slug = $baseSlug;
            while (
                Tours::where('slug', $slug)
                    ->where('id', '!=', $currentTour->id ?? null)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $slugCount++;
            }

            $currentTour->fill([
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
                'image' => $imagePath,
            ]);

            $currentTour->save();
        }

        return redirect()->route('tours.index')->with('success', 'Tour(s) updated successfully.');

    } catch (\Exception $e) {
        Log::error('Tour update failed', [
            'tour_id' => $tour->id,
            'user_id' => auth()->id(),
            'error' => $e->getMessage()
        ]);

        return redirect()->back()->withInput()->with('error', 'Error updating tour: ' . $e->getMessage());
    }
}


public function destroy(Tours $tour)
{
    try {
        $filePath = 'uploads/tour/' . $tour->image;

        if (!empty($tour->image) && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            Log::info("Deleted tour image from storage: {$filePath}");
        } else {
            Log::warning("File not found in storage: {$filePath}");
        }

        $tour->delete();

        return redirect()->route('tours.index')->with('success', 'Tour deleted successfully.');
    } catch (\Exception $e) {
        Log::error("Error deleting tour (ID: {$tour->id}): " . $e->getMessage());

        return redirect()->route('tours.index')->with('error', 'Error deleting tour: ' . $e->getMessage());
    }
}

}
