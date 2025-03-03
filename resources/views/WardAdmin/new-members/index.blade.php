@extends('WardAdmin.layouts.app')

@section('content')
    <!-- user table -->
    <h6 class="all-user">মোট - {{$customers->total()}} জন</h6>
    <form action="{{route('ward.new-members.index')}}" method="GET" class="search-user-area">
        <input type="text" name="search" id="search-user" placeholder="mobile number/NID" value="{{$search ?? ''}}">
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
                    <th>কর্ম</th>
                </tr>
            </thead>
            <tbody>
                @if (count($customers) > 0)
                    @foreach ($customers as $key => $customer)
                        <tr>
                            <td class="serial_no">{{ $loop->iteration }}</td>
                            <td class="user-picture">
                                <img src="{{ $customer->avatar_url }}" alt="{{ $customer->name }}">
                            </td>
                            <td class="user-name-id">
                                <h6>{{ $customer->name }}</h6>
                                <p>{{ $customer->nid_number }}</p>
                            </td>
                            <td class="user-number">{{ $customer->phone }}</td>

                            <td class="user-date">{{ $customer->dateOfBirth() }}</td>
                            <td class="user-date">
                                <!-- Edit Button -->
                                <a href="{{route('ward.new-members.edit', $customer->id)}}" class="btn btn-sm btn-primary edit-btn" ><i class="fa-solid fa-pen-to-square"></i></a>

                                <!-- Delete Button -->
                                <form action="{{route('ward.new-members.destroy', $customer->id)}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
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
