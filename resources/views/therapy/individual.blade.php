@extends('Layouts.app')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area page-title-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Individual Therapy</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Individual Therapy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Therapy Details Area -->
    <section class="doctor-details-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="doctor-details-image">
                        <img src="/assets/img/services/individual.jpg" alt="Individual Therapy Session">
                        <h3>Individual Therapy</h3>
                        <span>Personalized Mental Health Support</span>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="doctor-details-desc">
                        <h2>Professional and Personalized Support for Your Mental Health Journey</h2>
                        <p>Our individual therapy services provide dedicated attention and customized strategies for your unique mental health needs. With our licensed therapists, you'll find a safe space to explore your thoughts, feelings, and challenges.</p>
                        <p>Whether through teleconsultation or home visits, we ensure you receive consistent, high-quality care that fits your schedule and comfort level. Our evidence-based approaches help you develop effective coping strategies and work towards positive change.</p>
                    </div>
                </div>
            </div>

            <div class="skill-education-desc">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="skill-desc">
                            <span class="sub-title">What We Offer</span>
                            <h2>Areas of Support</h2>
                            <p>Our experienced therapists provide support for various mental health concerns:</p>

                            <ul>
                                <li><span><i class="fas fa-check"></i> Depression Management</span></li>
                                <li><span><i class="fas fa-check"></i> Anxiety Support</span></li>
                                <li><span><i class="fas fa-check"></i> Stress Management</span></li>
                                <li><span><i class="fas fa-check"></i> Personal Growth</span></li>
                                <li><span><i class="fas fa-check"></i> Trauma Recovery</span></li>
                                <li><span><i class="fas fa-check"></i> Life Transitions</span></li>
                                <li><span><i class="fas fa-check"></i> Self-esteem Building</span></li>
                                <li><span><i class="fas fa-check"></i> Emotional Regulation</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="education-desc">
                            <span class="sub-title">Getting Started</span>
                            <h2>Your Therapy Journey</h2>

                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <span>Easy Scheduling</span>
                                    Choose between teleconsultation or home visit appointments
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <span>First Session</span>
                                    Meet your therapist and discuss your goals and concerns
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <span>Personalized Plan</span>
                                    Receive a customized treatment approach for your needs
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                    <span>Continuous Care</span>
                                    Regular sessions with ongoing support and progress tracking
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Appointment Button -->
            <div class="text-center mt-4">

                <a href="/appointments/create" class="btn btn-primary btn-lg">Schedule Your First Session</a>
            </div>
        </div>

        <div class="shape3"><img src="assets/img/shape/3.png" class="wow fadeInLeft" alt="decorative shape"></div>
    </section>
@endsection
