@extends('WardAdmin.layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Header.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/CardVerify.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Card Verify | Sheba Card</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <!-- header start -->
            <header>
                <div class="header-profile">
                    <a href="">
                        <img src="{{ asset('assets/img/profile.png') }}" alt="profile icon">
                    </a>
                    <div class="profile-details">
                        <h5>{{ auth()->user()->name }}</h5>
                        <p>ID: {{ auth()->user()->id }}</p>
                        <p>{{ ucfirst(auth()->user()->role) }}</p>
                    </div>
                </div>

                <div class="amount">
                    <button class="amount-btn">৳</button>
                    <p class="amounts">200</p>
                </div>
            </header>
            <!-- header end -->

            <div class="m-2">
                <form class="user-find-form" id="search-form">
                    <label for="card_number">আপনার কার্ড নাম্বার লিখুন</label>
                    <div>
                        <input type="text" name="card_number" id="card_number" placeholder="354656" required>
                        <button class="button" type="submit">খুজুন</button>
                    </div>
                </form>
                <p id="error-message" class="text-danger"></p>

                <!-- user table -->
                <!-- Customer Details Section -->
                <div id="customer-details" style="display: none;">
                    <p class="sended-id">অনুসন্ধানের ফলাফল:</p>
                    <div class="user-table-area">
                        <table class="specific-user-table">
                            <tbody>
                                <tr>
                                    <td class="serial_no">নাম:</td>
                                    <td id="customer-name"></td>
                                </tr>
                                <tr>
                                    <td class="user-picture">পিতা:</td>
                                    <td id="customer-father"></td>
                                </tr>
                                <tr>
                                    <td class="user-number">মাতা:</td>
                                    <td id="customer-mother"></td>
                                </tr>
                                <tr>
                                    <td class="user-date">জন্ম তারিখ:</td>
                                    <td id="customer-dob"></td>
                                </tr>
                                <tr>
                                    <td class="user-date">আইডি নং:</td>
                                    <td id="customer-id"></td>
                                </tr>
                                <tr>
                                    <td class="user-date">মোবাইল নং:</td>
                                    <td id="customer-phone"></td>
                                </tr>
                                <tr>
                                    <td class="user-date">পেশা:</td>
                                    <td id="customer-occupation"></td>
                                </tr>
                                <tr>
                                    <td class="user-date">জেলা:</td>
                                    <td id="customer-district"></td>
                                </tr>
                                <tr>
                                    <td class="user-date">উপজেলা:</td>
                                    <td id="customer-upazila"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="user-profile-img">
                            <img id="customer-avatar" src="assets/img/default.png" alt="profile image">
                        </div>
                    </div>
                </div>

                <table class="specific-user-table family-table">
                    <tbody>
                        <p class="family-info">পরিবারের অন্যান্য সদস্য তথ্য:</p>
                        <tr>
                            <td class="serial_no">ক্রমিক নং:</td>
                            <td class="user-picture">০১</td>
                        </tr>
                        <tr>
                            <td class="serial_no">নাম:</td>
                            <td class="user-picture">মো: হামিদুল ইসলাম</td>
                        </tr>
                        <tr>
                            <td class="user-picture">জেন্ডার:</td>
                            <td class="user-number">মেল</td>
                        </tr>
                        <tr>
                            <td class="user-number">বয়স: </td>
                            <td class="user-date">৫০ বছর</td>
                        </tr>
                        <tr>
                            <td class="user-date">মোবাইল নং:</td>
                            <td class="user-date">০১৯১৭১১৯৮০২</td>
                        </tr>
                    </tbody>
                </table>
                <!-- user table -->
            </div>



            <!-- footer start -->
            <div class="fixed-bottom">
                <footer>
                    <a href="index.html">
                        <img src="assets/img/home.png" alt="home icon">
                        <p>হোম</p>
                    </a>
                    <a href="Offer.html">
                        <img src="assets/img/offer.png" alt="offer icon">
                        <p>অফার</p>
                    </a>
                    <a href="Notice.html">
                        <img src="assets/img/notice.png" alt="notice icon">
                        <p>নোটিশ</p>
                    </a>
                    <a href="#">
                        <img src="assets/img/logout.png" alt="logout icon">
                        <p>লগআউট</p>
                    </a>
                    <a href="HelpLine.html">
                        <img src="assets/img/helpline.png" alt=" icon">
                        <p>হেল্প-লাইন</p>
                    </a>
                </footer>
            </div>
            <!-- footer end -->
        </div>
    </div>

    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/696233e01c.js" crossorigin="anonymous"></script>
</body>

</html>

@section('content')


@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/CardVerify.css') }}">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-form').submit(function(e) {
            e.preventDefault(); 

            let cardNumber = $('#card_number').val();
            let url = "{{ route('ward_admin.cards.search') }}";

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    card_number: cardNumber
                },
                success: function(response) {
                    // Hide error message
                    $('#error-message').text('');

                    // Show customer details
                    $('#customer-details').show();
                    $('#customer-name').text(response.name);
                    $('#customer-father').text(response.father_name);
                    $('#customer-mother').text(response.mother_name);
                    $('#customer-dob').text(response.date_of_birth);
                    $('#customer-id').text(response.id);
                    $('#customer-phone').text(response.phone);
                    $('#customer-occupation').text(response.occupation);
                    $('#customer-district').text(response.district);
                    $('#customer-upazila').text(response.upazila);
                    $('#customer-avatar').attr('src', response.avatar);
                },
                error: function(xhr) {
                    if (xhr.status === 404) {
                        $('#customer-details').hide();
                        $('#error-message').text(xhr.responseJSON.error);
                    }
                }
            });
        });
    });
</script>

@endpush
