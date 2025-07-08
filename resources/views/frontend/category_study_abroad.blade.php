@extends('frontend.layouts.app')

@section('title', $category->name . ' Study Abroad')

@section('content')
<main id="main">
  @include('frontend.partials.breadcrumb', ['title' => $category->name . ' Study Abroad'])


  <div class="mt--82 z-index3 relative">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.partials.category_search_form', [
                    'routeName' => 'categoryStudyAbroad', // change per view
                    'allLocations' => $allLocations,
                    'category' => $category
                ])
            </div>
        </div>
    </div>
</div>


  <section class="tour-destination pd-main">
    <div class="tf-container">
      <div class="row">
        @foreach ($studyAbroad as $item)
          <div class="col-sm-6 col-lg-4 mb-37">
            <div class="tf-widget-destination">
              <a href="{{ route('study-abroad.show', $item->slug) }}" class="destination-imgae">
                <span class="tour">{{ $item->duration }}</span>
                <img src="{{ asset('uploads/studyAbroad/'.$item->image) }}" alt="">
              </a>
              <div class="destination-content">
                <span class="nation">{{ $item->title }}</span>
                <div class="flex-two btn-destination">
                  <h6 class="title"><a href="{{ route('study-abroad.show', $item->slug) }}">View Details</a></h6>
                  <a href="{{ route('study-abroad.show', $item->slug) }}" class="flex-five btn-view">
                    <i class="icon-Vector-32"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
</main>
@endsection
