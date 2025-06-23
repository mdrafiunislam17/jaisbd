@extends('fronted.master')
@section('title', 'Home Page')

@section('maincontent')
    <!-- Page specific content here -->



    <!-- Start About
    ============================================= -->
        <div class="about-area default-padding-top pb-md-110 pb-xs-45 overflow-hidden">
            <div class="container">
                <div class="about-style-one-box">
                    <div class="row">
                        <!-- Left Column: Image and Award -->
                        <div class="about-style-one col-xl-6 col-lg-6">
                            <div class="thumb">
                                <img src="{{ asset('uploads/about/' . $about->image) }}" alt="About Image">

                                <div class="award">
                                    <div class="icon">
                                        <i class="flaticon-medal"></i>
                                    </div>
                                    <div class="info">
                                        <h4>{{ $about->award_title ?? 'Certified Company' }}</h4>
                                        <p>{{ $about->award_description ?? 'We adapt our delivery to the way your work, whether as an external provider.' }}</p>
                                    </div>
                                </div>

                                <div class="thumb-shape">
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="shape"></div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Text Content -->
                        <div class="about-style-one pl-lg-30 pl-70 pl-md-15 pl-xs-15 col-xl-6 col-lg-6">
                            <div class="info">
                                <h4 class="sub-heading mb-20">{{ $about->title }}</h4>
                                <p class="mb-0">{!! $about->description !!}</p>
                            </div>

                            {{-- Optional Experience Section --}}
                            {{--
                            <div class="experience">
                                <div class="shape-bottom-large"></div>
                                <div class="left">
                                    <h2>{{ $about->experience_years ?? '28' }}</h2>
                                    <h4>Years <br> of experience</h4>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Background Shape Image -->
            {{-- <div class="shape-left-top" style="background-image: url('{{ asset('uploads/about/' . $about->image) }}');"></div> --}}


        </div>

    <!-- End About -->

@endsection
