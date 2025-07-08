<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Database\QueryException;
use App\Models\Setting;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    //

    public function __construct()
        {
            $this->middleware('permission:designation-list|designation-create|designation-edit|designation-delete')->only('index');
            $this->middleware('permission:designation-create')->only(['create', 'store']);
            $this->middleware('permission:designation-edit')->only(['edit', 'update']);
            $this->middleware('permission:designation-delete')->only('destroy');
        }

    public function index()
    {
        $designations = Designation::all();
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('admin.designation.index',compact('designations', 'settings'));
    }

    public function create()
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('admin.designation.create',compact('settings'));

    }
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
        ]);

        try {
            $designation = new Designation();
            $designation->fill([
                "name" => $request->input("name"),
            ]);





            $designation->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route("designations.index")->with("success", "designation has been inserted successfully.");

    }

    public function edit (Designation $designation)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();
        return view('admin.designation.edit',compact('designation', 'settings'));
    }

    public function update(Request $request, Designation $designation)
    {
        try {
            $designation->fill([
                'name' => $request->input('name'),
            ]);



            $designation->save();

            return redirect()->route('designations.index')->with('success', 'Designation updated successfully.');

        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'DB Error: ' . $e->getCode());
        }
    }


    public function destroy(Designation $designation )
    {
        try {

            $designation->delete();

            return redirect()->route('designations.index')->with('success', 'Designation deleted successfully.');
        } catch (QueryException $e) {
            return back()->with('error', 'Database error: ' . $e->getCode());
        }
    }
}
