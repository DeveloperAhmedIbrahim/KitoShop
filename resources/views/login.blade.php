
<!doctype html>
<html lang="en">

<head>
<title>{{ Config::get('app.name') }} | Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="{{ Config::get('app.name') }}">
<meta name="author" content="{{ Config::get('app.name') }}">
<link rel="icon" href="{{ asset('assets/images/logo-icon-light.svg') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">
</head>

<body class="theme-purple">
    <!-- WRAPPER -->
    <div id="wrapper" class="auth-main">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-7">
                    <div class="auth_detail">
                        <h2 class="text-monospace">
                            Everything<br> you need to run your business.
                        </h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="body">
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @elseif (Session::has('warning'))
                            <div class="alert alert-warning" role="alert">{{ session('warning') }}</div>
                            @elseif (Session::has('error'))
                            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                            @else
                            <div class="alert" role="alert"></div>
                            @endif
                            <form class="form-auth-small" action="{{ url('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="signin-email" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password" value="{{ old('password') }}" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock">&nbsp;&nbsp; </i><a href="page-forgot-password.html">Forgot password?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
</body>
</html>
