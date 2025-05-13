@extends("admin.layouts.master")
@section("title", "Blogs")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
            <a href="{{ route("admin.blogs.create") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create Blog</a>
        </div>

        @if (session()->has("success"))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("success") }}
            </div>
        @endif

        @if (session()->has("error"))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("error") }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Posted By</th>
                            <th>Posted On</th>
                            <th>Status</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $i => $blog)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><img src="{{ asset("storage/uploads/$blog->image") }}" width="100" alt=""></td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->posted_by }}</td>
                                <td>{{ date("Y-m-d h:i A", strtotime($blog->posted_on)) }}</td>
                                <td>
                                    @if ($blog->status == 1)
                                        <span class="badge badge-success badge-counter">Active</span>
                                    @else
                                        <span class="badge badge-danger badge-counter">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route("admin.blogs.show", $blog->id) }}" class="btn btn-sm"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{ route("admin.blogs.edit", $blog->id) }}" class="btn btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    <form action="{{ route("admin.blogs.destroy", $blog->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
