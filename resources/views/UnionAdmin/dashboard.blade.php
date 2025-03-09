@extends('UnionAdmin.layouts.app')

@section('content')
    <!-- search area start -->
    <form action="#" class="headline">
        <img src="{{ asset('UnionAdmin/assets/img/search-.png') }}" alt="search icon">
        <div class="img-icon">
            <i class="fa-solid fa-id-card"></i>
        </div>
        <input type="text" name="card" id="card" placeholder="কার্ড সার্চ করুন">
        <img class="search-go-img" src="{{ asset('UnionAdmin/assets/img/download.png') }}" alt="download icon">
    </form>
    <!-- search area end -->


    <!-- slider area start -->
    <div class="swiper FeedBackSwiper">
        <div class="swiper-arrow">
            <div class="swiper-btn-prev">
                <img src="{{ asset('UnionAdmin/assets/img/arrow-left.png') }}" alt="Admission care arrow icon">
            </div>
            <div class="swiper-btn-next">
                <img src="{{ asset('UnionAdmin/assets/img/arrow-right.png') }}" alt="Admission care arrow icon">
            </div>
        </div>
        <div class="swiper-wrapper">
            <div class="swiper-slide FeedBack_slide">
                <img src="{{ asset('UnionAdmin/assets/img/slider 1.jpg') }}" alt="slider image">
            </div>
            <div class="swiper-slide FeedBack_slide">
                <img src="{{ asset('UnionAdmin/assets/img/slider 2.jpg') }}" alt="slider image">
            </div>
            <div class="swiper-slide FeedBack_slide">
                <img src="{{ asset('UnionAdmin/assets/img/slider 3.jpg') }}" alt="slider image">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- slider area end -->


    <!-- all report start  -->
    <div class="all-report">
        <div class="stock-balance">
            <div>
                <h4>স্টক ব‌্যা‌লেন্স</h4>
                <p>200 BDT</p>
            </div>
            <div class="day">
                <label class="form-check-label" for="day">দিন</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                </div>
            </div>
        </div>
        <div class="card-details">
            <div>
                <h4>এক্টিভ এড‌মিন </h4>
                <p>20</p>
            </div>
            <div>
                <h4>এক্টিভ কার্ড </h4>
                <p>200 BDT</p>
            </div>
            <div class="card-stock">
                <h4>স্টক কার্ড </h4>
                <p>20</p>
            </div>
        </div>
    </div>
    <!-- all report end  -->

    <!-- card-menu start -->
    <div class="headline mt-0">
        <img src="{{ asset('UnionAdmin/assets/img/notice.png') }}" alt="notice icon">
        <marquee class="notice-area" behavior="scroll" direction="left">নোটিশ বোর্ড</marquee>
        <img class="search-go-img" src="{{ asset('UnionAdmin/assets/img/download.png') }}" alt="">
    </div>
    <!-- balance add & add card alada page hobe -->
    <div class="all-cards">
        <div class="cards">
            <a class="card-links" href="AddMoney.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/cash out.png') }}" alt="send-money icon">
                </div>
            </a>
            <p>এডমা‌নি</p>
        </div>
        <div class="cards">
            <a class="card-links" href="SendMoney.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/send-money.png') }}" alt="send-money icon">
                </div>
            </a>
            <p>সেন্ড মা‌নি</p>
        </div>
        <div class="cards">
            <a class="card-links" href="SendMoneyReport.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/money report.png') }}" alt="user report icon">
                </div>
            </a>
            <p>সেন্ড মা‌নি রি‌পোর্ট</p>
        </div>
        <div class="cards">
            <a class="card-links" href="Cashout.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/cash out.png') }}" alt="cash out icon">
                </div>
            </a>
            <p>ক্যাশ আউট</p>
        </div>
        <div class="cards">
            <a class="card-links" href="SummeryReport.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/report.png') }}" alt="user report icon">
                </div>
            </a>
            <p>সামারি রি‌পোর্ট</p>
        </div>
        <div class="cards">
            <a class="card-links" href="UserManage.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/user.png') }}" alt="user icon">
                </div>
            </a>
            <p>ইউজার ম্যানেজ</p>
        </div>
        <div class="cards">
            <a class="card-links" href="WardAdminReport.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/admin report.png') }}" alt="user report icon">
                </div>
            </a>
            <p>ওয়ার্ড এড‌মিন রি‌পোর্ট</p>
        </div>
        <div class="cards">
            <a class="card-links" href="MyTeamList.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/team.png') }}" alt="team icon">
                </div>
            </a>
            <p>মাই টিম লিস্ট</p>
        </div>
        <div class="cards">
            <a class="card-links" href="Profile.html">
                <div>
                    <img src="{{ asset('UnionAdmin/assets/img/profile-.png') }}" alt="profile icon">
                </div>
            </a>
            <p>মাই প্রোফাইল</p>
        </div>
    </div>
    <!-- card-menu end -->
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
