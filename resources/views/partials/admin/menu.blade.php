@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::GetLogo();
    $plan = \App\Models\Plan::where('id', \Auth::user()->plan)->first();
@endphp

{{-- <nav class="dash-sidebar light-sidebar transprent-bg"> --}}
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
    @else
        <nav class="dash-sidebar light-sidebar">
@endif
<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="{{ route('dashboard') }}" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                alt="{{ config('app.name', 'Storego') }}" class="logo logo-lg nav-sidebar-logo" />
        </a>
    </div>
    <div class="navbar-content">
        <ul class="dash-navbar">
            @if (Auth::user()->type == 'Owner')
                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'dashboard' || Request::segment(1) == 'storeanalytic' ? ' active dash-trigger' : 'collapsed' }}"
                    id="m-dashboard">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="ti ti-home"></i>
                        </span><span class="dash-mtext">{{ __('Dashboard') }}</span>
                        <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul
                        class="dash-submenu {{ Request::segment(1) == 'dashboard' || Request::segment(1) == 'storeanalytic' ? ' show' : '' }}">
                        <li class="dash-item {{ Request::route()->getName() == 'dashboard' ? ' active' : '' }}"
                            id="m-db-dashboard">
                            <a class="dash-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="dash-item {{ Request::route()->getName() == 'storeanalytic' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('storeanalytic') }}">{{ __('Store Analytics') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::segment(1) == 'orders.index' || Request::route()->getName() == 'orders.show' ? ' active dash-trigger' : 'collapsed' }}">
                            <a class="dash-link" href="{{ route('orders.index') }}">{{ __('Orders') }}</a>
                        </li>
                        <li class="dash-item {{ Request::route()->getName() == 'customer.show' ? ' active' : '' }}"
                            id="m-db-customer">
                            <a class="dash-link" href="{{ route('customer.index') }}">{{ __('Customers') }}</a>
                        </li>
                    </ul>
                </li>
                {{-- <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'product_categorie.index' || Request::route()->getName() == 'product_categorie.show' ? ' active dash-trigger ' : 'collapsed' }}">
                    <a href="{{ route('product_categorie.index') }}"
                        class="dash-link {{ request()->is('product_categorie.index') ? 'active' : '' }}"><span
                            class="dash-micon">

                            <i class="fas fa-th-large"></i>
                        </span><span class="dash-mtext">{{ __('Category') }}</span></a>
                </li> --}}
                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'vehicle' ? ' active dash-trigger' : 'collapsed' }}"
                    id="m-vehicles">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-car"></i>
                        </span><span class="dash-mtext">{{ __('Vehicles') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'vehicle.index' ? ' show' : '' }}">
                        <li class="dash-item {{ Request::route()->getName() == 'vehicle.index' || Request::route()->getName() == 'vehicle.create' || Request::route()->getName() == 'vehicle.edit' || Request::route()->getName() == 'vehicle.show' || Request::route()->getName() == 'vehicle.grid' ? ' active' : '' }}"
                            id="m-vh-product">
                            <a class="dash-link" href="{{ route('vehicle.index') }}">{{ __('Vehicles') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'vehicle_category.index' || Request::route()->getName() == 'vehicle_category.create' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('vehicle_category.index') }}">{{ __('Category') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'vehicle_tax.index' || Request::route()->getName() == 'vehicle_tax.create' || Request::route()->getName() == 'vehicle_tax.edit' || Request::route()->getName() == 'vehicle_tax.show' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('vehicle_tax.index') }}">{{ __('Tax') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'invoice.index' || Request::route()->getName() == 'invoice.create' || Request::route()->getName() == 'invoice.edit' || Request::route()->getName() == 'invoice.show' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('invoice.index') }}">{{ __('Invoice') }}</a>
                        </li>
                        {{-- <li
                        class="dash-item {{ Request::route()->getName() == 'product_categorie.index' ? ' active' : '' }}">
                        <a class="dash-link"
                            href="{{ route('product_categorie.index') }}">{{ __('Vehicle Category') }}</a>
                    </li> --}}
                        {{-- <li class="dash-item {{ Request::route()->getName() == 'product_tax.index' ? ' active' : '' }}"
                        id="m-vh-product-tax">
                        <a class="dash-link" href="{{ route('product_tax.index') }}">{{ __('Tax') }}</a>
                    </li> --}}
                        {{-- <li
                        class="dash-item {{ Request::route()->getName() == 'product-coupon.index' || Request::route()->getName() == 'product-coupon.show' ? ' active' : '' }}">
                        <a class="dash-link"
                            href="{{ route('product-coupon.index') }}">{{ __('Product Coupon') }}</a>
                    </li> --}}

                        {{--  --}}
                        {{-- @if ($plan->shipping_method == 'on')
                        <li
                            class="dash-item {{ Request::route()->getName() == 'shipping.index' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('shipping.index') }}">{{ __('Shipping') }}</a>
                        </li>
                    @endif --}}
                        {{-- @if ($plan->additional_page == 'on')
                        <li
                            class="dash-item {{ Request::route()->getName() == 'custom-page.index' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('custom-page.index') }}">{{ __('Custom Page') }}</a>
                        </li>
                    @endif --}}
                        {{-- @if ($plan->blog == 'on')
                        <li class="dash-item {{ Request::route()->getName() == 'blog.index' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('blog.index') }}">{{ __('Blog') }}</a>
                        </li>
                    @endif --}}
                    </ul>
                </li>
                @if (\App\Models\Utility::isProductPlanActive())
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'product' || Request::segment(1) == 'product-coupon' || Request::segment(1) == 'shipping' || Request::segment(1) == 'subscriptions' ? ' active dash-trigger' : 'collapsed' }}">
                        <a href="#" class="dash-link"><span class="dash-micon">
                                <i class="fas fa-archive"></i>
                            </span><span class="dash-mtext">{{ __('Shop') }}</span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu {{ Request::segment(1) == 'product.index' ? ' show' : '' }}">
                            <li class="dash-item {{ Request::route()->getName() == 'product.index' || Request::route()->getName() == 'product.create' || Request::route()->getName() == 'product.edit' || Request::route()->getName() == 'product.show' || Request::route()->getName() == 'product.grid' ? ' active' : '' }}"
                                id="m-vh-product">
                                <a class="dash-link" href="{{ route('product.index') }}">{{ __('Products') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'product_categorie.index' || Request::route()->getName() == 'product_categorie.create' ? ' active' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('product_categorie.index') }}">{{ __('Category') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'product_tax.index' || Request::route()->getName() == 'product_tax.create' ? ' active' : '' }}">
                                <a class="dash-link" href="{{ route('product_tax.index') }}">{{ __('Tax') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'product-coupon.index' || Request::route()->getName() == 'product-coupon.show' ? ' active' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('product-coupon.index') }}">{{ __('Product Coupon') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'subscriptions.index' ? ' active' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('subscriptions.index') }}">{{ __('Subscriber') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'shipping.index' ? ' active' : '' }}">
                                <a class="dash-link" href="{{ route('shipping.index') }}">{{ __('Shipping') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'setting.payments' ? ' active dash-trigger' : '' }}">
                                <a class="dash-link" href="{{ route('setting.payments') }}">{{ __('Payments') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif


                {{-- <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'product_tax.index' || Request::route()->getName() == 'product_tax.show' ? ' active dash-trigger ' : 'collapsed' }}">
                    <a href="{{ route('product_tax.index') }}"
                        class="dash-link {{ request()->is('product_tax.index') ? 'active' : '' }}"><span
                            class="dash-micon">

                            <i class="fas fa-euro-sign"></i>
                        </span><span class="dash-mtext">{{ __('Tax') }}</span></a>
                </li> --}}
                {{-- @if ($plan->additional_page == 'on')
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'custom-page.index' || Request::route()->getName() == 'custom-page.show' ? ' active dash-trigger ' : 'collapsed' }}">
                        <a href="{{ route('custom-page.index') }}"
                            class="dash-link {{ request()->is('custom-page.index') ? 'active' : '' }}"><span
                                class="dash-micon">

                                <i class="ti ti-file"></i>
                            </span><span class="dash-mtext">{{ __('Custom Page') }}</span></a>
                    </li>
                @endif --}}
                @if ($plan->blog == 'on')
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'blog.index' || Request::route()->getName() == 'blog.show' ? ' active dash-trigger ' : 'collapsed' }}">
                        <a href="{{ route('blog.index') }}"
                            class="dash-link {{ request()->is('blog.index') ? 'active' : '' }}"><span
                                class="dash-micon">
                                {{-- <i data-feather="user"></i> --}}
                                <i class="ti ti-news"></i>
                            </span><span class="dash-mtext">{{ __('Blog') }}</span></a>
                    </li>
                @endif
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'gallery' || Request::segment(1) == 'gallery_categorie' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="ti ti-photo"></i>
                        </span><span class="dash-mtext">{{ __('Gallery') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'gallery.index' ? ' show' : '' }}">
                        <li
                            class="dash-item {{ Request::route()->getName() == 'gallery.index' || Request::route()->getName() == 'gallery.create' || Request::route()->getName() == 'gallery.edit' || Request::route()->getName() == 'gallery.show' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('gallery.index') }}">{{ __('Gallery') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'gallery_categorie.index' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('gallery_categorie.index') }}">{{ __('Gallery Category') }}</a>
                        </li>
                    </ul>
                </li>
                @if ($plan->job_board == 'on')
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'job-board' ? ' active dash-trigger' : 'collapsed' }}">
                        <a href="#" class="dash-link"><span class="dash-micon">
                                <i class="ti ti-subtask"></i>
                            </span><span class="dash-mtext">{{ __('Job Board') }}</span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu {{ Request::segment(1) == 'job-board.index' ? ' show' : '' }}">
                            <li
                                class="dash-item {{ Request::route()->getName() == 'job-board.index' || Request::route()->getName() == 'job-board.create' || Request::route()->getName() == 'job-board.edit' || Request::route()->getName() == 'job-board.show' ? ' active' : '' }}">
                                <a class="dash-link" href="{{ route('job-board.index') }}">{{ __('Job Board') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'job_categorie.index' ? ' active' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('job_categorie.index') }}">{{ __('Job Category') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'job-applicants.index' ? ' active' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('job-applicants.index') }}">{{ __('Job Applicants') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'customer.index' || Request::route()->getName() == 'customer.show' ? ' active dash-trigger ' : 'collapsed' }}">
                    <a href="{{ route('customer.index') }}"
                        class="dash-link {{ request()->is('customer.index') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i data-feather="user"></i>
                        </span><span class="dash-mtext">{{ __('Customers') }}</span></a>
                </li> --}}
            @endif
            @if (Auth::user()->type == 'super admin')
                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'dashboard' ? ' active' : 'collapsed' }}">
                    <a href="{{ route('dashboard') }}"
                        class="dash-link {{ request()->is('dashboard') ? 'active' : '' }}"><span class="dash-micon">
                            <i class="ti ti-home"></i>
                        </span><span class="dash-mtext">{{ __('Dashboard') }}</span></a>
                </li>

                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'store-resource' || Request::route()->getName() == 'store.grid' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="{{ route('store-resource.index') }}"
                        class="dash-link {{ request()->is('store-resource') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i data-feather="user"></i>
                        </span><span class="dash-mtext">{{ __('Stores') }}</span></a>
                </li>
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'vehicle_brand' || Request::segment(1) == 'vehicle_model' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-car"></i>
                        </span><span class="dash-mtext">{{ __('Vehicle') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'vehicle_brand.index' ? ' show' : '' }}">
                        <li
                            class="dash-item {{ Request::route()->getName() == 'vehicle_type.index' || Request::route()->getName() == 'vehicle_type.create' || Request::route()->getName() == 'vehicle_type.edit' || Request::route()->getName() == 'vehicle_type.show' || Request::route()->getName() == 'vehicle_type.grid' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('vehicle_type.index') }}">{{ __('Vehicle Type') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'vehicle_brand.index' || Request::route()->getName() == 'vehicle_brand.create' || Request::route()->getName() == 'vehicle_brand.edit' || Request::route()->getName() == 'vehicle_brand.show' || Request::route()->getName() == 'vehicle_brand.grid' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('vehicle_brand.index') }}">{{ __('Vehicle Brand') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'vehicle_model.index' || Request::route()->getName() == 'vehicle_model.create' || Request::route()->getName() == 'vehicle_model.edit' || Request::route()->getName() == 'vehicle_model.show' || Request::route()->getName() == 'vehicle_model.grid' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('vehicle_model.index') }}">{{ __('Vehicle Model') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'fuel-type.index' || Request::route()->getName() == 'fuel-type.create' || Request::route()->getName() == 'fuel-type.edit' || Request::route()->getName() == 'fuel-type.show' || Request::route()->getName() == 'fuel-type.grid' ? ' active' : '' }}">
                            <a class="dash-link" href="{{ route('fuel-type.index') }}">{{ __('Fuel Type') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'vehicle-equipment.index' || Request::route()->getName() == 'vehicle-equipment.create' || Request::route()->getName() == 'vehicle-equipment.edit' || Request::route()->getName() == 'vehicle-equipment.show' || Request::route()->getName() == 'vehicle-equipment.grid' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('vehicle-equipment.index') }}">{{ __('Vehicle Equipment') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'exterior-color.index' || Request::route()->getName() == 'exterior-color.create' || Request::route()->getName() == 'exterior-color.edit' || Request::route()->getName() == 'exterior-color.show' || Request::route()->getName() == 'exterior-color.grid' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('exterior-color.index') }}">{{ __('Exterior Color') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'interior-color.index' || Request::route()->getName() == 'interior-color.create' || Request::route()->getName() == 'interior-color.edit' || Request::route()->getName() == 'interior-color.show' || Request::route()->getName() == 'interior-color.grid' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('interior-color.index') }}">{{ __('Interior Color') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'interior-design.index' || Request::route()->getName() == 'interior-design.create' || Request::route()->getName() == 'interior-design.edit' || Request::route()->getName() == 'interior-design.show' || Request::route()->getName() == 'interior-design.grid' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('interior-design.index') }}">{{ __('Interior Design') }}</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'advertisements' ? ' active' : 'collapsed' }}">
                    <a href="{{ route('advertisements.index') }}"
                        class="dash-link {{ request()->is('advertisements') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i class="fas fa-ad"></i>
                        </span><span class="dash-mtext">{{ __('Advertisements') }}</span></a>
                </li>
                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'coupons' ? ' active' : 'collapsed' }}">
                    <a href="{{ route('coupons.index') }}"
                        class="dash-link {{ request()->is('coupons') ? 'active' : '' }}"><span class="dash-micon">
                            <i class="ti ti-tag"></i>
                        </span><span class="dash-mtext">{{ __('Coupons') }}</span></a>
                </li>
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'users' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="{{ route('users.index') }}"
                        class="dash-link {{ request()->is('users') ? 'active' : '' }}"><span class="dash-micon">
                            <i data-feather="user"></i>
                        </span><span class="dash-mtext">{{ __('Users') }}</span></a>
                </li>
            @endif

            @if (Auth::user()->type == 'super admin' || Auth::user()->type == 'language_specialist')
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'localization' || Request::segment(1) == 'vehicle_model' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-language"></i>
                        </span><span class="dash-mtext">{{ __('Localization') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'localization.show' ? ' show' : '' }}">
                        <li
                            class="dash-item {{ Request::route()->getName() == 'localization.show' || Request::route()->getName() == 'localization.create' || Request::route()->getName() == 'localization.edit' || Request::route()->getName() == 'localization.index' ? ' active' : '' }}">
                            <a class="dash-link"
                                href="{{ route('localization.show', [App::getLocale() ? App::getLocale() : 'en']) }}">{{ __('Language') }}</a>
                        </li>
                        @if (Auth::user()->type == 'super admin')
                            <li
                                class="dash-item {{ Request::route()->getName() == 'users.lang-specialists' ? ' active' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('users.lang-specialists') }}">{{ __('Language Specialist') }}</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (Auth::user()->type == 'super admin')
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'auto-gallery' ? ' active' : 'collapsed' }}">
                    <a href="{{ route('auto-gallery.index') }}"
                        class="dash-link {{ request()->is('auto-gallery') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i class="ti ti-photo"></i>
                        </span><span class="dash-mtext">{{ __('autoGallery') }}</span></a>
                </li>
            @endif

            @if (Auth::user()->type == 'super admin' || Auth::user()->type == 'Owner')
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'plans' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="ti ti-businessplan"></i>
                        </span><span class="dash-mtext">{{ __('Plans') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'plans.index' ? ' show' : '' }}">
                        <li
                            class="dash-item {{ Request::route()->getName() == 'plans' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link" href="{{ route('plans.index') }}">{{ __('Plans') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'copyright-plan' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('copyright-plan.index') }}">{{ __('Copyright') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'storage_plans' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link" href="{{ route('storage_plans.index') }}">{{ __('Storage') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'product-plan' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link" href="{{ route('product-plan.index') }}">{{ __('Product') }}</a>
                        </li>
                        @if (Auth::user()->type == 'super admin')
                            <li
                                class="dash-item {{ Request::route()->getName() == 'plan_request' ? ' active dash-trigger' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('plan_request.index') }}">{{ __('Plan Requests') }}</a>
                            </li>
                            <li
                                class="dash-item {{ Request::route()->getName() == 'plan_duration' ? ' active dash-trigger' : '' }}">
                                <a class="dash-link"
                                    href="{{ route('plan_duration.index') }}">{{ __('Plan Duration') }}</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'storage' ? ' active' : 'collapsed' }}">
                <a href="{{ route('storage_plans.index') }}"
                    class="dash-link {{ request()->is('storage') ? 'active' : '' }}"><span class="dash-micon">
                        <i class="ti ti-brand-telegram"></i>
                    </span><span class="dash-mtext">{{ __('Storage') }}</span></a>
            </li> --}}



            {{-- <li
                class="dash-item dash-hasmenu {{ Request::segment(1) == 'plans' || Request::route()->getName() == 'stripe' ? ' active dash-trigger' : 'collapsed' }}">
                <a href="{{ route('plans.index') }}"
                    class="dash-link {{ request()->is('plans') ? 'active' : '' }}"><span class="dash-micon">
                        <i class="ti ti-trophy"></i>
                    </span><span class="dash-mtext">{{ __('Plans') }}</span></a>
            </li> --}}
            @if (Auth::user()->type == 'super admin')
                {{-- <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'plan_request' ? ' active' : 'collapsed' }}">
                    <a href="{{ route('plan_request.index') }}"
                        class="dash-link {{ request()->is('plan_request') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i class="ti ti-brand-telegram"></i>
                        </span><span class="dash-mtext">{{ __('Plan Requests') }}</span></a>
                </li> --}}
                {{-- <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'plan_duration' ? ' active' : 'collapsed' }}">
                    <a href="{{ route('plan_duration.index') }}"
                        class="dash-link {{ request()->is('plan_duration') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i class="ti ti-brand-telegram"></i>
                        </span><span class="dash-mtext">{{ __('Plan Duration') }}</span></a>
                </li> --}}
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'vehicle_request' ? ' active' : 'collapsed' }}">
                    <a href="{{ route('viewVehicleRequests') }}"
                        class="dash-link {{ request()->is('vehicle_request') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i class="ti ti-brand-telegram"></i>
                        </span><span class="dash-mtext">{{ __('Vehicle Requests') }}</span></a>
                </li>

                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'email_template' || Request::route()->getName() == 'manage.email.language' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="{{ route('email_template.index') }}"
                        class="dash-link {{ request()->is('email_template') ? 'active' : '' }}"><span
                            class="dash-micon">
                            <i class="ti ti-mail"></i>
                        </span><span class="dash-mtext">{{ __('Email Templates') }}</span></a>
                </li>
            @endif
            @if (Auth::user()->type == 'Owner')
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-edit"></i>
                        </span><span class="dash-mtext">{{ __('Website') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'setting.layout' ? ' show' : '' }}">
                        <li
                            class="dash-item  {{ Request::route()->getName() == 'setting.layout' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link" href="{{ route('setting.layout') }}">{{ __('Layouts') }}</a>
                        </li>
                        
                            @if ($plan->additional_page == 'on')
                            <li
                            class="dash-item {{ Request::route()->getName() == 'custom-page.index' || Request::route()->getName() == 'custom-page.show' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link" href="{{ route('custom-page.index') }}">{{ __('Custom Page') }}</a>
                        </li>
                        @endif
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.settings' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link" href="{{ route('setting.settings') }}">{{ __('Settings') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.content_sharing' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.content_sharing') }}">{{ __('Content Sharing') }}</a>
                        </li>
                        <li class="dash-item">
                            <a class="dash-link" href="{{ route('forum.index') }}">{{ __('Forum') }}</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i class="fas fa-puzzle-piece"></i>
                        </span><span class="dash-mtext">{{ __('Plugins') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'setting.whatsapp_setting' ? ' show' : '' }}">
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.whatsapp_setting' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.whatsapp_setting') }}">{{ __('Whatsapp Messaging') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.twilio_setting' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.twilio_setting') }}">{{ __('Twilio setting') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.smartsupp_settings' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.smartsupp_settings') }}">{{ __('Smartsupp Live Chat') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.cookie_bot_settings' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.cookie_bot_settings') }}">{{ __('Cookie Bot') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.mobile_de' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.mobile_de') }}">{{ __('Mobile.de Seller-API') }}</a>
                        </li>
                        <li
                            class="dash-item {{ Request::route()->getName() == 'carcopy.car_hpm' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('carcopy.car_hpm') }}">{{ __('Carcopy.com CarHPM') }}</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' || Request::segment(1) == 'plan_duration' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="#" class="dash-link"><span class="dash-micon">
                            <i data-feather="settings"></i>
                        </span><span class="dash-mtext">{{ __('Settings') }}</span><span class="dash-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu {{ Request::segment(1) == 'setting.layout' ? ' show' : '' }}">

                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.site_setting' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.site_setting') }}">{{ __('Settings') }}</a>
                        </li>
                        {{-- <li
                            class="dash-item {{ Request::route()->getName() == 'setting.payments' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link" href="{{ route('setting.payments') }}">{{ __('Payments') }}</a>
                        </li> --}}
                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.email_setting' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.email_setting') }}">{{ __('Email Setting') }}</a>
                        </li>

                        <li
                            class="dash-item {{ Request::route()->getName() == 'setting.manage_languages' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.manage_languages') }}">{{ __('Manage Languages') }}</a>
                        </li>
                        {{-- <li
                            class="dash-item {{ Request::route()->getName() == 'setting.content_sharing' ? ' active dash-trigger' : '' }}">
                            <a class="dash-link"
                                href="{{ route('setting.content_sharing') }}">{{ __('Content Sharing') }}</a>
                        </li> --}}


                    </ul>
                </li>
            @endif

            @if (Auth::user()->type == 'super admin')
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' || Request::route()->getName() == 'store.editproducts' ? ' active dash-trigger' : 'collapsed' }}">
                    <a href="{{ route('settings') }}"
                        class="dash-link {{ request()->is('settings') ? 'active' : '' }}">
                        <span class="dash-micon"> <i data-feather="settings"></i>
                        </span><span class="dash-mtext">
                            {{ __('Settings') }}
                        </span></a>
                </li>
            @endif
            {{-- @if (Auth::user()->type == 'Owner')
                <li
                    class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' || Request::route()->getName() == 'store.editproducts' ? ' active dash-trigger' : 'collapsed' }}">

                    <div class="text-center mt-4 mb-4">

                        @if (\Auth::user()->plan == $plan->id && date('Y-m-d') < \Auth::user()->plan_expire_date && \Auth::user()->is_trial_done != 1)
                            <div class="alert alert-primary m-3" role="alert">
                                <h5 class="h6 my-4">
                                    {{ __('Expired : ') }}
                                    {{ \Auth::user()->plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->plan_expire_date) : __('Unlimited') }}
                                </h5>
                                <a href="{{ route('plans.index') }}"
                                    class="btn  btn-primary">{{ __('Upgrade Now') }}</a>
                            </div>
                        @elseif(
                            \Auth::user()->plan == $plan->id &&
                                !empty(\Auth::user()->plan_expire_date) &&
                                \Auth::user()->plan_expire_date < date('Y-m-d'))
                            <div class="alert alert-primary m-3" role="alert">
                                <div class="col-12">
                                    <p class="server-plan font-weight-bold text-center mx-sm-5">
                                        {{ __('Expired') }}
                                    </p>
                                </div>
                                <a href="{{ route('plans.index') }}"
                                    class="btn  btn-primary">{{ __('Upgrade Now') }}</a>
                            </div>
                        @elseif($plan->ad_free == 'off')
                            <div class="alert alert-primary m-3" role="alert">
                                {{ __('Ads are still enabled. You can disable ads by upgrading proper plan') }}
                                <a href="{{ route('plans.index') }}"
                                    class="btn btn-primary mt-2 d-block">{{ __('Upgrade') }}</a>
                            </div>
                        @endif


                    </div>
                </li>
            @endif --}}
        </ul>
    </div>
</div>
</nav>
