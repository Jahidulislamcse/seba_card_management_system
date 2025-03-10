@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <form class="send-money-form" form action="#">
            <label>তা‌রিখ সার্চ</label>
            <input placeholder="Date search" type="text">
            <button type="button" class="button save-btn">Submit</button>
        </form>

        <!-- table start -->
        <div class="user-table">
            <table class="ward-admin-table table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>ওয়ার্ড নং</th>
                        <th>কর্মীর নাম</th>
                        <th>ফোন নং</th>
                        <th>অদ‌্য কার্ড এক্টিভ</th>
                        <th>এপর্যন্ত এক্টিভ</th>
                        <th>অদ‌্য কার্ড এড</th>
                        <th>এপর্যন্ত এড</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="center-item">০১</div>
                        </td>
                        <td>
                            <div class="center-item">০১</div>
                        </td>
                        <td>
                            <div class="center-item">রিমন ইসলাম</div>
                        </td>
                        <td>
                            <div class="center-item">০১9765r65</div>
                        </td>
                        <td>
                            <div class="center-item">০১</div>
                        </td>
                        <td>
                            <div class="center-item">০১</div>
                        </td>
                        <td>
                            <div class="center-item">০১</div>
                        </td>
                        <td>
                            <div class="center-item">০১</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- table end -->
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
