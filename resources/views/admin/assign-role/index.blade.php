@extends("admin.layouts.master")

@section('title')
    User
@endsection

<style>


</style>

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">User</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Assign Role</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick='assignRole({{ json_encode($user->id) }}, {{ json_encode($user->name) }}, {{ json_encode($user->email) }}, {{ json_encode($user->roles->pluck("name")->first()) }})'>
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Assign Role Modal -->
<div class="modal fade" id="assignroleModal" tabindex="-1" aria-labelledby="assignroleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('assignrole.store') }}">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="assignroleModalLabel">
                        <span id="modalName"></span>
                        <small id="modalEmail" class="text-muted ms-2"></small>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="email" class="modalEmail">

                    <div class="mb-3">
                        <label class="form-label d-block">Select Role:</label>
                        @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input role-input" type="radio" name="role" id="role_{{ $role }}" value="{{ $role }}">
                                <label class="form-check-label" for="role_{{ $role }}">{{ ucfirst($role) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Assign Role</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>


            </form>
        </div>
    </div>
</div>



@endsection


<!-- Bootstrap 5 JS Bundle CDN (includes Popper) -->
<script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js')}}"></script>

<script>
    function assignRole(id, name, email, role) {
        console.log({id, name, email, role});  // For debugging

        document.getElementById('modalName').innerText = name;
        document.getElementById('modalEmail').innerText = `(${email})`;
        document.querySelector('.modalEmail').value = email;

        const radios = document.querySelectorAll('.role-input');
        radios.forEach(radio => {
            radio.checked = (radio.value === role);
        });

        let myModal = new bootstrap.Modal(document.getElementById('assignroleModal'));
        myModal.show();
    }
</script>

