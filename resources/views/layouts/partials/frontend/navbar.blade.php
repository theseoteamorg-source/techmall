<header class="gaming-header sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">TechMall</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('shop.index') ? 'active' : '' }}" href="{{ route('shop.index') }}">Shop</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                            @foreach($categories as $category)
                                <li><a class="dropdown-item" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('shop.deals') ? 'active' : '' }}" href="{{ route('shop.deals') }}">Deals</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    <form action="{{ route('shop.index') }}" method="GET" class="search-bar me-3">
                        <input type="text" name="search" class="form-control search-input" placeholder="Search products..." value="{{ request('search') }}">
                        <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
                    </form>

                    <ul class="navbar-nav header-icons">
                        <li class="nav-item cart-dropdown">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart-fill"></i>
                                @if(\Cart::getContent()->count() > 0)
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger cart-badge">
                                        {{ \Cart::getContent()->count() }}
                                    </span>
                                @endif
                            </a>
                            <div class="cart-dropdown-content">
                                @if(\Cart::getContent()->count() > 0)
                                    <ul class="list-unstyled">
                                        @foreach(\Cart::getContent() as $item)
                                            <li class="d-flex align-items-center mb-3">
                                                <img src="{{ $item->attributes->image }}" alt="{{ $item->name }}" width="50" class="me-2 rounded">
                                                <div>
                                                    <h6 class="mb-0 fs-sm">{{ $item->name }}</h6>
                                                    <small class="text-muted">{{ $item->quantity }} x {{ config('settings.currency_symbol') }}{{ number_format($item->price, 2) }}</small>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="d-grid">
                                        <a href="{{ route('cart.index') }}" class="btn btn-primary btn-sm">View Cart</a>
                                    </div>
                                @else
                                    <p class="text-center mb-0">Your cart is empty.</p>
                                @endif
                            </div>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i></a></li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus-fill"></i></a></li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle"></i>
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
        </div>
    </nav>
</header>
