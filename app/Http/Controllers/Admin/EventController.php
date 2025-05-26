<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Event;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //


 private function uploadImage($image): string
{
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('uploads/event'), $imageName);
    return $imageName;
}

private function galleryImage($image): string
{
    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('uploads/gallery'), $imageName);
    return $imageName;
}



    public function index()
    {
          $events = Event::all();
        return view('admin.events.index', compact('events'));
    }
    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        // Form Validation
         $request->validate([
            "event_name" => "required",
            "location" => "required",
            "event_date" => "required|date",
            "start_time" => "required",
            "end_time" => "required",
            "email" => "nullable|email",
            "phone" => "nullable",
            "short_description" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gallery.*" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        try {
            $event = new Event();
            $event->fill([
                "event_name" => $request->input("event_name"),
                "location" => $request->input("location"),
                "event_date" => $request->input("event_date"),
                "start_time" => $request->input("start_time"),
                "end_time" => $request->input("end_time"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "location_map" => $request->input("location_map"),
                "short_description" => $request->input("short_description"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

           if ($request->hasFile('image')) {
                $event->image = $this->uploadImage($request->file('image'));
            }

                $galleryImages = [];
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $galleryImage) {
                    $galleryImages[] = $this->galleryImage($galleryImage);
                }
            }

            $event->gallery = $galleryImages;

            $event->save();
            return redirect()->route('events.index')
                ->with('success', 'Event created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }
    public function update(Request $request, Event $event)
    {
        // Form Validation
          $request->validate([
            "event_name" => "required",
            "location" => "required",
            "event_date" => "required|date",
            "start_time" => "required",
            "end_time" => "required",
            "email" => "nullable|email",
            "phone" => "nullable",
            "short_description" => "required",
            "description" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gallery.*" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        try {
            $event->fill([
                "event_name" => $request->input("event_name"),
                "location" => $request->input("location"),
                "event_date" => $request->input("event_date"),
                "start_time" => $request->input("start_time"),
                "end_time" => $request->input("end_time"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "location_map" => $request->input("location_map"),
                "short_description" => $request->input("short_description"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

           if ($request->hasFile('image')) {
                $event->image = $this->uploadImage($request->file('image'));
            }

             $galleryImages = [];
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $galleryImage) {
                    $galleryImages[] = $this->galleryImage($galleryImage);
                }
            }

        $event->gallery = $galleryImages;

            $event->save();
            return redirect()->route('events.index')
                ->with('success', 'Event updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(Event $event)
    {
        try {
            $event->delete();
            return redirect()->route('events.index')
                ->with('success', 'Event deleted successfully.');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'Error: ' . $exception->getMessage());
        }
    }
}
