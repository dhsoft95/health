<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Confirmation</title>
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
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
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
        .detail-item {
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
        }
        .note {
            background-color: #fff9db;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #6b7280;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="{{ asset('images/logo.png') }}" alt="MP Health Logo" class="logo">
    <h1>Your Appointment Request</h1>
</div>

<p>Dear {{ $firstName }},</p>

<p>Thank you for requesting an appointment with MP Health. We've received your request and will contact you within 24 hours to confirm the details.</p>

<div class="appointment-details">
    <div class="detail-item">
        <span class="detail-label">Service:</span> {{ $serviceType }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Appointment Type:</span> {{ $appointmentType }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Preferred Date:</span> {{ $date }}
    </div>
    <div class="detail-item">
        <span class="detail-label">Preferred Time:</span> {{ $time }}
    </div>
</div>

<div class="note">
    <p><strong>Note:</strong> This is not a confirmation of your appointment. A team member will contact you to confirm availability and finalize the details.</p>
</div>

<p>If you need to make any changes to your request or have any questions, please contact us at <a href="mailto:support@mphealth.com">support@mphealth.com</a> or call us at (123) 456-7890.</p>

<p>We look forward to supporting your mental health journey.</p>

<p>Best regards,<br>
    The MP Health Team</p>

<div class="footer">
    <p>MP Health | 123 Health Street, City, State 12345<br>
        This email was sent to {{ $appointment->email }}</p>
</div>
</body>
</html>
