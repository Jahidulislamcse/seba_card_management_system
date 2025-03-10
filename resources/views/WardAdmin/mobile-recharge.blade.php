@extends('WardAdmin.layouts.app')

@section('content')
    <div>
        <!-- mobile recharge start -->
        <div class="user-info">
            <h4>MD. Rahitul Islam Rimon</h4>
            <p>01402860617</p>
        </div>
        <form class="search-users" action="#">
            <img src="{{ asset('WardAdmin/assets/img/search bl.png') }}" alt="search icon">
            <input type="number" name="number" id="number" placeholder="019..">
            <button type="submit" class="button">Search</button>
        </form>

        <div class="phone-book">
            <p>ফোনবুক</p>
            <ul>
                <li>
                    <img src="{{ asset('WardAdmin/assets/img/Profile-.png') }}" alt="Profile icon">
                    <div>
                        <p>+8801403860617</p>
                        <p>MD. Rahitul</p>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('WardAdmin/assets/img/Profile-.png') }}" alt="Profile icon">
                    <div>
                        <p>+8801403860617</p>
                        <p>MD. Rahitul</p>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('WardAdmin/assets/img/Profile-.png') }}" alt="Profile icon">
                    <div>
                        <p>+8801403860617</p>
                        <p>MD. Rahitul</p>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('WardAdmin/assets/img/Profile-.png') }}" alt="Profile icon">
                    <div>
                        <p>+8801403860617</p>
                        <p>MD. Rahitul</p>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('WardAdmin/assets/img/Profile-.png') }}" alt="Profile icon">
                    <div>
                        <p>+8801403860617</p>
                        <p>MD. Rahitul</p>
                    </div>
                </li>
            </ul>
        </div>
        <!-- mobile recharge end -->
    </div>
@endsection
@push('styles')
@endpush
@push('scripts')
@endpush
