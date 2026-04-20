<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking In Progress</title>
</head>
<body>
    <h1>Dear {{ $name }},</h1>
    <p>Your booking is now in progress. We are getting ready for your appointment!</p>
    <p><strong>Booking Date:</strong> {{ $booking_date }}</p>
    <p><strong>Booking Time:</strong> {{ $booking_time }}</p>
    <p>Thank you for your patience. We’ll notify you once your appointment is complete.</p>
</body>
</html>
