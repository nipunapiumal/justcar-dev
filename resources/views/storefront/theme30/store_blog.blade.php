@extends('storefront.layout.theme30')
@section('page-title')
    {{ __('Blog') }}
@endsection
@php
    if (!empty(session()->get('lang'))) {
        $currantLang = session()->get('lang');
    } else {
        $currantLang = $store->lang;
    }
    $languages = \App\Models\Utility::languages();

@endphp
@section('content')

<!-- Start header section -->
{{-- <div class="inner-page-banner">
    <div class="banner-wrapper">
        <div class="container-fluid">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                </li>
                <li>{{ __('Blog') }}</li>
            </ul>
            <div class="banner-main-content-wrap">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                        <div class="banner-content">
                            <span class="sub-title">{{ __('Blog') }}</span>
                            <h1>{{ __('For Any Information') }}</h1>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
                        <div class="banner-img">
                            <img src="{{ asset('assets/theme29to34/img/inner-page/inner-banner-img.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- End header section -->
    
<div class="blog-standard-page inner-title">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-12">
                @foreach ($blogs as $blog)
                <div class="news-card2 mb-50">
                    <div class="news-img">
                        <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                            @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                            <img class="img-fluid w-100" style="height:450px;object-fit:cover" alt="{{ $blog->title }}"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                        @else
                            <img class="img-fluid w-100" style="height:450px;object-fit:cover" alt="{{ $blog->title }}"
                                src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                        @endif
                        </a>
                        <div class="date">
                            <a href="blog-standard.html">{{__('Popular post')}}</a>
                        </div>
                    </div>
                    <div class="content">
                        <h4><a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                            {{ $blog->title }}
                        </a></h4>
                        {{-- <p>"The Car Enthusiast: Exploring the World of Cars and Driving." In this captivating journey, we delve into the fascinating realm of automobiles.</p> --}}
                        <div class="news-btm d-flex align-items-center justify-content-between">
                            <div class="author-area">
                                {{-- <div class="author-img">
                                    <img src="assets/img/home1/author-02.png" alt="">
                                </div> --}}
                                <div class="author-content">
                                    {{-- <h6>Mulish Kary</h6> --}}
                                    <a href="blog-standard.html">{{__('Date')}} - 
                                        {{date("d", strtotime($blog->created_at))}}
                                    {{date("M", strtotime($blog->created_at))}}
                                    </a>
                                </div>
                            </div>
                            <a class="view-btn" href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">{{__('Show More')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
             
                {{-- <div class="pagination-and-next-prev">
                    <div class="pagination">
                        <ul>
                            <li class="active"><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#">04</a></li>
                            <li><a href="#">05</a></li>
                        </ul>
                    </div>
                    <div class="next-prev-btn">
                        <ul>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="14" viewBox="0 0 7 14">
                                        <path d="M0 7.00008L7 0L2.54545 7.00008L7 14L0 7.00008Z"></path>
                                    </svg> Prev
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="14" viewBox="0 0 7 14">
                                        <path d="M7 7.00008L0 0L4.45455 7.00008L0 14L7 7.00008Z"></path>
                                    </svg> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="col-lg-4">
                <div class="blog-sidebar mb-50">
                    <div class="single-widgets widget_egns_categoris mb-20">
                        <div class="widget-title mb-20">
                            <h6>Category</h6>
                        </div>
                        <ul class="wp-block-categoris-cloud">
                            <li><a href="blog-standard.html"><span>Car Servicing</span> <span class="number-of-categoris">(30)</span></a></li>
                            <li><a href="blog-standard.html"><span>Car Buying Advice</span> <span class="number-of-categoris">(18)</span> </a></li>
                            <li><a href="blog-standard.html"><span>Car Rental</span> <span class="number-of-categoris">(21)</span></a></li>
                            <li><a href="blog-standard.html"><span>Driving</span> <span class="number-of-categoris">(25)</span></a></li>
                            <li><a href="blog-standard.html"><span>Brand Car</span> <span class="number-of-categoris">(29)</span></a></li>
                            <li><a href="blog-standard.html"><span>Tata</span> <span class="number-of-categoris">(2,554)</span></a></li>
                            <li><a href="blog-standard.html"><span>Hyundai</span> <span class="number-of-categoris">(1,556)</span></a></li>
                        </ul>
                    </div>
                </div>
                
            </div> --}}
        </div>
    </div>
</div>
@endsection
