@extends('storefront.layout.theme13to15')
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
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2>{{ ucfirst($pageoption->name) }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{ ucfirst($pageoption->name) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-form-area pt-100 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="contact-form-wrapper fix">
                        {!! $pageoption->contents !!}
                    </div>
                    <div class="mt-4"></div>
                    <div style="margin-top:60px;margin-bottom:60px">
                        {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection