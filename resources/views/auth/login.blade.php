<!doctype html>
<html lang="en" class="remember-theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Login | HouseHub</title>

    <meta name="description" content="HouseHub">
    <meta name="author" content="khaled">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="HouseHub">
    <meta property="og:site_name" content="HouseHub">
    <meta property="og:description" content="HouseHub">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">

    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">

    <script src="{{ asset('assets/js/setTheme.js') }}"></script>
</head>

<body>

<div id="page-container">
    <main id="main-container">
        <div class="bg-image" style="background-image: url('{{ asset('assets/media/photos/photo19@2x.jpg') }}');">
            <div class="row g-0 justify-content-center bg-primary-dark-op">
                <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                            <div class="mb-2 text-center">
                                <a class="link-fx fw-bold fs-1" href="{{ url('/') }}">
                                    <span class="text-dark">House</span><span class="text-primary">Hub</span>
                                </a>
                                <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                            </div>

                            <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <div class="input-group input-group-lg">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-lg">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <span class="input-group-text">
                                            <i class="fa fa-asterisk"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember-me" name="remember-me" checked>
                                        <label class="form-check-label" for="remember-me">Remember Me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="fw-semibold fs-sm py-1">
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-hero btn-primary">
                                        <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Sign In
                                    </button>
                                </div>
                            </form>

                            <div class="d-sm-flex justify-content-sm-end align-items-sm-center text-center text-sm-start mb-4">
                                <div class="fs-sm py-1">
                                    Don't have an account?
                                    <a class="fw-semibold" href="{{ route('register') }}">Sign Up</a>
                                </div>
                            </div>
                        </div>

                        <div class="block-content bg-body">
                            <div class="d-flex justify-content-center text-center push">
                                <a class="item item-circle item-tiny me-1 bg-default" data-toggle="theme"
                                   data-theme="default" href="#"></a>
                                <a class="item item-circle item-tiny me-1 bg-xwork" data-toggle="theme"
                                   data-theme="assets/css/themes/xwork.min.css" href="#"></a>
                                <a class="item item-circle item-tiny me-1 bg-xmodern" data-toggle="theme"
                                   data-theme="assets/css/themes/xmodern.min.css" href="#"></a>
                                <a class="item item-circle item-tiny me-1 bg-xeco" data-toggle="theme"
                                   data-theme="assets/css/themes/xeco.min.css" href="#"></a>
                                <a class="item item-circle item-tiny me-1 bg-xsmooth" data-toggle="theme"
                                   data-theme="assets/css/themes/xsmooth.min.css" href="#"></a>
                                <a class="item item-circle item-tiny me-1 bg-xinspire" data-toggle="theme"
                                   data-theme="assets/css/themes/xinspire.min.css" href="#"></a>
                                <a class="item item-circle item-tiny me-1 bg-xdream" data-toggle="theme"
                                   data-theme="assets/css/themes/xdream.min.css" href="#"></a>
                                <a class="item item-circle item-tiny me-1 bg-xpro" data-toggle="theme"
                                   data-theme="assets/css/themes/xpro.min.css" href="#"></a>
                                <a class="item item-circle item-tiny bg-xplay" data-toggle="theme"
                                   data-theme="assets/css/themes/xplay.min.css" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>

</body>
</html>
