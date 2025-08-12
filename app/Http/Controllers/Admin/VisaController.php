<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visa;
use App\Models\Setting;
use App\Models\VisaCategories;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class VisaController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('permission:visa-list|visa-create|visa-edit|visa-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:visa-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:visa-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:visa-delete', ['only' => ['destroy']]);
    }


   private function uploadImage($image): ?string
    {
        if ($image && $image->isValid()) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/visa'), $imageName);
            return $imageName;
        }

        return null;  // return null if no image or invalid file
    }

    public function index()
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $visas = Visa::with('category')->latest()->get();
        return view('admin.visa.index', compact('visas', 'settings'));
    }

    public function create()
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = VisaCategories::all();
        return view('admin.visa.create', compact('settings', 'categories'));
    }

    // public function store(Request $request)
    // {
    //      $request->validate([
    //         'title' => 'required|string|max:255',
    //         'category_id' => 'required|exists:visa_categories,id',
    //         'description' => 'nullable|string',
    //         'price' => 'nullable|numeric',
    //         // Add other validation rules as needed
    //     ]);
    //     try{
    //         $visa = New Visa();

    //         $visa->fill([
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
    //             $visa->image = $this->uploadImage($request->file('image'));
    //         }

    //         $visa->save();
    //         return redirect()->route('visa.index')->with('success', 'visa created successfully.');
    //     }catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Error creating visa: ' . $e->getMessage());
    //     }
    //     // return redirect()->route('visa.index')->with('success', 'visa created successfully.');
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
                $categories = VisaCategories::all();
            } else {
                $categories = VisaCategories::whereIn('id', $selectedCategoryIds)->get();
            }

            // Step 3: Handle image upload once
            $imagePath = $this->uploadImage($request->file('image'));

            // Step 4: Prepare base slug
            $baseSlug = Str::slug($request->input('slug') ?: $request->input('title'));
            $slugCount = 1;

            // Step 5: Create visa records for each category
            foreach ($categories as $category) {
                $visa = new Visa();

                // Ensure unique slug
                $slug = $baseSlug;
                while (Visa::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $slugCount++;
                }

                $visa->fill([
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
                    'image'       => $imagePath,
                ]);

                $visa->save();
            }

            // Step 6: Redirect success
            return redirect()->route('visa.index')->with('success', 'Visa(s) created successfully.');

        } catch (\Exception $e) {
            // Step 7: Log and redirect error
            Log::error('Error creating visa: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Error creating visa: ' . $e->getMessage());
        }
    }


    public function edit(Visa $visa)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = VisaCategories::all();
        return view('admin.visa.edit', compact('visa', 'settings','categories'));
    }

//    public function update(Request $request, Visa $visa)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'category_id' => 'required|array|min:1',
//         'category_id.*' => 'required|string',
//         'description' => 'nullable|string',
//         'price' => 'nullable|numeric',
//         'image' => 'nullable|image|max:10240',
//         'location' => 'nullable|string|max:255',
//         'duration' => 'nullable|string|max:255',
//         'discount' => 'nullable|numeric',
//         'guests' => 'nullable|integer',
//         'status' => 'required|boolean',
//         'slug' => 'nullable|string|max:255',
//     ]);

//     try {
//         // Slug handling with uniqueness check
//         $inputSlug = $request->input('slug') ?: $request->input('title');
//         $baseSlug = Str::slug($inputSlug);
//         $slugCount = 1;
//         $slug = $baseSlug;

//         // Loop until unique slug found excluding current visa
//         while (Visa::where('slug', $slug)->where('id', '!=', $visa->id)->exists()) {
//             $slug = $baseSlug . '-' . $slugCount++;
//         }

//         $visa->fill([
//             'title' => $request->input('title'),
//             'slug' => $slug,
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
//             // Delete old image if exists
//             $oldPath = public_path('uploads/visa/' . $visa->image);
//             if (!empty($visa->image) && file_exists($oldPath)) {
//                 unlink($oldPath);
//                 Log::info("Old visa image deleted: {$oldPath}");
//             }

//             // Upload new image
//             $visa->image = $this->uploadImage($request->file('image'));
//         }

//         $visa->save();

//         return redirect()->route('visa.index')->with('success', 'Visa updated successfully.');

//     } catch (\Exception $e) {
//         Log::error('Visa update failed', [
//             'visa_id' => $visa->id,
//             'user_id' => auth()->id(),
//             'error' => $e->getMessage()
//         ]);

//         return redirect()->back()->withInput()->with('error', 'Error updating visa: ' . $e->getMessage());
//     }
// }


public function update(Request $request, Visa $visa)
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
            ? VisaCategories::all()
            : VisaCategories::whereIn('id', $selectedCategoryIds)->get();

        $categoryIds = $categories->pluck('id')->toArray();

        // Fetch all existing tours with same title (e.g., "Dubai Tour")
        $existingTours = Visa::where('title', $visa->title)->get()->keyBy('category_id');

        // Delete stale category mappings
        foreach ($existingTours as $existingCategoryId => $existingTour) {
            if (!in_array($existingCategoryId, $categoryIds)) {
                $existingTour->delete();
            }
        }

        // Image processing
        $imagePath = $visa->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('uploads/visa/' . $visa->image);
            if (!empty($visa->image) && file_exists($oldPath)) {
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
            $currentTour = $existingTours->get($category->id) ?? new Visa();

            // Ensure unique slug
            $slug = $baseSlug;
            while (
                Visa::where('slug', $slug)
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

        return redirect()->route('visa.index')->with('success', 'Visa(s) updated successfully.');

    } catch (\Exception $e) {
        Log::error('visa update failed', [
            'visa_id' => $visa->id,
            'user_id' => auth()->id(),
            'error' => $e->getMessage()
        ]);

        return redirect()->back()->withInput()->with('error', 'Error updating tour: ' . $e->getMessage());
    }
}


public function destroy(Visa $visa)
{
    try {
        $filePath = 'uploads/visa/' . $visa->image;

        if (!empty($visa->image) && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            Log::info("Deleted visa image from storage: {$filePath}");
        } else {
            Log::warning("Visa image file not found in storage: {$filePath}");
        }

        $visa->delete();

        return redirect()->route('visa.index')->with('success', 'Visa deleted successfully.');
    } catch (\Exception $e) {
        Log::error("Error deleting visa (ID: {$visa->id}): " . $e->getMessage());

        return redirect()->route('visa.index')->with('error', 'Error deleting visa: ' . $e->getMessage());
    }
}

}
