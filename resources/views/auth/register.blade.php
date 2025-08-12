<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset("uploads/" . $settings["SETTING_SITE_FAVICON"] ?? 'favicon.ico') }}" type="image/x-icon">
    <title>Admin :: Register</title>

    <!-- Fonts & Styles -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        @php
                            $logo = $settings['SETTING_SITE_LOGO'] ?? 'default-logo.png';
                        @endphp

                        <div class="col-lg-6 d-none d-lg-block bg-login-image bg-light"
                             style="background-image: url('{{ asset("uploads/$logo") }}');
                                    background-size: contain;
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    margin-top: 120px;
                                    height: 150px;">
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>

                                <form method="POST" action="{{ route('register') }}" class="user">
                                    @csrf

                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name">
                                        @error('name')
                                            <small class="text-danger ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required placeholder="Email Address">
                                        @error('email')
                                            <small class="text-danger ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="phone_number" type="text" class="form-control form-control-user @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number">
                                        @error('phone_number')
                                            <small class="text-danger ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <textarea id="address" class="form-control form-control-user @error('address') is-invalid @enderror"
                                                name="address" placeholder="Address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <small class="text-danger ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group">
                                        <label class="ml-2 font-weight-bold text-primary" for="profile_image">Upload Profile Image</label>
                                        <input type="file" class="form-control-file @error('profile_image') is-invalid @enderror"
                                            name="profile_image" id="profile_image" accept="image/*">
                                        @error('profile_image')
                                            <small class="text-danger ml-2">{{ $message }}</small>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                   placeholder="Password" required>
                                            @error('password')
                                                <small class="text-danger ml-2">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="password_confirmation" class="form-control form-control-user"
                                                   placeholder="Repeat Password" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>
