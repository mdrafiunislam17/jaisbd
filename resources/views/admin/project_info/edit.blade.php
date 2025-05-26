@extends("admin.layouts.master")
@section("title", "Edit Project Info")
@section("content")
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Project Info</h1>
        <a href="{{ route("projectinfo.index") }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Project Info List
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route("projectinfo.update", $projectinfo->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Company Name *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $projectinfo->name) }}" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-sm-3 col-form-label text-right font-weight-bold">Category *</label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old("category_id", $projectinfo->category_id) == $category->id ? "selected" : "" }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email', $projectinfo->email) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="{{ old('phone', $projectinfo->phone) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-3 col-form-label text-right font-weight-bold">Location</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="location" name="location"
                               value="{{ old('location', $projectinfo->location) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', $projectinfo->status) == 1 ? "selected" : "" }}>Active</option>
                            <option value="0" {{ old('status', $projectinfo->status) == 0 ? "selected" : "" }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
