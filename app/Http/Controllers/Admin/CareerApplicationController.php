<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use App\Models\Career;


use Illuminate\Http\Request;

class CareerApplicationController extends Controller
{

     public function __construct()
        {
            $this->middleware('permission:career-application-list|career-application-career-application|career-application-edit|career-application-delete')->only('index');
            $this->middleware('permission:career-application-create')->only(['create', 'store']);
            $this->middleware('permission:career-application-edit')->only(['edit', 'update']);
            $this->middleware('permission:career-application-delete')->only('destroy');
        }
    //

//      private function uploadResume($file)
//    {
//        $fileName = time() . '.' . $file->getClientOriginalExtension();
//        $file->storeAs('uploads/resumes', $fileName);
//        return $fileName;
//    }

    private function uploadResume($file): string
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/resumes'), $fileName);
        return $fileName;
    }

    public function index()
    {
        $applications = CareerApplication::latest()->get();
        return view('admin.career_applications.index', compact('applications'));
    }

    public function create()
    {
        $careers = Career::all();
        return view('admin.career_applications.create',compact('careers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'career_id' => 'required|exists:careers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $application = new CareerApplication();
            $application->fill([
                "career_id" => $request->input("career_id"),
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "message" => $request->input("message"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('resume')) {
                $application->resume = $this->uploadResume($request->file('resume'));
            }

            $application->save();

            return redirect()->route('career-apply.index')
                ->with('success', 'Application submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('career-apply.index')->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function edit(CareerApplication $career_apply)
    {
        $careers = Career::all();
        return view('admin.career_applications.edit', compact('career_apply', 'careers'));
    }
    public function update(Request $request, CareerApplication $career_apply)
    {
        $request->validate([
            'career_id' => 'required|exists:careers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $career_apply->fill([
                "career_id" => $request->input("career_id"),
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "message" => $request->input("message"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('resume')) {
                $career_apply->resume = $this->uploadResume($request->file('resume'));
            }

            $career_apply->save();

            return redirect()->route('career-apply.index')
                ->with('success', 'Application updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('career-apply.index')->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function destroy(CareerApplication $career_apply)
    {
        try {
            $career_apply->delete();
            return redirect()->route('career-apply.index')
                ->with('success', 'Application deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('career-apply.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }

}
