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

            <div class="col-md-6">
                <div class="form-group">
                    <label for="father">Father's Name</label>
                    <input type="text" name="father" id="father" class="form-control" value="{{ $user->father }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $user->birth_date }}">
                </div>
            </div>

            <!-- NID -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nid">NID</label>
                    <input type="text" name="nid" id="nid" class="form-control" value="{{ $user->nid }}">
                </div>
            </div>

            <!-- Phone -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" class="form-control" value="{{ $user->phone }}"
                        pattern="^\+[0-9]{8,15}$"
                        title="Phone number must start with + and contain only numbers (8-15 digits)">
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
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
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $user->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    </select>
                </div>
            </div>

            <!-- Photo -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @if($user->photo)
                    <img src="{{ asset($user->photo) }}" alt="User Photo" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nid_front">Photo</label>
                    <input type="file" name="nid_front" id="nid_front" class="form-control">
                    @if($user->nid_front)
                    <img src="{{ asset($user->nid_front) }}" alt="User nid_front" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nid_back">Photo</label>
                    <input type="file" name="nid_back" id="nid_back" class="form-control">
                    @if($user->nid_back)
                    <img src="{{ asset($user->nid_back) }}" alt="User nid_back" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cv">CV</label>
                    <input type="file" name="cv" id="cv" class="form-control">
                    @if($user->cv)
                    <p><a href="{{ asset($user->cv) }}" target="_blank">View CV</a></p>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="certificate">Certificate</label>
                    <input type="file" name="certificate" id="certificate" class="form-control">
                    @if($user->certificate)
                    <p><a href="{{ asset($user->certificate) }}" target="_blank">View certificate</a></p>
                    @endif
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
