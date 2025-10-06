@extends('layouts.shop')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Checkout</h1>
        <form action="{{ route('shop.placeOrder') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <h4>Billing Details</h4>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h4>Your Order</h4>
                    <ul class="list-group mb-3">
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">{{ $details['name'] }}</h6>
                                        <small class="text-muted">Quantity: {{ $details['quantity'] }}</small>
                                    </div>
                                    <span class="text-muted">${{ $details['price'] * $details['quantity'] }}</span>
                                </li>
                            @endforeach
                        @endif
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal</span>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </li>
                        @if(session('coupon'))
                            @php
                                $discount = 0;
                                if (session('coupon')['type'] == 'fixed') {
                                    $discount = session('coupon')['value'];
                                } else {
                                    $discount = ($total * session('coupon')['value']) / 100;
                                }
                                $total -= $discount;
                            @endphp
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>{{ session('coupon')['code'] }}</small>
                                </div>
                                <span class="text-success">−${{ number_format($discount, 2) }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </li>
                    </ul>

                    <h4>Payment Method</h4>
                    <div class="my-3">
                        @foreach($paymentMethods as $paymentMethod)
                        <div class="form-check">
                            <input id="{{ $paymentMethod->code }}" name="payment_method" type="radio" class="form-check-input" value="{{ $paymentMethod->code }}" required>
                            <label class="form-check-label" for="{{ $paymentMethod->code }}">{{ $paymentMethod->name }}</label>
                        </div>
                        @endforeach
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Place Order</button>
                </div>
            </div>
        </form>
    </div>
@endsection
