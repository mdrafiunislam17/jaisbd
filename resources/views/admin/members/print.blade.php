<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset("storage/uploads/" . $settings["SETTING_SITE_FAVICON"]) }}"
          type="image/x-icon">
    <title>{{ $member->id }} : : {{ $member->member_name }}</title>
    <link href="{{ asset("css/sb-admin-2.min.css") }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center my-2">
                <h2 class="text-center">
                    <img src="{{ asset("storage/uploads/" . $settings["SETTING_SITE_LOGO"]) }}" width="50" height="50"
                         alt="">
                    {{ $settings["SETTING_SITE_TITLE"] }}
                </h2>
                @if (!empty($member->image) && file_exists(public_path("storage/uploads/$member->image")))
                    <img src="{{ asset("storage/uploads/$member->image") }}" id="croppie_image_show"
                         width="100" height="100" alt="">
                @else
                    <img src="{{ asset("user.jpg") }}" id="croppie_image_show" width="100" height="100"
                         alt="Member Image">
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Member ID</th>
                    <td>{{ $member->id }}</td>
                </tr>
                <tr>
                    <th>Member Name</th>
                    <td>{{ $member->member_name }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $member->gender }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ date("F d, Y", strtotime($member->date_of_birth)) }}</td>
                </tr>
                <tr>
                    <th>T-Shirt</th>
                    <td>{{ $member->tshirt }}</td>
                </tr>
                <tr>
                    <th>Number of Family Members</th>
                    <td>{{ $member->family_members }}</td>
                </tr>
                <tr>
                    <th>Phone Number (US)</th>
                    <td>{{ $member->phone_number_us }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $member->email_address }}</td>
                </tr>
                <tr>
                    <th>House Number</th>
                    <td>{{ $member->address->house_number }}</td>
                </tr>
                <tr>
                    <th>Street</th>
                    <td>{{ $member->address->street }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $member->address->city }}</td>
                </tr>
                <tr>
                    <th>Zip Code</th>
                    <td>{{ $member->address->zip_code }}</td>
                </tr>
                <tr>
                    <th>District</th>
                    <td>{{ $member->district }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        {{ $member->address1_bd }}
                        <br>
                        {{ $member->address2_bd  }}
                    </td>
                </tr>
                <tr>
                    <th>Phone Number (BD)</th>
                    <td>{{ $member->phone_number_bd }}</td>
                </tr>
                <tr>
                    <th>Designation</th>
                    <td>
                        <ol style="font-size: 12px" class="d-flex justify-content-between">
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
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    window.print();
</script>
</body>
</html>