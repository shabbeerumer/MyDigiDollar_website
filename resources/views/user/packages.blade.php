
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Plans</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        } */
        body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
            color: #333;

			/* background-color: #f8f9fa; */
			background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));

		}
        .container {
            max-width: 1200px;
            /* margin: 50px auto;
            padding: 20px; */
        }

        .plans {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .plan {
            border: 2px solid #28a745;
            border-radius: 10px;
            width: 300px;
            padding: 20px;
            text-align: center;
            background: #fff;
            transition: transform 0.3s ease;
        }

        .plan:hover {
            transform: scale(1.05);
        }

        .plan h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .plan .price {
            font-size: 40px;
            color: #000;
        }

        .plan .price span {
            font-size: 16px;
            color: #555;
        }

        .plan .benefits {
            font-size: 16px;
            margin: 15px 0;
        }

        .plan .benefits .checkmark {
            color: #28a745;
            font-weight: bold;
            margin-right: 5px;
        }

        .plan button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .plan button:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    
    @extends('layouts.layout')
    @section('content')
        
    <div class="container">
        <h1 style="text-align: center;">Subscription Plans</h1>
        <div class="plans">
            <!-- Bronze Plan -->
            <div class="plan">
                <h3>Bronze Starter</h3>
                <p class="price">$100 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 1.5$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Bronze Starter" > 
					<input type="hidden" name="price" value="100" > 
					<input type="hidden" name="earning" value="1.5" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
				</form>
            </div>

            <!-- Silver Plan -->
            <div class="plan">
                <h3>Silver Saver</h3>
                <p class="price">$200 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 3$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Silver Saver" > 
					<input type="hidden" name="price" value="200" > 
					<input type="hidden" name="earning" value="3" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
				</form>
            </div>

            <!-- Gold Plan -->
            <div class="plan">
                <h3>Golden Opportunity</h3>
                <p class="price">$300 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 4.5$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Golden Opportunity" > 
					<input type="hidden" name="price" value="300" > 
					<input type="hidden" name="earning" value="4.5" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
				</form>
            </div>
        </div>

        <div class="plans" style="margin-top: 20px;">
            <!-- Bronze Plan -->
            <div class="plan">
                <h3>Plantinum Plus</h3>
                <p class="price">$400 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 6$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Plantinum Plus" > 
					<input type="hidden" name="price" value="400" > 
					<input type="hidden" name="earning" value="6" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
				</form>
            </div>

            <!-- Silver Plan -->
            <div class="plan">
                <h3>Diamond Elite</h3>
                <p class="price">$500 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 10$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Diamond Elite" > 
					<input type="hidden" name="price" value="500" > 
					<input type="hidden" name="earning" value="10" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
				</form>
            </div>

            <!-- Gold Plan -->
            <div class="plan">
                <h3>Emerald Advantage</h3>
                <p class="price">$1000 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 25$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Emerald Advantage" > 
					<input type="hidden" name="price" value="1000" > 
					<input type="hidden" name="earning" value="25" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
			</form>
            </div>
        </div>

        <div class="plans" style="margin-top: 20px;">
            <!-- Bronze Plan -->
            <div class="plan">
                <h3>Ruby Reward</h3>
                <p class="price">$1500 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 40$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Ruby Reward" > 
					<input type="hidden" name="price" value="1500" > 
					<input type="hidden" name="earning" value="40" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
			</form>
            </div>

            <!-- Silver Plan -->
            <div class="plan">
                <h3>Sapphire Pro</h3>
                <p class="price">$3000 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 100$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Sapphire Pro" > 
					<input type="hidden" name="price" value="3000" > 
					<input type="hidden" name="earning" value="100" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
			</form>
            </div>

            <!-- Gold Plan -->
            <div class="plan">
                <h3>Titanium Maste</h3>
                <p class="price">$5000 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 150$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Titanium Master" > 
					<input type="hidden" name="price" value="5000" > 
					<input type="hidden" name="earning" value="150" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
			</form>
            </div>
        </div>
        <div class="plans" style="margin-top: 20px;">
            <div class="plan">
                <h3>Infinity Legend</h3>
                <p class="price">$10000 <span>/Per Year</span></p>
                <p class="benefits"><span class="checkmark">✔</span> Daily Earning will be 350$</p>
                {{-- <button>Subscribe</button> --}}
				<form action="{{ route('buyPackage') }}" method="POST">
					@csrf
					<input type="hidden" name="package_name" value="Infinity Legend" > 
					<input type="hidden" name="price" value="10000" > 
					<input type="hidden" name="earning" value="350" > 
					<div class="button-wrap">
					<button type="submit"
					 class="gym-builder-btn " style="border: none"
					>Subscribe</button>
				</div>
			</form>
            </div>
        </div>


    </div>
    @endsection

</body>

</html>