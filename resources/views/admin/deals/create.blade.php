@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add New Deal</h1>
        </div>

        <form action="{{ route('admin.deals.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="deal_type" class="form-label">Deal Type</label>
                        <select class="form-control" id="deal_type" name="deal_type">
                            <option value="discount">Discount</option>
                            <option value="combo">Combo</option>
                        </select>
                    </div>
                    <div class="mb-3" id="product-discount-container">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-control" id="product_id" name="product_id">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 d-none" id="product-combo-container">
                        <label for="products" class="form-label">Products</label>
                        <select class="form-control" id="products" name="products[]" multiple>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="discount_percentage" class="form-label">Discount Percentage</label>
                        <input type="number" class="form-control" id="discount_percentage" name="discount_percentage">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
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
