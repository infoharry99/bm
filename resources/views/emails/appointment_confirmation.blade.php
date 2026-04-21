<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h2>Hello {{ $appointment->name }},</h2>
    <p>Your appointment has been confirmed.</p>

    <p><strong>Doctor ID:</strong> {{ $appointment->doctor_id }}</p>
    <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
    <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>

    <p>Thank you for choosing our clinic!</p>
</body>
</html>
