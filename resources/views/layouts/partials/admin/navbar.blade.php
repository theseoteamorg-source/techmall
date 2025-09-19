<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="far fa-user"></i>
                Profile
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </form>
        </li>
    </ul>
</nav>
