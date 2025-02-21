<header class="header-area">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <ul class="header-contact-info">
                        <li><i class="far fa-clock"></i> Available 24/7</li>
                        <li><i class="fas fa-phone"></i> Schedule Now: <a href="tel:+255567890">+255 (0) 567-890</a></li>
                        <li><i class="far fa-paper-plane"></i> <a href="mailto:contact@mphealth.com">contact@mphealth.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="header-right-content">
                        <ul class="top-header-social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                        <div class="lang-select">
                            <select>
                                <option>English</option>
                                <option>Spanish</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="fovia-responsive-nav">
            <div class="container">
                <div class="fovia-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="MP Health Logo" style="height: 80px;" width="110">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="fovia-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="MP Health Logo" style="height: 80px;" width="170px">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">Services <i class="fas fa-plus"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{ route('services.therapy') }}" class="nav-link {{ request()->routeIs('services.therapy') ? 'active' : '' }}">Therapy</a></li>
                                    <li class="nav-item"><a href="{{ route('services.psychiatry') }}" class="nav-link {{ request()->routeIs('services.psychiatry') ? 'active' : '' }}">Psychiatry</a></li>
                                    <li class="nav-item"><a href="{{ route('services.self-guided') }}" class="nav-link {{ request()->routeIs('services.self-guided') ? 'active' : '' }}">Self-Guided Programs</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('therapy.*') ? 'active' : '' }}">Therapy <i class="fas fa-plus"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{ route('therapy.individual') }}" class="nav-link {{ request()->routeIs('therapy.individual') ? 'active' : '' }}">Individual Therapy</a></li>
                                    <li class="nav-item"><a href="{{ route('therapy.couples') }}" class="nav-link {{ request()->routeIs('therapy.couples') ? 'active' : '' }}">Couples Therapy</a></li>
                                    <li class="nav-item"><a href="{{ route('therapy.teen') }}" class="nav-link {{ request()->routeIs('therapy.teen') ? 'active' : '' }}">Teen Therapy</a></li>
                                    <li class="nav-item"><a href="{{ route('therapy.employee') }}" class="nav-link {{ request()->routeIs('therapy.employee') ? 'active' : '' }}">Employee Therapy</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('resources.*') ? 'active' : '' }}">Resources <i class="fas fa-plus"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{ route('resources.index') }}" class="nav-link {{ request()->routeIs('resources.guides') ? 'active' : '' }}">All</a></li>
                                    {{-- <li class="nav-item"><a href="{{ route('resources.ebooks') }}" class="nav-link {{ request()->routeIs('resources.ebooks') ? 'active' : '' }}">eBooks</a></li>
                                    <li class="nav-item"><a href="{{ route('resources.articles') }}" class="nav-link {{ request()->routeIs('resources.articles') ? 'active' : '' }}">Articles</a></li>
                                    <li class="nav-item"><a href="{{ route('resources.case-studies') }}" class="nav-link {{ request()->routeIs('resources.case-studies') ? 'active' : '' }}">Case Studies</a></li> --}}
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                            </li>

                            <li class="nav-item">
{{--                                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>--}}
                            </li>
                        </ul>

                        <div class="others-options">
                            <div class="option-item">
                                <i class="search-btn fas fa-search"></i>
                                <i class="search-close-btn fas fa-times"></i>

                                <div class="search-overlay search-popup">
                                    <div class='search-box'>
                                        <form class="search-form">
                                            <input class="search-input" name="search" placeholder="Search" type="text">
                                            <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('appointments') }}" class="btn btn-primary">Schedule Appointment</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
