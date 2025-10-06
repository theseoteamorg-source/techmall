@extends('layouts.app')

@section('schema')
    {{ optional($productSchema)->toScript() }}
    {{ optional($breadcrumbsSchema)->toScript() }}
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <div class="swiper-container gallery-top mb-3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded-lg shadow-md w-100">
                    </div>
                    @foreach ($product->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded-lg shadow-md w-100">
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded-lg shadow-sm">
                    </div>
                    @foreach ($product->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded-lg shadow-sm">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-details p-4">
                <h1 class="fw-bold mb-3">{{ $product->name }}</h1>
                <div class="d-flex align-items-center mb-3">
                    <div class="text-warning me-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= $product->average_rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                        @endfor
                    </div>
                    <a href="#reviews" class="text-muted">({{ $product->reviews_count }} {{ Illuminate\Support\Str::plural('review', $product->reviews_count) }})</a>
                </div>
                <p class="text-muted mb-3">{{ $product->category->name }}</p>
                <div class="d-flex align-items-center mb-4">
                    <p class="display-4 fw-bold text-primary mb-0 me-3" id="product-price">
                        @if($product->activeVariants->isNotEmpty())
                            {{ format_price($product->activeVariants->first()->price) }}
                        @else
                            {{ format_price($product->price) }}
                        @endif
                    </p>
                </div>
                <p class="lead mb-4">{{ $product->description }}</p>

                <form action="{{ route('cart.add', $product) }}" method="POST" id="cart-form">
                    @csrf

                    @if($product->activeVariants->isNotEmpty())
                    <div class="variants-selector mb-4">
                        <h5 class="mb-3 fw-medium">Select {{ $product->variants->first()->type ?? 'Variant' }}:</h5>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach($product->activeVariants as $key => $variant)
                                <div class="variant-option">
                                    <input type="radio"
                                           class="btn-check"
                                           name="variant_id"
                                           id="variant-{{ $variant->id }}"
                                           value="{{ $variant->id }}"
                                           data-price="{{ $variant->price }}"
                                           autocomplete="off"
                                           {{ $key == 0 ? 'checked' : '' }}>
                                    <label class="btn btn-outline-dark variant-label" for="variant-{{ $variant->id }}">
                                        {{ $variant->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="input-group input-group-sm" style="max-width: 120px;">
                            <button class="btn btn-outline-secondary" type="button" id="quantity-minus">-</button>
                            <input type="text" class="form-control text-center" name="quantity" id="quantity-input" value="1" aria-label="Quantity">
                            <button class="btn btn-outline-secondary" type="button" id="quantity-plus">+</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0 d-flex">
                            <button type="submit" name="action" value="add_to_cart" class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-plus-fill me-2"></i> Add to Cart
                            </button>
                        </div>
                        <div class="col-md-6 d-flex">
                            <button type="submit" name="action" value="buy_now" class="btn btn-success btn-lg w-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-wallet-fill me-2"></i> Buy Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                            {{ $product->description }}
                        </div>
                        <div class="tab-pane fade p-3" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <h3 class="mb-4">Customer Reviews</h3>

                            @forelse($product->reviews as $review)
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($review->user->email))) }}?s=50&d=mp" alt="{{ $review->user->name }}" class="rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mt-0">{{ $review->user->name }}</h5>
                                            <div class="text-warning">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p>{{ $review->comment }}</p>
                                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @empty
                                <p>There are no reviews for this product yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
    .gallery-top {
        height: 80%;
        width: 100%;
    }
    .gallery-thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
        cursor: pointer;
    }
    .gallery-thumbs .swiper-slide-thumb-active {
        opacity: 1;
    }
    .variant-label {
        transition: all 0.3s ease-in-out;
        border-width: 2px;
    }
    .btn-check:checked + .variant-label {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
        color: white;
        box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.5);
    }
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
    .rating > input{
        display:none;
    }
    .rating > label {
        position: relative;
        width: 1em;
        font-size: 2rem;
        color: #FFD600;
        cursor: pointer;
    }
    .rating > label::before{
        content: "\2605";
        position: absolute;
        opacity: 0;
    }
    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
        opacity: 1 !important;
    }
    .rating > input:checked ~ label:before{
        opacity:1;
    }
    .rating:hover > input:checked ~ label:before{
        opacity: 0.4;
    }

</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });

        const quantityInput = document.getElementById('quantity-input');
        const quantityMinus = document.getElementById('quantity-minus');
        const quantityPlus = document.getElementById('quantity-plus');

        quantityMinus.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value, 10);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        quantityPlus.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value, 10);
            quantityInput.value = currentValue + 1;
        });

        const priceElement = document.getElementById('product-price');
        const variantSelector = document.querySelector('.variants-selector');

        if (variantSelector) {
            variantSelector.addEventListener('change', function(event) {
                if (event.target.name === 'variant_id') {
                    const price = parseFloat(event.target.dataset.price).toFixed(2);
                    priceElement.textContent = "{{ config('app.currency', 'USD') }} " + price;
                }
            });
        }
    });
</script>
@endpush
