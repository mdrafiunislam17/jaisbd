  @extends('fronted.master')
@section('title', 'contact Details')

@section('maincontent')

  <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url({{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Contact Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{route('fronted.index')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Contact</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->


        <!-- Start Contact Us
    ============================================= -->
    <div class="contact-area default-padding">
        <div class="container">
            <div class="contact-style-two-items text-center bg-gradient text-light">
                <!-- Shape -->
                <div class="shape-left-top" style="background-image: url(assets/img/shape/25.png);"></div>
                <!-- Shape -->
                <div class="row">
                    <!-- Single Item -->
                    <div class="col-lg-4 contact-style-two">
                        <div class="item">
                            <i class="fas fa-phone-alt"></i>
                            <h4 class="title">Hotline</h4>
                            {{-- <p>
                                A wonderful serenity has taken possession of my entire soul, like these.
                            </p> --}}
                            <a href="#">{!! $settings["CONTACT_PHONE"] !!}</a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-lg-4 contact-style-two">
                        <div class="item">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4 class="title">Our Location</h4>

                            <a class="smooth-menu" href="#contact">  {!! $settings["CONTACT_ADDRESS"] !!}</a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-lg-4 contact-style-two">
                        <div class="item">
                            <i class="fas fa-envelope-open-text"></i>
                            <h4 class="title">Official Email</h4>

                            <a href="#">{!! $settings["CONTACT_EMAIL"] !!}</a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Start Contact Form
    ============================================= -->
    <div id="contact" class="contact-form-area default-padding bg-gray overflow-hidden">
        <!-- Shape -->
        <div class="shape-right-bottom-large" style="background-image: url(assets/img/shape/16.png);"></div>
        <!-- Shape -->
        <div class="google-maps">
           {!! $settings["CONTACT_GOOGLE_MAP"] !!}
            </iframe>
        </div>
        <div class="container">
            <!-- Contact Form -->
            <div class="row">
                <div class="col-xl-6 offset-xl-6 col-lg-7 offset-lg-5">
                    <div class="form">
                        <h4 class="sub-heading">Contact Us</h4>
                        <h2 class="heading">Have Questions? <br> Get in Touch!</h2>
                        <form action="{{ route("contact_form_submit") }}" method="POST" class="contact-form contact-form">
                                @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="subject" name="subject" placeholder="subject" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="message" name="message" placeholder="Tell message *"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        <i class="fa fa-paper-plane"></i> Get in Touch
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-lg-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Contact Form -->


        </div>
    </div>
    <!-- End Contact Form -->



    @endsection
<script>
    // window.addEventListener('load', function () {
    //     const preloader = document.createElement('div');
    //     preloader.className = 'se-pre-con';
    //     preloader.style.cssText = `
    //         position: fixed;
    //         left: 0;
    //         top: 0;
    //         width: 100%;
    //         height: 100%;
    //         z-index: 9999;
    //         background: url('{{ asset('uploads/' . $settings['SETTING_SITE_LOGO']) }}') center no-repeat #fff !important;
    //     `;
    //     document.body.appendChild(preloader);

    //     setTimeout(() => {
    //         preloader.style.display = 'none';
    //     }, 1000);
    // });
</script>
