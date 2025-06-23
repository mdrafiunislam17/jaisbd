    <!-- Start Header Top
    ============================================= -->
    <div class="top-bar bg-dark text-light top-style-one">
        <div class="container-fill pr">
            <div class="row align-center">
                <div class="col-xl-7 offset-xl-2 col-lg-8 info">
                    <ul>
                        <li>
                            Need Help? <a href="tel:+4733378901">Request A Callback</a>
                        </li>
                        <li>
                            <i class="fal fa-clock"></i> <span>Working Hours: 8:00 AM – 7:45 PM</span>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-4 text-right item-flex">

                    <div class="social">
                        <ul>
                            <li>
                                <a href="{{ $settings["SETTING_SOCIAL_FACEBOOK"] }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings["SETTING_SOCIAL_TWITTER"] }}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings["SETTING_SOCIAL_LINKEDIN"] }}">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $settings["SETTING_SOCIAL_YOUTUBE"] }}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav small-pad brand-style-bg nav-border attr-border navbar-sticky navbar-default validnavs">

            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container-xl">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container-fill pr">


                <div class="row align-center">
                    <!-- Start Header Navigation -->
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-1">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="{{route('fronted.index')}}">
                                <img src="{{ asset('uploads/' . $settings['SETTING_SITE_LOGO']) }}"  alt="Logo">
                            </a>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-xl-7 col-lg-8 col-md-4 col-sm-4 col-4">
                        <div class="collapse navbar-collapse" id="navbar-menu">

                            <img src="{{ asset('uploads/' . $settings['SETTING_SITE_LOGO']) }}"    alt="Logo">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-times"></i>
                            </button>

                            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class="">
                                    <a href="{{route('fronted.index')}}" class="dropdown-toggle active" data-toggle="dropdown" >Home</a>

                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Pages</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown">
                                            <a href="{{route('aboutus')}}" class="" data-toggle="dropdown" >About Us</a>

                                        </li>
                                        <li><a href="{{route('oureTeam')}}">Team</a></li>
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="{{route('projectus')}}" class="dropdown-toggle" data-toggle="dropdown" >Projects</a>

                                </li>
                                {{-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Services</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="services.html">Services Version One</a></li>
                                        <li><a href="services-2.html">Services Version Two</a></li>
                                        <li><a href="services-details.html">Services Details</a></li>
                                    </ul>
                                </li> --}}
                                <li class="">
                                    <a href="{{route('ourBlog')}}" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                                </li>
                                {{-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Shop</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="shop.html">Shop Product</a></li>
                                        <li><a href="shop-single.html">Shop Single</a></li>
                                        <li><a href="shop-single-thumb-only.html">Shop Single Version Two</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->

                    <div class="col-xl-3 col-lg-2 col-md-6 col-sm-7 col-7">
                        <div class="attr-right d-flex justify-content-between">
                            <!-- Start Atribute Navigation -->
                            <div class="attr-nav">
                                <ul>
                                    <li class="search"><a href="#"><i class="far fa-search"></i></a></li>
                                    <li class="button">
                                        <a href="{{route('fronted.index')}}">Get a Quote</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Atribute Navigation -->

                        </div>

                    </div>



                </div>

                <!-- Overlay screen for menu -->
                <div class="overlay-screen"></div>
                <!-- End Overlay screen for menu -->

            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
