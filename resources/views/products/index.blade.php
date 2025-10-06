@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3 gaming-sidebar">
                <div class="card mb-4">
                    <div class="card-header">
                        Search
                    </div>
                    <div class="card-body">
                        <form action="{{ route('shop.index') }}" method="GET">
                            <div class="search-bar">
                                <input type="text" name="search" class="form-control search-input" placeholder="Search for products...">
                                <button class="search-btn" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        Categories
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Brands
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($brands as $brand)
                                <li class="list-group-item">
                                    <a href="{{ route('shop.index', ['brand' => $brand->slug]) }}">{{ $brand->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 product-card-new">
                                <a href="{{ route('products.show', $product) }}">
                                    <div class="product-image">
                                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                                    </div>
                                </a>
                                <div class="card-body product-content">
                                    <h6 class="card-title product-title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
                                    <p class="card-text product-price">{{ format_price($product->price) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p>No products found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
