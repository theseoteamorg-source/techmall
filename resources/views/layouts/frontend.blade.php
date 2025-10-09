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
        .cart-badge {
            top: 20% !important;
            left: 85% !important;
        }

        .cart-dropdown {
            position: relative;
            display: inline-block;
        }

        .cart-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 250px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: .5rem;
            padding: 1rem;
        }

        .cart-dropdown:hover .cart-dropdown-content {
            display: block;
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
    @include('layouts.partials.frontend.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.frontend.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
