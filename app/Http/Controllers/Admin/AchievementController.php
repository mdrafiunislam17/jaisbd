<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    //

    private function uploadIcon($icon): string
    {
        $iconName = time() . '.' . $icon->getClientOriginalExtension();
        $icon->move(public_path('uploads/achievement'), $iconName);
        return $iconName;
    }

    public function index()
    {
        $achievements = Achievement::all();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            "icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $achievements = New  Achievement();

            $achievements->fill([
                "name" => $request->input("name"),
                "number" => $request->input("number"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('icon')) {
                $achievements->icon = $this->uploadIcon($request->file('icon'));
            }

            $achievements->save();
            return redirect()->route('achievements.index')
                ->with('success', ' achievements created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }

    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }


    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            "icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $achievement->fill([
                "name" => $request->input("name"),
                "number" => $request->input("number"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('icon')) {
                // Optional: delete old icon
                if ($achievement->icon && file_exists(public_path('uploads/achievement/' . $achievement->icon))) {
                    unlink(public_path('uploads/achievement/' . $achievement->icon));
                }
                $achievement->icon = $this->uploadIcon($request->file('icon'));
            }

            $achievement->save();

            return redirect()->route('achievements.index')
                ->with('success', 'Achievement updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }

    public function destroy(Achievement $achievement)
    {
        try {
            if ($achievement->icon && file_exists(public_path('uploads/achievement/' . $achievement->icon))) {
                unlink(public_path('uploads/achievement/' . $achievement->icon));
            }

            $achievement->delete();

            return redirect()->route('achievements.index')
                ->with('success', 'Achievement deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting achievement: ' . $e->getMessage());
        }
    }
}
