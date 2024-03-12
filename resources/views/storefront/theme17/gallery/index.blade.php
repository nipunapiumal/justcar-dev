@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Gallery') }}
@endsection
@push('css-page')
@endpush
@section('content')
    @php($store_logo = asset(Storage::url('uploads/gallery_image/')))


    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Gallery') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Gallery') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Photo gallery start -->
    <div class="photo-gallery content-area-13">
        <div class="container">
            <!-- Main title -->
            {{-- <div class="main-title mt2"> --}}
                {{-- <h1>{{ __('Gallery') }}</h1> --}}
                {{-- <div class="list-inline-listing"> --}}
                    {{-- <ul class="filters filteriz-navigation clearfix"> --}}
                        {{-- @foreach ($galleryCategories as $category) --}}
                            {{-- <li class="active btn filtr-button filtr" data-filter="all"><span>All</span></li> --}}
                            {{-- <li data-filter="1" class="btn btn-inline filtr-button filtr"><span>Apartment</span></li>
                    <li data-filter="2" class="btn btn-inline filtr-button filtr"><span>House</span></li>
                    <li data-filter="3" class="btn btn-inline filtr-button filtr"><span>Office</span></li> --}}
                        {{-- @endforeach --}}
                    {{-- </ul> --}}
                {{-- </div> --}}
            {{-- </div> --}}
            <div class="row filter-portfolio">
                <div class="cars">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1">
                            <div class="portfolio-item">
                                @if (!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img))
                                    <a title="2017 Ford Mustang"
                                        href="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}">
                                        <img class="img-fluid"
                                            src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}"
                                            alt="sp5s1.jpg" style="width: 700px;height:500px;object-fit:cover">
                                        </a>
                                @else
                                    <img alt="Image placeholder"
                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                        class="img-fluid">
                                @endif
                                {{-- <a href="img/car/car-2.png" title="2017 Ford Mustang">
                                    <img src="img/car/car-2.png" alt="gallery-photo" class="img-fluid">
                                </a> --}}
                                <div class="portfolio-content">
                                    <div class="portfolio-content-inner">
                                        <p>2017 Ford Mustang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Photo gallery end -->
@endsection
