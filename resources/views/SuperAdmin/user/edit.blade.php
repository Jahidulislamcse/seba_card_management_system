@extends('SuperAdmin.layouts.app')

@section('content')
<!-- ইউনিয়ন এডমিন -->
<form class="member-add-form"action="{{ route('super-admin.user.update',$user->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate
x-data="editAdmin({{$user}})">
    @csrf
    @method('PUT')
    <button type="button" class="un-profile-photo profile-photo" id="union_profile_input">
        <img src="{{$user->photo_url }}" alt="profile icon" id="union_profile_photo">
        <input type="file" name="photo" class="un-profile-inp file-hide">
    </button>

    <label class="input-label" for="role">এডমিন প্রকার</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="role">
            <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
        </span>
        <select name="role" id="role_id" class="input-box select-box "
        x-model="role"
        @change="role = $event.target.value"
        required>
            <option value="">এডমিন প্রকার নির্বাচন করুন</option>
                <option value="{{\App\Models\User::USER_ROLE_DIS_ADMIN}}" {{$user->role == \App\Models\User::USER_ROLE_DIS_ADMIN ? 'selected' : ''}}>জেলা এডমিন</option>
                <option value="{{\App\Models\User::USER_ROLE_UPO_ADMIN}}" {{$user->role == \App\Models\User::USER_ROLE_UPO_ADMIN ? 'selected' : ''}}>উপজেলা এডমিন</option>
                <option value="{{\App\Models\User::USER_ROLE_UNI_ADMIN}}" {{$user->role == \App\Models\User::USER_ROLE_UNI_ADMIN ? 'selected' : ''}}>ইউনিয়ন এডমিন</option>
                <option value="{{\App\Models\User::USER_ROLE_WARD_ADMIN}}" {{$user->role == \App\Models\User::USER_ROLE_WARD_ADMIN ? 'selected' : ''}}>ওর্য়াড  এডমিন</option>

        </select>
    </div>

    <label class="input-label" for="name">নাম (বাংলা)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="name">
            <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name" id="name"
            placeholder="নাম (বাংলা)" value="{{old('name',$user->name)}}" required>
    </div>

    <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
            <img src="{{ asset('SuperAdmin/assets/img/name.png')}}" alt="name icon">
        </span>
        <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father" id="father_name"
            placeholder="পিতার নাম (বাংলা)" value="{{old('father',$user->father)}}" required>
    </div>
    {{-- {{ dd(\Carbon\Carbon::parse($user->birth_date)->month )}} --}}

    <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
    <div class="input-group mb-2">
        <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
            <img src="{{ asset('SuperAdmin/assets/img/date.png')}}" alt="date icon">
        </span>
        <div class="birth-date">
            <select name="dob[month]" required>
                @foreach (ENGLISH_MONTHS as $key => $value)
                    <option value="{{$value}}" {{old('date_of_birth.month') == $value ? 'selected' : ''}}
                    {{\Carbon\Carbon::parse($user->birth_date)->month == $key +1 ? 'selected' : ''}}
                    >{{$value}}</option>
                @endforeach
            </select>

            <!-- day -->
            <select name="dob[day]" required>
                @foreach (ENGLISH_DAYS as $value)
                    <option value="{{$value}}" {{\Carbon\Carbon::parse($user->birth_date)->day == $value ? 'selected' : ''}}>{{$value}}</option>
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
                    <option value="{{$value}}" {{\Carbon\Carbon::parse($user->birth_date)->year == $value ? 'selected' : ''}}>{{$value}}</option>
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
            placeholder="আইডি নং" value="{{$user->id_no}}" required readonly>
    </div>

    <label class="input-label" for="mobile_no">মোবাইল নং </label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
            <img src="{{ asset('SuperAdmin/assets/img/number.png')}}" alt="number icon">
        </span>
        <input type="number" maxlength="40" class="input-box form-control shadow-none" name="phone" id="mobile_no"
            placeholder="01402860617..." value="{{old('phone',$user->phone)}}" required>
    </div>

    <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
            <img src="{{ asset('SuperAdmin/assets/img/email.png')}}" alt="email icon">
        </span>
        <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email" id="email_address"
            placeholder="example@gmail.com" value="{{old('email',$user->email)}}" required>
    </div>

    <label class="input-label" for="email_address">পাসওয়ার্ড</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="password">
            <img src="{{ asset('front/assets/img/password.png')}}" alt="password icon">
        </span>
        <input type="password" class="input-box form-control shadow-none" name="password" id="password"
            placeholder="পাসওয়ার্ড" >
    </div>

    <label class="input-label" for="division">বিভাগ</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="division">
            <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
        </span>
        <select name="division" id="division_id" class="input-box select-box division division_3" data-tab="3" required>
            <option value="">নির্বাচন করুন বিভাগ</option>
            @foreach ($division as $div)
                <option value="{{ $div->id }}" {{$user->division_id == $div->id ? 'selected' : ''}}>{{ $div->name }}</option>
            @endforeach
        </select>
    </div>
    @php $districts = \App\Models\District::where('division_id', $user->division_id)->get(); @endphp

    <label class="input-label" for="dristrick">জেলা</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
            <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
        </span>
        <select name="district" id="district_id" class="input-box select-box district district_3" data-tab="3" required>
            <option value="">জেলা নির্বাচন করুন</option>
            @foreach ($districts as $dis)
                <option value="{{ $dis->id }}" {{$user->district_id == $dis->id ? 'selected' : ''}}>{{ $dis->name }}</option>
            @endforeach
        </select>
    </div>


    @php $upazilas = \App\Models\Upazila::where('district_id', $user->district_id)->get(); @endphp

    <label class="input-label" for="Upazilla">উপ‌জেলা</label>
    <div class="input-group mb-2">
        <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
            <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
        </span>
        <select name="upozila" id="upazila_id" class="input-box select-box upazila upazila_3" data-tab="3" required>
            <option value="">উপজেলা নির্বাচন করুন</option>
            @foreach ($upazilas as $up)
                <option value="{{ $up->id }}" {{$user->upazila_id == $up->id ? 'selected' : ''}}>{{ $up->name }}</option>
            @endforeach
        </select>
    </div>
    @php
        $unions = \App\Models\Union::where('upazilla_id', $user->upazila_id)->get();
    @endphp
    <!-- Conditional Rendering -->
    <template x-if="role == 'uni_admin' || role == 'ward_admin'">
        <div>
            <label class="input-label" for="Union">ইউনিয়ন</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0" id="Union">
                    <img src="{{ asset('SuperAdmin/assets/img/city.png') }}" alt="city icon">
                </span>
                <select name="union" id="union_id" class="input-box select-box union union_3" data-tab="3">
                    <option value="">ইউনিয়ন নির্বাচন করুন</option>
                    @foreach ($unions as $uni)
                        <option value="{{ $uni->id }}" {{$user->union_id == $uni->id ? 'selected' : ''}}>{{ $uni->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </template>
    <template x-if="role == 'ward_admin'">
        <div>
            <label class="input-label" for="word">ওয়ার্ড</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0" id="word">
                    <img src="{{ asset('SuperAdmin/assets/img/city.png') }}" alt="city icon">
                </span>
                <input type="text" maxlength="40" class="input-box form-control shadow-none" name="ward" id="word"
                    placeholder="ওয়ার্ড" value="{{$user->ward}}" required>
            </div>
        </div>
    </template>





    <div class="nid-card-area">
        <div>
            <label class="input-label" for="nid1">এনআইডি ফ্রন্ট</label>
            <button type="button" class="un-nid-card1 nid-card1" id="union_nid_front_input">
                <img src="{{ $user->nid_front_url}}" alt="nid card" id="union_nid_front_photo">
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
                <img src="{{ $user->nid_back_url}}" alt="un-nid card nid card"
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
                    <img src="{{ $user->cv_url}}" alt="nid card">
                    <input type="file" name="cv" class="un-cv file-hide" id="cv" accept="application/pdf">
                </button>
            </div>
            <div class="demo-cv">
                <a href="{{ ($user->cv_url) }}" target="_blank"> Download</a>
            </div>
        </div>
    </div>
    <div class="certificate-upload-area">
        <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
        <button type="button" class="un-certificate-upload certificate-upload" id="union_cartificate_front_input">
            <img src="{{ $user->certificate_url }}" alt="certificate img"
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
    @php
    $district_admin = $user->getDistrictAdmin() ?? '';
    $upozila_admin = $user->getUpazilaAdmin() ?? '';
    $union_admin = $user->getUnionAdmin() ?? '';
    $district_upozila_admins = '';
    $upozila_union_admins = '';
    if(!empty($district_admin) && $district_admin){
        $district_upozila_admins = \App\Models\User::where('parent_id', $district_admin->id)->where('role', 'upo_admin')->get();

    }
    if(!empty($upozila_admin) && $upozila_admin){
        $upozila_union_admins = \App\Models\User::where('parent_id', $upozila_admin->id)->where('role', 'uni_admin')->get();

    }
    @endphp
    {{-- {{dd($user->getDistrictAdmin())}} --}}
    <template x-if="role == 'ward_admin' ">
        <div>
            <label class="input-label" for="up_admin">জেলা এডমিন</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0" id="par">
                    <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
                </span>

                <select class="input-box select-box district_admin district_admin_4" data-tab="4" required>
                    <option value="">জেলা অ্যাডমিন নির্বাচন করুন</option>
                    @if ($district_admins->count() > 0)
                        @foreach ($district_admins as $data)
                            <option value="{{ $data->id }}" {{($user->getDistrictAdmin() != null) && $user->getDistrictAdmin()->id == $data->id ? 'selected' : ''}}>{{ $data->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <label class="input-label" for="up_admin">উপজেলা এডমিন</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                    <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
                </span>

                <select  class="input-box select-box upozila_admin upozila_admin_4" data-tab="4"
                    required>
                    <option value="">উপজেলা অ্যাডমিন নির্বাচন করুন </option>
                    @if (!empty($district_upozila_admins) && $district_upozila_admins->count() > 0)
                        @foreach ($district_upozila_admins as $data)
                            <option value="{{ $data->id }}" {{($upozila_admin != null) && $upozila_admin->id == $data->id ? 'selected' : ''}}>{{ $data->name }}</option>
                        @endforeach
                    @endif

                </select>
            </div>

            <label class="input-label" for="Union">ইউনিয়ন</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0" id="Union">
                    <img src="{{ asset('SuperAdmin/assets/img/city.png')}}" alt="city icon">
                </span>
                <select name="parent_id" id="union_id" class="input-box select-box union union_admin_4" data-tab="4" required>
                    <option value="">ইউনিয়ন নির্বাচন করুন</option>
                    @if (!empty($upozila_union_admins) && $upozila_union_admins->count() > 0)
                        @foreach ($upozila_union_admins as $uni)
                            <option value="{{ $uni->id }}" {{($union_admin != null) && $union_admin->id == $uni->id ? 'selected' : ''}}>{{ $uni->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        </div>
    </template>

    <template x-if="role == 'uni_admin' ">
        <div>
            <label class="input-label" for="up_admin">জেলা এডমিন</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0" id="par">
                    <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
                </span>

                <select class="input-box select-box district_admin district_admin_4" data-tab="4" required>
                    <option value="">জেলা অ্যাডমিন নির্বাচন করুন</option>
                    @if ($district_admins->count() > 0)
                        @foreach ($district_admins as $data)
                            <option value="{{ $data->id }}" {{($user->getDistrictAdmin() != null) && $user->getDistrictAdmin()->id == $data->id ? 'selected' : ''}}>{{ $data->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <label class="input-label" for="up_admin">উপজেলা এডমিন</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0 " id="par">
                    <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
                </span>

                <select  name="parent_id" class="input-box select-box upozila_admin upozila_admin_4" data-tab="4"
                    required>
                    <option value="">উপজেলা অ্যাডমিন নির্বাচন করুন </option>
                    @if (!empty($district_upozila_admins) && $district_upozila_admins->count() > 0)
                        @foreach ($district_upozila_admins as $data)
                            <option value="{{ $data->id }}" {{($upozila_admin != null) && $upozila_admin->id == $data->id ? 'selected' : ''}}>{{ $data->name }}</option>
                        @endforeach
                    @endif

                </select>
            </div>



        </div>
    </template>
    <template x-if="role == 'upo_admin' ">
        <div>
            <label class="input-label" for="up_admin">জেলা এডমিন</label>
            <div class="input-group mb-2">
                <span class="input-box-icon input-group-text rounded-end-0" id="par">
                    <img src="http://seba_card_management_system.test/SuperAdmin/assets/img/city.png" alt="city icon">
                </span>

                <select name="parent_id" class="input-box select-box district_admin district_admin_4" data-tab="4" required>
                    <option value="">জেলা অ্যাডমিন নির্বাচন করুন</option>
                    @if ($district_admins->count() > 0)
                        @foreach ($district_admins as $data)
                            <option value="{{ $data->id }}" {{($user->getDistrictAdmin() != null) && $user->getDistrictAdmin()->id == $data->id ? 'selected' : ''}}>{{ $data->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>




        </div>
    </template>



    <button type="submit" class="button save-btn">Save</button>
</form>
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
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('editAdmin', (user) => ({
            user, // Correctly assign the passed user data
            role:user.role,
            init() {
                //ajax csrf setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            }
        }));
    });
</script>
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
            // $('#wa_profile_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#wa_profile_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#admin_profile_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#admin_profile_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#admin_nid_front_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#admin_nid_front_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#admin_nid_back_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#admin_nid_back_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#admin_cartificate_front_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#admin_cartificate_front_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#upozila_profile_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#upozila_profile_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#upozila_nid_front_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#upozila_nid_front_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#upozila_nid_back_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#upozila_nid_back_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#upozila_cartificate_front_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#upozila_cartificate_front_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
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
            // $('#wa_nid_front_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#wa_nid_front_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#wa_nid_back_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#wa_nid_back_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#wa_nid_certificate_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#wa_nid_certificate_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#dis_profile_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#dis_profile_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#dis_nid_front_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#dis_nid_front_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#dis_nid_back_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#dis_nid_back_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
            // $('#dis_cartificate_front_input').on('change', function (event) {
            //     const file = event.target.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function (e) {
            //             $('#dis_cartificate_front_photo').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });
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

                $('.upozila_admin_'+tab).empty();
                $('.union_admin_'+tab).empty();

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
                $('.union_admin_'+tab).empty();

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

        });
    </script>
@endpush
