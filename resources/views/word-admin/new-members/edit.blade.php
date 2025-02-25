@extends('word-admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card  my-4">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Edit New Member Registration</h3>
                    </div>

                    <!-- Registration Form (Hidden by Default) -->
                    <div id="registration-form" class="mb-4">
                        <form id="user-registration-form" action="{{ route('ward.new-members.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="father_name">Father Name <span class="text-danger">*</span></label>
                                        <input type="text" name="father_name" id="father_name" class="form-control"
                                            value="{{ $data->father_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mother_name">Mother Name <span class="text-danger">*</span></label>
                                        <input type="text" name="mother_name" id="mother_name" class="form-control"
                                            value="{{ $data->mother_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date Of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                            value="{{ $data->date_of_birth }}" required>
                                    </div>
                                </div>


                                <!-- NID -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid_number">NID</label>
                                        <input type="text" name="nid_number" id="nid_number" class="form-control" value="{{ $data->nid_number }}">
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" id="phone" class="form-control" value="{{ $data->phone }}" required
                                            pattern="^\+[0-9]{8,15}$"
                                            title="Phone number must start with + and contain only numbers (8-15 digits)">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="">Select One</option>
                                            @foreach (ALL_GENDER as $value)
                                                <option value="{{ $value }}" {{ $data->gender == $value ? 'selected' : '' }}>{{ ucwords($value) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="religion">Religion <span class="text-danger">*</span></label>
                                        <select name="religion" id="religion" class="form-control" required>
                                            <option value="">Select One</option>
                                            @foreach (ALL_RELIGION as $value)
                                                <option value="{{ $value }}" {{ $data->religion == $value ? 'selected' : '' }}>{{ ucwords($value) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="occupation">Occupation <span class="text-danger">*</span></label>
                                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $data->occupation }}"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control" required>
                                            <option value="">Select Division</option>
                                            @foreach ($division as $div)
                                                <option value="{{ $div->id }}" {{ $data->division_id == $div->id ? 'selected' : '' }}>{{ $div->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">District <span class="text-danger">*</span></label>
                                        <select name="district_id" id="district" class="form-control" required>
                                            <option value="">Select District</option>
                                            @foreach ($district as $dis)
                                                <option value="{{ $dis->id }}" {{ $data->district_id == $dis->id ? 'selected' : '' }}>{{ $dis->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Upozila -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="upozila">Upozila  <span class="text-danger">*</span></label>
                                        <select name="upozila_id" id="upozila" class="form-control" required>
                                            <option value="">Select Upozila</option>
                                            @foreach ($upazila as $up)
                                                <option value="{{ $up->id }}" {{ $data->upozila_id == $up->id ? 'selected' : '' }}>{{ $up->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Union -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="union">Union</label>
                                        <select name="union_id" id="union" class="form-control">
                                            <option value="">Select Union</option>
                                            @foreach ($union as $un)
                                                <option value="{{ $un->id }}" {{ $data->union_id == $un->id ? 'selected' : '' }}>{{ $un->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <!-- Ward -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ward">Ward</label>
                                        <input type="text" name="ward" id="ward" class="form-control" value="{{ $data->ward }}">
                                    </div>
                                </div>

                                <!-- Photo -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" name="avatar" id="avatar" class="form-control">
                                        <img src="{{ $data->avatar_url }}" alt="Avatar" style="max-width: 100px;">
                                    </div>
                                </div>

                                <!-- NID Front -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid_front">NID Front</label>
                                        <input type="file" name="nid_front" id="nid_front" class="form-control">
                                        <img src="{{ $data->nid_front_url }}" alt="Avatar" style="max-width: 100px;">
                                    </div>
                                </div>

                                <!-- NID Back -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid_back">NID Back</label>
                                        <input type="file" name="nid_back" id="nid_back" class="form-control">
                                        <img src="{{ $data->nid_back_url }}" alt="Avatar" style="max-width: 100px;">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block mb-3 col-md-12">Status <span class="error">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="status_yes"
                                                    value="{{STATUS_ACTIVE}}" name="status" {{ $data->status == STATUS_ACTIVE ? 'checked' : '' }}
                                                    data-parsley-multiple="status">
                                                <label class="form-check-label" for="status_yes">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="status_no"
                                                    value="{{ STATUS_INACTIVE }}" name="status" {{ $data->status == STATUS_INACTIVE ? 'checked' : '' }}>
                                                <label class="form-check-label" for="status_no">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="col-md-12 my-2">
                                    <div class="d-flex justify-content-between my-2">
                                        <h3>Family Members</h3>
                                        <button class="btn btn-success " id="add_family_member_btn">Add </button>
                                    </div>
                                    <div class="row" id="add_family_members_section">
                                        @if($data->family_members->count() > 0)
                                            @foreach ($data->family_members as $key => $family_member)
                                            <div class="col-md-12 border border-primary p-2 member_list">
                                                <h4>Family Member {{$key+1}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="family_members[{{$key}}][name]"
                                                                id="name" class="form-control" value="{{$family_member->name}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_of_birth">Date Of Birth</label>
                                                            <input type="date" name="family_members[{{$key}}][date_of_birth]"
                                                                id="date_of_birth" class="form-control" value="{{$family_member->date_of_birth}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="gender">Gender <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="family_members[{{$key}}][gender]" id="gender"
                                                                class="form-control" required>
                                                                <option value="">Select One</option>
                                                                @foreach (ALL_GENDER as $value)
                                                                    <option value="{{ $value }}" {{ $value == $family_member->gender ? 'selected' : '' }}>{{ ucwords($value) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="relationship">Relationship</label>
                                                            <input type="text" name="family_members[{{$key}}][relationship]"
                                                                id="relationship" class="form-control" required value="{{$family_member->relationship}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button"  onclick="$(this).parent().remove()"  class="btn btn-danger " style="    float: right;">Delete </button>
                                            </div>
                                            @endforeach

                                        @endif
                                    </div>
                                </div>

                                <!-- Submit & Cancel Buttons -->
                                <div class="col-md-12 my-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('ward.new-members.index') }}" type="button"
                                        id="cancel-registration" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Fetch districts based on division selection
            $('#division').change(function() {
                var divisionId = $(this).val();
                if (divisionId) {
                    $.ajax({
                        url: '/get-districts/' + divisionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty().append(
                                '<option value="">Select District</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#upozila').empty().append(
                                '<option value="">Select Upozila</option>'
                                ); // Reset upozila dropdown
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">Select District</option>');
                    $('#upozila').empty().append('<option value="">Select Upozila</option>');
                }
            });

            // Fetch upozilas based on district selection
            $('#district').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/get-upozilas/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#upozila').empty().append(
                                '<option value="">Select Upozila</option>');
                            $.each(data, function(key, value) {
                                $('#upozila').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#upozila').empty().append('<option value="">Select Upozila</option>');
                }
            });

            // Fetch Union based on upozila selection
            $('#upozila').change(function() {
                var upozilaId = $(this).val();
                if (upozilaId) {
                    $.ajax({
                        url: '/get-unions/' + upozilaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#union').empty().append(
                            '<option value="">Select union</option>');
                            $.each(data, function(key, value) {
                                $('#union').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#union').empty().append('<option value="">Select union</option>');
                }
            });

            var index = {{$data->family_members->count() > 0 ? $data->family_members->count() : 0}};
            $(document).on('click', '#add_family_member_btn', function(e) {
                e.preventDefault();
                index = index + 1
                let member_list = $('.member_list').length
                let html = `
                <div class="col-md-12 border border-primary p-2 my-2 member_list" >
                    <h4>Family Member ${member_list+1}</h4>
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="family_members[${index}][name]" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date Of Birth</label>
                                <input type="date" name="family_members[${index}][date_of_birth]" id="date_of_birth" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                <select name="family_members[${index}][gender]" id="gender" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach (ALL_GENDER as $value)
                                    <option value="{{ $value }}">{{ ucwords($value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="relationship">Relationship</label>
                                <input type="text" name="family_members[${index}][relationship]" id="relationship" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger " type="button" onclick="$(this).parent().remove()" style="    float: right;">Delete </button>
                </div>
            `
                $("#add_family_members_section").append(html)
                console.log('click', html)
            })
        });
    </script>
@endpush
