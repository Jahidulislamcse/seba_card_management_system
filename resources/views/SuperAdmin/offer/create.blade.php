@extends('SuperAdmin.layouts.app')

@section('content')
<form action="{{ route('super-admin.offer.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="img-upload-area">
        <div>
            <label for="offer-img">আপলোড অফার ইমেজ</label>
            <button class="offer-img-btn" type="button">
                <img src="{{ asset('SuperAdmin/assets/img/upload-image.png')}}" alt="img upload icon">
                <input type="file" name="offer-img" id="offer-img" class="offer-img">
            </button>
        </div>

        <!-- jei img upload hobe seta ekhane show korbe -->
        <div class="show-offer-img">demo image</div>
    </div>
    <div class="dedline-area">
        <label for="dedline">ডেডলাইন</label>
        <input type="text" name="dedline" id="dedline" placeholder="Ded Line">
    </div>

    <div class="admin-types">
        <div>
            <label for="word-admin">ওয়ার্ড এড‌মিন</label>
            <input type="radio" name="admin-type" id="word-admin" value="word-amin" checked>
        </div>
        <div>
            <label for="union-admin">ইউনিয়ন এড‌মিন</label>
            <input type="radio" name="admin-type" id="union-admin" value="union-amin">
        </div>
        <div>
            <label for="upazilla-admin">উপ‌জেলা এড‌মিন</label>
            <input type="radio" name="admin-type" id="upazilla-admin" value="upazilla-amin">
        </div>
    </div>

    <button class="button save-btn" type="submit">Submit</button>
</form>

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
