@extends("admin.layouts.master")
@section("title", "Assign Role")
@push('custom-style')
    {{-- Datatable css  --}}
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css')}}">
@endpush
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Assign Role</h1>

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
                            <th scope="col">SL NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="assignroleModal" tabindex="-1" aria-labelledby="modalName" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 me-2" id="modalName">
                    </h1>
                    <span id="modalEmail"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('assignrole.store')}}">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="email" value="" class="modalEmail">

                        <div class="mb-3">
                            <span class="roles-label">Roles :</span>
                            @foreach ($roles as $role)
                                <div class="form-check form-check-inline role-outter-wrapper">
                                    <input type="radio" id="{{$role}}" name="role" class="role-input d-none form-check-input" value="{{$role}}">
                                    <label for="{{$role}}" class="role-wrapper">
                                        <p>{{$role}}</p>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="assign-role-btn">Assign role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script src="{{url('https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js')}}" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/assign-role';

        function assignRole(id, name, email, role) {
            var emailbracket = "( "+email+" )"
            $("#modalName").html(name);
            $("#modalEmail").html(emailbracket);
            $(".modalEmail").val(email);
            $("#modalRole").html(role);
            $('#assignroleModal').modal('show');

            var roles = document.getElementsByClassName('role-input');
            for (var i = 0; i < roles.length; i++) {
                if (roles[i].id == role) {
                    roles[i].checked = true;
                }
                else{
                    roles[i].checked = false;
                }
            }
        }

        $(document).ready( function () {
            var table = $('#dataTable').DataTable({

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
                    { data: 'email', name: 'email', orderable: true },
                    { data: 'role', name: 'role', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += `<button type="button" class="btn btn-edit" onclick="assignRole(${data.id}, '${data.name}', '${data.email}', '${data.role}');"><i class="ri-edit-line"></i></button>`;
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
