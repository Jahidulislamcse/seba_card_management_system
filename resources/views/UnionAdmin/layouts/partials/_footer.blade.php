 <div class="fixed-bottom">
     <footer>
         <a href="{{ route('union.dashboard') }}">
             <img src="{{ asset('UnionAdmin/assets/img/home.png') }}" alt="home icon">
             <p>হোম</p>
         </a>
         <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <img src="{{ asset('UnionAdmin/assets/img/logout.png') }}" alt="logout icon">
             <p>লগআউট</p>
         </a>
         <a href="{{ route('union.helpLine') }}">
             <img src="{{ asset('UnionAdmin/assets/img/helpline.png') }}" alt=" icon">
             <p>হেল্প-লাইন</p>
         </a>
     </footer>
 </div>

 <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
     @csrf
 </form>
