@extends('layouts.shop')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-success">Thank You!</h1>
                        <p class="card-text">Your order has been placed successfully.</p>
                        <a href="{{ route('shop.index') }}" class="btn btn-primary">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
