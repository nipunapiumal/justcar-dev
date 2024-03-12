@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Contact Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>{{ __('Contact Us') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                <li class="active">{{ __('Contact Us') }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-20">
    <div class="container">
        {{-- <!-- Main title -->
        <div class="main-title text-center">
            <h1>Contact Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div> --}}
        <div class="row g-0 contact-innner">
            <div class="col-lg-7 col-md-12">
                <div class="contact-form" style="border-right: none">
                    <h3 class="mb-20">{{ __('Contact Us') }}</h3>
                    {!! Form::open(array('route' => array('store.store-contact', $store->slug),'id'=>'contact-form'),['method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="first_name" class="form-control" id="floating-full-name" placeholder="{{ __('First Name') }}">
                                    <label for="floating-full-name">{{ __('First Name') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="last_name" class="form-control" id="floating-full-name" placeholder="{{ __('Last Name') }}">
                                    <label for="floating-full-name">{{ __('Last Name') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="email" class="form-control" id="floating-full-name" placeholder="{{ __('Email') }}">
                                    <label for="floating-full-name">{{ __('Email') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="phone" class="form-control" id="floating-full-name" placeholder="{{ __('Phone No') }}">
                                    <label for="floating-full-name">{{ __('Phone No') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="subject" class="form-control" id="floating-full-name" placeholder="{{ __('Subject') }}">
                                    <label for="floating-full-name">{{ __('Subject') }}</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-floating mb-20">
                                    <textarea class="form-control" placeholder="{{ __('Message') }}" name="message" id="floatingTextarea2"></textarea>
                                    <label for="floatingTextarea2">{{ __('Message') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-5">{{ __('Get In Touch') }}</button>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="contact-info">
                    <h3 class="mb-20">{{ __('Quick contact info') }}</h3>
                    @if ($storethemesetting['enable_sidebar_panel'] == 'on')
                    <div class="ci-box d-flex mb-30">
                        <div class="icon">
                            <i class="flaticon-pin"></i>
                        </div>
                        <div class="detail align-self-center">
                            <h4>{{ __('Office Address') }}</h4>
                            <p>{!! nl2br(e($storethemesetting['office_address'])) !!}</p>
                        </div>
                    </div>
                    <div class="ci-box d-flex mb-30">
                        <div class="icon">
                            <i class="flaticon-phone"></i>
                        </div>
                        <div class="detail align-self-center">
                            <h4>{{ __('Contact Us') }}</h4>
                            {{-- <p> --}}
                                <a href="tel:{{ $storethemesetting['contact_info_phone_no'] }}">{{ $storethemesetting['contact_info_phone_no'] }}</a>
                                /
                            {{-- </p> --}}
                            {{-- <p> --}}
                                <a href="mailto:{{ $storethemesetting['contact_info_email'] }}">{{ $storethemesetting['contact_info_email'] }}</a>
                            {{-- </p> --}}
                            
                        </div>
                    </div>
                    {{-- <div class="ci-box d-flex mb-40">
                        <div class="icon">
                            <i class="flaticon-mail"></i>
                        </div>
                        <div class="detail align-self-center">
                            <h4>{{__('Email Address')}}</h4>
                            <p>
                                <a href="mailto:{{ $storethemesetting['email'] }}">{{ $storethemesetting['email'] }}</a>
                            </p>
                        </div>
                    </div> --}}
                    <div class="ci-box d-flex mb-40">
                        <div class="icon">
                            <i class="flaticon-mail"></i>
                        </div>
                        <div class="detail align-self-center">
                            <h4>{{__('Opening Hours')}}</h4>
                            <p>{!! nl2br(e($storethemesetting['opening_hours'])) !!}</p>
                            
                        </div>
                    </div>
                    @endif

                    <h3 class="mb-20">Follow Us</h3>
                    <div class="social-media social-media-two">
                        <div class="social-list">
                            @if (!empty($storethemesetting['whatsapp']))
                                        <div class="icon whatsapp"
                                            onclick="location.href='https://wa.me/{{ $storethemesetting['whatsapp'] }}'">
                                            <div class="tooltip">Whatsapp</div>
                                            <span><i class="fab fa-whatsapp"></i></span>
                                        </div>
                                    @endif
                                    @if (!empty($storethemesetting['facebook']))
                                        <div class="icon facebook"
                                            onclick="location.href='{{ $storethemesetting['facebook'] }}'">
                                            <div class="tooltip">Facebook</div>
                                            <span><i class="fab fa-facebook"></i></span>
                                        </div>
                                    @endif
                                    @if (!empty($storethemesetting['twitter']))
                                        <div class="icon twitter"
                                            onclick="location.href='{{ $storethemesetting['twitter'] }}'">
                                            <div class="tooltip">Twitter</div>
                                            <span><i class="fab fa-twitter"></i></span>
                                        </div>
                                    @endif
                                    @if (!empty($storethemesetting['email']))
                                        <div class="icon github"
                                            onclick="location.href='mailto:{{ $storethemesetting['email'] }}'">
                                            <div class="tooltip">Email</div>
                                            <span><i class="fa fa-envelope"></i></span>
                                        </div>
                                    @endif
                                    @if (!empty($storethemesetting['instagram']))
                                        <div class="icon instagram"
                                            onclick="location.href='{{ $storethemesetting['instagram'] }}'">
                                            <div class="tooltip">Instagram</div>
                                            <span><i class="fab fa-instagram"></i></span>
                                        </div>
                                    @endif
                                    @if (!empty($storethemesetting['youtube']))
                                        <div class="icon youtube mr-0"
                                            onclick="location.href='{{ $storethemesetting['youtube'] }}'">
                                            <div class="tooltip">Youtube</div>
                                            <span><i class="fab fa-youtube"></i></span>
                                        </div>
                                    @endif
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- Contact 1 end -->

   
@endsection
@push('script-page')
    <script></script>
@endpush
