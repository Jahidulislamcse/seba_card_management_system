<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Fonts and icons -->
        <script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>

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
</head>
<body>
    <div class="container-fluid">
        @include('word-admin.layouts._header')

        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>

        @include('word-admin.layouts._footer')
    </div>

        <!--   Core JS Files   -->
        <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
    @if (session('success'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'icon-bell',
                message: '{{ session('
                success ') }}',
            }, {
                type: 'success',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });

            $.notify({
                icon: 'icon-bell',
                message: '{{ session('
                errors ') }}',
            }, {
                type: 'errors',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
    </script>
    @endif
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

        });
    </script>
    @stack('scripts')
</body>
</html>
