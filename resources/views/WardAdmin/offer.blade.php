@extends('WardAdmin.layouts.app')

@section('content')
    <div>
        <div class="offer-area">
            @foreach ($offers as $offer)
                <div class="offer">
                    {{-- <div class="offer-subject">Food</div> --}}
                    <img class="offer-img" src="{{ asset($offer->banner) }}" alt="offer image">
                    <div class="expire-date">
                        <button class="btn btn-danger">Expire Date:
                            {{ \Carbon\Carbon::parse($offer->deadline)->format('d/m/Y') }}
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/NewMember.css') }}">
@endpush
@push('scripts')
@endpush
