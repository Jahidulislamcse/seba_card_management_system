@extends('SuperAdmin.layouts.app')

@section('content')

    <!-- user table -->
    <h6 class="all-user">মোট - {{$restBalances->total()}} জন</h6>
    <form action="{{route('super-admin.rest-balance.index')}}" method="GET" class="search-user-area">
        <input type="text" name="search" id="search-user" placeholder="mobile number/id" value="{{$search ?? ''}}">
        <button type="submit" class="button">Submit</button>
    </form>
    <div class="user-table">
        <table class="all-user-table table">
            <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>নাম এবং আইডি</th>
                    <th>মোবাইল নং</th>
                    <th>বাকি পরিমাণ</th>
                    <th>তা‌রিখ</th>
                    <th>বিস্তারিত দেখুন</th>
                    <th>আদায় করুন</th>
                </tr>
            </thead>
            <tbody>
                @if($restBalances->isNotEmpty())
                    @foreach ($restBalances as $restBalance )
                        <tr>
                            <td class="serial_no">{{$loop->iteration}}</td>
                            <td class="user-name">
                                <h6>{{ $restBalance?->receiver->name ?? '' }}</h6>
                                <p>{{ $restBalance?->receiver->nid ?? '' }}</p>
                            </td>
                            <td class="rest-balance">{{$restBalance?->receiver->phone}}</td>
                            <td class="rest-balance">{{$restBalance->remaining_due}}</td>
                            <td class="rest-balance">{{$restBalance->created_at_format}}</td>
                            <td class="view-details-btn">
                                <div>
                                    <a class="details-btn" href="{{route('super-admin.rest-balance.details', $restBalance->id)}}">View Details</a>
                                </div>
                            </td>
                            <td class="collection-btn">
                                @if($restBalance->remaining_due != 0)
                                <div>
                                    <a class="collect-btn" href="{{route('super-admin.rest-balance.collect', $restBalance->id)}}">Collect</a>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                
                @endif
                

            </tbody>
        </table>
    </div>
    <!-- user table -->
    <div style="margin-bottom:20%; margin-top:10px;">
        {!! $restBalances->links('vendor.pagination.bootstrap-5', ['total' => $total]) !!}
        </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/Table.css')}}">
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/RestBalance.css')}}">
@endpush