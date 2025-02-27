@extends('word-admin.layouts.app')

@section('content')
    <!-- user table -->
    <h6 class="all-user">মোট - ৮৭৯০ জন</h6>
    <form action="#" class="search-user-area">
        <input type="text" name="search-user" id="search-user" placeholder="mobile number/id">
        <button type="submit" class="button">Submit</button>
    </form>
    <div class="user-table">
        <table class="all-user-table table">
            <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>ছবি</th>
                    <th>নাম ও আইডি</th>
                    <th>মোবাইল নং</th>

                    <th>জন্ম তা‌রিখ</th>
                </tr>
            </thead>
            <tbody>
                @if (count($customers) > 0)
                    @foreach ($customers as $key => $customer)
                        {{-- {{dd($customer->dateOfBirth())}} --}}
                        <tr>
                            <td class="serial_no">{{ $loop->iteration }}</td>
                            <td class="user-picture">
                                <img src="{{ $customer->avatar_url }}" alt="{{ $customer->name }}">
                            </td>
                            <td class="user-name-id">
                                <h6>{{ $customer->name }}</h6>
                                <p>{{ $customer->card_no }}</p>
                            </td>
                            <td class="user-number">{{ $customer->phone }}</td>

                            <td class="user-date">{{ $customer->dateOfBirth() }}</td>
                        </tr>
                    @endforeach
                @endif



            </tbody>
        </table>
    </div>
    {!! $customers->links('vendor.pagination.bootstrap-5', ['total' => $total]) !!}

    <!-- user table -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/MemberList.css') }}">
@endpush
@push('scripts')
@endpush
