<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-content">
                <!-- About Us Section -->
                <div class="footer-about">
                    <h3>About MindanaoMarket</h3>
                    <p>MindanaoMarket is your trusted marketplace for locally sourced products. Shop, sell, and support local businesses across Mindanao!</p>
                </div>

                <!-- Quick Links -->
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        <li><a href="{{ url('/seller') }}">Become a Seller</a></li>
                        <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p><i class="ri-map-pin-line"></i> Address: Mindanao, Philippines</p>
                    <p><i class="ri-phone-line"></i> Phone: +63 123 456 7890</p>
                    <p><i class="ri-mail-line"></i> Email: <a href="mailto:support@mindanaomarket.com">support@mindanaomarket.com</a></p>
                </div>

                <!-- Social Media Links -->
                <div class="footer-social">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="ri-facebook-circle-line"></i></a>
                        <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                        <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                        <a href="#" target="_blank"><i class="ri-youtube-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} MindanaoMarket. All rights reserved. | <a href="{{ url('/terms') }}">Terms & Conditions</a> | <a href="{{ url('/privacy-policy') }}">Privacy Policy</a></p>
    </div>
</footer>
