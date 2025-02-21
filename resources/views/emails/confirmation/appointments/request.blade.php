<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Appointment Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            margin-bottom: 30px;
        }
        h1 {
            color: #0369a1;
            margin-bottom: 20px;
        }
        .appointment-details {
            background-color: #f8fafc;
            border-left: 4px solid #0369a1;
            padding: 15px;
            margin-bottom: 20px;
        }
        .client-details {
            background-color: #f1f5f9;
            padding: 15px;
            margin-bottom: 20px;
        }
        .detail-item {
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
            min-width: 150px;
            display: inline-block;
        }
        .action-button {
            background-color: #0369a1;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>New Appointment Request</h1>
    <p>A new appointment request has been submitted and requires your attention.</p>
</div>

<div class="client-details">
    <h2>Client Information</h2>
    <div class="detail-item">
        <span class="detail-label">Name:</span> {{ $appointment->first_name }} {{ $appointment->last_name }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Email:</span> {{ $appointment->email }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Phone:</span> {{ $appointment->phone }}
    </div>
    @if($appointment->has_insurance)
        <div class="detail-item">
            <span class="detail-label">Insurance:</span> {{ $appointment->insurance_provider }} (ID: {{ $appointment->insurance_member_id }})
        </div>
    @endif
</div>

<div class="appointment-details">
    <h2>Appointment Details</h2>
    <div class="detail-item">
        <span class="detail-label">Service Type:</span> {{ $appointment->service_type_text }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Appointment Type:</span> {{ $appointment->appointment_type_text }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Preferred Date:</span> {{ $appointment->preferred_date->format('l, F j, Y') }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Preferred Time:</span> {{ $appointment->preferred_time_text }}
    </div>
    @if($appointment->message)
        <div class="detail-item">
            <span class="detail-label">Message:</span> {{ $appointment->message }}
        </div>
    @endif
    <div class="detail-item">
        <span class="detail-label">IP Address:</span> {{ $appointment->ip_address }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Requested On:</span> {{ $appointment->created_at->format('F j, Y \a\t g:i A') }}
    </div>
</div>

<a href="{{ $adminUrl }}" class="action-button">View in Admin Panel</a>

<p style="margin-top: 30px;">Please review and confirm this appointment as soon as possible.</p>
</body>
</html>
