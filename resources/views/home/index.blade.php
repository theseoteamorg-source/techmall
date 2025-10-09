@extends('layouts.frontend')

@section('content')
    <!-- Hero Slider -->
    <div id="hero-slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ $slider->image_path }}" class="d-block w-100" alt="{{ $slider->heading }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->heading }}</h5>
                        <p>{{ $slider->sub_heading }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Features Section -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-exchange-alt fa-3x mb-3"></i>
                    <h5>7 Days Exchange</h5>
                    <p>We offer a 7-day exchange policy on all products.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-certificate fa-3x mb-3"></i>
                    <h5>Original Products</h5>
                    <p>All our products are 100% original and genuine.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <i class="fas fa-shipping-fast fa-3x mb-3"></i>
                    <h5>Fast Delivery</h5>
                    <p>Get your products delivered to your doorstep in no time.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        @foreach ($categories as $category)
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="mb-4">{{ $category->name }}</h2>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach ($category->products as $product)
                            <x-product-card :product="$product" class="col-lg-3 col-md-6 mb-4" />
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('styles')
<style>
    .carousel-item img {
        max-height: 400px;
        object-fit: cover;
    }
    .product-card .card-body {
        display: flex;
        flex-direction: column;
    }
</style>
@endpush
