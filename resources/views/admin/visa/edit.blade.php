@extends("admin.layouts.master")
@section("title", "Edit Visa")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Visa</h1>
            <a href="{{ route("visa.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Visa</a>
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

        <!-- Form Card -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('visa.update', $visa->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="category_id" class="col-sm-3 col-form-label text-right font-weight-bold">Category *</label>
                        <div class="col-sm-6">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $visa->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title', $visa->title) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-sm-3 col-form-label text-right font-weight-bold">Slug</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="{{ old('slug', $visa->slug) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label text-right font-weight-bold">Location</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="location" name="location"
                                   value="{{ old('location', $visa->location) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="duration" class="col-sm-3 col-form-label text-right font-weight-bold">Duration</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="duration" name="duration"
                                   value="{{ old('duration', $visa->duration) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_date" class="col-sm-3 col-form-label text-right font-weight-bold">Start Date</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                   value="{{ old('start_date', $visa->start_date) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="end_date" class="col-sm-3 col-form-label text-right font-weight-bold">End Date</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                   value="{{ old('end_date', $visa->end_date) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control"
                                      rows="5">{{ old('description', $visa->description) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image *</label>
                        <div class="col-sm-6">
                            @if($visa->image)
                                <img src="{{ asset('uploads/visa/' . $visa->image) }}" alt="visa Image" class="mb-2" style="max-height: 100px;">
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="guests" class="col-sm-3 col-form-label text-right font-weight-bold">Guests</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="guests" name="guests"
                                   value="{{ old('guests', $visa->guests) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label text-right font-weight-bold">Price</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="price" name="price"
                                   value="{{ old('price', $visa->price) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="discount" class="col-sm-3 col-form-label text-right font-weight-bold">Discount</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="discount" name="discount"
                                   value="{{ old('discount', $visa->discount) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status', $visa->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $visa->status) == 0 ? 'selected' : '' }}>Inactive</option>
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
