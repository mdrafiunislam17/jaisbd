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
         $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:tour_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);
        try{
            $tour = New Tours();

            $tour->fill([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'location' => $request->input('location'),
                'duration' => $request->input('duration'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'guests' => $request->input('guests'),
                'status' => $request->input('status'),
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

    public function edit(Tours $tour)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = TourCategories::all();
        return view('admin.tours.edit', compact('tour', 'settings', 'categories'));
    }

   public function update(Request $request, Tours $tour)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:tour_categories,id',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        // other rules...
    ]);

    try {
        // Update database fields
        $tour->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'location' => $request->input('location'),
            'duration' => $request->input('duration'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'guests' => $request->input('guests'),
            'status' => $request->input('status'),
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            $imagePath = public_path('uploads/tour/' . $tour->image);

            if (!empty($tour->image) && file_exists($imagePath)) {
                unlink($imagePath);
                Log::info("Old tour image deleted: {$imagePath}");
            } else {
                Log::warning("Old image not found during update: {$imagePath}");
            }

            $tour->image = $this->uploadImage($request->file('image'));
            $tour->save(); // Save the new image path
        }

        return redirect()->route('tours.index')->with('success', 'Tour updated successfully.');
    } catch (\Exception $e) {
        Log::error("Error updating tour (ID: {$tour->id}): " . $e->getMessage());
        return redirect()->back()->with('error', 'Error updating tour: ' . $e->getMessage());
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
