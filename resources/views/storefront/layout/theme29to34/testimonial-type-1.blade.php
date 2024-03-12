<!-- Testimonials (v1) -->
@if (isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on')
<div class="home3-testimonial-area mb-100">
    {{-- <ul class="sm-img-group">
        <li><img src="{{ asset('assets/theme29to34/img/home3/home3-testi-01.png') }}" alt=""></li>
        <li><img src="{{ asset('assets/theme29to34/img/home3/home3-testi-02.png') }}" alt=""></li>
        <li><img src="{{ asset('assets/theme29to34/img/home3/home3-testi-03.png') }}" alt=""></li>
        <li><img src="{{ asset('assets/theme29to34/img/home3/home3-testi-04.png') }}" alt=""></li>
        <li><img src="{{ asset('assets/theme29to34/img/home3/home3-testi-05.png') }}" alt=""></li>
        <li><img src="{{ asset('assets/theme29to34/img/home3/home3-testi-06.png') }}" alt=""></li>
    </ul> --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper testimonial-slider3">
                    <div class="swiper-wrapper">
                        @if (isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on')
                        <div class="swiper-slide">
                            <div class="testimonial-wrap text-center">
                                <div class="author-image-area">
                                    <div class="quat">
                                        <img src="{{ asset('assets/theme29to34/img/home3/icon/quat.svg') }}" alt="">
                                    </div>
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img1']) ? $storethemesetting['testimonial_img1'] : 'qo.png'))) }}" alt="">
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star.svg') }}" alt="">
                                    </div>
                                    <h6>{{ $storethemesetting['testimonial_about_us1'] }}</h6>
                                </div>
                                <div class="content">
                                    <p>{{ $storethemesetting['testimonial_description1'] }}</p>
                                </div>
                                <div class="author-name">
                                    <h5>{{ $storethemesetting['testimonial_name1'] }}</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on')
                        <div class="swiper-slide">
                            <div class="testimonial-wrap text-center">
                                <div class="author-image-area">
                                    <div class="quat">
                                        <img src="{{ asset('assets/theme29to34/img/home3/icon/quat.svg') }}" alt="">
                                    </div>
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img2']) ? $storethemesetting['testimonial_img2'] : 'qo.png'))) }}" alt="">
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star.svg') }}" alt="">
                                    </div>
                                    <h6>{{ $storethemesetting['testimonial_about_us2'] }}</h6>
                                </div>
                                <div class="content">
                                    <p>{{ $storethemesetting['testimonial_description2'] }}</p>
                                </div>
                                <div class="author-name">
                                    <h5>{{ $storethemesetting['testimonial_name2'] }}</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on')
                        <div class="swiper-slide">
                            <div class="testimonial-wrap text-center">
                                <div class="author-image-area">
                                    <div class="quat">
                                        <img src="{{ asset('assets/theme29to34/img/home3/icon/quat.svg') }}" alt="">
                                    </div>
                                    <img src="{{ asset(Storage::url('uploads/store_logo/' . (!empty($storethemesetting['testimonial_img3']) ? $storethemesetting['testimonial_img3'] : 'qo.png'))) }}" alt="">
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star.svg') }}" alt="">
                                    </div>
                                    <h6>{{ $storethemesetting['testimonial_about_us3'] }}</h6>
                                </div>
                                <div class="content">
                                    <p>{{ $storethemesetting['testimonial_description3'] }}</p>
                                </div>
                                <div class="author-name">
                                    <h5>{{ $storethemesetting['testimonial_name3'] }}</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="slider-btn-group2">
                    <div class="slider-btn prev-10">
                        <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                        </svg>
                    </div>
                    {{-- <div class="trustpilot-review">
                        <strong>Excellent!</strong>
                        <img src="assets/img/home1/icon/trustpilot-star2.svg" alt="">
                        <p>5.0 Rating out of <strong>5.0</strong> based on <a href="#"><strong>245354</strong>
                                reviews</a></p>
                        <img src="assets/img/home1/icon/trustpilot-logo.svg" alt="">
                    </div> --}}
                    <div class="slider-btn  next-10">
                        <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                        </svg>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endif