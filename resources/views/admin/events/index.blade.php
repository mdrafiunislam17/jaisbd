@extends("admin.layouts.master")
@section("title", "Events")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Events</h1>
            <a href="{{ route("admin.events.create") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create Event</a>
        </div>

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

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Image</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $i => $event)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><img src="{{ asset("storage/uploads/$event->image") }}" width="100" alt=""></td>
                                <td>{{ $event->event_name }}</td>
                                <td>{{ $event->event_date }}</td>
                                <td>{{ date("h:i A", strtotime($event->start_time)) ." - ". date("h:i A", strtotime($event->end_time)) }}</td>
                                <td>{{ $event->location }}</td>
                                <td>
                                    @if ($event->status == 1)
                                        <span class="badge badge-success badge-counter">Active</span>
                                    @else
                                        <span class="badge badge-danger badge-counter">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route("admin.events.show", $event->id) }}" class="btn btn-sm"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{ route("admin.events.edit", $event->id) }}" class="btn btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    <form action="{{ route("admin.events.destroy", $event->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
