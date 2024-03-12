@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ ucfirst($pageoption->name) }}
@endsection
@push('css-page')
    <style>
    </style>
@endpush
@php
if (!empty(session()->get('lang'))) {
    $currantLang = session()->get('lang');
} else {
    $currantLang = $store->lang;
}
@endphp
@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>{{ ucfirst($pageoption->name) }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                <li class="active">{{ ucfirst($pageoption->name) }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
<!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        {{-- <h2 class="breadcrumb_title">{{ ucfirst($pageoption->name) }}</h2> --}}
                        <div class="col-md-12">
                            <div class="faq_content mb40">
                                <div class="faq_according">
                                    <div class="accordion" id="accordionExample">
                                        {!! $pageoption->contents !!}
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="advertisement-block">
                                {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection
