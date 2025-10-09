<footer class="footer section-container bg-white text-dark pt-5 pb-4">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-primary mb-3">{{ config('settings.site_name', 'Techmall') }}</h5>
                <p class="text-muted">{{ config('settings.site_intro') }}</p>
                <div class="social-icons mt-4">
                    <a href="{{ config('settings.facebook_url') }}" class="text-dark me-3"><i class="bi bi-facebook"></i></a>
                    <a href="{{ config('settings.twitter_url') }}" class="text-dark me-3"><i class="bi bi-twitter"></i></a>
                    <a href="{{ config('settings.instagram_url') }}" class="text-dark me-3"><i class="bi bi-instagram"></i></a>
                    <a href="{{ config('settings.youtube_url') }}" class="text-dark"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <h5 class="text-primary mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-muted">Home</a></li>
                    <li><a href="{{ route('shop.index') }}" class="text-muted">Shop</a></li>
                    <li><a href="{{ route('shop.deals') }}" class="text-muted">Deals</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-muted">Blog</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <h5 class="text-primary mb-3">Help</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('contact') }}" class="text-muted">Contact Us</a></li>
                    <li><a href="#" class="text-muted">FAQ</a></li>
                    <li><a href="#" class="text-muted">Shipping & Returns</a></li>
                    <li><a href="#" class="text-muted">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12">
                <h5 class="text-primary mb-3">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="text-muted"><i class="bi bi-geo-alt-fill me-2"></i>{{ config('settings.site_address') }}</li>
                    <li class="text-muted"><i class="bi bi-telephone-fill me-2"></i>{{ config('settings.site_phone') }}</li>
                    <li class="text-muted"><i class="bi bi-envelope-fill me-2"></i>{{ config('settings.site_email') }}</li>
                </ul>
            </div>
        </div>
        <hr class="my-3">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-muted small mb-0">&copy; {{ date('Y') }} {{ config('settings.site_name', 'Techmall') }}. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
