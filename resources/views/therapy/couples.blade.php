@extends('Layouts.app')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area page-title-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Couples Therapy</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Couples Therapy</li>
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
                        <img src="/assets/img/services/couples-therapy.jpg" alt="Couples Therapy Session">
                        <h3>Couples Therapy</h3>
                        <span>Building Stronger Relationships</span>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="doctor-details-desc">
                        <h2>Strengthening Bonds Through Professional Guidance</h2>
                        <p>Our couples therapy services provide a supportive environment where partners can work together to improve their relationship. Through effective communication and understanding, we help couples address challenges and build stronger connections.</p>
                        <p>Whether you're facing communication issues, trust concerns, or seeking to enhance your relationship, our experienced therapists offer guidance and practical tools to help you grow together.</p>
                    </div>
                </div>
            </div>

            <div class="skill-education-desc">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="skill-desc">
                            <span class="sub-title">How We Help</span>
                            <h2>Areas We Address</h2>
                            <p>Our couples therapy services focus on key relationship aspects:</p>

                            <ul>
                                <li><span><i class="fas fa-check"></i> Communication Enhancement</span></li>
                                <li><span><i class="fas fa-check"></i> Conflict Resolution</span></li>
                                <li><span><i class="fas fa-check"></i> Trust Building</span></li>
                                <li><span><i class="fas fa-check"></i> Intimacy Issues</span></li>
                                <li><span><i class="fas fa-check"></i> Pre-marital Counseling</span></li>
                                <li><span><i class="fas fa-check"></i> Managing Life Changes</span></li>
                                <li><span><i class="fas fa-check"></i> Emotional Connection</span></li>
                                <li><span><i class="fas fa-check"></i> Relationship Growth</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="education-desc">
                            <span class="sub-title">The Process</span>
                            <h2>Your Couples Journey</h2>

                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <span>Initial Booking</span>
                                    Schedule a convenient time for both partners
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <span>First Session</span>
                                    Joint consultation to understand your relationship goals
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <span>Tailored Strategy</span>
                                    Develop a customized plan for your relationship
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <span>Growing Together</span>
                                    Regular sessions to strengthen your bond
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Appointment Button -->
            <div class="text-center mt-4">
                <a href="appointment.html" class="btn btn-primary btn-lg">Book Your First Session</a>
            </div>
        </div>

        <div class="shape3"><img src="assets/img/shape/3.png" class="wow fadeInLeft" alt="decorative shape"></div>
    </section>
@endsection
