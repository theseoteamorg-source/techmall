@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Deal</h1>
        </div>

        <form action="{{ route('admin.deals.update', $deal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $deal->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="deal_type" class="form-label">Deal Type</label>
                        <select class="form-control" id="deal_type" name="deal_type">
                            <option value="discount" {{ $deal->deal_type == 'discount' ? 'selected' : '' }}>Discount</option>
                            <option value="combo" {{ $deal->deal_type == 'combo' ? 'selected' : '' }}>Combo</option>
                        </select>
                    </div>
                    <div class="mb-3 {{ $deal->deal_type == 'discount' ? '' : 'd-none' }}" id="product-discount-container">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-control" id="product_id" name="product_id">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $deal->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 {{ $deal->deal_type == 'combo' ? '' : 'd-none' }}" id="product-combo-container">
                        <label for="products" class="form-label">Products</label>
                        <select class="form-control" id="products" name="products[]" multiple>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ in_array($product->id, $deal->products ?? []) ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="discount_percentage" class="form-label">Discount Percentage</label>
                        <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" value="{{ $deal->discount_percentage }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $deal->start_date ? $deal->start_date->format('Y-m-d') : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $deal->end_date ? $deal->end_date->format('Y-m-d') : '' }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#products').select2();

        if ($('#deal_type').val() === 'combo') {
            $('#product-combo-container').removeClass('d-none');
            $('#product-discount-container').addClass('d-none');
        } else {
            $('#product-combo-container').addClass('d-none');
            $('#product-discount-container').removeClass('d-none');
        }
        
        $('#deal_type').on('change', function() {
            if ($(this).val() === 'combo') {
                $('#product-combo-container').removeClass('d-none');
                $('#product-discount-container').addClass('d-none');
            } else {
                $('#product-combo-container').addClass('d-none');
                $('#product-discount-container').removeClass('d-none');
            }
        });
    });
</script>
@endpush
