<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/Authentication.css') }}">
    <title>সাইনআপ করুন | Sheba Card Portal</title>
</head>

<body>
    <div class="containers">
        <div class="content">
            <a href="index.html" class="logo auth-logo">
                <img src="{{ asset('front/assets/img/logo.jpg') }}" alt="">
                <div class="logo-details">
                    <h4>সেবা কার্ড পোর্টাল</h4>
                    <p>Qtech Bangladesh</p>
                </div>
            </a>

            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="button" class="up-profile-photo profile-photo">
                    <img src="{{ asset('front/assets/img/profile.png') }}" alt="profile icon">
                    <input type="file" name="photo" id="photo" class="up-profile-inp file-hide">
                </button> <br>



                <label for="">পদবী সিলেক্ট করুন</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="name">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="name icon">
                    </span>
                    <select name="role" id="role" class="input-box form-control shadow-none" required>
                        <option value="">পদবী</option>
                        <option value="upo_admin">উপজেলা এডমিন</option>
                        <option value="uni_admin">ইউনিয়ন এডমিন</option>
                        <option value="ward_admin">ওর্য়াড এডমিন</option>
                    </select>
                </div>

                <label class="input-label" for="name">নাম (বাংলা)</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="name">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="name icon">
                    </span>
                    <input type="text" maxlength="40" class="input-box form-control shadow-none" name="name"
                        id="name" placeholder="নাম (বাংলা)" required>
                </div>

                <label class="input-label" for="father_name">পিতার নাম (বাংলা)</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="father_name">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="name icon">
                    </span>
                    <input type="text" maxlength="40" class="input-box form-control shadow-none" name="father"
                        id="father" placeholder="পিতার নাম (বাংলা)">
                </div>

                <label class="input-label" for="birth-date">জন্ম তা‌রিখ </label>
                <div class="input-group mb-2">
                    <span class="input-box-icon select-group input-group-text rounded-end-0" id="birth-date">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="date icon">
                    </span>
                    <div class="birth-date" lang="bn">
                        <!-- Month Dropdown -->
                        <select name="month" id="month-select" required>
                            <option value="" disabled selected>মাস নির্বাচন করুন</option>
                            <option value="জানুয়ারি">জানুয়ারি</option>
                            <option value="ফেব্রুয়ারি">ফেব্রুয়ারি</option>
                            <option value="মার্চ">মার্চ</option>
                            <option value="এপ্রিল">এপ্রিল</option>
                            <option value="মে">মে</option>
                            <option value="জুন">জুন</option>
                            <option value="জুলাই">জুলাই</option>
                            <option value="আগস্ট">আগস্ট</option>
                            <option value="সেপ্টেম্বর">সেপ্টেম্বর</option>
                            <option value="অক্টোবর">অক্টোবর</option>
                            <option value="নভেম্বর">নভেম্বর</option>
                            <option value="ডিসেম্বর">ডিসেম্বর</option>
                        </select>

                        <!-- Day Dropdown -->
                        <select name="day" id="day-select" required>
                            <option value="" disabled selected>দিন নির্বাচন করুন</option>
                            <!-- Generate days from 1 to 31 dynamically (or adjust per month) -->
                            <option value="1">১</option>
                            <option value="2">২</option>
                            <option value="3">৩</option>
                            <option value="4">৪</option>
                            <option value="5">৫</option>
                            <option value="6">৬</option>
                            <option value="7">৭</option>
                            <option value="8">৮</option>
                            <option value="9">৯</option>
                            <option value="10">১০</option>
                            <option value="11">১১</option>
                            <option value="12">১২</option>
                            <option value="13">১৩</option>
                            <option value="14">১৪</option>
                            <option value="15">১৫</option>
                            <option value="16">১৬</option>
                            <option value="17">১৭</option>
                            <option value="18">১৮</option>
                            <option value="19">১৯</option>
                            <option value="20">২০</option>
                            <option value="21">২১</option>
                            <option value="22">২২</option>
                            <option value="23">২৩</option>
                            <option value="24">২৪</option>
                            <option value="25">২৫</option>
                            <option value="26">২৬</option>
                            <option value="27">২৭</option>
                            <option value="28">২৮</option>
                            <option value="29">২৯</option>
                            <option value="30">৩০</option>
                            <option value="31">৩১</option>
                        </select>

                        <select name="year" id="year-select" required>
                            <option value="">বছর নির্বাচন করুন</option>
                        </select>


                    </div>

                </div>

                <label class="input-label" for="id_no">আইডি নং </label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="card icon">
                    </span>
                    <input type="text" maxlength="40" class="input-box form-control shadow-none" name="nid"
                        id="nid" placeholder="আইডি নং">
                </div>

                <label class="input-label" for="mobile_no">মোবাইল নং </label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="number icon">
                    </span>
                    <input type="number" maxlength="40" class="input-box form-control shadow-none" name="phone"
                        id="phone" placeholder="01402860617..." required>
                </div>

                <label class="input-label" for="email_address">ইমেইল এড্রেস</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="email icon">
                    </span>
                    <input type="email" maxlength="40" class="input-box form-control shadow-none" name="email"
                        id="email" placeholder="example@gmail.com" required>
                </div>

                <label class="input-label" for="Password">Password</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                        <img src="{{ asset('front/assets/img/name.png') }}" alt="email icon">
                    </span>
                    <input type="password" class="input-box form-control shadow-none" name="password" id="password"
                        placeholder="পাসওয়ার্ড" required>
                </div>

                <label class="input-label" for="division">বিভাগ</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="division">
                        <img src="{{ asset('front/assets/img/city.png') }}" alt="city icon">
                    </span>

                    <select name="division" id="division" class="input-box form-control shadow-none" required>
                        <option value="">বিভাগ</option>
                        @foreach ($division as $div)
                        <option value="{{ $div->id }}">{{ $div->bn_name }}</option>
                        @endforeach
                    </select>
                </div>

                <label class="input-label" for="district">জেলা</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="dristrick">
                        <img src="{{ asset('front/assets/img/city.png') }}" alt="city icon">
                    </span>
                    <select name="district" id="district" class="input-box form-control shadow-none">
                        <option value="">জেলা</option>
                    </select>

                </div>

                <label class="input-label" for="Upazilla">উপ‌জেলা</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                        <img src="{{ asset('front/assets/img/city.png') }}" alt="city icon">
                    </span>
                    <select name="upozila" id="upozila" class="input-box form-control shadow-none">
                        <option value="">উপ‌জেলা</option>
                    </select>
                </div>
                <label class="input-label" for="ইউনিয়ন">ইউনিয়ন</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                        <img src="{{ asset('front/assets/img/city.png') }}" alt="city icon">
                    </span>
                    <select name="union" id="union" class="input-box form-control shadow-none">
                        <option value="">ইউনিয়ন</option>
                    </select>

                </div>
                <label class="input-label" for="ওর্য়াড">ওর্য়াড</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="Upazilla">
                        <img src="{{ asset('front/assets/img/city.png') }}" alt="city icon">
                    </span>
                    <input type="text" name="ward" id="ward" class="input-box form-control shadow-none"
                        placeholder="ওর্য়াড">

                </div>

                <div>
                    <label for="photo">ছবি</label>
                    <input type="file" name="photo" id="photo" accept="image/*" onchange="previewImage(event)">
                    <div>
                        <img id="photoPreview" src="{{ asset('front/assets/img/photo.png') }}" alt="photo" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                </div>

                <div class="nid-card-area">
                    <div>
                        <label class="input-label" for="nid1">এনআইডি ফ্রন্ট</label>
                        <button type="button" class="up-nid-card1 nid-card1">
                            <img src="{{ asset('front/assets/img/NID-1.jpg') }}" alt="nid card">
                            <div class="upload-icon">
                                <div>
                                    <img src="{{ asset('front/assets/img/uploads.png') }}" alt="">
                                </div>
                            </div>
                            <input type="file" name="nid_front" class="up-nid1 file-hide" id="nid_front">
                        </button>
                    </div>
                    <div>
                        <label class="input-label" for="nid2">এনআইডি ব্যাক</label>
                        <button type="button" class="up-nid-card2 nid-card2">
                            <img src="{{ asset('front/assets/img/NID-2.jpg') }}" alt="nid card">
                            <div class="upload-icon">
                                <div>
                                    <img src="{{ asset('front/assets/img/uploads.png') }}" alt="">
                                </div>
                            </div>
                            <input type="file" name="nid_back" class="up-nid2 file-hide" id="nid_back">
                        </button>
                    </div>
                </div>
                <div class="cv-upload-area">
                    <label class="input-label" for="cv">সিভি আপলোড</label>
                    <div>
                        <div>
                            <button type="button" class="up-cv-upload cv-upload">
                                <img src="{{ asset('front/assets/img/cv upload.webp') }}" alt="nid card">
                                <input type="file" name="cv" class="up-cv file-hide" id="cv">
                            </button>
                        </div>
                        <div class="demo-cv">Demo CV</div>
                    </div>
                </div>
                <div class="certificate-upload-area">
                    <label class="input-label" for="certificate">সার্টিফিকেট আপলোড</label>
                    <button type="button" class="up-certificate-upload certificate-upload">
                        <img src="{{ asset('front/assets/img/certificate.jpg') }}" alt="certificate img">
                        <div class="upload-icon">
                            <div>
                                <img src="{{ asset('front/assets/img/uploads.png') }}" alt="">
                            </div>
                        </div>
                        <input type="file" name="certificate" class="up-certificate file-hide" id="certificate">
                    </button>
                </div>

                <div class="form-btns">
                    <a href="Login.html" class="button bg-danger m-0">লগিন করুন</a>
                    <button type="submit" class="button save-btn">সাইনআপ করুন</button>
                </div>
            </form>

        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- jQuery CDN with integrity check -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('photoPreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {

            // Fetch districts based on division selection
            $(document).on('change', '#division', function() {
                var divisionId = $(this).val();
                // alert(divisionId);
                if (divisionId) {
                    $.ajax({
                        url: '/get-districts/' + divisionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty().append(
                                '<option value="">জেলা নির্বাচন করুন</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id +
                                    '">' + value.bn_name + '</option>');
                            });
                            $('#upozila').empty().append(
                                '<option value="">উপ‌জেলা নির্বাচন করুন</option>'
                            ); // Reset upozila dropdown
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">জেলা নির্বাচন করুন</option>');
                    $('#upozila').empty().append('<option value="">উপ‌জেলা নির্বাচন করুন</option>');
                }
            });


            // Fetch upozilas based on district selection

            $(document).on('change', '#district', function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/get-upozilas/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#upozila').empty().append(
                                '<option value="">উপ‌জেলা নির্বাচন করুন</option>');
                            $.each(data, function(key, value) {
                                $('#upozila').append('<option value="' + value.id +
                                    '">' + value.bn_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#upozila').empty().append('<option value="">উপ‌জেলা নির্বাচন করুন</option>');
                }
            });
            // Fetch Union based on upozila selection

            $(document).on('change', '#upozila', function() {
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
                                    value.bn_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#union').empty().append('<option value="">ইউনিয়ন নির্বাচন করুন</option>');
                }
            });
        });
    </script>
    <script>
        const yearSelect = document.getElementById("year-select");
        const startYear = 1940;
        const endYear = 2025;

        function toBengaliNumber(num) {
            const bengaliDigits = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];
            return num.toString().replace(/\d/g, d => bengaliDigits[d]);
        }

        for (let year = endYear; year >= startYear; year--) {
            let option = document.createElement("option");
            option.value = year;
            option.textContent = toBengaliNumber(year);
            yearSelect.appendChild(option);
        }
    </script>

</body>

</html>
