<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/Category.css')}}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/Home.css')}}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/Header.css')}}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/common.css')}}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/Footer.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Home | Sheba Card Portal</title>
</head>
<body>
@include('front.layouts.header')

@yield('content')


@include('front.layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".FeedBackSwiper", {
        navigation: {
            nextEl: ".swiper-btn-next",
            prevEl: ".swiper-btn-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        keyboard: true
    });
</script>
</body>
</html>
