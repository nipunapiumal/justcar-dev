@extends('storefront.layout.' . $store->theme_dir . '')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')

    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
        <div class="home5-banner-area">
            <div class="paginations111"></div>
            <div class="swiper home3-banner-slider">
                <div class="swiper-wrapper">
                    @php $i=0; @endphp
                    @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                        <div class="swiper-slide">
                            <div class="banner-bg"
                                style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 100%), url({{ asset(Storage::url('uploads/store_logo/' . (!empty($sliderSettings->slider_image) ? $sliderSettings->slider_image : 'home-banner.png'))) }});">
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-content">
                            @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                                <h1>{{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                </h1>
                                <p> {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                </p>
                                @php
                                    break;
                                @endphp
                            @endforeach
                            <div class="banner-content-bottom">
                                {{-- <a href="car-listing-left-sidebar.html" class="primary-btn3">
                                    <svg width="24" height="15" viewBox="0 0 24 15"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.25985 0C3.15704 0 3.05844 0.0413135 2.98574 0.114852C2.91304 0.18839 2.87219 0.28813 2.87219 0.392129C2.87219 0.496128 2.91304 0.595867 2.98574 0.669405C3.05844 0.742944 3.15704 0.784257 3.25985 0.784257H4.8105C4.91332 0.784257 5.01192 0.742944 5.08462 0.669405C5.15732 0.595867 5.19816 0.496128 5.19816 0.392129C5.19816 0.28813 5.15732 0.18839 5.08462 0.114852C5.01192 0.0413135 4.91332 0 4.8105 0H3.25985ZM5.77966 0C5.67684 0 5.57824 0.0413135 5.50554 0.114852C5.43284 0.18839 5.39199 0.28813 5.39199 0.392129C5.39199 0.496128 5.43284 0.595867 5.50554 0.669405C5.57824 0.742944 5.67684 0.784257 5.77966 0.784257H10.3347C10.4375 0.784257 10.5361 0.742944 10.6088 0.669405C10.6815 0.595867 10.7223 0.496128 10.7223 0.392129C10.7223 0.28813 10.6815 0.18839 10.6088 0.114852C10.5361 0.0413135 10.4375 0 10.3347 0H5.77966Z">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.22917 2.7464C4.12636 2.7464 4.02776 2.78771 3.95505 2.86125C3.88235 2.93479 3.84151 3.03453 3.84151 3.13853C3.84151 3.24253 3.88235 3.34227 3.95505 3.4158C4.02776 3.48934 4.12636 3.53066 4.22917 3.53066H13.1454C14.653 3.53066 15.5822 3.76829 16.3256 4.15002C16.9575 4.47431 17.4672 4.90546 18.1055 5.44542C18.2375 5.55698 18.3749 5.67305 18.5201 5.79402L18.6101 5.86892L18.726 5.88127C22.2653 6.25811 23.0622 7.46822 23.2246 8.08778V9.60865C23.2246 9.71265 23.1838 9.81239 23.1111 9.88593C23.0384 9.95947 22.9398 10.0008 22.8369 10.0008H21.8356C21.6511 8.88811 20.6943 8.04014 19.5418 8.04014C18.3893 8.04014 17.4325 8.88811 17.248 10.0008H10.2058C10.0212 8.88811 9.06448 8.04014 7.91196 8.04014C6.75944 8.04014 5.80269 8.88811 5.61816 10.0008H3.7446C3.64178 10.0008 3.54318 10.0421 3.47048 10.1156C3.39778 10.1892 3.35693 10.2889 3.35693 10.3929C3.35693 10.4969 3.39778 10.5966 3.47048 10.6702C3.54318 10.7437 3.64178 10.785 3.7446 10.785H5.61816C5.80269 11.8977 6.75944 12.7457 7.91196 12.7457C9.06448 12.7457 10.0212 11.8977 10.2058 10.785H17.248C17.4325 11.8977 18.3893 12.7457 19.5418 12.7457C20.6943 12.7457 21.6511 11.8977 21.8356 10.785H22.8369C23.1454 10.785 23.4412 10.6611 23.6593 10.4405C23.8774 10.2199 23.9999 9.92065 23.9999 9.60865V7.99543L23.99 7.95191C23.7431 6.86983 22.5791 5.52855 18.9239 5.11407C18.8217 5.02859 18.7215 4.9435 18.6227 4.85978C17.9828 4.31766 17.3942 3.81887 16.6766 3.45047C15.7966 2.99893 14.7391 2.7464 13.1454 2.7464H4.22917ZM17.9912 10.3929C17.9912 9.97691 18.1545 9.57795 18.4453 9.2838C18.7361 8.98965 19.1306 8.82439 19.5418 8.82439C19.9531 8.82439 20.3475 8.98965 20.6383 9.2838C20.9291 9.57795 21.0925 9.97691 21.0925 10.3929C21.0925 10.8089 20.9291 11.2079 20.6383 11.502C20.3475 11.7962 19.9531 11.9614 19.5418 11.9614C19.1306 11.9614 18.7361 11.7962 18.4453 11.502C18.1545 11.2079 17.9912 10.8089 17.9912 10.3929ZM7.91196 8.82439C7.5007 8.82439 7.10629 8.98965 6.81549 9.2838C6.52468 9.57795 6.36131 9.97691 6.36131 10.3929C6.36131 10.8089 6.52468 11.2079 6.81549 11.502C7.10629 11.7962 7.5007 11.9614 7.91196 11.9614C8.32322 11.9614 8.71763 11.7962 9.00843 11.502C9.29923 11.2079 9.46261 10.8089 9.46261 10.3929C9.46261 9.97691 9.29923 9.57795 9.00843 9.2838C8.71763 8.98965 8.32322 8.82439 7.91196 8.82439Z">
                                        </path>
                                        <path
                                            d="M0 5.09873C0 4.99473 0.0408428 4.89499 0.113543 4.82146C0.186244 4.74792 0.284847 4.7066 0.387662 4.7066H4.74886C4.85167 4.7066 4.95027 4.74792 5.02297 4.82146C5.09567 4.89499 5.13652 4.99473 5.13652 5.09873C5.13652 5.20273 5.09567 5.30247 5.02297 5.37601C4.95027 5.44955 4.85167 5.49086 4.74886 5.49086H0.387662C0.284847 5.49086 0.186244 5.44955 0.113543 5.37601C0.0408428 5.30247 0 5.20273 0 5.09873ZM15.6836 5.60575C15.7563 5.67929 15.7971 5.77901 15.7971 5.88299C15.7971 5.98697 15.7563 6.08669 15.6836 6.16022L15.6532 6.19101C15.2897 6.55865 14.7968 6.76522 14.2828 6.76528H8.14089C8.03808 6.76528 7.93948 6.72397 7.86678 6.65043C7.79408 6.57689 7.75323 6.47715 7.75323 6.37315C7.75323 6.26915 7.79408 6.16941 7.86678 6.09587C7.93948 6.02234 8.03808 5.98102 8.14089 5.98102H14.2826C14.4354 5.98104 14.5866 5.95063 14.7277 5.89152C14.8688 5.83241 14.997 5.74577 15.105 5.63654L15.1355 5.60575C15.2082 5.53224 15.3068 5.49094 15.4096 5.49094C15.5123 5.49094 15.6109 5.53224 15.6836 5.60575ZM8.52856 14.6079C8.52856 14.5039 8.5694 14.4041 8.6421 14.3306C8.7148 14.257 8.8134 14.2157 8.91622 14.2157H10.5638C10.6666 14.2157 10.7652 14.257 10.8379 14.3306C10.9106 14.4041 10.9514 14.5039 10.9514 14.6079C10.9514 14.7118 10.9106 14.8116 10.8379 14.8851C10.7652 14.9587 10.6666 15 10.5638 15H8.91622C8.8134 15 8.7148 14.9587 8.6421 14.8851C8.5694 14.8116 8.52856 14.7118 8.52856 14.6079ZM11.2422 14.6079C11.2422 14.5039 11.283 14.4041 11.3557 14.3306C11.4284 14.257 11.527 14.2157 11.6298 14.2157H15.991C16.0939 14.2157 16.1925 14.257 16.2652 14.3306C16.3379 14.4041 16.3787 14.5039 16.3787 14.6079C16.3787 14.7118 16.3379 14.8116 16.2652 14.8851C16.1925 14.9587 16.0939 15 15.991 15H11.6298C11.527 15 11.4284 14.9587 11.3557 14.8851C11.283 14.8116 11.2422 14.7118 11.2422 14.6079Z">
                                        </path>
                                    </svg>
                                    {{ __('Browse Vehicles') }}
                                </a> --}}
                                {{-- <div class="rating">
                                    <a href="#">
                                        <div class="review-top">
                                            <div class="logo">
                                                <img src="{{ asset('assets/theme29to34/img/home2/icon/trustpilot-logo2.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="star">
                                                <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star.svg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>Trust Rating <span>5.0</span></li>
                                                <li><span>2348</span> Reviews</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="home4-banner-area">
            <div class="video-area">
                <video autoplay loop="loop" muted preload="auto">
                    <source src="{{ asset('public/assets/theme29to34/video/home4/car-video.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="container">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>
                            {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                        </h1>
                        <p>
                            {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                        </p>
                        <div class="banner-content-bottom">
                            {{-- <a href="car-listing-left-sidebar.html" class="primary-btn3">
                                <svg width="24" height="15" viewBox="0 0 24 15" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.25985 0C3.15704 0 3.05844 0.0413135 2.98574 0.114852C2.91304 0.18839 2.87219 0.28813 2.87219 0.392129C2.87219 0.496128 2.91304 0.595867 2.98574 0.669405C3.05844 0.742944 3.15704 0.784257 3.25985 0.784257H4.8105C4.91332 0.784257 5.01192 0.742944 5.08462 0.669405C5.15732 0.595867 5.19816 0.496128 5.19816 0.392129C5.19816 0.28813 5.15732 0.18839 5.08462 0.114852C5.01192 0.0413135 4.91332 0 4.8105 0H3.25985ZM5.77966 0C5.67684 0 5.57824 0.0413135 5.50554 0.114852C5.43284 0.18839 5.39199 0.28813 5.39199 0.392129C5.39199 0.496128 5.43284 0.595867 5.50554 0.669405C5.57824 0.742944 5.67684 0.784257 5.77966 0.784257H10.3347C10.4375 0.784257 10.5361 0.742944 10.6088 0.669405C10.6815 0.595867 10.7223 0.496128 10.7223 0.392129C10.7223 0.28813 10.6815 0.18839 10.6088 0.114852C10.5361 0.0413135 10.4375 0 10.3347 0H5.77966Z">
                                    </path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.22917 2.7464C4.12636 2.7464 4.02776 2.78771 3.95505 2.86125C3.88235 2.93479 3.84151 3.03453 3.84151 3.13853C3.84151 3.24253 3.88235 3.34227 3.95505 3.4158C4.02776 3.48934 4.12636 3.53066 4.22917 3.53066H13.1454C14.653 3.53066 15.5822 3.76829 16.3256 4.15002C16.9575 4.47431 17.4672 4.90546 18.1055 5.44542C18.2375 5.55698 18.3749 5.67305 18.5201 5.79402L18.6101 5.86892L18.726 5.88127C22.2653 6.25811 23.0622 7.46822 23.2246 8.08778V9.60865C23.2246 9.71265 23.1838 9.81239 23.1111 9.88593C23.0384 9.95947 22.9398 10.0008 22.8369 10.0008H21.8356C21.6511 8.88811 20.6943 8.04014 19.5418 8.04014C18.3893 8.04014 17.4325 8.88811 17.248 10.0008H10.2058C10.0212 8.88811 9.06448 8.04014 7.91196 8.04014C6.75944 8.04014 5.80269 8.88811 5.61816 10.0008H3.7446C3.64178 10.0008 3.54318 10.0421 3.47048 10.1156C3.39778 10.1892 3.35693 10.2889 3.35693 10.3929C3.35693 10.4969 3.39778 10.5966 3.47048 10.6702C3.54318 10.7437 3.64178 10.785 3.7446 10.785H5.61816C5.80269 11.8977 6.75944 12.7457 7.91196 12.7457C9.06448 12.7457 10.0212 11.8977 10.2058 10.785H17.248C17.4325 11.8977 18.3893 12.7457 19.5418 12.7457C20.6943 12.7457 21.6511 11.8977 21.8356 10.785H22.8369C23.1454 10.785 23.4412 10.6611 23.6593 10.4405C23.8774 10.2199 23.9999 9.92065 23.9999 9.60865V7.99543L23.99 7.95191C23.7431 6.86983 22.5791 5.52855 18.9239 5.11407C18.8217 5.02859 18.7215 4.9435 18.6227 4.85978C17.9828 4.31766 17.3942 3.81887 16.6766 3.45047C15.7966 2.99893 14.7391 2.7464 13.1454 2.7464H4.22917ZM17.9912 10.3929C17.9912 9.97691 18.1545 9.57795 18.4453 9.2838C18.7361 8.98965 19.1306 8.82439 19.5418 8.82439C19.9531 8.82439 20.3475 8.98965 20.6383 9.2838C20.9291 9.57795 21.0925 9.97691 21.0925 10.3929C21.0925 10.8089 20.9291 11.2079 20.6383 11.502C20.3475 11.7962 19.9531 11.9614 19.5418 11.9614C19.1306 11.9614 18.7361 11.7962 18.4453 11.502C18.1545 11.2079 17.9912 10.8089 17.9912 10.3929ZM7.91196 8.82439C7.5007 8.82439 7.10629 8.98965 6.81549 9.2838C6.52468 9.57795 6.36131 9.97691 6.36131 10.3929C6.36131 10.8089 6.52468 11.2079 6.81549 11.502C7.10629 11.7962 7.5007 11.9614 7.91196 11.9614C8.32322 11.9614 8.71763 11.7962 9.00843 11.502C9.29923 11.2079 9.46261 10.8089 9.46261 10.3929C9.46261 9.97691 9.29923 9.57795 9.00843 9.2838C8.71763 8.98965 8.32322 8.82439 7.91196 8.82439Z">
                                    </path>
                                    <path
                                        d="M0 5.09873C0 4.99473 0.0408428 4.89499 0.113543 4.82146C0.186244 4.74792 0.284847 4.7066 0.387662 4.7066H4.74886C4.85167 4.7066 4.95027 4.74792 5.02297 4.82146C5.09567 4.89499 5.13652 4.99473 5.13652 5.09873C5.13652 5.20273 5.09567 5.30247 5.02297 5.37601C4.95027 5.44955 4.85167 5.49086 4.74886 5.49086H0.387662C0.284847 5.49086 0.186244 5.44955 0.113543 5.37601C0.0408428 5.30247 0 5.20273 0 5.09873ZM15.6836 5.60575C15.7563 5.67929 15.7971 5.77901 15.7971 5.88299C15.7971 5.98697 15.7563 6.08669 15.6836 6.16022L15.6532 6.19101C15.2897 6.55865 14.7968 6.76522 14.2828 6.76528H8.14089C8.03808 6.76528 7.93948 6.72397 7.86678 6.65043C7.79408 6.57689 7.75323 6.47715 7.75323 6.37315C7.75323 6.26915 7.79408 6.16941 7.86678 6.09587C7.93948 6.02234 8.03808 5.98102 8.14089 5.98102H14.2826C14.4354 5.98104 14.5866 5.95063 14.7277 5.89152C14.8688 5.83241 14.997 5.74577 15.105 5.63654L15.1355 5.60575C15.2082 5.53224 15.3068 5.49094 15.4096 5.49094C15.5123 5.49094 15.6109 5.53224 15.6836 5.60575ZM8.52856 14.6079C8.52856 14.5039 8.5694 14.4041 8.6421 14.3306C8.7148 14.257 8.8134 14.2157 8.91622 14.2157H10.5638C10.6666 14.2157 10.7652 14.257 10.8379 14.3306C10.9106 14.4041 10.9514 14.5039 10.9514 14.6079C10.9514 14.7118 10.9106 14.8116 10.8379 14.8851C10.7652 14.9587 10.6666 15 10.5638 15H8.91622C8.8134 15 8.7148 14.9587 8.6421 14.8851C8.5694 14.8116 8.52856 14.7118 8.52856 14.6079ZM11.2422 14.6079C11.2422 14.5039 11.283 14.4041 11.3557 14.3306C11.4284 14.257 11.527 14.2157 11.6298 14.2157H15.991C16.0939 14.2157 16.1925 14.257 16.2652 14.3306C16.3379 14.4041 16.3787 14.5039 16.3787 14.6079C16.3787 14.7118 16.3379 14.8116 16.2652 14.8851C16.1925 14.9587 16.0939 15 15.991 15H11.6298C11.527 15 11.4284 14.9587 11.3557 14.8851C11.283 14.8116 11.2422 14.7118 11.2422 14.6079Z">
                                    </path>
                                </svg>
                                {{ __('Browse Vehicles') }}
                            </a> --}}
{{-- 
                            <div class="rating">
                                <a href="#">
                                    <div class="review-top">
                                        <div class="logo">
                                            <img src="{{ asset('assets/theme29to34/img/home2/icon/trustpilot-logo2.svg') }}"
                                                alt="">
                                        </div>
                                        <div class="star">
                                            <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>Trust Rating <span>5.0</span></li>
                                            <li><span>2348</span> Reviews</li>
                                        </ul>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Slider Area End -->
    
    
    @include('storefront.layout.theme29to34.search-type-1')

    <!-- Vehicles Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <div class="featured-car-section pt-100 mb-100">
            <div class="container">
                <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-lg-12 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <h2>{{ __('Vehicles') }}</h2>
                            <p>{{ __('Here are some of the featured cars in different categories') }}</p>
                        </div>
                        <div class="slider-btn-group2">
                            <div class="slider-btn prev-1">
                                <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                </svg>
                            </div>
                            <div class="slider-btn next-1">
                                <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row wow fadeInUp" data-wow-delay="300ms">
                    <div class="swiper home2-featured-slider">
                        <div class="swiper-wrapper">
                            @foreach ($product_list as $product)
                                <div class="swiper-slide">
                                    <div class="feature-card">
                                        <div class="product-img">
                                            {{-- <div class="number-of-img">
                                        <img src="assets/img/home1/icon/gallery-icon-1.svg" alt="">
                                        10
                                    </div> --}}
                                            {{-- <a href="#" class="fav">
                                        <svg width="14" height="13" viewBox="0 0 14 14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.00012 2.40453L6.37273 1.75966C4.90006 0.245917 2.19972 0.76829 1.22495 2.67141C0.767306 3.56653 0.664053 4.8589 1.4997 6.50827C2.30473 8.09639 3.97953 9.99864 7.00012 12.0706C10.0207 9.99864 11.6946 8.09639 12.5005 6.50827C13.3362 4.85803 13.2338 3.56653 12.7753 2.67141C11.8005 0.76829 9.10019 0.245042 7.62752 1.75879L7.00012 2.40453ZM7.00012 13.125C-6.41666 4.25953 2.86912 -2.65995 6.84612 1.00016C6.89862 1.04829 6.95024 1.09816 7.00012 1.14979C7.04949 1.09821 7.10087 1.04859 7.15413 1.00104C11.1302 -2.6617 20.4169 4.25865 7.00012 13.125Z">
                                            </path>
                                        </svg>
                                    </a> --}}
                                            {{-- <div class="slider-btn-group">
                                        <div class="product-stand-next swiper-arrow">
                                            <svg width="8" height="13" viewBox="0 0 8 13"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                            </svg>
                                        </div>
                                        <div class="product-stand-prev swiper-arrow">
                                            <svg width="8" height="13" viewBox="0 0 8 13"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                            </svg>
                                        </div>
                                    </div> --}}
                                            <div class="swiper product-img-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                            <img alt="Image placeholder"
                                                                class="d-block w-100 img-height-407"
                                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}">
                                                        @else
                                                            <img alt="Image placeholder"
                                                                class="d-block w-100 img-height-407"
                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}">
                                                        @endif
                                                    </div>
                                                    {{-- <div class="swiper-slide">
                                                <img class="img-fluid" src="assets/img/home2/feature-1.png" alt="image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="img-fluid" src="assets/img/home2/feature-1.png" alt="image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="img-fluid" src="assets/img/home2/feature-1.png" alt="image">
                                            </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="price">
                                                <strong>
                                                    {{ \App\Models\Utility::priceFormat($product->net_price) }}
                                                    @if ($product->price)
                                                        <span>/{{ \App\Models\Utility::priceFormat($product->price) }}</span>
                                                    @endif
                                                    {{-- <small class="text-muted">({{ $product->product_category() }})</small> --}}
                                                </strong>
                                            </div>
                                            <h5><a
                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">{{ $product->getName() }}</a>
                                            </h5>
                                            <ul class="features">
                                                <li>
                                                    <i class="fas fa-gas-pump"></i>
                                                    {{ \App\Models\Product::getFuelTypeById($product->fuel_type_id) }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-road"></i> {{ $product->millage }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-car"></i> {{ $product->power }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-cog"></i> {{ $product->prev_owners }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-calendar-alt"></i> {{ $product->register_year }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-cogs"></i>
                                                    {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('storefront.layout.theme29to34.product-type-1')

    @if (isset($storethemesetting['enable_features']) && $storethemesetting['enable_features'] == 'on')
        <div class="home5-why-drivco-area pt-90 pb-90 mb-100">
            <div class="container">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="drivco-content">
                            <div class="section-title-2 mb-60 wow fadeInUp" data-wow-delay="200ms">
                                <h2>{{ __('Why Choose Us?') }}</h2>
                                <p>{{ __('Premium Plan Free Trial') }}</p>
                            </div>
                            <div class="drivco-featute">
                                <ul>
                                    @if (isset($storethemesetting['enable_features1']) && $storethemesetting['enable_features1'] == 'on')
                                        @if (isset($storethemesetting['features_icon1']))
                                            <li class="single-feature wow fadeInUp" data-wow-delay="300ms">
                                                <div class="feature-icon fa-2x">
                                                    {!! $storethemesetting['features_icon1'] !!}
                                                </div>
                                                <div class="feature-content">
                                                    <h5>{{ $storethemesetting['features_title1'] }}</h5>
                                                    <p>
                                                        {{ $storethemesetting['features_description1'] }}
                                                    </p>
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                    @if (isset($storethemesetting['enable_features2']) && $storethemesetting['enable_features2'] == 'on')
                                        @if (isset($storethemesetting['features_icon2']))
                                            <li class="single-feature wow fadeInUp" data-wow-delay="400ms">
                                                <div class="feature-icon fa-2x">
                                                    {!! $storethemesetting['features_icon2'] !!}
                                                </div>
                                                <div class="feature-content">
                                                    <h5>{{ $storethemesetting['features_title2'] }}</h5>
                                                    <p>
                                                        {{ $storethemesetting['features_description2'] }}
                                                    </p>
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                    @if (isset($storethemesetting['enable_features3']) && $storethemesetting['enable_features3'] == 'on')
                                        @if (isset($storethemesetting['features_icon3']))
                                            <li class="single-feature wow fadeInUp" data-wow-delay="500ms">
                                                <div class="feature-icon fa-2x">
                                                    {!! $storethemesetting['features_icon3'] !!}
                                                </div>
                                                <div class="feature-content">
                                                    <h5>{{ $storethemesetting['features_title3'] }}</h5>
                                                    <p>
                                                        {{ $storethemesetting['features_description3'] }}
                                                    </p>
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center bg-dark d-none d-lg-flex rounded">
                        {{-- <div class="drivco-img wow zoomIn" data-wow-delay="400ms"> --}}
                            {{-- <div class="col-lg-6 d-flex justify-content-center align-items-center bg-dark d-none d-lg-flex"> --}}
                                @if (!empty($store->logo))
                                    <img width="300" src="{{ asset(Storage::url('uploads/store_logo/' . $store->logo)) }}"
                                        alt="Image placeholder">
                                @else
                                    <img width="300"class="logo1 img-fluid" src="{{ asset(Storage::url('uploads/store_logo/logo.png')) }}"
                                        alt="Image placeholder">
                                @endif
                            {{-- </div> --}}
                            {{-- <img src="{{ asset('assets/theme29to34/img//home5/why-drivco.png') }}" alt="img"> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('storefront.layout.theme29to34.gallery-type-1')
    @include('storefront.layout.theme29to34.category-type-1')
    @include('storefront.layout.theme29to34.testimonial-type-2')
    @include('storefront.layout.theme29to34.brand-logo-type-1')

@endsection
@push('script-page')
@endpush
