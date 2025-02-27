@extends('layouts.app')

@section('content')
    <section class="thank-you-area ptb-100">
        <div class="container">
            <div class="thank-you-content text-center">
                <div class="icon mb-4">
                    <i class="flaticon-check" style="font-size: 4rem; color: #28a745;"></i>
                </div>

                <h1>Thank You!</h1>
                <p class="lead mb-4">Your appointment request has been received successfully.</p>

                <div class="confirmation-details mb-5">
                    <p>We will contact you within 24 hours to confirm your appointment details.</p>
                    <p>If you have any questions, please feel free to contact our support team.</p>
                </div>

                <div class="next-steps">
                    <h4 class="mb-3">What's Next?</h4>
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Check Your Email</h5>
                                    <p class="card-text">We've sent you a confirmation email with details about your appointment request.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Prepare for Your Session</h5>
                                    <p class="card-text">Take some time to think about what you'd like to discuss during your appointment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Get Your Questions Ready</h5>
                                    <p class="card-text">Write down any questions you might have for your therapist or doctor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <a href="{{ route('home') }}" class="btn btn-primary">Return to Home Page</a>
                </div>
            </div>
        </div>
    </section>
@endsection
