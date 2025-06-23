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
    <div class="team-single-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5 pr-35 pr-md-15 pr-xs-15 team-single-info">
                    <div class="thumb">
                        <img src="{{ asset('uploads/teamMember/' . $teamMember->image) }}" alt="Thumb">
                    </div>
                </div>
                <div class="col-lg-7 team-single-info">
                    <h2>{{$teamMember->name}}</h2>
                    <div class="d-flex gap-3 align-items-center">
                        <span>{{ $teamMember->management->name ?? 'N/A' }}</span>
                        <span>|</span>
                        <span>{{ $teamMember->designation->name ?? 'N/A' }}</span>
                    </div>

                    <p>
                       {!!$teamMember->description!!}
                    </p>
                    {{-- <div class="list">
                        <ul>
                            <li>
                                <strong><i class="fas fa-envelope-open-text"></i> Email:</strong>
                                <a href="mailto:support@avedi.com">support@avedi.com</a>
                            </li>
                            <li>
                                <strong><i class="fas fa-phone-alt"></i> Phone:</strong>
                                <a href="tel:123-456-7890">+44-20-7328-4499</a>
                            </li>
                            <li>
                                <strong><i class="fas fa-map-marker-alt"></i> Address:</strong>
                                1401, 21st Street, California
                            </li>
                            <li>
                                <strong><i class="fas fa-globe-americas"></i> Website:</strong>
                                <a href="#">https://wwww.crysta.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="social">
                        <a class="btn btn-theme secondary effect btn-sm" href="contact-us.html">Contact me</a>
                        <div class="share-link">
                            <i class="fas fa-share-alt"></i>
                            <ul>
                                <li class="facebook">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Single Area -->

    @endsection
