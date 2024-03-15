@php
    switch ($store->theme_dir) {
        case 'theme23':
            $layout = 'theme23';
            break;
        case 'theme24':
            $layout = 'theme24';
            break;
        case 'theme25':
            $layout = 'theme25';
            break;
        case 'theme26':
            $layout = 'theme26';
            break;
        case 'theme27':
            $layout = 'theme27';
            break;
        case 'theme28':
            $layout = 'theme28';
            break;
        default:
            $layout = 'theme23';
            break;
    }
@endphp

@extends('storefront.layout.' . $layout . '')

@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')

    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Product Details') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">
                        {{ $products->getName() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="car-details-section">
                        <div class="heading-car-3 clearfix">
                            <div class="float-start">
                                <h3> {{ $products->getName() }}</h3>
                                <p>
                                    @if ($products->product_type == 1)
                                        <i class="fas fa-box-open"></i> {{ $products->SKU }}
                                    @else
                                    @endif
                                    <i class="fas fa-th-large"></i>
                                    {{ $products->product_category() }}
                                </p>
                            </div>
                            <div class="float-end">
                                <h3 class="text-end">
                                    @if ($products->product_type == 1)
                                        @if ($products->enable_product_variant == 'on')
                                            {{ \App\Models\Utility::priceFormat(0) }}
                                        @else
                                            {{ \App\Models\Utility::priceFormat($products->price) }}
                                        @endif
                                        @if ($products->last_price)
                                            <small>/
                                                <del>
                                                    {{ \App\Models\Utility::priceFormat($products->last_price) }}
                                                </del>
                                            </small>
                                        @endif
                                    @else
                                        {{ \App\Models\Utility::priceFormat($products->price) }}
                                        @if ($products->net_price)
                                            <small>/
                                                <del>
                                                    {{-- {{ __('Net') }} --}}
                                                    {{ \App\Models\Utility::priceFormat($products->net_price) }}
                                                </del>
                                            </small>
                                        @endif
                                    @endif



                                </h3>

                                <div class="clearfix"></div>
                                @if ($store->enable_rating == 'on')
                                    <div class="ratings-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                $icon = 'fa-star';
                                                $color = '';
                                                $newVal1 = $i - 0.5;
                                                if ($products->product_rating() < $i && $products->product_rating() >= $newVal1) {
                                                    $icon = 'fa-star-half-alt';
                                                }
                                                if ($products->product_rating() >= $newVal1) {
                                                    $color = 'text-warning';
                                                }
                                            @endphp
                                            <i class="fa {{ $icon . ' ' . $color }}"></i>
                                        @endfor
                                        <span>({{ $products->product_rating() }}
                                            {{ __('Reviews') }})</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Cardetailsslider 3 start -->
                        <div class="cardetailsslider-3 clearfix mb-30">
                            <div class="product-img-slide">
                                <div class="slider-for">
                                    @foreach ($products_image as $key => $product)
                                        @if (!empty($products_image[$key]->product_images))
                                            <img class="img-fluid w-100" style="height:500px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                alt="">
                                        @else
                                            <img class="img-fluid w-100" style="height:500px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                alt="">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="slider-nav">
                                    @foreach ($products_image as $key => $product)
                                        <div class="thumb-slide">
                                            @if (!empty($products_image[$key]->product_images))
                                                <img class="img-fluid" style="height:115px;object-fit:cover"
                                                    src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                                    alt="">
                                            @else
                                                <img class="img-fluid" style="height:115px;object-fit:cover"
                                                    src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                    alt="">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if ($products->product_type == 1)
                            @if (!empty($products->specification))
                                <!-- Description start -->
                                <div class="Description mb-50">
                                    <h3 class="heading-2 text-uppercase">{{ __('Product Specification') }}</h3>
                                    <p> {!! $products->specification !!}</p>
                                </div>
                            @endif
                            @if (!empty($products->detail))
                                <!-- Description start -->
                                <div class="Description mb-50">
                                    <h3 class="heading-2 text-uppercase">{{ __('DETAILS') }}</h3>
                                    <p> {!! $products->detail !!}</p>
                                </div>
                            @endif
                        @else
                            @if (!empty($products->description))
                                <!-- Description start -->
                                <div class="Description mb-50">
                                    <h3 class="heading-2 text-uppercase">{{ __('DESCRIPTION') }}</h3>
                                    <p> {!! $products->description !!}</p>
                                </div>
                            @endif

                            <!-- Features info start -->
                            <div class="features-info mb-40">
                                <h3 class="heading-2">{{ __('Features') }}</h3>
                                <div class="row">
                                    @foreach (json_decode($products->equipments) as $key_equipment => $equipment)
                                        <div class="col-md-4 col-sm-4 col-xs-12 mb-2">
                                            {{ $equipment }}
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <!-- Features info start -->
                            <div class="features-info mb-40">
                                <h3 class="heading-2">{{ __('Interior Design') }}</h3>
                                <div class="row">
                                    @foreach (json_decode($products->interior_design) as $key_interior_design => $interior_design)
                                        <div class="col-md-4 col-sm-4 col-xs-12 mb-2">
                                            {{ $interior_design }}
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                    </div>
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>
                <div class="col-lg-4 col-md-12">

                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search d-none d-xl-block d-lg-block">
                            @if ($products->product_type == 1)
                                @php
                                    $btn_class = 'add_to_wishlist wishlist_' . $products->id . '';
                                    $icon_class = 'far';
                                @endphp
                                @if (Auth::guard('customers')->check())
                                    @if (!empty($wishlist) && isset($wishlist[$products->id]['product_id']))
                                        @if ($wishlist[$products->id]['product_id'] == $products->id)
                                            @php
                                                $btn_class = 'disabled';
                                                $icon_class = 'fas';
                                            @endphp
                                        @endif
                                    @endif
                                @endif
                                <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="btn button-theme btn-md w-100 {{ $btn_class }}"
                                        {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                                        data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                                        data-csrf="{{ csrf_token() }}">
                                        <i class="{{ $icon_class }} fa-heart"></i>
                                        {{ __('Save') }}
                                    </a>
                                </div>
                                <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="btn btn-success btn-md w-100 add_to_cart"
                                        data-url="{{ route('user.addToCart', [$products->id, $store->slug, 'variation_id']) }}"
                                        data-csrf="{{ csrf_token() }}">
                                        <i class="fas fa-shopping-basket"></i>
                                        {{ __('Add to cart') }}
                                    </a>
                                </div>
                            @endif

                            {!! \App\Models\Advertisement::getAdvertisement($store, 2) !!}

                            @if ($products->product_type == 2)
                                <h3 class="sidebar-title mt-4">{{ __('SPECIFICATION') }}</h3>
                                <ul>
                                    <li>
                                        <span>{{ __('Vehicle Brand') }}</span>{{ $vehicle_brand->name }}
                                    </li>
                                    <li>
                                        <span>{{ __('Vehicle Model') }}</span>{{ $vehicle_model->name }}
                                    </li>
                                    <li>
                                        <span>{{ __('Vehicle Number') }}</span>{{ $products->vehicle_number }}
                                    </li>
                                    @if ($products->fin_number_display && $products->fin_number)
                                        <li>
                                            <span>{{ __('Fin Number') }}</span>{{ $products->fin_number }}
                                        </li>
                                    @endif
                                    <li>
                                        <span>{{ __('First Register Year') }}</span>{{ $products->register_year }}
                                    </li>
                                    <li>
                                        <span>{{ __('First Register Month') }}</span>{{ $products->register_month }}
                                    </li>
                                    <li>
                                        <span>{{ __('Millage (km)') }}</span>{{ $products->millage }}
                                    </li>
                                    <li>
                                        <span>{{ __('Fuel Type') }}</span>{{ $fuel_type->name }}
                                    </li>
                                    <li>
                                        <span>{{ __('Power') }}</span>{{ $products->power }}
                                    </li>
                                    <li>
                                        <span>{{ __('Exterior Color') }}</span>{{ $products->exterior_color }}
                                    </li>
                                    <li>
                                        <span>{{ __('Metallic') }}:</span>{{ $products->is_metallic }}
                                    </li>
                                    <li>
                                        <span>{{ __('Interior Color') }}</span>{{ $products->interior_color }}
                                    </li>

                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Car details page end -->

@endsection
