<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/auth/plugins/simplebar/simplebar.css') }}" rel="stylesheet"/>
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/auth/plugins/prism/prism.css') }}" rel="stylesheet"/>
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}"/>
    <!-- FAVICON -->
    <link href="{{ asset('assets/img/favicon-32x32.png') }}" rel="shortcut icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    @yield('css')

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![cK editor]-->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <![endif]-->
    <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js') }}"></script>
    @livewireStyles
</head>
<body class="navbar-fixed sidebar-fixed" id="body">
<script>
    NProgress.configure({
        showSpinner: false
    });
    NProgress.start();
</script>

<!-- ====================================
——— WRAPPER
===================================== -->
<div class="wrapper">

    <!-- ====================================
        ——— LEFT SIDEBAR WITH OUT FOOTER
      ===================================== -->
    <aside class="left-sidebar sidebar-dark" id="left-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
                <a href="/">
                    <img src="{{ asset('assets/img/logo-black.png') }}" alt="Mono">
                    {{--                    <span class="brand-name">MONO</span>--}}
                </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <li class="{{ request()->routeIs('dashboard') ? 'active': '' }}">
                        <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                            <i class="mdi mdi-briefcase-account-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="section-title"> Apps</li>
                    @can('property.view')
                        <li class="has-sub {{ request()->routeIs('admin.property.*') ? 'active': '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                               data-target="#property-menu" aria-expanded="false" aria-controls="playlist-menu">
                                <i class="mdi mdi-folder-outline"></i>
                                <span class="nav-text">Property</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="property-menu" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('admin.property.index')}}">
                                            <span class="nav-text">index</span>
                                        </a>
                                    </li>
                                    @can('property.create')
                                        <li>
                                            <a class="sidenav-item-link" href="{{route('admin.property.create')}}">
                                                <span class="nav-text">create</span>
                                            </a>
                                        </li>
                                    @endcan
                                </div>
                            </ul>
                        </li>
                    @endcan
                    @can('property.return.distribution')
                        <li class="{{ request()->routeIs('admin.distribute.returns') ? 'active': '' }}">
                            <a class="sidenav-item-link" href="{{route('admin.distribute.returns')}}">
                                <i class="mdi mdi-account-group"></i>
                                <span class="nav-text">Distribution</span>
                            </a>
                        </li>
                    @endcan
                    @can('profile.verification.view')
                        <li class="{{ request()->routeIs('admin.profile.verification') ? 'active': '' }}">
                            <a class="sidenav-item-link" href="{{route('admin.profile.verification')}}">
                                <i class="mdi mdi-account-group"></i>
                                <span class="nav-text">Profile Verification</span>
                            </a>
                        </li>
                    @endcan
                    @can('investments.view')
                        <li class="{{ request()->routeIs('admin.all.investments') ? 'active': '' }}" >
                            <a class="sidenav-item-link" href="{{route('admin.all.investments')}}">
                                <i class="mdi mdi-bank-transfer-in"></i>
                                <span class="nav-text">Investments</span>
                            </a>
                        </li>
                    @endcan
                    @can('auctions.view')
                        <li class="{{ request()->routeIs('admin.all.auctions') ? 'active': '' }}" >
                            <a class="sidenav-item-link" href="{{route('admin.all.auctions')}}">
                                <i class="mdi mdi-coins"></i>
                                <span class="nav-text">Auctions</span>
                            </a>
                        </li>
                    @endcan
                    @can('advertisements.view')
                        <li class="{{ request()->routeIs('admin.all.advertisements') ? 'active': '' }}" >
                            <a class="sidenav-item-link" href="{{route('admin.all.advertisements')}}">
                                <i class="mdi mdi-square-inc"></i>
                                <span class="nav-text">Advertisements</span>
                            </a>
                        </li>
                    @endcan
                    @can('bids.view')
                        <li class="{{ request()->routeIs('admin.all.bids') ? 'active': '' }}" >
                            <a class="sidenav-item-link" href="{{route('admin.all.bids')}}">
                                <i class="mdi mdi-coins"></i>
                                <span class="nav-text">Bids</span>
                            </a>
                        </li>
                    @endcan
                    @can('transactions.view')
                        <li class="{{ request()->routeIs('admin.all.transactions') ? 'active': '' }}" >
                            <a class="sidenav-item-link" href="{{route('admin.all.transactions')}}">
                                <i class="mdi mdi-bank-transfer"></i>
                                <span class="nav-text">Transactions</span>
                            </a>
                        </li>
                    @endcan
                    <li class="{{ request()->routeIs('admin.messages') ? 'active': '' }}" >
                            <a class="sidenav-item-link" href="{{route('admin.messages')}}">
                                <i class="mdi mdi-bank-transfer"></i>
                                <span class="nav-text">Messages</span>
                            </a>
                        </li>
                    @can('user.view')
                        <li class="has-sub {{ request()->routeIs('open.users') ? 'active': '' }}">
                            <a class="sidenav-item-link" href="{{route('open.users')}}">
                                <i class="mdi mdi-account"></i>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>
                    @endcan
                    @can('permission.view')
                        <li class="has-sub {{ request()->routeIs('open.permission') ? 'active': '' }}">
                            <a class="sidenav-item-link" href="{{route('open.permission')}}">
                                <i class="mdi mdi-folder-lock-open"></i>
                                <span class="nav-text">Permissions</span>
                            </a>
                        </li>
                    @endcan
                    @can('role.view')
                        <li class="has-sub {{ request()->routeIs('open.roles') ? 'active': '' }}">
                            <a class="sidenav-item-link" href="{{route('open.roles')}}">
                                <i class="mdi mdi-folder-outline"></i>
                                <span class="nav-text">Roles</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </aside>
    <!-- ====================================
    ——— PAGE WRAPPER
    ===================================== -->
    <div class="page-wrapper">
        <!-- Header -->
        <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                <!-- Sidebar toggle button -->
                <button id="sidebar-toggler" class="sidebar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <span class="page-title"></span>
                <div class="navbar-right ">
                    <!-- search form -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown user-menu">
                            <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                     class="user-image rounded-circle" alt="User Image"/>
                                <span class="d-none d-lg-inline-block">{{ Auth::User()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                {{-- <li>
                                    <a class="dropdown-link-item" href=" {{ Auth::user()->name }}">
                                        <i class="mdi mdi-account-outline"></i>
                                        <span class="nav-text">My Profile</span>
                                    </a>
                                </li> --}}

                                <li >
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                    {{--                                    <a class="dropdown-link-item" href="{{ route('logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>--}}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->

        @yield('content')

        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="copyright bg-white">
                <p> &copy; <span id="copy-year"></span> Copyright by <a class="text-primary" href="http://pakcr.org"
                                                                        target="_blank">{{ config('app.name') }}</a>.
                </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
        </footer>
    </div>
</div>
<!-- Card Offcanvas -->
<script src="{{ asset('assets/auth/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/auth/plugins/simplebar/simplebar.min.js') }}"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
<script src="{{ asset('assets/auth/plugins/prism/prism.js') }}"></script>

@yield('script')

<script>
    $(document).ready(function () {
        $('#logout').click(function (e) {
            e.preventDefault();

            $('#logout_form').submit();
        })
    });
</script>


<script src="{{ asset('assets/auth/js/mono.js') }}"></script>
<script src="{{ asset('assets/auth/js/chart.js') }}"></script>
<script src="{{ asset('assets/auth/js/map.js') }}"></script>
<script src="{{ asset('assets/auth/js/custom.js') }}"></script>
<script src="{{ asset('assets/auth/plugins/apexcharts/apexcharts.js') }}"></script>
@livewireScripts
</body>
</html>
