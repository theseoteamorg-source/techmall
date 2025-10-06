@extends('layouts.shop')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <!-- Product Image Gallery -->
            <div class="product-gallery">
                <div class="main-image mb-3">
                    <img src="{{ $product->image_url }}" class="img-fluid w-100" id="mainImage" alt="{{ $product->name }}">
                </div>
                <div class="thumbnail-images d-flex">
                    <img src="{{ $product->image_url }}" class="img-thumbnail w-25 mr-2" alt="{{ $product->name }}" onclick="document.getElementById('mainImage').src=this.src;">
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/products/' . $image->image) }}" class="img-thumbnail w-25 mr-2" alt="{{ $product->name }}" onclick="document.getElementById('mainImage').src=this.src;">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Product Details -->
            <h1>{{ $product->name }}</h1>
            <p class="lead">{{ $product->short_description }}</p>
            <h3 class="mb-3" id="productPrice">${{ $product->price }}</h3>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <input type="hidden" name="variant_id" id="variantId" value="">

                <!-- Variant Selection -->
                @foreach ($product->attributes as $attribute)
                    <div class="form-group">
                        <label for="attribute_{{ $attribute->id }}">{{ $attribute->name }}</label>
                        <select class="form-control variant-select" id="attribute_{{ $attribute->id }}">
                            <option value="">Select {{ $attribute->name }}</option>
                            @foreach ($attribute->values as $value)
                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
            </form>
        </div>
    </div>

    <!-- Product Description and Reviews -->
    <div class="row mt-5">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{ $product->reviews->count() }})</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <p class="mt-3">{!! $product->description !!}</p>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    @forelse ($product->reviews as $review)
                        <div class="card my-3">
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
                    @empty
                        <p class="mt-3">No reviews yet.</p>
                    @endforelse
                    <a href="{{ route('products.reviews.create', $product->slug) }}" class="btn btn-primary mt-3">Write a review</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const variantSelects = document.querySelectorAll('.variant-select');
        const productPrice = document.getElementById('productPrice');
        const variantIdInput = document.getElementById('variantId');
        const variants = @json($product->variants->keyBy(function($item) { return implode('-', $item->attributeValues->pluck('id')->sort()->toArray()); }));

        variantSelects.forEach(select => {
            select.addEventListener('change', updatePrice);
        });

        function updatePrice() {
            let selectedValues = [];
            variantSelects.forEach(select => {
                if (select.value) {
                    selectedValues.push(select.value);
                }
            });

            selectedValues.sort();
            const selectedKey = selectedValues.join('-');

            if (variants[selectedKey]) {
                const variant = variants[selectedKey];
                productPrice.textContent = '$' + variant.price;
                variantIdInput.value = variant.id;
            } else {
                productPrice.textContent = '$' + {{ $product->price }};
                variantIdInput.value = '';
            }
        }
    });
</script>
@endpush
