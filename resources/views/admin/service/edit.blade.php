@extends("admin.layouts.master")
@section("title", "Edit Service")
@section("content")
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Service</h1>
            <a href="{{ route("services.index") }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i> View Services
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

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title', $service->title) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description *</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control">{{ old('description', $service->description) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="image" id="image">
                            @if($service->image)
                                <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Image" width="100" class="mt-2">
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="icon" class="col-sm-3 col-form-label text-right font-weight-bold">Icon</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="icon" id="icon">
                            @if($service->icon)
                                <img src="{{ asset('uploads/service/' . $service->icon) }}" alt="Icon" width="100" class="mt-2">
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js')}}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            height: 300,
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
        });
    </script>
@endpush
