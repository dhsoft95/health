@extends('Layouts.app')
@section('content')
    <section class="page-title-area page-title-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Psychiatry Services</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Psychiatry Services</li>
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
                        <img src="/api/placeholder/800/600" alt="MP Health Psychiatry Services">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="about-content">
                        <span>Our Psychiatry Services</span>
                        <h2>Professional Psychiatric Care and Medication Management</h2>
                        <p>Timely psychiatric assessment, prescription, and medication management provided by licensed medical professionals who specialize in diagnosing and treating mental health conditions. We offer comprehensive psychiatric care through both teleconsultation and home visits.</p>

                        <ul>
                            <li><i class="flaticon-check-mark"></i> Treatment for Depression, Anxiety, Bipolar Disorder, OCD, PTSD</li>
                            <li><i class="flaticon-check-mark"></i> Evidence-based medication prescriptions (SSRIs, SNRIs)</li>
                            <li><i class="flaticon-check-mark"></i> Regular follow-up video appointments every three months</li>
                            <li><i class="flaticon-check-mark"></i> Continuous medication monitoring and adjustment</li>
                            <li><i class="flaticon-check-mark"></i> Direct communication with your psychiatric provider</li>
                            <li><i class="flaticon-check-mark"></i> Coordination with local pharmacies for prescriptions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
