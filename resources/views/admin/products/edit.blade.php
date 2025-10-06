@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
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
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror" rows="3">{{ old('details', $product->details) }}</textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror" required>
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Main Image</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    @if ($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mt-2">
                    @endif
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="images">Additional Images</label>
                    <input type="file" name="images[]" id="images" class="form-control @error('images.*') is-invalid @enderror" multiple>
                    <div class="mt-2">
                        @foreach ($product->images as $image)
                            <div style="display: inline-block; position: relative;">
                                <img src="{{ asset('storage/products/' . $image->image_path) }}" width="100" class="mr-2">
                                <a href="{{ route('admin.products.images.destroy', $image->id) }}" class="btn btn-sm btn-danger" style="position: absolute; top: 0; right: 0;">x</a>
                            </div>
                        @endforeach
                    </div>
                    @error('images.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title', $product->meta_title) }}">
                    @error('meta_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="3">{{ old('meta_description', $product->meta_description) }}</textarea>
                    @error('meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                    @error('meta_keywords')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <hr>
                <h4>Variants</h4>
                <div id="variants">
                    @foreach ($product->variants as $variantIndex => $variant)
                        <div class="variant-item">
                            <input type="hidden" name="variants[{{ $variantIndex }}][id]" value="{{ $variant->id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="variants_{{ $variantIndex }}_name">Variant Name</label>
                                        <input type="text" name="variants[{{ $variantIndex }}][name]" id="variants_{{ $variantIndex }}_name" class="form-control" value="{{ $variant->name }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="variants_{{ $variantIndex }}_price">Price</label>
                                        <input type="number" name="variants[{{ $variantIndex }}][price]" id="variants_{{ $variantIndex }}_price" class="form-control" value="{{ $variant->price }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="variants_{{ $variantIndex }}_sku">SKU</label>
                                        <input type="text" name="variants[{{ $variantIndex }}][sku]" id="variants_{{ $variantIndex }}_sku" class="form-control" value="{{ $variant->sku }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-.group">
                                        <label for="variants_{{ $variantIndex }}_stock">Stock</label>
                                        <input type="number" name="variants[{{ $variantIndex }}][stock]" id="variants_{{ $variantIndex }}_stock" class="form-control" value="{{ $variant->stock }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-variant" style="margin-top: 32px;">Remove</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-variant" class="btn btn-secondary">Add Variant</button>

                <hr>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let variantIndex = {{ $product->variants->count() }};
            const variantsContainer = document.getElementById('variants');
            const addVariantButton = document.getElementById('add-variant');

            addVariantButton.addEventListener('click', function() {
                const variantHtml = `
                    <div class="variant-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="variants_${variantIndex}_name">Variant Name</label>
                                    <input type="text" name="variants[${variantIndex}][name]" id="variants_${variantIndex}_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="variants_${variantIndex}_price">Price</label>
                                    <input type="number" name="variants[${variantIndex}][price]" id="variants_${variantIndex}_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="variants_${variantIndex}_sku">SKU</label>
                                    <input type="text" name="variants[${variantIndex}][sku]" id="variants_${variantIndex}_sku" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="variants_${variantIndex}_stock">Stock</label>
                                    <input type="number" name="variants[${variantIndex}][stock]" id="variants_${variantIndex}_stock" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-variant" style="margin-top: 32px;">Remove</button>
                            </div>
                        </div>
                    </div>
                `;
                variantsContainer.insertAdjacentHTML('beforeend', variantHtml);
                variantIndex++;
            });

            variantsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-variant')) {
                    event.target.closest('.variant-item').remove();
                }
            });
        });
    </script>
@endpush
