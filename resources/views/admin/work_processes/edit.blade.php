@extends("admin.layouts.master")
@section("title", "Edit Work Process")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Work Process</h1>
            <a href="{{ route("works.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i> Work Processes
            </a>
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

        <!-- Edit Form -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('works.update', $work) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    @method('PUT')



                <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', $work->name) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title', $work->title) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control">{{ old('description', $work->description) }}</textarea>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="icon"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Existing Icon</label>
                        <div class="col-sm-6">
                            <img src="{{ asset('uploads/work/' . $work->icon) }}" width="120"
                                 alt="{{ $work->icon }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="icon"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Icon </label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="icon" name="icon">
                        </div>
                    </div>



                    {{--                    <div class="form-group row">--}}
{{--                        <label for="icon" class="col-sm-3 col-form-label text-right font-weight-bold">Icon</label>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <input type="file" class="form-control" id="icon" name="icon">--}}
{{--                            @if ($work->icon)--}}
{{--                                <div class="mt-2">--}}
{{--                                    <strong>Current Icon:</strong><br>--}}
{{--                                    <img src="{{ asset('uploads/work/' . $work->icon) }}" width="60" alt="icon">--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $work->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $work->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <hr>

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

@push("scripts")
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js') }}" referrerpolicy="origin"></script>
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
