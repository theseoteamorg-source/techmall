@extends('layouts.app')

@section('schema')
    {{ $siteSchema->toScript() }}
@endsection

@section('content')
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url($slider->image_path) }}" class="d-block w-100 hero-carousel-image" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>{{ $slider->heading }}</h1>
                        <p>{{ $slider->sub_heading }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <section id="featured-categories" class="text-center py-5">
            <h2 class="mb-4">Featured Categories</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Category 1">
                        <div class="card-body">
                            <h3 class="card-title">Category 1</h3>
                            <a href="#" class="btn btn-outline-dark">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Category 2">
                        <div class="card-body">
                            <h3 class="card-title">Category 2</h3>
                            <a href="#" class="btn btn-outline-dark">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Category 3">
                        <div class="card-body">
                            <h3 class="card-title">Category 3</h3>
                            <a href="#" class="btn btn-outline-dark">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <main id="products">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @forelse ($products as $product)
                    <div class="col">
                        <div class="product-card-new">
                            <div class="product-image">
                                <a href="{{ route('products.show', $product) }}">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                                </a>
                                <div class="product-badge">New</div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
                                <p class="product-price">${{ number_format($product->price, 2) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-dark add-to-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <h2 class="display-5">No Products Found</h2>
                            <p class="lead">Please check back later for new products.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </main>

        <x-brand-list :brands="$brands" />

        <section id="newsletter" class="text-center py-5 mt-5 bg-light">
            <h2 class="mb-4">Stay in the Know</h2>
            <p class="lead mb-4">Subscribe to our newsletter for the latest products and offers.</p>
            <form class="row g-3 justify-content-center">
                <div class="col-auto">
                    <label for="newsletter-email" class="visually-hidden">Email</label>
                    <input type="email" class="form-control" id="newsletter-email" placeholder="Enter your email">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-dark">Subscribe</button>
                </div>
            </form>
        </section>

        <section class="text-center py-5 mt-5">
            <h2 class="mb-4">Follow Us</h2>
            <div class="d-flex justify-content-center gap-4">
                <a href="#" class="text-muted"><i class="bi bi-facebook fs-2"></i></a>
                <a href="#" class="text-muted"><i class="bi bi-twitter fs-2"></i></a>
                <a href="#" class="text-muted"><i class="bi bi-instagram fs-2"></i></a>
            </div>
        </section>
    </div>
@endsection
