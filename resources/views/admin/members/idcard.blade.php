<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .id-card {
            width: 413px;
            height: 260px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: dashed 1px #d0d0d0;
            padding: 5px;
        }

        .id-card-footer {
            height: 56px;
            background-color: #015a42;
            border-top: solid 3px #d0212a;
        }

        .id-card-footer div {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0 15px;
        }

        .id-card-footer img {
            width: 52px;
        }

        .id-card-footer p {
            font-size: 15px;
            color: #ffffff;
        }

        .id-card-body {
            display: flex;
            margin: 15px;
        }

        .id-card-body .image-box {
            margin-right: 5px;
            margin-top: 5px;
        }

        .id-card-body table {

        }

        .id-card-body table th {
            text-align: left;
            width: 102px;
            display: flex;
            justify-content: space-between;
        }

        .id-card-body table td, .id-card-body table th {
            padding: 2px;
        }

        .id-card-header {
            border-top: solid 3px #015a42;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <div class="id-card-header"></div>
        <div class="id-card-body">
            <div class="image-box">
                @if (!empty($member->image) && file_exists(public_path("storage/uploads/$member->image")))
                    <img src="{{ asset("storage/uploads/$member->image") }}" id="croppie_image_show"
                         width="100" height="100" alt="">
                @else
                    <img src="{{ asset("user.jpg") }}" id="croppie_image_show" width="100" height="100"
                         alt="Member Image">
                @endif
            </div>

            <div>
                <table>
                    <tr>
                        <th>ID <span>:</span></th>
                        <td>{{ $member->id }}</td>
                    </tr>
                    <tr>
                        <th>Name <span>:</span></th>
                        <td>{{ $member->member_name }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth <span>:</span></th>
                        <td>{{ date('d F Y', strtotime($member->date_of_birth)) }}</td>
                    </tr>
                    <tr>
                        <th>District <span>:</span></th>
                        <td>{{ $member->district }}</td>
                    </tr>
                    <tr>
                        <th>Address <span>:</span></th>
                        <td style="font-size: 14px">
                            {{ $member->address->house_number }} {{ $member->address->street }},<br>
                            {{ $member->address->city }}, {{ $member->address->state }} {{ $member->address->zip_code }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="id-card-footer">
            <div>
                <img src="{{ asset("storage/uploads/" . $settings["SETTING_SITE_LOGO"]) }}" alt="">
                <p>Khulna Divisional Association of Buffalo, New York</p>
            </div>
        </div>
    </div>
</body>
</html>