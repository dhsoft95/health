<!-- Start Footer Area -->
<section class="footer-area">
    <div class="container">
        <div class="subscribe-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="newsletter-content">
                        <h2>Join Our Newsletter</h2>
                        <p>Stay updated with mental health tips, wellness resources, and latest treatment options.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required autocomplete="off">
                        <button type="submit">Subscribe <i class="fas fa-paper-plane"></i></button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="MP Health Logo" style="height: 80px;" width="110">
                        <p>MP Health specializes in delivering on-demand, evidence-based mental health treatment designed to empower individuals and organizations.</p>
                    </div>

                    <ul class="social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>Our Services</h3>

                    <ul class="departments-list">
                        <li><a href="{{ route('therapy.individual') }}">Individual Therapy</a></li>
                        <li><a href="{{ route('therapy.couples') }}">Couples Therapy</a></li>
                        <li><a href="{{ route('therapy.teen') }}">Teen Therapy</a></li>
                        <li><a href="{{ route('therapy.employee') }}">Employee Therapy</a></li>
{{--                        <li><a href="{{ route('psychiatry') }}">Psychiatry Services</a></li>--}}
{{--                        <li><a href="{{ route('self-guided') }}">Self-Guided Programs</a></li>--}}
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>Resources</h3>

                    <ul class="links-list">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('resources.index', ['type' => 'guide']) }}">Guides</a></li>
                        <li><a href="{{ route('resources.index', ['type' => 'article']) }}">Articles</a></li>
                        <li><a href="{{ route('resources.index', ['type' => 'case-study']) }}">Case Studies</a></li>
                        <li><a href="{{ route('resources.index', ['type' => 'ebook']) }}">eBooks</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Contact Info</h3>

                    <ul class="opening-hours">
                        <li>Available <span>24/7</span></li>
                        <li>Phone <span><a href="tel:+1234567890">+1 (234) 567-890</a></span></li>
                        <li>Email <span><a href="mailto:contact@mphealth.com">contact@mphealth.com</a></span></li>
{{--                        <li>Support <span><a href="{{ route('support') }}">Get Help</a></span></li>--}}
{{--                        <li>Emergency <span><a href="{{ route('emergency') }}">Crisis Resources</a></span></li>--}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <p>© {{ date('Y') }} MP Health. All Rights Reserved.</p>
        </div>
    </div>
</section>
<!-- End Footer Area -->
