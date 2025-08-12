@extends("admin.layouts.master")
@section("title", "Edit Project")
@section("content")
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Project</h1>
        <a href="{{ route("project.index") }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Projects
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has("success"))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
            {{ session("success") }}
        </div>
    @endif

    @if (session()->has("error"))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
            {{ session("error") }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route("project.update", $project->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group row">
                    <label for="project_info_id" class="col-sm-3 col-form-label text-right font-weight-bold">Category *</label>
                    <div class="col-sm-6">
                        <select name="project_info_id" id="project_info_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($projectInfo as $category)
                                <option value="{{ $category->id }}" {{ $project->project_info_id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="subtitle" class="col-sm-3 col-form-label text-right font-weight-bold">Subtitle</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $project->subtitle) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $project->description) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="image" name="image">
                        @if($project->image)
                            <img src="{{ asset('uploads/project/' . $project->image) }}" alt="Image" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $project->status == 1 ? "selected" : "" }}>Active</option>
                            <option value="0" {{ $project->status == 0 ? "selected" : "" }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
