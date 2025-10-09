@extends('layouts.frontend')

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
    .sidebar-section {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
    }
    .product-card {
        transition: transform .2s;
    }
    .product-card:hover {
        transform: scale(1.05);
    }
    #product-container.list-view .product-card {
        flex-direction: row;
        align-items: center;
    }
    #product-container.list-view .product-card .card-img-top {
        max-width: 200px;
        height: auto;
    }

    /* Gaming Sidebar Styles */
    .gaming-sidebar .card {
        background: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: 15px;
        box-shadow: var(--shadow-sm);
    }

    .gaming-sidebar .card-header {
        font-family: 'Orbitron', sans-serif;
        font-weight: 600;
        background-color: transparent;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-color);
    }

    .gaming-sidebar .list-group-item {
        background-color: transparent;
        border-color: var(--border-color);
    }

    .gaming-sidebar .list-group-item a {
        color: var(--text-color);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .gaming-sidebar .list-group-item a:hover,
    .gaming-sidebar .list-group-item a.active {
        color: var(--primary-color);
    }

    /* AMAZING Price Slider Styles */
    @keyframes pulse-glow {
        0% {
            box-shadow: 0 0 8px var(--primary-color, #00d1ff), inset 0 0 5px rgba(0, 209, 255, 0.7);
        }
        50% {
            box-shadow: 0 0 16px var(--primary-color, #00d1ff), inset 0 0 8px rgba(0, 209, 255, 0.7);
        }
        100% {
            box-shadow: 0 0 8px var(--primary-color, #00d1ff), inset 0 0 5px rgba(0, 209, 255, 0.7);
        }
    }

    .gaming-sidebar .ui-slider {
        position: relative;
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid var(--border-color);
        height: 6px;
        border-radius: 3px;
    }

    .gaming-sidebar .ui-slider-range {
        background: var(--primary-color, #00d1ff);
        animation: pulse-glow 2s infinite ease-in-out;
        border-radius: 3px;
    }

    .gaming-sidebar .ui-slider-handle {
        position: absolute;
        width: 12px;
        height: 24px;
        background: transparent;
        border: none;
        cursor: pointer;
        top: -9px;
        margin-left: -6px;
    }
    
    .gaming-sidebar .ui-slider-handle::before, 
    .gaming-sidebar .ui-slider-handle::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 4px;
        background: var(--primary-color, #00d1ff);
        box-shadow: 0 0 10px var(--primary-color, #00d1ff);
        border-radius: 2px;
        left: 0;
    }

    .gaming-sidebar .ui-slider-handle::before {
        top: 4px;
    }

    .gaming-sidebar .ui-slider-handle::after {
        bottom: 4px;
    }

    .gaming-sidebar .price-range-display {
        color: #fff;
        font-family: 'Orbitron', sans-serif;
        text-align: center;
        margin-bottom: 15px;
        font-size: 1.1em;
        text-shadow: 0 0 5px #fff, 0 0 10px var(--primary-color, #00d1ff), 0 0 15px var(--primary-color, #00d1ff);
    }
    .gaming-sidebar .price-range-display span {
        margin: 0 10px;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
         <x-sidebar />

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">{{ $brand->name }}</h2>
                <div class="d-flex align-items-center">
                    <form class="d-flex me-3">
                        <select class="form-select me-2" name="sort" onchange="this.form.submit()">
                            <option value="" {{ request('sort') == '' ? 'selected' : '' }}>Default</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="newness" {{ request('sort') == 'newness' ? 'selected' : '' }}>Newest</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating</option>
                        </select>
                    </form>
                    <div class="btn-group">
                        <button type="button" id="grid-view-btn" class="btn btn-outline-secondary active"><i class="bi bi-grid-fill"></i></button>
                        <button type="button" id="list-view-btn" class="btn btn-outline-secondary"><i class="bi bi-list"></i></button>
                    </div>
                </div>
            </div>

            <div id="product-container" class="row row-cols-1 row-cols-md-3 g-4">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-12">
                        <p class="text-center">No products found for this brand.</p>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        let minPrice = {{ $minPrice ?? 0 }};
        let maxPrice = {{ $maxPrice ?? 1000 }};

        function updatePriceDisplay(min, max) {
            $("#price-range-min").text("{{ config('settings.currency_symbol', '$') }}" + min);
            $("#price-range-max").text("{{ config('settings.currency_symbol', '$') }}" + max);
        }

        $("#price-range-slider").slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            create: function(event, ui) {
                updatePriceDisplay(minPrice, maxPrice);
            },
            slide: function(event, ui) {
                updatePriceDisplay(ui.values[0], ui.values[1]);
                filterProducts(ui.values[0], ui.values[1]);
            }
        });

        function filterProducts(min, max) {
            $(".product-card").each(function() {
                let price = parseFloat($(this).data('price'));
                if (price >= min && price <= max) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Initial filter call
        let initialMin = $("#price-range-slider").slider("values", 0);
        let initialMax = $("#price-range-slider").slider("values", 1);
        filterProducts(initialMin, initialMax);

        // View toggle
        const productContainer = $('#product-container');
        const gridViewBtn = $('#grid-view-btn');
        const listViewBtn = $('#list-view-btn');

        if (localStorage.getItem('view') === 'list') {
            productContainer.addClass('list-view');
            productContainer.removeClass('row-cols-md-3');
            listViewBtn.addClass('active');
            gridViewBtn.removeClass('active');
        } else {
            productContainer.addClass('row-cols-md-3');
        }

        gridViewBtn.on('click', function() {
            productContainer.removeClass('list-view');
            productContainer.addClass('row-cols-md-3');
            $(this).addClass('active');
            listViewBtn.removeClass('active');
            localStorage.setItem('view', 'grid');
        });

        listViewBtn.on('click', function() {
            productContainer.addClass('list-view');
            productContainer.removeClass('row-cols-md-3');
            $(this).addClass('active');
            gridViewBtn.removeClass('active');
            localStorage.setItem('view', 'list');
        });
    });
</script>
@endsection
