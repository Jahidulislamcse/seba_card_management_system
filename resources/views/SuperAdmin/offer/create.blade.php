@extends('SuperAdmin.layouts.app')

@section('content')
<div>
    <div class="tab-btns">
        <button type="button" class="active-btn buttons">এড অফার</button>
        <button type="button" class="buttons">অফার তালিকা</button>
    </div>

    <form action="{{ route('super-admin.offer.store') }}" method="POST" enctype="multipart/form-data" class="contents offer-form active_section">
        @csrf
        <div class="img-upload-area">
            <div>
                <label for="offer-img">আপলোড অফার ইমেজ</label>
                <button class="offer-img-btn" type="button">
                    <img src="{{ asset('SuperAdmin/assets/img/upload-image.png')}}" alt="img upload icon">
                    <input type="file" name="offer-img" id="offer-img" class="offer-img">
                </button>
            </div>
            <div class="show-offer-img">demo image</div>
        </div>

        <div class="dedline-area">
            <label for="dedline">ডেডলাইন</label>
            <input type="text" name="dedline" id="dedline" placeholder="Ded Line" required>
        </div>

        <div class="admin-types">
            <div>
                <label for="word-admin">ওয়ার্ড এড‌মিন</label>
                <input type="radio" name="admin-type" id="word-admin" value="word-admin" checked>
            </div>
            <div>
                <label for="union-admin">ইউনিয়ন এড‌মিন</label>
                <input type="radio" name="admin-type" id="union-admin" value="union-admin">
            </div>
            <div>
                <label for="upazilla-admin">উপ‌জেলা এড‌মিন</label>
                <input type="radio" name="admin-type" id="upazilla-admin" value="upazilla-admin">
            </div>
        </div>

        <button class="button save-btn" type="submit">Submit</button>
    </form>

    <!-- Display Existing Offers -->
    <div class="contents p-3">
        <table width="100%" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>অফার টাইটেল</th>
                    <th>ডেডলাইন</th>
                    <th>এডমিন টাইপ</th>
                    <th>অফার ইমেজ</th>
                    <th>ডাউনলোড</th>
                    <th>অপসারণ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $index => $offer)
                <tr>
                    <td>অফার #{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($offer->deadline)->format('d M, Y H:i') }}</td>
                    <td>{{ ucfirst(str_replace('-', ' ', $offer->admin_type)) }}</td>
                    <td>
                        @if($offer->banner)
                        <a href="{{ asset($offer->banner) }}" target="_blank">
                            <img src="{{ asset($offer->banner) }}" alt="Offer Image" style="width: 80px; height: auto;">
                        </a>
                        @else
                        No Image
                        @endif
                    </td>
                    <td>
                        @if($offer->banner)
                        <a href="{{ asset($offer->banner) }}" download>ডাউনলোড</a>
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('super-admin.offer.destroy', $offer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('আপনি কি এই অফারটি মুছে ফেলতে চান?')">মুছুন</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#dedline", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
        });
    });
</script>
@endpush
