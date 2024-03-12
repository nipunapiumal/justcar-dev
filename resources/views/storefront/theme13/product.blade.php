@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')

    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2>{{ __('Products') }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Products') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section Area Start -->
    <div class="blog-section-area ptb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        @if ($products[$categorie_name]->count() > 0)
                            @foreach ($products[$categorie_name] as $product)
                                @php
                                    $product->name = $product->getName();
                                @endphp
                                <div class="col-sm-6 col-xl-4">
                                    <div class="car-listing gallery p0 bdr_none">
                                        <div class="thumb">
                                            @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                <a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                    <img class="img-fluid img-whp cover"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                        alt="sp5s1.jpg"></a>
                                            @else
                                                <img alt="Image placeholder"
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="img-fluid h100p">
                                            @endif
                                        </div>
                                        <h5 class="mt-2"><b><a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->name }}</a></b></h5>
                                        <span>{{ __('Category') }}:</span> {{ $product->product_category() }}
                                        <h4 class="mt-3"> {{ \App\Models\Utility::priceFormat($product->price) }}</h4>
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
                <div class="col-lg-3 col-md-4">

                    <div class="ht-single-widget">
                        <h4 class="widget-title">{{ __('Categories') }} </h4>
                        <div class="ht-widget-item">
                            <div class="widget-content">

                                @foreach ($categories as $key => $category)
                                    <div class="popular-post mb-2">
                                        {{-- <a href="{{ route('store.categorie.product', [$store->slug, $category]) }}">
                                            @if ($category->categorie_img)
                                                <img src="{{ $store_logo }}/{{ $category->categorie_img }}"
                                                    alt="" style="width: 50px;height:50px">
                                            @else
                                                <img src="{{ $store_logo }}/default.jpg" alt=""
                                                    style="width: 50px;height:50px">
                                            @endif
                                        </a> --}}
                                        <div class="post-text">
                                            {{-- <span>2 days ago</span> --}}
                                            <h6><a
                                                    href="{{ route('store.categorie.product', [$store->slug, $category]) }}">
                                                    {{ $category }}
                                                </a>
                                            </h6>
                                            {{-- <span>Post by <span>Power-boosts</span></span> --}}
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section Area End -->
@endsection
