@extends('SuperAdmin.layouts.app')

@section('content')

    <!-- send money start -->
    <form class="send-money" action="{{route('super-admin.transactions.store')}}" method="POST" data-parsley-validate id="send-money-form">
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
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/SendMoney.css')}}">
@endpush
@push('scripts')
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
            // console.log('total_balance',total_balance, send_amount)
            if(total_balance < send_amount || send_amount == 0) return toastr.error(@json('Your balance is not enough'));
            if($('#receiver_id').val() == '') return toastr.error(@json('Please select a verified user')) ;
            $('#send-money-form').submit();
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
                        $('#user-image').attr('src', response.photo_url != null ? response.photo_url : defaultImage);
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
@endpush