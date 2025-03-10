@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <p class="m-0 p-2 fw-bold">ইউজার ম‌্যা‌নেজ </p>
        <!-- user table -->
        <div class="user-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>ওয়ার্ড নং</th>
                        <th>ইউজার নাম</th>
                        <th>মোবাইল নং</th>
                        <th>জ‌য়েন তা‌রিখ</th>
                        <th>স্টেটাস </th>
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
                            <div class="center-item">০১৯৩৪৬৫৭৬৮</div>
                        </td>
                        <td>
                            <div class="center-item">০১/২০/২০২৫</div>
                        </td>
                        <td>
                            <div class="status-btn">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="day" checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
