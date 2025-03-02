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
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collect Form</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        } */

        /* .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        } */

        h5 {
            margin-bottom: 15px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    
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
            <div style="width: 85%;margin: 6% auto;">
                <h5>Collect Payment</h5>
                <form action="{{ route('super-admin.rest-balance.collect.store', $restBalance->id) }}" method="POST">
                    @csrf 
                    <input type="hidden" name="transaction_id" value="{{ $restBalance->id }}" />
                    
                    <input type="number" step="any" name="amount" value="{{ $restBalance->remaining_due }}" 
                           min="1" max="{{ $restBalance->remaining_due }}" placeholder="Enter Amount" required />
        
                    <input type="text" name="notes" placeholder="Notes (Optional)" />
        
                    <input type="datetime-local" name="datetime" required />
        
                    <button type="submit">Submit</button>
                </form>
            </div>

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
            $('#total-select-paginate').on('change', function () {
                var selectedTotal = $(this).val();

                // Get the current URL and query parameters
                var url = new URL(window.location.href);

                // Update or add the 'total' query parameter
                url.searchParams.set('total', selectedTotal);

                // Redirect to the new URL
                window.location.href = url.toString();
            });
            
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