@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <!-- user table start -->
        <h6 class="all-user">মোট - ৮৭৯০ জন</h6>
        <form action="#" class="search-user-area">
            <input type="text" name="search-user" id="search-user" placeholder="mobile number/id">
            <button type="submit" class="button">Submit</button>
        </form>
        <div class="user-table">
            <table class="all-user-table table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>ছবি</th>
                        <th>নাম</th>
                        <th>ওয়ার্ড নং</th>
                        <th>মোবাইল নং</th>
                        <th>যোগদানের তা‌রিখ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="serial_no">০১</td>
                        <td class="user-picture">
                            <img src="{{ asset('UnionAdmin/assets/img/men 1.jpg') }}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">মো: রিমন শেখ</td>
                        <td class="user-number">5</td>
                        <td class="user-number">০১৪০২৮৬০৬১৭</td>
                        <td class="user-date">০২/২২/২০২৫</td>
                    </tr>
                    <tr>
                        <td class="serial_no">০১</td>
                        <td class="user-picture">
                            <img src="{{ asset('UnionAdmin/assets/img/men 1.jpg') }}" alt="Profile Picture">
                        </td>
                        <td class="user-name-id">মো: রিমন শেখ</td>
                        <td class="user-number">5</td>
                        <td class="user-number">০১৪০২৮৬০৬১৭</td>
                        <td class="user-date">০২/২২/২০২৫</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- user table end -->
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
