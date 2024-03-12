@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')


    <!-- Slider Area Start -->
    <div class="slider-area">
        <div class="slider-wrapper">
            @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
                @php $i = 1; @endphp
                @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                    <div data-dot="0{{ $i }}" class="single-slide"
                        style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}');">
                        <div class="banner-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-content-wrapper text-center">
                                            <div class="text-content">
                                                <h1 class="pt-70">
                                                    {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                                </h1>
                                                <p>
                                                    {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                                </p>
                                                {{-- <div class="banner-btn">
                                                    <a href="product-details.html" class="default-btn">
                                                        <span>Discover now</span>
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $i++;@endphp
                @endforeach
            @else
                <div class="single-slide"
                    style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}');">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-content-wrapper text-center">
                                        <div class="text-content">
                                            <h1 class="pt-70">
                                                {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                                            </h1>
                                            <p>
                                                {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                                            </p>
                                            {{-- <div class="banner-btn">
                                                    <a href="product-details.html" class="default-btn">
                                                        <span>Discover now</span>
                                                    </a>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- Slider Area End -->

    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <!-- Service Area Start -->
        <div class="service-area bg-dark-2 ptb-150">
            <div class="container text-center">
                <div class="section-title pb-100">
                    <h5>{{ __('Why Choose Us?') }}</h5>
                    <h2>{{ __('Why Choose Us?') }}</h2>
                    {{-- <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p> --}}
                </div>
                <div class="row custom">
                    @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                        @if (isset($storethemesetting['features_icon1']))
                            <div class="col-lg-4 col-md-6">
                                <div class="single-service">
                                    <span class="srv-icon">
                                        <span style="font-size: 70px">
                                            {!! $storethemesetting['features_icon1'] !!}
                                        </span>
                                    </span>
                                    <h5>{{ $storethemesetting['features_title1'] }}</h5>
                                    <span class="divider"></span>
                                    <p>
                                        {{ $storethemesetting['features_description1'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                        @if (isset($storethemesetting['features_icon2']))
                            <div class="col-lg-4 col-md-6">
                                <div class="single-service">
                                    <span class="srv-icon">
                                        <span style="font-size: 70px">
                                            {!! $storethemesetting['features_icon2'] !!}
                                        </span>
                                    </span>
                                    <h5>{{ $storethemesetting['features_title2'] }}</h5>
                                    <span class="divider"></span>
                                    <p>
                                        {{ $storethemesetting['features_description2'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                        @if (isset($storethemesetting['features_icon3']))
                            <div class="col-lg-4 col-md-6">
                                <div class="single-service">
                                    <span class="srv-icon">
                                        <span style="font-size: 70px">
                                            {!! $storethemesetting['features_icon3'] !!}
                                        </span>
                                    </span>
                                    <h5>{{ $storethemesetting['features_title3'] }}</h5>
                                    <span class="divider"></span>
                                    <p>
                                        {{ $storethemesetting['features_description3'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                    {{-- <div class="col-lg-4 col-md-6">
                <div class="single-service">
                    <span class="srv-icon"><img src="img/icon/repair.png" alt=""></span>
                    <h5>Vehicle REPAIRING</h5>
                    <span class="divider"></span>
                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                        litterarum formas humanitatis per seacula.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-service">
                    <span class="srv-icon"><img src="img/icon/wheel.png" alt=""></span>
                    <h5>Wheel BALANCING</h5>
                    <span class="divider"></span>
                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                        litterarum formas humanitatis per seacula.</p>
                </div>
            </div> --}}
                </div>
            </div>
        </div>
        <!-- Service Area End -->
    @endif


    @if ($products['Start shopping']->count() > 0)
        <!-- Feature Products Area Start -->
        <div class="feature-product-area bg-1 ptb-150">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title pb-100 text-center">
                            <h5>{{ __('Vehicles') }}</h5>
                            <h2>{{ __('Vehicles') }}</h2>
                            {{-- <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p> --}}
                        </div>
                        <div class="m-rl-n-15px">
                            <div class="feature-slick-carousel-two">
                                @foreach ($product_list as $product)
                                    @php
                                        $product->name = $product->getName();
                                    @endphp
                                    {{-- @if ($items->count() > 0) --}}
                                    {{-- @foreach ($items as $product) --}}
                                    <div class="p-lr-15px">
                                        <div class="single-feature-item">
                                            <div class="feature-image">
                                                <a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                    @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                                    @else
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="feature-wrapper">
                                                <div class="feature-text">
                                                    <h5>
                                                        <a
                                                            href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h5>
                                                    {{-- <div class="rating">
                                                                <i class="fa fa-star yellow"></i>
                                                                <i class="fa fa-star yellow"></i>
                                                                <i class="fa fa-star yellow"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <span>(35 Reviews)</span>
                                                            </div> --}}
                                                </div>
                                                <div class="feature-info">
                                                    <span>{{ __('Millage') }} <span>{{ $product->millage }}</span></span>

                                                    <span>{{ __('Fuel Type') }}
                                                        <span>{{ \App\Models\Product::getFuelTypeById($product->fuel_type_id) }}</span></span>
                                                    <span>{{ __('Transmission') }}
                                                        <span>{{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}</span></span>
                                                    <span>{{ __('First Register Year') }}
                                                        <span>{{ $product->register_year }}</span>
                                                    </span>
                                                    <span>{{ __('Power') }}
                                                        <span>{{ $product->power }}</span>
                                                    </span>
                                                    <span>{{ __('Previous Owners') }}
                                                        <span>{{ $product->prev_owners }}</span>
                                                    </span>
                                                </div>
                                                <div class="feature-price">
                                                    {{-- <span class="discount">-30%</span> --}}
                                                    <span class="current-price" style="margin-left: 0">
                                                        @if ($product->enable_product_variant == 'on')
                                                            {{ __('In variant') }}
                                                        @else
                                                            {{ \App\Models\Utility::priceFormat($product->price) }}
                                                        @endif
                                                    </span>
                                                    {{-- <span class="pre-price">$280.000</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                    {{-- @endif --}}
                                @endforeach


                            </div>
                        </div>
                        <div style="margin-top:80px;margin-bottom:50px">
                            {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- Feature Products Area End -->
    @endif

    @if (
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0)
        <!-- Feature Products Area Start -->
        <div class="feature-product-area bg-1 ptb-150">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title pb-100 text-center">
                            <h5>{{ __('Products') }}</h5>
                            <h2>{{ __('Products') }}</h2>
                            {{-- <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p> --}}
                        </div>
                        <div class="m-rl-n-15px">
                            <div class="feature-slick-carousel-two">
                                @foreach ($products_type1 as $product)
                                    <div class="p-lr-15px">
                                        <div class="single-feature-item">
                                            <div class="feature-image">
                                                <a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                    @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                                    @else
                                                        <img alt="Image placeholder" width="336" height="493"
                                                            src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="feature-wrapper">
                                                <div class="feature-text">
                                                    <h5>
                                                        <a
                                                            href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h5>
                                                    @if ($store->enable_rating == 'on')
                                                        <div class="rating">
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
                                                                <i class="fa fa-star {{ $icon . ' ' . $color }}"></i>
                                                            @endfor
                                                            {{-- <i class="fa fa-star yellow"></i>
                                                            <i class="fa fa-star yellow"></i>
                                                            <i class="fa fa-star yellow"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i> --}}
                                                            <span>({{ $product->product_rating() }}
                                                                {{ __('Reviews') }})</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="feature-info">
                                                    <span>{{ __('Category') }}
                                                        <span>{{ $product->product_category() }}</span>
                                                    </span>
                                                </div>
                                                <div class="feature-price">
                                                    @if (Auth::guard('customers')->check())
                                                        @if (!empty($wishlist) && isset($wishlist[$product->id]['product_id']))
                                                            @if ($wishlist[$product->id]['product_id'] != $product->id)
                                                                <a href="javascript:void(0)"
                                                                    class="add_to_wishlist wishlist_{{ $product->id }}"
                                                                    data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                                    data-csrf="{{ csrf_token() }}">
                                                                    <i class="far fa-heart fa-2x"></i>
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0)" style="color:#9b9b9b"
                                                                    data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                                    data-csrf="{{ csrf_token() }}">
                                                                    <i class="fas fa-heart fa-2x"></i>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="javascript:void(0)"
                                                                class="add_to_wishlist wishlist_{{ $product->id }}"
                                                                data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                                data-csrf="{{ csrf_token() }}">
                                                                <i class="far fa-heart fa-2x"></i>
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="javascript:void(0)"
                                                            class="add_to_wishlist wishlist_{{ $product->id }}"
                                                            data-url="{{ route('store.addtowishlist', [$store->slug, $product->id]) }}"
                                                            data-csrf="{{ csrf_token() }}">
                                                            <i class="far fa-heart fa-2x"></i>
                                                            {{-- <i class="fas fa-heart"></i> --}}
                                                        </a>
                                                    @endif

                                                    @if ($product->enable_product_variant == 'on')
                                                        <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                                            class="add_to_cart ps-1"
                                                            data-url="{{ route('user.addToCart', [$product->id, $store->slug, 'variation_id']) }}"
                                                            data-csrf="{{ csrf_token() }}">
                                                            <i class="fas fa-shopping-cart fa-2x"></i>
                                                        </a>
                                                    @else
                                                        <a href="#" class="add_to_cart ps-1"
                                                            data-url="{{ route('user.addToCart', [$product->id, $store->slug, 'variation_id']) }}"
                                                            data-csrf="{{ csrf_token() }}">
                                                            <i class="fas fa-shopping-cart fa-2x"></i>
                                                        </a>
                                                    @endif

                                                    {{-- <span class="discount">-30%</span> --}}
                                                    <span class="current-price">
                                                        @if ($product->enable_product_variant == 'on')
                                                            {{ __('In variant') }}
                                                        @else
                                                            {{ \App\Models\Utility::priceFormat($product->price) }}
                                                        @endif
                                                    </span>
                                                    {{-- <span class="pre-price">$280.000</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Feature Products Area End -->
    @endif



    <!-- Products categories-->
    @if (isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_categories'] == 'on')
            <div class="blog-two-area ptb-100">
                <div class="container">
                    <div class="section-title-light pb-60 text-center fix">
                        {{-- <h5>Read Our Latest Blog News</h5> --}}
                        <h2>{{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}
                        </h2>
                        <p>{{ !empty($storethemesetting['categories_title'])
                            ? $storethemesetting['categories_title']
                            : 'There is only that moment and the incredible certainty <br> that everything under the sun has been written by one hand only.' }}
                        </p>
                    </div>
                    <div class="m-rl-n-15px">
                        <div class="blog-carousel">
                            @foreach ($pro_categories as $key => $pro_categorie)
                                @if ($product_count[$key] > 0)
                                    <div class="p-lr-15px">
                                        <div class="single-blog">
                                            <div class="blog-image">
                                                <a
                                                    href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">
                                                    @if (!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img))
                                                        <img alt="Image placeholder"
                                                            src="{{ asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img)) }}"
                                                            height="350px" style="object-fit: cover">
                                                    @else
                                                        <img alt="Image placeholder"
                                                            src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                            height="350px" style="object-fit: cover">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="blog-text">
                                                <h5><a
                                                        href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">{{ $pro_categorie->name }}</a>
                                                </h5>
                                                <p>
                                                    {{ __('Products') }}:
                                                    {{ !empty($product_count[$key]) ? $product_count[$key] : '0' }}
                                                </p>
                                                <a href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}"
                                                    class="default-btn"><span>{{ __('Show More') }}</span></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products categories End -->
        @endif
    @endif

    <!-- Gallery-->
    @if (isset($storethemesetting['enable_gallery']) &&
            $storethemesetting['enable_gallery'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_gallery'] == 'on')
            <div class="latest-product-area bg-dark-2 pt-150 pb-120">
                <div class="container">
                    <div class="section-title pb-100 text-center">
                        <h5>{{ !empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery') }}
                        </h5>
                        <h2>{{ !empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery') }}
                        </h2>
                        <p>
                            {{ !empty($storethemesetting['gallery_description'])
                                ? $storethemesetting['gallery_description']
                                : 'There is only that moment and the incredible certainty <br> that
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        everything
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        under the sun has been written by one hand only.' }}
                        </p>
                    </div>
                    <div class="grid">
                        <div class="row">
                            @php $i=0; @endphp
                            @foreach ($gallery_categories_ as $items)
                                @php
                                    // print_r($items);
                                @endphp
                                @if ($i == 0)
                                    <div class="col-md-6 col-sm-12 grid-item col-xs-12">
                                        <div class="latest-item">
                                            <a href="{{ route('store.gallery', $store->slug) }}">
                                                @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                                    <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                @else
                                                    <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                @endif
                                                <span class="latest-p-title">
                                                    <span class="p-title-1">{{ $items->name }}</span>
                                                    {{-- <span class="p-number">03 Products</span> --}}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @elseif($i == 1 || $i == 2 || $i == 3 || $i == 4)
                                    <div class="col-md-3 col-sm-6 grid-item col-xs-12">
                                        <div class="latest-item">
                                            <a href="{{ route('store.gallery', $store->slug) }}">
                                                @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                                    <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                        alt="" width="270" height="270"
                                                        style="object-fit: cover">
                                                @else
                                                    <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" width="270" height="270"
                                                        style="object-fit: cover">
                                                @endif
                                                <span class="latest-p-title">
                                                    <span class="p-title-1">{{ $items->name }}</span>
                                                    {{-- <span class="p-number">03 Products</span> --}}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @elseif ($i == 5)
                                    <div class="col-md-6 col-sm-12 grid-item col-xs-12">
                                        <div class="latest-item">
                                            <a href="{{ route('store.gallery', $store->slug) }}">
                                                @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                                    <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                @else
                                                    <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" width="570" height="270"
                                                        style="object-fit: cover">
                                                @endif
                                                <span class="latest-p-title">
                                                    <span class="p-title-1">{{ $items->name }}</span>
                                                    {{-- <span class="p-number">03 Products</span> --}}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @endif



                                @php $i++; @endphp
                            @endforeach





                            {{-- <div class="col-md-6 col-sm-12 grid-item col-xs-12">
                                <div class="latest-item">
                                    <a href="product-details.html">
                                        <img src="img/latest_products/1.jpg" alt="">
                                        <span class="latest-p-title">
                                            <span class="p-title-1">Luxury Cars trending 2018</span>
                                            <span class="p-number">03 Products</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 grid-item col-xs-12">
                                <div class="latest-item">
                                    <a href="product-details.html">
                                        <img src="img/latest_products/2.jpg" alt="">
                                        <span class="latest-p-title">
                                            <span class="p-title-1">Sedans 2017</span>
                                            <span class="p-number">06 Products</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 grid-item col-xs-12">
                                <div class="latest-item">
                                    <a href="product-details.html">
                                        <img src="img/latest_products/3.jpg" alt="">
                                        <div class="latest-p-title">
                                            <span class="p-title-1">VANS &amp; TRUCKS</span>
                                            <span class="p-number">02 Products</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 grid-item col-xs-12">
                                <div class="latest-item">
                                    <a href="product-details.html">
                                        <img src="img/latest_products/4.jpg" alt="">
                                        <div class="latest-p-title">
                                            <span class="p-title-1">Sport car</span>
                                            <span class="p-number">12 Products</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 grid-item col-xs-12">
                                <div class="latest-item">
                                    <a href="product-details.html">
                                        <img src="img/latest_products/5.jpg" alt="">
                                        <div class="latest-p-title">
                                            <span class="p-title-1">F1 2016 Mercedes</span>
                                            <span class="p-number">07 Products</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 grid-item col-xs-12">
                                <div class="latest-item">
                                    <a href="product-details.html">
                                        <img src="img/latest_products/6.jpg" alt="">
                                        <div class="latest-p-title">
                                            <span class="p-title-1">Trucks car</span>
                                            <span class="p-number">09 Products</span>
                                        </div>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <!-- Testimonials (v1) -->
    @if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
        <div class="testimonial-area bg-dark-2 ptb-150" style="background: black">
            <div class="container">
                <div class="section-title pb-100 text-center">
                    <h2>
                        {{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}
                    </h2>

                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="testimonial-carousel">
                            @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                                <div class="single-testi">
                                    <span><img
                                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}"
                                            alt="" width="65" height="65"
                                            style="object-fit: cover"></span>
                                    <p>
                                        {{ $storethemesetting['testimonial_description1'] }}
                                    </p>
                                    <span class="name-info">{{ $storethemesetting['testimonial_name1'] }} -
                                        {{ $storethemesetting['testimonial_about_us1'] }}</span>
                                </div>
                            @endif
                            @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                                <div class="single-testi">
                                    <span><img
                                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png'))) }}"
                                            alt="" width="65" height="65"
                                            style="object-fit: cover"></span>
                                    <p>
                                        {{ $storethemesetting['testimonial_description2'] }}
                                    </p>
                                    <span class="name-info">{{ $storethemesetting['testimonial_name2'] }} -
                                        {{ $storethemesetting['testimonial_about_us2'] }}</span>
                                </div>
                            @endif
                            @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                                <div class="single-testi">
                                    <span><img
                                            src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png'))) }}"
                                            alt="" width="65" height="65"
                                            style="object-fit: cover"></span>
                                    <p>
                                        {{ $storethemesetting['testimonial_description3'] }}
                                    </p>
                                    <span class="name-info">{{ $storethemesetting['testimonial_name3'] }} -
                                        {{ $storethemesetting['testimonial_about_us3'] }}</span>
                                </div>
                            @endif

                            {{-- <div class="single-testi">
                                <span><img src="img/testimonial/1.jpg" alt=""></span>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Pellentesque habitant morbi tristique senectus et netus sapien lorem tincidunt lorem
                                    Proin ac augue eu ante consecMauris tincidunt purus blandit arcu finibus. Aliquam a
                                    iaculis est, eu vehicula elit. sagittis ut ante eget...</p>
                                <div class="name-info">John doe - CEo aero</div>
                            </div>
                            <div class="single-testi">
                                <span><img src="img/testimonial/1.jpg" alt=""></span>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Pellentesque habitant morbi tristique senectus et netus sapien lorem tincidunt lorem
                                    Proin ac augue eu ante consecMauris tincidunt purus blandit arcu finibus. Aliquam a
                                    iaculis est, eu vehicula elit. sagittis ut ante eget...</p>
                                <div class="name-info">John doe - CEo aero</div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- Client Logo -->
    @if (isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on')
        <div class="service-area bg-dark-2 ptb-150">
            <div class="container text-center">
                {{-- <div class="section-title pb-100">
                <h5>Most Popular Services</h5>
                <h2>WE ARE OFFERING VEHICLE SERVICES 24/7</h2>
                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
            </div> --}}
                <div class="row custom">
                    @if (!empty($storethemesetting['brand_logo']))
                        @foreach (explode(',', $storethemesetting['brand_logo']) as $k => $value)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-service">
                                    @if (!empty($value) && \Storage::exists('uploads/store_logo/' . $value))
                                        <img src="{{ asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png')) }}"
                                            alt="Footer logo">
                                    @else
                                        <img src="{{ asset(Storage::url('uploads/store_logo/brand_logo.png')) }}"
                                            alt="Footer logo">
                                    @endif
                                    {{-- <span class="srv-icon"><img src="img/icon/audio.png" alt=""></span>
                                    <h5>Audio System INSTALLATION</h5>
                                    <span class="divider"></span>
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                        litterarum formas humanitatis per seacula.</p> --}}
                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <span class="srv-icon"><img src="img/icon/repair.png" alt=""></span>
                            <h5>Vehicle REPAIRING</h5>
                            <span class="divider"></span>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <span class="srv-icon"><img src="img/icon/wheel.png" alt=""></span>
                            <h5>Wheel BALANCING</h5>
                            <span class="divider"></span>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <span class="srv-icon"><img src="img/icon/painting.png" alt=""></span>
                            <h5>Auto Painting REPAIRING</h5>
                            <span class="divider"></span>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <span class="srv-icon"><img src="img/icon/replacement.png" alt=""></span>
                            <h5>cambelt replacement</h5>
                            <span class="divider"></span>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <span class="srv-icon"><img src="img/icon/engine.png" alt=""></span>
                            <h5>engine diagnostics</h5>
                            <span class="divider"></span>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula.</p>
                        </div>
                    </div> --}}
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
