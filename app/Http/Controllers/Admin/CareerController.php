<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Models\Career;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class CareerController extends Controller
{
    //
    public function index()
    {
        $creers = Career::all();
        return view('admin.career.index', compact('creers'));
    }
    public function create()
    {
        return view('admin.career.create');
    }
    public function store(Request $request)
    {
        $request->validate([
             'job_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string',
            'vacancies' => 'required|integer',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'deadline' => 'required|date',
        ]);

        try {
            $career = new Career();
            $career->fill([
                "job_title" => $request->input("job_title"),
                "location" => $request->input("location"),
                "job_type" => $request->input("job_type"),
                "vacancies" => $request->input("vacancies"),
                "description" => $request->input("description"),
                "requirements" => $request->input("requirements"),
                "deadline" => $request->input("deadline"),
                "status" => $request->input("status"),
            ]);
            $career->save();

            return redirect()->route('career.index')
                ->with('success', 'Career created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('career.index')->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function edit(Career $career)
    {

        return view('admin.career.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string',
            'vacancies' => 'required|integer',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'deadline' => 'required|date',
        ]);

        try {
            $career->fill([
                "job_title" => $request->input("job_title"),
                "location" => $request->input("location"),
                "job_type" => $request->input("job_type"),
                "vacancies" => $request->input("vacancies"),
                "description" => $request->input("description"),
                "requirements" => $request->input("requirements"),
                "deadline" => $request->input("deadline"),
                "status" => $request->input("status"),
            ]);
            $career->save();

            return redirect()->route('career.index')
                ->with('success', 'Career updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('career.index')->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function destroy(Career $career)
    {
        try {
            $career->delete();
            return redirect()->route('career.index')
                ->with('success', 'Career deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('career.index')->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
