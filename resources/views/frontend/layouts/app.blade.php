<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('app/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/textanimation.css')}}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo2.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/images/logo2.png')}}">
    @stack("styles")
</head>

<body class="body header-fixed counter-scroll">

    <div class="preload preload-container">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20"
                stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20"
                stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"
                stroke-dasharray="0 440" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"
                stroke-dasharray="0 440" stroke-linecap="round"></circle>
        </svg>
    </div>

    <!-- /preload -->

    <div id="wrapper">
        <div id="pagee" class="clearfix">

           @include('frontend.layouts.header')

            @yield("content")

            @include('frontend.layouts.footer')
            <!-- Bottom -->
        </div>
        <!-- /#page -->
    </div>

    <!-- Modal Popup Bid -->



    <!-- Javascript -->

    @stack("scripts")
    <script src="{{asset('app/js/jquery.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('app/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('app/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('app/js/swiper.js')}}"></script>
    <script src="{{asset('app/js/plugin.js')}}"></script>
    <script src="{{asset('app/js/count-down.js')}}"></script>
    <script src="{{asset('app/js/countto.js')}}"></script>
    <script src="{{asset('app/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('app/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('app/js/price-ranger.js')}}"></script>
    <script src="{{asset('app/js/textanimation.js')}}"></script>
    <script src="{{asset('app/js/wow.min.js')}}"></script>
    <script src="{{asset('app/js/shortcodes.js')}}"></script>
    <script src="{{asset('app/js/main.js')}}"></script>

</body>

</html>
