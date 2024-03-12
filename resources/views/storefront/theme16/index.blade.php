@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
        <!-- Banner start -->
        <div class="banner" id="banner">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner banner-slider-inner">
                    @php $i=0; @endphp
                    @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }} item-bg">
                            <img class="d-block w-100 h-100"
                                src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}"
                                alt="banner">
                            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                                <div class="typing">
                                    <h2>{{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                    </h2>
                                </div>
                                <p>
                                    {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                </p>
                                {{-- <a href="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                    class="btn-8">
                                    <span>{{ __('Browse Vehicles') }}</span>
                                </a> --}}
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Banner end -->
    @else
        <div class="banner bst" id="banner">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner banner-slider-inner">
                    <div class="carousel-item active item-bg">
                        <img class="d-block w-100 h-100"
                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}"
                            alt="banner">
                        <div class="carousel-content container banner-info-2 bi-2">
                            <div class="text-center">
                                <div class="name_wrap">
                                    <h1>
                                        {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                                    </h1>
                                </div>
                                <p>
                                    {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Slider Area End -->

    <!-- Search box 2 start -->
    <div class="search-box-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inline-search-area">
                        <form action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                            id="frm-filter" method="get">
                            @csrf
                            <div class="row row-3">
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                    <select class="selectpicker search-fields" name="vehicle_type_id" id="vehicle_type_id"
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
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                    <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                        data-url="{{ route('product.get-models', [$store->slug]) }}" disabled>
                                        <option value="">
                                            {{ __('Select Make') }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                    <select class="selectpicker search-fields" name="model_id" id="model_id" disabled>
                                        <option value="">
                                            {{ __('Select Model') }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                                    <button class="btn white-btn btn-search w-100">
                                        <i class="fa fa-search"></i><strong>{{ __('Search') }}</strong>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search box 2 end -->


    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <div class="service-section  content-area-21">
            <div class="container">
                <!-- Main title -->
                <div class="section-header d-flex">
                    <h2 data-title="{{ __('Why Choose Us?') }}"> {{ __('Why Choose Us?') }}</h2>
                </div>
                <div class="row">
                    @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                        @if (isset($storethemesetting['features_icon1']))
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="service-info-2">
                                    <div class="icon">
                                        {!! $storethemesetting['features_icon1'] !!}
                                    </div>
                                    <h3><a href="services.html">{{ $storethemesetting['features_title1'] }}</a></h3>
                                    <p>
                                        {{ $storethemesetting['features_description1'] }}
                                    </p>
                                    {{-- <a href="services.html" class="read-more">
                                        Read More
                                    </a> --}}
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                        @if (isset($storethemesetting['features_icon2']))
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="service-info-2">
                                    <div class="icon">
                                        {!! $storethemesetting['features_icon2'] !!}
                                    </div>
                                    <h3><a href="services.html">{{ $storethemesetting['features_title2'] }}</a></h3>
                                    <p>
                                        {{ $storethemesetting['features_description2'] }}
                                    </p>
                                    {{-- <a href="services.html" class="read-more">
                                        Read More
                                    </a> --}}
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                        @if (isset($storethemesetting['features_icon3']))
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="service-info-2">
                                    <div class="icon">
                                        {!! $storethemesetting['features_icon3'] !!}
                                    </div>
                                    <h3><a href="services.html">{{ $storethemesetting['features_title3'] }}</a></h3>
                                    <p>
                                        {{ $storethemesetting['features_description3'] }}
                                    </p>
                                    {{-- <a href="services.html" class="read-more">
                                        Read More
                                    </a> --}}
                                </div>
                            </div>
                        @endif
                    @endif


                    {{-- <div class="col-lg-12 text-center">
                        <a data-animation="flipInX" data-delay="0.8s" class="btn-9 btn" href="services.html">
                            <span></span><span></span><span></span><span></span>Learn More
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    @endif

    <!-- Feature Products Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <div class="featured-car content-area-7">
            <div class="container">
                <!-- Main title -->
                <div class="section-header d-flex">
                    <h2 data-title="{{ __('Vehicles') }}"> {{ __('Vehicles') }}</h2>
                </div>
                <div class="row">

                    @foreach ($product_list as $product)
                        @php
                            $product->name = $product->getName();
                        @endphp
                        {{-- @if ($items->count() > 0) --}}
                        {{-- @foreach ($items as $product) --}}
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">
                                <div class="car-thumbnail">
                                    <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                        class="car-img">
                                        {{-- <div class="for">For Sale</div> --}}
                                        <div class="price-box">
                                            {{-- <span class="del"><del>$950.00</del></span> --}}
                                            {{-- <br> --}}
                                            <span>
                                                @if ($product->enable_product_variant == 'on')
                                                    {{ __('In variant') }}
                                                @else
                                                    {{ \App\Models\Utility::priceFormat($product->price) }}
                                                    {{ $product->getNetPrice() }}
                                                @endif
                                            </span>
                                        </div>
                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                            <img alt="Image placeholder" class="d-block"
                                                style="width: 700px;height:500px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                        @else
                                            <img alt="Image placeholder" class="d-block"
                                                style="width: 700px;height:500px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                        @endif
                                    </a>

                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a
                                            href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->name }}</a>
                                    </h1>
                                    {{-- <ul class="custom-list">
                                                <li>
                                                    <a href="#">New Car</a> /
                                                </li>
                                                <li>
                                                    <a href="#">Automatic</a> /
                                                </li>
                                                <li>
                                                    <a href="#">Sports</a>
                                                </li>
                                            </ul> --}}
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-fuel"></i>
                                            {{ \App\Models\Product::getFuelTypeById($product->fuel_type_id) }}
                                        </li>
                                        <li>
                                            <i class="flaticon-way"></i> {{ $product->millage }}
                                        </li>

                                        <li>
                                            <i class="flaticon-car"></i> {{ $product->power }}
                                        </li>
                                        <li>
                                            <i class="flaticon-gear"></i> {{ $product->prev_owners }}
                                        </li>
                                        <li>
                                            <i class="flaticon-calendar-1"></i> {{ $product->register_year }}
                                        </li>
                                        <li>
                                            <i class="flaticon-manual-transmission"></i>
                                            {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="footer clearfix">
                                            <div class="pull-left ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>(65 Reviews)</span>
                                            </div>
                                        </div> --}}
                            </div>
                        </div>
                        {{-- @endforeach --}}
                        {{-- @endif --}}
                    @endforeach


                </div>
                <div class="advertisement-block">
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>
            </div>
        </div>
    @endif
    <!-- Feature Products Area End -->


    @if (
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0)
        <div class="featured-car content-area-7">
            <div class="container">
                <!-- Main title -->
                <div class="section-header d-flex">
                    <h2 data-title="{{ __('Products') }}"> {{ __('Products') }}</h2>
                </div>
                <div class="row">

                    @foreach ($products_type1 as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">
                                <div class="car-thumbnail">
                                    <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                        class="car-img">
                                        {{-- <div class="for">For Sale</div> --}}
                                        <div class="price-box">
                                            <span
                                                class="del"><del>{{ \App\Models\Utility::priceFormat($product->last_price) }}</del></span>
                                            <br>
                                            <span>
                                                @if ($product->enable_product_variant == 'on')
                                                    {{ \App\Models\Utility::priceFormat(0) }}
                                                @else
                                                    {{ \App\Models\Utility::priceFormat($product->price) }}
                                                @endif
                                            </span>
                                        </div>
                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                            <img alt="Image placeholder" class="d-block"
                                                style="width: 700px;height:300px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                        @else
                                            <img alt="Image placeholder" class="d-block"
                                                style="width: 700px;height:300px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                        @endif
                                    </a>
                                    <div class="carbox-overlap-wrapper">
                                        <div class="overlap-box">
                                            <div class="overlap-btns-area">
                                                @if ($product->product_type == 1)
                                                    @php
                                                        $btn_class = 'add_to_wishlist wishlist_' . $product->id . '';
                                                        $icon_class = 'far';
                                                    @endphp

                                                    @if (Auth::guard('customers')->check())
                                                        @if (!empty($wishlist) && isset($wishlist[$product->id]['product_id']))
                                                            @if ($wishlist[$product->id]['product_id'] == $product->id)
                                                                @php
                                                                    $btn_class = 'disabled';
                                                                    $icon_class = 'fas text-danger';
                                                                @endphp
                                                            @endif
                                                        @endif
                                                    @endif
                                                    <a class="overlap-btn {{ $btn_class }}"
                                                        {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                                                        data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                        data-csrf="{{ csrf_token() }}">
                                                        <i class="{{ $icon_class }} fa-heart"></i>
                                                    </a>
                                                    <a class="overlap-btn add_to_cart"
                                                        data-url="{{ route('user.addToCart', [$product->id, $store->slug, 'variation_id']) }}"
                                                        data-csrf="{{ csrf_token() }}">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail">
                                    <h1 class="title" style="-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;height: 50px;">
                                        <a
                                            href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->name }}</a>
                                    </h1>
                                    <ul class="custom-list">
                                        <li>
                                            <a href="#">{{ $product->product_category() }}</a>
                                        </li>
                                    </ul>
                                </div>
                                @if ($store->enable_rating == 'on')
                                    <div class="footer clearfix">
                                        <div class="pull-left ratings">
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
                                                <i class="fa {{ $icon . ' ' . $color }}"></i>
                                            @endfor
                                            <span>({{ $product->product_rating() }}
                                                {{ __('Reviews') }})</span>
                                        </div>
                                    </div>
                                @endif
                                {{-- <div class="footer clearfix">
                                    <div class="pull-left ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(65 Reviews)</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        {{-- @endforeach --}}
                        {{-- @endif --}}
                    @endforeach


                </div>
                <div class="advertisement-block">
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>
            </div>
        </div>
    @endif


    <!-- Products categories-->
    @if (isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_categories'] == 'on')
            <div class="our-team content-area-7">
                <div class="container">
                    <!-- Main title -->
                    <div class="section-header d-flex">
                        <h2
                            data-title="{{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}">
                            {{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}
                        </h2>
                    </div>
                    <p class="mb-5">
                        {{ !empty($storethemesetting['categories_title'])
                            ? $storethemesetting['categories_title']
                            : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        under the sun has been written by one hand only.' }}
                    </p>
                    <div class="featured-slider row slide-box-btn slider"
                        data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                        @foreach ($pro_categories as $key => $pro_categorie)
                            @if ($product_count[$key] > 0)
                                <div class="slide slide-box">
                                    <div class="team-3">
                                        <div class="team-thumb">
                                            <a
                                                href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">
                                                @if (!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img))
                                                    <img alt="Image placeholder"
                                                        src="{{ asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img)) }}"
                                                        style="height:250px !important;object-fit: cover">
                                                @else
                                                    <img alt="Image placeholder"
                                                        src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                        style="height:250px !important;object-fit: cover">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="team-info">
                                            <h4>
                                                <a
                                                    href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">{{ $pro_categorie->name }}</a>
                                            </h4>
                                            <p>{{ __('Products') }}</p>
                                            <p class="mb-0">
                                                {{ !empty($product_count[$key]) ? $product_count[$key] : '0' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        @endif
    @endif

    <!-- Gallery-->
    @if (isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_gallery'] == 'on')
            <div class="latest-offers-section content-area-7">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title text-center">
                        <h1>{{ !empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery') }}
                        </h1>
                        <p>
                            {{ $storethemesetting['gallery_description'] }}
                        </p>
                    </div>


                    <div class="row mb-10">
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="latest-offers-box">
                                        <div class="latest-offers-box-inner">
                                            <div class="latest-offers-box-overflow">
                                                <div class="latest-offers-box-photo">
                                                    @if (
                                                        !empty($gallery_categories_v2[0]['categorie_img']) &&
                                                            \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img']))
                                                        <img src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[0]['categorie_img'])) }}"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    @else
                                                        <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    @endif

                                                </div>
                                                <div class="info">

                                                    <h3>
                                                        <a href="{{ route('store.gallery', $store->slug) }}">
                                                            {{ isset($gallery_categories_v2[0]['name']) ? $gallery_categories_v2[0]['name'] : '' }}
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="latest-offers-box">
                                        <div class="latest-offers-box-inner">
                                            <div class="latest-offers-box-overflow">
                                                <div class="latest-offers-box-photo">
                                                    @if (
                                                        !empty($gallery_categories_v2[1]['categorie_img']) &&
                                                            \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img']))
                                                        <img src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[1]['categorie_img'])) }}"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    @else
                                                        <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    @endif

                                                </div>
                                                <div class="info">

                                                    <h3>
                                                        <a href="{{ route('store.gallery', $store->slug) }}">
                                                            {{ isset($gallery_categories_v2[1]['name']) ? $gallery_categories_v2[1]['name'] : '' }}
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="latest-offers-box">
                                        <div class="latest-offers-box-inner">
                                            <div class="latest-offers-box-overflow">
                                                <div class="latest-offers-box-photo">
                                                    @if (
                                                        !empty($gallery_categories_v2[2]['categorie_img']) &&
                                                            \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img']))
                                                        <img src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[2]['categorie_img'])) }}"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    @else
                                                        <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                            alt="" class="img-fluid" style="object-fit: cover">
                                                    @endif

                                                </div>
                                                <div class="info">

                                                    <h3>
                                                        <a href="{{ route('store.gallery', $store->slug) }}">
                                                            {{ isset($gallery_categories_v2[2]['name']) ? $gallery_categories_v2[2]['name'] : '' }}
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="latest-offers-box">
                                <div class="latest-offers-box-inner">
                                    <div class="latest-offers-box-overflow">
                                        <div class="latest-offers-box-photo">

                                            <div class="latest-offers-box-photodd">
                                                @if (
                                                    !empty($gallery_categories_v2[3]['categorie_img']) &&
                                                        \Storage::exists('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img']))
                                                    <img class="img-fluid big-img"
                                                        src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery_categories_v2[3]['categorie_img'])) }}"
                                                        alt="" style="object-fit: cover">
                                                @else
                                                    <img class="img-fluid big-img"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" style="object-fit: cover">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h3>
                                                <a href="{{ route('store.gallery', $store->slug) }}">
                                                    {{ isset($gallery_categories_v2[3]['name']) ? $gallery_categories_v2[3]['name'] : '' }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <!-- Testimonials (v1) -->
    @if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
        <div class="testimonial-3 content-area-21">
            <div class="container">
                <!-- Main title -->
                <div class="section-header sh-two d-flex">
                    <h2
                        data-title="{{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}">
                        {{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}
                    </h2>
                </div>
                <div class="featured-slider row slide-box-btn slider"
                    data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>


                    @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                        <div class="slide slide-box">
                            <div class="testimonial-item-new">
                                <div class="author-img fix">
                                    <div class="author-avatar">
                                        <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}"
                                            alt="testimonial-5">
                                        <div class="icon">
                                            <i class="fa fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="author-content">
                                    <h5 class="left-line pl-40">{{ $storethemesetting['testimonial_name1'] }},
                                        <span class="desig"> {{ $storethemesetting['testimonial_about_us1'] }}</span>
                                    </h5>
                                </div>
                                <p>
                                    {{ $storethemesetting['testimonial_description1'] }}
                                </p>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-full"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                        <div class="slide slide-box">
                            <div class="testimonial-item-new">
                                <div class="author-img fix">
                                    <div class="author-avatar">
                                        <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png'))) }}"
                                            alt="testimonial-5">
                                        <div class="icon">
                                            <i class="fa fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="author-content">
                                    <h5 class="left-line pl-40">{{ $storethemesetting['testimonial_name2'] }},
                                        <span class="desig"> {{ $storethemesetting['testimonial_about_us2'] }}</span>
                                    </h5>
                                </div>
                                <p>
                                    {{ $storethemesetting['testimonial_description2'] }}
                                </p>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-full"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                        <div class="slide slide-box">
                            <div class="testimonial-item-new">
                                <div class="author-img fix">
                                    <div class="author-avatar">
                                        <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png'))) }}"
                                            alt="testimonial-5">
                                        <div class="icon">
                                            <i class="fa fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="author-content">
                                    <h5 class="left-line pl-40">{{ $storethemesetting['testimonial_name3'] }},
                                        <span class="desig"> {{ $storethemesetting['testimonial_about_us3'] }}</span>
                                    </h5>
                                </div>
                                <p>
                                    {{ $storethemesetting['testimonial_description3'] }}
                                </p>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-full"></i>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            </div>
        </div>
    @endif

    <!-- Client Logo -->
    @if (isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on')
        <div class="partners">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-slider slide-box-btn">
                            @if (!empty($storethemesetting['brand_logo']))
                                @foreach (explode(',', $storethemesetting['brand_logo']) as $k => $value)
                                    <div class="custom-box">
                                        @if (!empty($value) && \Storage::exists('uploads/store_logo/' . $value))
                                            <img src="{{ asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png')) }}"
                                                alt="Footer logo">
                                        @else
                                            <img src="{{ asset(Storage::url('uploads/store_logo/brand_logo.png')) }}"
                                                alt="Footer logo">
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
