<header>
    <div class="header-profile">
        <a href="{{ route('super-admin.profile.index') }}">
            <img src="{{auth()->user()->photo_url}}" alt="profile icon">
        </a>
        <div class="profile-details">
            <h5>{{Auth::user()->name }}</h5>
            <p>{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}</p>
        </div>
    </div>
    <div class="amount">
        <button class="amount-btn">৳</button>
        <p class="amounts">{{auth()->user()->total_balance}}</p>
    </div>
</header>
