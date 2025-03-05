<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from solverwp.com/demo/html/mingrand/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 06:54:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mindgrand - Real Estate HTML Template</title>

    <!-- Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <style>
        .floating-alert {
            position: fixed;
            top: 15%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            width: 100%;
            max-width: 80%;
            display: none;
        }

    </style>
    @livewireStyles
</head>
<body class="body-bg">

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>

<!-- Flash Messages -->
@if (session('success'))
    <div class="floating-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="floating-alert">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<!-- navbar start -->
<div class="navbar-area navbar-area-2">

    <nav class="navbar navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#dkt_main_menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="index.html"><img src="{{asset('assets/img/logo-black.png')}}" style="height: 50px;" alt="img"></a>
            </div>

            <div class="nav-right-part nav-right-part-desktop collapse navbar-collapse" id="dkt_main_menu">
                <ul class="navbar-nav menu-open text-center">
                    <li class="menu-item">
                        <a href="{{route('site.home')}}">Home</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{route('site.property.all')}}">Property</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('site.property.all')}}">Main Market</a></li>
                            <li><a href="{{route('site.secondary.market')}}">Secondary Market</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('site.about')}}">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('site.contact')}}">Contact</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('site.faq')}}">FAQ</a>
                    </li>
                </ul>
            </div>

            <div class="nav-right-part nav-right-part-desktop collapse navbar-collapse" id="dkt_main_menu">
                <ul class="navbar-nav menu-open text-center">
                    <!-- Dropdown for Larger Screens -->
                    @if(Auth::User())
                        <li class="menu-item-has-children current-menu-item d-none d-lg-block" style=" width: 125px;">

                            {{--                            <img src="assets/img/agent/3.png" class="user-image rounded-circle" style="height: 40px;"--}}
                            {{--                                 alt=""/>--}}
                            @if(Auth::User()->profile_photo_path)
                                <img src="{{asset('storage/'. Auth::User()->profile_photo_path)}}"
                                     class="user-image rounded-circle" style="height: 40px;"
                                     alt=""/>
                            @else
                                <img src="assets/img/agent/default user.jpeg" class="user-image rounded-circle"
                                     style="height: 40px;"
                                     alt=""/>
                            @endif

                            <a href="#">{{ Auth::User()->name }}</a>
                            <ul class="sub-menu">
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{route('profile.show')}}">My Profile</a>
                                </li>
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href=" {{ route('site.investor.page') }}">Investor Details</a>
                                </li>
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- Simple Buttons for Smaller Screens -->
                        <li class="menu-item d-lg-none text-center">
                            <a href="{{ Auth::user()->name }}" class="btn btn-login">Profile</a>
                            <a href=" {{ route('site.investor.page') }}" class="btn btn-login">Details</a>
                            <a href="{{ route('logout') }}" class="btn btn-register"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit(); ">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="menu-item-has-children current-menu-item d-none d-lg-block">

                            <img src="assets/img/agent/default user.jpeg" class="user-image rounded-circle"
                                 style="height: 40px;"
                                 alt=""/>

                            <a href="#">Login</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                            </ul>
                        </li>
                        <!-- Simple Buttons for Smaller Screens -->
                        <li class="menu-item d-lg-none text-center">
                            <a href="{{route('login')}}" class="btn btn-login">Login</a>
                            <a href="{{route('register')}}" class="btn btn-register">Register</a>
                        </li>
                    @endif

                    <!-- Simple Buttons for Smaller Screens -->
                    {{--                    <li class="menu-item d-lg-none text-center">--}}
                    {{--                        <a href="{{route('login')}}" class="btn btn-login">Login</a>--}}
                    {{--                        <a href="{{route('register')}}" class="btn btn-register">Register</a>--}}
                    {{--                    </li>--}}

                </ul>

                <!-- notifications  -->
                <div class="notification-container">
                    <div class="notification-icon">
                        <i class="fa fa-bell"></i> <!-- Font Awesome Bell Icon -->
                        <div class="notification-indicator">

                            <div class="notification-count"
                                 role="status">{{auth()->user()->unreadNotifications->count()}}</div>
                        </div>
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="notification-dropdown">

                        <ul>
                            @foreach(auth()->user()->notifications as $notification)
                                <li><a>
                                        <p>{{ $notification->data['message'] }}</p>
                                        {{--                                    <small>Bid Amount: {{ $notification->data['bid_amount'] }}</small>--}}
                                        <small>Status: {{ $notification->data['status'] }}</small>
                                    </a>
                                </li>
                            @endforeach

                            {{--                            <li><a href="#">Message 1</a></li>--}}
                            {{--                            <li><a href="#">Message 2</a></li>--}}
                            {{--                            <li><a href="#">Message 3</a></li>--}}
                        </ul>
                    </div>
                </div>


    </nav>
</div>

<!-- navbar end -->


<div>
    @yield('content')
</div>
<!-- footer area start -->
<footer class="footer-area style-two" style="background: url(assets/img/other/1.png);">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <!-- Company Info Column -->
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget_about">
                        <h4 class="widget-title">Company</h4>
                        <div class="details">
                            <p>Real Investment is a platform that empowers small investors by providing digital
                                fractional ownership opportunities in real estate. With tokenization, we make real
                                estate investments accessible to everyone.</p>
                            <p><i class="fas fa-map-marker-alt"></i> 420 Real Estate Street, I-14/4, Islamabad,
                                Pakistan</p>
                            <p><i class="fas fa-phone-volume"></i> +92 349 5101379</p>
                            <p><i class="fas fa-envelope"></i> <a href="mailto:support@realinvestment.com">support@realinvestment.com</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="widget widget_nav_menu mt-1 text-center">
                        <h4 class="widget-title">Quick Links</h4>
                        <ul class="list-unstyled" style="color: rgba(255, 255, 255, 0.8);">
                            <li>
                                <a href="{{route('site.home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('site.property.all')}}">Property</a>
                            </li>
                            <li>
                                <a href="{{route('site.about')}}">About</a>
                            </li>
                            <li>
                                <a href="{{route('site.contact')}}">Contact</a>
                            </li>
                            <li>
                                <a href="{{route('site.faq')}}">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- Newsletter Column -->
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget_subscribe mb-4">
                        <h4 class="widget-title">Newsletter</h4>
                        <div class="details">
                            <p>Stay updated with the latest investment opportunities and property listings. Subscribe to
                                our newsletter today!</p>
                            <div class="footer-subscribe-inner">
                                <input type="text" placeholder="Enter your email">
                                <a class="btn btn-base" href="#">Subscribe</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>©2024, REAL INVESTMENT</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer area end-->


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const bellIcon = document.querySelector('.notification-icon');
        const dropdownMenu = document.querySelector('.notification-dropdown');

        // Toggle the visibility of the dropdown when clicking the bell icon
        bellIcon.addEventListener('click', function () {
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        // Close the dropdown if clicked outside
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.notification-container')) {
                dropdownMenu.style.display = 'none'; // Hide the dropdown if clicked outside
            }
        });
    });

</script>

<!-- all plugins here -->
<script src="https://js.stripe.com/v3/"></script>
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('assets/js/vendor.js')}}"></script>

<!-- main js  -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script>
    function signaturePad() {
        return {
            signaturePad: null,

            init() {
                let canvas = this.$refs.signature_canvas;
                let input = this.$refs.signature_input;

                canvas.width = 400;
                canvas.height = 200;

                let ctx = canvas.getContext("2d");
                ctx.fillStyle = "#ffffff";
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                this.signaturePad = new SignaturePad(canvas, {
                    backgroundColor: "rgba(255, 255, 255, 0)"
                });

                // Update hidden input value and force Livewire update
                this.signaturePad.onEnd = () => {
                    let signatureData = this.signaturePad.toDataURL("image/png");
                    input.value = signatureData;
                    input.dispatchEvent(new Event('change'));
                    console.log("Captured Signature:", signatureData); // Debugging
                };
            }
        };
    }

</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const flashMessage = document.querySelector('.floating-alert');
        if (flashMessage) {
            flashMessage.style.display = 'block';
            setTimeout(() => {
                flashMessage.classList.add('fade');
                flashMessage.style.opacity = 0;
                setTimeout(() => flashMessage.remove(), 500); // Remove from DOM after fade-out
            }, 5000); // 5 seconds
        }
    });
</script>
@livewireScripts
</body>
</html>

