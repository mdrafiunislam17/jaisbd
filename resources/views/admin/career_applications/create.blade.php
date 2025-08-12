@extends("admin.layouts.master")
@section("title", "Create Career Application")
@section("content")
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Career Application</h1>
        <a href="{{ route('career-apply.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> View Applications
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

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('career-apply.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Career Selection --}}
                <div class="form-group row">
                    <label for="career_id" class="col-sm-3 col-form-label text-right font-weight-bold">Career Position *</label>
                    <div class="col-sm-6">
                        <select name="career_id" id="career_id" class="form-control" required>
                            <option value="">-- Select Career --</option>
                            @foreach($careers as $career)
                                <option value="{{ $career->id }}" {{ old('career_id') == $career->id ? 'selected' : '' }}>
                                    {{ $career->job_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Name --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                </div>

                {{-- Phone --}}
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone *</label>
                    <div class="col-sm-6">
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>
                </div>

                {{-- Message --}}
                <div class="form-group row">
                    <label for="message" class="col-sm-3 col-form-label text-right font-weight-bold">Message</label>
                    <div class="col-sm-6">
                        <textarea name="message" id="message" class="form-control tinymce-editor" rows="5">{{ old('message') }}</textarea>
                    </div>
                </div>

                {{-- Resume Upload --}}
                <div class="form-group row">
                    <label for="resume" class="col-sm-3 col-form-label text-right font-weight-bold">Resume *</label>
                    <div class="col-sm-6">
                        <input type="file" name="resume" id="resume" class="form-control-file" required>
                        <small class="text-muted">PDF, DOCX formats allowed.</small>
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status') == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == "0" ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                {{-- Submit --}}
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
        selector: '.tinymce-editor',
        height: 300,
        plugins: 'advlist autolink lists link image charmap preview anchor',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
        menubar: false,
    });
</script>
@endpush
