@extends('fronted.master')
@section('title', 'Choose Details')

@section('maincontent')

   <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
            style="background-image: url({{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Choose Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{route('fronted.index')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Choose</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star choose Details Area
    ============================================= -->
    <div class="choose-details-area default-padding">
        <div class="container">
            <div class="choose-details-items">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 pr-45 pr-md-15 pr-xs-15 choose-single-content">
                        <div class="thumb">
                            <img src="{{ asset('uploads/choose/' . $choose->image)}}" alt="Thumb">
                        </div><br>
                        <h2>{{$choose->title}}</h2>

                        <h4> {{$choose->slug}} </h4>
                        <p>
                             {!! $choose->description !!}
                        </p>


                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- End choose Details Area -->
@endsection
