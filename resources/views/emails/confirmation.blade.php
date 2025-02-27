<!-- resources/views/emails/appointments/confirmation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 25px;
        }
        h2 {
            color: #3498db;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        .details {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin-bottom: 25px;
        }
        .details p {
            margin: 8px 0;
        }
        .details strong {
            display: inline-block;
            min-width: 150px;
        }
        .next-steps {
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f0f7ff;
            border-radius: 5px;
        }
        .next-steps h3 {
            color: #2c3e50;
            margin-top: 0;
        }
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #e8e8e8;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    @if(config('app.logo'))
        <img class="logo" src="{{ config('app.logo') }}" alt="{{ config('app.name') }}">
    @else
        <h2>{{ config('app.name') }}</h2>
    @endif
</div>

<h1>Your Appointment Request</h1>

<p>Thank you for requesting an appointment with us. We have received your request and will contact you within 24 hours to confirm your appointment.</p>

<div class="details">
    <p><strong>Name:</strong> {{ $appointment->first_name }} {{ $appointment->last_name }}</p>
    <p><strong>Service Type:</strong> {{ $appointment->getServiceTypeTextAttribute() }}</p>
    <p><strong>Appointment Type:</strong> {{ $appointment->getAppointmentTypeTextAttribute() }}</p>
    <p><strong>Preferred Date:</strong> {{ $appointment->preferred_date->format('F j, Y') }}</p>
    <p><strong>Preferred Time:</strong> {{ $appointment->getPreferredTimeTextAttribute() }}</p>

    @if($appointment->has_insurance)
        <p><strong>Insurance:</strong> {{ $appointment->insurance_provider }}</p>
    @endif
</div>

<div class="next-steps">
    <h3>What's Next?</h3>
    <p>Our team will review your appointment request and contact you to confirm the exact date and time of your appointment. If your preferred time is not available, we'll work with you to find an alternative time that suits you.</p>

    <p>If you have any questions or need to make changes to your appointment request, please contact us at:</p>
    <p>Phone: {{ config('app.phone', '(123) 456-7890') }}</p>
    <p>Email: {{ config('app.contact_email', 'contact@example.com') }}</p>
</div>

<p>We look forward to seeing you soon!</p>

<div class="footer">
    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
</div>
</body>
</html>
