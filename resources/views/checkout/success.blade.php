@extends('layouts.frontend')

@section('content')
    <div class="container my-5">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-4">Thank You!</h1>
            <p class="lead">Your order has been placed successfully.</p>
            <a href="{{ url('/') }}" class="mt-5 btn btn-primary btn-lg">Continue Shopping</a>
        </div>
    </div>
@endsection
