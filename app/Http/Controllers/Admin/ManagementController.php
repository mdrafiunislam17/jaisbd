<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    //

    public function index()
    {
        $managements = Management::all();
        return view('admin.management.index',compact('managements'));
    }

    public function create()
    {
        return view('admin.management.create');

    }
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
        ]);

        try {
            $management = new Management();
            $management->fill([
                "name" => $request->input("name"),
            ]);





            $management->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route("managements.index")->with("success", "management has been inserted successfully.");

    }

    public function edit (Management $management)
    {
        return view('admin.management.edit',compact('management'));
    }

    public function update(Request $request, Management $management)
    {
        try {
            $management->fill([
                'name' => $request->input('name'),
            ]);



            $management->save();

            return redirect()->route('managements.index')->with('success', 'management updated successfully.');

        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'DB Error: ' . $e->getCode());
        }
    }


    public function destroy(Management $management)
    {
        try {

            $management->delete();

            return redirect()->route('managements.index')->with('success', 'Management deleted successfully.');
        } catch (QueryException $e) {
            return back()->with('error', 'Database error: ' . $e->getCode());
        }
    }
}
