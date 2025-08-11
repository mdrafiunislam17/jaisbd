<section class="breadcumb-section" style="background-image: url('{{ asset("uploads/" . $settings["SETTING_PAGE_BANNER"]) }}'); background-size: cover; background-position: center;">
  <div class="tf-container">
    <div class="row">
      <div class="col-lg-12 center z-index1">
        <h1 class="title">{{ $title }}</h1>
        <ul class="breadcumb-list flex-five">
          <li><a href="{{ route('frontend.index') }}">Home</a></li>
          <li><span>{{ $title }}</span></li>
        </ul>
        <img class="bcrumb-ab" src="{{ asset('assets/images/page/mask-bcrumb.png') }}" alt="">
      </div>
    </div>
  </div>
</section>
