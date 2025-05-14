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
        $image->move(public_path('uploads/client'), $imageName);
        return $imageName;
    }

    private function uploadIcon($icon): string
    {
        $iconName = time() . '.' . $icon->getClientOriginalExtension();
        $icon->move(public_path('uploads/client'), $iconName);
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
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $service = new Service();
            $service->fill([
                "name" => $request->input("name"),
            ]);

            if ($request->hasFile('image')) {
                $service->image = $this->uploadImage($request->file('image'));
            }

            if ($request->hasFile('image')) {
                $service->image = $this->uploadImage($request->file('image'));
            }



            $service->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route("clients.index")->with("success", "clients has been inserted successfully.");

    }
}
