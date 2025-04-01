<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Privacy Policy - MyDigiDollar</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            /* --background-gradient-start: #6a11cb;
            --background-gradient-end: #2575fc; */
			--gradient-background: linear-gradient(
        334deg, 
        rgba(35, 49, 174, 0.2), 
        rgba(57, 171, 122, 0.5), 
        rgba(230, 171, 150, 0.5)
    );
        }

        body {
			background-image: var(--gradient-background);
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
        }

        .privacy-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-top: 50px;
            position: relative;
            overflow: hidden;
            border-top: 6px solid var(--primary-color);
        }

        .privacy-header {
            color: var(--primary-color);
            text-align: center;
            position: relative;
            margin-bottom: 30px;
            font-weight: 700;
        }

        .privacy-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--primary-color);
        }

        .privacy-section {
            background-color: #f9fafb;
            border-left: 5px solid var(--primary-color);
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .privacy-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .privacy-section h3 {
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .privacy-section ul {
            padding-left: 20px;
        }

        .privacy-section li {
            margin-bottom: 10px;
            position: relative;
        }

        .privacy-section li::before {
            content: '✓';
            color: var(--primary-color);
            position: absolute;
            left: -25px;
            font-weight: bold;
        }

        .last-updated {
            text-align: center;
            color: var(--secondary-color);
            opacity: 0.7;
            margin-top: 30px;
        }
		
    </style>
</head>
<body>
    @extends('layouts.layout')
    @section('content')
        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="privacy-container">
                    <h1 class="privacy-header">Privacy Policy</h1>
                    
                    <div class="privacy-section">
                        <h3>Information Collection</h3>
                        <p>At <strong>MyDigiDollar</strong>, we are committed to protecting your personal information:</p>
                        <ul>
                            <li>Personal details like name, email, and payment information</li>
                            <li>Usage data to enhance user experience</li>
                            <li>Secure transaction tracking</li>
                        </ul>
                    </div>
                    
                    <div class="privacy-section">
                        <h3>Data Usage</h3>
                        <p>We use your information for:</p>
                        <ul>
                            <li>Account management and authentication</li>
                            <li>Secure transaction processing</li>
                            <li>Personalized service improvements</li>
                            <li>Communication of critical updates</li>
                        </ul>
                    </div>
                    
                    <div class="privacy-section">
                        <h3>Security Measures</h3>
                        <p>We implement robust security protocols:</p>
                        <ul>
                            <li>End-to-end data encryption</li>
                            <li>Secure cloud storage</li>
                            <li>Regular security audits</li>
                            <li>Strict access controls</li>
                        </ul>
                    </div>
                    
                    <div class="privacy-section">
                        <h3>User Rights</h3>
                        <p>We empower you with complete data control:</p>
                        <ul>
                            <li>Right to access personal information</li>
                            <li>Option to update account details</li>
                            <li>Request complete data deletion</li>
                            <li>Opt-out of marketing communications</li>
                        </ul>
                    </div>
                    
                    <p class="last-updated">
                        Last Updated: Sunday, January 12, 2025
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection

</body>
</html>
