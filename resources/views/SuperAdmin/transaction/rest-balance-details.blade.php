@extends('SuperAdmin.layouts.app')

@section('content')

<h6 class="all-user">বা‌কি হিসাব বিস্তারিত (মোট: {{$restBalance->due_payments->count()}})</h6>
<!-- user table -->
<div class="user-table" style="margin: 10px 0;">
    <table class="all-user-table table">
        <thead>
            <tr>
                <th>ক্রমিক নং</th>
                <th>পরিমাণ</th>
                <th>তারিখ সময়</th>
                <th>নোট</th>
                
            </tr>
        </thead>
        <tbody>
            @if($restBalance->due_payments->count() > 0)
                @foreach ($restBalance->due_payments->sortByDesc('id') as $due_payment)
                    <tr>
                        <td class="serial_no">{{$loop->iteration}}</td>
                        <td class="rest-balance">BDT {{$due_payment->amount}}</td>
                        <td class="rest-balance">{{$due_payment->datetime_format}}</td>
                        <td class="rest-balance">{{$due_payment->notes}}</td>
                    </tr>
                @endforeach
            @endif
            

        </tbody>
    </table>
</div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Table.css')}}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/RestBalance.css')}}">
@endpush