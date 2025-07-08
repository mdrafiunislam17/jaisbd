@extends('admin.layouts.master')

@section('title', 'Contact')

@push('styles')
    <!-- DataTables Bootstrap CSS -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contact</h1>
        <a href="{{ route('contact.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Contact
        </a>
    </div> --}}

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Si</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $i => $item)
                            <tr>
                               <td>{{ ++$i }}</td>
                                <td>{{$item->name}}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>

                                <td>

                                    {{-- <a href="{{ route("contact.create.edit", $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a> --}}


                                    <form action="{{ route('contact.create.destroy', $item->id) }}" method="post" class="d-inline delete-form" data-id="{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger delete-btn h-100" data-id="{{ $item->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
{{--                                    --}}
{{--                                    <form action="{{ route("project.destroy", $item->id) }}" method="post" class="d-inline">--}}
{{--                                        @csrf--}}
{{--                                        @method("DELETE")--}}
{{--                                        <button class="btn btn-sm delete-btn" ><i class="fa fa-trash"></i></button>--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmLabel">Confirm Delete</h5>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        Are you sure you want to delete this courseCategory?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<!-- jQuery -->
@endpush
