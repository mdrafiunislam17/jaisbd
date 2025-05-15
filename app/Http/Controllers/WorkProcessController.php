<?php

namespace App\Http\Controllers;

use App\Models\WorkProcess;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class WorkProcessController extends Controller
{
    //


    private function uploadIcon($icon): string
    {
        $iconName = time() . '.' . $icon->getClientOriginalExtension();
        $icon->move(public_path('uploads/work'), $iconName);
        return $iconName;
    }

    public function index()
    {
        $workProcesses = WorkProcess::all();
        return view('admin.work_processes.index', compact('workProcesses'));
    }

    public function create()
    {
        return view('admin.work_processes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            "icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
             $workProcess = New  WorkProcess();

            $workProcess->fill([
                "name" => $request->input("name"),
                "title" => $request->input("title"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('icon')) {
                $workProcess->icon = $this->uploadIcon($request->file('icon'));
            }

            $workProcess->save();
            return redirect()->route('works.index')
                ->with('success', 'Work Process created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }

    public function edit(WorkProcess $work)
    {
        return view('admin.work_processes.edit', compact('work'));
    }

    public function update(Request $request, WorkProcess $work)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            "icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $work->fill([
                "name" => $request->input("name"),
                "title" => $request->input("title"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('icon')) {
                $work->icon = $this->uploadIcon($request->file('icon'));
            }

            $work->save();

            return redirect()->route('works.index')
                ->with('success', 'Work Process updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function destroy(WorkProcess $work)
    {
        try {
            // Delete icon file if exists
            if ($work->icon) {
                $iconPath = public_path('uploads/work/' . $work->icon);
                if (file_exists($iconPath)) {
                    unlink($iconPath);
                }
            }

            // Delete DB record
            $work->delete();

            return redirect()->route('works.index')
                ->with('success', 'Work Process deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }

}
