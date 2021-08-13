<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))"/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <link rel="canonical" href=""/>
    <link rel="shortcut icon" href="{{ asset('user/' . $options->theme . '/media/logos/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{ asset('user/' . $options->theme . '/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('user/' . $options->theme . '/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

    @stack('before-styles')

    @stack('after-styles')

    @if (trim($__env->yieldContent('page-styles')))
        @yield('page-styles')
    @endif

</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed">

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        <div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0">
            @include('user.' . $options->theme . '.layouts.aside')
            @include('user.' . $options->theme . '.layouts.aside-footer')
        </div>
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <div id="kt_header" style="" class="header align-items-stretch">

            </div>
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div id="kt_content_container" class="container">
                    @yield('content')
                </div>
            </div>

            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-bold me-1">2021©</span>
                        <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Ayssoft Bilgi Teknolojileri A.Ş.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('before-scripts')

<script src="{{ asset('user/' . $options->theme . '/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('user/' . $options->theme . '/js/scripts.bundle.js') }}"></script>

@stack('after-scripts')

@if (trim($__env->yieldContent('page-script')))
    @yield('page-script')
@endif

</body>
</html>
