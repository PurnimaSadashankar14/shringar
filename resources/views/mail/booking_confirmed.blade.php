<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Dear {{ $name }},</h1>
    <p>Your booking has been confirmed!</p>
    <p><strong>Booking Date:</strong> {{ $booking_date }}</p>
    <p><strong>Booking Time:</strong> {{ $booking_time }}</p>
    <p>We look forward to serving you. If you have any questions, please contact us.</p>
</body>
</html>
