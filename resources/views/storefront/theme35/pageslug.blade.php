@extends('storefront.layout.theme35')
@section('page-title')
    {{ ucfirst($pageoption->name) }}
@endsection
@push('css-page')
    <style>
    </style>
@endpush
@section('content')
<!-- Page title start-->
<div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
    <div class="container">
        <div class="content">
            <h2>{{ ucfirst($pageoption->name) }}</h2>
            <ul class="list-unstyled">
                <li class="d-inline">
                    <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                </li>
                <li class="d-inline">/</li>
                <li class="d-inline active opacity-75">{{ ucfirst($pageoption->name) }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Page title end-->

<!-- Faq-area start -->
<div class="faq-area pt-100 pb-70">
    <div class="container">
        <div class="accordion" id="faqAccordion">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up">
                    {!! $pageoption->contents !!}
                    <div class="advertisement-block">
                        {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq-area end -->

   
@endsection
