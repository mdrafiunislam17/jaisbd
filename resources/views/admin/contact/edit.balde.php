@extends("admin.layouts.master")
@section("title", "Edit Contact")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Contact</h1>
            <a href="{{ route("contact.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> All Contacts</a>
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

        <!-- Edit Form -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('contact.update', $contact->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', $contact->name) }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email', $contact->email) }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ old('phone', $contact->phone) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subject" class="col-sm-3 col-form-label text-right font-weight-bold">Subject</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject" name="subject"
                                   value="{{ old('subject', $contact->subject) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="message" class="col-sm-3 col-form-label text-right font-weight-bold">Message</label>
                        <div class="col-sm-6">
                            <textarea name="message" id="message" class="form-control" rows="5">{{ old('message', $contact->message) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status', $contact->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $contact->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">Update</button>
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
            selector: '#message',
            height: 300,
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false
        });
    </script>
@endpush
