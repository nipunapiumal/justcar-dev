@extends('storefront.layout.'.$store->theme_dir.'')
@section('page-title')
    {{ ucfirst($pageoption->name) }}
@endsection
@push('css-page')
    <style>
    </style>
@endpush
@section('content')


<!-- Sub banner start -->
{{-- <div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>{{ ucfirst($pageoption->name) }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                <li class="active">{{ ucfirst($pageoption->name) }}</li>
            </ul>
        </div>
    </div>
</div> --}}
<!-- Sub Banner end -->

<div class="about-car content-area-5 content-area-20">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1 class="mb-10">{{ ucfirst($pageoption->name) }}</h1>
            <div class="title-border">
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
            </div>
        </div>
        <div class="row">
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
</div>

   
@endsection
