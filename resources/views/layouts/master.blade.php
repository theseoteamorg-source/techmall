<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Techmall - Modern & Stylish</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <header class="gaming-header sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.home') }}">TECHMALL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list text-primary"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('shop.home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="{{ route('shop.category', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.products') }}">Shop</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <div class="search-bar me-3">
                            <input type="text" class="form-control search-input" placeholder="Search...">
                            <button class="search-btn"><i class="bi bi-search"></i></button>
                        </div>
                        <div class="header-icons d-flex align-items-center">
                            <a href="{{ route('login') }}" class="nav-link"><i class="bi bi-person-circle"></i></a>
                            <a href="{{ route('shop.cart') }}" class="nav-link position-relative">
                                <i class="bi bi-cart-fill"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer text-muted pt-5 pb-4 mt-5">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">
                        <i class="bi bi-gem me-3"></i>TECHMALL
                    </h5>
                    <p>
                        The future of tech, delivered to your doorstep. We are committed to providing the best electronic gadgets with unparalleled customer service and a seamless shopping experience.
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                    <p><a href="{{ route('shop.products') }}" class="text-reset">Laptops</a></p>
                    <p><a href="{{ route('shop.products') }}" class="text-reset">Mobiles</a></p>
                    <p><a href="{{ route('shop.products') }}" class="text-reset">Accessories</a></p>
                    <p><a href="{{ route('shop.products') }}" class="text-reset">Gaming</a></p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Useful Links</h6>
                    <p><a href="{{ route('login') }}" class="text-reset">Your Account</a></p>
                    <p><a href="{{ route('shop.cart') }}" class="text-reset">Track Order</a></p>
                    <p><a href="{{ route('contact') }}" class="text-reset">Support</a></p>
                    <p><a href="{{ route('contact') }}" class="text-reset">About Us</a></p>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="bi bi-house me-3"></i> 123 Tech Street, Lahore, PK</p>
                    <p><i class="bi bi-envelope me-3"></i> support@techmall.pk</p>
                    <p><i class="bi bi-phone me-3"></i> +92 123 4567890</p>
                </div>
            </div>
             <div class="d-flex justify-content-center justify-content-lg-between p-4 border-top">
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <div>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-github"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            &copy; 2023 Copyright:
            <a class="text-reset fw-bold" href="{{ route('shop.home') }}">Techmall.pk</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
