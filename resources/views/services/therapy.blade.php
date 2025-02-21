@extends('Layouts.app')
@section('content')
    <section class="page-title-area page-title-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Therapy Services</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Therapy Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <section class="about-area ptb-100">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="about-image">
                        <img src="/api/placeholder/800/600" alt="MP Health Therapy Services">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="about-content">
                        <span>Our Therapy Services</span>
                        <h2>Comprehensive Therapy Support for Your Mental Well-being</h2>
                        <p>Experienced, licensed, and caring clinicians offer support for emotional and behavioral health, with treatment beginning within days of registration. Our therapy services include individual therapy, couples therapy, teen therapy, and employee therapy programs.</p>

                        <ul>
                            <li><i class="flaticon-check-mark"></i> Individual Therapy - Personalized support for your mental health journey</li>
                            <li><i class="flaticon-check-mark"></i> Couples Therapy - Building stronger relationships through communication</li>
                            <li><i class="flaticon-check-mark"></i> Teen Therapy - Specialized support for adolescents</li>
                            <li><i class="flaticon-check-mark"></i> Employee Therapy - Workplace wellness programs</li>
                            <li><i class="flaticon-check-mark"></i> Available through teleconsultation or home visits</li>
                            <li><i class="flaticon-check-mark"></i> Treatment begins within days of registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
