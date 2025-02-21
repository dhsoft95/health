<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MP Health - Mental Health Care From Anywhere')</title>
    <meta name="title" content="@yield('meta_title', 'MP Health - Mental Health Care From Anywhere')">
    <meta name="description" content="@yield('meta_description', 'Access on-demand, evidence-based mental health and medical treatment. Get therapy, medication management, and personalized care through teleconsultation and home visits.')">
    <meta name="keywords" content="@yield('meta_keywords', 'mental health, therapy, psychiatry, teletherapy, medication management, online therapy, mental wellness, counseling, mental health care, telehealth, psychiatric care')">
    <meta name="author" content="MP Health">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'MP Health - Mental Health Care From Anywhere')">
    <meta property="og:description" content="@yield('og_description', 'Access on-demand, evidence-based mental health and medical treatment. Get therapy, medication management, and personalized care through teleconsultation and home visits.')">
    <meta property="og:image" content="@yield('og_image', asset('path-to-your-image.jpg'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('twitter_title', 'MP Health - Mental Health Care From Anywhere')">
    <meta property="twitter:description" content="@yield('twitter_description', 'Access on-demand, evidence-based mental health and medical treatment. Get therapy, medication management, and personalized care through teleconsultation and home visits.')">
    <meta property="twitter:image" content="@yield('twitter_image', asset('path-to-your-image.jpg'))">

    <!-- Additional SEO Tags -->
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="service-types" content="Individual Therapy, Couples Therapy, Teen Therapy, Employee Therapy, Psychiatry">
    <meta name="treatment-types" content="Depression, Anxiety, Bipolar Disorder, OCD, PTSD">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-96x96.png') }}">

    @stack('styles')
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="indicator">
            <svg width="16px" height="12px">
                <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
            </svg>
        </div>
    </div>
</div>

<!-- Main Content -->
<!-- Header Section -->
@include('partials.header')

<!-- Main Content -->
@yield('content')

<!-- Footer Section -->
@include('partials.footer')

<div class="go-top"><i class="fas fa-chevron-up"></i></div>
<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@stack('scripts')
</body>
</html>
