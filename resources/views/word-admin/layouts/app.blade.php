<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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

        @yield('content')

        @include('word-admin.layouts._footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
