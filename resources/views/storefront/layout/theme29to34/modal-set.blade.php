<!-- Preloader Start -->
    <div class="egns-preloader">
        <div class="preloader-close-btn">
            <span><i class="bi bi-x-lg"></i> Close</span>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="circle-border">
                        <div class="moving-circle"></div>
                        <div class="moving-circle"></div>
                        <div class="moving-circle"></div>
                        <svg width="180px" height="150px" viewbox="0 0 187.3 93.7" preserveaspectratio="xMidYMid meet"
                            style="left: 50%; top: 50%; position: absolute; transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);">
                            <path stroke="#D90A2C" id="outline" fill="none" stroke-width="4" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10"
                                d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
                            <path id="outline-bg" opacity="0.05" fill="none" stroke="#959595" stroke-width="4"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    
<div class="modal signUp-modal fade" id="signUpModal01" tabindex="-1" aria-labelledby="signUpModal01Label"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="signUpModal01Label">{{ __('Register') }}</h4>
            <p>{{ __('Already registered ?') }} <button type="button" data-bs-toggle="modal"
                    data-bs-target="#logInModal01">{{ __('Login') }}</button></p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                    class="bi bi-x"></i></button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => ['store.userstore', $store->slug], 'id' => 'contact-form'], ['method' => 'post']) !!}
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-inner">
                        <label>{{ __('Full Name *') }}</label>
                        <input name="name" type="text" placeholder="{{ __('Full Name *') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-inner">
                        <label>{{ __('Number *') }}</label>
                        <input type="text" name="phone_number" placeholder="{{ __('Number *') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-inner">
                        <label>{{ __('Email *') }}</label>
                        <input name="email" type="email" placeholder="{{ __('Email *') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-inner">
                        <label>{{ __('Password *') }}</label>
                        <input name="password" id="password" type="password"
                            placeholder="{{ __('Password *') }}">
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-inner">
                        <label>{{ __('Confirm Password *') }}</label>
                        <input id="password2" type="password" name="password_confirmation"
                            placeholder="{{ __('Confirm Password *') }}">
                        <i class="bi bi-eye-slash" id="togglePassword2"></i>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-inner">
                        <button class="primary-btn2" type="submit">{{ __('Register') }}</button>
                    </div>
                </div>

            </div>
            <div class="terms-conditon">
                <p>
                    {{ __('By using the system, you accept the') }} <a href="">
                        {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href="">
                        {{ __('System Regulations') }}. </a>
                </p>
            </div>
            @if ($storethemesetting['enable_footer'] == 'on')
                <ul class="social-icon">
                    {{-- @if (!empty($storethemesetting['whatsapp']))
                        <li>
                            <a class="bg-whatsapp" href="https://wa.me/{{ $storethemesetting['whatsapp'] }}"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                    @endif --}}
                    @if (!empty($storethemesetting['facebook']))
                        <li>
                            <a href="{{ $storethemesetting['facebook'] }}" target="_blank">
                                <img src="{{ asset('assets/theme29to34/img/home1/icon/facebook.svg') }}"
                                    alt="">
                            </a>
                        </li>
                    @endif
                    @if (!empty($storethemesetting['twitter']))
                        <li>
                            <a href="{{ $storethemesetting['twitter'] }}" target="_blank">
                                <img src="{{ asset('assets/theme29to34/img/home1/icon/twiter.svg') }}"
                                    alt="">
                            </a>
                        </li>
                    @endif
                    {{-- @if (!empty($storethemesetting['email']))
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
                    @endif --}}

                </ul>
            @endif
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>
<div class="modal signUp-modal fade" id="logInModal01" tabindex="-1" aria-labelledby="logInModal01Label"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-titlecase" id="logInModal01Label">{{ __('login') }}</h4>
            <p> {{ __('Dont have account ?') }}
                <button type="button" data-bs-toggle="modal"
                    data-bs-target="#signUpModal01">{{ __('Register') }}</button>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                    class="bi bi-x"></i></button>
        </div>
        <div class="modal-body">
            @php
                if ((!empty(Auth::guard('customers')->user()) && $store->is_checkout_login_required == 'on') || $store->is_checkout_login_required == 'off') {
                    $is_cart = false;
                } else {
                    $is_cart = true;
                }
            @endphp
            {!! Form::open(
                [
                    'route' => ['customer.login', $store->slug, !empty($is_cart) && $is_cart == true ? $is_cart : false],
                ],
                ['method' => 'POST'],
            ) !!}
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="form-inner">
                        <label>{{ __('Enter Your Email') }}</label>
                        {{ Form::text('email', null, ['placeholder' => __('Enter Your Email')]) }}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-inner">
                        <label>{{ __('Enter Your Password') }}</label>
                        {{ Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => __('Enter Your Password')]) }}
                        <i class="bi bi-eye-slash" id="togglePassword3"></i>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                        <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                            <div class="form-group">
                                <input type="checkbox" id="html">
                                <label for="html">Remember Me</label>
                            </div>
                            <a href="#" class="forgot-pass">Forget Password?</a>
                        </div>
                    </div> --}}
                <div class="col-md-12">
                    <div class="form-inner">
                        <button class="primary-btn2" type="submit">{{ __('Sign In') }}</button>
                    </div>
                </div>

            </div>
            <div class="terms-conditon">
                <p>
                    {{ __('By using the system, you accept the') }} <a href="">
                        {{ __('Privacy Policy') }} </a> {{ __('and') }} <a href="">
                        {{ __('System Regulations') }}</a>
                </p>
            </div>
            @if ($storethemesetting['enable_footer'] == 'on')
                <ul class="social-icon">
                    {{-- @if (!empty($storethemesetting['whatsapp']))
                        <li>
                            <a class="bg-whatsapp" href="https://wa.me/{{ $storethemesetting['whatsapp'] }}"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                    @endif --}}
                    @if (!empty($storethemesetting['facebook']))
                        <li>
                            <a href="{{ $storethemesetting['facebook'] }}" target="_blank">
                                <img src="{{ asset('assets/theme29to34/img/home1/icon/facebook.svg') }}"
                                    alt="">
                            </a>
                        </li>
                    @endif
                    @if (!empty($storethemesetting['twitter']))
                        <li>
                            <a href="{{ $storethemesetting['twitter'] }}" target="_blank">
                                <img src="{{ asset('assets/theme29to34/img/home1/icon/twiter.svg') }}"
                                    alt="">
                            </a>
                        </li>
                    @endif
                    {{-- @if (!empty($storethemesetting['email']))
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
                    @endif --}}

                </ul>
            @endif
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>