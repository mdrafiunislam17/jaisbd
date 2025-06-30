@extends("admin.layouts.master")
@section("title", "Create Slider")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Slider</h1>
            <a href="{{ route("sliders.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Sliders</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route("sliders.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ old("title") }}"
                                   name="title"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subtitle"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Subtitle</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subtitle" value="{{ old("subtitle") }}"
                                   name="subtitle">
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="sulg" class="col-sm-3 col-form-label text-right font-weight-bold">Sulg</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sulg" value="{{ old("sulg") }}"
                                   name="sulg">
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="sort"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Sort</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="sort" value="{{ old("sort") }}"
                                   name="sort">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Image *</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
