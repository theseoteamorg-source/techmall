@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $category->name }}</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">{{ $product->price }}</p>
                                            <a href="{{ route('shop.product.show', $product->slug) }}" class="btn btn-primary">View</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
