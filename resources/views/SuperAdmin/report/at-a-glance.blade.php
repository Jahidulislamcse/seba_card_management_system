@extends('SuperAdmin.layouts.app')

@section('content')
<div class="py-2">
    <div class="">

        <div class="tab-btns">
            <button type="button" class="active-btn buttons">ওর্য়াড এডমিন</button>
            <button type="button" class="buttons">ইউনিয়ন এডমিন</button>
            <button type="button" class="buttons">উপজেলা এডমিন</button>
            <button type="button" class="buttons">জেলা এডমিন</button>
        </div>

        <div class="contents active_section">
            <div class="admin-area">
                <div class="admin-details">
                    <h4>
                        <b>নাম:</b>
                        <span>মো: রিমন ইসলাম</span>
                    </h4>
                    <p>
                        <b>ডেজিগনেশন:</b>
                        <span>ওয়ার্ড এডমিন</span>
                    </p>
                    <p>
                        <b>জয়িন ডেট:</b>
                        <span>02/20/2023</span>
                    </p>
                    <p>
                        <b>জেলা:</b>
                        <span>কুষ্টিয়া</span>
                    </p>
                    <p>
                        <b>উপজেলা:</b>
                        <span>কুমারখালী</span>
                    </p>
                    <p>
                        <b>ইউনিয়ন:</b>
                        <span>যদুবয়রা</span>
                    </p>
                </div>
                <div class="search-admin">
                    <input type="text" name="search" id="search" placeholder="Search Admin">
                    <button type="submit" class="search-button">Search</button>
                </div>
            </div>
            <!-- table start -->
            <div class="user-table mt-3">
                <table class="table report-table  simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>তা‌রিখ</th>
                            <th>কার্ড এড</th>
                            <th>এক্টিভ</th>
                            <th>কার্ড স্টক</th>
                            <th>ব্যালেন্স স্টক</th>
                            <th>ব‌্যা‌লেন্স এড</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>23/02/2025</td>
                            <td>5</td>
                            <td>৫</td>
                            <td>৩৫০</td>
                            <td>2000</td>
                            <td>50,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- table start -->
        </div>
        <!-- ওর্য়াড এডমিন end -->

        <!-- ইউনিয়ন এডমিন start -->
        <div class="contents">
            <div class="admin-area">
                <div class="admin-details">
                    <h4>
                        <b>নাম:</b>
                        <span>মো: রিমন ইসলাম</span>
                    </h4>
                    <p>
                        <b>ডেজিগনেশন:</b>
                        <span>ইউনিয়ন এডমিন</span>
                    </p>
                    <p>
                        <b>জয়িন ডেট:</b>
                        <span>02/20/2023</span>
                    </p>
                    <p>
                        <b>জেলা:</b>
                        <span>কুষ্টিয়া</span>
                    </p>
                    <p>
                        <b>উপজেলা:</b>
                        <span>কুমারখালী</span>
                    </p>
                    <p>
                        <b>ইউনিয়ন:</b>
                        <span>যদুবয়রা</span>
                    </p>
                </div>
                <div class="search-admin">
                    <input type="text" name="search" id="search" placeholder="Search Admin">
                    <button type="submit" class="search-button">Search</button>
                </div>
            </div>
            <!-- tab btn start -->
            <div class="tab-btns">
                <button type="button" class="active-btn sub_btn1">সামা‌রি</button>
                <button type="button" class="sub_btn1">ব‌্যা‌লেন্স স্টক</button>
                <button type="button" class="sub_btn1">কার্ড স্টক</button>
            </div>

            <!-- সামা‌রি  -->
            <div class="user-table sub_content1 active_content1">
                <table class="table summery-table report-table simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>ওয়ার্ড নং</th>
                            <th>ইউজার নাম</th>
                            <th>ইউজার আইডি</th>
                            <th>মোট কার্ড এড</th>
                            <th>অদ‌্য কার্ড এক্টিভ</th>
                            <th>মোট কার্ড এক্টিভ</th>
                            <th>অদ‌্য এড ব‌্যা‌লেন্স</th>
                            <th>মোট এড ব‌্যা‌লেন্স</th>
                            <th>বর্তমান ব‌্যা‌লেন্স</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>76</td>
                            <td>রিমন</td>
                            <td>৫৪৬৪</td>
                            <td>৩৫০</td>
                            <td>2000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ব‌্যা‌লেন্স স্টক -->
            <div class="user-table sub_content1">
                <table class="table report-table  simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>ওয়ার্ড নং</th>
                            <th>আইডি নং</th>
                            <th>ইউজার নাম</th>
                            <th>বর্তমান ব‌্যা‌লেন্স </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- কার্ড স্টক -->
            <div class="user-table sub_content1">
                <table class="table report-table  simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>ওয়ার্ড নং</th>
                            <th>আইডি নং</th>
                            <th>ইউজার নাম</th>
                            <th>ববর্তমান কার্ড স্টক</th>
                            <th>একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>23/02/2025</td>
                            <td>5</td>
                            <td>৫</td>
                            <td>৩৫০</td>
                            <td>
                                <a class="approved-btn" href="CardNumberList.html">View Card List</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ইউনিয়ন এডমিন end -->

        <!-- উপজেলা এডমিন start -->
        <div class="contents">
            <!-- tab btn start -->
            <div class="tab-btns">
                <button type="button" class="active-btn sub_btn2">সামা‌রি</button>
                <button type="button" class="sub_btn2">ব‌্যা‌লেন্স স্টক</button>
                <button type="button" class="sub_btn2">কার্ড স্টক</button>
            </div>

            <!-- সামা‌রি  -->
            <div class="user-table sub_content2 active_content2">
                <table class="table summery-table report-table simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>মোট ইউজার</th>
                            <th>ইউনিয়ন নাম</th>
                            <th>মোট কার্ড এড</th>
                            <th>অদ‌্য কার্ড এক্টিভ</th>
                            <th>মোট কার্ড এক্টিভ</th>
                            <th>অদ‌্য এড ব‌্যা‌লেন্স</th>
                            <th>মোট এড ব‌্যা‌লেন্স</th>
                            <th>বর্তমান ব‌্যা‌লেন্স</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>76</td>
                            <td>রিমন</td>
                            <td>৫৪৬৪</td>
                            <td>৩৫০</td>
                            <td>2000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ব‌্যা‌লেন্স স্টক -->
            <div class="user-table sub_content2">
                <table class="table report-table  simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>মোট ইউজার</th>
                            <th>ইউনিয়ন নাম</th>
                            <th>অদ‌্য এড ব‌্যা‌লেন্স</th>
                            <th>বর্তমান ব‌্যা‌লেন্স </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- কার্ড স্টক -->
            <div class="user-table sub_content2">
                <table class="table report-table  simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>মোট ইউজার</th>
                            <th>ইউনিয়ন নাম</th>
                            <th>অদ‌্য কার্ড এক্টিভ</th>
                            <th>বর্তমান কার্ড ব‌্যা‌লেন্স </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>23/02/2025</td>
                            <td>5</td>
                            <td>৫</td>
                            <td>৩৫০</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- উপজেলা এডমিন end -->

        <!-- জেলা এডমিন start -->
        <div class="contents">
            <!-- tab btn start -->
            <div class="tab-btns">
                <button type="button" class="active-btn sub_btn3">সামা‌রি</button>
                <button type="button" class="sub_btn3">ব‌্যা‌লেন্স স্টক</button>
                <button type="button" class="sub_btn3">কার্ড স্টক</button>
            </div>

            <!-- সামা‌রি  -->
            <div class="user-table sub_content3 active_content3">
                <table class="table summery-table report-table simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>মোট ইউনিয়ন</th>
                            <th>মোট ইউজার</th>
                            <th>অদ‌্য কার্ড এড</th>
                            <th>মোট কার্ড এড</th>
                            <th>অদ‌্য কার্ড এক্টিভ</th>
                            <th>মোট কার্ড এক্টিভ</th>
                            <th>অদ‌্য এড ব‌্যা‌লেন্স</th>
                            <th>মোট এড ব‌্যা‌লেন্স</th>
                            <th>বর্তমান ব‌্যা‌লেন্স</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>76</td>
                            <td>রিমন</td>
                            <td>৫৪৬৪</td>
                            <td>৩৫০</td>
                            <td>2000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                            <td>50,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ব‌্যা‌লেন্স স্টক -->
            <div class="user-table sub_content3">
                <table class="table report-table  simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>মোট ইউজার</th>
                            <th>মোট ইউনিয়ন</th>
                            <th>উপজেলার নাম</th>
                            <th>বর্তমান ব‌্যা‌লেন্স </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>35</td>
                            <td>565757</td>
                            <td>রিমন</td>
                            <td>৩৫০</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- কার্ড স্টক -->
            <div class="user-table sub_content3">
                <table class="table report-table  simple-table">
                    <thead>
                        <tr>
                            <th>ক্র: নং</th>
                            <th>মোট ইউজার</th>
                            <th>মোট ইউনিয়ন</th>
                            <th>উপজেলার নাম</th>
                            <th>বর্তমান কার্ড স্টক</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>23/02/2025</td>
                            <td>5</td>
                            <td>৫</td>
                            <td>৩৫০</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- জেলা এডমিন end -->


    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Report.css') }}">
@endpush
