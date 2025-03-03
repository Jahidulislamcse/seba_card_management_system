<header class="fixed-top">
    <nav class="navbar container">
        <a href="index.html" class="logo">
            <img src="{{ asset('front/assets/img/logo.jpg') }}" alt="">
            <div class="logo-details">
                <h4>সেবা কার্ড পোর্টাল</h4>
                <p>Qtech Bangladesh</p>
            </div>
        </a>
        <div class="auth-btn-area">
            @if (Route::has('login'))
                @auth
                    <a class="auth-navigation" href="{{ url('/dashboard') }}">ড্যাশবোর্ড</a>
                @else
                    <a class="auth-navigation" href="{{ route('login') }}">লগিন করুন</a>
                    @if (Route::has('register'))
                    <a class="auth-navigation" href="{{ route('admin.register') }}">সাইনআপ করুন</a>
                        @endif
                @endauth
            @endif
        </div>
    </nav>
</header>
