<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\choose;
use Illuminate\Database\QueryException;

class ChooseController extends Controller
{
    //


      public function __construct()
        {
            $this->middleware('permission:choose-list|choose-create|choose-edit|choose-delete')->only('index');
            $this->middleware('permission:choose-create')->only(['create', 'store']);
            $this->middleware('permission:choose-edit')->only(['edit', 'update']);
            $this->middleware('permission:choose-delete')->only('destroy');
        }

    //
    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/choose'), $imageName);
        return $imageName;
    }



    public function index()
    {
        $chooses = choose::all();
        return view('admin.choose.index',compact('chooses'));
    }
    public function create()
    {
        return view('admin.choose.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $choose = new choose();
            $choose->fill([
                "title" => $request->input("title"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
                "slug" => $request->input("slug") ,
            ]);

            if ($request->hasFile('image')) {
                $choose->image = $this->uploadImage($request->file('image'));
            }


            $choose->save();

            return redirect()->route("choose.index")->with("success", "choose has been inserted successfully.");
        } catch (QueryException $exception) {
            return redirect()->back()->withInput()->with("error", "Database error: " . $exception->getMessage());
        }
    }

    public function edit(choose $choose)
    {
        return view('admin.choose.edit',compact('choose'));

    }

    public function update(Request $request, choose $choose)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",

        ]);

        try {
            $choose->fill([
                "title" => $request->input("title"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
                "slug" => $request->input("slug") ,
            ]);

            if ($request->hasFile('image')) {
                // Optional: delete old image if exists
                $choose->image = $this->uploadImage($request->file('image'));
            }


            $choose->save();

            return redirect()->route("choose.index")->with("success", "choose has been updated successfully.");
        } catch (QueryException $exception) {
            return redirect()->back()->withInput()->with("error", "Database error: " . $exception->getMessage());
        }
    }
    public function destroy(choose $choose)
    {
        try {
            // Optional: delete associated image and icon files if they exist
            if ($choose->image && file_exists(public_path('uploads/choose' . $choose->image))) {
                unlink(public_path('uploads/choose' . $choose->image));
            }



            $choose->delete();

            return redirect()->route('choose.index')->with('success', 'choose has been deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting choose: ' . $e->getMessage());
        }
    }
}
