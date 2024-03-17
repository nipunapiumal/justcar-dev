@extends('storefront.layout.theme33')
@section('page-title')
    {{ __('Gallery') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Sub banner start -->
    {{-- <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Gallery') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Gallery') }}</li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- Sub Banner end -->

    <!-- Photo gallery start -->
    <div class="blog-body inner-title-33">
        <div class="container">
            <!-- Main title -->
            <div class="one mb-50">
                <h1 class="heading-1">{{ __('Gallery') }}</h1>
            </div>
            
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="col-lg-6 col-md-6">
                                <div class="portfolio-item mb-30">
                                    @if (!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img))
                                        <a title="{{ $gallery->gallery_category() }}"
                                            href="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}">
                                            <img class="img-fluid img-width-height"
                                                src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}"
                                                alt="{{ $gallery->gallery_category() }}">
                                        </a>
                                    @else
                                        <img alt="{{ $gallery->gallery_category() }}"
                                            src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                            class="img-fluid img-width-height">
                                    @endif
                                    <div class="portfolio-content">
                                        <div class="portfolio-content-inner text-center pt-20">
                                            <div class="gallary-categories">{{ $gallery->gallery_category() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 sidebar-color">
                    <div class="sidebar-right pt-20">
                        <!-- Posts By Category Start -->
                        <div class="posts-by-category widget">
                            <h5 class="sidebar-title">{{ __('Categories') }}</h5>
                            <div class="s-border"></div>
                            <ul class="list-unstyled list-cat">
                                @foreach ($galleryCategories as $category)
                                    <li>
                                        <a class="sidebar-title" href="{{ route('store.gallery', [$store->slug, $category->id]) }}">
                                            {{ $category->name }} <span>
                                                {{-- <small>({{ date('M d, Y', strtotime($category->created_at)) }})</small> --}}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <!-- Tags box Start -->
                        {{-- <div class="widget tags-box widget-3">
                            <h3 class="sidebar-title">Tags</h3>
                            <div class="s-border"></div>
                            <ul class="tags">
                                <li><a href="#">Car Dealer</a></li>
                                <li><a href="#">Auto</a></li>
                                <li><a href="#">Car Website</a></li>
                                <li><a href="#">Automobile</a></li>
                                <li><a href="#">Theme</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Car Template</a></li>
                                <li><a href="#">Buy Car</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Photo gallery end -->
@endsection
