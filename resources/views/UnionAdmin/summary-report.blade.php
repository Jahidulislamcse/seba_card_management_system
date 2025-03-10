@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <!-- table start -->
        <h6 class="all-user">মোট - ৮৭৯০ জন</h6>
        <div class="user-table">
            <table class="all-user-table table">
                <thead>
                    <tr>
                        <th>রিসিভ কার্ড</th>
                        <th>মোট কার্ড</th>
                        <th>এক্টিভ কার্ড</th>
                        <th>স্টক কার্ড</th>

                        <th>রিসিভ ব্যালেন্স</th>
                        <th>আজকের ব্যালেন্স</th>
                        <th>মোট ব্যালেন্স</th>
                        <th>স্টক ব্যালেন্স</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>১৫</td>
                        <td>৯০</td>
                        <td>০৫</td>
                        <td>০৯</td>
                        <td>৫০,০০০</td>
                        <td>১০,০০০</td>
                        <td>৮০,০০০</td>
                        <td>২১,০০০</td>
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
