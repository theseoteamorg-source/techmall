@extends('layouts.admin')

@section('title', 'Add Product')
@section('content-header', 'Add Product')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Product List</a></li>
    <li class="breadcrumb-item active">Add Product</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Product</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Featured Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images">Product Images</label>
                            <div class="custom-file">
                                <input type="file" name="images[]" id="images" class="custom-file-input @error('images') is-invalid @enderror" multiple>
                                <label class="custom-file-label" for="images">Choose file</label>
                            </div>
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control summernote @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" class="form-control summernote @error('details') is-invalid @enderror" rows="5">{{ old('details') }}</textarea>
                            @error('details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <h4>SEO</h4>
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}">
                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="3">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords') }}">
                            @error('meta_keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <h4>Variants</h4>
                        <div id="variants">
                            <div class="variant-group">
                                <div class="form-group">
                                    <label>Variant Name</label>
                                    <input type="text" name="variants[0][name]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="variants[0][price]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" name="variants[0][sku]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" name="variants[0][stock]" class="form-control">
                                </div>
                                <button type="button" class="btn btn-danger remove-variant">Remove</button>
                            </div>
                        </div>
                        <button type="button" id="add-variant" class="btn btn-primary">Add Variant</button>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.2.7/css/fileinput.min.css">
@endsection

@section('js')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.2.7/js/fileinput.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
            bsCustomFileInput.init();

            let variantIndex = 1;
            $('#add-variant').on('click', function(){
                let variant = `
                    <div class="variant-group mt-3">
                        <hr>
                        <div class="form-group">
                            <label>Variant Name</label>
                            <input type="text" name="variants[${variantIndex}][name]" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="variants[${variantIndex}][price]" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" name="variants[${variantIndex}][sku]" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="variants[${variantIndex}][stock]" class="form-control">
                        </div>
                        <button type="button" class="btn btn-danger remove-variant">Remove</button>
                    </div>
                `;
                $('#variants').append(variant);
                variantIndex++;
            });

            $(document).on('click', '.remove-variant', function(){
                $(this).closest('.variant-group').remove();
            });
        });
    </script>
@endsection
