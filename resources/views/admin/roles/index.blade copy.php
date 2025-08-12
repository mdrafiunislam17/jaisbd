@extends("admin.layouts.master")
@section("title", "Roles")

@push('custom-style')
    {{-- Datatable css  --}}
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css')}}">
@endpush
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roles</h1>
            <a href="{{route('role.create')}}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create Roles</a>
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
                <table class="table w-100" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">SL NO</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('custom-scripts')
    <script src="{{url('https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js')}}" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/role';

        $(document).ready( function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'name', name: 'name', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/role/edit/' + data.id + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            if(data.role == 'superadmin'){
                                btn1 += '<a href="javascript:void(0);" class="btn btn-delete" onclick="confirmDeletion(\'' + SITEURL + '/dashboard/role/delete/' + data + '\')"><i class="ri-delete-bin-2-line"></i></a>';
                            }
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']]
            });
        });
    </script>
@endpush
