@extends("admin.layouts.master")
@section("title", "Edit Slider")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Slider</h1>
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

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route("sliders.update", $slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ $slider->title }}"
                                   name="title"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subtitle"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Subtitle</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subtitle" value="{{ $slider->subtitle }}"
                                   name="subtitle">
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="sulg" class="col-sm-3 col-form-label text-right font-weight-bold">Sulg</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sulg" value="{{ $slider->sulg }}"
                                   name="sulg">
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Existing Image</label>
                        <div class="col-sm-6">
                            <img src="{{ asset("uploads/slider/$slider->image") }}" width="120" alt="{{ $slider->image }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sort"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Sort</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="sort" value="{{ $slider->sort }}"
                                   name="sort">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $slider->status == 1 ? "selected" : "" }}>Active</option>
                                <option value="0" {{ $slider->status == 0 ? "selected" : "" }}>Inactive</option>
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
