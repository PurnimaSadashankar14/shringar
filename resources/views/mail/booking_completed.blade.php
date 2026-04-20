<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Completed</title>
</head>
<body>
    <h1>Dear {{ $name }},</h1>
    <p>Your booking has been completed successfully!</p>
    <p><strong>Booking Date:</strong> {{ $booking_date }}</p>
    <p><strong>Booking Time:</strong> {{ $booking_time }}</p>
    <p>We hope you had a great experience. Please don't hesitate to reach out if you need further assistance!</p>
</body>
</html>
