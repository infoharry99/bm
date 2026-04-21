<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation </title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f8f9fa;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #2C2D3F 0%, #569A47 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        
        .header .subtitle {
            margin: 8px 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            margin-bottom: 25px;
            color: #2c3e50;
        }
        
        .booking-card {
            background-color: #f8f9fc;
            border-left: 4px solid #2C2D3F;
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
        }
        
        .booking-details {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }
        
        .detail-row {
            display: table-row;
        }
        
        .detail-label {
            display: table-cell;
            font-weight: 600;
            color: #555;
            width: 40%;
            padding-right: 15px;
            vertical-align: top;
        }
        
        .detail-value {
            display: table-cell;
            color: #333;
            vertical-align: top;
        }
        
        .reference-number {
            background-color: #2C2D3F;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .amount {
            font-size: 20px;
            font-weight: 700;
            color: #27ae60;
        }
        
        .message {
            background-color: #e8f4fd;
            border: 1px solid #b3d9ff;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }
        
        .message-icon {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .contact-section {
            background-color: #f1f3f4;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }
        
        .contact-button {
            display: inline-block;
            background-color: #2C2D3F;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }
        
        .contact-button:hover {
            background-color: #5a67d8;
        }
        
        .footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 25px 20px;
        }
        
        .footer-logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .footer-text {
            font-size: 14px;
            opacity: 0.8;
            margin: 5px 0;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .booking-card {
                padding: 20px 15px;
            }
            
            .detail-label,
            .detail-value {
                display: block;
                width: 100%;
                padding-right: 0;
            }
            
            .detail-label {
                margin-bottom: 5px;
            }
            
            .detail-value {
                margin-bottom: 15px;
                padding-left: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>✅ Booking Confirmed</h1>
            <div class="subtitle">Your reservation has been successfully processed</div>
        </div>
        <div class="content">
            <div class="greeting">
                Dear {{ $booking->first_name }} {{ $booking->last_name }},
            </div>
            
            <p>Thank you for choosing Brands! We're excited to confirm your booking. Here are your reservation details:</p>
            
            <!-- Booking Details Card -->
            <div class="booking-card">
                <div class="booking-details">
                    <div class="detail-row">
                        <div class="detail-label">Booking Reference:</div>
                        <div class="detail-value">
                            <span class="reference-number">{{ $booking->booking_reference }}</span>
                        </div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">📅 Date:</div>
                        <div class="detail-value">{{ $booking->booking_date }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">🕒 Time:</div>
                        <div class="detail-value">{{ $booking->start_time }} - {{ $booking->end_time }} ({{ $booking->timezone }})</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">📍 Location:</div>
                        <div class="detail-value">{{ $booking->location }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">📍 Location:</div>
                        <div class="detail-value">{{ $booking->location }}</div>
                    </div>
                     <div class="detail-row">
                        <div class="detail-label">📍 Meet Link:</div>
                        <div class="detail-value"> https://meet.google.com/zyy-nxhn-hmc</div>
                    </div>
                    <!-- <div class="detail-row">
                        <div class="detail-label">💰 Total Amount:</div>
                        <div class="detail-value">
                            <span class="amount">₹{{ number_format($booking->total_amount, 2) }}</span>
                        </div>
                    </div> -->
                </div>
            </div>
            
            <!-- Important Message -->
            <div class="message">
                <div class="message-icon">📋</div>
                <strong>Important:</strong> Please save this confirmation email for your records. You may need to present your booking reference at the venue.
            </div>
            
            <!-- Contact Section -->
            <!-- <div class="contact-section">
                <h3 style="margin-top: 0; color: #2c3e50;">Need Help?</h3>
                <p style="margin-bottom: 15px;">Our support team is here to assist you with any questions or concerns.</p>
                <a href="mailto:support@fovia.com" class="contact-button">Contact Support</a>
            </div> -->
            
            <p style="margin-top: 30px; color: #666;">
                We look forward to serving you!<br>
                <strong>The Brnds Booking Team</strong>
            </p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">Brnds</div>
            <div class="footer-text">Making bookings simple and seamless</div>
            <div class="footer-text">© 2025 Brnds. All rights reserved.</div>
        </div>
    </div>
</body>
</html>