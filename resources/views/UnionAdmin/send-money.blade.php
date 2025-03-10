@extends('UnionAdmin.layouts.app')

@section('content')
    <div>
        <!-- send money start -->
        <form class="send-money" action="#">
            <label class="title" for="number">সেন্ড মানি</label>
            <div class="sending-number">
                <input type="number" name="search-number" class="send-money-inp" id="search-number" placeholder="019.."
                    required>
                <div class="abs-data">
                    <button type="button" class="verify-btn">
                        <!-- default text is verify -->
                        <!-- If the user verify his number then the
                                    the verify text change verify to verified and
                                    the check tag will add -->
                        verified
                        <i class="fa-solid fa-check"></i>
                    </button>
                    <img class="user-image" src="{{ asset('UnionAdmin/assets/img/profile.png') }}" alt="">
                </div>
            </div>
            <p class="user-name">MD. Rahitul </p>
            <input class="send-money-inp" type="text" name="amount" id="amount" placeholder="Amount" required>
            <div class="cashRest">
                <div class="cash">
                    <label for="cash">ক্যাশ</label>
                    <input type="radio" name="cashRest" id="cash" checked>
                </div>
                <div class="rest">
                    <label for="rest">বাকি</label>
                    <input type="radio" name="cashRest" id="rest">
                </div>
            </div>

            <button class="button save-btn" type="submit">Submit</button>
        </form>
        <!-- send money end -->
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
