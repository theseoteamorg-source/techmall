@extends('layouts.frontend')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Your Shopping Cart</h1>

        @if(session('cart'))
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">${{ $details['price'] }}</td>
                                        <td data-th="Quantity">
                                            <form action="{{ route('cart.update') }}" method="PATCH" class="d-flex">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control form-control-sm quantity update-cart" style="width: 70px;"/>
                                                <button type="submit" class="btn btn-sm btn-primary ms-2">Update</button>
                                            </form>
                                        </td>
                                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                        <td class="actions" data-th="">
                                            <form action="{{ route('cart.remove') }}" method="DELETE">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cart Summary</h5>
                            <div class="d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>${{ $total }}</span>
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
                                <a href="{{ route('shop.index') }}" class="btn btn-light">Continue Shopping</a>
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
