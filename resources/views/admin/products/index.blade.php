@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>
            <div class="card-tools">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Product
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.index') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="stock_status">Stock Status</label>
                            <select name="stock_status" id="stock_status" class="form-control">
                                <option value="">All</option>
                                <option value="in_stock" {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="out_of_stock" {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="min_price">Min Price</label>
                            <input type="number" name="min_price" id="min_price" class="form-control" value="{{ request('min_price') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="max_price">Max Price</label>
                            <input type="number" name="max_price" id="max_price" class="form-control" value="{{ request('max_price') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="brand_id">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">All</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-4">Reset</a>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if ($product->variants->sum('stock') > 0)
                                    <span class="badge badge-success">In Stock</span>
                                @else
                                    <span class="badge badge-danger">Out of Stock</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
