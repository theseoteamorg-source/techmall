@extends('layouts.shop')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-text">
                        <h2>Find Your Next Favorite Tech Gadget</h2>
                        <p>Explore our wide range of products and discover the latest in tech.</p>
                    </div>
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
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                                    </h5>
                                    <p class="card-text">${{ $product->price }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-top-0">
                                     <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-block">Add to Cart</a>
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
    .hero-section {
        background: #f8f9fa;
        padding: 60px 0;
        text-align: center;
    }

    .product-card {
        transition: transform .2s;
    }

    .product-card:hover {
        transform: scale(1.05);
    }
</style>
@endpush
