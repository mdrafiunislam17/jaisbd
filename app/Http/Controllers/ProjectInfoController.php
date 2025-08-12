<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectInfo;
Use App\Models\ProjectCategory;
use Illuminate\Database\QueryException;

class ProjectInfoController extends Controller
{
    //

        public function __construct()
        {
            $this->middleware('permission:project-info-list|project-info-create|project-info-edit|project-info-delete')->only('index');
            $this->middleware('permission:project-info-create')->only(['create', 'store']);
            $this->middleware('permission:project-info-edit')->only(['edit', 'update']);
            $this->middleware('permission:project-info-delete')->only('destroy');
        }


    public function index()
    {
        $projectInfos = ProjectInfo::all();

        return view('admin.project_info.index', compact('projectInfos'));
    }
    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.project_info.create' ,compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
        ]);


        try {
            $ProjectInfos = New  ProjectInfo();

            $ProjectInfos->fill([
                "name" => $request->input("name"),
                "category_id" => $request->input("category_id"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "location" => $request->input("location"),
                "status" => $request->input("status"),
            ]);



            $ProjectInfos->save();
            return redirect()->route('projectinfo.index')
                ->with('success', ' projectinfo created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }

    }

    public function edit(ProjectInfo $projectinfo)
    {
        $categories = ProjectCategory::all();
        return view('admin.project_info.edit', compact('projectinfo', 'categories'));
    }

    public function update(Request $request, ProjectInfo $projectinfo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $projectinfo->fill([
                "name" => $request->input("name"),
                "category_id" => $request->input("category_id"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "location" => $request->input("location"),
                "status" => $request->input("status"),
            ]);

            $projectinfo->update();
            return redirect()->route('projectinfo.index')
                ->with('success', 'Project info updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function destroy(ProjectInfo $projectinfo)
    {
        try {
            $projectinfo->delete();
            return redirect()->route('projectinfo.index')
                ->with('success', 'Project info deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        }
    }


}
