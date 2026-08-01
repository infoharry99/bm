<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }
        .email-card {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .email-header {
            background: linear-gradient(135deg, #4C6BE9, #3046A2);
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .email-body {
            padding: 30px 25px;
            color: #333333;
            line-height: 1.6;
        }
        .details-box {
            background: #f8f9fa;
            border-left: 4px solid #4C6BE9;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .details-box table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-box td {
            padding: 6px 0;
            font-size: 14px;
        }
        .details-box td.label {
            font-weight: bold;
            color: #555;
            width: 35%;
        }
        .btn-login {
            display: inline-block;
            background: #3046A2;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 15px;
        }
        .email-footer {
            background: #f1f3f7;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="email-card">
        <div class="email-header">
            <h1>Welcome to Bihari Muslims UK</h1>
        </div>
        <div class="email-body">
            <p>Dear <strong>{{ $member->name }}</strong>,</p>
            <p>Thank you for registering with Bihari Muslims UK! Your registration has been successfully completed and confirmed.</p>
            
            <div class="details-box">
                <h3 style="margin-top:0; color:#3046A2;">Your Registration Summary</h3>
                <table>
                    <tr>
                        <td class="label">Full Name:</td>
                        <td>{{ $member->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Email Address:</td>
                        <td>{{ $member->email }}</td>
                    </tr>
                    <tr>
                        <td class="label">Phone:</td>
                        <td>{{ $member->phone }}</td>
                    </tr>
                    @if($member->location)
                    <tr>
                        <td class="label">Bihar Location:</td>
                        <td>{{ $member->location }}</td>
                    </tr>
                    @endif
                    @if($member->uk_location)
                    <tr>
                        <td class="label">UK Location:</td>
                        <td>{{ $member->uk_location }}</td>
                    </tr>
                    @endif
                </table>
            </div>

            <p>You can log in to your account at any time to update your profile, add or edit your profile picture, and connect with other members.</p>
            
            <p style="text-align: center; margin-top: 25px;">
                <a href="{{ url('/login') }}" class="btn-login">Log In to Your Profile</a>
            </p>

            <p>If you have any questions or require assistance, please feel free to reply to this email or contact us.</p>
            <p>Warm regards,<br><strong>Bihari Muslims UK Team</strong></p>
        </div>
        <div class="email-footer">
            &copy; {{ date('Y') }} Bihari Muslims UK. All rights reserved.
        </div>
    </div>
</body>
</html>
