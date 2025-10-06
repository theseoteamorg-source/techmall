@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-12">Your Shopping Cart</h1>

        @if(session('cart'))
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Product</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Quantity</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $total = 0;
                        @endphp
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-20 h-20">
                                            <img class="w-full h-full rounded-full" src="{{ $details['image'] }}" alt="{{ $details['name'] }}" />
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $details['name'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ format_price($details['price']) }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="w-16 text-center bg-gray-100 border border-gray-300 rounded-md py-1"/>
                                        <button type="submit" class="ml-2 text-blue-500 hover:text-blue-700 font-semibold">Update</button>
                                    </form>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ format_price($details['price'] * $details['quantity']) }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="px-5 py-5 bg-gray-50 border-t justify-end items-center">
                    <div class="flex justify-end">
                         <h3 class="text-2xl font-semibold text-gray-700">Subtotal:</h3>
                         <h3 class="text-2xl font-bold text-gray-900 ml-4">{{ format_price($total) }}</h3>
                    </div>
                   

                    @if(session('coupon'))
                        @php
                            $coupon = session('coupon');
                            $discount = 0;
                            if ($coupon['type'] == 'fixed') {
                                $discount = $coupon['value'];
                            } else {
                                $discount = ($total * $coupon['value']) / 100;
                            }
                        @endphp
                        <div class="flex justify-end mt-4">
                            <h3 class="text-xl font-semibold text-gray-700">Discount ({{ $coupon['code'] }}):</h3>
                            <h3 class="text-xl font-bold text-gray-900 ml-4">-{{ format_price($discount) }}</h3>
                        </div>
                         <div class="flex justify-end mt-4">
                            <h3 class="text-2xl font-semibold text-gray-700">Total:</h3>
                            <h3 class="text-2xl font-bold text-gray-900 ml-4">{{ format_price($total - $discount) }}</h3>
                        </div>
                       
                        <div class="flex justify-end mt-4">
                            <form action="{{ route('cart.removeCoupon') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Remove Coupon</button>
                            </form>
                        </div>
                    @else
                    <div class="flex justify-end mt-4">
                         <h3 class="text-2xl font-semibold text-gray-700">Total:</h3>
                         <h3 class="text-2xl font-bold text-gray-900 ml-4">{{ format_price($total) }}</h3>
                    </div>
                    @endif
                </div>
            </div>

            <div class="mt-8 ">
                <form action="{{ route('cart.applyCoupon') }}" method="POST" class="w-full max-w-sm">
                    @csrf
                    <div class="flex items-center border-b-2 border-blue-500 py-2">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="coupon_code" placeholder="Enter coupon code">
                        <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                            Apply Coupon
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8 flex justify-end">
                <a href="{{ route('checkout.index') }}" class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-500 transition-colors">Checkout</a>
            </div>
        @else
            <div class="text-center py-20">
                <h2 class="text-2xl font-semibold text-gray-700">Your cart is empty.</h2>
                <p class="mt-4 text-gray-500">Browse our products and start shopping!</p>
                <a href="{{ url('/') }}" class="mt-8 inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-500 transition-colors">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection
