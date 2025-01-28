<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subscribed Packages - MyDigiDollar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --success-color: #4cc9f0;
            --text-color: #2b2d42;
            --light-bg: #f8f9fa;
        }

        body {
            background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            min-height: 100vh;
        }

        .subscription-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .subscription-header {
            background: rgba(255, 255, 255, 0.95);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            border-left: 5px solid var(--primary-color);
        }

        .nav-tabs {
            border: none;
            margin-bottom: 30px;
            gap: 10px;
        }

        .nav-tabs .nav-link {
            border: none;
            background: white;
            color: var(--text-color);
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .nav-tabs .nav-link.active {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .subscription-details {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        .subscription-details .row {
            padding: 20px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            margin: 0;
            transition: all 0.3s ease;
        }

        .subscription-details .row:hover {
            background: var(--light-bg);
        }

        .subscription-details .label {
            font-weight: 600;
            color: var(--text-color);
        }

        .status-active {
            color: #10b981;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-active::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            display: inline-block;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 8px 20px;
            border-radius: 8px;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-change {
            background: var(--accent-color);
            color: white;
        }

        .btn-cancel {
            background: #ef476f;
            color: white;
        }

        .btn-abandon {
            background: #ffd166;
            color: var(--text-color);
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .nav-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 5px;
            }
        }
    </style>
</head>
<body>
	@extends('layouts.layout')
	@section('content')
		
    <div class="subscription-container">
        <div class="subscription-header " >
            <h2 class="text-center mb-0">Your Subscription Details</h2>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Subscriptions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Edit Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Payments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>

        <div class="subscription-details" >
            <div class="row align-items-center">
                <div class="col-md-4 label">Subscription Plan</div>
                <div class="col-md-8">Emerald Advantage</div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4 label">Status</div>
                <div class="col-md-8"><span class="status-active">Active</span></div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4 label">Start Date</div>
                <div class="col-md-8">December 29, 2024</div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4 label">Expiration Date</div>
                <div class="col-md-8">December 29, 2025</div>
            </div>
            {{-- <div class="row align-items-center">
                <div class="col-md-4 label">Actions</div>
                <div class="col-md-8">
                    <div class="action-buttons">
                        <button class="action-btn btn-change" onclick="changeSubscription()">Change Plan</button>
                        <button class="action-btn btn-cancel" onclick="cancelSubscription()">Cancel</button>
                        <button class="action-btn btn-abandon" onclick="abandonSubscription()">Abandon</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	@endsection

</body>
</html>
