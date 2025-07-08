@extends("admin.layouts.master")
@section("title", "Create Contact")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Contact</h1>
            <a href="{{ route("contact.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Contact</a>
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
                <form action="{{ route("contact.store") }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group row">
                        <label for="name"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" value="{{ old("name") }}"
                                   name="name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" value="{{ old("email") }}"
                                   name="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" value="{{ old("phone") }}"
                                   name="phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subject"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Subject</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subject" value="{{ old("subject") }}"
                                   name="subject">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="message"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Message</label>
                        <div class="col-sm-6">
                            <textarea name="message" id="message" class="form-control" rows="5">{{ old("message") }}</textarea>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
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
        selector: '#message',  // যেখানে rich editor চাই
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
        menubar: false
    });
</script>

@endpush
