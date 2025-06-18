<!doctype html>
<html lang="en" class="remember-theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@yield('title', 'HouseHub')</title>

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
        @yield('content')
    </main>
</div>

<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>

</body>
</html>
