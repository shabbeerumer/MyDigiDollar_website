<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyDigiDollar</title>
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
    font-family: Arial, sans-serif;
    background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));
   
}

/* Navbar Styles */
.navbar {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #2f4f4f;
    padding: 20px 40px;  /* Increased padding */
    /* margin-bottom: 50px; Added space after navbar */
}

.navbar-brand {
    color: #05b620;
    text-decoration: none;
    font-size: 1.8rem; /* Increased size */
    font-weight: bold;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 30px; /* Increased gap */
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 1.1rem; /* Increased font size */
    padding: 8px 15px;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #05b620;
}

.nav-buttons {
    display: flex;
    gap: 20px; /* Increased gap */
}

.btn {
    padding: 12px 25px; /* Increased padding */
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #198754;
    color: white;
}

/* Main Content/Login Form */
.login-container {
    background-color: white;
    padding: 40px; /* Increased padding */
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px; /* Increased width */
    margin: 80px auto; /* Added margin top and bottom */
}

.login-form h2 {
    text-align: center;
    margin-bottom: 30px; /* Increased margin */
    color: #333;
    font-size: 2rem; /* Increased size */
}

.input-group {
    position: relative;
    margin-bottom: 25px; /* Increased margin */
}

.input-group input {
    width: 100%;
    padding: 15px 45px 15px 15px; /* Increased padding */
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1.1rem;
}

.input-group .icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.2rem;
}

/* Footer Styles */
.footer-enhanced {
    background-color: #263238;
    padding: 70px 0 0; /* Increased top padding */
    color: white;
    margin-top: auto;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px; /* Increased gap */
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 40px; /* Increased padding */
}

.footer-section {
    display: flex;
    flex-direction: column;
    gap: 20px; /* Increased gap */
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
    padding: 25px 0; /* Increased padding */
    margin-top: 50px; /* Increased margin */
    background-color: rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .navbar {
        flex-direction: column;
        padding: 20px;
        gap: 20px;
    }

    .nav-links {
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .nav-buttons {
        flex-direction: column;
        width: 100%;
        gap: 15px;
    }

    .btn {
        width: 100%;
    }

    /* .login-container {
        margin: 40px 20px;
        padding: 30px 20px;
    } */

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

    /* .login-container {
        margin: 30px 15px;
    } */
}

   </style>
</head>
<body class="" style="">
    <nav class="navbar">
        <a href="{{route('webpage')}}" class="navbar-brand">ℳ𝓎𝒟𝒾ℊ𝒾𝒟ℴ𝓁𝓁𝒶𝓇</a>
        
        <ul class="nav-links">
            <li><a href="{{route('webpage')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('contact')}}">Contact Us</a></li>
        </ul>
        
        <div class="nav-buttons">
            <a href="{{route('login')}}">
                <button class="btn btn-login">Login</button>
            </a>
            <a href="{{route('register')}}">
                <button class="btn btn-register">Register</button>
            </a>
        </div>
        
    </nav>
    <div class="" style="text-align: center; background-color: #05b620; padding: 10px; color: white" >
      
        <h4 >
            {{-- <a href="{{route('login')}}" style="color: white ; text-decoration: none"> login / register </a> --}}
            <a href="{{route('login')}}" style="color: white ; text-decoration: none">login</a>   / <a href="{{route('register')}}" style="color: white ; text-decoration: none">register</a> 

        </h4>
            
    </div>
 

    <main style="padding: 2%">
        <div class="login-container" >
            <form class="login-form" action="{{ route('authenticate') }}" method="post">
                @csrf
                <h2>Login</h2>
                @if (session('error'))
                    <div style="color: red; margin-bottom: 15px; text-align: center;">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="input-group">
                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                    <span class="icon">👤</span>
                    @error('email')
                        <span style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password">
                    <span class="icon">🔒</span>
                    @error('password')
                        <span style="color: red; font-size: 14px; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-login" style="width: 100%;">Login</button>
                <p class="signup-text" style="text-align: center; margin-top: 15px;">
                    Don't have an account? <a href="{{ route('register') }}" style="color: #05b620;">Sign up</a>
                </p>
            </form>
            <div class="" style="text-align: center; margin-top: 15px;">
                <p><a href="{{ route('forget.password.get') }}" style="text-decoration: none; color: blue;">forget your password?</a></p>
            </div>
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
