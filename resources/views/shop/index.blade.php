@extends('layouts.shop')

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
        <div class="row">
            <div class="col-lg-3">
                @include('shop.partials.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Shop</h4>
                    <form action="{{ route('shop.index') }}" method="GET">
                        <select name="sort" class="form-control form-control-sm" onchange="this.form.submit()">
                            <option value="" {{ request('sort') == '' ? 'selected' : '' }}>Default Sorting</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Sort by price: low to high</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                            <option value="newness" {{ request('sort') == 'newness' ? 'selected' : '' }}>Sort by newness</option>
                        </select>
                    </form>
                </div>

                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 product-card">
                                <a href="{{ route('shop.product', $product->slug) }}">
                                    <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                                    </h5>
                                    <div class="d-flex justify-content-start align-items-center mb-2">
                                        @php
                                            $averageRating = $product->averageRating();
                                            $fullStars = floor($averageRating);
                                            $halfStar = $averageRating - $fullStars >= 0.5;
                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                        @endphp
                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <i class="fas fa-star text-warning"></i>
                                        @endfor
                                        @if ($halfStar)
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                        @endif
                                        @for ($i = 0; $i < $emptyStars; $i++)
                                            <i class="far fa-star text-warning"></i>
                                        @endfor
                                    </div>
                                    <p class="card-text">${{ $product->price }}</p>
                                    <div class="mt-auto">
                                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-block">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">No products found.</p>
                        </div>
                    @endforelse
                </div>

                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
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
