@extends('layouts.app')

@section('title', 'Deals')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Deals</h1>
                <div class="row">
                    @forelse ($deals as $deal)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <a href="{{ route('shop.product', $deal->product) }}">
                                    <img src="{{ $deal->product->image_url }}" class="card-img-top" alt="{{ $deal->product->name }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $deal->name }}</h5>
                                    <p class="card-text">Get a {{ $deal->discount_percentage }}% discount on <a href="{{ route('shop.product', $deal->product) }}">{{ $deal->product->name }}</a></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <p>No deals available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
