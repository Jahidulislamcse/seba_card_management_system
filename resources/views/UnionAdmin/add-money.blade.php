@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <div class="balance-details">
            <div>
                <p><b>নাম:</b> <span>মো: রাহিতুল ইসলাম রিমন</span></p>
                <p><b>আইডি নং:</b> <span>ANS21334</span></p>
            </div>
            <div class="balance">
                <p>Balance</p>
                <p>82.32 DT</p>
            </div>
        </div>
        <form class="amount-entry-form" action="#">
            <label for="amount">এমাউন্ট এন্ট্রি</label>
            <div>
                <input type="text" name="amount" id="amount" placeholder="60">
                <button class="button" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
