@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg shadow-lg">
            </div>
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                <p class="text-lg text-gray-600 mb-6">{{ $product->category->name }}</p>
                <p class="text-3xl font-bold text-gray-900 mb-6">${{ $product->price }}</p>
                <p class="text-gray-700 leading-relaxed mb-8">{{ $product->description }}</p>
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-500 transition-colors">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
