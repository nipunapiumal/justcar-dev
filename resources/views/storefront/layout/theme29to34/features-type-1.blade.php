@if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <div class="why-choose-area pt-90 pb-90 mb-100">
            <div class="container">
                <div class="row mb-60 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="section-title1 text-center">
                            {{-- <span>Best Car Agency</span> --}}
                            <h2>{{ __('Why Choose Us?') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-50 g-4 justify-content-center">
                    @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                        @if (isset($storethemesetting['features_icon1']))
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="choose-card">
                                    <div class="choose-top">
                                        <div class="choose-icon fa-2x">
                                            {!! $storethemesetting['features_icon1'] !!}
                                        </div>
                                        <h5>
                                            {{ $storethemesetting['features_title1'] }}
                                        </h5>
                                    </div>
                                    <p>
                                        {{ $storethemesetting['features_description1'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                        @if (isset($storethemesetting['features_icon2']))
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                <div class="choose-card">
                                    <div class="choose-top">
                                        <div class="choose-icon fa-2x">
                                            {!! $storethemesetting['features_icon2'] !!}
                                        </div>
                                        <h5>
                                            {{ $storethemesetting['features_title2'] }}
                                        </h5>
                                    </div>
                                    <p>
                                        {{ $storethemesetting['features_description2'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif
                    @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                        @if (isset($storethemesetting['features_icon3']))
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                <div class="choose-card">
                                    <div class="choose-top">
                                        <div class="choose-icon fa-2x">
                                            {!! $storethemesetting['features_icon3'] !!}
                                        </div>
                                        <h5>
                                            {{ $storethemesetting['features_title3'] }}
                                        </h5>
                                    </div>
                                    <p>
                                        {{ $storethemesetting['features_description3'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endif


                </div>
            </div>
        </div>
    @endif