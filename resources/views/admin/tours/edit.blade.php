@extends("admin.layouts.master")
@section("title", "Edit Tours")
@section("content")
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Tours</h1>
        <a href="{{ route('tours.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Tours
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

    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('tours.update', $tour->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Category -->
                       <div class="form-group row">
                        <label for="category_id" class="col-sm-3 col-form-label text-right font-weight-bold">Category *</label>
                        <div class="col-sm-6">
                            <select name="category_id[]" id="category_id" class="form-control">
                                  <option value="all" {{ is_array(old('category_id')) && in_array('all', old('category_id')) ? 'selected' : '' }}>
                                    All
                                </option>
                               @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $tour->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    </div>

                <!-- Title -->
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $tour->title) }}">
                    </div>
                </div>

                <!-- Slug -->
                <div class="form-group row">
                    <label for="slug" class="col-sm-3 col-form-label text-right font-weight-bold">Slug</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $tour->slug) }}">
                    </div>
                </div>

                <!-- Location -->
                <div class="form-group row">
                    <label for="location" class="col-sm-3 col-form-label text-right font-weight-bold">Location</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $tour->location) }}">
                    </div>
                </div>

                <!-- Duration -->
                <div class="form-group row">
                    <label for="duration" class="col-sm-3 col-form-label text-right font-weight-bold">Duration</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $tour->duration) }}">
                    </div>
                </div>

                <!-- Start & End Date -->
                <div class="form-group row">
                    <label for="start_date" class="col-sm-3 col-form-label text-right font-weight-bold">Start Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $tour->start_date) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="end_date" class="col-sm-3 col-form-label text-right font-weight-bold">End Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $tour->end_date) }}">
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $tour->description) }}</textarea>
                    </div>
                </div>

                <!-- Image -->
                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="image" name="image">
                        @if($tour->image)
                            <img src="{{ asset("uploads/tour/$tour->image") }}" alt="Tour Image" class="img-thumbnail mt-2" width="120">
                        @endif
                    </div>
                </div>

                <!-- Guests -->
                <div class="form-group row">
                    <label for="guests" class="col-sm-3 col-form-label text-right font-weight-bold">Guests</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="guests" name="guests" value="{{ old('guests', $tour->guests) }}">
                    </div>
                </div>

                <!-- Price & Discount -->
                <div class="form-group row">
                    <label for="price" class="col-sm-3 col-form-label text-right font-weight-bold">Price</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $tour->price) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="discount" class="col-sm-3 col-form-label text-right font-weight-bold">Discount</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount', $tour->discount) }}">
                    </div>
                </div>

                <!-- Sort -->
                <div class="form-group row">
                    <label for="sort" class="col-sm-3 col-form-label text-right font-weight-bold">Sort</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="sort" name="sort" value="{{ old('sort', $tour->sort) }}">
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $tour->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $tour->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Submit -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '#description',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
        menubar: false,
    });

    const categorySelect = document.getElementById('category_id');
    const sortInput = document.getElementById('sort');
    const categorySorts = @json($categories->pluck('next_sort', 'id'));

    categorySelect.addEventListener('change', function () {
        const selectedOptions = Array.from(this.selectedOptions).map(o => o.value);
        if (selectedOptions.includes('all')) {
            Array.from(this.options).forEach(option => {
                if (option.value !== 'all') option.selected = false;
            });
            sortInput.value = "{{ $newSort ?? $tour->sort }}";
        } else {
            this.querySelector('option[value="all"]').selected = false;
            const firstCategory = selectedOptions[0];
            sortInput.value = categorySorts[firstCategory] || 1;
        }
    });
});
</script>
@endpush
