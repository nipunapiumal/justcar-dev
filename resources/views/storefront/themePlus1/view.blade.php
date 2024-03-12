@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')


    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
        <div class="container-fluid">
            <div class="row align-items-center">


                <div class="col">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <div class="overflow-hidden pb-2">
                                <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp"
                                    data-appear-animation-delay="100">
                                    @if ($products->product_type == 1)
                                        {{ $products->name }}
                                    @else
                                        {{ $products->getName() }}
                                    @endif
                                    </h2>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn"
                                data-appear-animation-delay="300">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li class="active" aria-current="page">
                                    @if ($products->product_type == 1)
                                        {{ $products->name }}
                                    @else
                                        {{ $products->getName() }}
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">

                <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark nav-lg d-block overflow-hidden"
                    data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'autoHeight': true}"
                    style="height: 510px;">
                    @foreach ($products_image as $key => $productss)
                        <div>
                            <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                {{-- <img src="img/projects/project-short.jpg" class="" alt=""> --}}
                                @if (!empty($products_image[$key]->product_images))
                                    <img class="img-fluid border-radius-0"
                                        style="width: 1110px;height:540px;object-fit:cover"
                                        src="{{ asset(Storage::url('uploads/product_image/' . $products_image[$key]->product_images)) }}">
                                @else
                                    <img class="img-fluid border-radius-0"
                                        style="width: 1110px;height:540px;object-fit:cover"
                                        src="{{ asset(Storage::url('uploads/product_image/default.jpg')) }}">
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{-- <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="img/projects/project-short-2.jpg" class="img-fluid border-radius-0" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="img/projects/project-short-3.jpg" class="img-fluid border-radius-0" alt="">
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
        <div class="row pt-4 mt-2 mb-5">
            <div class="col-md-8 mb-4 mb-md-0">
                @if ($products->product_type == 1)
                    <h1 class="mb-0">{{ $products->name }}</h1>
                @else
                    <h1 class="mb-0">{{ $products->getName() }}</h1>
                @endif

                <h4 class="price mb-3 text-uppercase">
                    @if ($products->product_type == 1)
                        <span
                            class="sale text-color-dark">{{ \App\Models\Utility::priceFormat($products->last_price) }}</span>
                        <span class="amount">
                            @if ($products->enable_product_variant == 'on')
                                {{ \App\Models\Utility::priceFormat(0) }}
                            @else
                                {{ \App\Models\Utility::priceFormat($products->price) }}
                            @endif
                        </span>
                    @else
                        @if ($products->net_price)
                            <span class="sale text-color-dark">
                                {{ __('Net') }}
                                {{ \App\Models\Utility::priceFormat($products->net_price) }}
                            </span>
                        @endif
                        <span class="amount">
                            {{ __('Gross') }} {{ \App\Models\Utility::priceFormat($products->price) }}
                        </span>
                    @endif
                </h4>

                @if (!empty($products->description))
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        {{ __('DESCRIPTION') }}
                    </h2>

                    {!! $products->description !!}
                @endif
                {{-- <hr class="solid my-5"> --}}

                @if ($products->product_type == 1)
                    @if (!empty($products->specification))
                        <h2 class="text-color-dark font-weight-normal text-5 mb-2 text-uppercase">
                            {{ __('Product Specification') }}
                        </h2>

                        {!! $products->specification !!}
                    @endif
                    @if (!empty($products->detail))
                        <h2 class="text-color-dark font-weight-normal text-5 mb-2 text-uppercase">
                            {{ __('DETAILS') }}
                        </h2>

                        {!! $products->detail !!}
                    @endif
                @endif

                @if ($products->product_type == 2)
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        {{ __('Equipments') }}
                    </h2>
                    <ul>
                        @foreach (json_decode($products->equipments) as $key_equipment => $equipment)
                            <li>{{ $equipment }}</li>
                        @endforeach
                    </ul>

                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        {{ __('Interior Design') }}
                    </h2>

                    <ul>
                        @foreach (json_decode($products->interior_design) as $key_interior_design => $interior_design)
                            <li>{{ $interior_design }}</li>
                        @endforeach
                    </ul>
                @endif
                {{-- <hr class="solid my-5"> --}}
                {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
            </div>

            <div class="col-md-4">

                @if ($products->product_type == 1)
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

                        <a class="btn btn-danger border-0 text-3-5 font-weight-semi-bold btn-px-5 btn-py-3 d-none d-md-inline-block w-100 mb-2 {{ $btn_class }}"
                            {{ $btn_class == 'disabled' ? 'disabled' : '' }}
                            data-url="{{ route('store.addtowishlist', [$store->slug, $products->id]) }}"
                            data-csrf="{{ csrf_token() }}">
                            <span class="{{ $icon_class }} fa-heart"></span>
                            <span>{{ __('Save') }}</span>
                        </a>
                        <a class="btn btn-tertiary border-0 text-3-5 font-weight-semi-bold btn-px-5 btn-py-3 d-none d-md-inline-block w-100 mb-2 add_to_cart"
                            data-url="{{ route('user.addToCart', [$products->id, $store->slug, 'variation_id']) }}"
                            data-csrf="{{ csrf_token() }}">
                            <span class="fas fa-shopping-basket"></span>
                            <span>{{ __('Add to cart') }}</span>
                        </a>
                    @endif
                @endif

                {!! \App\Models\Advertisement::getAdvertisement($store, 2) !!}


                @if ($products->product_type == 1)
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        {{ __('DETAILS') }}
                    </h2>

                    <ul class="list list-icons list-primary list-borders text-2">
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Category') }}</strong>
                            {{ $products->product_category() }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('SKU') }}</strong>
                            {{ $products->SKU }}
                        </li>
                    </ul>
                @else
                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                        {{ __('SPECIFICATION') }}
                    </h2>

                    <ul class="list list-icons list-primary list-borders text-2">
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Vehicle Brand') }}</strong> {{ $vehicle_brand->name }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Vehicle Model') }}</strong> {{ $vehicle_model->name }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Vehicle Number') }}</strong>
                            {{ $products->vehicle_number }}
                        </li>
                        @if ($products->fin_number_display && $products->fin_number)
                            <li>
                                <i class="fas fa-caret-right left-10"></i><strong
                                    class="text-color-primary">{{ __('Fin Number') }}</strong>
                                {{ $products->fin_number }}
                            </li>
                        @endif

                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('First Register Year') }}</strong>
                            {{ $products->register_year }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('First Register Month') }}</strong>
                            {{ $products->register_month }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Millage (km)') }}</strong> {{ $products->millage }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Fuel Type') }}</strong> {{ $fuel_type->name }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Power') }}</strong> {{ $products->power }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Exterior Color') }}</strong>
                            {{ $products->exterior_color }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Metallic') }}</strong> {{ $products->is_metallic }}
                        </li>
                        <li>
                            <i class="fas fa-caret-right left-10"></i><strong
                                class="text-color-primary">{{ __('Interior Color') }}</strong>
                            {{ $products->interior_color }}
                        </li>

                    </ul>
                @endif
            </div>

        </div>

    </div>
@endsection
@push('script-page')
@endpush
@push('script-page')
@endpush
