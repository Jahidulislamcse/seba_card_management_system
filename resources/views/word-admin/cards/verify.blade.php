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
                    <a href="Profile.html">
                        <img src="assets/img/profile.png" alt="profile icon">
                    </a>
                    <div class="profile-details">
                        <h5>MD Rahitul</h5>
                        <p>ID: 3045</p>
                        <p>Admin</p>
                    </div>
                </div>
                <div class="amount">
                    <button class="amount-btn">৳</button>
                    <p class="amounts">200</p>
                </div>
            </header>
            <!-- header end -->

            <div class="m-2">
                <form class="user-find-form" action="#">
                    <label for="id_no">আপনার আইডি নাম্বার লিখুন</label>
                    <div>
                        <input type="text" name="id_no" id="id_no" placeholder="AN1332">
                        <button class="button" type="submit">খুজুন</button>
                    </div>
                </form>
                <p class="sended-id">আপনার প্রদানকৃত আইডি: AN1332</p>
                <p class="user-result">অনুসন্ধানের ফলাফল: </p>

                <!-- user table -->
                <div class="user-table-area">
                    <table class="specific-user-table">
                        <tbody>
                            <tr>
                                <td class="serial_no">নাম:</td>
                                <td class="user-picture">মো: রাহিতুল ইসলাম রিমন</td>
                            </tr>
                            <tr>
                                <td class="user-picture">পিতা:</td>
                                <td class="user-number">মো: হামিদুল ইসলাম </td>
                            </tr>
                            <tr>
                                <td class="user-number">মাতা: </td>
                                <td class="user-date">মোছ: ----- খাতুন</td>
                            </tr>
                            <tr>
                                <td class="user-date">জন্ম তা‌রিখ:</td>
                                <td class="user-date">০২/২২/২০২৫</td>
                            </tr>
                            <tr>
                                <td class="user-date">আইডি নং:</td>
                                <td class="user-date">AN2331</td>
                            </tr>
                            <tr>
                                <td class="user-date">মোবাইল নং:</td>
                                <td class="user-date">০১৪০২৮৬০৬১৭</td>
                            </tr>
                            <tr>
                                <td class="user-date">পেশা:</td>
                                <td class="user-date">কৃষক</td>
                            </tr>
                            <tr>
                                <td class="user-date">জেলা:</td>
                                <td class="user-date">কুষ্টিয়া</td>
                            </tr>
                            <tr>
                                <td class="user-date">উপ‌জেলা:</td>
                                <td class="user-date">কুমারখালী</td>
                            </tr>
                            <tr>
                                <td class="user-date">কার্ডের মেয়াদ:</td>
                                <td class="user-date">০২/২২/২০২৮</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="user-profile-img">
                        <img src="assets/img/me.png" alt="profile image">
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
@endpush
