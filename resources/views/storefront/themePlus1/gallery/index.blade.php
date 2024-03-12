@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Gallery') }}
@endsection
@push('css-page')
@endpush
@section('content')
    @php
        $store_logo = asset(Storage::url('uploads/gallery_image/'));
    @endphp


    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <div class="overflow-hidden pb-2">
                                <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp"
                                    data-appear-animation-delay="100">{{ __('Gallery') }}</h2>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn"
                                data-appear-animation-delay="300">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li class="active">{{ __('Gallery') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container py-2">

        <div class="row mt-3 pt-2">
            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="sidebar">
                    <h5 class="font-weight-semi-bold">{{__('Categories')}}</h5>
                    <ul class="nav nav-list flex-column sort-source mb-5">
                        @foreach ($galleryCategories as $category)
                            <li class="nav-item">
                                <a class="nav-link {{$activeCategory->id==$category->id?'active':''}}"
                                    href="{{ route('store.gallery', [$store->slug, $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">

                <div class="row portfolio-list lightbox"
                    data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">

                    @if ($galleries->count() > 0)
                    @foreach ($galleries as $gallery)
                        <div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn"
                            data-appear-animation-delay="200">
                            <div class="portfolio-item">
                                <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                    <span class="thumb-info-wrapper border-radius-0">
                                        @if (!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img))
                                            <img src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}"
                                                class="border-radius-0 cover" alt="" height="150px;">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}"
                                                    class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                            class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        @else
                                            <img src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                class="border-radius-0" height="150px;">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                            class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        @endif


                                    </span>
                                </span>
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
@endsection
