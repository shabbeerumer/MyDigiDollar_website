<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MyDigiDollar</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
        }

        body {
            background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        .contact-header {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px 0;
            margin-bottom: 40px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .contact-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .contact-info {
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin-bottom: 30px;
            background: #f8f9fa;
            border-radius: 0 10px 10px 0;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
        }

        .submit-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        .map-container {
            border-radius: 15px;
            overflow: hidden;
            margin: 30px 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Contact Header -->
    {{-- <div class="contact-header text-center">
        <h1>Contact Us</h1>
    </div> --}}
@extends('layouts.layout')
@section('content')
    
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-4">
                <div class="contact-section">
                    <div class="contact-info">
                        <h3>Address</h3>
                        <p>3523 Chico Way<br>
                           Bremerton, Washington<br>
                           United States</p>
                    </div>
                    <div class="contact-info">
                        <h3>Phone</h3>
                        <p>+13603779104</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="contact-section">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="First Name*" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Last Name*" required>
                            </div>
                        </div>
                        <input type="email" class="form-control" placeholder="Email*" required>
                        <input type="tel" class="form-control" placeholder="Phone Number">
                        <textarea class="form-control" rows="5" placeholder="Message*" required></textarea>
                        {{-- <button type="submit" class="submit-btn">Submit</button> --}}
                    </form>
                </div>
            </div>

            <!-- Map -->
            <div class="col-12">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2690.588263362306!2d-122.7122886244099!3d47.59525008876236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x549030daddd8158d%3A0x1b09b334d84091ee!2s3523%20Chico%20Way%20NW%2C%20Bremerton%2C%20WA%2098312%2C%20USA!5e0!3m2!1sen!2s!4v1735470604694!5m2!1sen!2s" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Add your form submission logic here
            alert('Form submitted successfully!');
            this.reset();
        });
    </script>
    @endsection

</body>
</html>
