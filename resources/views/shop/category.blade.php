@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Filters</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('shop.category', $category->slug) }}" method="GET">
                            <div class="form-group">
                                <label for="min_price">Min Price</label>
                                <input type="number" name="min_price" id="min_price" class="form-control" value="{{ request('min_price') }}">
                            </div>
                            <div class="form-group">
                                <label for="max_price">Max Price</label>
                                <input type="number" name="max_price" id="max_price" class="form-control" value="{{ request('max_price') }}">
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select name="brand" id="brand" class="form-control">
                                    <option value="">All Brands</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->slug }}" {{ request('brand') == $brand->slug ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0">{{ $category->name }}</h4>
                            <div>
                                <form action="{{ route('shop.category', $category->slug) }}" method="GET">
                                    <select name="sort" class="form-control" onchange="this.form.submit()">
                                        <option value="" {{ request('sort') == '' ? 'selected' : '' }}>Default Sorting</option>
                                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Sort by price: low to high</option>
                                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                                        <option value="newness" {{ request('sort') == 'newness' ? 'selected' : '' }}>Sort by newness</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <a href="{{ route('shop.product', $product->slug) }}">
                                    <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a></h5>
                                    <p class="card-text">${{ $product->price }}</p>
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
