<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    .login-container {
        margin: 40px 20px;
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

    .login-container {
        margin: 30px 15px;
    }
}

   </style>
</head>
<body class="" style="">
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
    
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('reset.password.post') }}">
                            @csrf
    
                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="form-group mb-3">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email"
                                >
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="password">{{ __('New Password') }}</label>
                                <input 
                                    type="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password"
                                >
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input 
                                    type="password" 
                                    id="password-confirm" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password"
                                >
                            </div>
    
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

