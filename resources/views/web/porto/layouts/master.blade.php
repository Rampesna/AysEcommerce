<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title'){{ config('app.name') }}</title>

    <meta name="keywords" content="" />
    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('customer/porto/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('customer/porto/img/apple-touch-icon.png') }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('customer/porto/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/porto/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/porto/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/porto/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/porto/css/theme-shop.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/porto/css/demos/demo-shop-6.css') }}">

    @if (trim($__env->yieldContent('page-styles')))
        @yield('page-styles')
    @endif

</head>
<body>

<div class="body">
    <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 147, 'stickySetTop': '-147px', 'stickyChangeLogo': false}">
        <div class="header-body">
            @include('web.porto.layouts.header-top')
            @include('web.porto.layouts.header')
            @include('web.porto.layouts.navbar')
        </div>
    </header>
    @include('web.porto.layouts.mobile-nav')
    <div role="main" class="main">
        @yield('content')
    </div>
    @include('web.porto.layouts.footer')
</div>

<script src="{{ asset('customer/porto/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('customer/porto/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

@if (trim($__env->yieldContent('page-script')))
    @yield('page-script')
@endif

</body>
</html>
