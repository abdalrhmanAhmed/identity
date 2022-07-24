<!doctype html>
<html class="no-js" lang="en" dir="rtl">
    <head>
        <meta charset="utf-8">
        <!--====== Title ======-->
        <title>التسجيل الألكتروني</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{ asset('asset/images/4.png') }}" type="image/png">
        <!--====== Magnific Popup CSS ======-->
        <link rel="stylesheet" href="{{asset('asset/css/magnific-popup.css')}}">
        <!--====== Slick CSS ======-->
        <link rel="stylesheet" href="{{asset('asset/css/slick.css')}}">
        <!--====== Line Icons CSS ======-->
        <link rel="stylesheet" href="{{asset('asset/css/LineIcons.css')}}">
        <!--====== Bootstrap CSS ======-->
        <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
        <!--====== Default CSS ======-->
        <link rel="stylesheet" href="{{asset('asset/css/default.css')}}">
        <!--====== Style CSS ======-->
        <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
        
    </head>
    <body>
        <!--====== PRELOADER PART START ======-->
        <div class="preloader">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== PRELOADER PART ENDS ======-->
        
        <!--====== NAVBAR TWO PART START ======-->
            @include('layouts.welcome_page.navigation')
        <!--====== NAVBAR TWO PART ENDS ======-->
        
        <!--====== SLIDER PART START ======-->
            @include('layouts.welcome_page.sliderShow')
        <!--====== SLIDER PART ENDS ======-->
            @yield('content')
        <!--====== FOOTER PART START ======-->
            @include('layouts.welcome_page.footer')
        <!--====== FOOTER PART ENDS ======-->
        
        <!--====== BACK TOP TOP PART START ======-->
            <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
        <!--====== BACK TOP TOP PART ENDS ======-->    

        <!--====== Jquery js ======-->
        <script src="{{asset('asset/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('asset/js/vendor/modernizr-3.7.1.min.js')}}"></script>
        <!--====== Bootstrap js ======-->
        <script src="{{asset('asset/js/popper.min.js')}}"></script>
        <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
        <!--====== Slick js ======-->
        <script src="{{asset('asset/js/slick.min.js')}}"></script>
        <!--====== Magnific Popup js ======-->
        <script src="{{asset('asset/js/jquery.magnific-popup.min.js')}}"></script>
        <!--====== Ajax Contact js ======-->
        <script src="{{asset('asset/js/ajax-contact.js')}}"></script>
        <!--====== Isotope js ======-->
        <script src="{{asset('asset/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('asset/js/isotope.pkgd.min.js')}}"></script>
        <!--====== Scrolling Nav js ======-->
        <script src="{{asset('asset/js/jquery.easing.min.js')}}"></script>
        <script src="{{asset('asset/js/scrolling-nav.js')}}"></script>
        <!--====== Main js ======-->
        <script src="{{asset('asset/js/main.js')}}"></script>
    </body>
</html>
