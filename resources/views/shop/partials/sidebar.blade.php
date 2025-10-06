<div class="card">
    <div class="card-header">
        <h5>Categories</h5>
    </div>
    <div class="list-group list-group-flush">
        @foreach($categories as $category)
            <a href="{{ route('shop.category', $category->slug) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
        @endforeach
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Brands</h5>
    </div>
    <div class="list-group list-group-flush">
        @foreach($brands as $brand)
            <a href="{{ route('shop.brand', $brand->slug) }}" class="list-group-item list-group-item-action">{{ $brand->name }}</a>
        @endforeach
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Price</h5>
    </div>
    <div class="card-body">
        <form action="{{ url()->current() }}" method="GET">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="min_price">Min</label>
                    <input type="number" class="form-control" id="min_price" name="min_price" value="{{ request('min_price') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="max_price">Max</label>
                    <input type="number" class="form-control" id="max_price" name="max_price" value="{{ request('max_price') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-2">Filter</button>
        </form>
    </div>
</div>
