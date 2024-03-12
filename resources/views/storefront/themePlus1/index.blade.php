@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
        <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs nav-style-1 nav-arrows-thin nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0"
            data-plugin-options="{'autoplay': true, 'autoplayTimeout': 700000}" style="height: 800px;">
            <div class="owl-stage-outer">
                <div class="owl-stage">

                    @php $i=0; @endphp
                    @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                        <!-- Carousel Slide 1 -->
                        <div class="owl-item position-relative overflow-hidden">
                            <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                                data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s"
                                data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                                style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}'); background-size: cover; background-position: center;">
                            </div>
                            <div class="container-fluid h-100 px-lg-5 mx-lg-5 pb-5">
                                <div class="row h-100 p-relative z-index-1 gx-5 pb-5">
                                    <div class="col">
                                        <div class="p-absolute top-50pct appear-animation"
                                            data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"
                                            data-plugin-options="{'minWindowWidth': 0}">
                                            <h3
                                                class="text-color-light rotate-r-90 font-weight-bold ls-0 p-relative left-0 custom-font-size-1 pe-5 ws-nowrap">
                                                {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                            </h3>
                                        </div>
                                        <div class="p-absolute top-50pct appear-animation"
                                            data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="300"
                                            data-plugin-options="{'minWindowWidth': 0}">
                                            <h3
                                                class="custom-stroke-text-effect-1 color-transparent rotate-r-90 font-weight-bold ls-0 p-relative custom-text-pos-1 custom-font-size-1 pe-5 ws-nowrap">
                                                {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel Slide 2 -->
                        {{-- <div class="owl-item position-relative overflow-hidden">
                            <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                                data-appear-animation="kenBurnsToRight" data-appear-animation-duration="30s"
                                data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                                style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}'); background-size: cover; background-position: center;">
                            </div>
                            <div class="container-fluid h-100 px-lg-5 mx-lg-5 pb-5 text-end">
                                <div class="row h-100 p-relative z-index-1 gx-5 pb-5">
                                    <div class="col">
                                        <h3
                                            class="text-color-light rotate-r-90 font-weight-bold ls-0 p-absolute top-50pct right-0 custom-font-size-1 pe-5 ws-nowrap">
                                            We Delivery</h3>
                                        <h3
                                            class="custom-stroke-text-effect-1 color-transparent rotate-r-90 font-weight-bold ls-0 p-absolute top-50pct custom-text-pos-2 custom-font-size-1 pe-5 ws-nowrap">
                                            We Delivery</h3>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        @php $i++; @endphp
                    @endforeach






                </div>
            </div>
            <div class="owl-nav">
                <button type="button" role="presentation" class="owl-prev"></button>
                <button type="button" role="presentation" class="owl-next"></button>
            </div>
        </div>
    @else
        <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs nav-style-1 nav-arrows-thin nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0"
            data-plugin-options="{'autoplay': true, 'autoplayTimeout': 700000}" style="height: 800px;">
            <div class="owl-stage-outer">
                <div class="owl-stage">

                    <!-- Carousel Slide 1 -->
                    <div class="owl-item position-relative overflow-hidden">
                        <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                            data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s"
                            data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                            style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}'); background-size: cover; background-position: center;">
                        </div>
                        <div class="container-fluid h-100 px-lg-5 mx-lg-5 pb-5">
                            <div class="row h-100 p-relative z-index-1 gx-5 pb-5">
                                <div class="col">
                                    <div class="p-absolute top-50pct appear-animation"
                                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"
                                        data-plugin-options="{'minWindowWidth': 0}">
                                        <h3
                                            class="text-color-light rotate-r-90 font-weight-bold ls-0 p-relative left-0 custom-font-size-1 pe-5 ws-nowrap">
                                            {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                                        </h3>
                                    </div>
                                    <div class="p-absolute top-50pct appear-animation"
                                        data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="300"
                                        data-plugin-options="{'minWindowWidth': 0}">
                                        <h3
                                            class="custom-stroke-text-effect-1 color-transparent rotate-r-90 font-weight-bold ls-0 p-relative custom-text-pos-1 custom-font-size-1 pe-5 ws-nowrap">
                                            {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
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

    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <div class="container-fluid p-0 mx-0 custom-carousel-1-wrapper">
            <div class="row gx-0">
                <div class="col-lg-4">
                    <div class="custom-carouse-1-title bg-tertiary p-2 mt-5">
                        <h4 class="text-color-light text-6 font-weight-semi-bold d-block text-center text-lg-end p-3 m-0">
                            <span class="d-block me-lg-5 pe-lg-4 p-relative bottom-2"><span
                                    class="d-inline-block appear-animation" data-appear-animation="fadeInUpShorterPlus"
                                    data-appear-animation-delay="0">{{ __('Why Choose Us?') }}</span></span>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="carousel-half-full-width-wrapper carousel-half-full-width-right custom-carousel-1">
                        <div class="owl-carousel owl-theme carousel-half-full-width-right nav-bottom nav-bottom-align-left nav-style-1 nav-light nav-arrows-thin nav-font-size-lg mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 1,  'autoplay': true, 'autoplayTimeout': 3000}, '768': {'items': 1,  'autoplay': true, 'autoplayTimeout': 3000}, '992': {'items': 2}, '1200': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 0}">
                            @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                                @if (isset($storethemesetting['features_icon1']))
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        {!! $storethemesetting['features_icon1'] !!}
                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            {{ $storethemesetting['features_title1'] }}</h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            {{ $storethemesetting['features_description1'] }}
                                                        </p>
                                                        {{-- <a href="#"
                                                        class="text-uppercase text-2-5 stretched-link text-decoration-underline text-color-primary text-color-hover-tertiary font-weight-semi-bold transition-2ms d-inline-block">View
                                                        More</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                                @if (isset($storethemesetting['features_icon2']))
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        {!! $storethemesetting['features_icon2'] !!}
                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            {{ $storethemesetting['features_title2'] }}</h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            {{ $storethemesetting['features_description2'] }}
                                                        </p>
                                                        {{-- <a href="#"
                                                        class="text-uppercase text-2-5 stretched-link text-decoration-underline text-color-primary text-color-hover-tertiary font-weight-semi-bold transition-2ms d-inline-block">View
                                                        More</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                                @if (isset($storethemesetting['features_icon3']))
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        {!! $storethemesetting['features_icon3'] !!}
                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            {{ $storethemesetting['features_title3'] }}</h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            {{ $storethemesetting['features_description3'] }}
                                                        </p>
                                                        {{-- <a href="#"
                                                        class="text-uppercase text-2-5 stretched-link text-decoration-underline text-color-primary text-color-hover-tertiary font-weight-semi-bold transition-2ms d-inline-block">View
                                                        More</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                                @if (isset($storethemesetting['features_icon2']))
                                    <div class="anim-hover-translate-top-10px transition-3ms">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="d-flex flex-row">
                                                    <div class="pt-2 text-color-primary" style="font-size: 30px">
                                                        {!! $storethemesetting['features_icon2'] !!}
                                                    </div>
                                                    <div class="ps-4">
                                                        <h4 class="mb-2 text-5 font-weight-semi-bold">
                                                            {{ $storethemesetting['features_title2'] }}</h4>
                                                        <p class="mb-2 font-weight-medium text-3">
                                                            {{ $storethemesetting['features_description2'] }}
                                                        </p>
                                                        {{-- <a href="#"
                                                        class="text-uppercase text-2-5 stretched-link text-decoration-underline text-color-primary text-color-hover-tertiary font-weight-semi-bold transition-2ms d-inline-block">View
                                                        More</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- <section class="border-0 section-intro">
        <div class="container py-5 mt-5">
            <div class="row mt-4">
                <div class="col-lg-5">
                    <p class="custom-drop-caps font-weight-medium text-4"><span
                            class="custom-drop-caps-number text-color-dark negative-ls-1"><span
                                class="d-inline-block appear-animation" data-appear-animation="fadeIn"
                                data-appear-animation-delay="0">35</span></span> years in business and cras a elit sit amet
                        leo accumsan vo lutpat su spendisse hendrerit amet leo.</p>
                    <p class="m-0"><a href="#"
                            class="text-uppercase text-3-5 text-decoration-underline text-color-primary text-color-hover-tertiary font-weight-semi-bold transition-3ms d-inline-block">View
                            More About Us</a></p>
                </div>
                <div class="d-none d-lg-block col-lg-1 text-center">
                    <div class="vr bg-primary opacity-10 custom-vr-1"></div>
                </div>
                <div class="pb-5 pb-lg-0 my-5 my-lg-0 col-lg-6">
                    <p
                        class="font-weight-medium text-8 line-height-4 text-color-tertiary negative-ls-1 p-relative bottom-10">
                        <span class="d-lg-inline-block appear-animation" data-appear-animation="fadeInUpShorterPlus"
                            data-appear-animation-delay="0">We are <strong>committed</strong> to providing our</span> <span
                            class="d-lg-inline-block appear-animation" data-appear-animation="fadeInUpShorterPlus"
                            data-appear-animation-delay="200">clients the best logistic and</span><span
                            class="d-lg-inline-block appear-animation" data-appear-animation="fadeInUpShorterPlus"
                            data-appear-animation-delay="400"> transportation services.</span>
                    </p>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Feature Products Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <section class="border-0 custom-bg-color-grey-1" style="margin-top: 200px">
            <div class="container py-5">
                <div class="row pb-3">
                    <div class="col pb-5 mb-3">

                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0 custom-el-pos-1"
                            data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                            @foreach ($product_list as $product)
                                @php
                                    $product->name = $product->getName();
                                @endphp

                                <div>
                                    <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                        <span
                                            class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                            @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                <img style="width: 359px;height:359px;object-fit:cover"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                    class="img-fluid" alt="">
                                            @else
                                            @endif

                                            <span
                                                class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                                <span class="thumb-info-swap-content-wrapper">
                                                    <span class="thumb-info-inner text-3-5 pb-2">
                                                        {{ $product->name }}
                                                    </span>
                                                    <span class="thumb-info-inner text-2">
                                                        <p
                                                            class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                            {{ \App\Models\Utility::priceFormat($product->price) }}
                                                        </p>
                                                        <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                                            class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                            {{ __('More') }}</a>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Feature Products Area End -->

    <!-- Feature Products Area Start -->
    @if (
        \App\Models\Utility::isProductPlanActive(\App\Models\User::find($store->created_by)) &&
            $products_type1->count() > 0)
        <section class="border-0 custom-bg-color-grey-1">
            <div class="container py-5">
                <div class="row pt-5">
                    <div class="col">
                        <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                data-appear-animation="fadeInUpShorterPlus"
                                data-appear-animation-delay="0">{{ __('Products') }}</span>
                        </h2>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col pb-5 mb-3">
                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                            @foreach ($products_type1 as $product)
                            <div>
                                <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span
                                        class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                            <img style="width: 359px;height:359px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                class="img-fluid" alt="">
                                        @else
                                        @endif

                                        <span
                                            class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-3-5 pb-2">
                                                    {{ $product->name }}
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p
                                                        class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                        {{ \App\Models\Utility::priceFormat($product->price) }}
                                                    </p>
                                                    <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                                        class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                        {{ __('More') }}</a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
        
        
        
        
       
    @endif
    <!-- Feature Products Area End -->


    <!-- Testimonials (v1) -->
    @if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
        <section class="border-0 text-center custom-el-pos-2">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                data-appear-animation="fadeInUpShorterPlus"
                                data-appear-animation-delay="0">{{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}</span>
                        </h2>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <div class="pb-3">
                            <img width="68"
                                src="{{ asset('assets/themePlus1/img/demos/transportation-logistic/icons/quote.svg') }}"
                                alt="" data-icon
                                data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-tertiary'}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">
                            @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                                <div>
                                    {{-- {{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }} --}}
                                    <div class="testimonial testimonial-style-5 px-lg-5 mx-lg-5">
                                        <blockquote>
                                            <p class="mb-0 line-height-8 font-weight-medium text-4">
                                                {{ $storethemesetting['testimonial_description1'] }}
                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author border-0">
                                            <p><strong
                                                    class="font-weight-extra-bold pt-2">{{ $storethemesetting['testimonial_name1'] }}</strong><span>
                                                    {{ $storethemesetting['testimonial_about_us1'] }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                                <div>
                                    {{-- {{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }} --}}
                                    <div class="testimonial testimonial-style-5 px-lg-5 mx-lg-5">
                                        <blockquote>
                                            <p class="mb-0 line-height-8 font-weight-medium text-4">
                                                {{ $storethemesetting['testimonial_description2'] }}
                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author border-0">
                                            <p><strong
                                                    class="font-weight-extra-bold pt-2">{{ $storethemesetting['testimonial_name2'] }}</strong><span>
                                                    {{ $storethemesetting['testimonial_about_us2'] }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                                <div>
                                    {{-- {{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }} --}}
                                    <div class="testimonial testimonial-style-5 px-lg-5 mx-lg-5">
                                        <blockquote>
                                            <p class="mb-0 line-height-8 font-weight-medium text-4">
                                                {{ $storethemesetting['testimonial_description3'] }}
                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author border-0">
                                            <p><strong
                                                    class="font-weight-extra-bold pt-2">{{ $storethemesetting['testimonial_name3'] }}</strong><span>
                                                    {{ $storethemesetting['testimonial_about_us3'] }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif



    <!-- Products categories-->
    @if (isset($storethemesetting['enable_categories']) &&
            $storethemesetting['enable_categories'] == 'on' &&
            !empty($pro_categories))
        @if ($storethemesetting['enable_categories'] == 'on')
            <section class="border-0 custom-bg-color-grey-1">
                <div class="container py-5">
                    <div class="row pt-5">
                        <div class="col">
                            <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                    data-appear-animation="fadeInUpShorterPlus"
                                    data-appear-animation-delay="0">{{ !empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories' }}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col pb-5 mb-3">
                            <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                                data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                                @foreach ($pro_categories as $key => $pro_categorie)
                                    @if ($product_count[$key] > 0)
                                        <div>
                                            <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                                <span
                                                    class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                                    @if (!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $product->categorie_img))
                                                        <img alt="Image placeholder"
                                                            src="{{ asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img)) }}"
                                                            class="img-fluid"
                                                            style="width: 359px;height:359px;object-fit:cover">
                                                    @else
                                                        <img alt="Image placeholder"
                                                            src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}"
                                                            class="img-fluid"
                                                            style="width: 359px;height:359px;object-fit:cover">
                                                    @endif

                                                    <span
                                                        class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                                        <span class="thumb-info-swap-content-wrapper">
                                                            <span class="thumb-info-inner text-3-5 pb-2">
                                                                {{ $pro_categorie->name }}
                                                            </span>
                                                            <span class="thumb-info-inner text-2">
                                                                <p
                                                                    class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                                    {{ !empty($product_count[$key]) ? $product_count[$key] : '0' }}
                                                                    {{ __('Products') }}
                                                                </p>
                                                                <a href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}"
                                                                    class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                                    {{ __('Show more products') }}</a>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
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
            <section class="border-0">
                <div class="container py-5">
                    <div class="row pt-5">
                        <div class="col">
                            <h2 class="custom-heading-1"><span class="d-inline-block appear-animation"
                                    data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="0">
                                    {{ !empty($storethemesetting['gallery_title']) ? $storethemesetting['gallery_title'] : __('Gallery') }}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pb-5">
                            <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                                data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

                                @php $i=0; @endphp
                                @foreach ($gallery_categories_ as $items)
                                    <div>
                                        <span class="thumb-info thumb-info-swap-content anim-hover-inner-wrapper">
                                            <span
                                                class="thumb-info-wrapper overlay overlay-show overlay-gradient-bottom-content">
                                                @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                                    <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                        alt="" style="width: 359px;height:359px;object-fit:cover">
                                                @else
                                                    <img class="img-fluid"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="" style="width: 359px;height:359px;object-fit:cover">
                                                @endif

                                                <span
                                                    class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0 text-center">
                                                    <span class="thumb-info-swap-content-wrapper">
                                                        <span class="thumb-info-inner text-3-5 pb-2">
                                                            {{ $items->name }}
                                                        </span>
                                                        <span class="thumb-info-inner text-2">
                                                            <p
                                                                class="px-5 text-2 opacity-7 font-weight-medium text-light ls-0">
                                                                {{ $items->name }}
                                                            </p>
                                                            <a href="{{ route('store.gallery', [$store->slug, $items->id]) }}"
                                                                class="btn border-0 px-3 py-1 line-height-8 btn-primary ls-0">
                                                                {{ __('More') }}</a>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif


    <!-- Client Logo -->
    @if (isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on')
        <section class="section border-0 bg-light m-0 p-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="owl-carousel owl-theme nav-dark nav-style-1 nav-arrows-thin nav-font-size-lg nav-outside mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 3}, '479': {'items': 3}, '768': {'items': 4}, '979': {'items': 4}, '1199': {'items': 6}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 40}">
                            @if (!empty($storethemesetting['brand_logo']))
                                @foreach (explode(',', $storethemesetting['brand_logo']) as $k => $value)
                                    <div>
                                        @if (!empty($value) && \Storage::exists('uploads/store_logo/' . $value))
                                            <img class="img-fluid"
                                                src="{{ asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png')) }}"
                                                alt="Footer logo">
                                        @else
                                            <img class="img-fluid"
                                                src="{{ asset(Storage::url('uploads/store_logo/brand_logo.png')) }}"
                                                alt="Footer logo">
                                        @endif
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="container py-5 mt-4">
                <div class="row align-items-center text-center">
                    @if (!empty($storethemesetting['brand_logo']))
                        @foreach (explode(',', $storethemesetting['brand_logo']) as $k => $value)
                            <div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
                                @if (!empty($value) && \Storage::exists('uploads/store_logo/' . $value))
                                    <img class="img-fluid"
                                        src="{{ asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png')) }}"
                                        alt="Footer logo">
                                @else
                                    <img class="img-fluid"
                                        src="{{ asset(Storage::url('uploads/store_logo/brand_logo.png')) }}"
                                        alt="Footer logo">
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div> --}}
        </section>
    @endif







@endsection
@push('script-page')
@endpush
