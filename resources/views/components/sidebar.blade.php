<div class="col-lg-3 gaming-sidebar">
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <ul class="list-group list-group-flush">
            @foreach($allCategories as $cat)
                <li class="list-group-item">
                    <a href="{{ route('category.show', $cat->slug) }}" class="{{ isset($category) && $cat->id == $category->id ? 'active fw-bold' : '' }}">
                        {{ $cat->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="card">
        <div class="card-header">Price Range</div>
        <div class="card-body">
            <div class="price-range-display">
                <span id="price-range-min"></span> - <span id="price-range-max"></span>
            </div>
            <div id="price-range-slider"></div>
        </div>
    </div>
</div>
