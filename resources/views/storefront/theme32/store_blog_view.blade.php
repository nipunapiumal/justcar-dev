@extends('storefront.layout.theme32')
@section('page-title')
    {{ $blogs->title }}
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
                <li>{{ $blogs->title }}</li>
            </ul>
            <div class="banner-main-content-wrap">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                        <div class="banner-content">
                            <span class="sub-title">{{ $blogs->title }}</span>
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

   <!-- Start Blog Standard section -->
   <div class="blog-details-page inner-title">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-12">
                <div class="post-thumb">
                    @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                <img class="img-fluid w-100" alt="{{ $blogs->title }}"
                                    style="height: 616px;object-fit: cover;"
                                    src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                            @else
                                <img class="img-fluid w-100" alt="{{ $blogs->title }}"
                                    style="height: 416px;object-fit: cover;"
                                    src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                            @endif
                    <div class="date">
                        <a href="javascript:void(0)">{{__('Popular post')}}</a>
                    </div>
                </div>
                <h3 class="post-title">{{ $blogs->title }}</h3>
                <div class="author-area">
                    {{-- <div class="author-img">
                        <img src="assets/img/home1/author-02.png" alt="">
                    </div> --}}
                    <div class="author-content">
                        {{-- <h6>Mulish Kary</h6> --}}
                        <a href="javascript:void(0)">{{__('Date')}} - 
                            {{date("d", strtotime($blog->created_at))}}
                        {{date("M", strtotime($blog->created_at))}}</a>
                    </div>
                </div>
                {!! $blogs->detail !!}
            </div>
          
        </div>
    </div>
</div>
<!-- End Blog Standard section -->
@endsection
