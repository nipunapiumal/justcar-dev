@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Contact Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
    
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-dark">{{ __('Contact Us') }}</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Contact Us') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-6 mb-5 mb-lg-0">
            {!! Form::open(array('route' => array('store.store-contact', $store->slug),'id'=>'contact-form'),['method'=>'POST']) !!}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">{{ __('First Name') }}<span class="text-color-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control form-control-lg text-4" id="floating-full-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">{{ __('Last Name') }}<span class="text-color-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control form-control-lg text-4" id="floating-full-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">{{ __('Email') }}<span class="text-color-danger">*</span></label>
                            <input type="text" name="email" class="form-control form-control-lg text-4" id="floating-full-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">{{ __('Phone No') }} <span class="text-color-danger">*</span></label>
                            <input type="text" name="phone" class="form-control form-control-lg text-4" id="floating-full-name">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">{{ __('Subject') }} <span class="text-color-danger">*</span></label>
                            <input type="text" name="subject" class="form-control form-control-lg text-4" id="floating-full-name">
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group col">
                            <label for="floatingTextarea2">{{ __('Message') }} <span class="text-color-danger">*</span></label>
                            <textarea class="form-control form-control-lg text-4" name="message" id="floatingTextarea2"></textarea>
                        </div>
                    </div>



                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">{{ __('Get In Touch') }}</button>
                        </div>
                        </div>
                </div>







                {{ Form::close() }}
        </div>
    </div>

</div>

   
@endsection
@push('script-page')
    <script></script>
@endpush
