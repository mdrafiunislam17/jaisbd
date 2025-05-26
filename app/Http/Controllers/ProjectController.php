<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Database\QueryException;
use App\Models\ProjectInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    //

     private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/project'), $imageName);
        return $imageName;
    }

    public function index()
    {
         $project = Project::all();
        return view('admin.project.index', compact('project'));
    }

    public function create()
    {
        $projectInfo = ProjectInfo::all();
        return view('admin.project.create', compact('projectInfo'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_info_id' => 'required',
        ]);
        try {
            $project = New Project();

            $project->fill([
                "title" => $request->input("title"),
                "project_info_id" => $request->input("project_info_id"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
              if ($request->hasFile('image')) {
                $project->image = $this->uploadImage($request->file('image'));
            }


            $project->save();
            return redirect()->route('project.index')
                ->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit(Project $project)
    {
        $projectInfo = ProjectInfo::all();
        return view('admin.project.edit', compact('project', 'projectInfo'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_info_id' => 'required',
        ]);

        try {
            $project->fill([
                "title" => $request->input("title"),
                "project_info_id" => $request->input("project_info_id"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

             if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($project->image && Storage::exists('public/uploads/' . $project->image)) {
                    Storage::delete('public/uploads/' . $project->image);
                }

                $project->image = $this->uploadImage($request->file('image'));
            }

            $project->save();
            return redirect()->route('project.index')
                ->with('success', 'Project updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }

   public function destroy(Project $project): RedirectResponse
    {
        try {
            if ($project->image && Storage::exists('public/uploads/' . $project->image)) {
                Storage::delete('public/uploads/' . $project->image);
            }

            $project->delete();

            return back()->with('success', 'project deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting project: ' . $e->getMessage());
        }
    }

}
