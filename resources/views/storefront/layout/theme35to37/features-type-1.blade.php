@if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
    <section class="steps-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <span class="subtitle mb-10">{{ __('Features') }}</span>
                        <h2 class="title">
                            {{ __('Why Choose Us?') }}
                        </h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                            @if (isset($storethemesetting['features_icon1']))
                                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                                    <div class="card align-items-center text-center radius-md p-25 mb-30">
                                        <div class="card-icon radius-md mb-25">
                                            {!! $storethemesetting['features_icon1'] !!}
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title mb-20">
                                                {{ $storethemesetting['features_title1'] }}
                                            </h4>
                                            <p class="card-text lc-3">
                                                {{ $storethemesetting['features_description1'] }}
                                            </p>
                                        </div>
                                        <span class="text-stroke h2">01</span>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                            @if (isset($storethemesetting['features_icon2']))
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <div class="card align-items-center text-center radius-md p-25 mb-30">
                                        <div class="card-icon radius-md mb-25">
                                            {!! $storethemesetting['features_icon2'] !!}
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title mb-20">
                                                {{ $storethemesetting['features_title2'] }}
                                            </h4>
                                            <p class="card-text lc-3">
                                                {{ $storethemesetting['features_description2'] }}
                                            </p>
                                        </div>
                                        <span class="text-stroke h2">02</span>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                            @if (isset($storethemesetting['features_icon3']))
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                                    <div class="card align-items-center text-center radius-md p-25 mb-30">
                                        <div class="card-icon radius-md mb-25">
                                            {!! $storethemesetting['features_icon3'] !!}
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title mb-20">
                                                {{ $storethemesetting['features_title3'] }}
                                            </h4>
                                            <p class="card-text lc-3">
                                                {{ $storethemesetting['features_description3'] }}
                                            </p>
                                        </div>
                                        <span class="text-stroke h2">03</span>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
