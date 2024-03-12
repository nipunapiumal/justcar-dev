@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')
    <!-- Details banner start -->
    <div class="details-banner">
        <div class="container-fluid">
            <div class="featured-slider row slide-box-btn slider"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach ($products_image as $key => $product)
                    <div class="slide slide-box">
                        <div class="banner-img">
                            @if (!empty($products_image[$key]->product_images))
                                <img class="img-fluid bp" style="width: 467px;height:500px;object-fit:cover"
                                    src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}"
                                    alt="">
                            @else
                                <img class="img-fluid bp" style="width: 467px;height:500px;object-fit:cover"
                                    src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}" alt="">
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="breadcrumb-area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 clearfix">
                        <div class="text text-start">
                            @if ($products->product_type == 1)
                                <h1>{{ $products->name }}</h1>
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
                                {{-- <div class="ratings-2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>( 37 Reviews )</span>
                                </div> --}}
                            @else
                                <h1>{{ $products->getName() }}</h1>
                                <div class="ratings-2">
                                    <span>
                                        @if ($products->net_price)
                                            <small class="mr15">
                                                <del>{{ __('Net') }}
                                                    {{ \App\Models\Utility::priceFormat($products->net_price) }}</del>
                                            </small>
                                        @endif
                                        {{ __('Gross') }} {{ \App\Models\Utility::priceFormat($products->price) }}
                                    </span>
                                </div>
                            @endif

                        </div>
                    </div>
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

                        <div class="col-lg-6 text-end">
                            <div class="cover-buttons">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="{{ $btn_class }}"
                                            {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                                            data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                                            data-csrf="{{ csrf_token() }}">
                                            <i class="{{ $icon_class }} fa-heart"></i>
                                            {{ __('Save') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="add_to_cart"
                                            data-url="{{ route('user.addToCart', [$products->id, $store->slug, 'variation_id']) }}"
                                            data-csrf="{{ csrf_token() }}">
                                            <i class="fas fa-shopping-basket"></i>
                                            {{ __('Add to cart') }}
                                        </a>
                                    </li>
                                    {{-- <li><a href="#">Contact Us</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Details banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="car-details-section">
                        <!-- Advanced search start -->
                        <div class="widget-2 advanced-search bg-grea-2 as-2">
                            <h3 class="sidebar-title">Refine Your Search</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul>
                                <li>
                                    <span>Make</span>Ferrari
                                </li>
                                <li>
                                    <span>Model</span>Maxima
                                </li>
                                <li>
                                    <span>Body Style</span>Convertible
                                </li>
                                <li>
                                    <span>Year</span>2017
                                </li>
                                <li>
                                    <span>Condition</span>Brand New
                                </li>
                                <li>
                                    <span>Mileage</span>34,000 mi
                                </li>
                                <li>
                                    <span>Interior Color</span>Dark Grey
                                </li>
                                <li>
                                    <span>Transmission</span>6-speed Manual
                                </li>
                                <li>
                                    <span>Engine</span>3.4L Mid-Engine V6
                                </li>
                                <li>
                                    <span>No. of Gears:</span>5
                                </li>
                                <li>
                                    <span>Location</span>Toronto
                                </li>
                                <li>
                                    <span>Fuel Type</span>Gasoline Fuel
                                </li>
                            </ul>
                        </div>

                        @if ($products->product_type == 1)
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h3>{{ $products->SKU }}</h3>
                                    <p>
                                        {{-- <i class="flaticon-pin"></i>123 Kathal St. Tampa City, --}}
                                        {{ __('Category') }} -
                                        {{ $products->product_category() }}
                                    </p>
                                </div>
                                <div class="">
                                    <div class="price-box-3">
                                        {{-- <sup>$</sup> --}}
                                        @if ($products->enable_product_variant == 'on')
                                            {{ \App\Models\Utility::priceFormat(0) }}
                                        @else
                                            {{ \App\Models\Utility::priceFormat($products->price) }}
                                        @endif
                                        <span>/<del>{{ \App\Models\Utility::priceFormat($products->last_price) }}</del></span>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <!-- Tabbing box start -->
                        <div class="tabbing tabbing-box mb-40">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                @if ($products->product_type == 1)
                                    @if (!empty($products->specification))
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-uppercase" id="specification-tab"
                                                data-bs-toggle="tab" data-bs-target="#specification" type="button"
                                                role="tab" aria-controls="specification"
                                                aria-selected="true">{{ __('Product Specification') }}</button>
                                        </li>
                                    @endif
                                    @if (!empty($products->detail))
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-uppercase" id="detail-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail" type="button" role="tab"
                                                aria-controls="detail" aria-selected="true">{{ __('DETAILS') }}</button>
                                        </li>
                                    @endif
                                @else
                                    @if (!empty($products->description))
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-uppercase" id="description-tab"
                                                data-bs-toggle="tab" data-bs-target="#description" type="button"
                                                role="tab" aria-controls="description"
                                                aria-selected="true">{{ __('DESCRIPTION') }}</button>
                                        </li>
                                    @endif
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-uppercase" id="features-tab" data-bs-toggle="tab"
                                            data-bs-target="#features" type="button" role="tab"
                                            aria-controls="features" aria-selected="true">{{ __('Features') }}</button>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                @if ($products->product_type == 1)
                                    @if (!empty($products->specification))
                                        <div class="tab-pane fade show active" id="specification" role="tabpanel"
                                            aria-labelledby="specification-tab">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="car-specification mb-50">
                                                        <h3 class="heading-2 text-uppercase">
                                                            {{ __('Product Specification') }}
                                                            {{-- <span class="float-end body-color fz13">{{ __('ID') }}
                                                                #{{ $products->SKU }}
                                                            </span> --}}
                                                        </h3>
                                                        <p>
                                                            {!! $products->specification !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($products->detail))
                                        <div class="tab-pane fade show" id="detail" role="tabpanel"
                                            aria-labelledby="detail-tab">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="car-detail mb-50">
                                                        <h3 class="heading-2 text-uppercase">
                                                            {{ __('DETAILS') }}
                                                        </h3>
                                                        <p>
                                                            {!! $products->detail !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if (!empty($products->description))
                                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                                            aria-labelledby="description-tab">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="car-description mb-50">
                                                        <h3 class="heading-2 text-uppercase">
                                                            {{ __('DESCRIPTION') }}
                                                        </h3>
                                                        <p>
                                                            {!! $products->description !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="tab-pane fade" id="features" role="tabpanel"
                                        aria-labelledby="features-tab">
                                        <div class="accordion accordion-flush" id="accordionFlushExample2">
                                            <div class="accordion-item">
                                                <div class="features-info mb-50">
                                                    <h3 class="heading-2 text-uppercase">{{ __('Equipments') }}</h3>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <ul>
                                                                @foreach (json_decode($products->equipments) as $key_equipment => $equipment)
                                                                    <li>{{ $equipment }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="features-info mb-50">
                                                    <h3 class="heading-2 text-uppercase">{{ __('Interior Design') }}</h3>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <ul>
                                                                @foreach (json_decode($products->interior_design) as $key_interior_design => $interior_design)
                                                                    <li>{{ $interior_design }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif





                            </div>
                        </div>

                    </div>
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>
                <div class="col-lg-4 col-md-12">
                    {!! \App\Models\Advertisement::getAdvertisement($store, 2) !!}
                    <div class="sidebar-right">
                        @if ($products->product_type == 1)
                        @else
                            <!-- Advanced search start -->
                            <div class="widget advanced-search d-none-992">
                                <h3 class="sidebar-title">{{ __('SPECIFICATION') }}</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
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
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Properties details page end -->
@endsection
