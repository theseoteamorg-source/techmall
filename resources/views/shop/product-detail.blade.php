@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <!-- Product Image Gallery -->
            <div id="product-gallery" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/600x600.png/007bff/ffffff?text=Product+Image+1" class="d-block w-100" alt="Product Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x600.png/007bff/ffffff?text=Product+Image+2" class="d-block w-100" alt="Product Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/600x600.png/007bff/ffffff?text=Product+Image+3" class="d-block w-100" alt="Product Image 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#product-gallery" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#product-gallery" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Product Details -->
            <h1 class="display-5 fw-bold">Elegant Product Name</h1>
            <p class="text-muted">SKU: PROD-12345</p>
            <p class="fs-4 my-3">Rs. 9,999</p>
            <p class="lead">This is a brief, engaging description of the product. It highlights the key features and benefits, enticing the customer to make a purchase.</p>

            <hr class="my-4">

            <!-- Quantity and Add to Cart -->
            <div class="d-flex align-items-center mb-4">
                <label for="quantity" class="form-label me-3">Quantity:</label>
                <input type="number" id="quantity" class="form-control" value="1" min="1" style="width: 80px;">
            </div>
            <button class="btn btn-primary btn-lg text-white">
                <i class="bi bi-cart-plus-fill me-2"></i> Add to Cart
            </button>

            <hr class="my-4">

            <!-- Product Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab" aria-controls="specs" aria-selected="false">Specifications</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <p>This is the full, detailed description of the product. It can include multiple paragraphs, lists, and other formatting to provide a comprehensive overview of the product's features, benefits, and use cases.</p>
                </div>
                <div class="tab-pane fade p-3" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Dimension</th>
                                <td>10x20x30 cm</td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td>5 kg</td>
                            </tr>
                            <tr>
                                <th>Material</th>
                                <td>High-Quality Steel</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade p-3" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="https://via.placeholder.com/50" alt="Reviewer" class="rounded-circle">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mt-0">Jane Doe</h5>
                            <p>This product is amazing! I highly recommend it.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
