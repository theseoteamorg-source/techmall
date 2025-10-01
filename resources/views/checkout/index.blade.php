@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-12">Checkout</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Shipping Information</h2>
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-gray-700 font-medium mb-2">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="last_name" class="block text-gray-700 font-medium mb-2">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                            <input type="text" id="address" name="address" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="city" class="block text-gray-700 font-medium mb-2">City</label>
                                <input type="text" id="city" name="city" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="state" class="block text-gray-700 font-medium mb-2">State</label>
                                <input type="text" id="state" name="state" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="zip" class="block text-gray-700 font-medium mb-2">Zip Code</label>
                                <input type="text" id="zip" name="zip" class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>
                    </form>
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
                                <p class="text-gray-800 font-semibold">${{ $details['price'] * $details['quantity'] }}</p>
                            </div>
                        @endforeach

                        <div class="border-t border-gray-200 mt-6 pt-6">
                            <div class="flex justify-between items-center">
                                <p class="text-gray-600">Subtotal</p>
                                <p class="text-gray-800 font-semibold">${{ $total }}</p>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <p class="text-gray-600">Shipping</p>
                                <p class="text-gray-800 font-semibold">$0.00</p>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-2xl font-bold text-gray-900">Total</p>
                                <p class="text-2xl font-bold text-gray-900">${{ $total }}</p>
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
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelector('button[form="checkout-form"]').addEventListener('click', function() {
            document.querySelector('form').submit();
        });
    </script>
@endsection
