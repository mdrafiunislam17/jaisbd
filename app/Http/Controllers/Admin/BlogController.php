<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

     public function __construct()
        {
            $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete')->only('index');
            $this->middleware('permission:blog-create')->only(['create', 'store']);
            $this->middleware('permission:blog-edit')->only(['edit', 'update']);
            $this->middleware('permission:blog-delete')->only('destroy');
        }

     private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/blog'), $imageName);
        return $imageName;
    }

      public function index()
    {
        $blogs = Blog::all();

        return view("admin.blogs.index", compact("blogs"));
    }

     public function create()
    {
        return view("admin.blogs.create");
    }


    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "title" => "required",
            "short_detail" => "required",
            "detail" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "posted_by" => "required",
            "posted_on" => "required",
        ]);

        try {
            $blog = new Blog();
            $blog->fill([
                "title" => $request->input("title"),
                "short_detail" => $request->input("short_detail"),
                "detail" => $request->input("detail"),
                "posted_by" => $request->input("posted_by"),
                "posted_on" => $request->input("posted_on"),
                "status" => $request->input("status"),
            ]);

           if ($request->hasFile('image')) {
                $blog->image = $this->uploadImage($request->file('image'));
            }


            $blog->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('blogs.index')->with("success", "Blog has been inserted successfully.");
    }



      public function edit(Blog $blog)
    {
        return view("admin.blogs.edit", compact("blog"));
    }


     public function update(Request $request, Blog $blog)
    {
        // Form Validation
        $request->validate([
            "title" => "required",
            "short_detail" => "required",
            "detail" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "posted_by" => "required",
            "posted_on" => "required",
        ]);


        try {
            $blog->fill([
                "title" => $request->input("title"),
                "short_detail" => $request->input("short_detail"),
                "detail" => $request->input("detail"),
                "posted_by" => $request->input("posted_by"),
                "posted_on" => $request->input("posted_on"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $imageName = time() . "." . $image->getClientOriginalExtension();
                $image->storeAs("public/uploads", $imageName);
                $blog->setAttribute("image", $imageName);

                if ($request->hasFile('image')) {
                // পুরাতন ইমেজ ডিলিট করতে চাইলে এখানে unlink() বা Storage::delete() ব্যবহার করতে পারেন
                $blog->image = $this->uploadImage($request->file('image'));
            }
            }

            $blog->save();
        } catch (QueryException $exception) {
            return redirect()->back()->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('blogs.index')->with("success", "Blog has been updated successfully.");
    }


    public function destroy(Blog $blog)
    {
        try {
            // পুরনো image ফাইল ডিলিট (optional but recommended)
            if ($blog->image && file_exists(public_path('uploads/blog' . $blog->image))) {
                unlink(public_path('uploads/blog' . $blog->image));
            }


            // ডেটাবেজ থেকে ডিলিট
            $blog->delete();

            return redirect()->route('blogs.index')->with('success', 'blog has been deleted successfully.');
        } catch (QueryException $e) {
            return back()->back()->with('error', 'Delete failed. Database Error (Code: ' . $e->getCode() . ')');
        }
    }

}
