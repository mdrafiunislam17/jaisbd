@extends("admin.layouts.master")
@section("title", "Create Member")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Member</h1>
            <a href="{{ route("admin.members.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-eye fa-sm text-white-50"></i> Members</a>
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
                <form action="{{ route("admin.members.update", $member->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group row mb-4">
                        <label for="member_name" class="col-sm-3 col-form-label text-right font-weight-bold">Member's
                            Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="member_name" value="{{ $member->member_name }}"
                                   name="member_name">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="gender" class="col-sm-3 col-form-label text-right font-weight-bold">Gender
                            *</label>
                        <div class="col-sm-6">
                            <select name="gender" id="gender" class="form-control">
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
                        <label for="date_of_birth" class="col-sm-3 col-form-label text-right font-weight-bold">Date of
                            Birth
                            *</label>
                        <div class="col-sm-6">
                            <div class="d-flex">
                                <div class="mx-1 flex-fill" style="width: 33.33%;">
                                    <label class="d-block">
                                        <select class="form-control" name="year">
                                            <option value="">Year</option>
                                            @for($year = 2000; $year >= 1910; $year--)
                                                <option
                                                        value="{{ $year }}" {{ date("Y", strtotime($member->date_of_birth)) == $year ? "selected" : "" }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </label>
                                </div>

                                <div class="mx-1 flex-fill" style="width: 33.33%;">
                                    <label class="d-block">
                                        <select class="form-control" name="month">
                                            <option value="">Month</option>
                                            @for($month = 1; $month <= 12; $month++)
                                                <option
                                                        value="{{ sprintf("%02d", $month) }}" {{ date("m", strtotime($member->date_of_birth)) == $month ? "selected" : "" }}>{{ $month }}</option>
                                            @endfor
                                        </select>
                                    </label>
                                </div>

                                <div class="mx-1 flex-fill" style="width: 33.33%;">
                                    <label class="d-block">
                                        <select class="form-control" name="day">
                                            <option value="">Day</option>
                                            @for($day = 1; $day <= 31; $day++)
                                                <option
                                                        value="{{ sprintf("%02d", $day) }}" {{ date("d", strtotime($member->date_of_birth)) == $day ? "selected" : "" }}>{{ $day }}</option>
                                            @endfor
                                        </select>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="tshirt" class="col-sm-3 col-form-label text-right font-weight-bold">T-shirt
                            *</label>
                        <div class="col-sm-6">
                            <select name="tshirt" id="tshirt" class="form-control">
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
                        <label for="family_members" class="col-sm-3 col-form-label text-right font-weight-bold">Number
                            of Family
                            Members *</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="family_members"
                                   value="{{ $member->family_members }}" name="family_members">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="phone_number_us" class="col-sm-3 col-form-label text-right font-weight-bold">Phone
                            Number (US)
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone_number_us"
                                   value="{{ $member->phone_number_us }}" name="phone_number_us">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="email_address" class="col-sm-3 col-form-label text-right font-weight-bold">Email
                            Address
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email_address"
                                   value="{{ $member->email_address }}" name="email_address">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="house_number" class="col-sm-3 col-form-label text-right font-weight-bold">House
                            Number
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="house_number"
                                   value="{{ $member->address->house_number }}" name="house_number">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="street" class="col-sm-3 col-form-label text-right font-weight-bold">Street
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="street" value="{{ $member->address->street }}"
                                   name="street">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="city" class="col-sm-3 col-form-label text-right font-weight-bold">City *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="city" value="{{ $member->address->city }}"
                                   name="city">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="zip_code" class="col-sm-3 col-form-label text-right font-weight-bold">Zip Code
                            *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="zip_code"
                                   value="{{ $member->address->zip_code }}"
                                   name="zip_code">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="district" class="col-sm-3 col-form-label text-right font-weight-bold">District (BD)
                            *</label>
                        <div class="col-sm-6">
                            <select name="district" id="district" class="form-control">
                                <option value="">Choose...</option>
                                @foreach (["Khulna", "Bagherhat", "Sathkhira", "Jessore", "Magura", "Jhenaidah", "Narail", "Kushtia", "Chuadanga", "Meherpur"] as $district)
                                    <option
                                            value="{{ $district }}" {{ $member->district === $district ? "selected" : "" }}>{{ $district }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="address1_bd" class="col-sm-3 col-form-label text-right font-weight-bold">Address
                            (BD)
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address1_bd"
                                   value="{{ $member->address->address1_bd }}"
                                   name="address1_bd">
                            <input type="text" class="form-control mt-4" id=""
                                   value="{{ $member->address->address2_bd }}"
                                   name="address2_bd">
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label for="phone_number_bd" class="col-sm-3 col-form-label text-right font-weight-bold">Phone
                            Number (BD)
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone_number_bd"
                                   value="{{ $member->phone_number_bd }}" name="phone_number_bd">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                        <div class="col-sm-2">
                            <div>
                                @if (file_exists(public_path("storage/uploads/$member->image")) && !empty($member->image))
                                    <img src="{{ asset("storage/uploads/$member->image") }}" id="croppie_image_show"
                                         width="200" height="200" alt="">
                                @else
                                    <img src="{{ asset("user.jpg") }}" id="croppie_image_show" width="200" height="200"
                                         alt="Member Image">
                                @endif
                            </div>
                            <div>
                                <input type="hidden" id="croppie_image_base64" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="image" class="col-sm-3 col-form-label text-end font-weight-bold"></label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="croppie_image_file">
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
                                                       @if ($existingDesignation) checked @endif>
                                                {{ $designation }}
                                            </label>
                                        </td>
                                        <td>
                                            <label for=""><input type="text"
                                                                 name="designations[{{ $i }}][priority_designation]"
                                                                 class="form-control form-control-sm"
                                                                 value="{{ $existingDesignation ? $existingDesignation["priority_designation"] : "" }}">
                                            </label>
                                        </td>
                                        <td>
                                            <label for=""><input type="number" name="designations[{{ $i }}][sort]"
                                                                 class="form-control form-control-sm"
                                                                 value="{{ $existingDesignation ? $existingDesignation["sort"] : "" }}">
                                            </label>
                                        </td>
                                        <td>
                                            <label for=""><input type="number" max="1" min="0" placeholder="0 or 1" name="designations[{{ $i }}][status]"
                                                                 value="{{ $existingDesignation ? $existingDesignation["status"] : "" }}"
                                                                 class="form-control form-control-sm" style="width: 60px"></label>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password" class="col-sm-3 col-form-label text-right font-weight-bold">Password*
                        </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Password minimum 6 digits</small>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password_confirmation" class="col-sm-3 col-form-label text-right font-weight-bold">Confirm
                            Password*
                        </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="" class="col-sm-3 col-form-label text-right font-weight-bold"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@include("image_crop")
