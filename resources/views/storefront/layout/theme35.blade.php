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

    if (!empty(session()->get('lang'))) {
        $currantLang = session()->get('lang');
    } else {
        $currantLang = $store->lang;
    }
    $languages = \App\Models\Utility::languages($store->slug);

@endphp
<!DOCTYPE html>
<html lang="{{ $currantLang }}" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">

<head>
    @include('storefront.layout.theme35to37.header-type-1')
</head>

<body class="theme-color-1">
    @include('storefront.layout.theme35to37.modal-set')

    <!-- Header-area start -->
    <header class="header-area header-1" data-aos="slide-down">
        <!-- Start mobile menu -->
        <div class="mobile-menu">
            <div class="container">
                <div class="mobile-menu-wrapper"></div>
            </div>
        </div>
        <!-- End mobile menu -->

        <div class="main-responsive-nav">
            <div class="container">
                <!-- Mobile Logo -->
                <div class="logo">
                    <a href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo))
                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                alt="Image placeholder">
                        @else
                            <img src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}" alt="Image placeholder">
                        @endif
                    </a>
                </div>
                <!-- Menu toggle button -->
                <button class="menu-toggler" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route('store.slug', $store->slug) }}">
                        @if (!empty($store->logo))
                            <img style="max-width:135px"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                alt="Image placeholder">
                        @else
                            <img style="max-width:135px" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                alt="Image placeholder">
                        @endif
                    </a>
                    <!-- Navigation items -->
                    <div class="collapse navbar-collapse">
                        <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('store.slug', $store->slug) }}">
                                    {{ __('Home') }}
                                </a>
                            </li> --}}
                            @php
                                if (!isset($storethemesetting['primary_nav_menu'])) {
                                    $storethemesetting['primary_nav_menu'] = Utility::defaultMenu($storethemesetting, $store, $plan);
                                }
                            @endphp

                            @if ($storethemesetting['primary_nav_menu'])
                                @foreach (json_decode($storethemesetting['primary_nav_menu']) as $menu_title)
                                    @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ $info['link_url'] }}">
                                                {{ $info['link_name'] }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif

                            @if (isset($storethemesetting['secondary_nav_menu']) && $storethemesetting['secondary_nav_menu'])
                                <li class="nav-item">
                                    <a class="nav-link toggle" href="#">
                                        <i class="fal fa-plus"></i>
                                        {{ __('More') }}
                                    </a>
                                    <ul class="menu-dropdown">
                                        @foreach (json_decode($storethemesetting['secondary_nav_menu']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            @if (Utility::CustomerAuthCheck($store->slug) == true)
                                <li class="nav-item">
                                    <a class="nav-link toggle" href="#">
                                        <i class="fal fa-plus"></i>
                                        {{ ucFirst(Auth::guard('customers')->user()->name) }}
                                    </a>
                                    <ul class="menu-dropdown">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('store.slug', $store->slug) }}">
                                                {{ __('My Dashboard') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('customer.profile', [$store->slug, \Illuminate\Support\Facades\Crypt::encrypt(Auth::guard('customers')->user()->id)]) }}">

                                                {{ __('My Profile') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('customer.home', $store->slug) }}"
                                                class="nav-link">

                                                {{ __('My Orders') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            @if (Utility::CustomerAuthCheck($store->slug) == false)
                                                <a class="nav-link" href="{{ route('customer.login', $store->slug) }}"
                                                    class="nav-link">
                                                    {{ __('Sign in') }}
                                                </a>
                                            @else
                                                <a class="nav-link" href="#"
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
                        </ul>
                    </div>
                    <div class="more-option mobile-item">
                        <div class="item">
                            <div class="language">
                                <select class="nice-select" onchange="window.location = $(this).val()">
                                    @foreach ($languages as $language)
                                        <option value="{{ route('change.languagestore', [$store->slug, $language]) }}">
                                            {{ \App\Models\Utility::getLangCodes($language) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            @if (Utility::CustomerAuthCheck($store->slug) != true)
                                <a href="{{ route('customer.login', [$store->slug]) }}" class="btn-icon">
                                    <i class="far fa-user-circle"></i>
                                </a>
                            @endif

                        </div>

                        <div class="item">
                            @if (Utility::CustomerAuthCheck($store->slug) == false)
                                <a href="{{ route('store.usercreate', [$store->slug]) }}"
                                    class="btn btn-md btn-primary" title="{{ __('Register') }}" target="_self">
                                    {{ __('Register') }}
                                </a>
                            @else
                                <a onclick="event.preventDefault(); document.getElementById('customer-frm-logout').submit();"
                                    class="btn btn-md btn-primary" title="{{ __('Logout') }}" target="_self">
                                    {{ __('Logout') }}
                                </a>
                                <form id="customer-frm-logout" action="{{ route('customer.logout', $store->slug) }}"
                                    method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            @endif

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header-area end -->

    @yield('content')
    @include('storefront.layout.theme35to37.footer-type-1')
</body>
<script>
    // $(document).on('change', '.nice-select', function (e) {
    // var vehicleType = $(this).val();
    // var url = $(this).attr("data-url");
    // console.log('ininininin',vehicleType);
    // });
</script>

</html>
