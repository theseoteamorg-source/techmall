@extends('layouts.shop')

@section('content')
    <div class="container">
        <h2>Your Cart</h2>
        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ config('settings.currency_symbol') }}{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ config('settings.currency_symbol') }}{{ Cart::get($item->id)->getPriceSum() }}</td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <h4>Total: {{ config('settings.currency_symbol') }}{{ Cart::getTotal() }}</h4>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary">Checkout</a>
            </div>
        @endif
    </div>
@endsection
