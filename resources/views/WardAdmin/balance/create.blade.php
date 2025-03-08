@extends('WardAdmin.layouts.app')

@section('content')
    <div>
        <div class="balance-details">
            <div>
                <p><b>নাম:</b> <span>{{ auth()->user()->name }}</span></p>
                <p><b>আইডি নং:</b> <span>{{ auth()->user()->id_no }}</span></p>
            </div>
            <div class="balance">
                <p>Balance</p>
                <p>{{ auth()->user()->totalBalance() }} DT</p>
            </div>
        </div>
        <form class="p-4 rounded shadow-sm bg-white" action="{{ route('ward_admin.balance.store') }}" method="POST"
            style="max-width: 400px; margin: auto;">
            @csrf

            <div class="form-group mb-3">
                <label for="amount" class="font-weight-bold mb-2">এমাউন্ট এন্ট্রি</label>
                <input type="text" name="amount" id="amount" class="form-control rounded p-2"
                    placeholder="Enter Amount" required>
            </div>

            <div class="form-group mb-3">
                <label for="transaction_id" class="font-weight-bold mb-2">ট্রান্সজেকশন আইডি</label>
                <input type="text" name="transaction_id" id="transaction_id" class="form-control rounded p-2"
                    placeholder="Enter Transaction ID" required>
            </div>

            <div class="form-group mb-3">
                <label for="payment_method" class="font-weight-bold mb-2">পেমেন্ট পদ্ধতি</label>
                <select name="payment_method" id="payment_method" class="form-control rounded p-2" required>
                    <option value="" disabled selected>Choose Payment Method</option>
                    <option value="bkash">Bkash</option>
                    <option value="rocket">Rocket</option>
                    <option value="nagad">Nagad</option>
                </select>
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-sm btn-primary btn-lg w-100 rounded p-2" type="submit">Submit</button>
            </div>
        </form>



    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/NewMember.css') }}">
@endpush
@push('scripts')
@endpush
