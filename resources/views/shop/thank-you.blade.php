@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="card p-5 shadow-lg">
                <i class="bi bi-check-circle-fill text-success display-1 mb-4"></i>
                <h1 class="display-4 fw-bold">Thank You!</h1>
                <p class="lead">Your order has been placed successfully.</p>
                <hr class="my-4">
                <p>We have sent you an email confirmation with your order details. Your order number is <strong class="text-primary">#12345-ABCDE</strong>.</p>
                <div class="mt-4">
                    <a href="{{ route('shop.home') }}" class="btn btn-primary btn-lg text-white">Continue Shopping</a>
                    <a href="#" class="btn btn-outline-secondary btn-lg ms-2">View Order Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .display-1 {
        font-size: 6rem;
    }
</style>
@endpush
