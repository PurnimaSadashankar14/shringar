<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Canceled</title>
</head>
<body>
    <h1>Dear {{ $name }},</h1>
    <p>We regret to inform you that your booking has been canceled.</p>
    <p><strong>Booking Date:</strong> {{ $booking_date }}</p>
    <p><strong>Booking Time:</strong> {{ $booking_time }}</p>
    <p>If this was an error, please contact us immediately to reschedule your appointment.</p>
</body>
</html>
