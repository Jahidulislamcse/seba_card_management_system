@extends('SuperAdmin.layouts.app')

@section('content')

    <!-- user table -->
    <div style="width: 85%;margin: 6% auto;">
        <h5>অর্থ সংগ্রহ করা</h5>
        <form action="{{ route('super-admin.rest-balance.collect.store', $restBalance->id) }}" method="POST">
            @csrf 
            <input type="hidden" name="transaction_id" value="{{ $restBalance->id }}" />
            
            <input type="number" step="any" name="amount" value="{{ $restBalance->remaining_due }}" 
                   min="1" max="{{ $restBalance->remaining_due }}" placeholder="Enter Amount" required />

            <input type="text" name="notes" placeholder="Notes (Optional)" />

            <input type="datetime-local" name="datetime" required />

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Table.css')}}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/RestBalance.css')}}">
    <style>
        

        h5 {
            margin-bottom: 15px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
@endpush