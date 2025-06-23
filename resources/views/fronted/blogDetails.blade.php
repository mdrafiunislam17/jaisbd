@extends('fronted.master')
@section('title', 'Blog Details')

@section('maincontent')

      <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url({{asset('uploads/' . $settings['SETTING_PAGE_BANNER'])}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Blog Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{route('fronted.index')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-xl-12 col-lg-12 col-md-12 pr-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15">
                        <div class="blog-style-two item">

                            <div class="blog-item-box">

                                <div class="thumb">
                                    <a href="blog-single-with-sidebar.html"><img src="{{asset("uploads/blog/$blog->image")}}" alt="Thumb"></a>
                                </div>
                                <div class="info">
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fas fa-calendar-alt"></i>
                                                     {{ \Carbon\Carbon::parse($blog->posted_on)->format('F j, Y') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fal fa-tag"></i> {{ $blog->posted_by ?? 'Uncategorized' }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3>{{$blog->title}}.</h3>
                                    <p>
                                       {{$blog->short_detail }}
                                    </p>

                                    <p>
                                       {!! $blog->detail !!}
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Start Post Pagination -->
                        {{-- <div class="post-pagi-area">
                            <a href="blog-single-with-sidebar.html">
                                <i class="fas fa-angle-double-left"></i> Previus Post
                                <h5>Hello World</h5>
                            </a>
                            <a href="blog-single-with-sidebar.html">
                                Next Post <i class="fas fa-angle-double-right"></i>
                                <h5>The earth brown</h5>
                            </a>
                        </div> --}}
                        <!-- End Post Pagination -->

                        <!-- Start Post Tags-->

                        <!-- End Post Tags -->

                        <!-- Start Blog Comment -->

                        <!-- End Comments Form -->
                    </div>

                    <!-- Start Sidebar -->
                    {{-- <div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
                        <aside>

                            <div class="sidebar-item recent-post">
                                <h4 class="title">Recent Post</h4>
                                <ul>
                                    @foreach ($blogs as $Blog)
                                    <li>
                                        <div class="thumb">
                                            <a href="{{route('ourBlog')}}">
                                                <img src="{{asset("uploads/blog/$blog->image")}}" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="meta-title">
                                                <span class="post-date">{{ \Carbon\Carbon::parse($blog->posted_on)->format('F j, Y') }}</span>
                                            </div>
                                            <a href="{{route('ourBlog')}}">{{ $blog->posted_by ?? 'Uncategorized' }}.</a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </aside>
                    </div> --}}
                    <!-- End Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
