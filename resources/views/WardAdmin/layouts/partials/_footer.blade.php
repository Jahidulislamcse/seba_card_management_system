<div class="fixed-bottom">
    <footer>
        <a href="{{ route('ward.dashboard') }}">
            <img src="{{ asset('assets/img/home.png') }}" alt="home icon">
            <p>হোম</p>
        </a>
        <a href="{{ route('ward.offer') }}">
            <img src="{{ asset('assets/img/offer.png') }}" alt="offer icon">
            <p>অফার</p>
        </a>
        <a href="Notice.html">
            <img src="{{ asset('assets/img/notice.png') }}" alt="notice icon">
            <p>নোটিশ</p>
        </a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{ asset('assets/img/logout.png') }}" alt="logout icon">
            <p>লগআউট</p>
        </a>
        <a href="HelpLine.html">
            <img src="{{ asset('assets/img/helpline.png') }}" alt="helpline icon">
            <p>হেল্প-লাইন</p>
        </a>
    </footer>
</div>

<form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
    @csrf
</form>
