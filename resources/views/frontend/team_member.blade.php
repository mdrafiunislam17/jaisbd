@extends('frontend.layouts.app')

@section('title', 'Team Member')

@section('content')

  @include('frontend.partials.breadcrumb', ['title' => ' Team Members'])

             <section class="team-member-page pd-main">
                <div class="tf-container">
                    <div class="row mb-40">
                        <div class="col-lg-12">
                            <div class="center m0-auto w-text-heading">
                                <span class="sub-title-heading text-main font-yes fs-28-46">Populer
                                    Activities</span>
                                <h2 class="title-heading ">meet our experienced <span
                                        class="text-main font-yes">Team</span> people</h2>
                            </div>
                        </div>
                    </div>
                    <div class="team-member-grid">

                        @foreach ($teamMembers as $teamMember )
                               <div class="tf-widget-team">
                            <div class="team-image mb-15">
                                <img src="{{ asset("uploads/teamMember/$teamMember->image") }}" alt="">


                            </div>
                            <div class="team-content center">
                                <p class="job">{{$teamMember->management->name}}</p>
                                <h4 class="name"><a href="{{ route('teamMemberDetails', ['name' => $teamMember->name]) }}">{{$teamMember->designation->name}}</a></h4>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </section>

                {{-- <section class="brand-logo-widget bg-4">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper brand-logo overflow-hidden">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="./assets/images/page/brand-logo.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./assets/images/page/brand-logo.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./assets/images/page/brand-logo.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./assets/images/page/brand-logo.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./assets/images/page/brand-logo.png" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="./assets/images/page/brand-logo.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section> --}}


@endsection

@push('styles')
<style>

</style>
@endpush

@push('scripts')
<script>

</script>

@endpush
