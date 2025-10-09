@props(['product', 'class' => 'col'])

<div class="{{ $class }} product-card" data-price="{{ $product->price }}">
    <div class="card h-100">
         <a href="{{ route('shop.product.show', $product->slug) }}">
            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
        </a>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">
                <a href="{{ route('shop.product.show', $product->slug) }}">{{ $product->name }}</a>
            </h5>
             <div class="d-flex justify-content-start align-items-center mb-2">
                @php
                    $averageRating = $product->averageRating();
                    $fullStars = floor($averageRating);
                    $halfStar = $averageRating - $fullStars >= 0.5;
                    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                @endphp
                @for ($i = 0; $i < $fullStars; $i++)
                    <i class="fas fa-star text-warning"></i>
                @endfor
                @if ($halfStar)
                    <i class="fas fa-star-half-alt text-warning"></i>
                @endif
                @for ($i = 0; $i < $emptyStars; $i++)
                    <i class="far fa-star text-warning"></i>
                @endfor
            </div>
            <p class="card-text fw-bold h5">{{ config('settings.currency_symbol') }}{{ number_format($product->price, 2) }}</p>
            <div class="mt-auto">
                 <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-block">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
