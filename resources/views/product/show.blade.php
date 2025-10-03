@extends('layouts.app')

@section('content')
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
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                            </div>
                            <button type="submit" class="action-button w-full font-bold py-4 px-8 rounded-lg text-lg">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection