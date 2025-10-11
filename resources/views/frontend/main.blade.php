<!DOCTYPE html>
<html lang="ar">

<!-- Mirrored from html.themerange.net/conat/conat/index-2-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Sep 2025 10:57:19 GMT -->
<head>
<meta charset="utf-8">
<title>سعادتــــي</title>
<!-- Stylesheets -->
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&amp;display=swap"
		rel="stylesheet">


<!-- Color Switcher Mockup -->
<link href="{{ asset('assets/css/color-switcher-design.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('assets/images/logo-saadaty.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/images/logo-saadaty.png') }}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

@yield('head')

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper rtl">

	<!-- Preloader -->
	<div class="preloader" style="display: none;"></div>
	<!-- End Preloader -->

	<!-- Header Style One -->
	@include('frontend.body.header')
	<!-- End Main Header -->



	@yield('content')

	<!--Main Footer-->
	@include('frontend.body.footer')

	<!-- Search Popup -->
	<div class="search-popup">
		<div class="color-layer"></div>
		<button class="close-search"><span class="flaticon-cancel-1"></span></button>
		<form method="post" action="https://html.themerange.net/conat/conat/blog.html">
			<div class="form-group">
				<input type="search" name="search-field" value="" placeholder="Search Here" required="">
				<button class="fa fa-solid fa-magnifying-glass fa-fw" type="submit"></button>
			</div>
		</form>
	</div>
	<!-- End Search Popup -->

</div>
<!-- End PageWrapper -->

<!-- Back To Top Start -->
<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
	 <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<!-- back to top end -->

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/tilt.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.paroller.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/element-in-view.js') }}"></script>
<script src="{{ asset('assets/js/backtotop.js') }}"></script>
<script src="{{ asset('assets/js/odometer.js') }}"></script>
<script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/js/pagenav.js') }}"></script>

<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/nav-tool.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/color-settings.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

@yield('scripts')

</body>

<!-- Mirrored from html.themerange.net/conat/conat/index-2-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Sep 2025 10:57:19 GMT -->
</html>
