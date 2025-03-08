@extends('SuperAdmin.layouts.app')

@section('content')

    <div class="tab-btns">
        <button type="button" class="active-btn buttons">এডমিন/সাব এডমিন</button>
        <button type="button" class="buttons">জেলা এডমিন</button>
        <button type="button" class="buttons">উপজেলা এডমিন</button>
        <button type="button" class="buttons">ইউনিয়ন এডমিন</button>
        <button type="button" class="buttons">ওর্য়াড এডমিন</button>
    </div>

    <!-- এডমিন/সাব এডমিন -->
    <form class="member-add-form contents active_section" action="{{ route('super-admin.user.store') }}" method="POST"
        enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <input type="hidden" name="role" value="{{\App\Models\User::USER_ROLE_ADMIN}}">

        <h6 class="text-center fw-bold">এডমিন/সাব এডমিন</h6>
        <button type="button" class="admin-profile-photo profile-photo" id="admin_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" id="admin_profile_photo" alt="profile icon">
            <input type="file" name="photo" class="admin-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" required>
        </div>



        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <!-- month -->
                <select name="dob[month]" required>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select name="dob[day]" required>
                    @foreach (ENGLISH_DAYS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.day') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                @php
                    $currentYear = date('Y');
                    $startYear = 1950;
                    $years = range($currentYear, $startYear);
                @endphp
                <!-- year -->
                <select class="year-select" name="dob[year]" required>
                    @foreach ($years as $value)
                        <option value="{{$value}}" {{old('date_of_birth.year') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label class="input-label" for="id_no">আইডি নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
                <img src="{{ asset('SuperAdmin/assets/img/card.png')}}" alt="card icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="id_no" id="id_no"
                placeholder="আইডি নং" value="{{generateFormattedNumber()}}" required readonly>
        </div>

        <label class="input-label" for="mobile_no">মোবাইল নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/number.png')}}" alt="number icon">
            </span>
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="phone" id="mobile_no"
                placeholder="01402860617..." required>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email" id="email_address"
                placeholder="example@gmail.com" required>
        </div>
        <label class="input-label" for="email_address">পাসওয়ার্ড</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="password">
                <img src="{{ asset('front/assets/img/password.png')}}" alt="password icon">
            </span>
            <input type="password" class="input-box form-control shadow-none" name="password" id="password"
                placeholder="পাসওয়ার্ড" required>
        </div>

        <div class="nid-card-area">
            <div>
                <label class="input-label" for="nid1">এনআইডি ফ্রন্ট</label>
                <button type="button" class="admin-nid-card1" id="admin_nid_front_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-1.jpg')}}" alt="nid card" id="admin_nid_front_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="" accept="image/*">
                        </div>
                    </div>
                    <input type="file" name="nid_front" class="admin-nid1 file-hide" id="nid1" accept="image/*">
                </button>
            </div>
            <div>
                <label class="input-label" for="nid2">এনআইডি ব্যাক</label>
                <button type="button" class="admin-nid-card2" id="admin_nid_back_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-2.jpg')}}" alt="nid card" id="admin_nid_back_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="" accept="image/*">
                        </div>
                    </div>
                    <input type="file" name="nid_back" class="admin-nid2 file-hide" id="nid2" accept="image/*">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="admin-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="admin-cv file-hide" id="  accept=" application/pdf"cv">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="admin-certificate-upload certificate-upload" id="admin_cartificate_front_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img"
                    id="admin_cartificate_front_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="admin-certificate file-hide" id="certificate">
            </button>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>

    <!-- জেলা এডমিন -->
    <form class="member-add-form contents" action="{{ route('super-admin.user.store') }}" method="POST"
        enctype="multipart/form-data" data-parsley-validate>

        @csrf
        <input type="hidden" name="role" value="{{\App\Models\User::USER_ROLE_DIS_ADMIN}}">
        <h6 class="text-center fw-bold">জেলা এডমিন</h6>
        <button type="button" class="dis-profile-photo profile-photo" id="dis_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon" id="dis_profile_photo">
            <input type="file" name="photo" class="dis-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father" id="father_name"
                placeholder="পিতার নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <select name="dob[month]" required>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select name="dob[day]" required>
                    @foreach (ENGLISH_DAYS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.day') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                @php
                    $currentYear = date('Y');
                    $startYear = 1950;
                    $years = range($currentYear, $startYear);
                @endphp
                <!-- year -->
                <select class="year-select" name="dob[year]" required>
                    @foreach ($years as $value)
                        <option value="{{$value}}" {{old('date_of_birth.year') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label class="input-label" for="id_no">আইডি নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
                <img src="{{ asset('SuperAdmin/assets/img/card.png')}}" alt="card icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="id_no" id="id_no"
                placeholder="আইডি নং" value="{{generateFormattedNumber()}}" required readonly>
        </div>

        <label class="input-label" for="mobile_no">মোবাইল নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/number.png')}}" alt="number icon">
            </span>
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="phone" id="mobile_no"
                placeholder="01402860617..." required>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email" id="email_address"
                placeholder="example@gmail.com" required>
        </div>

        <label class="input-label" for="email_address">পাসওয়ার্ড</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="password">
                <img src="{{ asset('front/assets/img/password.png')}}" alt="password icon">
            </span>
            <input type="password" class="input-box form-control shadow-none" name="password" id="password"
                placeholder="পাসওয়ার্ড" required>
        </div>

        <label class="input-label" for="division">বিভাগ</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="division">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="division" id="division_id" class="input-box select-box division division_1" data-tab="1" required>
                <option value="">নির্বাচন করুন বিভাগ</option>
                @foreach ($division as $div)
                    <option value="{{ $div->id }}" {{old('division_id') == $div->id ? 'selected' : ''}}>{{ $div->name }}</option>
                @endforeach
            </select>
        </div>

        <label class="input-label" for="dristrick">জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="district" id="district_id" class="input-box select-box district district_1" data-tab="1" required>
                <option value="">জেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Upazilla">উপ‌জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="upozila" id="upazila_id" class="input-box select-box upazila upazila_1" data-tab="1" required>
                <option value="">উপজেলা নির্বাচন করুন</option>
            </select>
        </div>

        <div class="nid-card-area">
            <div>
                <label class="input-label" for="nid1">এনআইডি ফ্রন্ট</label>
                <button type="button" class="dis-nid-card1 nid-card1" id="dis_nid_front_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-1.jpg')}}" alt="nid card" id="dis_nid_front_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_front" class="dis-nid1 file-hide" id="nid1" accept="image/*">
                </button>
            </div>
            <div>
                <label class="input-label" for="nid2">এনআইডি ব্যাক</label>
                <button type="button" class="dis-nid-card2 nid-card2" id="dis_nid_back_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-2.jpg')}}" alt="nid card" id="dis_nid_back_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_back" class="dis-nid2 file-hide" id="nid2" accept="image/*">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="dis-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="dis-cv file-hide" id="cv" accept="application/pdf">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="dis-certificate-upload certificate-upload" id="dis_cartificate_front_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img"
                    id="dis_cartificate_front_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="dis-certificate file-hide" id="certificate" accept="image/*">
            </button>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>
    <!-- উপজেলা এডমিন -->
    <form class="member-add-form contents" action="{{ route('super-admin.user.store') }}" method="POST"
        enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <input type="hidden" name="role" value="{{\App\Models\User::USER_ROLE_UPO_ADMIN}}">
        <h6 class="text-center fw-bold">উপজেলা এডমিন</h6>
        <button type="button" class="up-profile-photo profile-photo" id="upozila_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon" id="upozila_profile_photo">
            <input type="file" name="photo" class="up-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father" id="father_name"
                placeholder="পিতার নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <select name="dob[month]" required>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select name="dob[day]" required>
                    @foreach (ENGLISH_DAYS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.day') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                @php
                    $currentYear = date('Y');
                    $startYear = 1950;
                    $years = range($currentYear, $startYear);
                @endphp
                <!-- year -->
                <select class="year-select" name="dob[year]" required>
                    @foreach ($years as $value)
                        <option value="{{$value}}" {{old('date_of_birth.year') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label class="input-label" for="id_no">আইডি নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
                <img src="{{ asset('SuperAdmin/assets/img/card.png')}}" alt="card icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="id_no" id="id_no"
                placeholder="আইডি নং" value="{{generateFormattedNumber()}}" required readonly>
        </div>

        <label class="input-label" for="mobile_no">মোবাইল নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/number.png')}}" alt="number icon">
            </span>
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="phone" id="mobile_no"
                placeholder="01402860617..." required>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email" id="email_address"
                placeholder="example@gmail.com" required>
        </div>

        <label class="input-label" for="email_address">পাসওয়ার্ড</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="password">
                <img src="{{ asset('front/assets/img/password.png')}}" alt="password icon">
            </span>
            <input type="password" class="input-box form-control shadow-none" name="password" id="password"
                placeholder="পাসওয়ার্ড" required>
        </div>

        <label class="input-label" for="division">বিভাগ</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="division">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="division" id="division_id" class="input-box select-box division division_2" data-tab="2" required>
                <option value="">নির্বাচন করুন বিভাগ</option>
                @foreach ($division as $div)
                    <option value="{{ $div->id }}" {{old('division_id') == $div->id ? 'selected' : ''}}>{{ $div->name }}</option>
                @endforeach
            </select>
        </div>

        <label class="input-label" for="dristrick">জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="district" id="district_id" class="input-box select-box district district_2" data-tab="2" required>
                <option value="">জেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Upazilla">উপ‌জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="upozila" id="upazila_id" class="input-box select-box upazila upazila_2" data-tab="2" required>
                <option value="">উপজেলা নির্বাচন করুন</option>
            </select>
        </div>

        <div class="nid-card-area">
            <div>
                <label class="input-label" for="nid1">এনআইডি ফ্রন্ট</label>
                <button type="button" class="up-nid-card1 nid-card1" id="upozila_nid_front_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-1.jpg')}}" alt="nid card" id="upozila_nid_front_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_front" class="up-nid1 file-hide" id="nid1" accept="image/*">
                </button>
            </div>
            <div>
                <label class="input-label" for="nid2">এনআইডি ব্যাক</label>
                <button type="button" class="up-nid-card2 nid-card2" id="upozila_nid_back_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-2.jpg')}}" alt="nid card" id="upozila_nid_back_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_back" class="up-nid2 file-hide" id="nid2" accept="image/*">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="up-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="up-cv file-hide" id="cv" accept="application/pdf">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="up-certificate-upload certificate-upload" id="upozila_cartificate_front_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img"
                    id="upozila_cartificate_front_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="up-certificate file-hide" id="certificate" accept="image/*">
            </button>
        </div>

        <h4 class="input-label" for="parent_id">অ্যাডমিনের অধীনে</h4>
        <label class="input-label" for="up_admin">জেলা এডমিন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
            </span>

            <select name="parent_id" id="parent_id" class="input-box select-box district_admin district_admin_3" data-tab="3"
                required>
                <option value="">জেলা অ্যাডমিন নির্বাচন করুন </option>
                @if($district_admins->count() > 0)
                    @foreach ($district_admins as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                @endif

            </select>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>

    <!-- ইউনিয়ন এডমিন -->
    <form class="member-add-form contents"action="{{ route('super-admin.user.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <input type="hidden" name="role" value="{{\App\Models\User::USER_ROLE_UNI_ADMIN}}">
        <h6 class="text-center fw-bold">ইউনিয়ন এডমিন</h6>
        <button type="button" class="un-profile-photo profile-photo" id="union_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon" id="union_profile_photo">
            <input type="file" name="photo" class="un-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father" id="father_name"
                placeholder="পিতার নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <select name="dob[month]" required>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select name="dob[day]" required>
                    @foreach (ENGLISH_DAYS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.day') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                @php
                    $currentYear = date('Y');
                    $startYear = 1950;
                    $years = range($currentYear, $startYear);
                @endphp
                <!-- year -->
                <select class="year-select" name="dob[year]" required>
                    @foreach ($years as $value)
                        <option value="{{$value}}" {{old('date_of_birth.year') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label class="input-label" for="id_no">আইডি নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
                <img src="{{ asset('SuperAdmin/assets/img/card.png')}}" alt="card icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="id_no" id="id_no"
                placeholder="আইডি নং" value="{{generateFormattedNumber()}}" required readonly>
        </div>

        <label class="input-label" for="mobile_no">মোবাইল নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/number.png')}}" alt="number icon">
            </span>
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="phone" id="mobile_no"
                placeholder="01402860617..." required>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email" id="email_address"
                placeholder="example@gmail.com" required>
        </div>

        <label class="input-label" for="email_address">পাসওয়ার্ড</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="password">
                <img src="{{ asset('front/assets/img/password.png')}}" alt="password icon">
            </span>
            <input type="password" class="input-box form-control shadow-none" name="password" id="password"
                placeholder="পাসওয়ার্ড" required>
        </div>

        <label class="input-label" for="division">বিভাগ</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="division">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="division" id="division_id" class="input-box select-box division division_3" data-tab="3" required>
                <option value="">নির্বাচন করুন বিভাগ</option>
                @foreach ($division as $div)
                    <option value="{{ $div->id }}" {{old('division_id') == $div->id ? 'selected' : ''}}>{{ $div->name }}</option>
                @endforeach
            </select>
        </div>

        <label class="input-label" for="dristrick">জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="district" id="district_id" class="input-box select-box district district_3" data-tab="3" required>
                <option value="">জেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Upazilla">উপ‌জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="upozila" id="upazila_id" class="input-box select-box upazila upazila_3" data-tab="3" required>
                <option value="">উপজেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Union">ইউনিয়ন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Union">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="union" id="union_id" class="input-box select-box union union_3" data-tab="3">
                <option value="">ইউনিয়ন নির্বাচন করুন</option>
            </select>
        </div>

        <div class="nid-card-area">
            <div>
                <label class="input-label" for="nid1">এনআইডি ফ্রন্ট</label>
                <button type="button" class="un-nid-card1 nid-card1" id="union_nid_front_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-1.jpg')}}" alt="nid card" id="union_nid_front_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_front" class="un-nid1 file-hide" id="nid1" accept="image/*">
                </button>
            </div>
            <div>
                <label class="input-label" for="nid2">এনআইডি ব্যাক</label>
                <button type="button" class="un-nid-card2 nid-card2" id="union_nid_backend_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-2.jpg')}}" alt="un-nid card nid card"
                        id="union_nid_backend_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_back" class="un-nid2 file-hide" id="nid2" accept="image/*">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="un-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="un-cv file-hide" id="cv" accept="application/pdf">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="un-certificate-upload certificate-upload" id="union_cartificate_front_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img"
                    id="union_cartificate_front_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="un-certificate file-hide" id="certificate">
            </button>
        </div>
        <hr>
        <h4 class="input-label" for="parent_id">অ্যাডমিনের অধীনে</h4>

        <label class="input-label" for="up_admin">জেলা এডমিন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
            </span>

            <select class="input-box select-box district_admin district_admin_4" data-tab="4"
                required>
                <option value="">জেলা অ্যাডমিন নির্বাচন করুন </option>
                @if($district_admins->count() > 0)
                    @foreach ($district_admins as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                @endif

            </select>
        </div>

        <label class="input-label" for="up_admin">উপজেলা এডমিন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
            </span>

            <select name="parent_id" id="parent_id" class="input-box select-box upozila_admin upozila_admin_4" data-tab="4"
                required>
                <option value="">উপজেলা অ্যাডমিন নির্বাচন করুন </option>


            </select>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>

    <!-- ওর্য়াড এডমিন -->
    <form class="member-add-form contents"action="{{ route('super-admin.user.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <input type="hidden" name="role" value="{{\App\Models\User::USER_ROLE_WARD_ADMIN}}">
        <h6 class="text-center fw-bold">ওর্য়াড এডমিন</h6>
        <button type="button" class="wor-profile-photo profile-photo" id="wa_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon" id="wa_profile_photo">
            <input type="file" name="photo" class="wor-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father" id="father_name"
                placeholder="পিতার নাম (বাংলা)" required>
        </div>

        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <!-- month -->
                <select name="dob[month]" required>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select name="dob[day]" required>
                    @foreach (ENGLISH_DAYS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.day') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                @php
                    $currentYear = date('Y');
                    $startYear = 1950;
                    $years = range($currentYear, $startYear);
                @endphp
                <!-- year -->
                <select class="year-select" name="dob[year]" required>
                    @foreach ($years as $value)
                        <option value="{{$value}}" {{old('date_of_birth.year') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label class="input-label" for="id_no">আইডি নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
                <img src="{{ asset('SuperAdmin/assets/img/card.png')}}" alt="card icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="id_no" id="id_no"
                placeholder="আইডি নং" value="{{generateFormattedNumber()}}" required readonly>
        </div>

        <label class="input-label" for="mobile_no">মোবাইল নং </label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/number.png')}}" alt="number icon">
            </span>
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="phone" id="mobile_no"
                placeholder="01402860617..." required>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email"
                id="email_address" placeholder="example@gmail.com" required>
        </div>

        <label class="input-label" for="email_address">পাসওয়ার্ড</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="password">
                <img src="{{ asset('front/assets/img/password.png')}}" alt="password icon">
            </span>
            <input type="password" class="input-box form-control shadow-none" name="password"
                id="password" placeholder="পাসওয়ার্ড" required>
        </div>

        <label class="input-label" for="division">বিভাগ</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="division">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="division" id="division_id" class="input-box select-box division division_4" data-tab="4"
                required>
                <option value="">নির্বাচন করুন বিভাগ</option>
                @foreach ($division as $div)
                    <option value="{{ $div->id }}" {{old('division_id') == $div->id ? 'selected' : ''}}>{{ $div->name }}</option>
                @endforeach
            </select>
        </div>

        <label class="input-label" for="dristrick">জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="district" id="district_id" class="input-box select-box district district_4" data-tab="4"
                required>
                <option value="">জেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Upazilla">উপ‌জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="upozila" id="upazila_id" class="input-box select-box upazila upazila_4" data-tab="4" required>
                <option value="">উপজেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Union">ইউনিয়ন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Union">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="union" id="union_id" class="input-box select-box union union_4" data-tab="4" required>
                <option value="">ইউনিয়ন নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="word">ওয়ার্ড</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="word">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="ward" id="word"
                placeholder="ওয়ার্ড" required>
        </div>

        <div class="nid-card-area">
            <div>
                <label class="input-label" for="nid1">এনআইডি ফ্রন্ট</label>
                <button type="button" class="wor-nid-card1 nid-card1" id="wa_nid_front_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-1.jpg')}}" alt="nid card" id="wa_nid_front_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_front" class="wor-nid1 file-hide" id="nid1" accept="image/*">
                </button>
            </div>
            <div>
                <label class="input-label" for="nid2">এনআইডি ব্যাক</label>
                <button type="button" class="wor-nid-card2 nid-card2" id="wa_nid_back_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-2.jpg')}}" alt="nid card" id="wa_nid_back_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid_back" class="wor-nid2 file-hide" id="nid2" accept="image/*">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="wor-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="wor-cv file-hide" id="cv" accept="application/pdf">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="wor-certificate-upload certificate-upload" id="wa_nid_certificate_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img"
                    id="wa_nid_certificate_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="wor-certificate file-hide" id="certificate">
            </button>
        </div>

        <hr>
        <h4 class="input-label" for="parent_id">অ্যাডমিনের অধীনে</h4>

        <label class="input-label" for="up_admin">জেলা এডমিন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
            </span>

            <select class="input-box select-box district_admin district_admin_5" data-tab="5"
                required>
                <option value="">জেলা অ্যাডমিন নির্বাচন করুন </option>
                @if($district_admins->count() > 0)
                    @foreach ($district_admins as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                @endif

            </select>
        </div>

        <label class="input-label" for="up_admin">উপজেলা এডমিন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
            </span>

            <select  class="input-box select-box upozila_admin upozila_admin_5" data-tab="5"
                required>
                <option value="">উপজেলা অ্যাডমিন নির্বাচন করুন </option>


            </select>
        </div>
        <label class="input-label" for="union_admin">ইউনিয়ন এডমিন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
            </span>

            <select name="parent_id" id="parent_id" class="input-box select-box union_admin union_admin_5" data-tab="5"
                required>
                <option value="">উপজেলা অ্যাডমিন নির্বাচন করুন </option>


            </select>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>

    <!-- send money end -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/UserCreate.css')}}">
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
        $(document).ready(function () {
            // Handle file selection and update the image
            $('#union_profile_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#union_profile_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#wa_profile_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#wa_profile_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#admin_profile_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#admin_profile_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#admin_nid_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#admin_nid_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#admin_nid_back_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#admin_nid_back_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#admin_cartificate_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#admin_cartificate_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#upozila_profile_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#upozila_profile_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#upozila_nid_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#upozila_nid_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#upozila_nid_back_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#upozila_nid_back_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#upozila_cartificate_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#upozila_cartificate_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#union_nid_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#union_nid_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#union_nid_backend_input').on('change', function (event) {
                const file = event.target.files[0];
                console.log('union_nid_backend_input', file)
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#union_nid_backend_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#union_cartificate_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#union_cartificate_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#wa_nid_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#wa_nid_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#wa_nid_back_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#wa_nid_back_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#wa_nid_certificate_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#wa_nid_certificate_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#dis_profile_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#dis_profile_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#dis_nid_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#dis_nid_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#dis_nid_back_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#dis_nid_back_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#dis_cartificate_front_input').on('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#dis_cartificate_front_photo').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            //division, district, upazilla fatch
            // Fetch districts based on division selection
            $(document).on('change', '.division', function () {
                let tab = $(this).data('tab')
                var divisionId = $(this).val();
                console.log('divisionId', divisionId)
                if (divisionId) {
                    $.ajax({
                        url: '/get-districts/' + divisionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if ($('.district_' + tab).length > 0) {
                                $('.district_' + tab).empty().append(
                                    '<option value="">নির্বাচন করুন জেলা</option>');
                                $.each(data, function (key, value) {
                                    $('.district_' + tab).append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });

                            }
                            if ($('.upazila_' + tab).length > 0) {
                                $(`.upazila_${tab}`).empty().append(
                                    '<option value="">উপজেলা নির্বাচন করুন</option>'
                                ); // Reset upozila dropdown
                            }


                        }
                    });
                } else {
                    if ($('.district_' + tab).length > 0) {
                        $('.district_' + tab).empty().append('<option value="">নির্বাচন করুন জেলা</option>');
                    }
                    if ($('.upazila_' + tab).length > 0) {
                        $(`.upazila_${tab}`).empty().append('<option value="">উপজেলা নির্বাচন করুন</option>');
                    }
                }
            });

            // Fetch upozilas based on district selection

            $(document).on('change', '.district', function () {
                let tab = $(this).data('tab')
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/get-upozilas/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if ($('.upazila_' + tab).length > 0) {
                                $('.upazila_' + tab).empty().append(
                                    '<option value="">উপজেলা নির্বাচন করুন</option>');
                                $.each(data, function (key, value) {
                                    $('.upazila_' + tab).append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            }

                        }
                    });
                } else {
                    if ($('.upazila_' + tab).length > 0) {
                        $('.upazila_' + tab).empty().append('<option value="">উপজেলা নির্বাচন করুন</option>');
                    }
                }
            });

            // Fetch Union based on upazila_id selection
            $(document).on('change', '.upazila', function () {
                let tab = $(this).data('tab')
                var upozilaId = $(this).val();
                if (upozilaId) {
                    $.ajax({
                        url: '/get-unions/' + upozilaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if ($('.union_' + tab).length > 0) {
                                $('.union_' + tab).empty().append(
                                    '<option value="">ইউনিয়ন নির্বাচন করুন</option>');
                                $.each(data, function (key, value) {
                                    $('.union_' + tab).append('<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }

                        }
                    });
                } else {
                    if ($('.union_' + tab).length > 0) {
                        $('.union_' + tab).empty().append('<option value="">ইউনিয়ন নির্বাচন করুন</option>');
                    }
                }
            });

            //under admin search
            $(document).on('change', '.district_admin', function () {
                let tab  = $(this).data('tab')
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: '/super-admin/get-upozila-admins/' + district_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if(Object.keys(data).length > 0){
                                $('.upozila_admin_'+tab).empty().append(
                                    '<option value="">উপজেলা এডমিন নির্বাচন করুন </option>');
                                $.each(data, function (key, value) {
                                    $('.upozila_admin_'+tab).append('<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }

                        }
                    });
                } else {
                    if ($('.upozila_admin_'+tab).length > 0) {
                        $('.upozila_admin_'+tab).empty().append(
                                    '<option value="">উপজেলা এডমিন নির্বাচন করুন </option>');
                    }
                }
            });
            $(document).on('change', '.upozila_admin', function () {
                let tab  = $(this).data('tab')
                var upozila_id = $(this).val();
                if (upozila_id) {
                    $.ajax({
                        url: '/super-admin/get-union-admins/' + upozila_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if(Object.keys(data).length > 0){
                                $('.union_admin_'+tab).empty().append(
                                    '<option value="">ইউনিয়ন এডমিন নির্বাচন করুন </option>');
                                $.each(data, function (key, value) {
                                    $('.union_admin_'+tab).append('<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }

                        }
                    });
                } else {
                    if ($('.union_admin_'+tab).length > 0) {
                        $('.union_admin_'+tab).empty().append(
                                    '<option value="">ইউনিয়ন এডমিন নির্বাচন করুন </option>');
                    }
                }
            });
            // $(document).on('change', '#under_up_admin', function () {

            //     var upozilaId = $(this).val();
            //     if (upozilaId) {
            //         $.ajax({
            //             url: '/super-admin/get-union-admins/' + upozilaId,
            //             type: 'GET',
            //             dataType: 'json',
            //             success: function (data) {
            //                 if(Object.keys(data).length > 0){
            //                     $('#under_union_admin').empty().append(
            //                         '<option value="">ইউনিয়ন এডমিন নির্বাচন করুন </option>');
            //                     $.each(data, function (key, value) {
            //                         $('#under_union_admin').append('<option value="' + value.id + '">' +
            //                             value.name + '</option>');
            //                     });
            //                 }

            //             }
            //         });
            //     } else {
            //         if ($('#under_union_admin').length > 0) {
            //             $('#under_union_admin').empty().append(
            //                         '<option value="">ইউনিয়ন এডমিন নির্বাচন করুন </option>');
            //         }
            //     }
            // });
        });
    </script>
@endpush
