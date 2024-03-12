@extends('storefront.layout.theme6_')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb style2 bgc-white bt1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">{{ __('Products') }}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Products') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Grid View -->
    <section class="our-listing pt0 bgc-white pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="listing_sidebar">
                        <div class="sidebar_content_details style3">
                            <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                            <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
                                <div class="siderbar_widget_header">
                                    <h4 class="title mb0">{{__('Search Filters')}}<a class="filter_closed_btn float-end"
                                            href="#"><span class="fas fa-times"></span></a></h4>
                                </div>
                                <div class="sidebar_advanced_search_widget">
                                    <form action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                        id="frm-filter" method="get">
                                        @csrf
                                        <ul class="sasw_list mb0">
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select tabindex="-98" name="vehicle_type_id" id="vehicle_type_id"
                                                            class="selectpicker w100 show-tick" data-toggle="select"
                                                            data-url="{{ route('product.get-vehicle-brands',[$store->slug]) }}">
                                                            <option value="">{{ __('Select Vehicle Type') }}</option>
                                                            @foreach ($vehicleTypes as $vehicleType)
                                                                <option value="{{ $vehicleType['id'] }}"
                                                                    {{ app('request')->input('vehicle_type_id') == $vehicleType['id'] ? 'selected' : '' }}>
                                                                    {{ $vehicleType->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select tabindex="-98" name="brand_id" id="brand_id"
                                                                class="selectpicker w100 show-tick" data-toggle="select"
                                                                data-url="{{ route('product.get-models',[$store->slug]) }}" {{app('request')->input('brand_id')?'':'disabled'}}>
                                                                <option value="">{{ __('Select Make') }}</option>
                                                                @foreach ($vehicleBrands as $vehicleBrand)
                                                                    <option value="{{ $vehicleBrand['id'] }}"
                                                                        {{ app('request')->input('brand_id') == $vehicleBrand['id'] ? 'selected' : '' }}>
                                                                        {{ $vehicleBrand->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select name="model_id" id="model_id"
                                                                class="selectpicker w100 show-tick" tabindex="-98" {{app('request')->input('model_id')?'':'disabled'}}>
                                                                <option value="">{{ __('Select Model') }}</option>
                                                                @foreach ($vehicleModels as $vehicleModel)
                                                                    <option value="{{ $vehicleModel['id'] }}"
                                                                        {{ app('request')->input('model_id') == $vehicleModel['id'] ? 'selected' : '' }}>
                                                                        {{ $vehicleModel->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <div class="dropdown bootstrap-select w100 show-tick">
                                                            <select name="category_id"
                                                            class="selectpicker w100 show-tick" tabindex="-98">
                                                            <option value="">{{ __('Select Category') }}</option>
                                                            @foreach ($pro_categories as $category)
                                                                <option value="{{ $category->id }}" {{ app('request')->input('category_id') == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="search_option_button">
                                                    <button type="submit" class="btn btn-block btn-thm">
                                                        <span class="flaticon-magnifiying-glass mr10"></span>
                                                        {{ __('Search') }}
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="text-center">
                                                <a class="reset-filter"
                                                    href="javascript:resetFilterForm();">{{ __('Reset') }}</a>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 dn-md">
                    <div class="sidebar_widgets">
                        <div class="sidebar_widgets_wrapper">
                            <div class="sidebar_advanced_search_widget">

                                <h4 class="title">{{ __('Search Filters') }}</h4>
                                <form action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                    id="frm-filter" method="get">
                                    @csrf
                                    <ul class="sasw_list mb0">
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select tabindex="-98" name="vehicle_type_id" id="vehicle_type_id2"
                                                            class="selectpicker w100 show-tick" data-toggle="select"
                                                            data-url="{{ route('product.get-vehicle-brands',[$store->slug]) }}">
                                                            <option value="">{{ __('Select Vehicle Type') }}</option>
                                                            @foreach ($vehicleTypes as $vehicleType)
                                                                <option value="{{ $vehicleType['id'] }}"
                                                                    {{ app('request')->input('vehicle_type_id') == $vehicleType['id'] ? 'selected' : '' }}>
                                                                    {{ $vehicleType->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select tabindex="-98" name="brand_id" id="brand_id2"
                                                            class="selectpicker w100 show-tick" data-toggle="select"
                                                            data-url="{{ route('product.get-models',[$store->slug]) }}" {{app('request')->input('brand_id')?'':'disabled'}}>
                                                            <option value="">{{ __('Select Make') }}</option>
                                                            @foreach ($vehicleBrands as $vehicleBrand)
                                                                <option value="{{ $vehicleBrand['id'] }}"
                                                                    {{ app('request')->input('brand_id') == $vehicleBrand['id'] ? 'selected' : '' }}>
                                                                    {{ $vehicleBrand->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select name="model_id" id="model_id2"
                                                            class="selectpicker w100 show-tick" tabindex="-98" {{app('request')->input('model_id')?'':'disabled'}}>
                                                            <option value="">{{ __('Select Model') }}</option>
                                                            @foreach ($vehicleModels as $vehicleModel)
                                                                <option value="{{ $vehicleModel['id'] }}"
                                                                    {{ app('request')->input('model_id') == $vehicleModel['id'] ? 'selected' : '' }}>
                                                                    {{ $vehicleModel->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <div class="dropdown bootstrap-select w100 show-tick">
                                                        <select name="category_id"
                                                            class="selectpicker w100 show-tick" tabindex="-98">
                                                            <option value="">{{ __('Select Category') }}</option>
                                                            @foreach ($pro_categories as $category)
                                                                <option value="{{ $category->id }}" {{ app('request')->input('category_id') == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-block btn-thm">
                                                    <span class="flaticon-magnifiying-glass mr10"></span>
                                                    {{ __('Search') }}
                                                </button>
                                            </div>
                                        </li>
                                        <li class="text-center">
                                            <a class="reset-filter"
                                                href="javascript:resetFilterForm2();">{{ __('Reset') }}</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="sidebar_widgets">
                        <div class="shop_category_sidebar_widgets">
                            <h4 class="title">{{ __('Categories') }}</h4>
                            <div class="widget_list">
                                <ul class="list_details">
                                    @foreach ($categories as $key => $category)
                                        <li>
                                            <a href="{{ route('store.categorie.product', [$store->slug, $category]) }}">
                                                {{ $category }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="listing_filter_row db-lg">
                            <div class="col-xl-5">
                                <div class="page_control_shorting left_area tac-lg mb30-767 mt15">
                                    <p>{!! __('We found :count cars available for you', [
                                        'count' => '<span class="heading-color fw600">' . $products[$categorie_name]->count() . '</span>',
                                    ]) !!}</p>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="page_control_shorting right_area text-end tac-lg">
                                    <ul>
                                        <li class="list-inline-item mb10-400">
                                            <a id="open2" class="filter_open_btn style2 dn db-md" href="#"><img
                                                    class="mr10"
                                                    src="{{ asset('assets/theme6/images/icon/filter-icon.svg') }}"
                                                    alt="filter-icon.svg"> Filters</a>
                                        </li>
                                        {{-- <li class="list-inline-item short_by_text listone">Sort by:</li>
                                        <li class="list-inline-item listwo">
                                            <select class="selectpicker show-tick">
                                                <option>Date: newest First</option>
                                                <option>Most Recent</option>
                                                <option>Recent</option>
                                                <option>Best Selling</option>
                                                <option>Old Review</option>
                                            </select>
                                        </li> --}}
                                        {{-- <li class="list-inline-item list-gird">
                                            <a href="#"><img src="images/icon/list-grid.svg"
                                                    alt="list-grid.svg"></a>
                                        </li>
                                        <li class="list-inline-item list-list">
                                            <a href="#"><img src="images/icon/list-list.svg"
                                                    alt="list-list.svg"></a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if ($products[$categorie_name]->count() > 0)
                            @foreach ($products[$categorie_name] as $product)
                                @php
                                    $product->name = $product->getName();
                                @endphp
                                <div class="col-sm-6 col-lg-4">
                                    <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                        <div class="car-listing">
                                            <div class="thumb">
                                                @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                    <img class="img-fluid"
                                                        style="width:100%;height:167px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                        alt="New collection">
                                                @else
                                                    <img class="img-fluid"
                                                        style="width:100%;height:167px;object-fit:cover"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        alt="New collection">
                                                @endif
                                            </div>
                                            <div class="details">
                                                <div class="title mt-1">{{ $product->name }}</div>
                                                <div class="review">
                                                    <span class="td-gray">{{ __('Category') }}:</span>
                                                    {{ $product->product_category() }}
                                                </div>
                                                <div class="si_footer">
                                                    <div class="price float-start">
                                                        {{ \App\Models\Utility::priceFormat($product->price) }}</div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
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
    </section>
@endsection
@push('script-page')
    {!! $storethemesetting['storejs'] !!}
@endpush
