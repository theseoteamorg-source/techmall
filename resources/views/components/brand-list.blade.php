@props(['brands'])

<section id="brands" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Brands</h2>
        <div class="row">
            @forelse ($brands as $brand)
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="brand-logo">
                        <img src="{{ $brand->logo }}" alt="{{ $brand->name }}" class="img-fluid">
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No brands to display.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
