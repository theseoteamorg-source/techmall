@extends('layouts.frontend')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="fs-4">${{ number_format($product->default_variant->price, 2) }}</p>
                <p>{{ $product->description }}</p>

                <div class="mb-3">
                    <label for="variant" class="form-label">Select Variant:</label>
                    <select class="form-select" id="variant">
                        @foreach ($product->variants as $variant)
                            <option value="{{ $variant->id }}" data-price="{{ $variant->price }}" {{ $variant->is_default ? 'selected' : '' }}>
                                {{ $variant->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-dark">Add to Cart</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('variant').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.querySelector('.fs-4').textContent = '$' + parseFloat(price).toFixed(2);
        });
    </script>
@endpush
