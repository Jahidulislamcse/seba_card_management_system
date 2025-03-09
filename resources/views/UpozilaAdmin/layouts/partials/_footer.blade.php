<div class="fixed-bottom">
    <footer>
        <a href="{{ route('upozila.dashboard') }}">
            <img src="{{ asset('UpazilaAdmin/assets/img/home.png') }}" alt="home icon">
            <p>হোম</p>
        </a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{ asset('UpazilaAdmin/assets/img/logout.png') }}" alt="logout icon">
            <p>লগআউট</p>
        </a>
        <a href="HelpLine.html">
            <img src="{{ asset('UpazilaAdmin/assets/img/helpline.png') }}" alt=" icon">
            <p>হেল্প-লাইন</p>
        </a>
    </footer>
</div>

<form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
    @csrf
</form>
