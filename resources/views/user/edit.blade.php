@extends('dashboard')

@section('main')
<div class="container">
    <h2>Edit User</h2>

    <form id="user-edit-form" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">
            <!-- Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>
            </div>

            <!-- Role -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="dis_admin" {{ $user->role == 'dis_admin' ? 'selected' : '' }}>District Admin</option>
                        <option value="upo_admin" {{ $user->role == 'upo_admin' ? 'selected' : '' }}>Upozila Admin</option>
                        <option value="uni_admin" {{ $user->role == 'uni_admin' ? 'selected' : '' }}>Union Admin</option>
                        <option value="ward_admin" {{ $user->role == 'ward_admin' ? 'selected' : '' }}>Ward Admin</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Name</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $user->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>

<!-- JavaScript for Dynamic Location Dropdowns -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection