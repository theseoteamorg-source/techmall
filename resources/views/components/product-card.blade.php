@props(['product'])

<div class="col">
    <div class="card product-card-v3 h-100">
        <div class="product-img-container">
            <a href="{{ route('products.show', $product) }}">
            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
            </a>
        </div>
        <div class="card-body d-flex flex-column">
            <h3 class="card-title h6"><a href="{{ route('products.show', $product) }}" class="text-dark text-decoration-none">{{ $product->name }}</a></h3>
            <p class="card-text text-muted flex-grow-1">{{ \Illuminate\Support\Str::limit($product->description, 75) }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-text fw-bold fs-5 text-primary mb-0">{{ format_price($product->price) }}</p>
                <a href="{{ route('cart.add', $product) }}" class="btn btn-primary btn-sm">Add to Cart</a>
            </div>
        </div>
        <div class="product-actions">
            <a href="#" class="btn btn-light btn-sm"><i class="bi bi-heart"></i></a>
            <a href="#" class="btn btn-light btn-sm"><i class="bi bi-arrow-left-right"></i></a>
        </div>
    </div>
</div>
