<!DOCTYPE html>
<html lang="en" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">
@php
    //$full_page -  for specific conditions, such as having navigation or not
    if (!isset($full_page)) {
        $full_page = false;
    }
    $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
    $settings = \DB::table('settings')
        ->where('name', 'company_favicon')
        ->where('created_by', $store->id)
        ->first();

    $creator = \App\Models\User::find($store->created_by);
    $plan = \App\Models\Plan::find($creator->plan);
    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);

@endphp

<head>
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

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme23to28/css/leaflet.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/theme23to28/css/map.css') }}" type="text/css">

    {{-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css"> --}}
    {{-- <link type="text/css" rel="stylesheet" href="fonts/bootstrap-icons/bootstrap-icons.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme23to28/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/lightbox.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="css/jnoty.css"> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/slick.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/theme23to28/css/initial.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/theme23to28/css/style.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" id="style_sheet"
        href="{{ asset('assets/theme23to28/css/skins/midnight-blue.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/theme23to28/css/custom.css') }}" type="text/css">



    <!-- Google fonts -->
    {{-- <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=OSans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700"> --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700"> --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"> --}}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/theme23to28/css/ie10-viewport-bug-workaround.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('assets/theme23to28/js/ie-emulation-modes-warning.js') }}"></script>

</head>

<body>
    <div class="page_loader"></div>
    @php
        if (!empty(session()->get('lang'))) {
            $currantLang = session()->get('lang');
        } else {
            $currantLang = $store->lang;
        }
        $languages = \App\Models\Utility::languages($store->slug);
    @endphp





    @if (!$full_page)
        <!-- Top header start -->
        <header class="top-header" id="top-header-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-7">
                        @if ($storethemesetting['enable_top_bar'] == 'on')
                            <div class="list-inline">
                                <a href="#">
                                    <i class="fas fa-info"></i>
                                    {{ !empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199' }}
                                </a>
                                <a href="tel:{{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}"
                                    class="d-none-768">
                                    <i class="fa fa-phone"></i>
                                    {{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <!-- Top header end -->


        <!-- Main header start -->
        <header class="main-header sticky-header header-with-top" id="main-header-4">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="header-left">
                    <a class="navbar-brand logos" href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo_dark))
                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                alt="Image placeholder">
                        @else
                            <img class="" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="Image placeholder">
                        @endif
                    </a>
                </div>
                <div class="d-flex align-items-end d-md-none ">
                    @if (Utility::CustomerAuthCheck($store->slug) == true)
                        <a href="{{ route('store.wishlist', $store->slug) }}" class="pe-3">
                            <i class="far fa-heart fa-lg position-relative" style="top: -3px;">
                                <span
                                    class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                    style="font-family: sans-serif;font-size: 10px;"
                                    id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                            </i>
                        </a>
                    @endif
                    <a href="{{ route('store.cart', $store->slug) }}" class="pe-3">
                        <i class="fas fa-shopping-cart fa-lg position-relative" style="top: -3px;">
                            <span
                                class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-family: sans-serif;font-size: 10px;"
                                id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>

                        </i>
                    </a>
                    <button class="navbar-toggler" type="button" id="drawer">
                        <span class="fa fa-bars"></span>
                    </button>

                </div>

                {{-- <button class="navbar-toggler" id="drawer" type="button">
                <span class="fa fa-bars"></span>
            </button> --}}
                <div class="header-centar">
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="navbar-nav">

                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link"
                                    href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                            </li> --}}
                            @php
                                if (!isset($storethemesetting['primary_nav_menu'])) {
                                    $storethemesetting['primary_nav_menu'] = Utility::defaultMenu($storethemesetting, $store, $plan);
                                }
                            @endphp

                            @if ($storethemesetting['primary_nav_menu'])
                                @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                                    @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="{{ $info['link_url'] }}">
                                                {{ $info['link_name'] }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif

                            @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('More') }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a class="dropdown-item" href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif

                            @if (Utility::CustomerAuthCheck($store->slug) == true)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ ucFirst(Auth::guard('customers')->user()->name) }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('store.slug', $store->slug) }}">
                                                {{ __('My Dashboard') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}">

                                                {{ __('My Profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('customer.home', $store->slug) }}" class="nav-link">

                                                {{ __('My Orders') }}
                                            </a>
                                        </li>
                                        <li>
                                            @if (Utility::CustomerAuthCheck($store->slug) == false)
                                                <a class="dropdown-item"
                                                    href="{{ route('customer.login', $store->slug) }}"
                                                    class="nav-link">
                                                    {{ __('Sign in') }}
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="#"
                                                    onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                    class="nav-link">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="customer-frm-logout"
                                                    action="{{ route('customer.logout', $store->slug) }}"
                                                    method="POST" class="d-none">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            @endif

                           
                            @if (Utility::CustomerAuthCheck($store->slug) != true)
                                <li class="nav-item dropdown">
                                    <a class="nav-link h-icon" href="{{ route('customer.login', [$store->slug]) }}">
                                        
                                        {{ __('Log in') }}
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link h-icon" href="{{ route('store.usercreate', [$store->slug]) }}">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif

                    



                            @if (Utility::CustomerAuthCheck($store->slug) == true)
                                <li>
                                    <a href="{{ route('store.wishlist', $store->slug) }}" class="nav-link h-icon">
                                        <i class="far fa-heart fa-lg position-relative">
                                            <span
                                                class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                                style="font-family: sans-serif;font-size: 10px;"
                                                id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                        </i>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('store.cart', $store->slug) }}" class="nav-link h-icon">
                                    <i class="fas fa-shopping-cart fa-lg position-relative">
                                        <span
                                            class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            style="font-family: sans-serif;font-size: 10px;"
                                            id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>
                                    </i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                @if ($storethemesetting['enable_sidebar_panel'] == 'on')
                    <div class="header-right">
                        <div class="contact-now">
                            <div class="left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="right">
                                <h5>{{ __('Contact Us') }}</h5>
                                <h4><a
                                        href="tel:{{ $storethemesetting['contact_info_phone_no'] }}">{{ $storethemesetting['contact_info_phone_no'] }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endif
            </nav>
        </header>
        <!-- Main header end -->

        <!-- Sidenav start -->
        <nav id="sidebar" class="nav-sidebar">
            <!-- Close btn-->
            <div id="dismiss">
                <i class="fas fa-times"></i>
            </div>
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    @if (!empty($store->logo_dark))
                        <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                            alt="Image placeholder">
                    @else
                        <img class="logo1 img-fluid" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                            alt="Image placeholder">
                    @endif
                </div>
                <div class="sidebar-navigation">
                    <h3 class="heading">{{ __('View') }}</h3>
                    <ul class="menu-list">

                        @if ($storethemesetting['primary_nav_menu'])
                            @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                                @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                    <li>
                                        <a class="nav-link" href="{{ $info['link_url'] }}">
                                            {{ $info['link_name'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif

                        @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                            <li>
                                <a class="pt0" href="#">
                                    {{ __('More') }}
                                    <em class="fas fa-chevron-down"></em>
                                </a>
                                <ul>
                                    @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <li>
                                                <a class="dropdown-item" href="{{ $info['link_url'] }}">
                                                    {{ $info['link_name'] }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif


                        @if (Utility::CustomerAuthCheck($store->slug) == true)
                            <li>
                                <a class="pt0" href="#">
                                    {{ ucFirst(Auth::guard('customers')->user()->name) }} <em
                                        class="fas fa-chevron-down"></em>
                                </a>
                                <ul>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('store.slug', $store->slug) }}">
                                            {{ __('My Dashboard') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}">

                                            {{ __('My Profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('customer.home', $store->slug) }}"
                                            class="nav-link">

                                            {{ __('My Orders') }}
                                        </a>
                                    </li>
                                    <li>
                                        @if (Utility::CustomerAuthCheck($store->slug) == false)
                                            <a class="dropdown-item"
                                                href="{{ route('customer.login', $store->slug) }}" class="nav-link">
                                                {{ __('Sign in') }}
                                            </a>
                                        @else
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                                class="nav-link">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="customer-frm-logout"
                                                action="{{ route('customer.logout', $store->slug) }}" method="POST"
                                                class="d-none">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (Utility::CustomerAuthCheck($store->slug) != true)
                            <li>
                                <a href="{{ route('customer.login', [$store->slug]) }}">
                                    {{ __('Log in') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('store.usercreate', [$store->slug]) }}">
                                    {{ __('Register') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                @if ($storethemesetting['enable_sidebar_panel'] == 'on')
                    <div class="get-in-touch">
                        <h3 class="heading">{{ __('Quick contact info') }}</h3>
                        <div class="get-in-touch-box d-flex">
                            <i class="fa fa-phone"></i>
                            <div class="detail">
                                <a
                                    href="tel:{{ $storethemesetting['contact_info_phone_no'] }}">{{ $storethemesetting['contact_info_phone_no'] }}</a>
                            </div>
                        </div>
                        <div class="get-in-touch-box d-flex">
                            <i class="fas fa-envelope"></i>
                            <div class="detail">
                                <a href="#">{{ $storethemesetting['contact_info_email'] }}</a>
                            </div>
                        </div>
                        <div class="get-in-touch-box d-flex mb-0">
                            <i class="fas fa-location-arrow"></i>
                            <div class="detail">
                                <a href="#">{!! nl2br(e($storethemesetting['office_address'])) !!}</a>
                            </div>
                        </div>
                        <div class="get-in-touch-box d-flex mb-0">
                            <i class="fas fa-clock"></i>
                            <div class="detail">
                                <a href="#">{!! nl2br(e($storethemesetting['opening_hours'])) !!}</a>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- <div class="get-social">
                <h3 class="heading">Get Social</h3>
                <a href="#" class="facebook-bg">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="twitter-bg">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="google-bg">
                    <i class="fa fa-google"></i>
                </a>
                <a href="#" class="linkedin-bg">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div> --}}
            </div>
        </nav>
        <!-- Sidenav end -->
    @endif


    @yield('content')

    @if (!$full_page)
        <!-- Footer start -->
        <footer class="footer">
            <div class="container footer-inner">
                <div class="row">
                    @if (isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on')
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-item">
                                <h4>
                                    {{ __($storethemesetting['quick_link_header_name1']) }}
                                </h4>
                                <ul class="links">
                                    @if (isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1'])
                                        @foreach (json_decode($storethemesetting['footer_menu_1']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif

                                    {{-- <li>
                                        <a href="{{ $storethemesetting['quick_link_url12'] }}">
                                            {{ __($storethemesetting['quick_link_name12']) }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $storethemesetting['quick_link_url13'] }}">
                                            {{ __($storethemesetting['quick_link_name13']) }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $storethemesetting['quick_link_url14'] }}">
                                            {{ __($storethemesetting['quick_link_name14']) }}
                                        </a>
                                    </li> --}}

                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on')
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-item">
                                <h4>
                                    {{ __($storethemesetting['quick_link_header_name2']) }}
                                </h4>
                                <ul class="links">
                                    @if (isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2'])
                                        @foreach (json_decode($storethemesetting['footer_menu_2']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on')
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-item">
                                <h4>
                                    {{ __($storethemesetting['quick_link_header_name3']) }}
                                </h4>
                                <ul class="links">
                                    @if (isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3'])
                                        @foreach (json_decode($storethemesetting['footer_menu_3']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link4']) && $storethemesetting['enable_quick_link4'] == 'on')
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-item">
                                <h4>
                                    {{ __($storethemesetting['quick_link_header_name4']) }}
                                </h4>
                                <ul class="links">
                                    @if (isset($storethemesetting['footer_menu_4']) && $storethemesetting['footer_menu_4'])
                                        @foreach (json_decode($storethemesetting['footer_menu_4']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    @endif
                    {{-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>
                            Contact Info
                        </h4>
                        <ul class="contact-info">
                            <li>
                                <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                            </li>
                            <li>
                                <i class="flaticon-mail"></i><a
                                    href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                            </li>
                            <li>
                                <i class="flaticon-fax"></i>+0477 85X6 552
                            </li>
                        </ul>
                        
                    </div>
                </div> --}}
                    {{-- <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            Useful Links
                        </h4>
                        <ul class="links">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="services.html">Services</a>
                            </li>
                            <li>
                                <a href="faq.html">Faq</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="car-comparison.html">Car Compare</a>
                            </li>
                            <li>
                                <a href="car-reviews.html">Car Reviews</a>
                            </li>
                            <li>
                                <a href="elements.html">Elements</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="recent-posts footer-item">
                        <h4>Recent Posts</h4>
                        <div class="d-flex mb-4 recent-posts-box">
                            <a href="car-details.html">
                                <img class="flex-shrink-0 me-3" src="img/car/small-car-3.png" alt="small-car">
                            </a>
                            <div class="detail align-self-center">
                                <h5>
                                    <a href="car-details.html">Bentley Continental GT</a>
                                </h5>
                                <div class="listing-post-meta">
                                    $345,00 | <a href="#"><i class="fa fa-calendar"></i> Jan 12, 2021</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4 recent-posts-box">
                            <a href="car-details.html">
                                <img class="flex-shrink-0 me-3" src="img/car/small-car-1.png" alt="small-car">
                            </a>
                            <div class="detail align-self-center">
                                <h5>
                                    <a href="car-details.html">Fiat Punto Red</a>
                                </h5>
                                <div class="listing-post-meta">
                                    $345,00 | <a href="#"><i class="fa fa-calendar"></i> Aug 24, 2021</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex recent-posts-box">
                            <a href="car-details.html">
                                <img class="flex-shrink-0 me-3" src="img/car/small-car-2.png" alt="small-car">
                            </a>
                            <div class="detail align-self-center">
                                <h5>
                                    <a href="car-details.html">Nissan Micra Gen5</a>
                                </h5>
                                <div class="listing-post-meta">
                                    $345,00 | <a href="#"><i class="fa fa-calendar"></i> Sep 24, 2021</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                    <!-- subscriber-->

                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">

                        <div class="footer-item clearfix">
                            @if (isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on')
                                @if ($storethemesetting['enable_email_subscriber'] == 'on')
                                    <h4>{{ !empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time' }}
                                    </h4>
                                    <div class="Subscribe-box">
                                        <p>{{ !empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here' }}
                                        </p>
                                        {{ Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'form-inline d-flex']) }}
                                        {{ Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')]) }}
                                        <button class="btn button-theme" type="submit"><i
                                                class="fa fa-paper-plane"></i></button>
                                        {{ Form::close() }}
                                    </div>
                                @endif
                            @endif

                            @if ($storethemesetting['enable_footer'] == 'on')
                                <div class="clearfix"></div>
                                <div class="social-list-2">
                                    <ul>
                                        @if (!empty($storethemesetting['whatsapp']))
                                            <li>
                                                <a class="bg-whatsapp"
                                                    href="https://wa.me/{{ $storethemesetting['whatsapp'] }}"
                                                    target="_blank">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($storethemesetting['facebook']))
                                            <li>
                                                <a class="facebook-bg" href="{{ $storethemesetting['facebook'] }}"
                                                    target="_blank">
                                                    <i class="fab fa-facebook-square"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($storethemesetting['twitter']))
                                            <li>
                                                <a class="twitter-bg" href="{{ $storethemesetting['twitter'] }}"
                                                    target="_blank">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($storethemesetting['email']))
                                            <li>
                                                <a class="bg-github"
                                                    href="mailto:{{ $storethemesetting['email'] }}">
                                                    <i class="far fa-envelope"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($storethemesetting['instagram']))
                                            <li>
                                                <a class="bg-instagram" href="{{ $storethemesetting['instagram'] }}"
                                                    target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($storethemesetting['youtube']))
                                            <li>
                                                <a class="bg-youtube" href="{{ $storethemesetting['youtube'] }}"
                                                    target="_blank">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                        @endif
                                        {{-- <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#" class=""><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a>
                                    </li> --}}
                                    </ul>
                                </div>
                            @endif

                        </div>



                    </div>

                </div>
            </div>

            <div class="copy sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($storethemesetting['enable_footer'] == 'on')
                                <p> {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}
                                </p>
                            @endif
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#language-selection-modal">
                                <i class="fa fa-language"></i> {{ \App\Models\Utility::getLangCodes($currantLang) }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->
    @endif

    <script src="{{ asset('assets/theme16to21/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/rangeslider.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/theme23to28/js/leaflet.js') }}"></script>
    <script src="{{ asset('assets/theme23to28/js/leaflet-providers.js') }}"></script>
    <script src="{{ asset('assets/theme23to28/js/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.filterizr.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/lightgallery-all.js') }}"></script>
    {{-- <script src="js/jnoty.js"></script> --}}
    <script src="{{ asset('assets/theme23to28/js/maps.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/theme23to28/js/app.js') }}"></script>

    <!-- Custom js from entire application here -->
    <script src="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js') }}"></script>
    <script src="{{ asset('custom/js/custom.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('assets/theme23to28/js/ie10-viewport-bug-workaround.js') }}"></script>
    @include('storefront.layout.additional-scripts')
</body>

</html>
