<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/service'), $imageName);
        return $imageName;
    }

    private function uploadIcon($icon): string
    {
        $iconName = time() . '.' . $icon->getClientOriginalExtension();
        $icon->move(public_path('uploads/service'), $iconName);
        return $iconName;
    }

    public function index()
    {
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }
    public function create()
    {
        return view('admin.service.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "video" => "required|mp4|string|max:255"
        ]);

        try {
            $service = new Service();
            $service->fill([
                "title" => $request->input("title"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('image')) {
                $service->image = $this->uploadImage($request->file('image'));
            }

            if ($request->hasFile('icon')) {
                $service->icon = $this->uploadIcon($request->file('icon'));
            }

            $service->save();

            return redirect()->route("services.index")->with("success", "Service has been inserted successfully.");
        } catch (QueryException $exception) {
            return redirect()->back()->withInput()->with("error", "Database error: " . $exception->getMessage());
        }
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));

    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $service->fill([
                "title" => $request->input("title"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('image')) {
                // Optional: delete old image if exists
                $service->image = $this->uploadImage($request->file('image'));
            }

            if ($request->hasFile('icon')) {
                // Optional: delete old icon if exists
                $service->icon = $this->uploadImage($request->file('icon'));
            }

            $service->save();

            return redirect()->route("services.index")->with("success", "Service has been updated successfully.");
        } catch (QueryException $exception) {
            return redirect()->back()->withInput()->with("error", "Database error: " . $exception->getMessage());
        }
    }
    public function destroy(Service $service)
    {
        try {
            // Optional: delete associated image and icon files if they exist
            if ($service->image && file_exists(public_path('uploads/service' . $service->image))) {
                unlink(public_path('uploads/service' . $service->image));
            }

            if ($service->icon && file_exists(public_path('uploads/service' . $service->icon))) {
                unlink(public_path('uploads/service' . $service->icon));
            }

            $service->delete();

            return redirect()->route('services.index')->with('success', 'Service has been deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting service: ' . $e->getMessage());
        }
    }

}
