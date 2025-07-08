@extends('frontend.layouts.app')

@section('title', 'Blog')

@section('content')

  @include('frontend.partials.breadcrumb', ['title' => ' Blog'])

  <section class="our-blog pd-main">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-8 col-12">
                @foreach ($blogs as $blog)
                        <article class="side-blog mb-56px">
                    <div class="blog-image">
                        <div class="list-categories">
                            <a href="#" class="new">{{ \Carbon\Carbon::parse($blog->posted_on)->format('d F') }}</a>
                        </div>
                        <a class="post-thumbnail" href="{{ route('blogDetails', ['title' => $blog->title]) }}">
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
                        <div class="button-main ">
                            <a href="{{ route('blogDetails', ['title' => $blog->title]) }} " class="button-link">Read More <i
                                    class="icon-Arrow-11"></i></a>
                        </div>
                    </div>
                </article>
                @endforeach




                @if ($blogs->lastPage() > 1)
                    <ul class="tf-pagination flex-five mt-20">
                        {{-- Previous Page Link --}}
                        @if ($blogs->onFirstPage())
                            <li class="disabled"><span class="pages-link"><i class="icon-29"></i></span></li>
                        @else
                            <li><a class="pages-link" href="{{ $blogs->previousPageUrl() }}"><i class="icon-29"></i></a></li>
                        @endif

                        {{-- Page Number Links --}}
                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            @if ($i == $blogs->currentPage())
                                <li class="pages-item active" aria-current="page">
                                    <a class="pages-link" href="#">{{ $i }}</a>
                                </li>
                            @else
                                <li><a class="pages-link" href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($blogs->hasMorePages())
                            <li><a class="pages-link" href="{{ $blogs->nextPageUrl() }}"><i class="icon--1"></i></a></li>
                        @else
                            <li class="disabled"><span class="pages-link"><i class="icon--1"></i></span></li>
                        @endif
                    </ul>
                @endif




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
