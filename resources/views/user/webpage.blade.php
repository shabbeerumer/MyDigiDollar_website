<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>My DigiDollar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href={{ asset('CSS/web.css') }} {{-- "web.css" --}}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html,
        body {
            /* position: relative; */
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper {
            margin-bottom: 20px;
            width: 75%;
            height: 40%;
        }

        @media (max-width: 768px) {
            .swiper {
                width: 100%;
            }
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text-bg {
            background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));
            padding: 20px;
        }
    </style>
</head>

<body>



    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #2f4f4f">
            <div class="container">
                <a class="navbar-brand" href={{ route('webpage') }} {{-- "web.html" --}}
                    style="color: #05b620;"><b>ℳ𝓎𝒟𝒾ℊ𝒾𝒟ℴ𝓁𝓁𝒶𝓇</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="gap: 32px;">
                        {{-- @if (Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('admin.cards')}}" style="color: white;">Admin Dashboard</a>
                        </li>     
                        @endif --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link active" href="{{route('logout')}}" style="color: white;">logout</a>
                        </li> --}}
                        <li class="nav-item mt-2">
                            <a class="nav-link active" href="#" style=" font-size: 15px; color: white">Home</a>
                        </li>

                        <li class="nav-item mt-2">
                            <a class="nav-link" href={{ route('about') }} {{-- "about.html" --}}
                                style="color: white; font-size: 15px;">About</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link" href={{ route('contact') }} {{-- "contact.html"  --}}
                                style="color: white; font-size: 15px;">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('dashboard') }} {{-- "contact.html"  --}}
                                style="color: white; font-size: 15px;">
                                <button class="btn btn-success ">Dashboard</button>


                            </a>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item mt-2">
                                <a href={{ route('logout') }} {{-- "login.html" --}}>
                                    <button class="btn btn-success ">logout</button>
                                </a>
                            </li>
                        @else
                            <li class="nav-item mt-2">
                                <a href={{ route('login') }} {{-- "login.html" --}}>
                                    <button class="btn btn-success ">Login</button>
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a href={{ route('register') }} {{-- "register.html" --}}>
                                    <button class="btn btn-outline-light">Register</button>

                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <section class="first" style="background-image: linear-gradient(90deg, rgba(153, 188, 237, .2), rgba(153, 248, 207, .5), rgba(255, 214, 199, .5));  padding: 23px ">
        <div class="container">
            <div class="row" style="justify-content: center; text-align: center;">
                <div class="col-lg-4">
                    <div class="text" style="justify-content: center; font-size: 30px; font-weight: bold;">
                        Earn Daily, Grow Steadily <br>
                        <span style="color: #01aa00;"> <i>– With My Digi Dollar!</i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="second" style="background-image: url(img/ee.jpg);">
        <div class="container">
            <div class="row align-items-center mt-4">
                <!-- Text Section -->
                <div class="col-lg-6 col-md-12" data-aos="fade-right">
                    <div class="text-bg p-4" style="border-radius: 20px;">
                        <div class="welcome d-flex flex-column justify-content-center h-100">
                            <h1 class="text-center" style="color: black; font-size: 26px; font-weight: bold;">
                                <i>Welcome to My DigiDollar</i>
                            </h1>
                            <p class="text-center">
                                Unlock the power of consistent online earnings with <b>My Digi Dollar</b>. Start your
                                journey today with simple subscription plans that deliver reliable daily income. Join
                                our growing community and take control of your financial future.
                            </p>
                            <div class="text-center mt-auto">
                                <a href="{{ Auth::user() ? route('dashboard') : route('login') }}"> <button
                                        class="btn btn-success">Get Started</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="col-lg-6 col-md-12 mt-4 mt-lg-0 img-bg" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <div class="d-flex align-items-center justify-content-center h-100 p-4">
                        <img src="{{ '../img/three.svg' }}" alt="Image description" class="img-fluid shadow-img"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <hr style="width: 100%; margin-bottom: 20px;">


            <section>
                <div class="container">
                    <div class="row">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="{{ '../img/s1.svg' }}" alt=""></div>
                                <div class="swiper-slide"><img src="{{ '../img/s2.svg' }}" alt=""></div>
                                <div class="swiper-slide"><img src="{{ '../img/s3.svg' }}" alt=""></div>
                                <div class="swiper-slide"><img src="{{ '../img/s4.svg' }}" alt=""></div>
                                <div class="swiper-slide"><img src="{{ '../img/s5.svg' }}" alt=""></div>
                                <div class="swiper-slide"><img src="{{ '../img/s6.svg' }}" alt=""></div>
                                <div class="swiper-slide"><img src="{{ '../img/s7.svg' }}" alt=""></div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>


            <div class="row mt-4">
                <div class="col-lg-6 col-md-12" data-aos="fade-right">
                    <div class="Choose" style="margin-top: 54px;">
                        <h1><i>Why Choose Us?</i></h1>
                        <p>Trusted Platform for Reliable Earnings. At My Digi Dollar, we prioritize your success by
                            offering: Secure and transparent payment systems. Consistent daily earnings with flexible
                            plans. Exceptional customer support every step of the way. Join us today and experience a
                            platform built for your financial growth.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mt-2 mt-lg-0 img-bg" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <div class="d-flex align-items-center justify-content-center h-100 p-4">
                        <img src="{{ '../img/four.svg' }}" alt="Image description" class="img-fluid shadow-img"
                            style="max-height: 240px;">
                    </div>
                </div>

            </div>

            <div class="line mb-5 mt-4" style="text-align: center;">
                <h3>
                    <!-- <i>Start Earning ToDay!</i> -->
                </h3>
            </div>
            <hr style="width: 100%;">

            <div class="row mt-4">
                <div class="col-lg-6 col-md-12" data-aos="fade-right">
                    <div class="Works">
                        <h1 class="text-center"><i>How It Works</i></h1>
                        <p class="text-center">Simple Steps to Start Earning: Choose a subscription plan that suits
                            your
                            goals. Activate
                            your account with an easy payment process. Watch your earnings grow daily! No complexities,
                            just a reliable way to earn online. Start your journey now!</p>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 mt-4 mt-lg-0 img-bg" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                    <div class="d-flex align-items-center justify-content-center h-100 p-4">
                        <img src="{{ '../img/five.svg' }}" alt="Image description" class="img-fluid shadow-img"
                            style="max-height: 240px;">
                    </div>
                </div>
            </div>

        </div>
    </section>


    <div class="container latest">
        <div class="row">
            <div class="last">
                <img src="img/Last.svg" alt="" class="img-fluid">
            </div>
        </div>
    </div>



    <footer style="background-color: #263238; margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo" style="color: white; padding: 20px;">

                        <a href={{ route('webpage') }} {{-- "web.html" --}} style="text-decoration: none;">
                            <h3 style="color: white; "><i>MyDigiDollar</i>
                            </h3>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="privicy" style="color: white;  padding: 20px; font-weight: bold;">
                        <a href={{ route('privacy') }} {{-- "web.html" --}}
                            style="text-decoration: none; color: white; text-decoration-line: underline;">
                            <h6>
                                Privacy Policy
                            </h6>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="about" style="color: white;  padding: 20px; font-weight: bold;">
                        <a href={{ route('about') }} {{-- "about.html" --}}
                            style="text-decoration: none; color: white; text-decoration-line: underline;">
                            <h6>About us</h6>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="contact" style="color: white;  padding: 20px; font-weight: bold;">
                        <a href={{ route('contact') }} {{-- "contact.html" --}}
                            style="text-decoration: none; color: white; text-decoration-line: underline;">
                            <h6>Contact Us</h6>
                        </a>

                    </div>
                </div>

            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <p class="text-center" style="color: white; font-size: 13px;">Copyright © 2024 MyDigidollar.com |
                        Powered by MyDigidollar.com</p>
                </div>
            </div>
        </footer>

    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            autoplay: {
                delay: 1000, // Delay between slides in milliseconds (3 seconds)
                disableOnInteraction: false, // Continue autoplay after interaction
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

</body>

</html>
