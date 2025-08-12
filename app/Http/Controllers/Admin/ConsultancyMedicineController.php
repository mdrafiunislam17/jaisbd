<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConsultancyMedicine;
use App\Models\ConsultancyMedicineCategories;
use App\Models\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ConsultancyMedicineController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('permission:consultancy-medicine-list|consultancy-medicine-create|consultancy-medicine-edit|consultancy-medicine-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:consultancy-medicine-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:consultancy-medicine-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultancy-medicine-delete', ['only' => ['destroy']]);
    }

   private function uploadImage($image): ?string
{
    if ($image && $image->isValid()) {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/consultancyMedicine'), $imageName);
        return $imageName;
    }

    return null;  // Return null if no image uploaded or invalid
}


    public function index(){
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $consultancyMedicines = ConsultancyMedicine::with('category')->latest()->get();
        return view('admin.consultancyMedicine.index', compact('consultancyMedicines', 'settings'));

    }

    public function create(){
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = ConsultancyMedicineCategories::all();
        return view('admin.consultancyMedicine.create', compact('settings', 'categories'));
    }

    // public function store(Request $request){
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'category_id' => 'required|exists:consultancy_medicine_categories,id',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         // Add other validation rules as needed
    //     ]);
    //     try{
    //         $consultancyMedicine = New ConsultancyMedicine();

    //         $consultancyMedicine->fill([
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
    //             // Add other fields as needed
    //         ]);

    //         if ($request->hasFile('image')) {
    //             $consultancyMedicine->image = $this->uploadImage($request->file('image'));
    //         }

    //         $consultancyMedicine->save();

    //         return redirect()->route('consultancy-medicine.index')->with('success', 'Medical Consultancy created successfully.');
    //     }catch(\Exception $e){
    //         return redirect()->back()->with('error', 'Failed to create Medical Consultancy: '.$e->getMessage());
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
                $categories = ConsultancyMedicineCategories::all();
            } else {
                $categories = ConsultancyMedicineCategories::whereIn('id', $selectedCategoryIds)->get();
            }

            // Step 3: Handle image upload once
            $imagePath = $this->uploadImage($request->file('image'));

            // Step 4: Prepare base slug
            $baseSlug = Str::slug($request->input('slug') ?: $request->input('title'));
            $slugCount = 1;

            // Step 5: Create visa records for each category
            foreach ($categories as $category) {
                $consultancyMedicine = new ConsultancyMedicine();

                // Ensure unique slug
                $slug = $baseSlug;
                while (ConsultancyMedicine::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $slugCount++;
                }

                $consultancyMedicine->fill([
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

                $consultancyMedicine->save();
            }

            // Step 6: Redirect success
            return redirect()->route('consultancy-medicine.index')->with('success', 'consultancyMedicine(s) created successfully.');

        } catch (\Exception $e) {
            // Step 7: Log and redirect error
            Log::error('Error creating consultancyMedicine: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Error creating consultancyMedicine: ' . $e->getMessage());
        }
    }


    public function edit($id){
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $consultancyMedicine = ConsultancyMedicine::findOrFail($id);
        $categories = ConsultancyMedicineCategories::all();
        return view('admin.consultancyMedicine.edit', compact('settings', 'consultancyMedicine', 'categories'));
    }

//    public function update(Request $request, $id)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'category_id' => 'required|exists:consultancy_medicine_categories,id',
//         'description' => 'nullable|string',
//         'price' => 'required|numeric',
//         'image' => 'nullable|image|max:10240',
//         // Add other validation rules as needed
//     ]);

//     try {
//         $consultancyMedicine = ConsultancyMedicine::findOrFail($id);

//         $consultancyMedicine->fill([
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
//             $consultancyMedicine->image = $this->uploadImage($request->file('image'));
//         }

//         $consultancyMedicine->save();

//         return redirect()->route('consultancy-medicine.index')->with('success', 'Medical Consultancy updated successfully.');

//     } catch (\Exception $e) {
//         Log::error('ConsultancyMedicine update failed', [
//             'consultancyMedicine_id' => $id,
//             'user_id' => auth()->id(),
//             'error' => $e->getMessage()
//         ]);

//         return redirect()->back()->withInput()->with('error', 'Failed to update Medical Consultancy: ' . $e->getMessage());
//     }
// }


public function update(Request $request, ConsultancyMedicine $consultancy_medicine)
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
            ? ConsultancyMedicineCategories::all()
            : ConsultancyMedicineCategories::whereIn('id', $selectedCategoryIds)->get();

        $categoryIds = $categories->pluck('id')->toArray();

        // Fetch all existing tours with same title (e.g., "Dubai Tour")
        $existingTours = ConsultancyMedicine::where('title', $consultancy_medicine->title)->get()->keyBy('category_id');

        // Delete stale category mappings
        foreach ($existingTours as $existingCategoryId => $existingTour) {
            if (!in_array($existingCategoryId, $categoryIds)) {
                $existingTour->delete();
            }
        }

        // Image processing
        $imagePath = $consultancy_medicine->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('uploads/consultancyMedicine/' . $consultancy_medicine->image);
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
            $consultancy_medicine = $existingTours->get($category->id) ?? new ConsultancyMedicine();

            // Ensure unique slug
            $slug = $baseSlug;
            while (
                ConsultancyMedicine::where('slug', $slug)
                    ->where('id', '!=', $consultancy_medicine->id ?? null)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $slugCount++;
            }

            $consultancy_medicine->fill([
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

            $consultancy_medicine->save();
        }

        return redirect()->route('consultancy-medicine.index')->with('success', 'ConsultancyMedicine(s) updated successfully.');

    } catch (\Exception $e) {
        Log::error('ConsultancyMedicine update failed', [
            'consultancyMedicine_id' => $consultancy_medicine->id,
            'user_id' => auth()->id(),
            'error' => $e->getMessage()
        ]);

        return redirect()->back()->withInput()->with('error', 'Error updating ConsultancyMedicine: ' . $e->getMessage());
    }
}

public function destroy(ConsultancyMedicine $consultancy_medicine)
{
    try {
        $filePath = 'uploads/consultancyMedicine/' . $consultancy_medicine->image;

        if (!empty($consultancy_medicine->image) && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            Log::info("Deleted consultancy_medicine image from storage: {$filePath}");
        } else {
            Log::warning("consultancy_medicine image file not found in storage: {$filePath}");
        }

        $consultancy_medicine->delete();

        return redirect()->route('consultancy-medicine.index')->with('success', 'consultancy-medicine deleted successfully.');
    } catch (\Exception $e) {
        Log::error("Error deleting consultancy_medicine (ID: {$consultancy_medicine->id}): " . $e->getMessage());

        return redirect()->route('consultancy-medicine.index')->with('error', 'Error deleting visa: ' . $e->getMessage());
    }
}

//     public function destroy($id)
// {
//     try {
//         $consultancyMedicine = ConsultancyMedicine::findOrFail($id);
//         $filePath = 'uploads/consultancyMedicine/' . $consultancyMedicine->image;

//         if (!empty($consultancyMedicine->image) && Storage::disk('public')->exists($filePath)) {
//             Storage::disk('public')->delete($filePath);
//             Log::info("Deleted consultancyMedicine image from storage: {$filePath}");
//         } else {
//             Log::warning("File not found in storage: {$filePath}");
//         }

//         $consultancyMedicine->delete();

//         return redirect()->route('consultancy-medicine.index')->with('success', 'Medical Consultancy deleted successfully.');
//     } catch (\Exception $e) {
//         Log::error("Error deleting consultancyMedicine (ID: {$id}): " . $e->getMessage());
//         return redirect()->back()->with('error', 'Failed to delete Medical Consultancy: ' . $e->getMessage());
//     }
// }

}
