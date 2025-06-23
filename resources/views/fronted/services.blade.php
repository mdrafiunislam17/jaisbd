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
                    <h1>Service Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{route('fronted.index')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Service</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Services Details Area
    ============================================= -->
    <div class="services-details-area default-padding">
        <div class="container">
            <div class="services-details-items">
                <div class="row">

                    <div class="col-xl-8 col-lg-7 pr-45 pr-md-15 pr-xs-15 services-single-content">
                        <div class="thumb">
                            <img src="{{ asset('uploads/service/' . $service->image)}}" alt="Thumb">
                        </div>
                        <h2>{{$service->title}}</h2>

                        <h4> {{$service->slug}} </h4>
                        <p>
                             {!! $service->description !!}
                        </p>

                        {{-- <div class="services-more">
                            <h2>Popular Services</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="item">
                                        <i class="flaticon-laptop"></i>
                                        <h4><a href="#">Risk Management</a></h4>
                                        <p>
                                            These cases are perfectly simple and easy to distinguish. In a free hour, when our power.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="item">
                                        <i class="flaticon-dashboard"></i>
                                        <h4><a href="#">Analytic Solutions</a></h4>
                                        <p>
                                            These cases are perfectly simple and easy to distinguish. In a free hour, when our power.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="col-xl-4 col-lg-5 mt-md-50 mt-xs-50 services-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget services-list-widget">
                            <h4 class="widget-title">Technology Services</h4>
                            <div class="content">

                               <ul>
                                    @foreach ($services as $item)
                                        <li class="{{ request('slug') == $item->slug ? 'current-item' : '' }}">
                                            <a href="{{ route('services.details1', ['slug' => $item->slug]) }}">
                                                {{ $item->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <div class="single-widget quick-contact-widget text-light" style="background-image: url(assets/img/about/2.jpg);">
                            <div class="content">
                                <i class="fas fa-phone-alt"></i>
                                <h2>{!! $settings["CONTACT_PHONE"] !!}</h2>
                                <h4><a href="{!! $settings["CONTACT_EMAIL"] !!}">{!! $settings["CONTACT_EMAIL"] !!}</a></h4>
                                <a class="btn mt-30 btn-sm btn-theme" href="{{route('contact')}}">Contact Us</a>
                            </div>
                        </div>
                        <!-- Single Widget -->
                        {{-- <div class="single-widget widget-brochure">
                            <h4 class="widget-title">Brochure</h4>
                            <ul>
                                <li><a href="#"><i class="fas fa-file-pdf"></i> Download Brochure </a></li>
                                <li><a href="#"><i class="fas fa-file-pdf"></i> Company Details </a></li>
                            </ul>
                        </div> --}}
                        <!-- End Single Widget -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Services Details Area -->
@endsection
