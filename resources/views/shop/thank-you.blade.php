@extends('layouts.frontend')

@section('content')
    <div class="container my-5 text-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4">Thank You!</h1>
                <p class="lead">Your order has been placed successfully.</p>
                <hr class="my-4">
                <p>We have received your order and will begin processing it shortly.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('shop.index') }}" role="button">Continue Shopping</a>
            </div>
        </div>
    </div>
@endsection
