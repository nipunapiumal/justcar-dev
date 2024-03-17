@extends('storefront.layout.theme30')
@section('page-title')
    {{ ucfirst($pageoption->name) }}
@endsection
@push('css-page')
    <style>
    </style>
@endpush
@section('content')

<!-- Start header section -->
{{-- <div class="inner-page-banner">
    <div class="banner-wrapper">
        <div class="container-fluid">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                </li>
                <li>{{ ucfirst($pageoption->name) }}</li>
            </ul>
            <div class="banner-main-content-wrap">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                        <div class="banner-content">
                            <span class="sub-title">{{ ucfirst($pageoption->name) }}</span>
                            <h1>{{ ucfirst($pageoption->name) }}</h1>
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
<!-- Start Wellcome Banner section -->
<div class="welcome-banner-section inner-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="welcome-wrap">
                    <div class="one mb-50">
                        <h1 class="heading-1">{{ ucfirst($pageoption->name) }}</h1>
                    </div>
                    <div class="welcome-content wow fadeInUp" data-wow-delay="300ms">
                        <p>
                            {!! $pageoption->contents !!}
                        </p>
                    </div>
                    {{-- <div class="author-area wow fadeInUp" data-wow-delay="400ms">
                        <img src="assets/img/inner-page/signature.svg" alt="">
                        <h6>Natrison Mongla</h6>
                        <span>(CEO & Founder)</span>
                    </div> --}}
                </div>
                <div class="advertisement-block">
                    {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection
