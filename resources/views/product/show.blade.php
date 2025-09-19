<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $product->name }} - MiniStore</title>

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

        .action-button {
            background-color: #3B82F6;
            color: #FFFFFF;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .action-button:hover {
            background-color: #2563EB;
            transform: scale(1.05);
        }
        
        .nav-link {
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #3B82F6;
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

    </style>
</head>
<body class="antialiased font-sans text-gray-800">

    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-gray-200">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-900">MiniStore</a>
            <div class="flex items-center space-x-6">
                <a href="/" class="nav-link text-gray-600">Home</a>
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

    <div class="min-h-screen py-16">
        <div class="container mx-auto px-6">
            <div class="mb-8 fade-in-up">
                 <a href="/" class="inline-flex items-center text-blue-600 hover:text-blue-500 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
                    Back to Products
                </a>
            </div>
            <main class="bg-white p-8 md:p-12 rounded-2xl shadow-lg">
                <div class="grid md:grid-cols-2 gap-12 items-start">
                    <div class="fade-in-up">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-xl shadow-md">
                    </div>
                    <div class="fade-in-up" style="animation-delay: 200ms;">
                        <h1 class="text-4xl font-bold text-gray-900 leading-tight">{{ $product->name }}</h1>
                        <p class="mt-4 text-gray-600 text-lg">{{ $product->description }}</p>
                        <div class="mt-8">
                            <span class="text-4xl font-bold text-gray-900">${{ $product->price }}</span>
                        </div>
                        <div class="mt-10">
                             <button class="action-button w-full font-bold py-4 px-8 rounded-lg text-lg">
                                Add to Cart
                            </button>
                        </div>
                    </div>
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
