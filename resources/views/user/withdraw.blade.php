<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Withdraw Earnings</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			/* background-color: #f8f9fa; */
			background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));

		}

		.container {
			max-width: 800px;
			/* margin: 50px auto; */
			/* background-color: #ffffff; */
			border-radius: 10px;
			/* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
			padding: 20px;
		}

		h2 {
			text-align: center;
			color: #333;
		}

		p {
			color: #555;
			line-height: 1.6;
		}

		ol {
			margin: 10px 0 20px 20px;
		}

		ol li {
			margin-bottom: 10px;
		}

		.note {
			font-weight: bold;
			color: #d9534f;
			text-align: center;
			margin-bottom: 20px;
		}

		.form-group {
			margin-bottom: 20px;
		}

		.form-group label {
			display: block;
			margin-bottom: 5px;
			color: #333;
		}

		.form-group input {
			width: 100%;
			padding: 10px;
			font-size: 16px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		button {
			width: 100%;
			padding: 12px;
			background-color: #28a745;
			color: #fff;
			font-size: 16px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		button:hover {
			background-color: #218838;
		}
	</style>
</head>

<body>
	@extends('layouts.layout')
	@section('content')
		
	<div class="container">
		<h2>Withdraw Your Earnings</h2>
		<div class="text-center" >
			<p>
				At <strong>My Digi Dollar</strong>, we've made withdrawing your earnings simple and hassle-free.
				Follow the steps below to access your funds:
			</p>
			<ol style="list-style-type: none">
				<li><strong>Enter the Amount</strong>: Specify the amount you'd like to withdraw. Ensure it meets the
					minimum withdrawal limit.</li>
				<li><strong>Provide Payment Details</strong>: Add your payment information, such as your crypto wallet
					address, to ensure secure transfer.</li>
				<li><strong>Submit Your Request</strong>: Once everything is entered, click the submit button to process
					your withdrawal request.</li>
			</ol>
			<p class="note">Minimum Withdrawal Amount: $50 | Maximum Withdrawal Amount: $10,000</p>
		</div>
		
		<div class="container" style="max-width: 600px; margin: 20px auto;">
			@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
	
		@if(session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif
	
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
			<form
			action="{{ route('user.submitWithdrawRequest') }}" 
			enctype='multipart/form-data' 
			method='post'
			>
			@csrf
				<div class="form-group">
					<label for="package">Choose Wallet</label>
					<select id="package" name="payment_methods"  class="form-control" style="height: 45px; width: 100%; padding: 10px;">
						<option value="">Select Wallet</option>
						<option value="TRC20">TRC20</option>
						<option value="ERC20">ERC20</option>
						<option value="BEP20">BEP20</option>
					</select>
				</div>
		
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" id="username" name="user_name" class="form-control" 
						   placeholder="Enter your username" 
						   value="{{ Auth::user()->username }}"
						   
						   >
				</div>
		
				<div class="form-group">
					<label for="amount">Amount to Withdraw:
						<small class="text-muted">
							(Available Balance: ${{ number_format($availableBalance, 2) }})
						</small>
					</label>
					<input type="number" id="amount" name="withdraw_amount" class="form-control" 
						   placeholder="Enter an amount (min $50, max $10,000)" 
						   max="10000"
						   min="50">
				</div>
		
				<div class="form-group">
					<label for="wallet">Wallet Address:</label>
					<input type="text" id="wallet" name="address" class="form-control" 
						   placeholder="Enter your wallet address" >
				</div>
		          
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
		
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	@endsection

</body>

</html>