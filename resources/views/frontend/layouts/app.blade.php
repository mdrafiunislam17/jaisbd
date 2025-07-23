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
   <style>
        /* Base floating button styles */
        .floating-button {
        position: fixed;
        right: 30px;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
            background-color: rgb(25, 58, 129);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 9999;
        border: none;
        padding: 0;
        }

        .floating-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
        }

        .floating-button:active {
        transform: translateY(1px);
        }

        #whatsapp-button {
        bottom: 100px;
        background-color: #25D366;
        }

        #scroll-top {
        bottom: 30px;
        display: none;
        }

        /* Animation for appearing */
        @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
        }

        #scroll-top[style*="block"],
        #whatsapp-button[style*="block"] {
        animation: fadeIn 0.3s ease-out;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
        .floating-button {
            right: 20px;
            width: 50px;
            height: 50px;
        }

        #whatsapp-button {
            bottom: 90px;
        }

        #scroll-top {
            bottom: 20px;
        }
        }
</style>
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

            <!-- WhatsApp Button - Improved with phone number and message -->
          <a href="https://wa.me/8801979200300?text=Hello%20I%20have%20a%20question%20about..."
            target="_blank"
            rel="noopener noreferrer"
            id="whatsapp-button"
            aria-label="Chat on WhatsApp"
            class="floating-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="50" height="50" style="padding-left: 5px;">
                <circle cx="16" cy="16" r="15" fill="#25D366"/>
                <path d="M16.004 2.997c-7.285 0-13.194 5.909-13.194 13.193 0 2.332.61 4.606 1.765 6.62l-1.863 6.81 7.008-1.837c1.937 1.058 4.135 1.62 6.282 1.62h.002c7.283 0 13.193-5.91 13.193-13.193S23.287 2.997 16.004 2.997zm7.63 18.186c-.31.868-1.819 1.71-2.519 1.82-.645.095-1.465.135-2.364-.15-.546-.17-1.249-.407-2.148-.79-3.78-1.636-6.25-5.443-6.44-5.7-.19-.256-1.54-2.053-1.54-3.92s.97-2.78 1.314-3.15c.345-.37.75-.465 1-.465.256 0 .5.002.72.013.232.01.54-.087.845.646.31.75 1.053 2.59 1.144 2.78.095.19.16.415.03.67-.126.256-.19.415-.375.65-.19.232-.4.52-.57.7-.19.19-.39.397-.17.78.216.382.96 1.59 2.055 2.58 1.412 1.26 2.6 1.653 3.012 1.844.39.19.61.17.845-.09.232-.25.97-1.136 1.23-1.52.26-.38.52-.32.845-.19.33.127 2.1.99 2.46 1.17.365.19.61.28.7.44.09.157.09.9-.22 1.77z" fill="#FFF"/>
            </svg>
            </a>


            <!-- Scroll to Top Button - Improved with smooth scroll -->
            <button id="scroll-top" class="floating-button" aria-label="Scroll to Top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M12 4l-8 8h5v8h6v-8h5z" fill="currentColor"/>
            </svg>
            </button>

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

 <script>
// Debounced scroll handler for better performance
let isScrolling;
window.addEventListener("scroll", function() {
  const scrollTop = document.getElementById("scroll-top");
  const whatsappButton = document.getElementById("whatsapp-button");

  // Clear our timeout throughout the scroll
  window.clearTimeout(isScrolling);

  // Set a timeout to run after scrolling ends
  isScrolling = setTimeout(function() {
    const show = window.scrollY > 200;
    scrollTop.style.display = show ? "block" : "none";
    whatsappButton.style.display = show ? "block" : "none";
  }, 50);
});


// Get current date & time in YYYY-MM-DD HH:mm:ss format
//    const now = new Date();
//    const year = now.getFullYear();
//    const month = String(now.getMonth() + 1).padStart(2, '0');
//    const day = String(now.getDate()).padStart(2, '0');
//    const hours = String(now.getHours()).padStart(2, '0');
//    const minutes = String(now.getMinutes()).padStart(2, '0');
//    const seconds = String(now.getSeconds()).padStart(2, '0');

//    const formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

   const message = `Hello, I have a question about... `;
   const phone = "8801979200300";
   const encodedMessage = encodeURIComponent(message);
   const url = `https://wa.me/${phone}?text=${encodedMessage}`;
   document.getElementById("whatsapp-button").href = url;

</script>

</body>

</html>
