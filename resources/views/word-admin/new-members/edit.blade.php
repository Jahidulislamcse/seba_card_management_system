@extends('word-admin.layouts.app')

@section('content')
<form class="member-add-form"  action="{{ route('ward.new-members.update', $data->id) }}" method="POST"
    enctype="multipart/form-data" data-parsley-validate >
    @csrf
    @method('PUT')
    <h6 class="text-center fw-bold">নতুন সদস‌্য ফরম </h6>
    <button type="button" class="profile-photo">
        <img src="{{$data->avatar_url}}" alt="profile icon" id="profile-image">
        <input type="file" name="avatar" class="profile-inp" id="profile-input" style="display: none;">
    </button>


    <!-- verify button -->
    <label class="input-label" for="card-no">কার্ড নং (Choice) <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="card-no">
            <img src="{{asset('assets/img/card.png')}}" alt="card icon">
        </span>
        <input type="text"  maxlength="40" value="{{old('card_no',$data->card_no)}}" class="input-box form-control shadow-none" name="card_no" id="card-no" placeholder="354656" required>
        @error('card_no')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="duration">মেয়াদ (বছর সি‌লেক্ট 1,2,3,4 5,10)  <span class="text-danger">*</span></label>
    <div class="input-group select-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="duration">
            <img src="{{asset('assets/img//term.png')}}" alt="term icon">
        </span>
        <select class="input-box select-box" name="duration_year" id="duration" required >
            <option value="১" {{old('duration_year',$data->duration_year) == '১' ? 'selected' : ''}}>১ বছর</option>
            <option value="২" {{old('duration_year',$data->duration_year) == '২' ? 'selected' : ''}}>২ বছর</option>
            <option value="৩" {{old('duration_year',$data->duration_year) == '৩' ? 'selected' : ''}}>৩ বছর</option>
            <option value="৪" {{old('duration_year',$data->duration_year) == '৪' ? 'selected' : ''}}>৪ বছর</option>
            <option value="৫" {{old('duration_year',$data->duration_year) == '৫' ? 'selected' : ''}}>৫ বছর</option>
            <option value="10" {{old('duration_year',$data->duration_year) == '10' ? 'selected' : ''}}>১০ বছর</option>
        </select>
        @error('duration_year')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="name">নাম (বাংলা)  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="name">
            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="name" id="name" placeholder="নাম (বাংলা)" required
        value="{{ old('name',$data->name) }}">
        @error('name')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="father_name">পিতার নাম (বাংলা)  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="father_name" id="father_name" placeholder="পিতার নাম (বাংলা)" required value="{{ old('father_name',$data->father_name) }}">
        @error('father_name')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="mother_name">মাতার নাম (বাংলা)  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="mother_name">
            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="mother_name" id="mother_name" placeholder="মাতার নাম (বাংলা)" required value="{{ old('mother_name',$data->mother_name) }}">
        @error('mother_name')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="birth-date">জন্ম তা‌রিখ  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
            <img src="{{asset('assets/img/date.png')}}" alt="date icon">
        </span>
        <div class="birth-date">
            <!-- month -->
            <select name="date_of_birth[month]" id="date_of_birth_month">
                @foreach (ENGLISH_MONTHS as $value)
                <option value="{{$value}}" {{old('date_of_birth.month',$data->date_of_birth['month']) == $value ? 'selected' : ''}}>{{$value}}</option>
                @endforeach

            </select>

            <!-- day -->
            <select name="date_of_birth[day]">
                @foreach (ENGLISH_DAYS as $value)
                <option value="{{$value}}" {{old('date_of_birth.day', $data->date_of_birth['day']) == $value ? 'selected' : ''}}>{{$value}}</option>
                @endforeach

            </select>
            @php
                $currentYear = date('Y');
                $startYear = 1950;
                $years = range($currentYear, $startYear);
            @endphp
            <!-- year -->
            <select class="year-select" name="date_of_birth[year]">
                @foreach ($years as $value)
                <option value="{{$value}}" {{old('date_of_birth.year',$data->date_of_birth['year']) == $value ? 'selected' : ''}}>{{$value}}</option>
                @endforeach

            </select>
        </div>
        @error('date_of_birth.month')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
        @error('date_of_birth.day')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
        @error('date_of_birth.year')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="id_no">আইডি নং  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
            <img src="{{asset('assets/img/card.png')}}" alt="card icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none"name="nid_number" id="id_no" placeholder="আইডি নং" value="{{old('nid_number',$data->nid_number)}}" required>
        @error('nid_number')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>`

    <label class="input-label" for="gender">পুরুষ ম‌হিলা (Select)  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon select-group input-group-text rounded-end-0" id="gender">
            <img src="{{asset('assets/img/gender.png')}}" alt="gender icon">
        </span>
        <select class="input-box select-box" name="gender" id="gender" required>
            @foreach (ALL_GENDER_BANGLA as $value)
                <option value="{{ $value }}" {{old('gender',$data->gender) == $value ? 'selected' : ''}}>{{ ($value) }}</option>
            @endforeach

        </select>
        @error('gender')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="religion">ধর্ম (Select)  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon select-group input-group-text rounded-end-0" id="religion">
            <img src="{{asset('assets/img/religion.png')}}" alt="religion icon">
        </span>
        <select class="input-box select-box" name="religion" id="religion" required>
            @foreach (ALL_RELIGION_BANGLA as $value)
                <option value="{{ $value }}" {{old('religion',$data->religion) == $value ? 'selected' : ''}}>{{ ($value) }}</option>
            @endforeach
        </select>
        @error('religion')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="occupation">পেশা  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="occupation">
            <img src="{{asset('assets/img/occupation.png')}}" alt="occupation icon">
        </span>
        <input type="text" maxlength="40" value="{{old('occupation',$data->occupation)}}" class="input-box form-control shadow-none"name="occupation" id="occupation" placeholder="পেশা" required>
        @error('occupation')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="division">বিভাগ  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="division">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>

        <select name="division_id" id="division" class="input-box select-box" required>
            <option value="">নির্বাচন করুন বিভাগ</option>
            @foreach ($division as $div)
                <option value="{{ $div->id }}" {{ $data->division_id == $div->id ? 'selected' : '' }}>{{ $div->name }}</option>
            @endforeach
        </select>
        @error('division_id')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="dristrick">জেলা  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        {{-- <input type="text" maxlength="40" class="input-box form-control shadow-none" name="dristrick" id="dristrick" placeholder="জেলা" required> --}}
        <select name="district_id" id="district" class="input-box select-box" required>
            <option value="">জেলা নির্বাচন করুন</option>
            @foreach ($district as $dis)
                <option value="{{ $dis->id }}" {{ $data->district_id == $dis->id ? 'selected' : '' }}>{{ $dis->name }}</option>
            @endforeach
        </select>
        @error('district_id')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="Upazilla">উপ‌জেলা  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        {{-- <input type="text" maxlength="40" class="input-box form-control shadow-none" name="Upazilla" id="Upazilla" placeholder="উপ‌জেলা" required> --}}
        <select name="upozila_id" id="upozila" class="input-box select-box" required>
            <option value="">উপজেলা নির্বাচন করুন</option>
            @foreach ($upazila as $up)
                <option value="{{ $up->id }}" {{ $data->upozila_id == $up->id ? 'selected' : '' }}>{{ $up->name }}</option>
            @endforeach
        </select>
        @error('upozila_id')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="Union">ইউনিয়ন </label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="Union">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        {{-- <input type="text" maxlength="40" class="input-box form-control shadow-none" name="Union" id="Union" placeholder="ইউনিয়ন" required> --}}
        <select name="union_id" id="union" class="input-box select-box" >
            <option value="">ইউনিয়ন নির্বাচন করুন</option>
            @foreach ($union as $un)
                <option value="{{ $un->id }}" {{ $data->union_id == $un->id ? 'selected' : '' }}>{{ $un->name }}</option>
            @endforeach
        </select>
        @error('union_id')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="word">ওয়ার্ড  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="word">
            <img src="{{asset('assets/img/city.png')}}" alt="city icon">
        </span>
        <input type="text" maxlength="40" value="{{old('ward',$data->ward)}}" class="input-box form-control shadow-none" name="ward" id="word" placeholder="ওয়ার্ড" required>
        @error('ward')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="post-code">পোস্ট কোড  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="post-code">
            <img src="{{asset('assets/img/post code.png')}}" alt="post code icon">
        </span>
        <input type="text" maxlength="40" value="{{old('post_code',$data->post_code)}}" class="input-box form-control shadow-none" name="post_code" id="post-code" placeholder="পোস্ট কোড " required>
        @error('post_code')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>

    <label class="input-label" for="mobile_no">মোবাইল নং  <span class="text-danger">*</span></label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
            <img src="{{asset('assets/img/number.png')}}" alt="number icon">
        </span>
        <input type="number" maxlength="40" value="{{old('phone',$data->phone)}}" class="input-box form-control shadow-none" name="phone" id="mobile_no" placeholder="01402860617..." required>
        @error('phone')
        <p class="text-danger m-0">{{ $message }}</p>
        @enderror
    </div>


    <div id="familyContainer">
        @if($data->family_members->count() > 0)
            @foreach ($data->family_members as $key => $family_member)
                <div  class="mt-4 familyMember">
                    <label class="input-label member-title"><b>পরিবারের সদস্য তথ্য {{$key+1}}:</b></label>

                    <label class="input-label">নাম (বাংলা)</label>
                    <div class="input-group mb-2">
                        <span class="input-box-icon input-group-text">
                            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
                        </span>
                        <input type="text" class="input-box form-control shadow-none"  name="family_members[0][name]" value="{{ $family_member->name }}" placeholder="নাম (বাংলা)">
                    </div>

                    <label class="input-label">বয়স</label>
                    <div class="input-group mb-2">
                        <span class="input-box-icon input-group-text">
                            <img src="{{asset('assets/img/old.png')}}" alt="old icon">
                        </span>
                        <input type="text" class="input-box form-control shadow-none" name="family_members[0][age]" placeholder="বয়স" value="{{ $family_member->age }}">
                    </div>

                    <label class="input-label">পুরুষ মহিলা (Select)</label>
                    <div class="input-group mb-2">
                        <span class="input-box-icon select-group input-group-text">
                            <img src="{{asset('assets/img/gender.png')}}" alt="gender icon">
                        </span>
                        <select name="family_members[0][gender]" id="gender"
                        class="input-box select-box"  required>
                            <option value="">Select One</option>
                            @foreach (ALL_GENDER_BANGLA as $value)
                                <option value="{{ $value }}" {{$family_member->gender == $value ? 'selected' : ''}}>{{ ucwords($value) }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <label class="input-label">সম্পর্ক (বাংলা)</label>
                    <div class="input-group mb-2">
                        <span class="input-box-icon input-group-text">
                            <img src="{{asset('assets/img/name.png')}}" alt="name icon">
                        </span>
                        <input type="text" class="input-box form-control shadow-none"
                        value="{{ $family_member->relationship }}"
                        name="family_members[0][relationship]" placeholder="সম্পর্ক (বাংলা)">
                    </div>
                </div>
            @endforeach
        @endif
    </div>



    <button  type="button" class="add-more-btn button">
        <img src="{{asset('assets/img/plus.png')}}" alt="">
        Add More
    </button>

    <button type="submit" class="button">Update</button>
</form>

@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/NewMember.css')}}">
<style>
.parsley-errors-list {
    display: block;
    width: 100%;
    margin-top: 5px;
}
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            // Fetch districts based on division selection
            $(document).on('change','#division',function() {
                var divisionId = $(this).val();
                console.log('divisionId',divisionId)
                if (divisionId) {
                    $.ajax({
                        url: '/get-districts/' + divisionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty().append(
                                '<option value="">নির্বাচন করুন জেলা</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#upozila').empty().append(
                                '<option value="">উপজেলা নির্বাচন করুন</option>'
                                ); // Reset upozila dropdown
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">নির্বাচন করুন জেলা</option>');
                    $('#upozila').empty().append('<option value="">উপজেলা নির্বাচন করুন</option>');
                }
            });

            // Fetch upozilas based on district selection

            $(document).on('change','#district',function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/get-upozilas/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#upozila').empty().append(
                                '<option value="">উপজেলা নির্বাচন করুন</option>');
                            $.each(data, function(key, value) {
                                $('#upozila').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#upozila').empty().append('<option value="">উপজেলা নির্বাচন করুন</option>');
                }
            });

            // Fetch Union based on upozila selection
            $(document).on('change','#upozila',function() {

                var upozilaId = $(this).val();
                if (upozilaId) {
                    $.ajax({
                        url: '/get-unions/' + upozilaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#union').empty().append(
                            '<option value="">ইউনিয়ন নির্বাচন করুন</option>');
                            $.each(data, function(key, value) {
                                $('#union').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#union').empty().append('<option value="">ইউনিয়ন নির্বাচন করুন</option>');
                }
            });

            let memberIndex = {{$data->family_members->count()}}; // Start from 1 since the first one is already there

            function addFamilyMember() {
                console.log('addFamilyMember')
                let newMember = $('.familyMember').first().clone(); // Clone the first family member div
                newMember.find('input, select').each(function () {
                    let nameAttr = $(this).attr('name');
                    if (nameAttr) {
                        $(this).attr('name', nameAttr.replace(/\d+/, memberIndex)); // Update index
                        $(this).val(''); // Clear previous values
                    }
                });

                newMember.find('.member-title b').text('পরিবারের সদস্য তথ্য ' + (memberIndex + 1) + ':'); // Update title
                $('#familyContainer').append(newMember); // Append to container
                memberIndex++; // Increment index
            }

            $(document).off('click', '.add-more-btn').on('click','.add-more-btn', function () {
                console.log('add-more-btn')
                addFamilyMember();
            });

             // Trigger file input when the image is clicked
            $('#profile-image').on('click', function() {
                $('#profile-input').click();
            });

            // Handle file selection and update the image
            $('#profile-input').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#profile-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
