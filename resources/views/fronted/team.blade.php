  @extends('fronted.master')
@section('title', 'Services Details')

@section('maincontent')

  <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url({{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Team Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{route('fronted.index')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Team</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Team Single Area
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
        {{-- <div class="container-full">
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
                                            <div class="angle-shape"></div>
                                        </div>
                                        <div class="info">
                                            <div class="content">
                                                <h4 class="title"><a href="{{ route('teamDetails1', ['name' => $member->name]) }}">{{ $member->name }}</a></h4>
                                                <span>{{ $member->position }}</span>
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
        </div> --}}
    </div>



      <div class="team-area team-grid-style text-center overflow-hidden default-padding-top pb-100 pb-xs-0 bottom-less">
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                   @foreach ($teamMembers as $member)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-style-one">
                            <div class="thumb">
                                <img src="{{asset('uploads/teamMember/' . $member->image) }}" alt="{{ $member->name }}">
                                <div class="angle-shape" style="background-image: url({{asset('assets/img/shape/24.png')}});"></div>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <h4 class="title"><a href="{{ route('teamDetails1', ['name' => $member->name]) }}">{{ $member->name }}</a></h4>
                                  <span>{{ optional($member->management)->name ?? 'N/A' }}</span>
                                   <span>{{ optional($member->designation)->name ?? 'N/A' }}</span>

                                </div>
                                {{-- <ul class="social">
                                    <li>
                                        <a class="facebook" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                <!-- End Single Item -->

            </div>
        </div>
    </div>
    <!-- End Team Single Area -->

    @endsection
