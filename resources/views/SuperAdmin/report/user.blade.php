@extends('SuperAdmin.layouts.app')

@section('content')
<div class="admin-area">
    <div class="admin-details">
        @if(isset($user))
        <h4><b>নাম:</b> <span>{{ $user->name }}</span></h4>
        <p><b>ডেজিগনেশন:</b>
            <span>@if($user->role === 'super_admin')
                Admin
                @elseif($user->role === 'district_admin')
                District Admin
                @elseif($user->role === 'upo_admin')
                Upozila Admin
                @elseif($user->role === 'union_admin')
                Union Admin
                @elseif($user->role === 'ward_admin')
                Ward Admin
                @else
                {{ ucfirst($user->role) }}
                @endif
            </span></p>
        <p><b>জয়িন ডেট:</b> <span>{{ convertToBangla(date('d-m-Y', strtotime($user->activation_date))) }}</span></p>
        <p><b>জেলা:</b> <span>{{ $user->district->bn_name ?? 'পাওয়া যায়নি' }}</span></p>
        <p><b>উপজেলা:</b> <span>{{ $user->upazila->bn_name ?? 'পাওয়া যায়নি' }}</span></p>
        <p><b>ইউনিয়ন:</b> <span>{{ $user->union->bn_name ?? 'পাওয়া যায়নি' }}</span></p>
        @else
        <h4><b>নাম:</b> <span></span></h4>
        <p><b>ডেজিগনেশন:</b> <span></span></p>
        <p><b>জয়িন ডেট:</b> <span></span></p>
        <p><b>জেলা:</b> <span></span></p>
        <p><b>উপজেলা:</b> <span></span></p>
        <p><b>ইউনিয়ন:</b> <span></span></p>
        @endif
    </div>

    <div class="search-admin">
        <form action="{{ route('super-admin.admin.report.search') }}" method="GET">
            <input type="text" name="query" id="search" placeholder="আইডি বা ফোন নম্বর লিখুন" required>
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
</div>

@if(isset($user))
<div class="user-table mt-3">
    <table class="table report-table simple-table">
        <thead>
            <tr>
                <th>ক্র: নং</th>
                <th>তারিখ</th>
                <th>কার্ড এড</th>
                <th>এক্টিভ</th>
                <th>কার্ড স্টক</th>
                <th>ব্যালেন্স স্টক</th>
                <th>ব্যালেন্স এড</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ convertToBangla(now()->format('d/m/Y')) }}</td>
                <td>{{ convertToBangla($cardsAdded ?? 0) }}</td>
                <td>{{ convertToBangla($activeCards ?? 0) }}</td>
                <td>{{ convertToBangla($cardStock ?? 0) }}</td>
                <td>{{ convertToBangla($activeCards * 1000 ?? 0) }}</td>
                <td>{{ convertToBangla($activeCards * 50000 ?? 0) }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endif
@endsection
