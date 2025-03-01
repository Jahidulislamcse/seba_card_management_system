<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Header.css') }}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/SendMoney.css') }}">
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


            <!-- send money start -->
            <form class="send-money" action="{{route('super.admin.transactions.store')}}" method="POST" data-parsley-validate>
                @csrf
                <input type="hidden" name="sender_id" id="sender_id" value="{{ Auth::user()->id }}" />
                <input type="hidden" name="receiver_id" id="receiver_id" value="" />
                <label class="title" for="number">সেন্ড মানি</label>
                <div class="sending-number">
                    <input type="number" class="send-money-inp" id="search-number" placeholder="019.." required>
                    <div class="abs-data">
                        <button type="button" class="verify-btn" id="verify-btn">
                        
                            verified
                            <i class="fa-solid fa-check"></i>
                        </button>
                        <img class="user-image" id="user-image" src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="">
                    </div>
                </div>
                <p class="user-name" id="user-name"> </p>
                <input class="send-money-inp" type="text" name="amount" id="amount" placeholder="Amount" required>
                <div class="cashRest">
                    <div class="cash">
                        <label for="cash">ক্যাশ</label>
                        <input type="radio" name="type" id="cash" value="{{\App\Models\Transaction::TYPE_CASH}}" checked>
                    </div>
                    <div class="rest">
                        <label for="rest">বাকি</label>
                        <input type="radio" name="type" id="rest" value="{{\App\Models\Transaction::TYPE_DUE}}">
                    </div>
                </div>

                <button class="button save-btn" id="save-btn" type="submit">Submit</button>
            </form>
            <!-- send money end -->


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
    
            // Function to validate Bangladeshi phone numbers
            function validatePhoneNumber(phoneNumber) {
                const regex = /^01[3-9]\d{8}$/; // Regex for Bangladeshi phone numbers
                return regex.test(phoneNumber);
            }

            
    
            let defaultImage = "{{asset('SuperAdmin/assets/img/profile.png')}}";
        
            function resetData(html = ''){
                $('#user-image').attr('src', defaultImage);
                $('#user-name').html(html);
                $('#receiver_id').val('');
            }

            let total_balance = parseFloat("{{auth()->user()->total_balance}}");
    
            $(document).on('click','#save-btn', function(e){
                e.preventDefault();
                let send_amount = parseFloat($('#amount').val());
                console.log('total_balance',total_balance, send_amount)
                if(total_balance < send_amount || send_amount == 0) return toastr.error(@json('Your balance is not enough'));
                if($('#receiver_id').val() == '') return toastr.error(@json('Please select a verified user')) ;
                $('form').submit();
            })
            $(document).on('click', '#verify-btn', function () {
                let number = $('#search-number').val().trim(); // Get the input value and trim whitespace

                // Validate the phone number
                if (!validatePhoneNumber(number)) {
                    console.log("Invalid phone number");
                    alert("Please enter a valid Bangladeshi phone number.");
                    return; // Exit if the phone number is invalid
                }


                // Make an AJAX request to the server
                $.ajax({
                    url: '/super-admin/transaction-number-search/' + number,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function () {
                        // Show a loading spinner or message (optional)
                        resetData('Fetching data...');
                        // $('#user-name').html('Fetching data...');
                        // console.log("Fetching data...");
                    },
                    success: function (response) {
                        if(Object.keys(response).length !== 0){
                
                            let user_name = response.name + ' ( Role: ' + 
                            response.role.split('_') // Split the role by underscores
                                .map(word => word.charAt(0).toUpperCase() + word.slice(1)) // Capitalize each word
                                .join(' ')+" )" // Join the words back together
                            $('#user-image').attr('src', response.photo_url);
                            $('#user-name').html(user_name);
                            $('#receiver_id').val(response.id);
                        }else{
                            
                            resetData('Data Not Found...');
                        }
                    
                    },
                
                    error: function (xhr, status, error) {
                        // Handle errors
                        resetData('Something went wrong. Please try again.');
                        console.error("Failed to fetch data:", error);
                        // alert('Failed to fetch data. Please try again.');
                    }
                });
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