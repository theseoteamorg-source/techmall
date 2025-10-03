@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded-lg shadow-md">
        </div>
        <div class="col-md-6">
            <div class="product-details p-4">
                <h1 class="fw-bold mb-3">{{ $product->name }}</h1>
                <p class="text-muted mb-3">{{ $product->category->name }}</p>
                <div class="d-flex align-items-center mb-4">
                    <p class="h2 fw-bold text-primary mb-0">${{ $product->price }}</p>
                </div>
                <p class="lead mb-4">{{ $product->description }}</p>
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm mb-3" style="max-width: 120px;">
                        <button class="btn btn-outline-secondary" type="button" id="quantity-minus">-</button>
                        <input type="text" class="form-control text-center" name="quantity" id="quantity-input" value="1" aria-label="Quantity">
                        <button class="btn btn-outline-secondary" type="button" id="quantity-plus">+</button>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-cart-plus-fill me-2"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                            {{ $product->description }}
                        </div>
                        <div class="tab-pane fade p-3" id="details" role="tabpanel" aria-labelledby="details-tab">
                            {!! $product->details !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.getElementById('quantity-input');
        const quantityMinus = document.getElementById('quantity-minus');
        const quantityPlus = document.getElementById('quantity-plus');

        quantityMinus.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value, 10);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        quantityPlus.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value, 10);
            quantityInput.value = currentValue + 1;
        });
    });
</script>
@endpush