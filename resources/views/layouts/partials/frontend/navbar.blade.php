<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('shop.home') }}">TechMall</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('shop.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('shop.index') }}">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{-- Cart count here --}}</span>
                    </a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
