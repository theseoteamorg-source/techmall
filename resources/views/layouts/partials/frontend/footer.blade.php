<footer class="footer section-container">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-3">Techmall</h5>
                <p class="text-muted">Your one-stop shop for the latest and greatest in tech and gaming. Experience the future of entertainment.</p>
            </div>
            <div class="col-md-2">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('shop.index') }}" class="text-white">Shop</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-white">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Policies</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('page.show', 'about-us') }}" class="text-white">About Us</a></li>
                    <li><a href="{{ route('page.show', 'privacy-policy') }}" class="text-white">Privacy Policy</a></li>
                    <li><a href="{{ route('page.show', 'terms-of-service') }}" class="text-white">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-3">Newsletter</h5>
                <p class="text-muted">Subscribe to get the latest deals and updates.</p>
                <form class="d-flex">
                    <input type="email" class="form-control me-2" placeholder="Your Email">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-6">
                <p class="m-0 text-center text-md-start">Copyright &copy; TechMall {{ date('Y') }}</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
