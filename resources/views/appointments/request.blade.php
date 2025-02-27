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
        .action-btn {
            display: inline-block;
            background-color: #3490dc;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 4px;
            font-weight: bold;
            margin: 20px 0;
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

<h1>New Appointment Request</h1>

<p>A new appointment request has been submitted through the website. Please review the details below:</p>

<div class="details">
    <p><strong>Name:</strong> {{ $appointment->first_name }} {{ $appointment->last_name }}</p>
    <p><strong>Email:</strong> {{ $appointment->email }}</p>
    <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
    <p><strong>Service Type:</strong> {{ $appointment->getServiceTypeTextAttribute() }}</p>
    <p><strong>Appointment Type:</strong> {{ $appointment->getAppointmentTypeTextAttribute() }}</p>
    <p><strong>Preferred Date:</strong> {{ $appointment->preferred_date->format('F j, Y') }}</p>
    <p><strong>Preferred Time:</strong> {{ $appointment->getPreferredTimeTextAttribute() }}</p>

    @if($appointment->has_insurance)
        <p><strong>Insurance Provider:</strong> {{ $appointment->insurance_provider }}</p>
        <p><strong>Insurance Member ID:</strong> {{ $appointment->insurance_member_id }}</p>
    @endif

    @if($appointment->message)
        <h2>Additional Message</h2>
        <p>{{ $appointment->message }}</p>
    @endif
</div>

<p>Please contact the client as soon as possible to confirm their appointment.</p>

<a href="{{ route('filament.admin.resources.appointments.edit', $appointment) }}" class="action-btn">Manage Appointment</a>

<div class="footer">
    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
</div>
</body>
</html>
