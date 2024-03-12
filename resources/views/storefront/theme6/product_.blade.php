@extends('storefront.layout.theme6_')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb style2 bgc-f9">
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

    @php
        // dump();
    @endphp
    <!-- Listing Grid View -->
    <section class="our-listing pb30-991 bgc-f9 pt0">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 dn-lg">
                    <div class="sidebar_listing_grid1 mb30">
                        <div class="sidebar_listing_list">
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 pr0">
                    <div class="row">
                        @if ($products[$categorie_name]->count() > 0)
                        @foreach ($products[$categorie_name] as $product)
                            @php
                                $product->name = $product->getName();
                            @endphp
                            <div class="col-sm-6 col-lg-4">
                               <a href="{{route('store.product.product_view',[$store->slug,$product->id])}}">
                                <div class="shop_item">
                                    <div class="thumb">
                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                            <img class="img-fluid" style="width:100%;height:167px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                alt="New collection">
                                        @else
                                            <img class="img-fluid" style="width:100%;height:167px;object-fit:cover"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                alt="New collection">
                                        @endif
                                    </div>
                                    <div class="details">
                                        <div class="title mt-1">{{ $product->name }}</div>
                                        <div class="review">
                                            <span class="td-gray">{{__('Category')}}:</span> {{$product->product_category()}}
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
                                <h6 class="m-0 text-center no_record p-2"><i class="fas fa-ban"></i> {{__('No Record Found')}}</h6>
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
