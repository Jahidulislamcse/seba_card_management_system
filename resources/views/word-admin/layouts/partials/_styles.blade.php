<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome (CDN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Select2  -->
<link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- parsleyjs -->
<link href="{{ asset('libs/parsleyjs/parsley.css') }}" rel="stylesheet" type="text/css" />
<!-- Fonts and icons -->
<script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>
<!-- toastr  -->
<link href="{{ asset('libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
<!-- sweetalert  -->
<link href="{{ asset('libs/sweetalert/sweetalert.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('backend/css/custom.css')}}">

<link rel="stylesheet" href="{{ asset('backend/css/plugins.min.css') }}" />
<style>
    body {
        background-color: #f8f9fa;
    }
    .dashboard-header {
        background-color: #002F67;
        color: white;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .dashboard-header img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .profile-info {
        display: flex;
        align-items: center;
    }
    .search-bar, .notice-board {
        margin: 15px 0;
    }
    .icon-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }
    .icon-box {
        width: 90px;
        height: 90px;
        text-align: center;
        background: #002F67;
        color: white;
        padding: 10px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
    .bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #002F67;
        padding: 10px 0;
        display: flex;
        justify-content: space-around;
        color: white;
    }
    .carousel img {
        height: 200px;
        object-fit: cover;
    }
</style>
@stack('styles')


