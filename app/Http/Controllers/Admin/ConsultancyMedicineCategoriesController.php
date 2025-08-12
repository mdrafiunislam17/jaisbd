<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultancyMedicineCategories;
use App\Models\Setting;
use Illuminate\Http\Request;

class ConsultancyMedicineCategoriesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('permission:consultancy-medicine-categories-list|consultancy-medicine-categories-create|consultancy-medicine-categories-edit|consultancy-medicine-categories-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:consultancy-medicine-categories-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:consultancy-medicine-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultancy-medicine-categories-delete', ['only' => ['destroy']]);
    }

    public function  index(){

        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $categories = ConsultancyMedicineCategories::latest()->get();
        return view('admin.consultancy_medicine_categories.index', compact('categories', 'settings'));
    }


    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.consultancy_medicine_categories.create', compact('settings'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ConsultancyMedicineCategories::create($validated);
        return redirect()->route('consultancy-medicine-categories.index')->with('success', 'Medical Consultancy created successfully.');
    }


    public function edit(ConsultancyMedicineCategories $consultancy_medicine_category)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('admin.consultancy_medicine_categories.edit', compact('consultancy_medicine_category', 'settings'));
    }

    public function update(Request $request, ConsultancyMedicineCategories $consultancy_medicine_category){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $consultancy_medicine_category->update($validated);
        return redirect()->route('consultancy-medicine-categories.index')->with('success', 'Medical Consultancy updated successfully.');
    }

    public function destroy(ConsultancyMedicineCategories $consultancy_medicine_category)
    {
        $consultancy_medicine_category->delete();
        return redirect()->route('consultancy-medicine-categories.index')->with('success', 'Medical Consultancy deleted successfully.');
    }
}
