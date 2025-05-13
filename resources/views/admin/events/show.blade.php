@extends("admin.layouts.master")
@section("title", "Show Event")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Show Event</h1>
            <a href="{{ route("admin.events.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Events</a>
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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="event_name" class="col-sm-3 col-form-label text-right font-weight-bold">Event Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="event_name" value="{{ $event->event_name }}"
                                   name="event_name"
                                   disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label text-right font-weight-bold">Location *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="location" value="{{ $event->location }}"
                                   name="location" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="event_date" class="col-sm-3 col-form-label text-right font-weight-bold">Date *</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="event_date" value="{{ $event->event_date }}"
                                   name="event_date" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_time" class="col-sm-3 col-form-label text-right font-weight-bold">Start Time *</label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="start_time" value="{{ $event->start_time }}"
                                   name="start_time" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="end_time" class="col-sm-3 col-form-label text-right font-weight-bold">End Time *</label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="end_time" value="{{ $event->end_time }}"
                                   name="end_time" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" value="{{ $event->email }}"
                                   name="email" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" value="{{ $event->phone }}"
                                   name="phone" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Existing Image</label>
                        <div class="col-sm-6">
                            <img src="{{ asset("storage/uploads/$event->image") }}" width="120" alt="{{ $event->image }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Image *</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image" name="image" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="short_description"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Short Description *</label>
                        <div class="col-sm-6">
                            <textarea name="short_description" id="short_description"
                                      class="form-control" @style(["height: 160px"]) disabled>{{ $event->short_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Description *</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control" disabled>{{ $event->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="location_map"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Location (Google Map)</label>
                        <div class="col-sm-6">
                            <textarea name="location_map" id="location_map"
                                      class="form-control" @style(["height: 160px"]) disabled>{{ $event->location_map }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control" disabled>
                                <option value="1" {{ $event->status == 1 ? "selected" : "" }}>Active</option>
                                <option value="0" {{ $event->status == 0 ? "selected" : "" }}>Inactive</option>
                            </select>
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
            selector: '#description',  // Use textarea as the editor
            height: 300,           // Set the height of the editor
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
            readonly: true
        });
    </script>

@endpush
