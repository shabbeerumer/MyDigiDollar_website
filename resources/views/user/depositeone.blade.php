<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));

        }

        ol {
            padding-left: 20px;
        }

        ol li {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        details {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        summary {
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        details[open] {
            background-color: #e9f5ff;
            border-color: #a5d8ff;
        }

        img {
            display: block;
            margin: 10px auto;
            border-radius: 8px;
        }

        h3 {
            font-size: 20px;
            text-align: center;
            color: #0056b3;
        }

        p {
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
        }

        .copy-btn {
            display: block;
            margin: 10px auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .copy-btn:hover {
            background-color: #45a049;
			
        }

        @media (max-width: 600px) {
            div {
                padding: 15px;
            }

            summary {
                font-size: 16px;
            }

            h3 {
                font-size: 18px;
            }

            p {
                font-size: 14px;
            }

            img {
                width: 150px;
            }
        }
        
        .form-container {
            max-width: 100%;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #0056b3;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }






        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* footer {
            background-color: #263238;
            color: white;
            /* padding: 40px 20px; */
            /* margin-top: 40px; */
        }

        footer .container {
            max-width: 1200px;
            margin: 0 auto;
        } */

        /* footer .row {
            display: flex;
            flex-wrap: wrap;
        } */
/* 
        footer .col-lg-3 {
            flex: 0 0 25%;
            max-width: 25%;
            padding: 10px;
            box-sizing: border-box;
        } */

        /* footer h5 {
            margin-bottom: 15px;
            font-size: 18px;
            color: #ffffff;
        } */

        /* footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 8px;
        } */
/* 
        footer ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        footer ul li a:hover {
            text-decoration: underline;
        }

        footer p {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            footer .col-lg-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        } */

        /* @media (max-width: 480px) {
            footer .col-lg-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        } */

        div {
            /* margin: 20px auto; */
            /* padding: 20px; */
            max-width: 800px;
        }
    </style>
</head>

<body>
	@extends('layouts.layout')

    @section('content')

    <div class="" style="margin: 20px auto;">
		@if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
	</div>
	<div style=" margin: 20px auto; ">
        <details open class="m-3">
            <summary>TRC20</summary>
            <img src={{ asset('images_qrcode/TRC20.jpg') }} alt="TRC" width="200">
            <h3>TRC20</h3>
            <p class="crypto-address">TE29EHAdzxcpp2BuVGkGY3a7urArSHdMNV</p>
            <button class="copy-btn" onclick="copyToClipboard(this)" style="width: 200px;">Copy</button>
        </details>
    </div>
    <div style=" margin: 20px auto;">
        <details open class="m-3">
            <summary>ERC20</summary>
            <img 
			src= {{asset('images_qrcode/Erc20.jpg')}}
			alt="TRC" width="200">
            <h3>ERC20</h3>
            <p class="crypto-address"> 0x0f68644c91Ab8E0f1340E21f9774d8B9Cd528153</p>
            <button class="copy-btn" onclick="copyToClipboard(this)" style="width: 200px;">Copy</button>
        </details>
    </div>
    <div style=" margin: 20px auto;">
        <details open class="m-3">
            <summary>BEP20</summary>
            <img 
			src={{ asset('images_qrcode/Bep20.jpg') }}
			alt="TRC" width="200">
            <h3>BEP20</h3>
            <p class="crypto-address">0x0f68644c91Ab8E0f1340E21f9774d8B9Cd528153</p>
            <button class="copy-btn" onclick="copyToClipboard(this)" style="width: 200px;">Copy</button>
        </details>
    </div>


    <div style=" margin: 20px auto;">
        <ol>
            <li>Copy the crypto address given below.</li>
            <li>Open your crypto wallet app.</li>
            <li>Paste the address and enter the payment amount.</li>
            <li>Confirm the transaction.</li>
            <li>Once the payment is complete, your package will be activated, and you’ll start earning.</li>
        </ol>
    </div>

    <div class="form-container top">

        <form action="{{ route('submit-request') }}" method="post" enctype="multipart/form-data"
            style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            @csrf
            <!-- Username -->
            <div class="form-group" style="margin: 20px auto;">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username"
                    value="{{ Auth::user()->username }}" required>
            </div>
            <div class="form-group" style="margin: 20px auto;">
                <label for="username">Email</label>
                <input type="text" id="username" name="email" placeholder="Enter your email" required>
            </div>


            <!-- Package Name -->
            <div class="form-group" style="margin: 20px auto;">
                <label for="package">Package Name</label>
                <select id="package" name="Package_Name" required>
                    <option value="">Select Package</option>
                    <option value="Basic">Bronze Starter <span>$100</span></option>
                    <option value="Standard">Silver Saver <span>$200 </span></option>
                    <option value="Premium">Golden Opportunity <span>$300</span></option>
                    <option value="Premium">Plantinum Plus <span>$400</span></option>
                    <option value="Premium">Diamond Elite <span>$500</span></option>
                    <option value="Premium">Emerald Advantage <span>$1000 </span></option>
                    <option value="Premium">Ruby Reward <span>$1500 </span></option>
                    <option value="Premium">Sapphire Pro <span>$3000 </span></option>
                    <option value="Premium">Titanium Maste <span>$5000 </span></option>
                    <option value="Premium">Infinity Legend<span>$10000 </span></option>
                </select>
            </div>

            <!-- Deposit Amount -->
            <div class="form-group" style="margin: 20px auto;">
                <label for="amount">Deposit Amount</label>
                <input type="number" id="amount" name="Deposit_Amount" placeholder="Enter deposit amount" required>
            </div>

            <!-- Image Upload -->
            <div class="form-group" style="margin: 20px auto;">
                <label for="image mt-5">Upload Proof of Payment</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" style="width: 200px;">Submit</button>
            </div>
        </form>
    </div>

    




   





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function copyToClipboard(button) {
            // Get the text to copy
            const textToCopy = button.previousElementSibling.textContent;

            // Copy text to clipboard
            const tempTextarea = document.createElement('textarea');
            tempTextarea.value = textToCopy;
            document.body.appendChild(tempTextarea);
            tempTextarea.select();
            document.execCommand('copy');
            document.body.removeChild(tempTextarea);

            // Alert user that text is copied
            alert('Copied: ' + textToCopy);

            // Open the <details> element if not already open
            const detailsElement = button.closest('details');
            if (!detailsElement.open) {
                detailsElement.open = true;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
	@endsection
</body>

</html>
