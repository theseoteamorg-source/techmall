<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Filters</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('shop.index') }}" method="GET">
            <div class="form-group">
                <label for="search">Search</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
            </div>
            <div class="form-group">
                <label for="min_price">Min Price</label>
                <input type="number" name="min_price" id="min_price" class="form-control" value="{{ request('min_price') }}">
            </div>
            <div class="form-group">
                <label for="max_price">Max Price</label>
                <input type="number" name="max_price" id="max_price" class="form-control" value="{{ request('max_price') }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="">All Brands</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->slug }}" {{ request('brand') == $brand->slug ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Filter</button>
        </form>
    </div>
</div>
