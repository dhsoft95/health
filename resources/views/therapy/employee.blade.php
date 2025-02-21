@extends('Layouts.app')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area page-title-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Employee Therapy</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Employee Therapy</li>
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
                        <img src="/assets/img/services/employee.jpg" alt="Employee Therapy Session">
                        <h3>Employee Therapy</h3>
                        <span>Workplace Wellness Programs</span>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="doctor-details-desc">
                        <h2>Supporting Mental Well-being in the Workplace</h2>
                        <p>Our comprehensive workplace wellness programs promote mental health and productivity in organizations. We provide professional support to help employees manage work-related stress, maintain work-life balance, and enhance their overall well-being.</p>
                        <p>Through confidential therapy sessions and evidence-based approaches, we help create a healthier, more productive workplace environment while supporting individual employee needs.</p>
                    </div>
                </div>
            </div>

            <div class="skill-education-desc">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="skill-desc">
                            <span class="sub-title">Professional Support</span>
                            <h2>Areas We Address</h2>
                            <p>Our employee therapy services focus on workplace well-being:</p>

                            <ul>
                                <li><span><i class="fas fa-check"></i> Work-Life Balance</span></li>
                                <li><span><i class="fas fa-check"></i> Professional Stress Management</span></li>
                                <li><span><i class="fas fa-check"></i> Workplace Relationships</span></li>
                                <li><span><i class="fas fa-check"></i> Career Development</span></li>
                                <li><span><i class="fas fa-check"></i> Burnout Prevention</span></li>
                                <li><span><i class="fas fa-check"></i> Performance Anxiety</span></li>
                                <li><span><i class="fas fa-check"></i> Leadership Skills</span></li>
                                <li><span><i class="fas fa-check"></i> Team Dynamics</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="education-desc">
                            <span class="sub-title">Program Benefits</span>
                            <h2>Supporting Employee Success</h2>

                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <span>Flexible Scheduling</span>
                                    Sessions that fit your work schedule
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <span>Confidential Support</span>
                                    Private and secure therapy environment
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <span>Performance Enhancement</span>
                                    Tools for professional growth
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-balance-scale"></i>
                                    </div>
                                    <span>Work-Life Integration</span>
                                    Strategies for balanced living
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Appointment Button -->
            <div class="text-center mt-4">
                <a href="appointment.html" class="btn btn-primary btn-lg">Schedule a Consultation</a>
            </div>
        </div>

        <div class="shape3"><img src="assets/img/shape/3.png" class="wow fadeInLeft" alt="decorative shape"></div>
    </section>
@endsection
