@php
    // get theme color
    $setting = App\Models\Utility::colorset();
    $color = 'theme-4';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
    $company_logo = \App\Models\Utility::GetLogo();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on' ? 'rtl' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">
    <title>
        {{ \App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'Laravel') }}
        - @yield('page-title')</title>

    <link rel="icon" href="{{ asset(Storage::url('uploads/logo/')) . '/favicon.png' }}" type="image/png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">

    <link rel="stylesheet"
        href="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.css') }}">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme13to15/css/magnific-popup.css') }}">
    @stack('css-page')
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
    @if ($setting['SITE_RTL'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}" id="main-style-link">
    @endif
    @if ($setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/forum.css') }}">
</head>

<body class="{{ $color }}">
    <div class="container">
        <nav class="navbar navbar-expand-md mb-5 mt-5 rounded">
            <div class="container-fluid pe-2">
                <a class="navbar-brand" href="{{ route('forum.index') }}">
                    <img src="{{ asset(Storage::url('uploads/logo/' . $company_logo)) }}"
                        alt="{{ config('app.name', 'Storego') }}" class="navbar-brand-img auth-navbar-brand">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('dashboard') }}"><i class="ti ti-home fa-lg"></i> {{ __('Dashboard') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> --}}
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (\Auth::user()->type == 'super admin')
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="
                                        {{ route('forumzone.index') }}"><i
                                                class="fas fa-list"></i> {{ __('List Categories') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('forumzone.create') }}"><i class="fas fa-plus"></i>
                                            {{ __('Create Category') }}</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endif

                                @if (\Auth::user()->type == 'super admin' || \Auth::user()->type == 'Owner')
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('forum-threads') }}">{{ __('My Threads') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" method="GET" action="{{ route('forum.search') }}">
                        <input class="form-control me-2" name="keyword" type="search" placeholder="{{__('Search')}}" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">{{__('Search')}}</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-xl-8">
                @yield('content')
            </div>
            <div class="col-xl-4">
                @if (\Auth::user())
                    <a href="{{ route('forum.create') }}"
                        class="btn btn-primary w-100 mb-4">{{ __('Post Thread') }}</a>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>
                            <i class="pull-right fa fa-folder"></i>
                            {{ __('Categories') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="categories-box">
                            @foreach (\App\Models\ThreadCategory::get() as $category)
                                <a href="" class="d-flex justify-content-between align-items-center pt-3 pb-3">
                                    <span>{{ $category->name }}</span>
                                    <span
                                        class="badge rounded-pill bg-primary">{{ $category->getThreadCount() }}</span>

                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth-footer">
            <div class="container-fluid">
                <p class="">{{ __('Copyright') }} &copy;
                    {{ Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'WorkGo') }}
                    {{ date('Y') }}</p>
            </div>
        </div>
    </div>
    @stack('custom-scripts')
    <!-- Custom js from entire application here -->
    <script src="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js') }}"></script>
    <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/theme13to15/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- sweet alert Js -->
    <script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('custom/js/custom.js?v=3') }}"></script>

    @if (Session::has('success'))
        <script>
            showToast('{{ __('Success') }}', '{!! session('success') !!}', 'success');
            // show_toastr('{{ __('Success') }}', '{!! session('success') !!}', 'success');
        </script>
        {{ Session::forget('success') }}
    @endif
    @if (Session::has('error'))
        <script>
            showToast('{{ __('Error') }}', '{!! session('error') !!}', 'error');
            // show_toastr('{{ __('Error') }}', '{!! session('error') !!}', 'error');
        </script>
        {{ Session::forget('error') }}
    @endif

    @stack('script')

    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
