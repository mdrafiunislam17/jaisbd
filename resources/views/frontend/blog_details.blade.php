@extends('frontend.layouts.app')

@section('title', 'Blog Details')

@section('content')

  @include('frontend.partials.breadcrumb', ['title' => ' Blog Details'])

  <section class="our-blog pd-main">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-8 col-12">

                        <article class="side-blog mb-56px">
                    <div class="blog-image">
                        <div class="list-categories">
                            <a href="#" class="new">{{ \Carbon\Carbon::parse($blog->posted_on)->format('d F') }}</a>
                        </div>
                        <a class="post-thumbnail" href="blog-details.html">
                            <img src="{{asset("uploads/blog/$blog->image")}}" alt="Image blog">
                        </a>

                    </div>
                    <div class="blog-content">
                        <div class="top-detail-info">
                            <ul class="flex-three">
                                <li>
                                    <i class="icon-user"></i>
                                    <a href="#">{{$blog->posted_by}}</a>
                                </li>
                                {{-- <li>
                                    <i class="icon-25"></i>
                                    <span class="date">Coments (03)</span>
                                </li> --}}
                                <li>
                                    <i class="icon-24"></i>
                                    <span class="date">{{ $blog->read_time }} min Read</span>

                                </li>
                            </ul>
                        </div>
                        <h3 class="entry-title">
                            <a href="#">{{$blog->title}} </a>
                        </h3>
                        <p class="description">{{$blog->short_detail}}
                        </p>

                         <p class="description">{!! $blog->detail !!}
                        </p>
                        {{-- <div class="button-main ">
                            <a href="{{ route('blogDetails', ['title' => $blog->title]) }} " class="button-link">Read More <i
                                    class="icon-Arrow-11"></i></a>
                        </div> --}}
                    </div>
                </article>









            </div>
               <div class="col-lg-4 col-12">
                <div class="side-bar-right">

                    <div class="sidebar-widget">
                        <h4 class="block-heading">Recent News</h4>
                        <div class="recent-post-list">
                            @foreach ($recentBlogs as $singleBlog)
                            <div class="list-recent flex-three">
                                <a href="{{ route('blogDetails', ['title' => $singleBlog->title]) }}" class="recent-image">
                                    <img src="{{asset("uploads/blog/$singleBlog->image")}}" alt="Image">
                                </a>
                                <div class="recent-info">
                                    <div class="date">
                                        <i class="icon-4"></i>
                                        <span>{{ \Carbon\Carbon::parse($singleBlog->posted_on)->format('d F') }}</span>
                                    </div>
                                    <h4 class="title">
                                        <a href="{{ route('blogDetails', ['title' => $singleBlog->title]) }}">{{$singleBlog->title}}</a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('styles')
<style>

</style>
@endpush

@push('scripts')
<script>

</script>

@endpush
