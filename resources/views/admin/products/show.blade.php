@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <p>{!! $product->details !!}</p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p>{{ $product->price }}</p>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <p>{{ $product->category->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <p>{{ $product->brand->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Main Image</label>
                        <div>
                            @if ($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="200">
                            @else
                                No Image
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Additional Images</label>
                        <div>
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/products/' . $image->image_path) }}" width="100" class="mr-2">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <h4>Variants</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>SKU</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product->variants as $variant)
                        <tr>
                            <td>{{ $variant->name }}</td>
                            <td>{{ $variant->price }}</td>
                            <td>{{ $variant->sku }}</td>
                            <td>{{ $variant->stock }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No variants found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
