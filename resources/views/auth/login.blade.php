<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/Authentication.css') }}">
    <title>লগিন করুন | Sheba Card Portal</title>
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
            <form class="member-add-form login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <h6 class="text-center fw-bold">লগিন করুন</h6>
                <label class="input-label" for="id_no">ফোন নম্বর</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="id_no">
                        <img src="{{ asset('front/assets/img/number.png') }}" alt="card icon">
                    </span>
                    <input type="text" maxlength="40" class="input-box form-control shadow-none" name="phone"
                        id="phone" placeholder="ফোন নম্বর" required>

                </div>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="input-label" for="email_address">পাসওয়ার্ড</label>
                <div class="input-group mb-2">
                    <span class="input-box-icon input-group-text rounded-end-0" id="mobile_no">
                        <img src="{{ asset('front/assets/img/password.png') }}" alt="email icon">
                    </span>
                    <input type="password" maxlength="40" class="input-box form-control shadow-none" name="password"
                        id="password" placeholder="পাসওয়ার্ড" required>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-btns">
                    <a href="{{ route('admin.register') }}" class="button bg-danger m-0">সাইনআপ করুন</a>
                    <button type="submit" class="button save-btn">লগিন করুন</button>
                </div>
            </form>

        </div>
    </div>

    <script src="{{ asset('front/assets/js/main.js') }}"></script>
</body>

</html>
