<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ __('user/login.title') }}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />

    <link rel="shortcut icon" href="{{ asset('user/' . theme() . '/assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('user/' . theme() . '/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/' . theme() . '/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    @if (trim($__env->yieldContent('page-styles')))
        @yield('page-styles')
    @endif

</head>
<body id="kt_body" class="bg-body">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('user/' . theme() . '/media/illustrations/development-hd.png') }})">
        @yield('content')
    </div>
</div>
<script src="{{ asset('user/' . theme() . '/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('user/' . theme() . '/js/scripts.bundle.js') }}"></script>

@if (trim($__env->yieldContent('page-script')))
    @yield('page-script')
@endif

</body>
</html>
