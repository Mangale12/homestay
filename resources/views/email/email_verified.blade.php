<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Verification</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="width: 600px; margin: auto; background-color: #ffffff; padding: 20px;">
        <tr>
            <td style="text-align: center;">
                <h2 style="color: #333333;">Login Verification</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p style="color: #666666;">Dear {{ $user->name }},</p>
                <p style="color: #666666;">Thank you for signing up with our platform. To complete your registration, please click the link below to verify your email address:</p>
                <p style="text-align: center;">
                    <a href="{{ url('email-verification/'.$user->id) }}" style="display: inline-block; padding: 10px 20px; background-color: #3498db; color: #ffffff; text-decoration: none; border-radius: 5px;">Verify Email</a>
                </p>
                <p style="color: #666666;">If you did not request this verification, you can safely ignore this email.</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <p style="color: #999999;">Best regards,<br>Nepal Bed & Breakfast</p>
            </td>
        </tr>
    </table>

</body>
</html>
