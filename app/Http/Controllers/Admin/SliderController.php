<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SliderController extends Controller
{

    public function __construct()
        {
            $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete')->only('index');
            $this->middleware('permission:slider-create')->only(['create', 'store']);
            $this->middleware('permission:slider-edit')->only(['edit', 'update']);
            $this->middleware('permission:slider-delete')->only('destroy');
        }

    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/slider'), $imageName);
        return $imageName;
    }


    public function index(): View
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create(): View
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'sort'     => 'nullable|integer',
            'status'   => 'nullable|boolean',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $slider = new Slider($validated);

            if ($request->hasFile('image')) {
                $slider->image = $this->uploadImage($request->file('image'));
            }

            $slider->save();

            return redirect()-> route('sliders.index')->with('success', 'Slider has been inserted successfully.');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database Error (Code: ' . $e->getCode() . ')');
        }
    }

    public function show(Slider $slider): View
    {
        return view('admin.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider): View
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider): RedirectResponse
    {
        $validated = $request->validate([

            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $slider->fill($validated);

            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($slider->image && Storage::exists('public/uploads/' . $slider->image)) {
                    Storage::delete('public/uploads/' . $slider->image);
                }

                $slider->image = $this->uploadImage($request->file('image'));
            }

            $slider->save();

            return redirect()-> route('sliders.index')->with('success', 'Slider updated successfully.');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database Error (Code: ' . $e->getCode() . ')');
        }
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        try {
            if ($slider->image && Storage::exists('public/uploads/' . $slider->image)) {
                Storage::delete('public/uploads/' . $slider->image);
            }

            $slider->delete();

            return back()->with('success', 'Slider deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting slider: ' . $e->getMessage());
        }
    }
}
