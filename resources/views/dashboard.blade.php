@extends('word-admin.layouts.app')

@section('content')

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
@endsection
