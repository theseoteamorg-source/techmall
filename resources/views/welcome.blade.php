<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MiniStore - Modern & Minimalist</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F9FAFB;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .nav-link {
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #3B82F6;
        }

        .product-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        .action-button {
            background-color: #3B82F6;
            color: #FFFFFF;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .action-button:hover {
            background-color: #2563EB;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="antialiased font-sans text-gray-800">

    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-gray-200">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-900">MiniStore</a>
            <div class="flex items-center space-x-6">
                <a href="/" class="nav-link text-gray-600">Dashboard</a>
                <a href="#" class="nav-link text-gray-600">Shop</a>
                <a href="#" class="nav-link text-gray-600">About</a>
                <a href="#" class="nav-link text-gray-600">Contact</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-600 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </a>
            </div>
        </nav>
    </header>

    <div class="min-h-screen">
        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-20 fade-in-up">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight mb-4">
                    Find Your Style.
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover a curated selection of high-quality products designed for the modern lifestyle.
                </p>
            </div>

            <div class="flex justify-center items-center mb-16 fade-in-up" style="animation-delay: 200ms;">
                <form action="/" method="GET" class="flex items-center w-full max-w-xl">
                    <input type="text" name="search" placeholder="Search for products..." class="w-full px-6 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition-shadow">
                    <button type="submit" class="ml-[-45px] bg-blue-600 text-white rounded-full p-2.5 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>

            <main class="fade-in-up" style="animation-delay: 400ms;">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @forelse ($products as $product)
                        <div class="product-card">
                            <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-56 object-cover">
                            </a>
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                <p class="text-gray-600 mt-1 truncate">{{ $product->description }}</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <p class="text-xl font-bold text-gray-900">${{ $product->price }}</p>
                                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="action-button font-semibold py-2 px-4 rounded-lg text-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <h2 class="text-2xl font-semibold text-gray-700">No Products Available</h2>
                            <p class="mt-2 text-gray-500">Please check back later or refine your search.</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>

    <footer class="bg-white border-t border-gray-200">
        <div class="container mx-auto px-6 py-8 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} MiniStore. All Rights Reserved.</p>
            <p class="mt-2 text-sm">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>

</body>
</html>
