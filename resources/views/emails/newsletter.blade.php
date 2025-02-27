<!-- resources/views/emails/newsletter.blade.php -->
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
        .content {
            margin-bottom: 30px;
        }
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #e8e8e8;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
        a {
            color: #3490dc;
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

<div class="content">
    {!! $content !!}
</div>

<div class="footer">
    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    <p>
        If you no longer wish to receive these emails, you can
        <a href="{{ route('newsletter.unsubscribe', ['email' => $email]) }}">unsubscribe</a>
        at any time.
    </p>

    {!! $trackingPixel !!}
</div>
</body>
</html>
