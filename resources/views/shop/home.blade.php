@extends('layouts.shop')

@section('content')

<!-- Hero Section -->
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1527443154391-507e9dc6c5cc?auto=format&fit=crop&w=1920&h=800&q=80" class="d-block w-100 hero-carousel-image" alt="Modern workspace">
            <div class="carousel-caption d-none d-md-block">
                <h1>Unleash Your Creativity</h1>
                <p class="lead text-dark">Discover cutting-edge tech that fuels your passion and productivity.</p>
                <a href="{{ route('shop.products') }}" class="btn btn-lg btn-primary">Shop All Products</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1550009158-94ae76552485?auto=format&fit=crop&w=1920&h=800&q=80" class="d-block w-100 hero-carousel-image" alt="Gaming setup">
            <div class="carousel-caption d-none d-md-block">
                <h1>Elevate Your Game</h1>
                <p class="lead text-dark">Experience immersive gaming with our high-performance peripherals.</p>
                <a href="#" class="btn btn-lg btn-primary">Explore Gaming Gear</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
</div>

<div class="section-container">
    <div class="container">
        <!-- Featured Categories -->
        <h2 class="text-center mb-5">Explore Our World</h2>
        <div class="row g-4">
            <div class="col-md-6"><a href="#" class="category-card"><img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&h=400" class="img-fluid"><div class="category-info"><h3>Laptops & PCs</h3></div></a></div>
            <div class="col-md-6"><a href="#" class="category-card"><img src="https://images.unsplash.com/photo-1604671363073-1a17a62584a8?auto=format&fit=crop&w=600&h=400" class="img-fluid"><div class="category-info"><h3>Smartphones</h3></div></a></div>
            <div class="col-12"><a href="#" class="category-card"><img src="https://images.unsplash.com/photo-1525997673393-197c3b0a23a3?auto=format&fit=crop&w=1200&h=400" class="img-fluid"><div class="category-info"><h3>Accessories</h3></div></a></div>
        </div>

        <!-- Featured Products -->
        <h2 class="text-center mt-5 mb-5 pt-5">Top Picks For You</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @for ($i = 0; $i < 8; $i++)
            <div class="col" style="animation-delay: {{ $i * 0.1 }}s">
                <div class="card product-card-v3 h-100">
                    <div class="product-img-container">
                        <img src="https://placehold.co/400x400/3B82F6/FFFFFF?text=Tech+Product&font=inter" class="card-img-top" alt="Product Name">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title h6"><a href="#" class="text-dark text-decoration-none">Awesome New Gadget {{ $i + 1 }}</a></h3>
                        <p class="card-text text-muted flex-grow-1">A brief, catchy description of this must-have item.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text fw-bold fs-5 text-primary mb-0">Rs.{{ 999 + ($i * 50) }}</p>
                            <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-actions">
                        <a href="#" class="btn btn-light btn-sm"><i class="bi bi-heart"></i></a>
                        <a href="#" class="btn btn-light btn-sm"><i class="bi bi-arrow-left-right"></i></a>
                    </div>
                </div>
            </div>
            @endfor
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
