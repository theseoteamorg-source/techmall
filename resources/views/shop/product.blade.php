@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->image_url }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="lead">{{ $product->description }}</p>
                <h3>${{ $product->price }}</h3>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h4>Reviews</h4>
                @foreach ($product->reviews as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->user->name }}</h5>
                            <p class="card-text">{{ $review->comment }}</p>
                            <div>
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('products.reviews.create', $product->slug) }}" class="btn btn-primary">Write a review</a>
            </div>
        </div>
    </div>
@endsection
