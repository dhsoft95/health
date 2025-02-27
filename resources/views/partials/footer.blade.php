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
                    <form id="newsletter-form" class="newsletter-form">
                        @csrf
                        <input type="email" class="input-newsletter" placeholder="Enter your email" name="email" id="newsletter-email" required autocomplete="off">
                        <button type="submit" id="newsletter-submit-btn">Subscribe <i class="fas fa-paper-plane"></i></button>
                        <div id="newsletter-result" class="form-result"></div>
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
{{--                        <li><a href="{{ route('contact') }}">Contact Us</a></li>--}}
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find the newsletter form
        const newsletterForm = document.getElementById('newsletter-form');

        // Only add event listener if the form exists
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get the result div and submit button
                const newsletterResult = document.getElementById('newsletter-result');
                const submitBtn = document.getElementById('newsletter-submit-btn');
                const emailInput = document.getElementById('newsletter-email');

                // Ensure elements exist before proceeding
                if (!newsletterResult || !submitBtn || !emailInput) {
                    console.error('Required newsletter elements not found');
                    return;
                }

                // Get email value safely
                const email = emailInput.value;

                // Validate email
                if (!email || !email.includes('@')) {
                    newsletterResult.innerHTML = 'Please enter a valid email address.';
                    newsletterResult.className = 'form-result text-danger';
                    return;
                }

                // Clear previous results
                newsletterResult.innerHTML = '';
                newsletterResult.className = 'form-result';

                // Disable submit button and show loading state
                submitBtn.disabled = true;
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                // Get CSRF token from meta tag or hidden input
                let csrfToken = '';
                const metaToken = document.querySelector('meta[name="csrf-token"]');
                const inputToken = document.querySelector('input[name="_token"]');

                if (metaToken) {
                    csrfToken = metaToken.getAttribute('content');
                } else if (inputToken) {
                    csrfToken = inputToken.value;
                }

                // Send AJAX request
                fetch('/newsletter/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email: email })
                })
                    .then(response => response.json())
                    .then(data => {
                        // Re-enable submit button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;

                        if (data.success) {
                            // Show success message
                            newsletterResult.innerHTML = data.message;
                            newsletterResult.className = 'form-result text-success';

                            // Reset form
                            newsletterForm.reset();
                        } else {
                            // Show error message
                            newsletterResult.innerHTML = data.message || 'Subscription failed. Please try again.';
                            newsletterResult.className = 'form-result text-danger';
                        }
                    })
                    .catch(error => {
                        // Re-enable submit button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;

                        // Show error message
                        newsletterResult.innerHTML = 'An error occurred. Please try again later.';
                        newsletterResult.className = 'form-result text-danger';
                        console.error('Newsletter Error:', error);
                    });
            });
        }

        // Disable the Mailchimp AJAX script if it's being loaded
        if (window.jQuery && jQuery.ajaxChimp) {
            // Prevent jQuery ajaxChimp from processing form
            jQuery.fn.ajaxChimp = function() {
                console.log('Mailchimp integration disabled');
                return this;
            };
        }
    });
</script>

<style>
    .form-result {
        margin-top: 10px;
        display: block;
        font-size: 14px;
        font-weight: 500;
    }
    .text-success {
        color: #28a745;
    }
    .text-danger {
        color: #dc3545;
    }
</style>
