@extends('SuperAdmin.layouts.app')

@section('content')

<div class="profile">
    <div class="profile-img">
        <img src="assets/img/me.png" alt="profile image">
    </div>
    <div class="user-profile-details">
        <h4>MD. Rahitul Islam Rimon</h4>
        <p>ID: AN21323</p>
        <p>Admin</p>
    </div>
    <form class="profile-form" action="#">
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="MD. Rahitul Islam Rimon" require>
            <span class="input-box-icon" id="word">
                <img src="assets/img/edit.png" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="02/22/2025" require>
            <span class="input-box-icon" id="word">
                <img src="assets/img/edit.png" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="rahitulislam213@gmail.com" require>
            <span class="input-box-icon" id="word">
                <img src="assets/img/edit.png" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="01402860617" require>
            <span class="input-box-icon" id="word">
                <img src="assets/img/edit.png" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="Ans213" require>
            <span class="input-box-icon" id="word">
                <img src="assets/img/edit.png" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="Rimon213@Pass" require>
            <span class="input-box-icon" id="word">
                <img src="assets/img/edit.png" alt="edit icon">
            </span>
        </div>
        <button class="button user-save-btn" type="submit" disabled>Save</button>
    </form>
</div>

@endsection



@push('styles')

@endpush



@push('scripts')

@endpush
