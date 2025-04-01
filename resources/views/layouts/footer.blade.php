{{-- <footer class="footer-enhanced">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-section">
                <a href="{{route('webpage')}}" class="footer-logo">MyDigiDollar</a>
                <p>Empowering financial solutions through innovative digital technology.</p>
                <div class="footer-social">
                    <a href="#" class="social-icon">🌐</a>
                    <a href="#" class="social-icon">📱</a>
                    <a href="#" class="social-icon">📧</a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Quick Links</h4>
                <div class="footer-links">
                    <a href="{{route('webpage')}}" class="footer-link">Home</a>
                    <a href="{{route('about')}}" class="footer-link">About Us</a>
                    <a href="{{route('contact')}}" class="footer-link">Contact</a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Legal</h4>
                <div class="footer-links">
                    <a href="{{route('privacy')}}" class="footer-link">Privacy Policy</a>
                    <a href="#" class="footer-link">Terms of Service</a>
                    <a href="#" class="footer-link">Disclaimer</a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Contact Info</h4>
                <div class="footer-links">
                    <p>📍 123 Digital Street</p>
                    <p>📞 +1 (555) 123-4567</p>
                    <p>✉️ support@mydigidollar.com</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2024 MyDigiDollar. All Rights Reserved.</p>
        </div>
    </div>
</footer> --}}
<footer style="background-color: #263238; margin-top: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo" style="color: white; padding: 20px;">

                    <a href= {{route('webpage')}}
                    {{-- "web.html" --}}
                     style="text-decoration: none;">
                        <h3 style="color: white; "><i>MyDigiDollar</i>
                        </h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="privicy" style="color: white;  padding: 20px; font-weight: bold;">
                    <a href={{route('privacy')}}
                    {{-- "web.html" --}}
                     style="text-decoration: none; color: white; text-decoration-line: underline;">
                        <h6>
                            Privacy Policy
                        </h6>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="about" style="color: white;  padding: 20px; font-weight: bold;">
                    <a href=
                    {{route('about')}} 
                    {{-- "about.html" --}}
                        style="text-decoration: none; color: white; text-decoration-line: underline;">
                        <h6>About us</h6>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="contact" style="color: white;  padding: 20px; font-weight: bold;">
                    <a href= {{route('contact')}}
                    {{-- "contact.html" --}}
                        style="text-decoration: none; color: white; text-decoration-line: underline;">
                        <h6>Contact Us</h6>
                    </a>

                </div>
            </div>

        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <p class="text-center" style="color: white; font-size: 13px;">Copyright © 2024 MyDigidollar.com |
                    Powered by MyDigidollar.com</p>
            </div>
        </div>
    </footer>

</footer>