<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0FHQNZRB5M"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '0FHQNZRB5M');
</script>
    <meta charset="utf-8">
    <title>سعادتي - حيث يلتقي الحلم بالواقع</title>
    @include('partials.seo')
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    @yield('head')
    <style>
        .btn-store {
  color: #777777;
  min-width: 254px;
  padding: 12px 20px !important;
  border-color: #dddddd !important;
}

.btn-store:focus,
.btn-store:hover {
  color: #ffffff !important;
  background-color: #168eea;
  border-color: #168eea !important;
}

.btn-store .btn-label,
.btn-store .btn-caption {
  display: block;
  text-align: left;
  line-height: 1;
}

.btn-store .btn-caption {
  font-size: 24px;
}
        </style>
</head>

<body class="hidden-bar-wrapper">
    <div class="page-wrapper">
	    @include('partials.header')
	    @yield('content')
	    @include('partials.footer')
    </div>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/backtotop.js') }}"></script>
    <script src="{{ asset('assets/js/pagenav.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('scripts')
</body>
</html>
