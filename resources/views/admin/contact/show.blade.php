@extends("admin.layouts.master")
@section("title", "View Contact")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Contact</h1>
            <a href="{{ route("contact.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-list fa-sm text-white-50"></i> All Contacts</a>
        </div>

        <!-- Show Details -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Name</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{ $contact->name }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Email</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{ $contact->email }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{ $contact->phone ?? 'N/A' }}</p>
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Subject</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{ $contact->subject ?? 'N/A' }}</p>
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Message</label>
                    <div class="col-sm-6">
                        <div class="border p-3">{!! $contact->message !!}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">
                            @if($contact->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Created At</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{ $contact->created_at->format('d M, Y h:i A') }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Updated At</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{ $contact->updated_at->format('d M, Y h:i A') }}</p>
                    </div>
                </div>
{{--
                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
