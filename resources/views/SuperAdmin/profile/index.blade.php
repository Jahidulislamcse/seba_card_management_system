@extends('SuperAdmin.layouts.app')

@section('content')

<div class="profile">
    <div class="profile-img">
        <img src="{{ asset('assets/img/me.png') }}" alt="profile image">
    </div>
    <div class="user-profile-details">
        <h4>{{ $user->name }}</h4>
        <p>ID: {{ $user->id_no }}</p>
        <p>
            @if($user->role === 'super_admin')
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
        </p>
    </div>
    <form class="profile-form" action="#">
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="{{ $user->name }}">
            <span class="input-box-icon">
                <img src="{{ asset('assets/img/edit.png') }}" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="{{ $user->created_at->format('d/m/Y') }}">
            <span class="input-box-icon">
                <img src="{{ asset('assets/img/edit.png') }}" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="{{ $user->email }}">
            <span class="input-box-icon">
                <img src="{{ asset('assets/img/edit.png') }}" alt="edit icon">
            </span>
        </div>
        <div class="input-group mb-2">
            <input type="text" disabled class="form-control shadow-none" value="{{ $user->phone }}">
            <span class="input-box-icon">
                <img src="{{ asset('assets/img/edit.png') }}" alt="edit icon">
            </span>
        </div>
        <button class="button user-save-btn" type="submit" disabled>Save</button>
    </form>
</div>

@endsection
