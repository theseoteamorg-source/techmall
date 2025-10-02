@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-4">Shopping Cart</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <!-- Cart Items -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="https://via.placeholder.com/150" class="img-fluid" alt="Product Image">
                        </div>
                        <div class="col-md-4">
                            <h5>Elegant Product Name</h5>
                            <p class="text-muted">SKU: PROD-12345</p>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">Rs. 9,999</p>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add another item for demonstration -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="https://via.placeholder.com/150" class="img-fluid" alt="Product Image">
                        </div>
                        <div class="col-md-4">
                            <h5>Another Great Product</h5>
                            <p class="text-muted">SKU: PROD-67890</p>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" value="2" min="1">
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">Rs. 4,999</p>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Cart Summary -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Cart Summary</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Subtotal
                            <span>Rs. 19,997</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Shipping
                            <span>Rs. 500</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            Total
                            <span>Rs. 20,497</span>
                        </li>
                    </ul>
                    <a href="{{ route('shop.checkout') }}" class="btn btn-primary btn-lg w-100 mt-4 text-white">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
