@extends('layouts.shop')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Your Shopping Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="row">
            <div class="col-lg-8">
                @foreach(session('cart') as $id => $details)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="{{ $details['image'] }}" class="img-fluid" alt="{{ $details['name'] }}">
                                </div>
                                <div class="col-md-4">
                                    <h5 class="mb-0">{{ $details['name'] }}</h5>
                                    @if($details['variant_id'])
                                        @php
                                            $variant = App\Models\ProductVariant::find($details['variant_id']);
                                        @endphp
                                        <p class="text-muted small">{{ $variant->attributeValues->pluck('value')->implode(', ') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <p class="mb-0">${{ $details['price'] }}</p>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control form-control-sm quantity" onchange="this.form.submit()">
                                    </form>
                                </div>
                                <div class="col-md-2 text-right">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        @php $total = 0; @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                        @endforeach
                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>

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
                            <div class="d-flex justify-content-between">
                                <span>Coupon ({{ session('coupon')['code'] }}) <a href="{{ route('cart.removeCoupon') }}" class="text-danger">[Remove]</a></span>
                                <span class="text-success">-${{ number_format($discount, 2) }}</span>
                            </div>
                        @endif

                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <hr>

                        @if(!session('coupon'))
                            <form action="{{ route('cart.applyCoupon') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="coupon_code" placeholder="Coupon code">
                                    <button class="btn btn-secondary" type="submit">Apply</button>
                                </div>
                                @if($errors->has('coupon_code'))
                                    <div class="text-danger">{{ $errors->first('coupon_code') }}</div>
                                @endif
                            </form>
                        @endif

                        <div class="d-grid gap-2">
                            <a href="{{ route('shop.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                            <a href="{{ route('shop.index') }}" class="btn btn-light mt-2">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info" role="alert">
            Your cart is currently empty.
        </div>
        <a href="{{ route('shop.index') }}" class="btn btn-primary">Return to Shop</a>
    @endif
</div>
@endsection
