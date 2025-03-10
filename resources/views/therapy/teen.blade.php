@extends('Layouts.app')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area page-title-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Teen Therapy</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Teen Therapy</li>
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
                        <img src="/assets/img/services/teen-therapy.jpg" alt="Teen Therapy Session">
                        <h3>Teen Therapy</h3>
                        <span>Supporting Adolescent Well-being</span>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="doctor-details-desc">
                        <h2>Specialized Support for Teens and Young Adults</h2>
                        <p>Our teen therapy services provide a safe, understanding environment where adolescents can express themselves freely and develop healthy coping strategies. We use age-appropriate therapeutic techniques to help teens navigate the challenges of growing up.</p>
                        <p>Through individual sessions and evidence-based approaches, we support teens in building self-esteem, managing stress, and developing the emotional tools they need for success in life.</p>
                    </div>
                </div>
            </div>

            <div class="skill-education-desc">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="skill-desc">
                            <span class="sub-title">Areas of Support</span>
                            <h2>How We Help Teens</h2>
                            <p>Our specialized teen therapy addresses common adolescent challenges:</p>

                            <ul>
                                <li><span><i class="fas fa-check"></i> Academic Stress Management</span></li>
                                <li><span><i class="fas fa-check"></i> Social Anxiety</span></li>
                                <li><span><i class="fas fa-check"></i> Self-esteem Building</span></li>
                                <li><span><i class="fas fa-check"></i> Family Relationships</span></li>
                                <li><span><i class="fas fa-check"></i> Peer Pressure</span></li>
                                <li><span><i class="fas fa-check"></i> Identity Development</span></li>
                                <li><span><i class="fas fa-check"></i> Emotional Regulation</span></li>
                                <li><span><i class="fas fa-check"></i> Life Skills Development</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="education-desc">
                            <span class="sub-title">The Journey</span>
                            <h2>How Teen Therapy Works</h2>

                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <span>Initial Meeting</span>
                                    Get comfortable with your therapist in a welcoming environment
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-puzzle-piece"></i>
                                    </div>
                                    <span>Building Trust</span>
                                    Create a safe space for open communication
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>Personal Goals</span>
                                    Set achievable objectives that matter to you
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <span>Skill Building</span>
                                    Learn practical strategies for life's challenges
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="/appointments/create" class="btn btn-primary btn-lg">Schedule a Teen Session</a>
            </div>
        </div>
        <div class="shape3"><img src="assets/img/shape/3.png" class="wow fadeInLeft" alt="decorative shape"></div>
    </section>
@endsection
