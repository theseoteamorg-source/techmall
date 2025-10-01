<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Techmall</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #007bff;
            --background-color: #FFFFFF;
            --surface-color: #F8F9FA;
            --text-color: #212529;
            --border-color: #DEE2E6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .top-bar {
            background-color: var(--surface-color);
            border-bottom: 1px solid var(--border-color);
            font-size: 0.85rem;
        }

        .main-header {
            border-bottom: 1px solid var(--border-color);
        }

        .main-nav {
            background-color: var(--primary-color);
        }

        .main-nav .nav-link {
            color: #fff;
        }

        .product-card {
            border: 1px solid var(--border-color);
            transition: box-shadow 0.2s ease-in-out;
        }

        .product-card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .footer {
            background-color: var(--surface-color);
        }

<<<<<<< HEAD
        .footer a {
            color: var(--text-color);
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

=======
>>>>>>> 9ecd0fba1cec535f1608f86edf9f210068e43dc1
    </style>
</head>
<body>
    <header>
        <!-- Top Bar -->
        <div class="top-bar py-2">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-muted">
                        Welcome to Techmall!
                    </div>
                    <div class="col-6 text-end">
                        <a href="#" class="text-decoration-none text-muted me-3">About Us</a>
                        <a href="#" class="text-decoration-none text-muted">Contact</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="main-header py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <a class="fs-3 fw-bold text-decoration-none text-dark" href="{{ route('shop.home') }}">TECHMALL</a>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for products...">
                            <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ route('login') }}" class="text-dark me-3"><i class="bi bi-person fs-4"></i></a>
                        <a href="{{ route('shop.cart') }}" class="text-dark"><i class="bi bi-cart fs-4"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="main-nav navbar navbar-expand-lg">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.products') }}">Shop</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#">Laptops</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mobiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accessories</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Information</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Customer Service</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Site Map</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>My Account</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt-fill"></i> 123 Tech Street, Lahore</li>
                        <li><i class="bi bi-telephone-fill"></i> +92 123 4567890</li>
                        <li><i class="bi bi-envelope-fill"></i> support@techmall.pk</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="text-muted">&copy; 2023 Techmall. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
