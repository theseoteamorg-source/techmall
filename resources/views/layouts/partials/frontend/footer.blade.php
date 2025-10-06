<footer class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>TechMall is your one-stop shop for the latest and greatest in technology. We are passionate about providing our customers with high-quality products and exceptional service.</p>
            </div>
            <div class="col-md-2">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('shop.home') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('shop.index') }}" class="text-white">Shop</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-white">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Policies</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('page.show', 'about-us') }}" class="text-white">About Us</a></li>
                    <li><a href="#" class="text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-white">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt"></i> 123 Tech Street, Silicon Valley, CA 94101</li>
                    <li><i class="fas fa-phone"></i> (123) 456-7890</li>
                    <li><i class="fas fa-envelope"></i><a href="mailto:support@techmall.com" class="text-white"> support@techmall.com</a></li>
                </ul>
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
