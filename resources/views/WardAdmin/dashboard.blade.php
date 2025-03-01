@extends('WardAdmin.layouts.app')

@section('content')
    <!-- search area start -->
    <form action="#" class="headline">
        <img src="{{ asset('assets/img/search-.png') }}" alt="search icon">
        <div class="img-icon">
            <i class="fa-solid fa-id-card"></i>
        </div>
        <input type="text" name="card" id="card" placeholder="কার্ড সার্চ করুন">
        <img class="search-go-img" src="{{ asset('assets/img/download.png') }}" alt="download icon">
    </form>
    <!-- search area end -->

    <!-- slider area start -->
    <div class="swiper FeedBackSwiper">
        <div class="swiper-arrow">
            <div class="swiper-btn-prev">
                <img src="{{ asset('assets/img/arrow-left.png') }}" alt="Admission care arrow icon">
            </div>
            <div class="swiper-btn-next">
                <img src="{{ asset('assets/img/arrow-right.png') }}" alt="Admission care arrow icon">
            </div>
        </div>
        <div class="swiper-wrapper">
            <div class="swiper-slide FeedBack_slide">
                <img src="{{ asset('assets/img/slider 1.jpg') }}" alt="slider image">
            </div>
            <div class="swiper-slide FeedBack_slide">
                <img src="{{ asset('assets/img/slider 2.jpg') }}" alt="slider image">
            </div>
            <div class="swiper-slide FeedBack_slide">
                <img src="{{ asset('assets/img/slider 3.jpg') }}" alt="slider image">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- slider area end -->

    <!-- card-menu start -->
    <div class="headline mt-0">
        <img src="{{ asset('assets/img/notice.png') }}" alt="notice icon">
        <marquee class="notice-area" behavior="scroll" direction="left">নোটিশ বোর্ড</marquee>
        <img class="search-go-img" src="{{ asset('assets/img/download.png') }}" alt="">
    </div>
    <!-- balance add & add card alada page hobe -->
    <div class="all-cards">
        <div class="cards">
            <a class="card-links" href="{{ route('ward_admin.cards.create') }}">
                <div>
                    <img src="{{ asset('assets/img/add card.png') }}" alt="add card icon">
                </div>
            </a>
            <p>এড কার্ড</p>
        </div>
        <div class="cards">
            <a class="card-links" href="{{ route('ward.new-members.create') }}">
                <div>
                    <img src="{{ asset('assets/img/new member.png') }}" alt="new member icon">
                </div>
            </a>
            <p>নতুন সদস‌্য</p>
        </div>
        <div class="cards">
            <a class="card-links" href="{{ route('ward.new-members.index') }}">
                <div>
                    <img src="{{ asset('assets/img/member list.png') }}" alt="member list icon">
                </div>
            </a>
            <p>সদস‌্য তা‌লিকা</p>
        </div>
        <div class="cards">
            <a class="card-links" href="CardVerify.html">
                <div>
                    <img src="{{ asset('assets/img/card.png') }}" alt="card icon">
                </div>
            </a>
            <p>কার্ড ভে‌রিফাই</p>
        </div>
        <div class="cards">
            <a class="card-links" href="AddBalance.html">
                <div>
                    <img src="{{ asset('assets/img/add balanced.png') }}" alt="cart icon">
                </div>
            </a>
            <p>ব‌্যা‌লেন্স এড</p>
        </div>
        <div class="cards">
            <a class="card-links" href="BalanceStatement.html">
                <div>
                    <img src="{{ asset('assets/img/balance statement.png') }}" alt="balance statement icon">
                </div>
            </a>
            <p>ব‌্যা‌লেন্স স্টেট‌মেন্ট</p>
        </div>
        <div class="cards">
            <a class="card-links" href="{{ route('ward_admin.cards.list') }}">
                <div>
                    <img src="{{ asset('assets/img/card list.png') }}" alt="card icon">
                </div>
            </a>
            <p>মাই কার্ড তা‌লিকা</p>
        </div>
        <div class="cards">
            <a class="card-links" href="Report.html">
                <div>
                    <img src="{{ asset('assets/img/report.png') }}" alt="report icon">
                </div>
            </a>
            <p>রি‌পোর্ট</p>
        </div>
        <div class="cards">
            <a class="card-links" href="MobileRecharge.html">
                <div>
                    <img src="{{ asset('assets/img/mobile recherge.png') }}" alt="mobile recherge icon">
                </div>
            </a>
            <p>মোবাইল রিচার্জ</p>
        </div>
        <div class="cards">
            <a class="card-links" href="CashOut.html">
                <div>
                    <img src="{{ asset('assets/img/cash out.png') }}" alt="cash out icon">
                </div>
            </a>
            <p>ক‌্যাশ আউট</p>
        </div>
    </div>
    <!-- card-menu end -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endpush
