@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Thank You!</h1>
            <p class="text-xl text-gray-700">Your order has been placed successfully.</p>
            <a href="{{ url('/') }}" class="mt-8 inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-500 transition-colors">Continue Shopping</a>
        </div>
    </div>
@endsection
