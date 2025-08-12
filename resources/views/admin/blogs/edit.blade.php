@extends("admin.layouts.master")
@section("title", "Create Blog")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Blog</h1>
            <a href="{{ route("blogs.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Blogs</a>
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
                <form action="{{ route("blogs.update", $blog->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ $blog->title }}"
                                   name="title"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Existing Image</label>
                        <div class="col-sm-6">
                            <img src="{{ asset("uploads/blog/$blog->image") }}" width="120" alt="{{ $blog->image }}">
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
                        <label for="posted_by" class="col-sm-3 col-form-label text-right font-weight-bold">Posted By *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="posted_by" value="{{ old("posted_by", $blog->posted_by) }}"
                                   name="posted_by">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="posted_on" class="col-sm-3 col-form-label text-right font-weight-bold">Posted On *</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" id="posted_on" value="{{ old("posted_on", $blog->posted_on) }}"
                                   name="posted_on">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="short_detail"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Short Detail *</label>
                        <div class="col-sm-6">
                            <textarea name="short_detail" id="short_detail"
                                      class="form-control" @style(["height: 160px"])>{{ $blog->short_detail }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="detail"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Detail *</label>
                        <div class="col-sm-6">
                            <textarea name="detail" id="detail" class="form-control">{{ $blog->detail }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $blog->status == 1 ? "selected" : "" }}>Active</option>
                                <option value="0" {{ $blog->status == 0 ? "selected" : "" }}>Inactive</option>
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

@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#detail',  // Use textarea as the editor
            height: 300,           // Set the height of the editor
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
        });
    </script>

@endpush
