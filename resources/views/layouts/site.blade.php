<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from solverwp.com/demo/html/mingrand/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 06:54:30 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Investment</title>

    <!-- Stylesheet -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="{{ asset('assets/img/favicon-32x32.png') }}" rel="shortcut icon" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <style>
        .custom-alert {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            border-radius: 10px;
            padding: 30px 20px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            z-index: 1050;
            text-align: center;
        }

        .custom-alert .icon {
            width: 60px;
            height: 60px;
            margin: -60px auto 10px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white;
        }

        .custom-alert .btn {
            margin-top: 5px;
            width: 100px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .alert-success-box .icon {
            background-color: #8BC34A;
        }

        .alert-success-box .btn {
            background-color: #8BC34A;
            color: white;
        }

        .alert-error-box .icon {
            background-color: #F44336;
        }

        .alert-error-box .btn {
            background-color: #F44336;
            color: white;
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
    <div class="custom-alert alert-success-box">
        <div class="icon">
            &#10004;
        </div>
        <h3>Awesome!</h3>
        <p>{{ session('success') }}</p>
        <button class="btn" onclick="this.parentElement.style.display='none'">OK</button>
    </div>
    @endif

    @if (session('error'))
    <div class="custom-alert alert-error-box">
        <div class="icon">
            &#10006;
        </div>
        <h3>Sorry!</h3>
        <p>{{ session('error') }}</p>
        <button class="btn" onclick="this.parentElement.style.display='none'">OK</button>
    </div>
    @endif
    <!-- navbar start -->
    <div class="navbar-area navbar-area-2">

        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">

                <div class="responsive-mobile-menu">
                    @auth
                    <div style="margin-left: -1em; margin-top: -0.2em">
                        @livewire('site.notification.notification-component')
                    </div>
                    @endauth
                    <button class="menu toggle-btn d-block d-lg-none me-3" data-target="#dkt_main_menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="logo">
                    <a href="index.html"><img src="{{asset('assets/img/logo-black.png')}}" style="height: 50px;"
                            alt="img"></a>
                </div>

                <div class="nav-right-part nav-right-part-desktop collapse navbar-collapse" id="dkt_main_menu">
                    <ul class="navbar-nav menu-open text-center">
                        <li class="menu-item">
                            <a href="{{route('site.home')}}">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('site.property.all')}}">Property</a>
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
                        <li class="menu-item">
                            <a href="{{route('site.blogs')}}">Blogs</a>
                        </li>
                    </ul>
                </div>


                <div class="nav-right-part nav-right-part-desktop collapse navbar-collapse" id="dkt_main_menu">
                    <ul class="navbar-nav menu-open text-center">
                        <!-- Dropdown for Larger Screens -->
                        @if(Auth::User())
                        <li class="menu-item-has-children current-menu-item d-none d-lg-block" style="width: 180px;">
                            <div class="user-info-wrapper d-flex align-items-center">
                                @if(Auth::User()->profile_photo_path)
                                <img src="{{asset('storage/'. Auth::User()->profile_photo_path)}}"
                                    class="user-image rounded-circle" alt="" />
                                @else
                                <img src="{{asset('assets/img/agent/default user.jpeg')}}"
                                    class="user-image rounded-circle" alt="" />
                                @endif

                                <a href="#" class="user-name" title="{{ Auth::user()->name }}">
                                    {{ Str::limit(Auth::user()->name, 15) }}
                                </a>
                            </div>
                            <ul class="sub-menu">
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{route('profile.show')}}">My Profile</a>
                                </li>
                                @if(auth()->user()->hasrole('admin'))
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                @endif
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{route('site.blogs.manager')}}">Blogs Manager</a>
                                </li>
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href=" {{ route('site.investor.page', [$activeTab = 'active-investments']) }}">Investor
                                        Details</a>
                                </li>
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- Simple Buttons for Smaller Screens -->
                        <li class="mobile-user-menu d-lg-none text-center "style="display: flex; flex-direction: column; align-items: center; ">
                            <a href="{{route('profile.show')}}" class="mobile-btn-profile">Profile</a>
                            <a href="{{ route('site.investor.page', [$activeTab = 'active-investments']) }}" class="mobile-btn-details">Details</a>
                            <a href="{{ route('logout') }}" class="mobile-btn-logout"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li class="menu-item-has-children current-menu-item d-none d-lg-block">

                            <img src="assets/img/agent/default user.jpeg" class="user-image rounded-circle"
                                style="height: 40px;" alt="" />

                            <a href="#">Login</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                            </ul>
                        </li>
                        <!-- Simple Buttons for Smaller Screens -->
                        <li class="menu-item d-lg-none text-center">
                            <div class="d-flex justify-content-center gap-2 px-3">
                                <a href="{{ route('login') }}" class="btn btn-login flex-fill">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-register flex-fill">Register</a>
                            </div>
                        </li>
                        @endif

                    </ul>
                </div>

                    <!-- notifications  -->
                    {{-- @auth
                    @livewire('site.notification.notification-component')
                    @endauth --}}
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
                                <p><i class="fas fa-envelope"></i> <a
                                        href="mailto:support@realinvestment.com">support@realinvestment.com</a>
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
                                <p>Stay updated with the latest investment opportunities and property listings.</p>
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

    setTimeout(() => {
        document.querySelectorAll('.custom-alert').forEach(el => el.style.display = 'none');
    }, 5000); // 5 seconds

    </script>

    <!-- all plugins here -->
    <script src="https://js.stripe.com/v3/"></script>
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets/js/vendor.js')}}"></script>

    <!-- main js  -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
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

    <script>
        function previewImage(event, previewId) {
        let file = event.target.files[0];
        let reader = new FileReader();

        reader.onload = function () {
            document.getElementById(previewId).src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    </script>
    @livewireScripts
</body>

</html>
