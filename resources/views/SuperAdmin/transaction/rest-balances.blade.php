<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Header.css') }}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Table.css') }}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/RestBalance.css') }}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/common.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- parsleyjs -->
    <link href="{{ asset('libs/parsleyjs/parsley.css') }}" rel="stylesheet" type="text/css" />

    <!-- toastr  -->
    <link href="{{ asset('libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <title>Sheba Card</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <!-- header start -->
            <header class="Super-admin-header">
                <div class="header-profile">
                    <a href="Profile.html">
                        <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon">
                    </a>
                    <div class="profile-details">
                        <h5>{{auth()->user()->name}}</h5>
                        <p>Super Admin</p>
                    </div>
                </div>
                <div class="amount">
                    <button class="amount-btn">৳</button>
                    <p class="amounts">{{auth()->user()->total_balance}}</p>
                </div>
            </header>
            <!-- header end -->

            <!-- user table -->
            <h6 class="all-user">মোট - ৮৭৯০ জন</h6>
            <form action="#" class="search-user-area">
                <input type="text" name="search-user" id="search-user" placeholder="mobile number/id">
                <button type="submit" class="button">Submit</button>
            </form>
            <div class="user-table">
                <table class="all-user-table table">
                    <thead>
                        <tr>
                            <th>ক্রমিক নং</th>
                            <th>নাম</th>
                            <th>বাকি পরিমাণ</th>
                            <th>বিস্তারিত দেখুন</th>
                            <th>আদায় করুন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="serial_no">০১</td>
                            <td class="user-name">মো: রিমন শেখ</td>
                            <td class="rest-balance">৬,৫০০</td>
                            <td class="view-details-btn">
                                <div>
                                    <a class="details-btn" href="#">View Details</a>
                                </div>
                            </td>
                            <td class="collection-btn">
                                <div>
                                    <a class="collect-btn" href="#">Collect</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="serial_no">০১</td>
                            <td class="user-name">মো: রিমন শেখ</td>
                            <td class="rest-balance">৬,৫০০</td>
                            <td class="view-details-btn">
                                <div>
                                    <a class="details-btn" href="#">View Details</a>
                                </div>
                            </td>
                            <td class="collection-btn">
                                <div>
                                    <a class="collect-btn" href="#">Collect</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- user table -->

            <!-- footer start -->
            <div class="fixed-bottom">
                <footer class="Super-admin-footer">
                    <a href="index.html">
                        <img src="{{ asset('SuperAdmin/assets/img/home.png')}}" alt="home icon">
                        <p>হোম</p>
                    </a>
                    <a href="WebsiteSetting.html">
                        <img src="{{ asset('SuperAdmin/assets/img/website.png')}}" alt="website icon">
                        <p>ওয়েবসাইট সে‌টিংস</p>
                    </a>
                    <a href="#">
                        <img src="{{ asset('SuperAdmin/assets/img/logout.png')}}" alt="logout icon">
                        <p>লগআউট</p>
                    </a>
                    <a href="HelpLine.html">
                        <img src="{{ asset('SuperAdmin/assets/img/helpline.png')}}" alt=" icon">
                        <p>হেল্প-লাইন</p>
                    </a>
                </footer>
            </div>
            <!-- footer end -->
        </div>
    </div>

    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('SuperAdmin/assets/js/script.js') }}"></script>
    <script src="{{ asset('SuperAdmin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/696233e01c.js" crossorigin="anonymous"></script>

    
        <!-- parsley -->
        <script src="{{ asset('libs/parsleyjs/parsley.min.js') }}"></script>
            <!-- Toastr -->
    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true
        };

        @if(Session::has('success'))
            toastr.success(@json(session('success')));
        @endif

        @if(Session::has('error'))
            toastr.error(@json(session('error')));
        @endif

        @if(Session::has('info'))
            toastr.info(@json(session('info')));
        @endif

        @if(Session::has('warning'))
            toastr.warning(@json(session('warning')));
        @endif
    </script>

    <script>
        $(document).ready(function () {
            // Initialize Parsley validation if a form exists
            if ($("form").length) {
                $('form').parsley();
            }
    
            
        });
    </script>

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error(@json($error));
            @endforeach
        </script>
    @endif

</body>
</html>