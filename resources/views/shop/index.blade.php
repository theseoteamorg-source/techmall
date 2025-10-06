@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('shop.partials.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Shop</h4>
                            <div class="d-flex align-items-center">
                                <span class="me-2">Sort by:</span>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}" class="btn btn-light me-2">Price Low to High</a>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}" class="btn btn-light me-2">Price High to Low</a>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'newness']) }}" class="btn btn-light">Newest</a>
                            </div>
                        </div>
                    </div>
                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('shop.product', $product->slug) }}">
                                    <img class="card-img-top" src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                                    </h5>
                                    <h5>${{ $product->price }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <p>No products found.</p>
                        </div>
                    @endforelse
                </div>
                <div class="d-flex justify-content-center">
                    {{ $products->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
