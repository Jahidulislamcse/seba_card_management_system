@extends('SuperAdmin.layouts.app')

@section('content')

<div class="profile">
    <div class="profile-img">
        <img src="{{ asset($user->photo) }}" alt="profile image">
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
    <div>
        <form class="profile-form mb-0" action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group mb-2">
                <input type="text" class="form-control shadow-none" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="input-group mb-2">
                <input type="text" disabled class="form-control shadow-none" value="{{ $user->created_at->format('d/m/Y') }}">
            </div>
            <div class="input-group mb-2">
                <input type="email" disabled class="form-control shadow-none" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="input-group mb-2">
                <input type="text" class="form-control shadow-none" name="phone" value="{{ $user->phone }}" required>
            </div>

            <button class="button user-save-btn" type="submit">Save</button>
        </form>

        @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="">
        <form class="profile-form" action="{{ route('profile.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group mb-2">
                <input type="password" class="form-control shadow-none" name="current_password" placeholder="Current Password" required>
            </div>
            <div class="input-group mb-2">
                <input type="password" class="form-control shadow-none" name="new_password" placeholder="New Password" required>
            </div>
            <div class="input-group mb-2">
                <input type="password" class="form-control shadow-none" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <button class="button user-save-btn" type="submit">Update Password</button>
        </form>

        @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

@endsection
