@extends('storefront.layout.theme23')
@section('page-title')
    {{ __('Contact Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
    
<!-- Sub banner start -->
{{-- <div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>{{ __('Contact Us') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                <li class="active">{{ __('Contact Us') }}</li>
            </ul>
        </div>
    </div>
</div> --}}
<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-5 content-area-20">
    <div class="container">
        <!-- Main title -->
            <div class="main-title text-center">
                <h1 class="mb-10">{{ __('Contact Us') }}</h1>
                <div class="title-border">
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                </div>
            </div>
        <div class="bg-white">
            <div class="row g-0">
                <div class="col-lg-7 col-md-12 col-sm-12 col-pad2">
                    <!-- Contact form start -->
                    <div class="contact-form contact-pad">
                        <h3>Send us a Message</h3>
                        {!! Form::open(array('route' => array('store.store-contact', $store->slug),'id'=>'contact_form'),['method'=>'POST']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group name">
                                        <input type="text" name="first_name" class="form-control" id="floating-full-name" placeholder="{{ __('First Name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group email">
                                        <input type="text" name="last_name" class="form-control" id="floating-full-name" placeholder="{{ __('Last Name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group subject">
                                        <input type="text" name="email" class="form-control" id="floating-full-name" placeholder="{{ __('Email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group number">
                                        <input type="text" name="subject" class="form-control" id="floating-full-name" placeholder="{{ __('Subject') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group message">
                                        <textarea class="form-control" placeholder="{{ __('Message') }}" name="message" id="floatingTextarea2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send-btn text-center">
                                        <button type="submit" class="btn-6">{{ __('Get In Touch') }}</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                    </div>
                    <!-- Contact form end -->
                </div>
                @if ($storethemesetting['enable_sidebar_panel'] == 'on')
                <div class="col-lg-5 col-md-12 col-sm-12 col-pad2">
                    <!-- Contact details start -->
                    <div class="contact-details">
                        <h3>{{ __('Quick contact info') }}</h3>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fas fa-location-arrow"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>{{ __('Office Address') }}</h4>
                                <p>{!! nl2br(e($storethemesetting['office_address'])) !!}</p>
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>{{ __('Contact Us') }}</h4>
                                  <p>
                                    <a href="tel:{{ $storethemesetting['contact_info_phone_no'] }}">{{ $storethemesetting['contact_info_phone_no'] }}</a>
                                  </p>
                                
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>{{ __('Email Address') }}</h4>
                                <p>
                                    <a href="mailto:{{ $storethemesetting['contact_info_email'] }}">{{ $storethemesetting['contact_info_email'] }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>{{__('Opening Hours')}}</h4>
                                <p>{!! nl2br(e($storethemesetting['opening_hours'])) !!}</p>
                                
                            </div>
                        </div>
                        {{-- <div class="ci-box d-flex mb-40">
                            <div class="icon">
                                <i class="fa fa-fax"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Fax:</h4>
                                <p>
                                    <a href="tel:0477-0477-8556-552">0477 8556 552</a>
                                </p>
                            </div>
                        </div> --}}
                        @if ($storethemesetting['enable_footer'] == 'on')
                        <h3>{{__('Follow us on')}}</h3>
                        <ul class="social-list clearfix">
                            @if (!empty($storethemesetting['whatsapp']))
                                        <li>
                                            <a class="bg-whatsapp"
                                                href="https://wa.me/{{ $storethemesetting['whatsapp'] }}"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['facebook']))
                                        <li>
                                            <a class="facebook-bg" href="{{ $storethemesetting['facebook'] }}"
                                                target="_blank">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['twitter']))
                                        <li>
                                            <a class="twitter-bg" href="{{ $storethemesetting['twitter'] }}"
                                                target="_blank">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['email']))
                                        <li>
                                            <a class="bg-github" href="mailto:{{ $storethemesetting['email'] }}">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['instagram']))
                                        <li>
                                            <a class="bg-instagram" href="{{ $storethemesetting['instagram'] }}"
                                                target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (!empty($storethemesetting['youtube']))
                                        <li>
                                            <a class="bg-youtube" href="{{ $storethemesetting['youtube'] }}"
                                                target="_blank">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    @endif
                        </ul>
                        @endif
                    </div>
                    <!-- Contact details end -->
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Contact 1 end -->

   
@endsection
@push('script-page')
    <script></script>
@endpush
