@extends('layouts.shop')

@section('content')
    <div class="container mx-auto px-4">
        <div class="text-center py-16 md:py-24 fade-in-up">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">
                Welcome to <span class="text-blue-600">Our Shop</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-8">
                Discover a wide variety of products, from the latest trends to timeless classics.
            </p>
            <a href="#products" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-500 transition-transform transform hover:scale-105">
                Explore Products
            </a>
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

        <main id="products" class="fade-in-up" style="animation-delay: 400ms;">
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($products as $product)
                    <div class="product-card bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                        <a href="{{ route('products.show', $product) }}">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-56 object-cover">
                        </a>
                        <div class="p-5">
                            <p class="text-sm font-medium text-gray-500">{{ $product->category->name }}</p>
                            <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $product->name }}</h3>
                            <p class="text-gray-600 mt-1 h-12 overflow-hidden">{{ $product->description }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <p class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('products.show', $product) }}" class="action-button bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg text-sm hover:bg-blue-500 transition-colors">
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
@endsection
