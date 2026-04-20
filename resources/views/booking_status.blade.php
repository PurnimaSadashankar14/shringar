<!DOCTYPE html>
<html>
<head>
    <title>Booking Status Update</title>
</head>
<body>
    <p>Dear {{ $name }},</p>
    <p>Your booking status has been updated to: <strong>{{ $status }}</strong>.</p>
    <p>Booking Date: {{ $bookingDate }}</p>
    <p>Booking Time: {{ $bookingTime }}</p>
    <p>Thank you for choosing us!</p>
</body>
</html>
