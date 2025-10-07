@extends('layouts.frontend')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-color: #00f2ea;
        --background-color: #0d0e1b;
        --surface-color: #1a1b2e;
        --glow-color: rgba(0, 242, 234, 0.4);
        --text-color: #e0e0e0;
        --text-muted: #8b8ca8;
        --font-display: 'Orbitron', sans-serif;
        --font-body: 'Poppins', sans-serif;
    }

    body {
        font-family: var(--font-body);
        background-color: var(--background-color);
        color: var(--text-color);
        background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.05) 1px, transparent 0);
        background-size: 20px 20px;
    }

    .product-game-container {
        background-color: var(--surface-color);
        border: 1px solid var(--primary-color);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 0 40px var(--glow-color);
        position: relative;
        overflow: hidden;
    }

    .product-game-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(transparent, var(--glow-color), transparent 30%);
        animation: rotate 10s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .product-title {
        font-family: var(--font-display);
        font-size: 3rem;
        font-weight: 700;
        color: var(--primary-color);
        text-shadow: 0 0 10px var(--glow-color), 0 0 20px var(--glow-color);
        margin-bottom: 1rem;
    }

    .main-image-container {
        border-radius: 15px;
        border: 2px solid var(--primary-color);
        box-shadow: 0 0 20px var(--glow-color);
        overflow: hidden;
    }

    .thumbnail-image-container {
        cursor: pointer;
        border: 2px solid transparent;
        border-radius: 10px;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .thumbnail-image-container:hover,
    .thumbnail-image-container.active {
        border-color: var(--primary-color);
        box-shadow: 0 0 15px var(--glow-color);
        transform: scale(1.05);
    }
    
    .product-price {
        font-family: var(--font-display);
        font-size: 2.5rem;
        font-weight: 700;
        color: #fff;
    }

    .star-rating i {
        text-shadow: 0 0 5px #ffc107;
    }

    .form-label {
        font-family: var(--font-display);
        color: var(--primary-color);
    }

    .form-select, .form-control {
        background-color: rgba(26, 27, 46, 0.8);
        color: var(--text-color);
        border: 1px solid var(--primary-color);
        border-radius: 5px;
    }

    .form-select:focus, .form-control:focus {
        background-color: var(--surface-color);
        color: var(--text-color);
        border-color: var(--primary-color);
        box-shadow: 0 0 15px var(--glow-color);
    }
    
    .quantity-input-group {
        background-color: var(--surface-color);
        border: 1px solid var(--primary-color);
        border-radius: 50px;
        padding: 5px;
    }

    .quantity-btn,
    .quantity-input {
        background: transparent;
        border: none;
        color: var(--text-color);
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        font-family: var(--font-display);
    }

    .quantity-btn {
        width: 40px;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .quantity-btn:hover {
        color: var(--primary-color);
        text-shadow: 0 0 10px var(--glow-color);
    }
    
    .btn {
        font-family: var(--font-display);
        border-radius: 50px;
        border: 2px solid var(--primary-color);
        background: transparent;
        color: var(--primary-color);
        padding: 12px 30px;
        font-weight: 700;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover, .btn-success:hover {
        color: var(--background-color);
        box-shadow: 0 0 20px var(--glow-color);
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--primary-color);
        transition: all 0.3s ease;
        z-index: -1;
    }

    .btn-primary:hover::before {
        left: 0;
    }

    .btn-success {
        border-color: #28a745;
        color: #28a745;
    }
    
    .btn-success:hover {
        color: #fff;
        box-shadow: 0 0 20px rgba(40, 167, 69, 0.4);
    }

    .btn-success::before {
        background: #28a745;
    }

    .btn-success:hover::before {
        left: 0;
    }

    .nav-tabs {
        border-bottom: 1px solid var(--primary-color);
    }
    .nav-tabs .nav-link {
        font-family: var(--font-display);
        color: var(--text-muted);
        border: none;
        background: transparent;
        padding: 1rem 1.5rem;
        position: relative;
    }

    .nav-tabs .nav-link.active, .nav-tabs .nav-link:hover {
        color: var(--primary-color);
    }

    .nav-tabs .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--primary-color);
        box-shadow: 0 0 10px var(--glow-color);
    }

    .review {
        border-bottom: 1px solid var(--surface-color);
    }

    h2 {
        font-family: var(--font-display);
        color: var(--primary-color);
        text-shadow: 0 0 10px var(--glow-color);
    }

    .related-product-card {
        background-color: var(--surface-color);
        border-radius: 15px;
        border: 1px solid transparent;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .related-product-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2), 0 0 20px var(--glow-color);
    }
</style>
@endpush

@section('content')
    <div class="container my-5">
        <div class="product-game-container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="main-image-container mb-3">
                        <img itemprop="image" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid w-100" id="mainImage">
                    </div>
                    <div class="thumbnail-slider">
                        <div class="d-flex justify-content-center">
                            @foreach ($product->images as $image)
                                <div class="thumbnail-image-container mx-2">
                                    <img src="{{ $image->image_url }}" alt="{{ $product->name }}" class="img-fluid thumbnail-image" onclick="changeImage('{{ $image->image_url }}')">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 itemprop="name" class="product-title">{{ $product->name }}</h1>
                    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="d-flex justify-content-start align-items-center mb-3 star-rating">
                        @php
                            $averageRating = $product->averageRating();
                            $fullStars = floor($averageRating);
                        @endphp
                        @for ($i = 0; $i < $fullStars; $i++)
                            <i class="fas fa-star text-warning"></i>
                        @endfor
                        @for ($i = 0; $i < 5 - $fullStars; $i++)
                            <i class="far fa-star text-warning"></i>
                        @endfor
                        <span class="ms-3 text-muted">(<span itemprop="reviewCount">{{ $product->reviews->count() }}</span> Reviews)</span>
                        <meta itemprop="ratingValue" content="{{ number_format($averageRating, 1) }}" />
                        <meta itemprop="bestRating" content="5" />
                    </div>
                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <p class="product-price mb-4">
                            <span itemprop="priceCurrency" content="{{ config('settings.currency_code') }}">{{ config('settings.currency_symbol') }}</span><span itemprop="price" content="{{ $product->price }}">{{ number_format($product->price, 2) }}</span>
                        </p>
                        <link itemprop="availability" href="http://schema.org/InStock" />
                    </div>
                    <p itemprop="description" class="mb-4">{{ $product->description }}</p>

                    <form action="{{ route('cart.add', $product->id) }}" method="GET">
                        @if ($product->variants->count() > 0)
                            <div class="mb-4">
                                <label for="variant" class="form-label">SELECT CONFIGURATION:</label>
                                <select class="form-select" id="variant" name="variant_id">
                                    @foreach ($product->variants as $variant)
                                        <option value="{{ $variant->id }}" data-price="{{ $variant->price }}">
                                            {{ $variant->name }} (+{{ config('settings.currency_symbol') }}{{ number_format($variant->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="d-flex align-items-center mb-4">
                            <label for="quantity" class="form-label me-3 mb-0">QUANTITY:</label>
                            <div class="quantity-input-group">
                                <button class="btn quantity-btn" type="button" id="minus-btn">-</button>
                                <input type="text" id="quantity" name="quantity" class="quantity-input" value="1" min="1">
                                <button class="btn quantity-btn" type="button" id="plus-btn">+</button>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" class="btn btn-primary flex-grow-1">Add to Cart</button>
                            <button type="submit" formaction="{{ route('cart.buy.now', $product->id) }}" class="btn btn-success flex-grow-1">Buy Now</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">SPECIFICATIONS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="variants-tab" data-bs-toggle="tab" data-bs-target="#variants" type="button" role="tab" aria-controls="variants" aria-selected="false">CONFIGURATIONS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">REVIEWS</button>
                        </li>
                    </ul>
                    <div class="tab-content p-4">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane fade" id="variants" role="tabpanel" aria-labelledby="variants-tab">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr><th scope="col">Name</th><th scope="col">Price</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->variants as $variant)
                                        <tr><td>{{ $variant->name }}</td><td>{{ config('settings.currency_symbol') }}{{ number_format($variant->price, 2) }}</td></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            @forelse ($product->reviews as $review)
                                <div class="review mb-4 pb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}" class="rounded-circle me-3" width="40">
                                        <div>
                                            <strong itemprop="author">{{ $review->user->name }}</strong>
                                            <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating">
                                                @for ($i = 0; $i < $review->rating; $i++) <i class="fas fa-star text-warning"></i> @endfor
                                                @for ($i = 0; $i < 5 - $review->rating; $i++) <i class="far fa-star text-warning"></i> @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <p itemprop="reviewBody" class="text-muted">{{ $review->comment }}</p>
                                </div>
                            @empty
                                <p>No reviews yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($relatedProducts->count() > 0)
            <div class="row mt-5 pt-4">
                <div class="col-12">
                    <h2 class="mb-4">SIMILAR GEAR</h2>
                </div>
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="related-product-card">
                            <a href="{{ route('shop.product.show', $relatedProduct->slug) }}">
                                <img src="{{ $relatedProduct->image_url }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title fs-6 fw-bold"><a href="{{ route('shop.product.show', $relatedProduct->slug) }}" class="text-decoration-none" style="color: var(--text-color);">{{ $relatedProduct->name }}</a></h5>
                                <p class="card-text fw-bold" style="color: var(--primary-color);">{{ config('settings.currency_symbol') }}{{ number_format($relatedProduct->price, 2) }}</p>
                                <a href="{{ route('cart.add', $relatedProduct->id) }}" class="btn btn-sm btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    function changeImage(imageUrl) {
        const mainImage = document.getElementById('mainImage');
        mainImage.style.opacity = 0;
        setTimeout(() => {
            mainImage.src = imageUrl;
            mainImage.style.opacity = 1;
        }, 300);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const minusBtn = document.getElementById('minus-btn');
        const plusBtn = document.getElementById('plus-btn');
        const quantityInput = document.getElementById('quantity');

        minusBtn.addEventListener('click', function () {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        });

        plusBtn.addEventListener('click', function () {
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
        });
    });
</script>
@endpush
