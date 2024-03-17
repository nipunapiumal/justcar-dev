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
    
    $two_tone_none = '';
    $two_tone_done = '';

    //echo Request::segment(2);
    if ($store->slug != Request::segment(2) && !Request::segment(3)):
            $two_tone_none = 'two-tone-none';
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-if';
        elseif (Request::segment(3) == 'cart' || Request::segment(3) == 'useraddress' || Request::segment(3) == 'userpayment' || Request::segment(3) == 'wishlist'):
            $two_tone_none = 'two-tone-none';
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-elseif';
        elseif (Request::segment(1) == 'store-blog' || Request::segment(3) == 'blog'):
            $two_tone_none = 'two-tone-none';
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-elseif-blog';
        else:
            $two_tone_done = 'two-tone-done';
            //echo 'sajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdfsajdndsajkfdjfbsbfjadbfbdsbfsdfsfnssdnandnasnasdasfdf-else';
        endif;

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
        <!-- Main header start -->
        <header class="main-header sticky-header {{$two_tone_none}} {{$two_tone_done}} header-with-top" id="main-header-2">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logos" href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo_dark))
                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo_dark)) }}"
                                alt="Image placeholder">
                        @else
                            <img class="" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="Image placeholder">
                        @endif
                    </a>
                    <button class="navbar-toggler" type="button" id="drawer">
                        <span class="fa fa-bars"></span>
                    </button>
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
                                <li>
                                    <a href="{{ route('customer.login', [$store->slug]) }}" class="nav-link h-icon">
                                        {{ __('Log in') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('store.usercreate', [$store->slug]) }}" class="nav-link h-icon">
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
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link"
                                href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
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
                                <a class="pt0" href="#">
                                    {{ __('More') }}
                                    <em class="fas fa-chevron-down"></em>
                                </a>
                                <ul>
                                    @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                            <li>
                                                <a href="{{ $info['link_url'] }}">
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
                                        <a href="{{ route('store.slug', $store->slug) }}">
                                            {{ __('My Dashboard') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}">

                                            {{ __('My Profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.home', $store->slug) }}" class="nav-link">

                                            {{ __('My Orders') }}
                                        </a>
                                    </li>
                                    <li>
                                        @if (Utility::CustomerAuthCheck($store->slug) == false)
                                            <a href="{{ route('customer.login', $store->slug) }}" class="nav-link">
                                                {{ __('Sign in') }}
                                            </a>
                                        @else
                                            <a href="#"
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
            </div>
        </nav>
        <!-- Sidenav end -->
    @endif


    @yield('content')

    @if (!$full_page)
        <!-- Footer start -->
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
                                @if ($storethemesetting['primary_nav_menu'])
                                    @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                                        @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                        <li class="li">
                                                <a class="nav-link" href="{{ $info['link_url'] }}">
                                                    {{ $info['link_name'] }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        @if ($storethemesetting['enable_footer'] == 'on')
                            <div class="social-media clearfix">
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
                                                <a class="bg-github" href="mailto:{{ $storethemesetting['email'] }}">
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
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="copy-right">
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
