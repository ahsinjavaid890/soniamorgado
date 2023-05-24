<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ url('public/front/images/favicon.png') }}">
    @yield('tittle')
    <link href="{{ url('public/front/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/slick.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/sass/style.css') }}" rel="stylesheet">
    <link href="{{ url('public/front/css/services.css') }}" rel="stylesheet">
</head>
<body>
		<div class="page-wrapper">
      <!-- <div class="preloader">
          <div class="vertical-centered-box">
              <div class="content">
                  <div class="loader-circle"></div>
                  <div class="loader-line-mask">
                      <div class="loader-line"></div>
                  </div>
                  <img src="{{ url('public/front/images/preloader.png') }}" alt="">
              </div>
          </div>
      </div> -->
		@include('frontend.includes.header')
			@yield('content')
		@include('frontend.includes.footer')
    </div>
    ================================================== -->
    <script src="{{ url('public/front/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/front/js/modernizr.custom.js') }}"></script>
    <script src="{{ url('public/front/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ url('public/front/js/script.js') }}"></script>
</body>
</html>
@yield('script')