<!-- Client Logo -->
@if (isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on')
<div class="customar-feedback-area mb-100">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="400ms">
            <div class="col-lg-12">
                <div class="sub-title">
                    <h6>{{__('Our Trusted Partners')}}</h6>
                    <div class="dash"></div>
                </div>
                <div class="partner-slider">
                    <div class="marquee_text2">
                        @if (!empty($storethemesetting['brand_logo']))
                            @foreach (explode(',', $storethemesetting['brand_logo']) as $k => $value)
                                @if (!empty($value) && \Storage::exists('uploads/store_logo/' . $value))
                                    <img src="{{ asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png')) }}"
                                        alt="Footer logo" class="" style="max-width: 200px;">
                                @else
                                    <img src="{{ asset(Storage::url('uploads/store_logo/brand_logo.png')) }}"
                                        alt="Footer logo" class="">
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif