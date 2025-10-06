@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror">{{ old('details', $product->details) }}</textarea>
                                @error('details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                            <option value="">Select Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Main Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($product->image)
                                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="150" class="mt-3">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="images">Additional Images</label>
                                <input type="file" name="images[]" id="images" class="form-control @error('images.*') is-invalid @enderror" multiple>
                                @error('images.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-3">
                                    @foreach($product->images as $image)
                                        <div class="d-inline-block">
                                            <img src="{{ asset('storage/products/' . $image->image_path) }}" width="100">
                                            <a href="{{ route('admin.products.images.destroy', $image->id) }}" class="btn btn-danger btn-sm">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr>
                            <h5>Variants</h5>
                            <div id="variants">
                                @foreach($product->variants as $key => $variant)
                                    <div class="variant">
                                        <input type="hidden" name="variants[{{ $key }}][id]" value="{{ $variant->id }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Variant Name</label>
                                                    <input type="text" name="variants[{{ $key }}][name]" class="form-control" value="{{ $variant->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="number" name="variants[{{ $key }}][price]" class="form-control" value="{{ $variant->price }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>SKU</label>
                                                    <input type="text" name="variants[{{ $key }}][sku]" class="form-control" value="{{ $variant->sku }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="number" name="variants[{{ $key }}][stock]" class="form-control" value="{{ $variant->stock }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <button type="button" class="btn btn-danger btn-sm remove-variant">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-success btn-sm" id="add-variant">Add Variant</button>
                            <hr>
                            <h5>SEO</h5>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title', $product->meta_title) }}">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description', $product->meta_description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        let variantIndex = {{ count($product->variants) }};
        $('#add-variant').on('click', function(){
            let variantHtml = `
                <div class="variant">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Variant Name</label>
                                <input type="text" name="variants[${variantIndex}][name]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="variants[${variantIndex}][price]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" name="variants[${variantIndex}][sku]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="variants[${variantIndex}][stock]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-danger btn-sm remove-variant">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#variants').append(variantHtml);
            variantIndex++;
        });

        $(document).on('click', '.remove-variant', function(){
            $(this).closest('.variant').remove();
        });
    });
</script>
@endpush
