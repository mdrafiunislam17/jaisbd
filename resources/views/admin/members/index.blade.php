@extends("admin.layouts.master")
@section("title", "Members")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Members</h1>
            <div class="col-6">
                <div class="d-flex align-items-center justify-content-end">
                    <label for="district"></label>
                    <select name="district" id="district" onchange="return window.location='?district=' + this.value" class="form-control form-control-sm w-50 mr-3">
                        <option value="">All Districts</option>

                        <?php foreach (["Khulna", "Bagherhat", "Sathkhira", "Jessore", "Magura", "Jhenaidah", "Narail", "Kushtia", "Chuadanga", "Meherpur"] as $district): ?>
                        <option
                                value="<?= $district; ?>" <?= old("district") === $district ? "selected" : ""; ?>
                                @selected($district == request()->input('district'))
                        ><?= $district; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="{{ route("admin.members.create") }}"
                       class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Create Member</a>
                </div>
            </div>
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
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>District</th>
                            <th>Joined</th>
                            <th>Other</th>
                            <th style="width: 140px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $i => $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>
                                    @if (file_exists(public_path("storage/uploads/$member->image")) && !empty($member->image))
                                        <img src="{{ asset("storage/uploads/$member->image") }}" width="80" alt="">
                                    @else
                                        <img src="{{ asset("member.png") }}" width="80" alt="Placeholder">
                                    @endif
                                </td>
                                <td>{{ $member->member_name }}</td>
                                <td>{{ $member->email_address }}</td>
                                <td>{{ $member->district }}</td>
                                <td>{{ date("Y-m-d h:i A", strtotime($member->created_at)) }}</td>
                                <td>
                                    <ol style="font-size: 12px">
                                        @foreach($member->designations as $designation)

                                            <li title="Designation">
                                                {{ $designation->designation }}
                                                <ul>
                                                    <li title="Priority Designation">
                                                        <span class="badge badge-secondary badge-counter">{{ $designation->priority_designation ?? $designation->designation }}</span>
                                                    </li>
                                                    <li title="Sort">
                                                        <span class="badge badge-warning badge-counter">{{ $designation->sort ?? "null" }}</span>
                                                    </li>
                                                    <li title="Status">
                                                        @if ($designation->status)
                                                            <span class="badge badge-success badge-counter">Active</span>
                                                        @else
                                                            <span class="badge badge-danger badge-counter">Inactive</span>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>
                                    <a href="{{ route("admin.members.idcard", $member->id) }}" target="_blank"
                                       class="btn btn-sm p-1"><i
                                                class="fa fa-id-card"></i></a>
                                    <a href="{{ route("admin.members.print", $member->id) }}" target="_blank"
                                       class="btn btn-sm p-1"><i
                                                class="fa fa-print"></i></a>
                                    <a href="{{ route("admin.members.show", $member->id) }}" class="btn btn-sm p-1"><i
                                                class="fa fa-eye"></i></a>
                                    <a href="{{ route("admin.members.edit", $member->id) }}" target="_blank"
                                       class="btn btn-sm p-1"><i
                                                class="fa fa-edit"></i></a>
                                    <form action="{{ route("admin.members.destroy", $member->id) }}" method="post"
                                          class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm p-1" onclick="return confirm('Are you sure to delete?')">
                                            <i class="fa fa-trash"></i></button>
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
