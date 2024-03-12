@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
        <div class="banner-2">
            @php $i=0; @endphp
            @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                <div class="slide"
                    style="background-image: url('{{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }}');">
                    <div class="breadcrumb-area">
                        <h2>
                            {{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                        </h2>
                        <p>
                            {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                        </p>
                        {{-- <a class="btn-3 btn-defaults" href="#">
                            Read More <i class="arrow"></i>
                        </a> --}}
                    </div>
                </div>
                @php $i++; @endphp
            @endforeach
        </div>
    @else
        <!-- Banner start -->
        <div class="banner" id="banner">
            <div class="carousel-inner banner-slider-inner">
                <div class="carousel-item active item-bg">
                    <img class="d-block w-100 h-100"
                        src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['header_img']) ? $storethemesetting['header_img'] : 'home-banner.png'))) }}"
                        alt="banner">
                    <div class="carousel-content container banner-info-2 bi-2">
                        <div class="banner-content2">
                            <h2>{{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                            </h2>
                            <p>
                                {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                            </p>
                            {{-- <a class="btn-3 btn-defaults" href="#">
                            Get Started Now <i class="arrow"></i>
                        </a>
                        <a class="btn-4" href="#">
                            <span>Learn More</span> <i class="arrow"></i>
                        </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Slider Area End -->


    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <div class="service-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 align-self-center">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1>{{ __('Why Choose Us?') }}</h1>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p> --}}
                            {{-- <a class="btn-3 btn-defaults none-btn-992" href="services.html">
                            Read More <i class="arrow"></i>
                        </a> --}}
                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="row">
                            @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                                @if (isset($storethemesetting['features_icon1']))
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-info">
                                            <div class="number">1</div>
                                            <div class="icon">
                                                {!! $storethemesetting['features_icon1'] !!}
                                            </div>
                                            <div class="detail">
                                                <h5><a href="services.html">{{ $storethemesetting['features_title1'] }}</a>
                                                </h5>
                                                <p>{{ $storethemesetting['features_description1'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                                @if (isset($storethemesetting['features_icon2']))
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-info">
                                            <div class="number">2</div>
                                            <div class="icon">
                                                {!! $storethemesetting['features_icon2'] !!}
                                            </div>
                                            <div class="detail">
                                                <h5><a href="services.html">{{ $storethemesetting['features_title2'] }}</a>
                                                </h5>
                                                <p>{{ $storethemesetting['features_description2'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                                @if (isset($storethemesetting['features_icon3']))
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-info">
                                            <div class="number">3</div>
                                            <div class="icon">
                                                {!! $storethemesetting['features_icon3'] !!}
                                            </div>
                                            <div class="detail">
                                                <h5><a href="services.html">{{ $storethemesetting['features_title3'] }}</a>
                                                </h5>
                                                <p>{{ $storethemesetting['features_description3'] }}</p>
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

    <!-- Feature Products Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <div class="featured-car content-area">
            <div class="container">
                <!-- Main title -->
                <div class="main-title mt2">
                    <h1 class="mb-20">{{ __('Products') }}</h1>
                    {{-- <div class="list-inline-listing">
                        <ul class="filters filteriz-navigation clearfix">
                            <li class="active btn filtr-button filtr" data-filter="all"><span>All</span></li>
                            <li data-filter="1" class="btn btn-inline filtr-button filtr"><span>Apartment</span></li>
                            <li data-filter="2" class="btn btn-inline filtr-button filtr"><span>House</span></li>
                            <li data-filter="3" class="btn btn-inline filtr-button filtr"><span>Office</span></li>
                        </ul>
                    </div> --}}
                </div>
                <div class="row filter-portfolio">
                    <div class="cars">

                        @foreach ($product_list as $product)
                        @php
                            $product->name = $product->getName();
                        @endphp
                            {{-- @if ($items->count() > 0)
                                @foreach ($items as $product) --}}
                                    <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2">
                                        <div class="car-box">
                                            <div class="car-image">
                                                @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                    <img class="img-fluid" src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                        alt="car-photo"
                                                        style="width:100%;height:193px !important;object-fit:cover">
                                                @else
                                                    <img class="img-fluid" src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="car-photo" style="width:100%;height:293px;object-fit:cover">
                                                @endif

                                                {{-- <div class="tag">Featured</div> --}}
                                                <div class="facilities-list clearfix">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-way"></i> {{ $product->millage }}
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-calendar-1"></i>
                                                            {{ $product->register_year }}
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-manual-transmission"></i>
                                                            {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                                                        </li>
                                                        {{-- <li>
                                                           
                                                            <i class="flaticon-way"></i> {{ $fuel_type->name }}
                                                        </li> --}}
                                                        {{-- <li>
                                                            <i class="flaticon-calendar-1"></i> {{ $product->power }}
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-manual-transmission"></i>
                                                            {{ $product->prev_owners }}
                                                        </li> --}}
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="detail">
                                                <h1 class="title">
                                                    <a
                                                        href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                        {{ $product->name }}
                                                        <p class="price">
                                                            @if ($product->enable_product_variant == 'on')
                                                                {{ __('In variant') }}
                                                            @else
                                                                {{ \App\Models\Utility::priceFormat($product->price) }}
                                                            @endif
                                                        </p>
                                                    </a>
                                                </h1>

                                            </div>
                                            {{-- <div class="footer clearfix">
                                                
                                                
                                            </div> --}}
                                        </div>
                                    </div>
                                {{-- @endforeach
                            @endif --}}
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Feature Products Area End -->


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
                                            <a href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">
                                                @if (!empty($pro_categorie->categorie_img) &&
                                                    \Storage::exists('uploads/product_image/' . $product->categorie_img))
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
                                                <a href="{{ route('store.categorie.product', [$store->slug, $pro_categorie->name]) }}">{{ $pro_categorie->name }}</a>
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

     <!-- Testimonials (v1) -->
     @if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
     <div class="testimonial-2 content-area-5">
         <div class="container">

             <div class="row">
                 <div class="col-lg-4 align-self-center">
                     <!-- Main title -->
                     <div class="main-title main-title-3">
                         <h1> {{ !empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials' }}
                         </h1>
                         <p>
                             {{ !empty($storethemesetting['testimonial_main_heading_title']) ? $storethemesetting['testimonial_main_heading_title'] : 'Testimonials' }}
                         </p>
                         {{-- <a class="btn-3 btn-defaults none-btn-992" href="contact.html">
                             Get In Touch <i class="arrow"></i>
                         </a> --}}
                     </div>
                 </div>
                 <div class="col-lg-7 offset-lg-1">
                     <div class="featured-slider row slide-box-btn slider"
                         data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                         @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                             <div class="slide slide-box">
                                 <div class="testimonial-info-box">
                                     <div class="profile-user">
                                         <div class="avatar">
                                             <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}"
                                                 alt="testimonial-2">
                                         </div>
                                     </div>
                                     <h5>
                                         <a href="#">{{ $storethemesetting['testimonial_name1'] }} </a>
                                     </h5>
                                     <h6>{{ $storethemesetting['testimonial_about_us1'] }}</h6>
                                     <p><i class="fa fa-quote-left"></i>
                                         {{ $storethemesetting['testimonial_description1'] }}
                                         <i class="fa fa-quote-right"></i>
                                     </p>
                                 </div>
                             </div>
                         @endif
                         @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                             <div class="slide slide-box">
                                 <div class="testimonial-info-box">
                                     <div class="profile-user">
                                         <div class="avatar">
                                             <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png'))) }}"
                                                 alt="testimonial-2">
                                         </div>
                                     </div>
                                     <h5>
                                         <a href="#">{{ $storethemesetting['testimonial_name2'] }} </a>
                                     </h5>
                                     <h6>{{ $storethemesetting['testimonial_about_us2'] }}</h6>
                                     <p><i class="fa fa-quote-left"></i>
                                         {{ $storethemesetting['testimonial_description2'] }}
                                         <i class="fa fa-quote-right"></i>
                                     </p>
                                 </div>
                             </div>
                         @endif
                         @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                             <div class="slide slide-box">
                                 <div class="testimonial-info-box">
                                     <div class="profile-user">
                                         <div class="avatar">
                                             <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png'))) }}"
                                                 alt="testimonial-2">
                                         </div>
                                     </div>
                                     <h5>
                                         <a href="#">{{ $storethemesetting['testimonial_name3'] }} </a>
                                     </h5>
                                     <h6>{{ $storethemesetting['testimonial_about_us3'] }}</h6>
                                     <p><i class="fa fa-quote-left"></i>
                                         {{ $storethemesetting['testimonial_description3'] }}
                                         <i class="fa fa-quote-right"></i>
                                     </p>
                                 </div>
                             </div>
                         @endif
                     </div>
                 </div>
             </div>

         </div>
     </div>
 @endif

    <!-- Gallery-->
    @if (isset($storethemesetting['enable_gallery']) &&
        $storethemesetting['enable_gallery'] == 'on' &&
        !empty($pro_categories))
        @if ($storethemesetting['enable_gallery'] == 'on')
            <div class="latest-offers-section content-area-13">
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
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                @php $i=0; @endphp
                                @foreach ($gallery_categories_ as $items)
                                    @php
                                        // print_r($items);
                                    @endphp
                                    @if ($i == 0)
                                        <div class="col-md-6 col-sm-12">
                                            <div class="latest-offers-box">
                                                <div class="latest-offers-box-inner">
                                                    <div class="latest-offers-box-overflow">
                                                        <div class="latest-offers-box-photo">
                                                            @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                                                <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                                    alt="" width="570" height="270"
                                                                    style="object-fit: cover">
                                                            @else
                                                                <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                    alt="" width="570" height="270"
                                                                    style="object-fit: cover">
                                                            @endif
                                                            {{-- <img class="img-fluid" src="img/latest-offers/img-1.png"
                                                                alt="latest-offers"> --}}
                                                        </div>
                                                        <div class="info">
                                                            {{-- <div class="price-box-2"><sup>$</sup>650<span>/month</span>
                                                            </div> --}}
                                                            <h3>
                                                                <a href="{{ route('store.gallery', $store->slug) }}">
                                                                    {{ $items->name }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        {{-- <div class="new">New</div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($i == 1 || $i == 2 || $i == 3 || $i == 4)
                                        <div class="col-md-3 col-sm-6">
                                            <div class="latest-offers-box">
                                                <div class="latest-offers-box-inner">
                                                    <div class="latest-offers-box-overflow">
                                                        <div class="latest-offers-box-photo">
                                                            @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                                                <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                                    alt="" width="570" height="270"
                                                                    style="object-fit: cover">
                                                            @else
                                                                <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                    alt="" width="570" height="270"
                                                                    style="object-fit: cover">
                                                            @endif
                                                            {{-- <img class="img-fluid" src="img/latest-offers/img-1.png"
                                                            alt="latest-offers"> --}}
                                                        </div>
                                                        <div class="info">
                                                            {{-- <div class="price-box-2"><sup>$</sup>650<span>/month</span>
                                                        </div> --}}
                                                            <h3>
                                                                <a href="{{ route('store.gallery', $store->slug) }}">
                                                                    {{ $items->name }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        {{-- <div class="new">New</div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($i == 5)
                                        <div class="col-md-6 col-sm-12">
                                            <div class="latest-offers-box">
                                                <div class="latest-offers-box-inner">
                                                    <div class="latest-offers-box-overflow">
                                                        <div class="latest-offers-box-photo">
                                                            @if (!empty($items->categorie_img) && \Storage::exists('uploads/gallery_image/' . $items->categorie_img))
                                                                <img src="{{ asset(Storage::url('uploads/gallery_image/' . $items->categorie_img)) }}"
                                                                    alt="" width="570" height="270"
                                                                    style="object-fit: cover">
                                                            @else
                                                                <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                    alt="" width="570" height="270"
                                                                    style="object-fit: cover">
                                                            @endif
                                                            {{-- <img class="img-fluid" src="img/latest-offers/img-1.png"
                                                            alt="latest-offers"> --}}
                                                        </div>
                                                        <div class="info">
                                                            {{-- <div class="price-box-2"><sup>$</sup>650<span>/month</span>
                                                        </div> --}}
                                                            <h3>
                                                                <a href="{{ route('store.gallery', $store->slug) }}">
                                                                    {{ $items->name }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        {{-- <div class="new">New</div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @php $i++; @endphp
                                @endforeach

                            </div>
                        </div>
                        {{-- <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="latest-offers-box">
                    <div class="latest-offers-box-inner">
                        <div class="latest-offers-box-overflow">
                            <div class="latest-offers-box-photo">
                                <div class="latest-offers-box-photodd">
                                    <img class="img-fluid big-img" src="img/latest-offers/img-4.png" alt="latest-offers">
                                </div>
                            </div>
                            <div class="info">
                                <div class="price-box-2"><sup>$</sup>480<span>/month</span></div>
                                <h3 class="category-title">
                                    <a href="car-details.html">Red ferrari Car 2018</a>
                                </h3>
                            </div>
                            <div class="new">New</div>
                        </div>
                    </div>
                </div>
            </div> --}}
                    </div>
                </div>
            </div>
        @endif
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
