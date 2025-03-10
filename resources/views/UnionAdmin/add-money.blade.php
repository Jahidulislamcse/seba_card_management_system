@extends('UnionAdmin.layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="balance-details">
    <div>
        <p><b>নাম:</b> <span>{{ auth()->user()->name }}</span></p>
        <p><b>আইডি নং:</b> <span>{{ auth()->user()->id_no }}</span></p>
    </div>
    <div class="balance">
        <p>Balance</p>
        <p>{{ auth()->user()->total_balance }} BDT</p>
    </div>
</div>

<form class="amount-entry-form" action="{{ route('union.add-money.store') }}" method="POST">
    @csrf
    <label for="amount">এমাউন্ট এন্ট্রি</label>
    <div>
        <input type="text" name="amount" id="amount" placeholder="60" required>
        <button class="button" type="submit">Submit</button>
    </div>
</form>

@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
