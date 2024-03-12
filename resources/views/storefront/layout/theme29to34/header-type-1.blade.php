@if (!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on')
        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="<?php echo $store->cookiebot_group_id; ?>"
            data-blockingmode="auto" type="text/javascript"></script>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="{{ $store->metakeyword }}">

    @if (isset($pageoption))
        <meta name="description" content="{{ $pageoption->meta_description }}">
        <title>{{ $pageoption->meta_title }}</title>
    @else
        <meta name="description" content="{{ $store->metadesc }}">
        <title>@yield('page-title') - {{ $store->tagline ? $store->tagline : config('APP_NAME', ucfirst($store->name)) }}
        </title>
    @endif

    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon"
        href="{{ asset(Storage::url('uploads/logo/') . (!empty($settings->value) ? $settings->value : 'favicon.png')) }}"
        type="image/png">

        @include('storefront.layout.initialize-css')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme29to34/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/theme29to34/css/jquery-ui.css') }}" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link href="{{ asset('assets/theme29to34/css/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Fontawesome all CSS -->
    
    {{-- <link href="assets/css/all.min.css" rel="stylesheet"> --}}
    <!-- Animate CSS -->
    <link href="{{ asset('assets/theme29to34/css/animate.min.css') }}" rel="stylesheet">
    <!-- FancyBox CSS -->
    <link href="{{ asset('assets/theme29to34/css/jquery.fancybox.min.css') }}" rel="stylesheet">

    <!-- Fontawesome CSS -->
    {{-- <link href="assets/css/fontawesome.min.css" rel="stylesheet"> --}}
    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/theme29to34/css/swiper-bundle.min.css') }}">
    <!-- Slick slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/theme29to34/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme29to34/css/slick-theme.css') }}">
    <!-- Magnific-popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/theme29to34/css/magnific-popup.css') }}">
    <!-- BoxIcon  CSS -->
    <link href="{{ asset('assets/theme29to34/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Select2  CSS -->
    <link href="{{ asset('assets/theme29to34/css/nice-select.css') }}" rel="stylesheet">
    <!--  Style CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/theme29to34/css/style.css') }}">
    <!-- External CSS libraries -->

    


    <link rel="stylesheet" href="{{ asset('assets/theme29to34/css/custom.css') }}" type="text/css">

    