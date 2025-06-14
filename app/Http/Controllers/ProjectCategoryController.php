<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('permission:project-categories-list|project-categories-create|project-categories-edit|project-categories-delete')->only('index');
        $this->middleware('permission:project-categories-create')->only(['create', 'store']);
        $this->middleware('permission:project-categories-edit')->only(['edit', 'update']);
        $this->middleware('permission:project-categories-delete')->only('destroy');
    }


    public function index()
    {

        $categories = ProjectCategory::latest()->get();
        return view('admin.project_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.project_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ProjectCategory::create($validated);

        return redirect()->route('project-categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.project_categories.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $projectCategory->update($validated);

        return redirect()->route('project-categories.index')
            ->with('success', 'Category updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();

        return redirect()->route('project-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
