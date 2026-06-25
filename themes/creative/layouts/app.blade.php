<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    {!! app(\App\Services\SeoService::class)->render() !!}

    {{-- Styles --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/logo/favicon.svg') }}">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/carouselTicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/spacing.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body>

    @include('creative::partials.nav')

    {{-- Page Content --}}
    <div class="px-blur-bottom"></div>
    <!-- Begin magic cursor -->
    <div id="magic-cursor" class="cursor-black-bg">
        <div id="ball"></div>
    </div>
    <!-- End magic cursor -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main >
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('creative::partials.footer')
        </div>
    </div>
    {{-- Scripts --}}
    <script src="{{ asset('assets/js/vendors/color-modes.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.carouselTicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/parallax.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/ripple-2.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/image-hover-effects.js') }}"></script>
    <script src="{{ asset('assets/js/at-cursor.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
