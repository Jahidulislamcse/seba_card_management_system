

<form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
    @csrf
</form>
<div class="fixed-bottom">
    <footer>
        <a href="{{route('dashboard')}}">
            <img src="{{asset('SuperAdmin/assets/img/home.png')}}" alt="home icon">
            <p>হোম</p>
        </a>
        <a href="WebsiteSetting.html">
            <img src="{{asset('SuperAdmin/assets/img/website.png')}}" alt="website icon">
            <p>ওয়েবসাইট সে‌টিংস</p>
        </a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{asset('SuperAdmin/assets/img/logout.png')}}" alt="logout icon">
            <p>লগআউট</p>
        </a>
        <a href="HelpLine.html">
            <img src="{{asset('SuperAdmin/assets/img/helpline.png')}}" alt=" icon">
            <p>হেল্প-লাইন</p>
        </a>
    </footer>
</div>
