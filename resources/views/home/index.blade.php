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

    <!-- Blog Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">From Our Blog</h2>
            </div>
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card blog-post-card">
                        <img src="{{ $post->image_path }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                            <a href="{{ route('blog.show', $post) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="mb-4">What Our Customers Say</h2>
                </div>
            </div>

            <!-- Desktop Reviews -->
            <div class="d-none d-md-block">
                <div class="row mt-4">
                    @foreach ($reviews->take(4) as $review)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-circle">{{ strtoupper(substr($review->user->name, 0, 1)) }}</div>
                                        <div class="ms-3">
                                            <h5 class="m-0">{{ $review->user->name }}</h5>
                                            <div class="text-warning">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $review->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted">"{{ $review->comment }}"</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Mobile Reviews Slider -->
            <div class="d-md-none">
                <div id="reviews-carousel-mobile" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($reviews as $key => $review)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="card border-0 shadow-sm mx-2">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-circle">{{ strtoupper(substr($review->user->name, 0, 1)) }}</div>
                                            <div class="ms-3">
                                                <h5 class="m-0">{{ $review->user->name }}</h5>
                                                <div class="text-warning">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $review->rating)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted">"{{ $review->comment }}"</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#reviews-carousel-mobile" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#reviews-carousel-mobile" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
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
    .blog-post-card .card-body {
        display: flex;
        flex-direction: column;
    }
    .avatar-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: var(--primary-color);
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        font-weight: 600;
    }
</style>
@endpush
