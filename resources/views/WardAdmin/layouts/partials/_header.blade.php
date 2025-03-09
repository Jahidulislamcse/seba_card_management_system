<header>
    <div class="header-profile">
        <a href="">
            <img src="{{ asset('assets/img/profile.png') }}" alt="profile icon">
        </a>
        <div class="profile-details">
            <h5>{{ Auth::user()->name ?? '' }}</h5>
            <p>ID: {{ Auth::user()->id ?? '' }}</p>
            <p>{{ ucwords(str_replace('_', ' ', Auth::user()->role ?? null)) }}</p>
        </div>
    </div>
    <div class="amount">
        <button class="amount-btn">৳</button>
        <p class="amounts">{{ auth()->user()->total_balance ?? '' }}</p>
    </div>
</header>
