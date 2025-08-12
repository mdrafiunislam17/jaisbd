@extends("admin.layouts.master")
@section("title", "Show Slider")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Show Slider</h1>
            <a href="{{ route("sliders.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Sliders</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ $slider->title }}"
                                   name="title"
                                   disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subtitle"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Subtitle</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subtitle" value="{{ $slider->subtitle }}"
                                   name="subtitle" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Existing Image</label>
                        <div class="col-sm-6">
                            <img src="{{ asset("storage/uploads/$slider->image") }}" width="120" alt="{{ $slider->image }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image" name="image" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control" disabled>
                                <option value="1" {{ $slider->status == 1 ? "selected" : "" }}>Active</option>
                                <option value="0" {{ $slider->status == 0 ? "selected" : "" }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
