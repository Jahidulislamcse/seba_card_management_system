@extends('SuperAdmin.layouts.app')

@section('content')
<!-- search area start -->
<form action="#" class="headline">
    <img src="{{ asset('SuperAdmin/assets/img/search-.png') }}" alt="search icon">
    <div class="img-icon">
        <i class="fa-solid fa-id-card"></i>
    </div>
    <input type="text" name="card" id="card" placeholder="কার্ড সার্চ করুন">
    <img class="search-go-img" src="{{ asset('SuperAdmin/assets/img/download.png') }}" alt="download icon">
</form>

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

<div class="headline mt-0">
    <img src="{{ asset('SuperAdmin/assets/img/notice.png') }}" alt="notice icon">
    <marquee class="notice-area" behavior="scroll" direction="left">নোটিশ বোর্ড</marquee>
    <img class="search-go-img" src="{{ asset('SuperAdmin/assets/img/download.png') }}" alt="">
</div>
<div class="all-cards">
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.transactions.create') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/cash out.png') }}" alt="cash out icon">
            </div>
        </a>
        <p>সেন্ড মা‌নি</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('cards.request') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/card.png') }}" alt="card icon">
            </div>
        </a>
        <p>কার্ড রেকু‌য়েস্ট </p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.rest-balance.index') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/account.png') }}" alt="account icon">
            </div>
        </a>
        <p>বা‌কি হিসাব</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.users.create') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/profile-.png') }}" alt="user icon">
            </div>
        </a>
        <p>ইউজার তৈরি</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('cards.create') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/card.png') }}" alt="card icon">
            </div>
        </a>
        <p>কার্ড এড করুন</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('cards.list') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/card.png') }}" alt="card icon">
            </div>
        </a>
        <p>কার্ড নাম্বার লিস্ট</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{route('super-admin.add-money')}}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/balance statement.png') }}" alt="balance statement icon">
            </div>
        </a>
        <p>এডমা‌নি</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.income-expense') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/income.png') }}" alt="income icon">
            </div>
        </a>
        <p>আয় ব‌্যায়</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.report.user') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/report.png') }}" alt="user report icon">
            </div>
        </a>
        <p>ইউজার রি‌পোর্ট</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.offer.create') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/offer.png') }}" alt="offer icon">
            </div>
        </a>
        <p>অফার সে‌টিং</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.notice.create') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/notice.png') }}" alt="notice icon">
            </div>
        </a>
        <p>নো‌টিশ সে‌টিং</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.report.summery') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/report.png') }}" alt="user report icon">
            </div>
        </a>
        <p>একনজ‌রে রি‌পোর্ট</p>
    </div>
    <div class="cards">
        <a class="card-links" href="{{ route('super-admin.user.manage') }}">
            <div>
                <img src="{{ asset('SuperAdmin/assets/img/profile-.png') }}" alt="user icon">
            </div>
        </a>
        <p>ইউজার ম্যানেজ</p>
    </div>
</div>

</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/index.css') }}">
@endpush