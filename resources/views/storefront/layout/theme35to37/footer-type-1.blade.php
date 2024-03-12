@if ($storethemesetting['enable_footer'] == 'on')
    <!-- Footer-area start -->
    <footer class="footer-area bg-img bg-s-cover"
        data-bg-image="{{ asset('assets/theme35to37/images/footer-bg-1.jpg') }}">
        <div class="overlay opacity-70"></div>
        <div class="footer-top pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget" data-aos="fade-up">
                            <div class="navbar-brand">
                                <a href="{{ route('store.slug', $store->slug) }}">
                                    @if (
                                        !empty($storethemesetting['footer_logo']) &&
                                            \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo']))
                                        <img src="{{ asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo'])) }}"
                                            alt="Footer logo" class="lazyload">
                                    @else
                                        <img class="lazyload"
                                            src="{{ asset(Storage::url('uploads/store_logo/footer_logo.png')) }}"
                                            alt="Footer logo">
                                    @endif
                                </a>
                            </div>
                            @if ($storethemesetting['enable_top_bar'] == 'on')
                                <p>
                                    {{ !empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199' }}
                                </p>
                            @endif
                            <div class="social-link">
                                @if (!empty($storethemesetting['whatsapp']))
                                    <a href="https://wa.me/{{ $storethemesetting['whatsapp'] }}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['facebook']))
                                    <a href="{{ $storethemesetting['facebook'] }}" target="_blank">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['twitter']))
                                    <a href="{{ $storethemesetting['twitter'] }}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['email']))
                                    <a href="mailto:{{ $storethemesetting['email'] }}" target="_blank">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['instagram']))
                                    <a href="{{ $storethemesetting['instagram'] }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                                @if (!empty($storethemesetting['youtube']))
                                    <a href="{{ $storethemesetting['youtube'] }}" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on')
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm">
                            <div class="footer-widget" data-aos="fade-up">
                                <h4>{{ __($storethemesetting['quick_link_header_name1']) }}</h4>
                                <ul class="footer-links">
                                    @if (isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1'])
                                        @foreach (json_decode($storethemesetting['footer_menu_1']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on')
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm">
                            <div class="footer-widget" data-aos="fade-up">
                                <h4>{{ __($storethemesetting['quick_link_header_name2']) }}</h4>
                                <ul class="footer-links">
                                    @if (isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2'])
                                        @foreach (json_decode($storethemesetting['footer_menu_2']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on')
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-5">
                            <div class="footer-widget" data-aos="fade-up">
                                <h4>{{ __($storethemesetting['quick_link_header_name3']) }}</h4>
                                <ul class="footer-links">
                                    @if (isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3'])
                                        @foreach (json_decode($storethemesetting['footer_menu_3']) as $menu_title)
                                            @if ($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan))
                                                <li>
                                                    <a href="{{ $info['link_url'] }}">
                                                        {{ $info['link_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- subscriber-->
                    @if (isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on')
                        @if ($storethemesetting['enable_email_subscriber'] == 'on')
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="footer-widget" data-aos="fade-up">
                                    <h4>{{ !empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time' }}
                                    </h4>
                                    <p class="lh-1 mb-20">
                                        {{ !empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here' }}
                                    </p>
                                    <div class="newsletter-form">
                                        {{ Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST']) }}
                                        <div class="form-group">
                                            {{ Form::email('email', null, ['class' => 'form-control radius-0', 'aria-label' => __('Email Address'), 'placeholder' => __('Email Address')]) }}
                                            <button class="btn btn-md btn-primary"
                                                type="submit">{{ __('Subscribe') }}</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="copy-right-area border-top">
            <div class="container">
                <div class="copy-right-content">
                    <span>
                        {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area end-->
@endif

<!-- Go to Top -->
<div class="go-top"><i class="fal fa-angle-up"></i></div>
<!-- Go to Top -->

<!-- Jquery JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/jquery.min.js') }}">
    >
</script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/bootstrap.min.js') }}">
    >
</script>
<!-- Counter JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/jquery.counterup.min.js') }}">
    >
</script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/jquery.nice-select.min.js') }}">
    >
</script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/jquery.magnific-popup.min.js') }}">
    >
</script>
<!-- Swiper Slider JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/swiper-bundle.min.js') }}">
    >
</script>
<!-- Lazysizes -->
<script src="{{ asset('assets/theme35to37/js/vendors/lazysizes.min.js') }}">
    >
</script>
<!-- Noui Range Slider JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/nouislider.min.js') }}">
    >
</script>
<!-- AOS JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/aos.min.js') }}">
    >
</script>
<!-- Mouse Hover JS -->
<script src="{{ asset('assets/theme35to37/js/vendors/mouse-hover-move.js') }}">
    >
</script>
<!-- Main script JS -->
<script src="{{ asset('assets/theme35to37/js/script.js') }}">
    >
</script>

<!-- Custom js from entire application here -->
<script src="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js') }}"></script>
<script src="{{ asset('custom/js/custom.js') }}"></script>
@include('storefront.layout.additional-scripts')
