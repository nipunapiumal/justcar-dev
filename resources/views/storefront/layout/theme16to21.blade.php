<!DOCTYPE html>
<html lang="en" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">
@php
    $store_settings = \App\Models\Store::where('slug', $store->slug)->first();
    $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
    $settings = \DB::table('settings')
        ->where('name', 'company_favicon')
        ->where('created_by', $store->id)
        ->first();

    $creator = \App\Models\User::find($store->created_by);
    $plan = \App\Models\Plan::find($creator->plan);

@endphp

<head>
    @if (!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on')
        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="<?php echo $store->cookiebot_group_id; ?>"
            data-blockingmode="auto" type="text/javascript"></script>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="icon"
        href="{{ asset(Storage::url('uploads/logo/') . (!empty($settings->value) ? $settings->value : 'favicon.png')) }}"
        type="image/png">


    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/magnific-popup.css') }}">
    {{-- <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/theme16to21/fonts/font-awesome/css/font-awesome.min.css') }}"> --}}

    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/theme35to37/fonts/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/jnoty.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme16to21/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/theme16to21/css/custom.css') }}"> -->
    <link rel="stylesheet" type="text/css" id="style_sheet"
        href="{{ asset('assets/theme16to21/css/skins/yellow.css') }}">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/theme16to21/css/ie10-viewport-bug-workaround.css') }}">


    @stack('css-page')
    @if (!empty($storethemesetting['header_img']))
        <style>
            .sub-banner {
                /* background: rgba(0, 0, 0, 0.04) url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}') center repeat; */
                background-position: center;
                background: rgba(0, 0, 0, 0.04) url('{{ asset(Storage::url('uploads/store_logo/contact.png')) }}') center repeat;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    @endif

</head>
@php
    $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
@endphp

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

    @php
        $header_top_bar = 'top-header bg-active';
        $header = 'main-header sticky-header sh-2';
        if (isset($index) && $index && $store->theme_dir == 'theme17') {
            //home page
            $header_top_bar = 'top-header top-header-bg';
            $header = 'main-header sticky-header header-with-top';
        } elseif (isset($index) && $index && $store->theme_dir == 'theme19') {
            //home page
            // $header = 'main-header sticky-header sh-2 sh-3 bg-active';
            $header = 'main-header sticky-header bg-active';
        } elseif (isset($index) && $index && $store->theme_dir == 'theme21') {
            //home page
            $header_top_bar = 'top-header top-header-bg';
            $header = 'main-header sticky-header header-with-top';
        }

    @endphp


    @if ($storethemesetting['enable_top_bar'] == 'on')
        <!-- Top header start -->
        <header class="{{ $header_top_bar }}" id="top-header-2">
            <div class="container">

                {{-- @if (!empty($store->cookiebot_group_id) && $store->is_cookiebot_enable == 'on')
                    <script id="CookieDeclaration" src="https://consent.cookiebot.com/<?php echo $store->cookiebot_group_id; ?>/cd.js" type="text/javascript"
                        async></script>
                @endif --}}

                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7">
                        <div class="list-inline">
                            <a href="tel:1-8X0-666-8X88">
                                {{-- <i class="fa fa-phone"></i> --}}
                                {{ !empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199' }}</a>
                            <a href="tel:info@themevessel.com">
                                {{-- <i class="fa fa-envelope"></i> --}}
                                <i class="fa fa-phone"></i>
                                {{ !empty($storethemesetting['top_bar_number']) ? $storethemesetting['top_bar_number'] : '2123081220' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Top header end -->
    @endif


    <!-- Main header start -->
    <header class="{{ $header }}">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">


                @if (isset($index) && $index && $store->theme_dir == 'theme21')
                    {{-- home page of theme 21 --}}
                    <a class="navbar-brand company-logo" href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo) && !empty($store->logo_dark))
                            <img data-dark="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                data-light="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                alt="Image placeholder">
                        @else
                            <img class="logo1 img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="Image placeholder">
                        @endif
                    </a>
                @elseif (isset($index) && $index && $store->theme_dir == 'theme17')
                    {{-- home page of theme 17 --}}
                    <a class="navbar-brand company-logo" href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo) && !empty($store->logo_dark))
                            <img data-dark="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                data-light="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                alt="Image placeholder">
                        @else
                            <img class="logo1 img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="Image placeholder">
                        @endif
                    </a>
                @elseif (isset($index) && $index && $store->theme_dir == 'theme19')
                    {{-- home page of theme 19 --}}
                    <a class="navbar-brand company-logo" href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo) && !empty($store->logo_dark))
                            <img data-dark="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                data-light="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                alt="Image placeholder">
                        @else
                            <img class="logo1 img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="Image placeholder">
                        @endif
                    </a>
                @else
                    <a class="navbar-brand company-logo" href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo_dark))
                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                alt="Image placeholder">
                        @else
                            <img class="logo1 img-fluid"
                                src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="Image placeholder">
                        @endif
                    </a>
                @endif





                <div class="d-flex align-items-end d-md-none ">
                    @if (Utility::CustomerAuthCheck($store->slug) == true)
                        <a href="{{ route('store.wishlist', $store->slug) }}" class="pe-3">
                            <i class="far fa-heart fa-lg position-relative">
                                <span
                                    class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                    style="font-family: sans-serif;font-size: 10px;"
                                    id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                            </i>
                        </a>
                    @endif
                    <a href="{{ route('store.cart', $store->slug) }}" class="pe-3">
                        <i class="fas fa-shopping-cart fa-lg position-relative">
                            <span
                                class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-family: sans-serif;font-size: 10px;"
                                id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>

                        </i>
                    </a>
                    {{-- <button class="navbar-toggler" type="button">
                        <span class="fa fa-bars"></span>
                    </button> --}}
                    <button class="navbar-toggler" type="button" id="drawer">
                        <span class="fa fa-bars"></span>
                    </button>

                </div>
                <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
                    <ul class="navbar-nav ml-auto">

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
                            <li class="nav-item dropdown active">
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

                        {{-- @if (!empty($page_slug_urls))
                            @foreach ($page_slug_urls as $k => $page_slug_url)
                                @if ($page_slug_url->enable_page_header == 'on')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link"
                                            href="{{ env('APP_URL') . '/page/' . $page_slug_url->slug }}">
                                            {{ ucfirst($page_slug_url->name) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif

                        @if ($store['blog_enable'] == 'on' && !empty($blog))
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('store.blog', $store->slug) }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                        @endif

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('store.contact', $store->slug) }}">
                                {{ __('Contact Us') }}
                            </a>
                        </li>

                        @if (isset($storethemesetting['enable_gallery']) && $storethemesetting['enable_gallery'] == 'on')
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('store.gallery', [$store->slug]) }}">
                                    {{ __('Gallery') }}
                                </a>
                            </li>
                        @endif

                        @if ($plan->job_board == 'on' && isset($storethemesetting['enable_job_board']) && $storethemesetting['enable_job_board'] == 'on')
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('store.job-board', [$store->slug]) }}">
                                    {{ __('Career With Us') }}
                                </a>
                            </li>
                        @endif --}}

                        @if (Utility::CustomerAuthCheck($store->slug) == true)

                            <li class="nav-item dropdown active">
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

                        <!-- <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='fa fa-language'></i>
                                {{ \App\Models\Utility::getLangCodes($currantLang) }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($languages as $language)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('change.languagestore', [$store->slug, $language]) }}">
                                            {{ \App\Models\Utility::getLangCodes($language) }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>

                        {{-- <li class="nav-item dropdown">
                            <div class="prime-select">
                                <select>
                                    <option value="">
                                        {{ \App\Models\Utility::getLangCodes($currantLang) }}</option>
                                    @foreach ($languages as $language)
                                        <option
                                            onclick="window.location = '{{ route('change.languagestore', [$store->slug, $language]) }}';">
                                            {{ \App\Models\Utility::getLangCodes($language) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li> --}} -->

                        @if (Utility::CustomerAuthCheck($store->slug) != true)
                                <li class="nav-item dropdown">
                                    <a class="sign-in nav-link icon h-icon" href="{{ route('customer.login', [$store->slug]) }}">
                                        <i class="fa fa-sign-in"></i> {{ __('Log In') }}
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="sign-in nav-link icon h-icon" href="{{ route('store.usercreate', [$store->slug]) }}">
                                        <i class="fa fa-user"></i> {{ __('Register') }}
                                    </a>
                                </li>
                        @endif

                        @if (Utility::CustomerAuthCheck($store->slug) == true)
                            <li class="nav-item dropdown">
                                <a href="{{ route('store.wishlist', $store->slug) }}" class="nav-link icon h-icon">
                                    <i class="far fa-heart fa-lg position-relative" style="font-size: 23px;">
                                        <span
                                            class="title wishlist_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                                            style="font-family: sans-serif;font-size: 12px;"
                                            id="wishlist_count">{{ !empty($wishlist) ? count($wishlist) : '0' }}</span>
                                    </i>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a href="{{ route('store.cart', $store->slug) }}" class="nav-link icon h-icon">
                                <i class="fas fa-shopping-cart fa-lg position-relative" style="font-size: 23px;">
                                    <span
                                        class="title shopping_count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-family: sans-serif;font-size: 12px;"
                                        id="shopping_count">{{ !empty($total_item) ? $total_item : '0' }}</span>

                                </i>
                            </a>
                        </li>



                        {{-- <li class="nav-item dropdown">
                            <a href="#full-page-search" class="nav-link h-icon">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </div>
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
                <a href="{{ route('store.slug', $store->slug) }}">
                    @if (!empty($store->logo_dark))
                        <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                            alt="sidebarlogo">
                    @else
                        <img class="logo1 img-fluid" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                            alt="sidebarlogo">
                    @endif
                </a>
            </div>
            <div class="sidebar-navigation">
                {{-- <h3 class="heading">Pages</h3> --}}
                <ul class="menu-list">
                    {{-- <li>
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li> --}}

                    @if ($storethemesetting['primary_nav_menu'])
                        @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                <li>
                                    <a href="{{ $info['link_url'] }}">
                                        {{ $info['link_name'] }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif

                    @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                        <li>
                            <a href="#" class="active pt0">
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
                            <a class="active pt0" href="#">
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
                                        <a class="dropdown-item" href="{{ route('customer.login', $store->slug) }}"
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

                    <li><a href="#" class="active">{{ \App\Models\Utility::getLangCodes($currantLang) }}
                            <em class="fas fa-chevron-down"></em></a>
                        <ul>
                            @foreach ($languages as $language)
                                <li><a
                                        href="{{ route('change.languagestore', [$store->slug, $language]) }}">{{ \App\Models\Utility::getLangCodes($language) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>




                    {{-- <li class="nav-item dropdown">
                            <a href="#full-page-search" class="nav-link h-icon">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> --}}
                    {{-- <li><a href="#" class="active pt0">Index <em class="fa fa-chevron-down"></em></a>
                        <ul>
                            <li><a href="index.html">Index 01</a></li>
                            <li><a href="index-2.html">Index 02</a></li>
                            <li><a href="index-3.html">Index 03</a></li>
                            <li><a href="index-4.html">Index 04</a></li>
                            <li><a href="index-5.html">Index 05</a></li>
                            <li><a href="index-6.html">Index 06</a></li>
                        </ul>
                    </li> --}}


                </ul>
            </div>
            {{-- <div class="get-in-touch">
                <h3 class="heading">Get in Touch</h3>
                <div class="get-in-touch-box d-flex mb-2">
                    <i class="flaticon-phone"></i>
                    <a href="tel:0477-0477-8556-552">0288 2547 874</a>
                </div>
                <div class="get-in-touch-box d-flex mb-2">
                    <i class="flaticon-mail"></i>
                    <div class="media-body">
                        <a href="#">info@themevessel.com</a>
                    </div>
                </div>
                <div class="get-in-touch-box d-flex">
                    <i class="flaticon-earth"></i>
                    <div class="media-body">
                        <a href="#">info@themevessel.com</a>
                    </div>
                </div>
            </div>
            <div class="get-social">
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

    @yield('content')


    <!-- Footer start -->
    @if ($store->theme_dir == 'theme20' || $store->theme_dir == 'theme17')
        <footer class="main-footer-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-image">
                            <a href="#">
                                @if (
                                    !empty($storethemesetting['footer_logo']) &&
                                        \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo']))
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo'])) }}"
                                        alt="Footer logo" class="f-logo">
                                @else
                                    <img src="{{ asset(Storage::url('uploads/store_logo/footer_logo.png')) }}"
                                        alt="Footer logo" class="f-logo">
                                @endif
                            </a>
                        </div>
                        <div class="footer-menu">
                            <ul>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url1'] }}">{{ $storethemesetting['quick_link_name1'] }}</a>
                                </li>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url12'] }}">{{ $storethemesetting['quick_link_name12'] }}</a>
                                </li>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url13'] }}">{{ $storethemesetting['quick_link_name13'] }}</a>
                                </li>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url14'] }}">{{ $storethemesetting['quick_link_name14'] }}</a>
                                </li>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url21'] }}">{{ $storethemesetting['quick_link_name21'] }}</a>
                                </li>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url22'] }}">{{ $storethemesetting['quick_link_name22'] }}</a>
                                </li>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url23'] }}">{{ $storethemesetting['quick_link_name23'] }}</a>
                                </li>
                                <li class="li">
                                    <a
                                        href="{{ $storethemesetting['quick_link_url24'] }}">{{ $storethemesetting['quick_link_name24'] }}</a>
                                </li>

                            </ul>
                        </div>
                        <div class="social-media social-media-two clearfix">
                            <div class="social-list">
                                @if (!empty($storethemesetting['whatsapp']))
                                    <div class="icon whatsapp"
                                        onclick="location.href='https://wa.me/{{ $storethemesetting['whatsapp'] }}'">
                                        <div class="tooltip">Whatsapp</div>
                                        <span><i class="fab fa-whatsapp"></i></span>
                                    </div>
                                @endif
                                @if (!empty($storethemesetting['facebook']))
                                    <div class="icon facebook"
                                        onclick="location.href='{{ $storethemesetting['facebook'] }}'">
                                        <div class="tooltip">Facebook</div>
                                        <span><i class="fab fa-facebook"></i></span>
                                    </div>
                                @endif
                                @if (!empty($storethemesetting['twitter']))
                                    <div class="icon twitter"
                                        onclick="location.href='{{ $storethemesetting['twitter'] }}'">
                                        <div class="tooltip">Twitter</div>
                                        <span><i class="fab fa-twitter"></i></span>
                                    </div>
                                @endif
                                @if (!empty($storethemesetting['email']))
                                    <div class="icon github"
                                        onclick="location.href='mailto:{{ $storethemesetting['email'] }}'">
                                        <div class="tooltip">Email</div>
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                @endif
                                @if (!empty($storethemesetting['instagram']))
                                    <div class="icon instagram"
                                        onclick="location.href='{{ $storethemesetting['instagram'] }}'">
                                        <div class="tooltip">Instagram</div>
                                        <span><i class="fab fa-instagram"></i></span>
                                    </div>
                                @endif
                                @if (!empty($storethemesetting['youtube']))
                                    <div class="icon youtube mr-0"
                                        onclick="location.href='{{ $storethemesetting['youtube'] }}'">
                                        <div class="tooltip">Youtube</div>
                                        <span><i class="fab fa-youtube"></i></span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @else
        <footer class="footer">
            <div class="lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <!-- subscriber-->
            @if (isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on')
                @if ($storethemesetting['enable_email_subscriber'] == 'on')
                    <div class="subscribe-newsletter">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <h3>{{ !empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time' }}
                                    </h3>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="Subscribe-box">
                                        <div class="newsletter-content-wrap">
                                            {{ Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'newsletter-form d-flex']) }}
                                            {{ Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')]) }}
                                            <button class="btn btn-theme" type="submit"><i
                                                    class="fa fa-paper-plane"></i></button>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <div class="clearfix"></div>
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer-item clearfix">
                                @if (
                                    !empty($storethemesetting['footer_logo']) &&
                                        \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo']))
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo'])) }}"
                                        alt="Footer logo" class="f-logo">
                                @else
                                    <img src="{{ asset(Storage::url('uploads/store_logo/footer_logo.png')) }}"
                                        alt="Footer logo" class="f-logo">
                                @endif

                                {{-- <img src="img/logos/logo.png" alt="logo" class="f-logo"> --}}
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                @if ($storethemesetting['enable_sidebar_panel'] == 'on')
                                    <div class="text">
                                        <P class="mb-0">
                                            {{ $storethemesetting['contact_info_phone_no'] }}
                                        </P>
                                    </div>
                                @endif



                            </div>
                        </div>
                        @if (isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on')
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                                <div class="footer-item">
                                    <h4>
                                        {{ __($storethemesetting['quick_link_header_name1']) }}
                                    </h4>
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        @if (isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1'])
                                            @foreach (json_decode($storethemesetting['footer_menu_1']) as $menu_title)
                                                @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        <i class="fa fa-angle-right"></i>
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>    
                                                @endif
                                            @endforeach
                                        @endif
                                        
                                        {{-- <li>
                                            <a href="{{ $storethemesetting['quick_link_url12'] }}">
                                                <i class="fa fa-angle-right"></i>
                                                {{ __($storethemesetting['quick_link_name12']) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $storethemesetting['quick_link_url13'] }}">
                                                <i class="fa fa-angle-right"></i>
                                                {{ __($storethemesetting['quick_link_name13']) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $storethemesetting['quick_link_url14'] }}">
                                                <i class="fa fa-angle-right"></i>
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
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        @if (isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2'])
                                            @foreach (json_decode($storethemesetting['footer_menu_2']) as $menu_title)
                                                @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        <i class="fa fa-angle-right"></i>
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
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        @if (isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3'])
                                            @foreach (json_decode($storethemesetting['footer_menu_3']) as $menu_title)
                                                @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        <i class="fa fa-angle-right"></i>
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
                                    <div class="s-border"></div>
                                    <div class="m-border"></div>
                                    <ul class="links">
                                        <li>
                                            <a href="{{ $storethemesetting['quick_link_url41'] }}">
                                                <i class="fa fa-angle-right"></i>
                                                {{ __($storethemesetting['quick_link_name41']) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $storethemesetting['quick_link_url42'] }}">
                                                <i class="fa fa-angle-right"></i>
                                                {{ __($storethemesetting['quick_link_name42']) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $storethemesetting['quick_link_url43'] }}">
                                                <i class="fa fa-angle-right"></i>
                                                {{ __($storethemesetting['quick_link_name43']) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $storethemesetting['quick_link_url44'] }}">
                                                <i class="fa fa-angle-right"></i>
                                                {{ __($storethemesetting['quick_link_name44']) }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            @if ($storethemesetting['enable_footer'] == 'on')
                <div class="sub-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <p class="copy">
                                    {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="social-media clearfix">
                                    <div class="social-list">
                                        @if (!empty($storethemesetting['whatsapp']))
                                            <div class="icon whatsapp"
                                                onclick="location.href='https://wa.me/{{ $storethemesetting['whatsapp'] }}'">
                                                <div class="tooltip">Whatsapp</div>
                                                <span><i class="fab fa-whatsapp"></i></span>
                                            </div>
                                        @endif
                                        @if (!empty($storethemesetting['facebook']))
                                            <div class="icon facebook"
                                                onclick="location.href='{{ $storethemesetting['facebook'] }}'">
                                                <div class="tooltip">Facebook</div>
                                                <span><i class="fab fa-facebook"></i></span>
                                            </div>
                                        @endif
                                        @if (!empty($storethemesetting['twitter']))
                                            <div class="icon twitter"
                                                onclick="location.href='{{ $storethemesetting['twitter'] }}'">
                                                <div class="tooltip">Twitter</div>
                                                <span><i class="fab fa-twitter"></i></span>
                                            </div>
                                        @endif
                                        @if (!empty($storethemesetting['email']))
                                            <div class="icon github"
                                                onclick="location.href='mailto:{{ $storethemesetting['email'] }}'">
                                                <div class="tooltip">Email</div>
                                                <span><i class="fa fa-envelope"></i></span>
                                            </div>
                                        @endif
                                        @if (!empty($storethemesetting['instagram']))
                                            <div class="icon instagram"
                                                onclick="location.href='{{ $storethemesetting['instagram'] }}'">
                                                <div class="tooltip">Instagram</div>
                                                <span><i class="fab fa-instagram"></i></span>
                                            </div>
                                        @endif
                                        @if (!empty($storethemesetting['youtube']))
                                            <div class="icon youtube mr-0"
                                                onclick="location.href='{{ $storethemesetting['youtube'] }}'">
                                                <div class="tooltip">Youtube</div>
                                                <span><i class="fab fa-youtube"></i></span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </footer>
    @endif



    <!-- Footer end -->


    <script src="{{ asset('assets/theme16to21/js/bootstrap.bundle.min.js') }}"></script>
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
    <script src="{{ asset('assets/theme16to21/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.filterizr.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/jnoty.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/theme16to21/js/app.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('assets/theme16to21/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- Custom javascript -->
    <script src="{{ asset('assets/theme16to21/js/ie10-viewport-bug-workaround.js') }}"></script>

    <!-- Custom js from entire application here -->
    <script src="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js') }}"></script>
    <script src="{{ asset('custom/js/custom.js') }}"></script>

    @include('storefront.layout.additional-scripts')

</body>

</html>
