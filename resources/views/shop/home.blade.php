@extends('layouts.frontend')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
    .category-products-slider .swiper-container {
        padding-bottom: 40px;
    }
    .category-products-slider .swiper-pagination {
        bottom: 0;
    }
    .category-products-slider .swiper-button-next, .category-products-slider .swiper-button-prev {
        color: var(--primary-color);
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($sliders as $slider)
        <div class="carousel-item @if($loop->first) active @endif">
            <img src="{{ $slider->image_url }}" class="d-block w-100 hero-carousel-image" alt="{{ $slider->title }}">
            <div class="carousel-caption d-none d-md-block">
                <h1>{{ $slider->title }}</h1>
                <p class="lead text-dark">{{ $slider->subtitle }}</p>
                <a href="{{ $slider->link }}" class="btn btn-lg btn-primary">{{ $slider->button_text }}</a>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
</div>

<div class="section-container">
    <div class="container">
        @foreach($categories as $category)
        <div class="category-products-slider my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">{{ $category->name }}</h2>
                <a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="btn btn-outline-primary">View All</a>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($category->products->take(4) as $product)
                        <div class="swiper-slide">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        @endforeach

        <!-- Testimonials Section -->
        <div class="testimonials-section my-5">
            <h2 class="text-center mb-5">What Our Customers Say</h2>
            <div class="row">
                @foreach($reviews as $review)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="card-text">"{{ $review->comment }}"</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://i.pravatar.cc/50?u={{ $review->user->email }}" alt="{{ $review->user->name }}" class="rounded-circle me-3">
                                    <div>
                                        <h6 class="mb-0">{{ $review->user->name }}</h6>
                                        <div class="text-warning">
                                            @for($i = 0; $i < $review->rating; $i++) <i class="bi bi-star-fill"></i> @endfor
                                            @for($i = 5 - $review->rating; $i > 0; $i--) <i class="bi bi-star"></i> @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<!-- Newsletter Signup -->
<div class="bg-primary text-white py-5 mt-5">
    <div class="container text-center">
        <h2 class="text-white">Stay in the Loop</h2>
        <p class="lead mb-4">Subscribe to get the latest tech news, deals, and special offers.</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                    <button class="btn btn-dark" type="button">Subscribe Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            }
        });
    });
</script>
@endpush
