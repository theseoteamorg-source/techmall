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

    <style>
        :root {
            --primary-color: #007bff; 
            --primary-hover: #0056b3;
            --accent-color: #fd7e14;
            --background-color: #f8f9fa;
            --surface-color: #ffffff;
            --text-color: #212529;
            --text-muted: #6c757d;
            --border-color: #dee2e6;
            --border-radius: 1rem;
            --shadow-sm: 0 .125rem .25rem rgba(0,0,0,.075);
            --shadow-md: 0 .5rem 1rem rgba(0,0,0,.15);
            --shadow-lg: 0 1rem 3rem rgba(0,0,0,.175);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            font-weight: 400;
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            color: var(--text-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .gaming-header {
            background-color: var(--surface-color);
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid var(--border-color);
        }
        .gaming-header .navbar-brand {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: var(--primary-color);
        }
        .gaming-header .nav-link {
            font-family: 'Orbitron', sans-serif;
            font-weight: 500;
            color: var(--text-muted);
            transition: all 0.3s ease;
            padding: 1rem 1.5rem;
            border-radius: 5px;
        }
        .gaming-header .nav-link:hover, .gaming-header .nav-link.active {
            color: var(--primary-color);
        }
        .search-bar {
            position: relative;
        }
        .search-input {
            background-color: #f1f1f1;
            border: 1px solid var(--border-color);
            color: var(--text-color);
            border-radius: 25px;
            padding-left: 20px;
        }
        .search-input::placeholder {
            color: var(--text-muted);
        }
        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-color);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .gaming-header .header-icons .nav-link {
            font-size: 1.5rem;
        }

        .hero-carousel-image {
            height: 80vh; max-height: 700px;
            object-fit: cover;
            object-position: top center;
        }

        .carousel-caption p {
            color: var(--text-color) !important;
        }

        .section-container {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .product-card-new {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }
        .product-card-new:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }
        .product-card-new .product-image {
            position: relative;
            overflow: hidden;
        }
        .product-card-new .product-image img {
            transition: transform 0.4s ease;
        }
        .product-card-new:hover .product-image img {
            transform: scale(1.1);
        }
        .product-card-new .product-image .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent-color);
            color: #fff;
            padding: 5px 10px;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 5px;
            text-transform: uppercase;
        }
        .product-card-new .product-content {
            padding: 20px;
        }
        .product-card-new .product-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            color: var(--text-color);
            margin-bottom: 10px;
        }
        .product-card-new .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-color);
        }
        .product-card-new .add-to-cart-btn {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
            border-radius: 25px;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }
        .product-card-new .add-to-cart-btn:hover {
            background: var(--primary-color);
            color: #fff;
        }

        .category-card {
            border-radius: var(--border-radius);
            overflow: hidden;
            position: relative;
            display: block;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }
        .category-card:hover {
            transform: scale(1.03);
            box-shadow: var(--shadow-lg);
        }
        .category-card img {
            transition: transform 0.4s ease;
        }
        .category-card:hover img {
            transform: scale(1.1);
        }
        .category-card .category-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            color: #fff;
        }

        .footer {
            background-color: var(--surface-color);
            border-top: 1px solid var(--border-color);
        }

        .gaming-sidebar .card {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            box-shadow: var(--shadow-sm);
        }

        .gaming-sidebar .card-header {
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
            background-color: transparent;
            border-bottom: 1px solid var(--border-color);
        }

        .gaming-sidebar .list-group-item {
            background-color: transparent;
            border-color: var(--border-color);
        }

        .gaming-sidebar .list-group-item a {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .gaming-sidebar .list-group-item a:hover {
            color: var(--primary-color);
        }

        .gaming-sidebar .search-bar {
            position: relative;
        }
        .gaming-sidebar .search-input {
            background-color: #f1f1f1;
            border: 1px solid var(--border-color);
            color: var(--text-color);
            border-radius: 25px;
            padding-left: 20px;
        }
        .gaming-sidebar .search-input::placeholder {
            color: var(--text-muted);
        }
        .gaming-sidebar .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-color);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 992px) {
            .gaming-header .navbar-nav {
                background-color: var(--surface-color);
                padding: 1rem;
                border-radius: 10px;
            }
        }

        @media (max-width: 768px) {
            .hero-carousel-image { height: 60vh; }
        }

    </style>
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
                                    <li><a class="dropdown-item" href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Shop</a>
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
                    <p><a href="{{ route('products.index') }}" class="text-reset">Laptops</a></p>
                    <p><a href="{{ route('products.index') }}" class="text-reset">Mobiles</a></p>
                    <p><a href="{{ route('products.index') }}" class="text-reset">Accessories</a></p>
                    <p><a href="{{ route('products.index') }}" class="text-reset">Gaming</a></p>
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
                    <a href="#" class-="me-4 text-reset"><i class="bi bi-linkedin"></i></a>
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
