@extends('storefront.layout.theme6')
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
    <section class="inner_page_breadcrumb style2 bgc-white bt1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">{{ ucfirst($pageoption->name) }}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('store.slug', $store->slug) }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($pageoption->name) }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="our-faq pt0 bgc-white pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="faq_content">
                        <div class="faq_according">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-body pt-3 pb-3">
                                        {!! $pageoption->contents !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt50 mb50">
                        {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
