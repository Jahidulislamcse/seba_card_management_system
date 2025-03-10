<header>
    <div class="header-profile">
        <a href="">
            <img src="{{ asset('UnionAdmin/assets/img/profile.png') }}" alt="profile icon">
        </a>
        <div class="profile-details">
            <h5>{{Auth::user()->name }}</h5>
            <p>{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}</p>
        </div>
    </div>
    <div class="amount">
        <button class="amount-btn">৳</button>
        <p class="amounts">200</p>
    </div>
</header>
