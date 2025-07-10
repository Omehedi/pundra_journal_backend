<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMSS Medical College Journal (TMCJ)</title>
    <link rel="stylesheet" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend//fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>
<body>
@include('frontend.layout.header')
@yield('content')
@include('frontend.layout.footer')
<script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
</body>
</html>