

  @extends('fronted.master')
@section('title', 'Blog Details')
<style>
    .pagination {
        justify-content: center;
        gap: 8px;
    }

    .pagination .page-item .page-link {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        padding: 6px 12px;
        text-align: center;
        line-height: 26px;
        color: #333;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .page-item .page-link:hover {
        background-color: #f0f0f0;
        color: #007bff;
    }
</style>

@section('maincontent')
<!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url({{asset('uploads/' . $settings['SETTING_PAGE_BANNER'])}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Our Blog</h1>
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
   <div class="blog-area blog-grid default-padding">
    <div class="container">
        <div class="blog-item-box">
            <div class="row">
                <!-- Loop Start -->
                @foreach ($blogs as $blog)
                <div class="col-xl-6 col-md-6 single-item">
                    <div class="blog-style-two">
                        <div class="thumb">
                            <a href="{{ route('blog.details1', ['title' => $blog->title]) }}">
                                <img src="{{asset("uploads/blog/$blog->image") }}" alt="Thumb">
                            </a>
                        </div>
                        <div class="info">
                            <div class="meta">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fal fa-tag"></i> {{ $blog->category->name ?? 'Uncategorized' }}</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title">
                                <a href="{{route('blog.details1', ['title' => $blog->title]) }}">
                                    {{ Str::limit($blog->title, 90) }}
                                </a>
                            </h3>
                            <p>
                                {{ Str::limit($blog->short_description ?? $blog->description, 150) }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Loop End -->
            </div>
        </div>

        <!-- Pagination (optional - only if using pagination) -->
            <div class="row justify-content-center mt-5">
            <div class="col-auto">
                <nav aria-label="Blog page navigation">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>

        <!-- End Pagination -->

    </div>
</div>

    <!-- End Blog -->
    @endsection
