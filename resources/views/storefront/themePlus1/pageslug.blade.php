@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ ucfirst($pageoption->name) }}
@endsection
@push('css-page')
@endpush
@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ ucfirst($pageoption->name) }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                        <li class="active">{{ ucfirst($pageoption->name) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-12 mb-5 mb-lg-0">
                {!! $pageoption->contents !!}
                <div class="mb-4"></div>
                {{-- <div class="advertisement-block"> --}}
                    {{-- {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!} --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
