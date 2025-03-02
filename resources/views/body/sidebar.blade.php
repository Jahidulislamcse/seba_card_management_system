<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img src="" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>


                <li class="nav-item ">
                    <a href="{{ route('user.list') }}"><i class="fas fa-home"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('cards.list') }}"><i class="fas fa-home"></i>
                        <p>Cards</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('super-admin.transactions.create') }}"><i class="fas fa-home"></i>
                        <p>সেন্ড মা‌নি</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('super-admin.rest.balance.index') }}"><i class="fas fa-home"></i>
                        <p>বা‌কি হিসাব</p>
                    </a>
                </li>

                <li
                    class="nav-item ">
                    <a data-bs-toggle="collapse" href="#hompage">
                        <i class="fas fa-layer-group"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse "
                        id="hompage">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="">
                                    <span class="sub-item">Generals</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
