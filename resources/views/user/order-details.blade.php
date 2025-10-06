@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-16">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/4">
            @include('user.partials.sidebar')
        </div>
        <div class="w-full md:w-3/4">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Order Details</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Shipping Address</h2>
                        <p>{{ $order->name }}</p>
                        <p>{{ $order->address }}</p>
                        <p>{{ $order->city }}, {{ $order->postal_code }}</p>
                        <p>{{ $order->email }}</p>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Summary</h2>
                        <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                        <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                        <p><strong>Status:</strong> {{ $order->status }}</p>
                        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                        <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Items Ordered</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($order->items as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->price, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
