<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visa;
use App\Models\Setting;
use App\Models\VisaCategories;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;

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


    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/visa'), $imageName);
        return $imageName;
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

    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:visa_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);
        try{
            $visa = New Visa();

            $visa->fill([
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
                $visa->image = $this->uploadImage($request->file('image'));
            }

            $visa->save();
            return redirect()->route('visa.index')->with('success', 'visa created successfully.');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating visa: ' . $e->getMessage());
        }
        // return redirect()->route('visa.index')->with('success', 'visa created successfully.');
    }

    public function edit(Visa $visa)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $categories = VisaCategories::all();
        return view('admin.visa.edit', compact('visa', 'settings','categories'));
    }

    public function update(Request $request, Visa $visa)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:visa_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        try {
            $visa->fill([
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
                $visa->image = $this->uploadImage($request->file('image'));
            }

            $visa->save();
            return redirect()->route('visa.index')->with('success', 'Visa updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating visa: ' . $e->getMessage());
        }
    }

    public function destroy(Visa $visa)
    {
        try {
            $visa->delete();
            return redirect()->route('visa.index')->with('success', 'Visa deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('visa.index')->with('error', 'Error deleting visa: ' . $e->getMessage());
        }
    }
}
