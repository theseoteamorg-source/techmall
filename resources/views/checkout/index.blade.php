@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-12">Checkout</h1>

        <form action="{{ route('checkout.place-order') }}" method="POST" id="checkout-form">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-lg rounded-lg p-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Shipping Information</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                            <input type="text" id="address" name="address" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="city" class="block text-gray-700 font-medium mb-2">City</label>
                                <input type="text" id="city" name="city" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="postal_code" class="block text-gray-700 font-medium mb-2">Postal Code</label>
                                <input type="text" id="postal_code" name="postal_code" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>

                        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-6">Payment Method</h2>
                        <div class="space-y-4">
                            @foreach ($paymentMethods as $paymentMethod)
                                <div class="flex items-center">
                                    <input id="payment_method_{{ $paymentMethod->code }}" name="payment_method" type="radio" value="{{ $paymentMethod->code }}" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="payment_method_{{ $paymentMethod->code }}" class="ml-3 block text-sm font-medium text-gray-700">
                                        {{ $paymentMethod->name }}
                                    </label>
                                </div>
                                <div class="text-gray-500 text-sm ml-7">
                                    {{ $paymentMethod->description }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="bg-white shadow-lg rounded-lg p-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Your Order</h2>
                        @if(session('cart'))
                            @php $total = 0 @endphp
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <p class="text-gray-800 font-semibold">{{ $details['name'] }}</p>
                                        <p class="text-gray-600 text-sm">Quantity: {{ $details['quantity'] }}</p>
                                    </div>
                                    <p class="text-gray-800 font-semibold">${{ number_format($details['price'] * $details['quantity'], 2) }}</p>
                                </div>
                            @endforeach

                            <div class="border-t border-gray-200 mt-6 pt-6">
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-600">Subtotal</p>
                                    <p class="text-gray-800 font-semibold">${{ number_format($total, 2) }}</p>
                                </div>
                                @if(session('coupon'))
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-gray-600">Discount ({{ session('coupon')['code'] }})</p>
                                        <p class="text-gray-800 font-semibold">-${{ number_format(session('coupon')['value'], 2) }}</p>
                                    </div>
                                    @php $total -= session('coupon')['value'] @endphp
                                @endif
                                <div class="flex justify-between items-center mt-2">
                                    <p class="text-gray-600">Shipping</p>
                                    <p class="text-gray-800 font-semibold">$0.00</p>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-2xl font-bold text-gray-900">Total</p>
                                    <p class="text-2xl font-bold text-gray-900">${{ number_format($total, 2) }}</p>
                                </div>
                            </div>

                            <div class="mt-8">
                                <button type="submit" form="checkout-form" class="block w-full text-center bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-500 transition-colors">Place Order</button>
                            </div>
                        @else
                            <p class="text-gray-600">Your cart is empty.</p>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
