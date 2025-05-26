@extends("admin.layouts.master")
@section("title", "Edit Career")
@section("content")
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Career</h1>
        <a href="{{ route('career.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Careers
        </a>
    </div>

    {{-- Alerts --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('career.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="job_title" class="col-sm-3 col-form-label text-right font-weight-bold">Job Title *</label>
                    <div class="col-sm-6">
                        <input type="text" name="job_title" id="job_title" class="form-control" value="{{ old('job_title', $career->job_title) }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-3 col-form-label text-right font-weight-bold">Location *</label>
                    <div class="col-sm-6">
                        <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $career->location) }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="job_type" class="col-sm-3 col-form-label text-right font-weight-bold">Job Type *</label>
                    <div class="col-sm-6">
                        <select name="job_type" id="job_type" class="form-control" required>
                            <option value="">-- Select Job Type --</option>
                            <option value="Full Time" {{ old('job_type', $career->job_type) == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                            <option value="Part Time" {{ old('job_type', $career->job_type) == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                            <option value="Remote" {{ old('job_type', $career->job_type) == 'Remote' ? 'selected' : '' }}>Remote</option>
                            <option value="Contractual" {{ old('job_type', $career->job_type) == 'Contractual' ? 'selected' : '' }}>Contractual</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="vacancies" class="col-sm-3 col-form-label text-right font-weight-bold">Vacancies *</label>
                    <div class="col-sm-6">
                        <input type="number" name="vacancies" id="vacancies" class="form-control" value="{{ old('vacancies', $career->vacancies) }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description *</label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description" class="form-control tinymce-editor" rows="5">{{ old('description', $career->description) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="requirements" class="col-sm-3 col-form-label text-right font-weight-bold">Requirements *</label>
                    <div class="col-sm-6">
                        <textarea name="requirements" id="requirements" class="form-control" rows="4">{{ old('requirements', $career->requirements) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="deadline" class="col-sm-3 col-form-label text-right font-weight-bold">Deadline *</label>
                    <div class="col-sm-6">
                        <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $career->deadline ? $career->deadline->format('Y-m-d') : '') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', $career->status) == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $career->status) == "0" ? 'selected' : '' }}>Inactive</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.tinymce-editor',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | link image',
        menubar: false,
    });
</script>
@endpush
