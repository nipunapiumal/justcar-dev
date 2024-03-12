@extends('storefront.layout.theme11')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')

    <!-- Home Design -->
    <section class="home-one home-six mt70-992 ovh pt0-sm">
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="main-banner-wrapper">
                        <div class="banner-style-one owl-theme owl-carousel dots_none">
                            @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
                                @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                                    <div class="slide slide-one"
                                        style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}');height: 900px;">
                                    </div>
                                @endforeach
                            @else
                                <div class="slide slide-one"
                                    style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}');height: 900px;">
                                </div>
                                {{-- added duplicate image below otherwise slider return error --}}
                                <div class="slide slide-one"
                                    style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}');height: 900px;">
                                </div>
                            @endif

                        </div>
                        @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
                            <div class="carousel-btn-block banner-carousel-btn">
                                <span class="carousel-btn left-btn"><i class="flaticon-left-arrow left"></i></span>
                                <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container home_fixed_content">
            <div class="row">
                <div class="col-lg-7 col-xl-8">
                    <div class="home-content-home6-style">
                        <div class="home_content">
                            <h2 class="banner-title">
                                {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                            </h2>
                            <h3 class="banner_top_title text-thm">
                                <small
                                    class="text-white">{{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="home-content-home6-style2">
                        <div class="home6_advance_search_form">

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-allstatus" role="tabpanel"
                                    aria-labelledby="pills-allstatus-tab">
                                    <div class="home1_advance_search_wrapper">
                                        <form
                                            action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                            id="frm-filter" method="get">
                                            @csrf
                                            <ul class="mb0">
                                                <li class="mb-3">
                                                    <div class="select-boxes">
                                                        <div class="car_models">
                                                            <h6 class="title">{{ __('Vehicle Type') }}</h6>
                                                            <select class="selectpicker" name="vehicle_type_id"
                                                                id="vehicle_type_id"
                                                                data-url="{{ route('product.get-vehicle-brands', [$store->slug]) }}">
                                                                <option value="">
                                                                    {{ __('Select Vehicle Type') }}
                                                                </option>
                                                                @foreach ($vehicleTypes as $vehicleType)
                                                                    <option value="{{ $vehicleType['id'] }}">
                                                                        {{ $vehicleType->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="select-boxes">
                                                        <div class="car_models">
                                                            <h6 class="title">{{ __('Make') }}</h6>
                                                            <select class="selectpicker" name="brand_id" id="brand_id"
                                                                data-url="{{ route('product.get-models', [$store->slug]) }}"
                                                                disabled>
                                                                <option value="">
                                                                    {{ __('Select Make') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="select-boxes">
                                                        <div class="car_models">
                                                            <h6 class="title">{{ __('Model') }}</h6>
                                                            <select class="selectpicker" name="model_id" id="model_id"
                                                                disabled>
                                                                <option value="">
                                                                    {{ __('Select Model') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-grid">
                                                        <button class="btn btn-thm advnc_search_form_btn"><span
                                                                class="flaticon-magnifiying-glass"></span>{{ __('Search') }}</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="car-category mobile_space pt90 pb15 mt0-520">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.1s">
                    <div class="category_item home6_style">
                        <div class="icon">
                            <span class="flaticon-car-black-side-view-pointing-left"></span>
                        </div>
                        <div class="details">
                            <p class="title"><a href="javascript:void(0)">{{ __('Compact') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.3s">
                    <div class="category_item home6_style">
                        <div class="icon">
                            <span class="flaticon-sedan-car-model"></span>
                        </div>
                        <div class="details">
                            <p class="title"><a href="javascript:void(0)">{{ __('Sedan') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.5s">
                    <div class="category_item home6_style">
                        <div class="icon">
                            <span class="flaticon-jeep"></span>
                        </div>
                        <div class="details">
                            <p class="title"><a href="javascript:void(0)">{{ __('SUV') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.7s">
                    <div class="category_item home6_style">
                        <div class="icon">
                            <span class="flaticon-cabrio-car"></span>
                        </div>
                        <div class="details">
                            <p class="title"><a href="javascript:void(0)">{{ __('Convertible') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                    <div class="category_item home6_style">
                        <div class="icon">
                            <span class="flaticon-coupe-car"></span>
                        </div>
                        <div class="details">
                            <p class="title"><a href="javascript:void(0)">{{ __('Coupe') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Features -->
    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <section class="whychose_us bgc-f9">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="main-title text-center">
                            <h2>{{ __('Why Choose Us?') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                                @if (isset($storethemesetting['features_icon1']))
                                    <div class="col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        <div class="iconbox_home6_style">
                                            <div class="icon one">
                                                <span>
                                                    {!! $storethemesetting['features_icon1'] !!}
                                                </span>
                                            </div>
                                            <div class="details">
                                                <h4 class="title">{{ $storethemesetting['features_title1'] }}</h4>
                                                <p>
                                                    {{ $storethemesetting['features_description1'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                                @if (isset($storethemesetting['features_icon2']))
                                    <div class="col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                        <div class="iconbox_home6_style">
                                            <div class="icon two">
                                                <span>
                                                    {!! $storethemesetting['features_icon2'] !!}
                                                </span>
                                            </div>
                                            <div class="details">
                                                <h4 class="title">{{ $storethemesetting['features_title2'] }}</h4>
                                                <p>
                                                    {{ $storethemesetting['features_description2'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                                @if (isset($storethemesetting['features_icon3']))
                                    <div class="col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <div class="iconbox_home6_style">
                                            <div class="icon three">
                                                <span>
                                                    {!! $storethemesetting['features_icon3'] !!}
                                                </span>
                                            </div>
                                            <div class="details">
                                                <h4 class="title">{{ $storethemesetting['features_title3'] }}</h4>
                                                <p>
                                                    {{ $storethemesetting['features_description3'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service_thumb">
                            <img class="bdrs16" style="width:636px;height:550px;object-fit:cover;"
                                src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0)
        <section class="car-for-sale">
            <div class="container p0">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="main-title text-center">
                            <h2 class="title">{{ __('Products') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="home1_popular_listing home3_style wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0.1s">
                        <div class="listing_item_4grid_slider nav_none">

                            @foreach ($products_type1 as $product)
                            <div class="item">
                                <div class="car-listing">
                                    <div class="thumb">
                                        {{-- <div class="tag">FEATURED</div> --}}
                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                            <img alt="Product Image" class="img-center img-fluid img-1"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                        @else
                                            <img alt="Image placeholder" class="img-center img-fluid img-1"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                        @endif
                                        {{-- <div class="thmb_cntnt2">
                                            <ul class="mb0">
                                                <li class="list-inline-item"><a class="text-white" href="#"><span
                                                            class="flaticon-photo-camera mr3"></span> 22</a></li>
                                                <li class="list-inline-item"><a class="text-white" href="#"><span
                                                            class="flaticon-play-button mr3"></span> 3</a></li>
                                            </ul>
                                        </div> --}}
                                        <div class="thmb_cntnt3">
                                            <ul class="mb0">
                                                <li class="list-inline-item">
                                                @if (Auth::guard('customers')->check())
                                                    @if (!empty($wishlist) && isset($wishlist[$product->id]['product_id']))
                                                        @if ($wishlist[$product->id]['product_id'] != $product->id)
                                                        <a href="javascript:void(0)" class="add_to_wishlist wishlist_{{ $product->id }}" data-id="{{ $product->id }}">
                                                            <i class="far fa-heart"></i>
                                                        </a>     
                                                        {{-- <button type="button"
                                                                class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_{{ $product->id }}"
                                                                data-id="{{ $product->id }}">
                                                                <i class="far fa-heart"></i>
                                                            </button> --}}
                                                        @else
                                                        <a href="javascript:void(0)" style="color:#9b9b9b" data-id="{{ $product->id }}" >
                                                            <i class="fas fa-heart"></i>
                                                        </a>    
                                                        {{-- <button type="button"
                                                                class="action-item wishlist-icon bg-light-gray"
                                                                data-id="{{ $product->id }}" disabled>
                                                                <i class="fas fa-heart"></i>
                                                            </button> --}}
                                                        @endif
                                                    @else
                                                    <a href="javascript:void(0)" class="add_to_wishlist wishlist_{{ $product->id }}" data-id="{{ $product->id }}">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                        {{-- <button type="button"
                                                            class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_{{ $product->id }}"
                                                            data-id="{{ $product->id }}">
                                                            <i class="far fa-heart"></i>
                                                        </button> --}}
                                                    @endif
                                                @else
                                                <a href="javascript:void(0)" class="add_to_wishlist wishlist_{{ $product->id }}" data-id="{{ $product->id }}">
                                                    <i class="far fa-heart"></i>
                                                    {{-- <i class="fas fa-heart"></i> --}}
                                                </a>    
                                                {{-- <button type="button"
                                                        class="action-item wishlist-icon bg-light-gray add_to_wishlist wishlist_{{ $product->id }}"
                                                        data-id="{{ $product->id }}">
                                                        <i class="far fa-heart"></i>
                                                    </button> --}}
                                                @endif
                                                        </li>

                                                <li class="list-inline-item">
                                                    @if ($product->enable_product_variant == 'on')
                                                        <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                                            class="add_to_cart" data-url="{{ route('user.addToCart', [$product->id, $store->slug, 'variation_id']) }}"
                                                            data-csrf="{{ csrf_token() }}">
                                                            {{-- <span class="flaticon-heart"></span> --}}
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                        {{-- <a href=""
                                                        class="action-item pcart-icon bg-primary">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a> --}}
                                                    @else
                                                        <a href="#" class="add_to_cart"
                                                        data-url="{{ route('user.addToCart', [$product->id, $store->slug, 'variation_id']) }}"
                                                        data-csrf="{{ csrf_token() }}">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>

                                                        {{-- <a class="action-item pcart-icon bg-primary add_to_cart"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a> --}}
                                                    @endif
                                                </li>



                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <div class="wrapper">
                                            <h5 class="price">
                                                @if ($product->enable_product_variant == 'on')
                                                    {{ __('In variant') }}
                                                @else
                                                    {{ \App\Models\Utility::priceFormat($product->price) }}
                                                @endif
                                            </h5>
                                            <h6 class="title mb-0" style="-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;height: 35px;">
                                                <a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h6>
                                            
                                            @if ($store->enable_rating == 'on')
                                                <div class="listign_review">
                                                    <ul class="mb0">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @php
                                                                $icon = 'fa-star';
                                                                $color = '';
                                                                $newVal1 = $i - 0.5;
                                                                if ($product->product_rating() < $i && $product->product_rating() >= $newVal1) {
                                                                    $icon = 'fa-star-half-alt';
                                                                }
                                                                if ($product->product_rating() >= $newVal1) {
                                                                    $color = 'text-warning';
                                                                }
                                                            @endphp
                                                            <li class="list-inline-item">
                                                                <a href="#">
                                                                    <i class="fa {{ $icon . ' ' . $color }}"></i>
                                                                </a>
                                                            </li>
                                                            {{-- <li class="list-inline-item"><a href="#"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fa fa-star"></i></a></li> --}}
                                                        @endfor
                                                        <li class="list-inline-item"><a
                                                                href="#">{{ $product->product_rating() }}</a></li>
                                                        {{-- <li class="list-inline-item">(684 reviews)</li> --}}
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="listing_footer">
                                            <ul class="mb0">
                                                <li class="list-inline-item">
                                                    <p class="text-sm mb-0">
                                                        <span class="td-gray">{{ __('Category') }}:</span>
                                                        {{ $product->product_category() }}
                                                    </p>
                                                    {{-- <a href="#">
                                                        <span
                                                            class="flaticon-road-perspective me-2"></span>
                                                            77362
                                                        </a> --}}
                                                    </li>
                                                {{-- <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-gas-station me-2"></span>Diesel</a></li>
                                                <li class="list-inline-item"><a href="#"><span
                                                            class="flaticon-gear me-2"></span>Automatic</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Start shopping --}}
    @if ($products['Start shopping']->count() > 0)
        <section class="featured-product pt0 feature_listing_home4_style">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="main-title text-center  mt70">
                            <h2>{{ __('Vehicles') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="popular_listing_sliders row">
                            <!-- Nav tabs -->
                            <div class="nav nav-tabs col-lg-12 justify-content-center" role="tablist">

                                @foreach ($categories as $key => $category)
                                    <button class="nav-link {{ $category == 'Start shopping' ? 'active' : '' }}"
                                        id="{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}" role="tab"
                                        aria-controls="{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}"
                                        aria-selected="{{ $category == 'Start shopping' ? 'true' : 'false' }}">
                                        {{ __($category) }}</button>
                                @endforeach
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content col-lg-12" id="nav-tabContent">

                                @foreach ($products as $key => $items)
                                    <div class="tab-pane fade {{ $key == 'Start shopping' ? 'active show' : '' }}"
                                        id="{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $key) !!}" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            @if ($items->count() > 0)
                                                @foreach ($items as $product)
                                                    @php
                                                        $product->name = $product->getName();
                                                    @endphp
                                                    <div class="col-sm-6 col-xl-6">
                                                        <div class="car-listing list_style">
                                                            <div class="thumb">
                                                                @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                                    <img alt="Image placeholder"
                                                                        src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                                        class="h100p cover">
                                                                @else
                                                                    <img alt="Image placeholder"
                                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                        class="h100p">
                                                                @endif


                                                            </div>
                                                            <div class="details">
                                                                <div class="wrapper">
                                                                    <h5 class="price">
                                                                        @if ($product->enable_product_variant == 'on')
                                                                            {{ __('In variant') }}
                                                                        @else
                                                                            {{ \App\Models\Utility::priceFormat($product->price) }}
                                                                        @endif
                                                                    </h5>
                                                                    <h6 class="title"><a
                                                                            href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                                            {{ $product->name }}</a></h6>

                                                                </div>
                                                                <div class="listing_footer">
                                                                    <ul class="mb0">
                                                                        @if ($product->product_type == 2)
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-road-perspective me-2"></span>{{ $product->millage }}</a>
                                                                            </li>

                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-gas-station me-2"></span>{{ \App\Models\Product::getFuelTypeById($product->fuel_type_id) }}</a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-gear me-2"></span>{{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}</a>
                                                                            </li>
                                                                        @else
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-road-perspective me-2"></span>{{ $product->product_category() }}</a>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                <div class="listing_footer">
                                                                    <ul class="mb0">
                                                                        @if ($product->product_type == 2)
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-calendar me-2"></span>{{ $product->register_year }}
                                                                                </a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><i
                                                                                        class="fas fa-battery-bolt me-2"></i>
                                                                                    {{ $product->power }}</a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><i
                                                                                        class="far fa-user-friends me-2"></i>{{ $product->prev_owners }}</a>
                                                                            </li>
                                                                        @else
                                                                            <li class="list-inline-item"><a
                                                                                    href="#"><span
                                                                                        class="flaticon-road-perspective me-2"></span>{{ $product->product_category() }}</a>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-12 product-box">
                                                    <div class="card card-product">
                                                        <h6 class="m-0 text-center no_record p-2"><i
                                                                class="fas fa-ban"></i>
                                                            {{ __('No Record Found') }}</h6>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt50 mb50">
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>

            </div>
        </section>
    @else
        <div class="container mt-10 mb-5">
            {{ __('No data found') }}
        </div>
    @endif

    <!-- Products categories-->
    @if (isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_categories'] == 'on')
            <section class="popular-listing">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="main-title text-center">
                                <h2> {{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}
                                </h2>
                                <p class="lead lh-180 store-dcs">
                                    {{ !empty($storethemesetting['categories_title'])
                                        ? $storethemesetting['categories_title']
                                        : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       under the sun has been written by one hand only.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($pro_categories as $key => $pro_categorie)
                            @if ($product_count[$key] > 0)
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                    <div class="explore_city home6_style">
                                        <div class="thumb">
                                            <div class="listing_footer">
                                                <ul class="mb0">
                                                    <li class="list-inline-item">
                                                        <a href="#">
                                                            {{-- <span class="flaticon-road-perspective me-2"></span> --}}
                                                            {{ __('Click category title to explore') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @if (!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img))
                                                <img alt="{{ $pro_categorie->name }}"
                                                    src="{{ asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img)) }}"
                                                    height="250px" style="width:100%;object-fit: cover">
                                            @else
                                                <img alt="{{ $pro_categorie->name }}"
                                                    src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                    height="250px" style="object-fit: cover">
                                            @endif
                                        </div>
                                        <div class="details">
                                            <h4 class="title"><a
                                                    href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">{{ $pro_categorie->name }}</a>
                                            </h4>
                                            <p>{{ !empty($product_count[$key]) ? $product_count[$key] : '0' }}
                                                {{ __('Products') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                        {{-- <div class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="explore_city home6_style">
                                <div class="thumb">
                                    <div class="listing_footer">
                                        <ul class="mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-road-perspective me-2"></span>77362</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gas-station me-2"></span>Diesel</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gear me-2"></span>Automatic</a></li>
                                        </ul>
                                    </div>
                                    <img class="img-fluid" src="images/listing/browse1.jpg" alt="browse1.jpg">
                                </div>
                                <div class="details">
                                    <h4 class="title"><a href="page-listing-single-v3.html">Compact</a></h4>
                                    <p>59 Listings</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="explore_city home6_style">
                                <div class="thumb">
                                    <div class="listing_footer">
                                        <ul class="mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-road-perspective me-2"></span>77362</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gas-station me-2"></span>Diesel</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gear me-2"></span>Automatic</a></li>
                                        </ul>
                                    </div>
                                    <img class="img-fluid" src="images/listing/browse2.jpg" alt="browse2.jpg">
                                </div>
                                <div class="details">
                                    <h4 class="title"><a href="page-listing-single-v3.html">Sedan</a></h4>
                                    <p>8912 Listings</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="explore_city home6_style">
                                <div class="thumb">
                                    <div class="listing_footer">
                                        <ul class="mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-road-perspective me-2"></span>77362</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gas-station me-2"></span>Diesel</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gear me-2"></span>Automatic</a></li>
                                        </ul>
                                    </div>
                                    <img class="img-fluid" src="images/listing/browse3.jpg" alt="browse3.jpg">
                                </div>
                                <div class="details">
                                    <h4 class="title"><a href="page-listing-single-v3.html">SUV</a></h4>
                                    <p>775 Listings</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
                            <div class="explore_city home6_style">
                                <div class="thumb">
                                    <div class="listing_footer">
                                        <ul class="mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-road-perspective me-2"></span>77362</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gas-station me-2"></span>Diesel</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gear me-2"></span>Automatic</a></li>
                                        </ul>
                                    </div>
                                    <img class="img-fluid" src="images/listing/browse4.jpg" alt="browse4.jpg">
                                </div>
                                <div class="details">
                                    <h4 class="title"><a href="page-listing-single-v3.html">Convertible</a></h4>
                                    <p>12 Listings</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                            <div class="explore_city home6_style">
                                <div class="thumb">
                                    <div class="listing_footer">
                                        <ul class="mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-road-perspective me-2"></span>77362</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gas-station me-2"></span>Diesel</a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-gear me-2"></span>Automatic</a></li>
                                        </ul>
                                    </div>
                                    <img class="img-fluid" src="images/listing/browse5.jpg" alt="browse5.jpg">
                                </div>
                                <div class="details">
                                    <h4 class="title"><a href="page-listing-single-v3.html">Coupe</a></h4>
                                    <p>45 Listings</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row mt20">
                        <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
                            <div class="text-center">
                                <a href="{{ route('store.categorie.product', [$store->slug]) }}"
                                    class="more_listing">{{ __('Show More') }} <span class="icon"><span
                                            class="fas fa-plus"></span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    <!-- Gallery-->
    @if (isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_gallery'] == 'on')
            <section class="featured-product pt80 pb90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="main-title text-center text-lg-start">
                                <h2 class="mb0">
                                    {{ !empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery') }}
                                </h2>
                                <p class="lead lh-180 store-dcs mt-3">
                                    {{ !empty($storethemesetting['gallery_description'])
                                        ? $storethemesetting['gallery_description']
                                        : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      under the sun has been written by one hand only.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="popular_listing_sliders home5_style">
                                <!-- Nav tabs -->
                                <div class="nav nav-tabs col-lg-12 justify-content-center justify-content-lg-end"
                                    role="tablist">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($gallery_categories as $key => $category)
                                        <button class="nav-link {{ $i == 0 ? 'active' : '' }}"
                                            id="nav-{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}" role="tab"
                                            aria-controls="nav-{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}"
                                            aria-selected="true">{{ $category }}</button>
                                        @php $i++; @endphp
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="popular_listing_sliders row wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.1s">
                                <!-- Tab panes -->
                                <div class="tab-content col-lg-12" id="nav-tabContent">
                                    @php $i=0; @endphp
                                    @foreach ($galleries as $key => $items)
                                        <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}"
                                            id="nav-{{ $key }}" role="tabpanel"
                                            aria-labelledby="nav-{{ $key }}-tab">
                                            <div class="row">
                                                @if ($items->count() > 0)
                                                    @foreach ($items as $product)
                                                        <div class="col-sm-6 col-xl-3">
                                                            <div class="car-listing gallery p0 bdr_none">
                                                                <div class="thumb">
                                                                    {{-- <div class="tag">FEATURED</div> --}}
                                                                    @if (!empty($product->gallery_img) && \Storage::exists('uploads/gallery_image/' . $product->gallery_img))
                                                                        <a class="popup-img"
                                                                            href="{{ asset(Storage::url('uploads/gallery_image/' . $product->gallery_img)) }}">
                                                                            <img class="img-whp cover"
                                                                                src="{{ asset(Storage::url('uploads/gallery_image/' . $product->gallery_img)) }}"
                                                                                alt="sp5s1.jpg"></a>
                                                                    @else
                                                                        <img alt="Image placeholder"
                                                                            src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                            class="h100p">
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                @endif


                                            </div>
                                            <div class="row mt20">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="{{ route('store.gallery', $store->slug) }}"
                                                            class="more_listing">{{ __('Show More') }}<span
                                                                class="icon"><span
                                                                    class="fas fa-plus"></span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif


    <!-- Testimonials (v1) -->
    @if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
        <section class="our-testimonial bgc-f9">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="main-title text-center">
                            <h2> {{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}
                            </h2>
                            {{-- <p class="lead lh-180 store-dcs">
                                {{ !empty($storethemesetting['testimonial_main_heading_title'])
                                    ? $storethemesetting['testimonial_main_heading_title']
                                    : 'There is only that moment and the incredible certainty that <br> everything
                                                                                        under the sun has been written by one hand only.' }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="home2_testimonial_tabs home6_style">
                            <div class="tab-content" id="pills-tabContent2">
                                @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                                    <div class="tab-pane fade" id="pills-test1" role="tabpanel"
                                        aria-labelledby="pills-test1-tab">
                                        <div class="testimonial_post_home2 text-center">
                                            <div class="details">
                                                <p>{{ $storethemesetting['testimonial_description1'] }}</p>
                                                <h5 class="title"> {{ $storethemesetting['testimonial_name1'] }}</h5>
                                                <h6 class="para">{{ $storethemesetting['testimonial_about_us1'] }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                                    <div class="tab-pane fade show active" id="pills-test2" role="tabpanel"
                                        aria-labelledby="pills-test2-tab">
                                        <div class="testimonial_post_home2 text-center">
                                            <div class="details">
                                                <p>{{ $storethemesetting['testimonial_description2'] }}</p>
                                                <h5 class="title"> {{ $storethemesetting['testimonial_name2'] }}</h5>
                                                <h6 class="para">{{ $storethemesetting['testimonial_about_us2'] }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                                    <div class="tab-pane fade" id="pills-test3" role="tabpanel"
                                        aria-labelledby="pills-test3-tab">
                                        <div class="testimonial_post_home2 text-center">
                                            <div class="details">
                                                <p>{{ $storethemesetting['testimonial_description3'] }}</p>
                                                <h5 class="title"> {{ $storethemesetting['testimonial_name3'] }}</h5>
                                                <h6 class="para">{{ $storethemesetting['testimonial_about_us3'] }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <ul class="nav justify-content-center" id="pills-tab2" role="tablist">
                                @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-test1-tab" data-bs-toggle="pill"
                                            href="#pills-test1" role="tab" aria-controls="pills-test1"
                                            aria-selected="true">
                                            <div class="thumb d-inline-flex">
                                                <img class="rounded-circle"
                                                    src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}"
                                                    alt="1.jpg">
                                            </div>
                                        </a>
                                    </li>
                                @endif
                                @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-test2-tab" data-bs-toggle="pill"
                                            href="#pills-test2" role="tab" aria-controls="pills-test2"
                                            aria-selected="false">
                                            <div class="thumb d-inline-flex">
                                                <img class="rounded-circle"
                                                    src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png'))) }}"
                                                    alt="2.jpg">
                                            </div>
                                        </a>
                                    </li>
                                @endif
                                @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-test3-tab" data-bs-toggle="pill"
                                            href="#pills-test3" role="tab" aria-controls="pills-test3"
                                            aria-selected="false">
                                            <div class="thumb d-inline-flex">
                                                <img class="rounded-circle"
                                                    src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png'))) }}"
                                                    alt="3.jpg">
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Client Logo -->
    @if (isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on')
        <section class="our-partner pb100">
            <div class="container">
                {{-- <div class="row">
       <div class="col-lg-6 offset-lg-3">
           <div class="main-title text-center">
               <h2>Popular Makes</h2>
           </div>
       </div>
   </div> --}}
                <div class="partner_divider">
                    <div class="row">

                        @if (!empty($storethemesetting['brand_logo']))
                            @foreach (explode(',', $storethemesetting['brand_logo']) as $k => $value)
                                <div class="col-6 col-xs-6 col-sm-4 col-xl-2 wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.1s">
                                    <div class="partner_item">
                                        @if (!empty($value) && \Storage::exists('uploads/store_logo/' . $value))
                                            <img src="{{ asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png')) }}"
                                                alt="Footer logo">
                                        @else
                                            <img src="{{ asset(Storage::url('uploads/store_logo/brand_logo.png')) }}"
                                                alt="Footer logo">
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
@push('script-page')
<script>

    $(".productTab").click(function(e) {
        e.preventDefault();
        $('.productTab').removeClass('active')

    });

    $("#pro_scroll").click(function() {
        $('html, body').animate({
            scrollTop: $("#pro_items").offset().top
        }, 1000);
    });
</script>
@endpush
