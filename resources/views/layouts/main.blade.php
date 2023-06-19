<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Вадим Караваев">

    <title>Сайт про динозавров</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/dino/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/dino/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/dino/favicon/favicon-16x16.png')}}">

    <link href="{{asset('assets/dino/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dino/vendor/jquery.fancybox/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dino/vendor/fontawesome-free/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dino/css/styles.css')}}" rel="stylesheet">

    <script src="{{asset('assets/dino/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dino/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/dino/vendor/jquery.fancybox/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('assets/dino/js/script.js')}}"></script>

</head>

<body>
<div class="main-wrapper" id="app">
<x-main.header/>
@yield('content')
</div>
<x-main.footer/>
</body>

</html>
