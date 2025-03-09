@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <form action="#" class="cashout-form">
            <p class="select">সিলেক্ট ব্যাংকিং</p>
            <div class="banking-select">
                <div>
                    <label for="banking">ব্যাংকিং</label>
                    <input type="radio" name="1" id="banking">
                </div>
                <div>
                    <label for="M_banking">মোবাইল ব্যাংকিং</label>
                    <input type="radio" name="1" id="M_banking">
                </div>
            </div>
            <label for="receive-no">রিসিভ নাম্বার</label>
            <input type="number" name="receive-no" id="receive-no" placeholder="019.../2435436">

            <label for="taka">টাকা পরিমান</label>
            <input type="number" name="taka" id="taka" placeholder="টাকা পরিমান">

            <p class="balance-avail">Available Balance: <span>5,400</span></p>

            <button type="submit" class="button save-btn">সাবমিট</button>
        </form>
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
