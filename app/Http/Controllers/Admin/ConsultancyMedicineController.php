<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConsultancyMedicine;
use App\Models\ConsultancyMedicineCategories;
use App\Models\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

       private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/consultancyMedicine'), $imageName);
        return $imageName;
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

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:consultancy_medicine_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);
        try{
            $consultancyMedicine = New ConsultancyMedicine();

            $consultancyMedicine->fill([
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
                // Add other fields as needed
            ]);

            if ($request->hasFile('image')) {
                $consultancyMedicine->image = $this->uploadImage($request->file('image'));
            }

            $consultancyMedicine->save();

            return redirect()->route('consultancy-medicine.index')->with('success', 'Medical Consultancy created successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to create Medical Consultancy: '.$e->getMessage());
        }
    }

    public function edit($id){
        $settings = Setting::pluck("value", "setting_name")->toArray();
        $consultancyMedicine = ConsultancyMedicine::findOrFail($id);
        $categories = ConsultancyMedicineCategories::all();
        return view('admin.consultancyMedicine.edit', compact('settings', 'consultancyMedicine', 'categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:consultancy_medicine_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);
        try{
            $consultancyMedicine = ConsultancyMedicine::findOrFail($id);

            $consultancyMedicine->fill([
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
                // Add other fields as needed
            ]);

            if ($request->hasFile('image')) {
                $consultancyMedicine->image = $this->uploadImage($request->file('image'));
            }

            $consultancyMedicine->save();

            return redirect()->route('consultancy-medicine.index')->with('success', 'Medical Consultancy updated successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to update Medical Consultancy: '.$e->getMessage());
        }
    }

    public function destroy($id){
        try {
            $consultancyMedicine = ConsultancyMedicine::findOrFail($id);
            $consultancyMedicine->delete();
            return redirect()->route('consultancy-medicine.index')->with('success', 'Medical Consultancy deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Medical Consultancy: ' . $e->getMessage());
        }
    }
}
