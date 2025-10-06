@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Thank You!</h1>
                <p class="lead">Your order has been placed successfully.</p>
                <a href="{{ route('shop.home') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </div>
@endsection
