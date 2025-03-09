@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <div>
            <form class="send-money-form" form action="#">
                <label>কত তা‌রিখ হতে কত তা‌রিখ পর্যন্ত ‌পাঠানো হয়েছে</label>
                <input placeholder="Date to date" type="text">
                <button type="button" class="button save-btn">Submit</button>
            </form>
            <!-- user table -->
            <div class="user-table">
                <table class="table send-money-report">
                    <thead>
                        <tr>
                            <th>ক্রমিক নং</th>
                            <th>তা‌রিখ</th>
                            <th>এড‌মিন নাম</th>
                            <th>মোবাইল নং</th>
                            <th>টাকার প‌রিমান</th>
                            <th>লেন‌দেন ধরন</th>
                            <th>স্টেটাস </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="center-item">০১</div>
                            </td>
                            <td>
                                <div class="center-item">০১/২০/২০২৫</div>
                            </td>
                            <td>
                                <div class="center-item">রিমন ইসলাম</div>
                            </td>
                            <td>
                                <div class="center-item">০১৯৩৪৬৫৭৬৮</div>
                            </td>
                            <td>
                                <div class="center-item">৫১,০০</div>
                            </td>
                            <td>
                                <div class="center-item">বিকাশ</div>
                            </td>
                            <td>
                                <div class="status-btn">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="day"
                                            checked>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
