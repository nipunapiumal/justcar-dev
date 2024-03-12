@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Contact Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2>{{ __('Contact Us') }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Contact Us') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Area Start -->
    <div class="contact-form-area pt-100 pb-150">
        <div class="container">
            <div class="contact-form-wrapper fix">
              {!! Form::open(array('route' => array('store.store-contact', $store->slug),'id'=>'contact-form'),['method'=>'POST']) !!}
               
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="first_name" placeholder="{{ __('First Name') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="last_name" placeholder="{{ __('Last Name') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" placeholder="{{ __('Email') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="phone" placeholder="{{ __('Phone No') }}">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="subject" placeholder="{{ __('Subject') }}">
                    </div>
                </div>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="{{ __('Message') }}"></textarea>
                <button type="submit" class="submit-btn default-btn gradient">
                    <span>{{ __('Get In Touch') }}</span>
                </button>
                {{-- <p class="form-messege"></p> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
@endsection
@push('script-page')
    <script></script>
@endpush
