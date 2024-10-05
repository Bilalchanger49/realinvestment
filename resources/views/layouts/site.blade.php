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
    <link rel="stylesheet" href="assets/css/vendor.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    @livewireStyles
</head>
<body>

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->
<!-- search popup start-->
<div class="body-overlay" id="body-overlay"></div>
<div class="td-search-popup" id="td-search-popup">
    <form action="https://solverwp.com/demo/html/mingrand/index.html" class="search-form">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search.....">
        </div>
        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- search popup end-->

<!-- navbar start -->
<div class="navbar-area navbar-area-2">
    <!-- navbar top start -->
{{--    <div class="navbar-top bg-main">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8 text-lg-left text-center">--}}
{{--                    <ul>--}}
{{--                        <li><p><img src="assets/img/icon/location.png" alt="img"> 420 Love Sreet 133/2 flx City</p></li>--}}
{{--                        <li><p><img src="assets/img/icon/phone.png" alt="img"> +(06) 017 800 628</p></li>--}}
{{--                        <li><p><img src="assets/img/icon/envelope.png" alt="img"> <a--}}
{{--                                    href="https://solverwp.com/cdn-cgi/l/email-protection" class="__cf_email__"--}}
{{--                                    data-cfemail="10797e767f3e737f7e6471736450777d71797c3e737f7d">[email&#160;protected]</a>--}}
{{--                            </p></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <ul class="topbar-right text-lg-right text-center">--}}
{{--                        <li>--}}
{{--                            <a class="ml-0" href="{{route('register')}}">Register</a>--}}
{{--                            <a href="{{route('login')}}">Login</a>--}}
{{--                        </li>--}}
{{--                        <li class="social-area">--}}
{{--                            <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>--}}
{{--                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>--}}
{{--                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>--}}
{{--                            <a href="#"><i class="fab fa-skype" aria-hidden="true"></i></a>--}}
{{--                            <a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- navbar top end -->
    <nav class="navbar navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#dkt_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="index.html"><img src="assets/img/logo.png" alt="img"></a>
            </div>
            <div class="nav-right-part nav-right-part-mobile">
                <a class="btn btn-base" href="add-property.html">Submit</a>
            </div>
            <div class="collapse navbar-collapse" id="dkt_main_menu">
                <ul class="navbar-nav menu-open text-center">
                    <li class="menu-item-has-children current-menu-item">
                        <a href="#">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home 01</a></li>
                            <li><a href="index-2.html">Home 02</a></li>
                            <li><a href="index-3.html">Home 03</a></li>
                            <li><a href="index-4.html">Home 04</a></li>
                            <li><a href="index-5.html">Home 05</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children current-menu-item">
                        <a href="#">Property</a>
                        <ul class="sub-menu">
                            <li><a href="property.html">Property</a></li>
                            <li><a href="property-grid.html">Property Grid</a></li>
                            <li><a href="property-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="property-details.html">Property Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children current-menu-item">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="team.html">Team</a></li>
                            <li><a href="signin.html">Sign In</a></li>
                            <li><a href="signup.html">Sign Up</a></li>
                            <li><a href="add-property.html">Add Property</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children current-menu-item">
                        <a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-grid.html">Blog Grid</a></li>
                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                            <li><a href="blog-details-left-sidebar.html">Details Left Sidebar</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="nav-right-part nav-right-part-desktop collapse navbar-collapse" id="dkt_main_menu">
                <ul class="navbar-nav menu-open text-center">
                    <li><a class="search" href="#"><i class="fa fa-search"></i></a></li>
                    <li class="menu-item-has-children current-menu-item">
                        @if(Auth::User())
                            <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                 class="user-image rounded-circle" alt="User Image"/>
                            <a href="#">{{ Auth::User()->name }}</a>
                            <ul class="sub-menu">
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href=" {{ Auth::user()->name }}">My Profile</a>
                                </li>
                                <li class="dropdown-footer">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @else
                            <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                 class="user-image rounded-circle" alt="User Image"/>
                            <a href="#">Join Us</a>
                            <ul class="sub-menu">
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{route('login')}}">Login</a>
                                </li>
                                <li>
                                    <i class="mdi mdi-account-outline"></i>
                                    <a href="{{route('register')}}">Register</a>
                                </li>

                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- navbar end -->

<div>
    @yield('content')
</div>
<!-- footer start -->
<footer class="footer-area style-two" style="background: url(assets/img/other/1.png);">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget_about">
                        <h4 class="widget-title">Company</h4>
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur et adipisicing
                                eiusmod tempor incididunt labore</p>
                            <p><i class="fas fa-map-marker-alt"></i> 420 Love Sreet 133/2 Mirpur City, Dhaka</p>
                            <p><i class="fas fa-phone-volume"></i> +(066) 19 5017 800 628</p>
                            <p><i class="fas fa-envelope"></i> <a href="https://solverwp.com/cdn-cgi/l/email-protection"
                                                                  class="__cf_email__"
                                                                  data-cfemail="b4dddad2db9ad7dbdac0d5d7c0f4d3d9d5ddd89ad7dbd9">[email&#160;protected]</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget_newsfeed">
                        <h4 class="widget-title">News Feed</h4>
                        <ul>
                            <li><a href="#"><i class="far fa-user"></i>By Admin</a><span><i
                                        class="far fa-calendar-alt"></i>Marce 9 , 2020</span></li>
                            <li><a href="#"><i class="far fa-user"></i>By Admin</a><span><i
                                        class="far fa-calendar-alt"></i>Marce 9 , 2020</span></li>
                            <li><a href="#"><i class="far fa-user"></i>By Admin</a><span><i
                                        class="far fa-calendar-alt"></i>Marce 9 , 2020</span></li>
                            <li><a href="#"><i class="far fa-user"></i>By Admin</a><span><i
                                        class="far fa-calendar-alt"></i>Marce 9 , 2020</span></li>
                            <li><a href="#"><i class="far fa-user"></i>By Admin</a><span><i
                                        class="far fa-calendar-alt"></i>Marce 9 , 2020</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9">
                    <div class="widget widget_subscribe mb-4">
                        <h4 class="widget-title">Newslatter</h4>
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet,</p>
                            <div class="footer-subscribe-inner">
                                <input type="text" placeholder="Your Mail">
                                <a class="btn btn-base" href="#">Subscribe</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-tags pt-2">
                        <h5 class="widget-title mb-3">House Tags</h5>
                        <div class="tagcloud mt-0">
                            <a href="#">Creative</a>
                            <a href="#">Development</a>
                            <a href="#">Beach</a>
                            <a href="#">Villa</a>
                            <a href="#">Clean</a>
                            <a href="#">Seo</a>
                            <a href="#">Appertment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <p>©2022, Copy Right By Solverwp. All Rights Reserved</p>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

<!-- all plugins here -->
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/vendor.js"></script>
<!-- main js  -->
<script src="assets/js/main.js"></script>
@livewireScripts
</body>

<!-- Mirrored from solverwp.com/demo/html/mingrand/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 06:55:24 GMT -->
</html>

