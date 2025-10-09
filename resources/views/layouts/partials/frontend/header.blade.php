
<header class="gaming-header sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('shop.home') }}">Techmall</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('shop.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.index') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <form class="search-bar me-3">
                        <input class="form-control search-input" type="search" placeholder="Search..." aria-label="Search">
                        <button class="search-btn" type="submit"><i class="bi bi-search"></i></button>
                    </form>

                    <ul class="navbar-nav header-icons">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="bi bi-person-circle"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="bi bi-heart"></i></a>
                        </li>
                        <li class="nav-item cart-dropdown">
                            <a href="{{ route('cart.index') }}" class="nav-link">
                                <i class="bi bi-cart3"></i>
                                @if(session('cart') && count(session('cart')) > 0)
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger cart-badge">
                                        {{ count(session('cart')) }}
                                    </span>
                                @endif
                            </a>
                            <div class="cart-dropdown-content">
                                @if (session('cart') && count(session('cart')) > 0)
                                    @php($total = 0)
                                    <ul class="list-unstyled">
                                        @foreach (session('cart') as $id => $item)
                                            @php($total += $item['price'] * $item['quantity'])
                                            <li class="d-flex align-items-center mb-3">
                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="50" class="me-2 rounded">
                                                <div>
                                                    <h6 class="mb-0 fs-sm">{{ $item['name'] }}</h6>
                                                    <p class="mb-0 text-muted fs-sm">{{ $item['quantity'] }} x Rs. {{ number_format($item['price'], 2) }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Total:</h6>
                                        <h6 class="mb-0">Rs. {{ number_format($total, 2) }}</h6>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('cart.index') }}" class="btn btn-primary btn-sm">View Cart</a>
                                        <a href="#" class="btn btn-outline-primary btn-sm">Checkout</a>
                                    </div>
                                @else
                                    <p class="text-center mb-0">Your cart is empty.</p>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
