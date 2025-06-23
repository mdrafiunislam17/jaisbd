@extends('fronted.master')
@section('title', 'Home Page')
<style>
    .no-bg {
        background-color: transparent !important;
        color: #d6cbcb; /* যাতে লেখা দেখা যায় */
        border: 1px solid #d6cbcb;
    }
</style>


@section('maincontent')
    <!-- Page specific content here -->



 <!-- Start Banner Area
    ============================================= -->
    <div class="banner-area banner-style-one content-right navigation-custom-large zoom-effect overflow-hidden text-light">
        <!-- Slider main container -->
        <div class="banner-fade">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($slider as $item)
                    <!-- Single Item -->
                    <div class="swiper-slide banner-style-one">
                        <div class="banner-thumb bg-cover shadow dark" style="background: url('{{ asset("uploads/slider/".$item->image) }}');"></div>
                        <div class="container">
                            <div class="row align-center">
                                <div class="col-xl-7 offset-xl-5">
                                    <div class="content">
                                        <h4>{{ $item->title }}</h4>
                                        <h2>{!! $item->subtitle !!}</h2> {{-- Use {!! !!} if HTML tags are included --}}
                                        <div class="button">
                                            <a class="btn btn-gradient btn-md radius animation" href="{{ $item->button_link ?? '#' }}">{{ $item->button_text ?? 'Meet with us' }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shape -->
                        <div class="banner-angle-shape">
                            <div class="shape-item"></div>
                            <div class="shape-item"></div>
                            <div class="shape-item"></div>
                        </div>
                        <!-- End Shape -->
                    </div>
                    <!-- End Single Item -->
                @endforeach
            </div>

            <!-- Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>
    <!-- End Main -->

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

    <!-- Start Services
    ============================================= -->
    <div class="services-area bg-gray default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Meet our services</h4>
                        <h2 class="title">We offer you all services <br> about professional IT Services</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="services-style-one-box">
                <div class="row">
                    <!-- Sngle Item -->
                    @foreach ($services as $service)
                        <div class="services-style-one col-xl-3 col-md-6">
                            <div class="item style-one-item {{ $loop->first ? 'active' : '' }}">
                                 <img src="{{ asset('uploads/service/' . $service->icon) }}" alt="{{ $service->title }}"
                                 style="height: 60px; width: 60px; object-fit: cover; border-radius: 50%; margin-bottom: 15px;">

                                 <p>{!! Str::limit($service->description, 120) !!}</p>
                                <div class="bottom">
                                      @if(!empty($service->slug))
                                        <h4><a href="{{ route('services.details1', ['slug' => $service->slug]) }}">{{ $service->title }}</a></h4>
                                    @else
                                        <h4>{{ $service->title }}</h4> {{-- fallback without link --}}
                                    @endif
                                    <a href="#"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                    <!-- End Sngle Item -->
                    <!-- Sngle Item -->
                     @endforeach
                    <!-- End Sngle Item -->
                </div>
            </div>
        </div>
        <!-- Shape -->

        <!-- End Shape -->
    </div>
    <!-- End Services -->

    <!-- Start Achivement
    ============================================= -->
    {{-- <div class="achivement-area default-padding-bottom">
        <div class="top-shape-120"></div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="achivement-style-one text-light col-lg-6">
                    <div class="item" style="background-image: url(assets/img/banner/33.jpg);">
                        <div class="progressbar">
                            <div class="circle" data-percent="83">
                                <strong></strong>
                            </div>
                        </div>
                        <div class="content">
                            <h4>Customer satisfaction</h4>
                            <p>
                                Pointure horrible margaret suitable he followed speedily. Indeed vanity excuse or mr lovers of on. By offer scale an stuff. Blush be sorry no sight sang lose ecstatic and properly.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="achivement-style-one col-lg-6">
                    <div class="item bg-gradient text-light">
                        <div class="content">
                            <div class="achivement">
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="45" data-speed="1000">45</div>
                                        <div class="operator">k</div>
                                    </div>
                                    <h4>Customers worldwide</h4>
                                </div>
                            </div>
                            <p>
                                Mentioning horrible margaret suitable he followed speedily. Indeed vanity excuse or mr lovers of on. By offer scale an stuff. Blush be sorry no  properly.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div> --}}
    <!-- End Achivement -->

    <!-- Start Why Choose Us
    ============================================= -->
    <div class="choose-us-area default-padding-bottom py-4">
        <!-- Shape -->
        <div class="shape" style="background-image: url(assets/img/shape/38.png);"></div>
        <!-- End Shape -->
        <div class="container">
            <div class="row">
                <div class="choose-us-style-one col-xl-5 col-lg-5">
                    <h4 class="sub-heading">{{$choose->title}}</h4>
                    <h2 class="heading">{{$choose->slug}} </h2>
                     <p>{!! Str::limit($choose->description, 120) !!}</p>
                    @if(!empty($choose->slug))
                        <a class="btn mt-30 btn-md btn-theme" href="{{ route('choose.details1', ['slug' => $choose->slug]) }}">Know More</a>
                    @endif

                </div>
                {{-- <div class="choose-us-style-one text-center col-xl-6 offset-xl-1 col-lg-7">
                    <div class="right-item">
                        <div class="row">
                            <!-- Signle Item -->
                            <div class="choose-us-card col-md-6">
                                <div class="item">
                                    <img src="assets/img/icon/1.png" alt="Icon">
                                    <span>Database</span>
                                    <h4>Secure database</h4>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                            <!-- End Signle Item -->
                            <!-- Signle Item -->
                            <div class="choose-us-card col-md-6">
                                <div class="item">
                                    <img src="assets/img/icon/2.png" alt="Icon">
                                    <span>Performance</span>
                                    <h4>incredible Performance</h4>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                            <!-- End Signle Item -->
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Why Choose Us -->

    <!-- Start Brand
    ============================================= -->
    <div class="brand-area">
        <div class="container">
            <div class="brand-items pt-80 pb-80">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Single Item -->
                                @foreach ($clients as $client)
                                     <div class="swiper-slide">
                                    <img src="{{asset("uploads/client/$client->image")}}" alt="Thumb">
                                </div>
                                @endforeach

                                <!-- End Single Item -->

                                <!-- End Single Item -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand -->

    <!-- Start Projects
    ============================================= -->
    <div class="projects-area default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Project Studies</h4>
                        <h2 class="title">Latest showcase and <br> solutions to our customers!</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="masonary">
                        <div class="gallery-items text-center colums-3 mixed">
                            @foreach($projects as $project)
                                <div class="gallery-item gallery-style-one">
                                    <div class="item gallery-mixed-item">
                                        <div class="thumb">
                                            <img src="{{ asset('uploads/project/' . $project->image) }}" alt="{{ $project->title }}">
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                             <h4>
                                                <a href="{{ route('project.details1', ['title' => $project->title]) }}">
                                                    {{ $project->title }}
                                                </a>
                                            </h4>

                                                <select name="project_info_id" class="form-control"@disabled(true) >
                                                    @foreach($projectInfo as $category)
                                                        <option value="{{ $category->id }}" {{ $project->project_info_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span>{{ $project->category ?? 'Technology' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Projects -->

    <!-- Start Process
    ============================================= -->
    {{-- <div class="process-area bg-dark text-light default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-6 col-lg-5">
                    <div class="process-style-one">
                        <div class="thumb">
                            <img src="assets/img/illustration/3.png" alt="Thumb">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 offset-lg-1">
                    <div class="processs-style-one">
                        <h4 class="sub-heading">Our Solutions</h4>
                        <h2 class="heading">How do we manage <br> IT services for your industry</h2>
                        <ul class="process-list">
                            <li>
                                <img src="assets/img/shape/arrow.png" alt="Arrrow">
                                <h4>Receive Custom Plan</h4>
                                <p>
                                    Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking better performing renovation.
                                </p>
                            </li>
                            <li>
                                <img src="assets/img/shape/arrow.png" alt="Arrrow">
                                <h4>Deliver expected project</h4>
                                <p>
                                    Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking better exicution.
                                </p>
                            </li>
                        </ul>
                        <div class="single-kit mt-30">
                            <div class="call">
                                <div class="icon">
                                    <i class="fas fa-comments-alt-dollar"></i>
                                </div>
                                <div class="info">
                                    <p>Have any Questions?</p>
                                    <h5><a href="mailto:info@crysta.com">info@crysta.com</a></h5>
                                </div>
                            </div>
                            <a href="https://www.youtube.com/watch?v=owhuBrGIOsE" class="popup-youtube video-play-button with-text">
                                <div class="effect"></div>
                                <span><i class="fas fa-play"></i> WATCH PROCESS</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- End Process -->

    <!-- Start Team
    ============================================= -->
    <div class="team-area text-center overflow-hidden default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Expert team</h4>
                        <h2 class="title">Meet our expert from <br>trusted source in IT services</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-full">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Single Item -->
                           @foreach ($teamMembers as $member)
                                <div class="swiper-slide">
                                    <div class="team-style-one">
                                        <div class="thumb">
                                            <img src="{{ asset('uploads/teamMember/' . $member->image) }}" alt="{{ $member->name }}">
                                            <div class="angle-shape" style="background-image: url({{asset('assets/img/shape/24.png')}});"></div>
                                            <div class="angle-shape"></div>
                                        </div>
                                        <div class="info">
                                            <div class="content">
                                                <h4 class="title"><a href="{{ route('teamDetails1', ['name' => $member->name]) }}">{{ $member->name }}</a></h4>
                                                <span>{{ $member->position }}</span>
                                                <span>{{ optional($member->management)->name ?? 'N/A' }}</span>
                                            </div>
                                            <ul class="social">
                                                @if($member->facebook)
                                                    <li><a class="facebook" href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                                @endif
                                                @if($member->twitter)
                                                    <li><a class="twitter" href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                                @endif
                                                @if($member->pinterest)
                                                    <li><a class="pinterest" href="{{ $member->pinterest }}"><i class="fab fa-pinterest"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- End Single Item -->

                            <!-- End Single Item -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team -->

    <!-- Start Quick Contact
    ============================================= -->
    <div class="quick-contact-area bg-gradient text-light default-padding">
        <!-- Shape -->
        <div class="shape-left-top" style="background-image: url(assets/img/shape/25.png);"></div>
        <!-- Shape -->
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="quick-contact-style-one">
                        <h4 class="sub-heading light">Need a project?</h4>
                        <h2 class="heading">To make requests for further information, contact us via our social channels.</h2>
                        <ul>
                            <li>We just need a couple of hours!</li>
                            <li>No more than 2 working days since receiving your issue ticket.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1">
                    <form action="{{ route("contact_form_submit") }}" method="POST" class="contact-form consultation-form theme">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">You Name</label>
                                    <input class="form-control" id="name" name="name" placeholder="Jonathom Doe" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input class="form-control" id="email" name="email" placeholder="support@crysta.com" type="email">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input class="form-control" id="phone" name="phone" placeholder="+4733378901" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>

                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="message">Tell Message</label>
                                    <input class="form-control" id="message" name="message" placeholder="message" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <select id="subject">
                                        <option value="1">Chose Subject</option>
                                        <option value="2">it Solutions Support</option>
                                        <option value="4">Accounting Technologies</option>
                                        <option value="5">Support Items</option>
                                        <option value="6">Machine Language</option>
                                    </select>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="message">Tell Message</label>
                                    <textarea name="message" id="message" class="form-control no-bg" rows="5" placeholder="Write your message here..." required></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}



                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" name="submit" id="submit">
                                    Get Free Consultation <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Alert Message -->
                        <div class="col-lg-12 alert-notification">
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                    <ul class="contact-list">
                        <li>
                            <div class="icon">
                                <i class="fal fa-user-headset"></i>
                            </div>
                            <div class="info">
                                <h5>Call for Emergency Assistance</h5>
                                <a href="#">{!! $settings["CONTACT_PHONE"] !!}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick Contact -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area blog-grid default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">From the blog</h4>
                        <h2 class="title">Latest News & Articles</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-md-6 single-item">
                        <div class="blog-style-one">
                            <div class="thumb">
                                <a href="{{ route('blog.details1', ['title' => $blog->title]) }}">
                                    <img src="{{asset("uploads/blog/$blog->image") }}" alt="Thumb">
                                </a>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fal fa-tag"></i> {{ $blog->posted_by ?? 'Uncategorized' }}</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="far fa-calendar-alt"></i>
                                                {{ \Carbon\Carbon::parse($blog->posted_on)->format('F j, Y') }}
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                                <h4 class="title">
                                    <a href="{{ route('blog.details1', ['title' => $blog->title]) }}">
                                        {{ Str::limit($blog->title, 70) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
