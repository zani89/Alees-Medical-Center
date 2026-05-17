<!DOCTYPE html>
<html>
<head>
    <title>Appointment Request Received</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-top: 4px solid #0C3B6E;">
        <h2 style="color: #0C3B6E;">Hello {{ $appointment->patient_name }},</h2>
        <p>Thank you for choosing Alees Medical Center. We have received your appointment request.</p>
        
        <h3 style="border-bottom: 1px solid #ddd; padding-bottom: 5px;">Appointment Details:</h3>
        <ul>
            <li><strong>Department:</strong> {{ $appointment->department->name }}</li>
            @if($appointment->doctor)
                <li><strong>Doctor:</strong> {{ $appointment->doctor->name }}</li>
            @endif
            <li><strong>Preferred Date:</strong> {{ \Carbon\Carbon::parse($appointment->preferred_date)->format('F d, Y') }}</li>
            <li><strong>Phone:</strong> {{ $appointment->phone }}</li>
        </ul>

        <div style="background-color: #f8f9fa; padding: 15px; border-left: 4px solid #0F6E56; margin-top: 20px;">
            <p style="margin: 0;"><strong>What's Next?</strong><br>
            Our reception team will call you at <strong>{{ $appointment->phone }}</strong> within 2 hours to confirm your exact appointment time.</p>
        </div>

        <p style="margin-top: 30px;">Best Regards,<br>
        <strong>Alees Medical Center Team</strong></p>
    </div>
</body>
</html>
