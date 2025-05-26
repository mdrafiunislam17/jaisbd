@extends("admin.layouts.master")
@section("title", "Edit Team Member")

@section("content")
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Team Member</h1>
            <a href="{{ route('teams.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i> View Teams
            </a>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Flash Messages --}}
        @foreach (['success', 'error'] as $msg)
            @if(session()->has($msg))
                <div class="alert alert-{{ $msg == 'success' ? 'success' : 'danger' }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach

        {{-- Form Card --}}
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="{{ old('name', $team->name) }}" class="form-control" required>
                        </div>
                    </div>

                    {{-- Management --}}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right font-weight-bold">Management *</label>
                        <div class="col-sm-6">
                            <select name="management_id" class="form-control" required>
                                <option value="" disabled>Select management</option>
                                @foreach ($managements as $management)
                                    <option value="{{ $management->id }}" {{ $management->id == old('management_id', $team->management_id) ? 'selected' : '' }}>
                                        {{ $management->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Designation --}}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right font-weight-bold">Designation *</label>
                        <div class="col-sm-6">
                            <select name="designation_id" class="form-control" required>
                                <option value="" disabled>Select designation</option>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}" {{ $designation->id == old('designation_id', $team->designation_id) ? 'selected' : '' }}>
                                        {{ $designation->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control">{{ old('description', $team->description) }}</textarea>
                        </div>
                    </div>

                    {{-- Image --}}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                        <div class="col-sm-6">
                            <input type="file" name="image" class="form-control">
                            @if ($team->image)
                                <img src="{{ asset('uploads/teamMember/' . $team->image) }}" class="mt-2" height="100" alt="Current Image">
                            @endif
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status', $team->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $team->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    {{-- Submit Button --}}
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
            selector: '#description',
            height: 300,
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
        });
    </script>
@endpush
