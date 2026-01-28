<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f4f4f4; padding: 20px; border-radius: 5px;">
        <h2 style="color: #333; margin-top: 0;">New Contact Form Submission</h2>
        
        <div style="background-color: #fff; padding: 20px; border-radius: 5px; margin-top: 20px;">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Subject:</strong> {{ $subject }}</p>
            
            <hr style="border: 1px solid #e0e0e0; margin: 20px 0;">
            
            <p><strong>Message:</strong></p>
            <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #007bff; border-radius: 3px;">
                {!! nl2br(e($messageBody)) !!}
            </div>
        </div>
        
        <p style="margin-top: 20px; font-size: 12px; color: #666;">
            This message was sent from the contact form on your website.
        </p>
    </div>
</body>
</html>
