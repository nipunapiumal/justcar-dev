@extends('storefront.layout.theme25')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Products') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Products') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Products -->
    <!-- Featured car start -->
    <div class="featured-car content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-left">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search2">
                            <h3 class="sidebar-title">{{ __('Search Filters') }}</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <form action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                id="frm-filter" method="get">
                                @csrf
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="vehicle_type_id" id="vehicle_type_id"
                                        data-url="{{ route('product.get-vehicle-brands', [$store->slug]) }}">
                                        <option value="">
                                            {{ __('Select Vehicle Type') }}
                                        </option>
                                        @foreach ($vehicleTypes as $vehicleType)
                                            <option value="{{ $vehicleType['id'] }}"
                                                {{ app('request')->input('vehicle_type_id') == $vehicleType['id'] ? 'selected' : '' }}>
                                                {{ $vehicleType->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                        data-url="{{ route('product.get-models', [$store->slug]) }}"
                                        {{ app('request')->input('vehicle_type_id') ? '' : 'disabled' }}>
                                        <option value="">
                                            {{ __('Select Make') }}
                                        </option>
                                        @foreach ($vehicleBrands as $vehicleBrand)
                                        <option value="{{ $vehicleBrand['id'] }}"
                                            {{ app('request')->input('brand_id') == $vehicleBrand['id'] ? 'selected' : '' }}>
                                            {{ $vehicleBrand->name }}
                                        </option>
                                    @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="model_id" id="model_id"
                                        {{ app('request')->input('brand_id') ? '' : 'disabled' }}>
                                        <option value="">
                                            {{ __('Select Model') }}
                                        </option>
                                        @foreach ($vehicleModels as $vehicleModel)
                                            <option value="{{ $vehicleModel['id'] }}"
                                                {{ app('request')->input('model_id') == $vehicleModel['id'] ? 'selected' : '' }}>
                                                {{ $vehicleModel->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="category_id" class="selectpicker search-fields" tabindex="-98">
                                        <option value="">{{ __('Select Category') }}</option>
                                        @foreach ($pro_categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ app('request')->input('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="search-button btn"> {{ __('Search') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <!-- Option bar start -->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5>{!! __('We found :count cars available for you', [
                                        'count' => $products[$categorie_name]->count(),
                                    ]) !!}</h5>
                                </div>
                            </div>
                            {{-- <div class="col-lg-7 col-md-6 col-sm-12">
                                <div class="sorting-options float-end">
                                    <a href="car-list-leftsidebar.html" class="change-view-btn float-right"><i
                                            class="fa fa-th-list"></i></a>
                                    <a href="car-grid-leftside.html"
                                        class="change-view-btn active-view-btn float-right"><i
                                            class="fa fa-th-large"></i></a>
                                </div>
                                <div class="sorting-options-3 float-end">
                                    <select class="selectpicker search-fields" name="default-order">
                                        <option>Default Order</option>
                                        <option>Price High to Low</option>
                                        <option>Price: Low to High</option>
                                        <option>Newest Properties</option>
                                        <option>Oldest Properties</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">

                        @if ($products[$categorie_name]->count() > 0)
                            @foreach ($products[$categorie_name] as $product)
                                @php
                                    $product->name = $product->getName();
                                @endphp
                                <div class="col-lg-6 col-md-6">
                                    <div class="car-box-3">
                                        <div class="car-thumbnail">
                                            <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}"
                                                class="car-img">
                                                {{-- <div class="for">For Sale</div> --}}
                                                <div class="price-box">
                                                    {{-- <span class="del"><del>$950.00</del></span> --}}
                                                    {{-- <br> --}}
                                                    <span>{{ \App\Models\Utility::priceFormat($product->price) }}
                                                        {{ $product->getNetPrice() }}</span>
                                                </div>
                                                @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                    <img class="d-block w-100" style="height:297px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                        alt="{{ $product->name }}">
                                                @else
                                                    <img class="d-block w-100" style="height:297px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="{{ $product->name }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <h1 class="title">
                                                <a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->name }}</a>
                                            </h1>
                                            <ul class="custom-list">
                                                <li>
                                                    <a
                                                        href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->product_category() }}</a>
                                                </li>

                                            </ul>

                                        </div>
                                        <div class="footer clearfix">
                                            <div class="pull-left ratings">
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
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 product-box">
                                <div class="card card-product">
                                    <h6 class="m-0 text-center no_record p-2"><i class="fas fa-ban"></i>
                                        {{ __('No Record Found') }}</h6>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured car end -->
@endsection
@push('script-page')
    {!! $storethemesetting['storejs'] !!}
@endpush
