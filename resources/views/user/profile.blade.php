@extends('user.layouts.app')

@section('title', 'User Profile')

@section('content')
<main id="main">
    <section class="profile-dashboard">
        <!-- Combine both forms into one -->
        <form action="{{ route('userProfile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Add this for update operations -->

            <!-- Profile Section -->
            <div class="inner-header mb-40">
                <h3 class="title">My Profile</h3>
                <p class="des">There are many variations of passages of Lorem Ipsum</p>
            </div>

            <div class="upload-image-dashboard flex mb-80">
                <span class="title-avata">Avatar:</span>
                <div class="upload-image-wrap">
                    @if($user->image)
                    <div class="avata relative">
                        <img
                            id="frame"
                            src="{{ asset("uploads/user/$user->image") }}"
                            alt="image"
                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">

                        <div class="icon-delete">
                            <i class="icon-delete-1"></i>
                        </div>
                    </div>
                    @endif
                    <span class="upload">Upload a new Avatar</span>
                    <div class="upload-file">
                        <input type="file" name="image" id="image">
                    </div>
                    <p>Png, Jpg, Svg dimenson (300* 350) max file not more then size 4 mb</p>
                </div>
            </div>

            <div class="infomation-dashboard mb-70">
                <h4 class="title">User Information</h4>
                <div class="widget-dash-board">
                    <div class="grid-input-2">
                        <div class="input-wrap">
                            <label>Name</label>
                            <input type="text" id="name" value="{{ $user->name }}" name="name">
                        </div>
                        <div class="input-wrap">
                            <label>Phone</label>
                            <input type="tel" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                        </div>
                        <div class="input-wrap">
                            <label>Email address*</label>
                            <input type="email" placeholder="Useronly21@gmail.com" id="email" value="{{ $user->email }}" name="email">
                        </div>
                        <div class="input-wrap">
                            <label>Address</label>
                            <textarea id="address" name="address">{{ old('address', $user->address) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Change Section -->
            <div class="infomation-dashboard mb-70">
                <h4 class="title">Password Change Request</h4>
                <div class="widget-dash-board">
                    <div class="grid-input-2">
                        <div class="input-wrap">
                            <label>New Password</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="input-wrap">
                            <label>Re-type New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                    <p class="mt-20">*Note: you can change your password up to 10 times in a year</p>
                </div>
            </div>

            <div class="otp-dashboard">
                <div class="flex-three">
                    <div class="button-wrap">
                        <button type="submit" class="save"><i class="icon-Vector-221"></i>Save changes</button>

                    </div>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection
