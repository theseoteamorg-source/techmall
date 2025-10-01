@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to our Shop!</h1>
            <p class="lead">We have a wide variety of products to choose from.</p>
            <hr class="my-4">
            <p>Click the button below to see our products.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('shop.products') }}" role="button">View Products</a>
        </div>
    </div>
@endsection
