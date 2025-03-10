<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/Header.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/AddMoney.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/SendMoney.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/Table.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/Cashout.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/UserManage.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/Tab.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/Profile.css') }}">
    <link rel="stylesheet" href="{{ asset('UnionAdmin/assets/css/Helpline.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Select2  -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- parsleyjs -->
    <link href="{{ asset('libs/parsleyjs/parsley.css') }}" rel="stylesheet" type="text/css" />
    <!-- toastr  -->
    <link href="{{ asset('libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <!-- sweetalert  -->
    <link href="{{ asset('libs/sweetalert/sweetalert.min.css') }}" rel="stylesheet" type="text/css">

    <title>Home | Sheba Card Portal</title>
    @include('SuperAdmin.layouts.partials._styles')

</head>

<body>
    <div class="container">
        <div class="content">
            <!-- header start -->
            @include('UnionAdmin.layouts.partials._header')
            <!-- header end -->

            @yield('content')

            <!-- footer start -->
            @include('UnionAdmin.layouts.partials._footer')
            <!-- footer end -->
        </div>
    </div>

    <script src="{{ asset('UnionAdmin/assets/js/script.js') }}"></script>
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('SuperAdmin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/696233e01c.js" crossorigin="anonymous"></script>
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
    <!-- parsley -->
    <script src="{{ asset('libs/parsleyjs/parsley.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('libs/sweetalert/sweetalert.min.js') }}"></script>
    @include('SuperAdmin.layouts.partials._scripts')

</body>

</html>
