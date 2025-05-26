<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Management;
use App\Models\TeamMember;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    //

    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/teamMember'), $imageName);
        return $imageName;
    }
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('admin.teamMember.index',compact('teamMembers'));
    }

    public function create()
    {
        $managements = Management::all();
        $designations = Designation::all();
        return view('admin.teamMember.create',compact('managements','designations'));

    }
    public function store(Request $request)
    {

        $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $teamMember = new TeamMember();
            $teamMember->fill([
                "name" => $request->input("name"),
                "management_id" => $request->input("management_id"),
                "designation_id" => $request->input("designation_id"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),


            ]);

            if ($request->hasFile('image')) {
                $teamMember->image = $this->uploadImage($request->file('image'));
            }



            $teamMember->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route("teams.index")->with("success", "TeamMember has been inserted successfully.");

    }

    public function edit (TeamMember $team)
    {
        $managements = Management::all();
        $designations = Designation::all();
        return view('admin.teamMember.edit',compact('team','managements','designations'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $request->validate([
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $team->fill([
                "name" => $request->input("name"),
                "management_id" => $request->input("management_id"),
                "designation_id" => $request->input("designation_id"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('image')) {
                // Optional: Delete old image if needed
                // Storage::delete($teamMember->image);

                $team->image = $this->uploadImage($request->file('image'));
            }

            $team->save();

            return redirect()->route('teams.index')->with('success', 'TeamMember updated successfully.');

        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'DB Error: ' . $e->getCode());
        }
    }


    public function destroy(TeamMember $team)
    {
        try {
            if ($team->image && file_exists(public_path('uploads/teamMember' . $team->image))) {
                unlink(public_path('uploads/teamMember' . $team->image));
            }

            $team->delete();

            return redirect()->route('teams.index')->with('success', 'TeamMember deleted successfully.');
        } catch (QueryException $e) {
            return back()->with('error', 'Database error: ' . $e->getCode());
        }
    }
}
