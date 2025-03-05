@extends('SuperAdmin.layouts.app')

@section('content')

    <div class="tab-btns">
        <button type="button" class="active-btn buttons">এডমিন/সাব এডমিন</button>
        <button type="button" class="buttons">উপজেলা এডমিন</button>
        <button type="button" class="buttons">ইউনিয়ন এডমিন</button>
        <button type="button" class="buttons">ওর্য়াড এডমিন</button>
    </div>

    <!-- এডমিন/সাব এডমিন -->
    <form class="member-add-form contents active_section" action="#" method="POST">
        <h6 class="text-center fw-bold">এডমিন/সাব এডমিন</h6>
        <button type="button" class="admin-profile-photo profile-photo" id="admin_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" id="admin_profile_photo" alt="profile icon">
            <input type="file" name="profile-inp" class="admin-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">ধরন</label>
        <div class="input-group select-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="duration">
                <img src="http://seba_card_management_system.test/assets/img//term.png" alt="term icon">
            </span>
            <select class="input-box select-box" name="duration_year" id="duration" required="">
                <option value="{{\App\Models\User::USER_ROLE_SUPERADMIN}}">{{strtoupper(\App\Models\User::USER_ROLE_SUPERADMIN)}}</option>
                <option value="{{\App\Models\User::USER_ROLE_ADMIN}}">{{strtoupper(\App\Models\User::USER_ROLE_ADMIN)}}</option>

            </select>
        </div>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" require>
        </div>



        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <!-- month -->
                <select>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select>
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
                <select class="year-select">
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
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="mobile_no" id="mobile_no"
                placeholder="01402860617..." require>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email_address"
                id="email_address" placeholder="example@gmail.com" require>
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
                    <input type="file" name="nid1" class="admin-nid1 file-hide" id="nid1">
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
                    <input type="file" name="nid2" class="admin-nid2 file-hide" id="nid2">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="admin-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="admin-cv file-hide" id="cv">
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

    <!-- উপজেলা এডমিন -->
    <form class="member-add-form contents" action="#" method="POST">
        <h6 class="text-center fw-bold">উপজেলা এডমিন</h6>
        <button type="button" class="up-profile-photo profile-photo" id="upozila_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon" id="upozila_profile_photo">
            <input type="file" name="profile-inp" class="up-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" require>
        </div>

        <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father_name" id="father_name"
                placeholder="পিতার নাম (বাংলা)" require>
        </div>

        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <!-- month -->
                <select>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select>
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
                <select class="year-select">
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
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="mobile_no" id="mobile_no"
                placeholder="01402860617..." require>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email_address"
                id="email_address" placeholder="example@gmail.com" require>
        </div>

        <label class="input-label" for="division">বিভাগ</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0 " id="division" >
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="division_id" id="division_id" class="input-box select-box division division_2" data-tab="2" required>
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
            <select name="district_id" id="district_id" class="input-box select-box district district_2" data-tab="2" required>
                <option value="">জেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Upazilla">উপ‌জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="upazila_id" id="upazila_id" class="input-box select-box upazila upazila_2" data-tab="2" required>
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
                    <input type="file" name="nid1" class="up-nid1 file-hide" id="nid1" accept="image/*">
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
                    <input type="file" name="nid2" class="up-nid2 file-hide" id="nid2" accept="image/*">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="up-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="up-cv file-hide" id="cv">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="up-certificate-upload certificate-upload" id="upozila_cartificate_front_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img" id="upozila_cartificate_front_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="up-certificate file-hide" id="certificate" accept="image/*">
            </button>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>

    <!-- ইউনিয়ন এডমিন -->
    <form class="member-add-form contents" action="#" method="POST">
        <h6 class="text-center fw-bold">ইউনিয়ন এডমিন</h6>
        <button type="button" class="un-profile-photo profile-photo" id="union_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon" id="union_profile_photo">
            <input type="file" name="profile-inp" class="un-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" require>
        </div>

        <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father_name" id="father_name"
                placeholder="পিতার নাম (বাংলা)" require>
        </div>

        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <!-- month -->
                <select>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select>
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
                <select class="year-select">
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
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="mobile_no" id="mobile_no"
                placeholder="01402860617..." require>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email_address"
                id="email_address" placeholder="example@gmail.com" require>
        </div>

        <label class="input-label" for="division">বিভাগ</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="division">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="division_id" id="division_id" class="input-box select-box division division_3" data-tab="3" required>
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
            <select name="district_id" id="district_id" class="input-box select-box district district_3" data-tab="3" required>
                <option value="">জেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Upazilla">উপ‌জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="upazila_id" id="upazila_id" class="input-box select-box upazila upazila_3" data-tab="3" required>
                <option value="">উপজেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Union">ইউনিয়ন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Union">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="union_id" id="union_id" class="input-box select-box union union_3" data-tab="3">
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
                    <input type="file" name="nid1" class="un-nid1 file-hide" id="nid1">
                </button>
            </div>
            <div>
                <label class="input-label" for="nid2">এনআইডি ব্যাক</label>
                <button type="button" class="un-nid-card2 nid-card2" id="union_nid_backend_input">
                    <img src="{{ asset('SuperAdmin/assets/img/NID-2.jpg')}}" alt="un-nid card nid card" id="union_nid_backend_photo">
                    <div class="upload-icon">
                        <div>
                            <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                        </div>
                    </div>
                    <input type="file" name="nid2" class="un-nid2 file-hide" id="nid2">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="un-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="un-cv file-hide" id="cv">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="un-certificate-upload certificate-upload" id="union_cartificate_front_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img" id="union_cartificate_front_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="un-certificate file-hide" id="certificate">
            </button>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>

    <!-- ওর্য়াড এডমিন -->
    <form class="member-add-form contents" action="#" method="POST">
        <h6 class="text-center fw-bold">ওর্য়াড এডমিন</h6>
        <button type="button" class="wor-profile-photo profile-photo" id="wa_profile_input">
            <img src="{{ asset('SuperAdmin/assets/img/profile.png')}}" alt="profile icon" id="wa_profile_photo">
            <input type="file" name="profile-inp" class="wor-profile-inp file-hide">
        </button>

        <label class="input-label" for="name">নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
                placeholder="নাম (বাংলা)" require>
        </div>

        <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father_name" id="father_name"
                placeholder="পিতার নাম (বাংলা)" require>
        </div>

        <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
        <div class="input-group mb-2">
            <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
            </span>
            <div class="birth-date">
                <!-- month -->
                <select>
                    @foreach (ENGLISH_MONTHS as $value)
                        <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>

                <!-- day -->
                <select>
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
                <select class="year-select">
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
            <input type="number" maxlength="40" class="input-box form-control shadow-none" name="mobile_no" id="mobile_no"
                placeholder="01402860617..." require>
        </div>

        <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
            </span>
            <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email_address"
                id="email_address" placeholder="example@gmail.com" require>
        </div>

        <label class="input-label" for="division">বিভাগ</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="division">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="division_id" id="division_id" class="input-box select-box division division_4" data-tab="4" required>
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
            <select name="district_id" id="district_id" class="input-box select-box district district_4" data-tab="4" required>
                <option value="">জেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Upazilla">উপ‌জেলা</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="upazila_id" id="upazila_id" class="input-box select-box upazila upazila_4" data-tab="4" required>
                <option value="">উপজেলা নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="Union">ইউনিয়ন</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="Union">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <select name="union_id" id="union_id" class="input-box select-box union union_4" data-tab="4" required>
                <option value="">ইউনিয়ন নির্বাচন করুন</option>
            </select>
        </div>

        <label class="input-label" for="word">ওয়ার্ড</label>
        <div class="input-group mb-2">
            <span class="input-box-icon input-group-text rounded-end-0" id="word">
                <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
            </span>
            <input type="text" maxlength="40" class="input-box form-control shadow-none" name="word" id="word"
                placeholder="ওয়ার্ড" require>
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
                    <input type="file" name="nid1" class="wor-nid1 file-hide" id="nid1">
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
                    <input type="file" name="nid2" class="wor-nid2 file-hide" id="nid2">
                </button>
            </div>
        </div>
        <div class="cv-upload-area">
            <label class="input-label" for="cv">সিভি আপলোড</label>
            <div>
                <div>
                    <button type="button" class="wor-cv-upload cv-upload">
                        <img src="{{ asset('SuperAdmin/assets/img/cv upload.webp')}}" alt="nid card">
                        <input type="file" name="cv" class="wor-cv file-hide" id="cv">
                    </button>
                </div>
                <div class="demo-cv">Demo CV</div>
            </div>
        </div>
        <div class="certificate-upload-area">
            <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
            <button type="button" class="wor-certificate-upload certificate-upload" id="wa_nid_certificate_input">
                <img src="{{ asset('SuperAdmin/assets/img/certificate.jpg')}}" alt="certificate img" id="wa_nid_certificate_photo">
                <div class="upload-icon">
                    <div>
                        <img src="{{ asset('SuperAdmin/assets/img/uploads.png')}}" alt="">
                    </div>
                </div>
                <input type="file" name="certificate" class="wor-certificate file-hide" id="certificate">
            </button>
        </div>

        <button type="submit" class="button save-btn">Save</button>
    </form>

    <!-- send money end -->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('SuperAdmin/assets/css/UserCreate.css')}}">
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
            //division, district, upazilla fatch
            // Fetch districts based on division selection
            $(document).on('change', '.division', function() {
                let tab = $(this).data('tab')
                var divisionId = $(this).val();
                console.log('divisionId', divisionId)
                if (divisionId) {
                    $.ajax({
                        url: '/get-districts/' + divisionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if($('.district_'+tab).length > 0){
                                $('.district_'+tab).empty().append(
                                '<option value="">নির্বাচন করুন জেলা</option>');
                                $.each(data, function(key, value) {
                                    $('.district_'+tab).append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });

                            }
                            if($('.upazila_'+tab).length > 0){
                                $(`.upazila_${tab}`).empty().append(
                                    '<option value="">উপজেলা নির্বাচন করুন</option>'
                                ); // Reset upozila dropdown
                            }


                        }
                    });
                } else {
                    if($('.district_'+tab).length > 0){
                        $('.district_'+tab).empty().append('<option value="">নির্বাচন করুন জেলা</option>');
                    }
                    if($('.upazila_'+tab).length > 0){
                        $(`.upazila_${tab}`).empty().append('<option value="">উপজেলা নির্বাচন করুন</option>');
                    }
                }
            });

            // Fetch upozilas based on district selection

            $(document).on('change', '.district', function() {
                let tab = $(this).data('tab')
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/get-upozilas/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if($('.upazila_'+tab).length > 0){
                                $('.upazila_'+tab).empty().append(
                                '<option value="">উপজেলা নির্বাচন করুন</option>');
                                $.each(data, function(key, value) {
                                    $('.upazila_'+tab).append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            }

                        }
                    });
                } else {
                    if($('.upazila_'+tab).length > 0){
                        $('.upazila_'+tab).empty().append('<option value="">উপজেলা নির্বাচন করুন</option>');
                    }
                }
            });

            // Fetch Union based on upazila_id selection
            $(document).on('change', '.upazila', function() {
                let tab = $(this).data('tab')
                var upozilaId = $(this).val();
                if (upozilaId) {
                    $.ajax({
                        url: '/get-unions/' + upozilaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if($('.union_'+tab).length > 0){
                                $('.union_'+tab).empty().append(
                                '<option value="">ইউনিয়ন নির্বাচন করুন</option>');
                                $.each(data, function(key, value) {
                                    $('.union_'+tab).append('<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }

                        }
                    });
                } else {
                    if($('.union_'+tab).length > 0){
                        $('.union_'+tab).empty().append('<option value="">ইউনিয়ন নির্বাচন করুন</option>');
                    }
                }
            });
        });
    </script>
@endpush
