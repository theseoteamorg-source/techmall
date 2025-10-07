@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" name="published" id="published" class="form-check-input" value="1" {{ $product->published ? 'checked' : '' }}>
                                    <label class="form-check-label" for="published">Published</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" name="featured" id="featured" class="form-check-input" value="1" {{ $product->featured ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Variants</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.variants.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Default</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th>Stock</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->variants as $variant)
                                        <tr>
                                            <td>
                                                <input type="radio" name="is_default" value="{{ $variant->id }}" {{ $variant->is_default ? 'checked' : '' }}>
                                            </td>
                                            <td><input type="text" name="variants[{{ $variant->id }}][name]" class="form-control" value="{{ $variant->name }}"></td>
                                            <td><input type="number" name="variants[{{ $variant->id }}][price]" class="form-control" value="{{ $variant->price }}"></td>
                                            <td><input type="text" name="variants[{{ $variant->id }}][sku]" class="form-control" value="{{ $variant->sku }}"></td>
                                            <td><input type="number" name="variants[{{ $variant->id }}][stock]" class="form-control" value="{{ $variant->stock }}"></td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Save Variants</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
