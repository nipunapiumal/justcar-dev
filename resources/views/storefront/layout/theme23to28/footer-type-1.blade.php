<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            @if (isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on')
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            {{ __($storethemesetting['quick_link_header_name1']) }}
                        </h4>
                        <ul class="links">
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
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            {{ __($storethemesetting['quick_link_header_name2']) }}
                        </h4>
                        <ul class="links">
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
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            {{ __($storethemesetting['quick_link_header_name3']) }}
                        </h4>
                        <ul class="links">
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
            @if (isset($storethemesetting['enable_quick_link4']) && $storethemesetting['enable_quick_link4'] == 'on')
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            {{ __($storethemesetting['quick_link_header_name4']) }}
                        </h4>
                        <ul class="links">
                            @if (isset($storethemesetting['footer_menu_4']) && $storethemesetting['footer_menu_4'])
                                @foreach (json_decode($storethemesetting['footer_menu_4']) as $menu_title)
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
            {{-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>
                        Contact Info
                    </h4>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a
                                href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                        </li>
                        <li>
                            <i class="flaticon-fax"></i>+0477 85X6 552
                        </li>
                    </ul>
                    
                </div>
            </div> --}}
            {{-- <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About Us</a>
                        </li>
                        <li>
                            <a href="services.html">Services</a>
                        </li>
                        <li>
                            <a href="faq.html">Faq</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                        <li>
                            <a href="car-comparison.html">Car Compare</a>
                        </li>
                        <li>
                            <a href="car-reviews.html">Car Reviews</a>
                        </li>
                        <li>
                            <a href="elements.html">Elements</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="recent-posts footer-item">
                    <h4>Recent Posts</h4>
                    <div class="d-flex mb-4 recent-posts-box">
                        <a href="car-details.html">
                            <img class="flex-shrink-0 me-3" src="img/car/small-car-3.png" alt="small-car">
                        </a>
                        <div class="detail align-self-center">
                            <h5>
                                <a href="car-details.html">Bentley Continental GT</a>
                            </h5>
                            <div class="listing-post-meta">
                                $345,00 | <a href="#"><i class="fa fa-calendar"></i> Jan 12, 2021</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4 recent-posts-box">
                        <a href="car-details.html">
                            <img class="flex-shrink-0 me-3" src="img/car/small-car-1.png" alt="small-car">
                        </a>
                        <div class="detail align-self-center">
                            <h5>
                                <a href="car-details.html">Fiat Punto Red</a>
                            </h5>
                            <div class="listing-post-meta">
                                $345,00 | <a href="#"><i class="fa fa-calendar"></i> Aug 24, 2021</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex recent-posts-box">
                        <a href="car-details.html">
                            <img class="flex-shrink-0 me-3" src="img/car/small-car-2.png" alt="small-car">
                        </a>
                        <div class="detail align-self-center">
                            <h5>
                                <a href="car-details.html">Nissan Micra Gen5</a>
                            </h5>
                            <div class="listing-post-meta">
                                $345,00 | <a href="#"><i class="fa fa-calendar"></i> Sep 24, 2021</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- subscriber-->

            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">

                <div class="footer-item clearfix">
                    @if (isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on')
                        @if ($storethemesetting['enable_email_subscriber'] == 'on')
                            <h4>{{ !empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time' }}
                            </h4>
                            <div class="Subscribe-box">
                                <p>{{ !empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here' }}
                                </p>
                                {{ Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'form-inline d-flex']) }}
                                {{ Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')]) }}
                                <button class="btn button-theme" type="submit"><i
                                        class="fa fa-paper-plane"></i></button>
                                {{ Form::close() }}
                            </div>
                        @endif
                    @endif

                    @if ($storethemesetting['enable_footer'] == 'on')
                        <div class="clearfix"></div>
                        <div class="social-list-2">
                            <ul>
                                @if (!empty($storethemesetting['whatsapp']))
                                    <li>
                                        <a class="bg-whatsapp"
                                            href="https://wa.me/{{ $storethemesetting['whatsapp'] }}" target="_blank">
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
                                {{-- <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#" class=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a>
                                </li> --}}
                            </ul>
                        </div>
                    @endif

                </div>



            </div>

        </div>
    </div>

    <div class="copy sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($storethemesetting['enable_footer'] == 'on')
                        <p> {{ \App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator) }}</p>
                    @endif
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#language-selection-modal">
                        <i class="fa fa-language"></i> {{ \App\Models\Utility::getLangCodes($currantLang) }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->
