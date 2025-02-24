<div class="dashboard-header">
    <div class="profile-info">
        <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_640.png" alt="Profile">
        <div>
            <strong>{{Auth::user()->name }}</strong><br>
            <small>ID: {{Auth::user()->id}}</small><br>
            <small>{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}</small>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="btn btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            this.closest('form').submit();">Logout</a>
    </form>
</div>
