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
</head>
<body>
    <div class="container-fluid">
        <div class="dashboard-header">
            <div class="profile-info">
                <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_640.png" alt="Profile">
                <div>
                    <strong>{{Auth::user()->name }}</strong><br>
                    <small>ID: {{Auth::user()->id}}</small><br>
                    <small>{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}</small>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
            </form>
        </div>

        <div class="search-bar">
            <input type="text" class="form-control" placeholder="কার্ড পার্ট করুন">
        </div>

        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://wowslider.com/sliders/demo-18/data1/images/hongkong1081704.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <div class="notice-board">
            <input type="text" class="form-control" placeholder="নোটিশ বোর্ড">
        </div>

        <div class="icon-section">
            <div class="icon-box"><i class="fas fa-id-card"></i><br>এড কার্ড</div>
            <div class="icon-box"><i class="fas fa-user-plus"></i><br>নতুন সদস্য</div>
            <div class="icon-box"><i class="fas fa-clock"></i><br>সময় তালিকা</div>
            <div class="icon-box"><i class="fas fa-check-circle"></i><br>কার্ড চেকিং</div>
            <div class="icon-box"><i class="fas fa-wallet"></i><br>ব্যালেন্স এড</div>
            <div class="icon-box"><i class="fas fa-file-alt"></i><br>ব্যালেন্স স্টেটমেন্ট</div>
            <div class="icon-box"><i class="fas fa-id-card-alt"></i><br>ওয়াই কার্ড তালিকা</div>
            <div class="icon-box"><i class="fas fa-chart-bar"></i><br>রিপোর্ট</div>
            <div class="icon-box"><i class="fas fa-mobile-alt"></i><br>মোবাইল রিচার্জ</div>
            <div class="icon-box"><i class="fas fa-sign-out-alt"></i><br>লগ আউট</div>
        </div>

        <div class="bottom-nav">
            <div>হোম</div>
            <div>ফাইল</div>
            <div>নোটিশ</div>
            <div>সম্পদনা</div>
            <div>হেল্পলাইন</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
