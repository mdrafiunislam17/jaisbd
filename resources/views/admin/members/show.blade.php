@extends("admin.layouts.master")
@section("title", "Show Member")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Show Member</h1>
            <a href="{{ route("admin.members.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Members</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4">
                        <label for="member_name" class="col-sm-3 col-form-label text-right font-weight-bold">Member's Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="member_name" value="{{ $member->member_name }}"
                                   name="member_name" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="gender" class="col-sm-3 col-form-label text-right font-weight-bold">Gender
                            *</label>
                        <div class="col-sm-6">
                            <select name="gender" id="gender" class="form-control" disabled>
                                <option value="Male" {{ $member->gender === "Male" ? "selected" : "" }}>Male
                                </option>
                                <option value="Female" {{ $member->gender === "Female" ? "selected" : "" }}>Female
                                </option>
                                <option value="Other" {{ $member->gender === "Other" ? "selected" : "" }}>Other
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="date_of_birth" class="col-sm-3 col-form-label text-right font-weight-bold">Date of Birth
                            *</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="date_of_birth"
                                   value="{{ $member->date_of_birth }}" name="date_of_birth" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="tshirt" class="col-sm-3 col-form-label text-right font-weight-bold">T-shirt
                            *</label>
                        <div class="col-sm-6">
                            <select name="tshirt" id="tshirt" class="form-control" disabled>
                                <option value="">Choose...</option>
                                <option value="Small" {{ $member->tshirt === "Small" ? "selected" : "" }}>
                                    Small
                                </option>
                                <option value="Medium" {{ $member->tshirt === "Medium" ? "selected" : "" }}>
                                    Medium
                                </option>
                                <option value="Large" {{ $member->tshirt === "Large" ? "selected" : "" }}>
                                    Large
                                </option>
                                <option value="XL" {{ $member->tshirt === "XL" ? "selected" : "" }}>
                                    XL
                                </option>
                                <option value="2XL" {{ $member->tshirt === "2XL" ? "selected" : "" }}>
                                    2XL
                                </option>
                                <option value="3XL" {{ $member->tshirt === "3XL" ? "selected" : "" }}>
                                    3XL
                                </option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label for="family_members" class="col-sm-3 col-form-label text-right font-weight-bold">Number of Family
                            Members *</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="family_members"
                                   value="{{ $member->family_members }}" name="family_members" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="phone_number_us" class="col-sm-3 col-form-label text-right font-weight-bold">Phone
                            Number (US)
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone_number_us"
                                   value="{{ $member->phone_number_us }}" name="phone_number_us" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="email_address" class="col-sm-3 col-form-label text-right font-weight-bold">Email
                            Address
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email_address"
                                   value="{{ $member->email_address }}" name="email_address" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="house_number" class="col-sm-3 col-form-label text-right font-weight-bold">House
                            Number
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="house_number"
                                   value="{{ $member->address->house_number }}" name="house_number" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="street" class="col-sm-3 col-form-label text-right font-weight-bold">Street
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="street" value="{{ $member->address->street }}"
                                   name="street" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="city" class="col-sm-3 col-form-label text-right font-weight-bold">City *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="city" value="{{ $member->address->city }}"
                                   name="city" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="zip_code" class="col-sm-3 col-form-label text-right font-weight-bold">Zip Code
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="zip_code" value="{{ $member->address->zip_code }}"
                                   name="zip_code" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="district" class="col-sm-3 col-form-label text-right font-weight-bold">District (BD)
                            *</label>
                        <div class="col-sm-6">
                            <select name="district" id="district" class="form-control" disabled>
                                <option value="">Choose...</option>
                                @foreach (["Khulna", "Bagherhat", "Sathkhira", "Jessore", "Magura", "Jhenaidah", "Narail", "Kushtia", "Chuadanga", "Meherpur"] as $district)
                                    <option
                                        value="{{ $district }}" {{ $member->district === $district ? "selected" : "" }}>{{ $district }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="address1_bd" class="col-sm-3 col-form-label text-right font-weight-bold">Address (BD)
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address1_bd" value="{{ $member->address->address1_bd }}"
                                   name="address1_bd" disabled>
                            <input type="text" class="form-control mt-4" id="" value="{{ $member->address->address2_bd }}"
                                   name="address2_bd" disabled>
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label for="phone_number_bd" class="col-sm-3 col-form-label text-right font-weight-bold">Phone
                            Number (BD)
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone_number_bd"
                                   value="{{ $member->phone_number_bd }}" name="phone_number_bd" disabled>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Existing Image</label>

                        <div class="col-sm-6">
                            @if (file_exists(public_path("storage/uploads/$member->image")) && !empty($member->image))
                                <img src="{{ asset("storage/uploads/$member->image") }}" width="120" alt="">
                            @else
                                <img src="{{ asset("member.png") }}" width="120" alt="Placeholder">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>

                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image" name="image" disabled>
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label for="designation" class="col-sm-3 col-form-label text-right font-weight-bold">Designation
                            *</label>
                        <div class="col-sm-6">
                            @php
                                $allowedDesignations = ["Committee member", "Convener", "Joint convener", "Advisory Council", "Member"];
                            @endphp

                            <table class="table table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>Priority Designation</th>
                                    <th>Sort</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($allowedDesignations as $i => $designation)
                                    @php
                                        $existingDesignation = null;
                                        foreach ($member->designations as $existing) {
                                            if ($existing["designation"] === $designation) {
                                                $existingDesignation = $existing;
                                                break;
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            <label for="designation{{ $i }}">
                                                <input type="checkbox" name="designations[{{ $i }}][designation]"
                                                       value="{{ $designation }}" id="designation{{ $i }}"
                                                       @if ($existingDesignation) checked @endif disabled>
                                                {{ $designation }}
                                            </label>
                                        </td>
                                        <td>
                                            <label for=""><input type="text"
                                                                 name="designations[{{ $i }}][priority_designation]"
                                                                 class="form-control form-control-sm"
                                                                 value="{{ $existingDesignation ? $existingDesignation["priority_designation"] : "" }}" disabled>
                                            </label>
                                        </td>
                                        <td>
                                            <label for=""><input type="number" name="designations[{{ $i }}][sort]"
                                                                 class="form-control form-control-sm"
                                                                 value="{{ $existingDesignation ? $existingDesignation["sort"] : "" }}" disabled>
                                            </label>
                                        </td>
                                        <td>
                                            <label for=""><input type="number" max="1" min="0" placeholder="0 or 1" name="designations[{{ $i }}][status]"
                                                                 value="{{ $existingDesignation ? $existingDesignation["status"] : "" }}"
                                                                 class="form-control form-control-sm" style="width: 60px" disabled></label>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
