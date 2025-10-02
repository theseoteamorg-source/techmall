@extends('layouts.shop')

@section('content')

<!-- Hero Section (Bootstrap Carousel) -->
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=1920&h=800" class="d-block w-100" alt="..." width="1920" height="800">
            <div class="carousel-caption d-none d-md-block">
                <h5>Latest MacBook Pro</h5>
                <p>Supercharged for pros. The most powerful MacBook Pro ever.</p>
                <a href="{{ route('shop.products') }}" class="btn btn-primary">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1605787020600-b9ebd5df1d07?auto=format&fit=crop&w=1920&h=800" class="d-block w-100" alt="..." width="1920" height="800">
            <div class="carousel-caption d-none d-md-block">
                <h5>Gaming Headsets</h5>
                <p>Immerse yourself in the game with crystal clear audio.</p>
                <a href="{{ route('shop.products') }}" class="btn btn-primary">Explore</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container mt-5">
    <!-- Info Blocks -->
    <div class="row border p-3 mb-5">
        <div class="col-md-3 text-center">
            <i class="bi bi-truck fs-2 text-primary"></i>
            <h6 class="mt-2">Free Shipping</h6>
            <p class="text-muted small">On all orders over Rs.5000</p>
        </div>
        <div class="col-md-3 text-center">
            <i class="bi bi-headset fs-2 text-primary"></i>
            <h6 class="mt-2">24/7 Support</h6>
            <p class="text-muted small">Dedicated support</p>
        </div>
        <div class="col-md-3 text-center">
            <i class="bi bi-shield-check fs-2 text-primary"></i>
            <h6 class="mt-2">Secure Payments</h6>
            <p class="text-muted small">100% secure payments</p>
        </div>
        <div class="col-md-3 text-center">
            <i class="bi bi-arrow-counterclockwise fs-2 text-primary"></i>
            <h6 class="mt-2">Easy Returns</h6>
            <p class="text-muted small">30-day money-back guarantee</p>
        </div>
    </div>

    <!-- Featured Categories -->
    <h3 class="text-center mb-4">Shop by Category</h3>
    <div class="row">
        <div class="col-md-4 text-center"><a href="{{ route('shop.products') }}"><img src="https://placehold.co/400x300/F8F9FA/000?text=Laptops" class="img-fluid rounded mb-2"></a><h5>Laptops</h5></div>
        <div class="col-md-4 text-center"><a href="{{ route('shop.products') }}"><img src="https://placehold.co/400x300/F8F9FA/000?text=Mobiles" class="img-fluid rounded mb-2"></a><h5>Mobiles</h5></div>
        <div class="col-md-4 text-center"><a href="{{ route('shop.products') }}"><img src="https://placehold.co/400x300/F8F9FA/000?text=Accessories" class="img-fluid rounded mb-2"></a><h5>Accessories</h5></div>
    </div>

    <!-- Featured Products -->
    <h3 class="text-center my-5">Featured Products</h3>
    <div class="row">
        @for ($i = 0; $i < 4; $i++)
        <div class="col-md-3 mb-4">
            <div class="product-card card h-100">
                <a href="{{ route('shop.products') }}"><img src="https://placehold.co/300x300/F8F9FA/000?text=Product" class="card-img-top" alt="Product"></a>
                <div class="card-body text-center">
                    <h6 class="card-title"><a href="{{ route('shop.products') }}" class="text-decoration-none text-dark">Product Name</a></h6>
                    <p class="card-text fw-bold text-primary">Rs.99.99</p>
                    <a href="#" class="btn btn-sm btn-outline-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <!-- Promotional Banners -->
    <div class="row my-5">
        <div class="col-md-8">
            <a href="#"><img src="https://placehold.co/800x400/007BFF/FFF?text=Big+Sale+Now+On!" class="img-fluid rounded"></a>
        </div>
        <div class="col-md-4">
            <a href="#"><img src="https://placehold.co/400x400/F8F9FA/000?text=New+Arrivals" class="img-fluid rounded"></a>
        </div>
    </div>

    <!-- Bestsellers -->
    <h3 class="text-center my-5">Bestsellers</h3>
    <div class="row">
         @for ($i = 0; $i < 4; $i++)
        <div class="col-md-3 mb-4">
            <div class="product-card card h-100">
                <a href="{{ route('shop.products') }}"><img src="https://placehold.co/300x300/F8F9FA/000?text=Product" class="card-img-top" alt="Product"></a>
                <div class="card-body text-center">
                    <h6 class="card-title"><a href="{{ route('shop.products') }}" class="text-decoration-none text-dark">Product Name</a></h6>
                    <p class="card-text fw-bold text-primary">Rs.99.99</p>
                    <a href="#" class="btn btn-sm btn-outline-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <!-- From the Blog -->
    <h3 class="text-center my-5">From the Blog</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0">
                <img src="https://placehold.co/400x250/F8F9FA/000?text=Blog+Post" class="card-img-top rounded">
                <div class="card-body px-0">
                    <h5 class="card-title">How to Choose the Right Laptop</h5>
                    <p class="card-text text-muted">A quick guide to help you find the perfect laptop for your needs...</p>
                    <a href="#" class="btn btn-link px-0">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0">
                <img src="https://placehold.co/400x250/F8F9FA/000?text=Blog+Post" class="card-img-top rounded">
                <div class="card-body px-0">
                    <h5 class="card-title">The Rise of Mobile Gaming</h5>
                    <p class="card-text text-muted">Exploring the latest trends in mobile gaming and accessories...</p>
                    <a href="#" class="btn btn-link px-0">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0">
                <img src="https://placehold.co/400x250/F8F9FA/000?text=Blog+Post" class="card-img-top rounded">
                <div class="card-body px-0">
                    <h5 class="card-title">Top 10 Tech Accessories for 2023</h5>
                    <p class="card-text text-muted">Our curated list of the must-have tech accessories for this year...</p>
                    <a href="#" class="btn btn-link px-0">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Carousel -->
    <h3 class="text-center my-5">Our Brands</h3>
    <div class="row">
        <div class="col-2"><img src="https://placehold.co/150x80/F8F9FA/CCC?text=Brand" class="img-fluid"></div>
        <div class="col-2"><img src="https://placehold.co/150x80/F8F9FA/CCC?text=Brand" class="img-fluid"></div>
        <div class="col-2"><img src="https://placehold.co/150x80/F8F9FA/CCC?text=Brand" class="img-fluid"></div>
        <div class="col-2"><img src="https://placehold.co/150x80/F8F9FA/CCC?text=Brand" class="img-fluid"></div>
        <div class="col-2"><img src="https://placehold.co/150x80/F8F9FA/CCC?text=Brand" class="img-fluid"></div>
        <div class="col-2"><img src="https://placehold.co/150x80/F8F9FA/CCC?text=Brand" class="img-fluid"></div>
    </div>
</div>

<!-- Newsletter Signup -->
<div class="container-fluid bg-primary text-white py-5 mt-5">
    <div class="container text-center">
        <h3>Subscribe to Our Newsletter</h3>
        <p>Get the latest updates on new products and upcoming sales</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Your email address">
                    <button class="btn btn-dark" type="button">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Instagram Feed -->
<div class="container mt-5">
    <h3 class="text-center mb-4">Follow Us on Instagram</h3>
    <div class="row g-2">
        <div class="col-2"><a href="#"><img src="https://placehold.co/200x200/F8F9FA/000?text=Insta" class="img-fluid"></a></div>
        <div class="col-2"><a href="#"><img src="https://placehold.co/200x200/F8F9FA/000?text=Insta" class="img-fluid"></a></div>
        <div class="col-2"><a href="#"><img src="https://placehold.co/200x200/F8F9FA/000?text=Insta" class="img-fluid"></a></div>
        <div class="col-2"><a href="#"><img src="https://placehold.co/200x200/F8F9FA/000?text=Insta" class="img-fluid"></a></div>
        <div class="col-2"><a href="#"><img src="https://placehold.co/200x200/F8F9FA/000?text=Insta" class="img-fluid"></a></div>
        <div class="col-2"><a href="#"><img src="https://placehold.co/200x200/F8F9FA/000?text=Insta" class="img-fluid"></a></div>
    </div>
</div>

@endsection
