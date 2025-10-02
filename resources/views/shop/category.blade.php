@extends('layouts.shop')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4 mb-4">{{ $category->name }}</h1>
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 product-card-new">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <div class="product-image">
                                        <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                                        @if($product->is_new)
                                            <span class="product-badge">New</span>
                                        @endif
                                    </div>
                                </a>
                                <div class="card-body product-content">
                                    <h4 class="card-title product-title"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                    <h5 class="product-price">${{ $product->price }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-top-0">
                                    <form action="#" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type-="submit" class="btn btn-primary add-to-cart-btn" disabled>Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <p class="text-center">No products found in this category.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
