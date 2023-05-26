<?php
use App\Helper\Helper;
?>
<!doctype html>
<html lang="en">
<head>
<title>{{ Config::get('app.name'); }} | @yield('title') </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="{{ Config::get('app.name'); }}">
<meta name="author" content="{{ Config::get('app.name'); }}">
<link rel="icon" href="{{ asset('assets/images/logo-icon-light.svg') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/charts-c3/plugin.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/simply-notify/simple-notify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">
</head>
<body class="theme-purple">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('assets/images/logo-icon-light.svg') }}" width="48" height="48" alt="{{ Config::get('app.name'); }}"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-left">
                <a href="javascript:void(0);" class="icon-menu btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
            </div>

            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <input value="" class="form-control" placeholder="Search here..." type="text">
                    <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                </form>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-bell"></i>
                                <span class="notification-dot"></span>
                            </a>
                            <ul class="dropdown-menu feeds_widget">
                                <li class="header">You have 5 new Notifications</li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-thumbs-o-up text-success"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-success">7 New Feedback <small class="float-right text-muted">Today</small></h4>
                                            <small>It will give a smart finishing to your site</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-user"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title">New User <small class="float-right text-muted">10:45</small></h4>
                                            <small>I feel great! Thanks team</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-question-circle text-warning"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-warning">Server Warning <small class="float-right text-muted">10:50</small></h4>
                                            <small>Your connection is not private</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-check text-danger"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">11:05</small></h4>
                                            <small>WE have fix all Design bug with Responsive</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-shopping-basket"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title">7 New Orders <small class="float-right text-muted">11:35</small></h4>
                                            <small>You received a new oder from Tina.</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ url('logout') }}" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="index.html"><img src="{{ asset('assets/images/logo-icon-dark.svg') }}" alt="{{ Config::get('app.name'); }} Logo" class="img-fluid logo"><span>{{ Config::get('app.name'); }}</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Helper::user()->name }}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('logout') }}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="{{ request()->is('/')  == 1 ? "active" : "" }}"><a href="{{ url('/') }}"><i class="icon-home"></i><span>Dashboard</span></a></li>
                    <li class="{{ request()->is('product/*') == 1  ? "active" : "" }}">
                        <a href="#" class="has-arrow" aria-expanded="{{ request()->is('product/*') == 1 ? "true" : "" }}">
                            <i class="icon-tag"></i>
                            <span>Product</span>
                        </a>
                        <ul aria-expanded="{{ request()->is('product/*') == 1  ? "true" : "" }}" class="collapse {{ request()->is('product/*') == 1 ? "in" : "" }}">
                            <li class="{{ (request()->is('product/color') == 1 || request()->is('product/color/*') == 1)  ? "active" : "" }}"><a href="{{ url('product/color') }}">Colors</a></li>
                            <li class="{{ (request()->is('product/size') == 1 || request()->is('product/size/*') == 1)  ? "active" : "" }}"><a href="{{ url('product/size') }}">Sizes</a></li>
                            <li class="{{ (request()->is('product/') == 1 || request()->is('product/*') == 1)  ? "active" : "" }}"><a href="{{ url('product') }}">Products</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('purchase/*') == 1  ? "active" : "" }}">
                        <a href="#" class="has-arrow" aria-expanded="{{ request()->is('purchase/*') == 1 ? "true" : "" }}">
                            <i class="icon-bag"></i>
                            <span>purchase</span>
                        </a>
                        <ul aria-expanded="{{ request()->is('purchase/*') == 1  ? "true" : "" }}" class="collapse {{ request()->is('purchase/*') == 1 ? "in" : "" }}">
                            <li class="{{ (request()->is('purchase/vendor') == 1 || request()->is('purchase/vendor/*') == 1)  ? "active" : "" }}"><a href="{{ url('purchase/vendor') }}">Vendor</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    @yield('content')

    <input type="hidden" id="success" value="{{ session('success') }}">
    <input type="hidden" id="warning" value="{{ session('warning') }}">
    <input type="hidden" id="error" value="{{ session('error') }}">
    <input type="hidden" id="url" value="{{ url('/') }}">
</div>

<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/chartist.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
<script src="{{ asset('assets/vendor/simply-notify/simple-notify.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
</body>
</html>
