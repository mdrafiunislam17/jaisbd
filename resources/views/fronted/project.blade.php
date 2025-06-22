     @extends('fronted.master')
@section('title', 'Services Details')

@section('maincontent')
<!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
            style="background-image: url({{asset('uploads/' . $settings['SETTING_PAGE_BANNER'])}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Project Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{route('fronted.index')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Projects</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Project Details Area
    ============================================= -->
    <div class="project-details-area default-padding">
        <div class="container">
            <div class="project-details-items">
                <div class="thumb">
                    <img src="{{ asset('uploads/project/' . $project->image)}}" alt="Thumb">
                </div>
                <div class="top-info">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 pr-35 pr-md-15 pr-xs-15 left-info">
                            <h2>{{$project->title}}</h2>
                            <p>
                                {!! $project->description !!}
                            </p>

                        </div>
                        <div class="col-xl-4 col-lg-5 right-info">
                            <div class="project-info mt-md-50 mt-xs-40">
                                <h3 class="title">Project Info</h3>
                                <ul>
                                    <li>
                                        Client <span>{{$projectInfo->name}}</span>
                                    </li>
                                    <li>
                                        Date <span>{{$projectInfo->created_at}}</span>
                                    </li>
                                    <li>
                                        Address <span>{{$projectInfo->location}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End Project Details Area -->

    @endsection
