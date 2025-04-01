<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - MyDigiDollar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));
        }

        .navbar {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2f4f4f !important;
            padding: 20px 40px;
            /* margin-bottom: 50px; */
        }

        .navbar-brand {
            color: #05b620;
            text-decoration: none;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 8px 15px;
            transition: color 0.3s ease;
        }

        .nav-buttons {
            display: flex;
            gap: 20px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #198754 !important;
            color: white;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .login-box h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f7f7f7;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #05b620;
            background-color: #fff;
        }

        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #05b620;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #048d19;
        }

        .footer-enhanced {
            background-color: #263238;
            padding: 70px 0 0;
            color: white;
            margin-top: auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .footer-logo {
            color: #05b620;
            text-decoration: none;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #05b620;
        }

        .footer-bottom {
            text-align: center;
            padding: 25px 0;
            margin-top: 50px;
            background-color: rgba(0, 0, 0, 0.2);
        }

        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 20px;
                gap: 20px;
            }

            .nav-links, .nav-buttons {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .login-box {
                padding: 30px 20px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
                padding: 0 20px;
            }
        }

        @media screen and (max-width: 480px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{route('webpage')}}" class="navbar-brand">ℳ𝓎𝒟𝒾ℊ𝒾𝒟ℴ𝓁𝓁𝒶𝓇</a>
        
        <ul class="nav-links">
            <li><a href="{{route('webpage')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('contact')}}">Contact Us</a></li>
        </ul>
        
        <div class="nav-buttons">
            <a href="{{route('login')}}">
                <button class="btn" style="background-color: #05b620; color: white;">Login</button>
            </a>
            <a href="{{route('register')}}">
                <button class="btn" style="background-color: transparent; border: 1px solid white; color: white;">Register</button>
            </a>
        </div>
    </nav>
    <div class="" style="text-align: center; background-color: #05b620; padding: 10px; color: white" >
      
        <h4>
            {{-- <a href="{{route('login')}}" style="color: white ; text-decoration: none"> login / register </a> --}}
            <a href="{{route('login')}}" style="color: white ; text-decoration: none">login</a>   / <a href="{{route('register')}}" style="color: white ; text-decoration: none">register</a> 

        </h4>
            
    </div>
    <main>
        <div class="login-box">
            <h2>Register</h2>
            <form action="{{route('processregister')}}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="first_name" placeholder="Enter your first name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <span style="color: red; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="text" name="last_name" placeholder="Enter your last name" value="{{ old('first_name') }}">
                    @error('last_name')
                    <span style="color: red; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
                </div>
                <div class="input-group">
                    <input type="text" name="user_name" placeholder="Enter your username" value="{{ old('user_name') }}">
                    @error('user_name')
                        <span style="color: red; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="input-group">
                    <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Enter your password">
                    @error('password')
                        <span style="color: red; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm your password">
                </div>
                <div class="input-group">
                    {{-- <input type="text" name="referral_username" placeholder="Referral code (optional)" value="{{ old('last_name', Auth::check() ? Auth::user()->referral_code : '') }}"> --}}
                    <input type="text" name="referral_username" placeholder="Referral code (optional)" value="{{ old('referral_username', request('ref_code')) }}">

                </div>
                {{-- <input type="hidden" name="referrer_id" value="{{ Auth::check() ? Auth::id() : 'not found' }}"> --}}
                <input type="hidden" name="referrer_id" value="{{ old('referrer_id', request('referrer_id')) }}">
                <button type="submit">Register</button>
            </form>
            <p style="text-align: center; margin-top: 20px;">
                Already have an account? <a href="{{ route('login') }}" style="color: #05b620;">Login here</a>
            </p>
        </div>
    </main>

    {{-- <footer class="footer-enhanced">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <a href="{{route('webpage')}}" class="footer-logo">MyDigiDollar</a>
                    <p>Empowering financial solutions through innovative digital technology.</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon">🌐</a>
                        <a href="#" class="social-icon">📱</a>
                        <a href="#" class="social-icon">📧</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <div class="footer-links">
                        <a href="{{route('webpage')}}" class="footer-link">Home</a>
                        <a href="{{route('about')}}" class="footer-link">About Us</a>
                        <a href="{{route('contact')}}" class="footer-link">Contact</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Legal</h4>
                    <div class="footer-links">
                        <a href="{{route('privacy')}}" class="footer-link">Privacy Policy</a>
                        <a href="#" class="footer-link">Terms of Service</a>
                        <a href="#" class="footer-link">Disclaimer</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <div class="footer-links">
                        <p>📍 123 Digital Street</p>
                        <p>📞 +1 (555) 123-4567</p>
                        <p>✉️ support@mydigidollar.com</p>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2024 MyDigiDollar. All Rights Reserved.</p>
            </div>
        </div>
    </footer> --}}
</body>
</html>
