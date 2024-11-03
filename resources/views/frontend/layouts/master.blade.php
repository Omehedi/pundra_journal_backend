<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HRM & Admin</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{assets('frontend_asset/images/picture.jpeg')}}">
    <link rel="stylesheet" href="{{assets('frontend_asset/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{assets('plugins/jquery_ui/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{assets('frontend_asset/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{assets('frontend_asset/css/vendor/flaticon.css')}}">
    <link rel="stylesheet" href="{{assets('frontend_asset/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{assets('frontend_asset/css/style.css')}}">
    <link rel="stylesheet" href="{{assets('front_assets/css/helper.css')}}">
    @yield('meta')
</head>

<body>

@include('frontend.layouts.header')
@yield('content')

@include('frontend.layouts.footer')
<script src="{{assets('frontend_asset/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script  src='{{assets('frontend_asset/js/sharer.min.js')}}'></script>
<script src="{{assets('plugins/jquery_ui/jquery-ui.min.js')}}"></script>
<script src="{{assets('frontend_asset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{assets('frontend_asset/js/main.js') }}"></script>
@yield('script')
</body>


</html>
