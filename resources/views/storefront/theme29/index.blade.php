@extends('storefront.layout.' . $store->theme_dir . '')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Slider Area Start -->
    @if (isset($storethemesetting['enable_slider_settings']) && $storethemesetting['enable_slider_settings'] == 'on')
    <div class="home3-banner-area">
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
                    <div class="banner-wrapper">
                        <div class="banner-content">
                            @foreach (json_decode($storethemesetting['slider_settings']) as $key => $sliderSettings)
                                <h1>{{ !empty($sliderSettings->slider_title) ? $sliderSettings->slider_title : 'Home Accessories' }}
                                </h1>
                                <div class="banner-feature">
                                    {{-- <p>{{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                            </p> --}}
                                    <ul>
                                        <li>
                                            {{ !empty($sliderSettings->slider_description) ? $sliderSettings->slider_description : 'Find the right price, dealer and advice.' }}
                                        </li>
                                        {{-- <li>Used Car <span>19, 230</span></li>
                                <li>New Car <span>2, 230</span></li>
                                <li>Auction Car <span>2, 230</span></li> --}}
                                    </ul>
                                </div>
                                @php
                                    break;
                                @endphp
                            @endforeach
                            {{-- <div class="trustpilot-review">
                                <strong>Excellent!</strong>
                                <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-star2.svg') }}"
                                    alt="">
                                <p>5.0 Rating out of <strong>5.0</strong> based on <a
                                        href="#"><strong>245354</strong>
                                        reviews</a></p>
                                <img src="{{ asset('assets/theme29to34/img/home1/icon/trustpilot-logo2.svg') }}"
                                    alt="">
                            </div> --}}
                        </div>
                        <div
                            class="slider-btn-group style-2 style-3 justify-content-md-end justify-content-center gap-4">
                            <div class="slider-btn prev-4 d-md-flex d-none">
                                <svg width="11" height="19" viewBox="0 0 8 13"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                </svg>
                            </div>
                            <div class="paginations111"></div>
                            <div class="slider-btn next-4 d-md-flex d-none">
                                <svg width="11" height="19" viewBox="0 0 8 13"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('storefront.layout.theme29to34.search-type-1')
    @else
        <!-- Start Banner section -->
        <div class="banner-section1">
            <div class="container">
                <div class="row g-xl-4 gy-5">
                    <div class="col-xxl-8 col-xl-7 d-flex align-items-center wow fadeInUp" data-wow-delay="200ms">
                        <div class="banner-content">
                            <span class="sub-title">
                            {{__('Fastest Speed')}}
                            <svg width="30" height="23" viewBox="0 0 30 23"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M27.5455 22.9817C27.4552 22.9815 27.3665 22.9573 27.2884 22.9115C27.2103 22.8658 27.1454 22.8001 27.1004 22.7211C27.0553 22.6421 27.0316 22.5525 27.0317 22.4613C27.0317 22.3701 27.0555 22.2805 27.1007 22.2016C28.3257 20.0567 28.9696 17.6237 28.9675 15.1475C28.9675 7.3693 22.7008 1.04076 14.9987 1.04076C7.29658 1.04076 1.02995 7.3693 1.02995 15.1475C1.02871 17.6237 1.67347 20.0564 2.89932 22.2009C2.93658 22.2601 2.9616 22.3263 2.97287 22.3955C2.98415 22.4647 2.98144 22.5355 2.96492 22.6036C2.94839 22.6718 2.91839 22.7358 2.87672 22.7919C2.83505 22.848 2.78257 22.8951 2.72244 22.9302C2.66231 22.9653 2.59577 22.9877 2.52682 22.9962C2.45787 23.0046 2.38795 22.9989 2.32124 22.9794C2.25454 22.9598 2.19244 22.9269 2.13868 22.8825C2.08492 22.8381 2.04061 22.7831 2.00841 22.721C0.692402 20.4183 -0.000272498 17.8064 8.04167e-08 15.1478C0.000272659 12.4891 0.693483 9.87736 2.00996 7.57499C3.32645 5.27261 5.21982 3.36073 7.4998 2.03148C9.77979 0.70223 12.3661 0.00244141 14.9987 0.00244141C17.6314 0.00244141 20.2176 0.70223 22.4976 2.03148C24.7776 3.36073 26.671 5.27261 27.9875 7.57499C29.3039 9.87736 29.9972 12.4891 29.9974 15.1478C29.9977 17.8064 29.305 20.4183 27.989 22.721C27.9441 22.7998 27.8795 22.8653 27.8017 22.9111C27.7239 22.9568 27.6355 22.9812 27.5455 22.9817Z" />
                                <path
                                    d="M23.8916 20.852C23.8005 20.8519 23.7111 20.8274 23.6324 20.781C23.5537 20.7346 23.4886 20.668 23.4438 20.5878C23.399 20.5077 23.376 20.4171 23.3772 20.325C23.3784 20.233 23.4038 20.143 23.4507 20.0641C24.3667 18.5232 24.8505 16.7596 24.8501 14.9623C24.8501 9.4795 20.4329 5.01604 15.0012 5.01604C9.56949 5.01604 5.15227 9.4769 5.15227 14.9623C5.15139 16.7589 5.63424 18.522 6.54914 20.0628C6.58726 20.1214 6.61326 20.1871 6.62561 20.256C6.63795 20.3249 6.63638 20.3957 6.62098 20.464C6.60558 20.5323 6.57668 20.5967 6.536 20.6535C6.49533 20.7102 6.44372 20.7581 6.38428 20.7942C6.32483 20.8303 6.25878 20.8539 6.19008 20.8636C6.12138 20.8733 6.05144 20.8689 5.98448 20.8506C5.91751 20.8323 5.8549 20.8006 5.80038 20.7572C5.74587 20.7139 5.70059 20.6599 5.66725 20.5985C4.65594 18.8959 4.12192 16.9477 4.12231 14.9623C4.12231 8.90547 9.00108 3.97591 15.0012 3.97591C21.0013 3.97591 25.8801 8.90287 25.8801 14.9623C25.8805 16.9477 25.3465 18.8959 24.3352 20.5985C24.2894 20.676 24.2244 20.7401 24.1466 20.7845C24.0689 20.829 23.981 20.8523 23.8916 20.852Z" />
                                <path
                                    d="M15.0014 5.01863C14.8648 5.01863 14.7338 4.96384 14.6373 4.86631C14.5407 4.76877 14.4864 4.63649 14.4864 4.49856V0.520065C14.4864 0.382135 14.5407 0.249855 14.6373 0.152324C14.7338 0.0547925 14.8648 0 15.0014 0C15.138 0 15.269 0.0547925 15.3655 0.152324C15.4621 0.249855 15.5164 0.382135 15.5164 0.520065V4.49856C15.5164 4.63649 15.4621 4.76877 15.3655 4.86631C15.269 4.96384 15.138 5.01863 15.0014 5.01863ZM9.74348 6.46961C9.65306 6.46963 9.56424 6.44561 9.48593 6.39997C9.40762 6.35432 9.34259 6.28866 9.29738 6.20958L7.31343 2.74009C7.24514 2.62061 7.22665 2.47863 7.26202 2.34538C7.29739 2.21212 7.38373 2.09852 7.50204 2.02955C7.62036 1.96059 7.76095 1.94191 7.8929 1.97763C8.02485 2.01335 8.13734 2.10055 8.20563 2.22003L10.1889 5.68951C10.2341 5.76853 10.2579 5.85817 10.2579 5.94941C10.258 6.04066 10.2342 6.1303 10.1891 6.20935C10.1439 6.28839 10.079 6.35405 10.0008 6.39974C9.92257 6.44542 9.83383 6.46952 9.74348 6.46961ZM5.95132 10.3909C5.86084 10.391 5.77198 10.3667 5.69383 10.3207L2.20035 8.28399C2.08204 8.21502 1.9957 8.10142 1.96033 7.96817C1.92496 7.83492 1.94345 7.69293 2.01174 7.57345C2.08003 7.45397 2.19252 7.36678 2.32447 7.33106C2.45642 7.29533 2.59702 7.31401 2.71533 7.38298L6.20945 9.42033C6.30768 9.47755 6.38447 9.56591 6.42789 9.6717C6.47131 9.7775 6.47894 9.8948 6.44959 10.0054C6.42025 10.116 6.35557 10.2138 6.26559 10.2835C6.17561 10.3532 6.06536 10.3909 5.95196 10.3909H5.95132ZM4.64199 15.667H0.517663C0.381082 15.667 0.250096 15.6122 0.153519 15.5146C0.0569419 15.4171 0.00268555 15.2848 0.00268555 15.1469C0.00268555 15.009 0.0569419 14.8767 0.153519 14.7792C0.250096 14.6816 0.381082 14.6268 0.517663 14.6268H4.64199C4.77857 14.6268 4.90955 14.6816 5.00613 14.7792C5.10271 14.8767 5.15696 15.009 5.15696 15.1469C5.15696 15.2848 5.10271 15.4171 5.00613 15.5146C4.90955 15.6122 4.77857 15.667 4.64199 15.667ZM2.45655 22.9817C2.34315 22.9817 2.23291 22.944 2.14293 22.8743C2.05295 22.8046 1.98826 22.7068 1.95892 22.5962C1.92957 22.4856 1.9372 22.3683 1.98062 22.2625C2.02404 22.1567 2.10083 22.0683 2.19906 22.0111L5.85347 19.8808C5.91209 19.8445 5.97732 19.8204 6.04531 19.81C6.1133 19.7995 6.18267 19.8029 6.24933 19.82C6.31598 19.8371 6.37858 19.8675 6.43342 19.9094C6.48826 19.9513 6.53424 20.0039 6.56863 20.064C6.60303 20.1241 6.62515 20.1906 6.63369 20.2595C6.64223 20.3284 6.63702 20.3984 6.61836 20.4652C6.5997 20.5321 6.56798 20.5945 6.52505 20.6487C6.48213 20.703 6.42888 20.748 6.36845 20.7812L2.7134 22.9121C2.63529 22.9576 2.54672 22.9816 2.45655 22.9817ZM27.5462 22.9817C27.4559 22.9817 27.3671 22.9577 27.2888 22.9121L23.6343 20.7812C23.5739 20.748 23.5207 20.703 23.4777 20.6487C23.4348 20.5945 23.4031 20.5321 23.3844 20.4652C23.3658 20.3984 23.3606 20.3284 23.3691 20.2595C23.3776 20.1906 23.3998 20.1241 23.4342 20.064C23.4686 20.0039 23.5145 19.9513 23.5694 19.9094C23.6242 19.8675 23.6868 19.8371 23.7535 19.82C23.8201 19.8029 23.8895 19.7995 23.9575 19.81C24.0255 19.8204 24.0907 19.8445 24.1493 19.8808L27.8037 22.0111C27.902 22.0683 27.9788 22.1567 28.0222 22.2625C28.0656 22.3683 28.0732 22.4856 28.0439 22.5962C28.0145 22.7068 27.9499 22.8046 27.8599 22.8743C27.7699 22.944 27.6596 22.9817 27.5462 22.9817ZM29.4851 15.667H25.3653C25.2287 15.667 25.0977 15.6122 25.0012 15.5146C24.9046 15.4171 24.8503 15.2848 24.8503 15.1469C24.8503 15.009 24.9046 14.8767 25.0012 14.7792C25.0977 14.6816 25.2287 14.6268 25.3653 14.6268H29.4851C29.6217 14.6268 29.7527 14.6816 29.8493 14.7792C29.9459 14.8767 30.0001 15.009 30.0001 15.1469C30.0001 15.2848 29.9459 15.4171 29.8493 15.5146C29.7527 15.6122 29.6217 15.667 29.4851 15.667ZM24.0515 10.3909C23.9381 10.3909 23.8278 10.3532 23.7379 10.2835C23.6479 10.2138 23.5832 10.116 23.5538 10.0054C23.5245 9.8948 23.5321 9.7775 23.5756 9.6717C23.619 9.56591 23.6958 9.47755 23.794 9.42033L27.2881 7.38298C27.4064 7.31401 27.547 7.29533 27.679 7.33106C27.8109 7.36678 27.9234 7.45397 27.9917 7.57345C28.06 7.69293 28.0785 7.83492 28.0431 7.96817C28.0077 8.10142 27.9214 8.21502 27.8031 8.28399L24.3083 10.3207C24.2304 10.3666 24.1417 10.3908 24.0515 10.3909ZM20.2593 6.46896C20.1689 6.46924 20.08 6.44524 20.0018 6.3994C19.9432 6.36526 19.8919 6.3198 19.8507 6.26561C19.8095 6.21143 19.7793 6.14958 19.7618 6.08359C19.7443 6.01761 19.7398 5.94879 19.7486 5.88106C19.7574 5.81333 19.7794 5.74802 19.8132 5.68886L21.7965 2.21938C21.8648 2.0999 21.9773 2.0127 22.1093 1.97698C22.2412 1.94126 22.3818 1.95994 22.5001 2.0289C22.6184 2.09787 22.7048 2.21147 22.7401 2.34473C22.7755 2.47798 22.757 2.61996 22.6887 2.73944L20.7054 6.20893C20.6602 6.28801 20.5952 6.35367 20.5169 6.39931C20.4386 6.44496 20.3497 6.46898 20.2593 6.46896ZM15.0014 21.3071C14.6983 21.3072 14.3986 21.2419 14.1225 21.1157C13.8464 20.9894 13.6001 20.8051 13.4002 20.575C13.2003 20.3449 13.0514 20.0743 12.9634 19.7814C12.8754 19.4884 12.8504 19.1799 12.89 18.8764L14.4909 6.55152C14.5074 6.42659 14.5682 6.31194 14.6621 6.22891C14.756 6.14588 14.8766 6.1001 15.0014 6.1001C15.1262 6.1001 15.2468 6.14588 15.3407 6.22891C15.4346 6.31194 15.4954 6.42659 15.5119 6.55152L17.1128 18.8784C17.1521 19.1817 17.1268 19.49 17.0387 19.7827C16.9506 20.0754 16.8016 20.3457 16.6017 20.5756C16.4019 20.8055 16.1557 20.9897 15.8798 21.1158C15.6038 21.242 15.3043 21.3072 15.0014 21.3071ZM15.0014 10.6178L13.9109 19.0142C13.891 19.1707 13.9043 19.3297 13.9499 19.4806C13.9956 19.6315 14.0726 19.7709 14.1758 19.8894C14.279 20.0079 14.406 20.1028 14.5483 20.1678C14.6907 20.2328 14.8452 20.2664 15.0014 20.2664C15.1576 20.2664 15.3121 20.2328 15.4545 20.1678C15.5968 20.1028 15.7238 20.0079 15.827 19.8894C15.9302 19.7709 16.0072 19.6315 16.0529 19.4806C16.0985 19.3297 16.1118 19.1707 16.0919 19.0142L15.0014 10.6178Z" />
                            </svg>
                        </span>
                            <h1>
                                {{ !empty($storethemesetting['header_title']) ? $storethemesetting['header_title'] : 'Home Accessories' }}
                            </h1>
                            <p>
                                {{ !empty($storethemesetting['header_desc']) ? $storethemesetting['header_desc'] : 'Find the right price, dealer and advice.' }}
                            </p>
                            {{-- <div class="customar-review">
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="review-top">
                                            <div class="logo">
                                                <img src="assets/img/home1/icon/trstpilot-logo.svg" alt="">
                                            </div>
                                            <div class="star">
                                                <img src="assets/img/home1/icon/trustpilot-star.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>Trust Rating <span>5.0</span></li>
                                                <li><span>2348</span> Reviews</li>
                                            </ul>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="review-top">
                                            <div class="logo">
                                                <img src="assets/img/home1/icon/google-logo.svg" alt="">
                                            </div>
                                            <div class="star">
                                                <ul>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>Trust Rating <span>5.0</span></li>
                                                <li><span>2348</span> Reviews</li>
                                            </ul>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-5 wow zoomIn" data-wow-delay="300ms">
                        <div class="car-filter-area">
                            {{-- <h4>Find Your Dream Car</h4> --}}
                            <form action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}"
                                id="frm-filter" method="get">
                                @csrf
                                <div class="form-inner mb-25">
                                    <label> {{ __('Vehicle Type') }}</label>
                                    <select class="select" name="vehicle_type_id" id="vehicle_type_id"
                                        data-url="{{ route('product.get-vehicle-brands', [$store->slug]) }}">
                                        <option value="">
                                            {{ __('Select Vehicle Type') }}
                                        </option>
                                        @foreach ($vehicleTypes as $vehicleType)
                                            <option value="{{ $vehicleType['id'] }}">
                                                {{ $vehicleType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inner mb-25">
                                    <label>{{ __('Select Make') }}</label>
                                    <select class="select" name="brand_id" id="brand_id"
                                        data-url="{{ route('product.get-models', [$store->slug]) }}" disabled>
                                        <option value="">
                                            {{ __('Select Make') }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-inner mb-25">
                                    <label>{{ __('Select Model') }}</label>
                                    <select class="select" name="model_id" id="model_id" disabled>
                                        <option value="">
                                            {{ __('Select Model') }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-inner last">
                                    <button class="primary-btn1" type="submit"> {{ __('Search') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner section -->
    @endif
    <!-- Slider Area End -->

    <!-- Vehicles Area Start -->
    @if ($products['Start shopping']->count() > 0)
        <div class="most-search-area pt-90 pb-90 mb-100">
            <div class="container">
                <div class="row mb-60 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
                        <div class="section-title1">
                            {{-- <span>Available Brand Car</span> --}}
                            <h2>{{ __('Vehicles') }}</h2>
                        </div>
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            @foreach ($categories as $key => $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $category == 'Start shopping' ? 'active' : '' }}"
                                        id="{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}" role="tab"
                                        aria-controls="{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $category) !!}"
                                        aria-selected="{{ $category == 'Start shopping' ? 'true' : 'false' }}">
                                        {{ __($category) }}</button>
                                </li>
                            @endforeach
                            {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="suv-tab" data-bs-toggle="tab" data-bs-target="#suv"
                                type="button" role="tab" aria-controls="suv" aria-selected="false">SUV</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="toyota-tab" data-bs-toggle="tab" data-bs-target="#toyota"
                                type="button" role="tab" aria-controls="toyota" aria-selected="false">Toyota</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="hatch-tab" data-bs-toggle="tab" data-bs-target="#hatch"
                                type="button" role="tab" aria-controls="hatch" aria-selected="false">Hatch</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bmw-tab" data-bs-toggle="tab" data-bs-target="#bmw"
                                type="button" role="tab" aria-controls="bmw" aria-selected="false">BMW</button>
                        </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row wow fadeInUp" data-wow-delay="300ms">
                    <div class="col-lg-12 position-relative">
                        <div class="slider-btn-groups">
                            <div class="slider-btn prev-1">
                                <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                </svg>
                            </div>
                            <div class="slider-btn next-1">
                                <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent5">
                            @foreach ($products as $key => $items)
                                <div class="tab-pane fade {{ $key == 'Start shopping' ? 'active show' : '' }}"
                                    id="{!! preg_replace('/[^A-Za-z0-9\-]/', '_', $key) !!}" role="tabpanel" aria-labelledby="popular-car1-tab">
                                    <div class="row g-4 justify-content-center">
                                        @if ($items->count() > 0)
                                            @foreach ($items as $product)
                                                <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInUp"
                                                    data-wow-delay="200ms">
                                                    <div class="product-card">
                                                        <div class="product-img">
                                                            {{-- <div class="number-of-img">
                                                                <img src="assets/img/home1/icon/gallery-icon-1.svg"
                                                                    alt="">
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
                                                                        <path
                                                                            d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="product-stand-prev swiper-arrow">
                                                                    <svg width="8" height="13" viewBox="0 0 8 13"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                                                    </svg>
                                                                </div>
                                                            </div> --}}
                                                            <div class="swiper product-img-slider">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @else
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @endif
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @else
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @endif
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @else
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @endif
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @else
                                                                            <img alt="Image placeholder"
                                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                                class="d-block w-100 img-height-250">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h5>
                                                                <a
                                                                    href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                                    {{ $product->getName() }}
                                                                </a>
                                                            </h5>
                                                            <div class="price-location">
                                                                <div class="price">
                                                                    <strong>
                                                                        {{ \App\Models\Utility::priceFormat($product->net_price) }}</strong>
                                                                    @if ($product->price)
                                                                        <small>/{{ \App\Models\Utility::priceFormat($product->price) }}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="location">
                                                                    <a href="#"><i class="fas fa-th-large"></i>
                                                                        {{ $product->product_category() }}
                                                                    </a>
                                                                </div>
                                                            </div>
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
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                    {{ $product->register_year }}
                                                                </li>
                                                                <li>
                                                                    <i class="fas fa-cogs"></i>
                                                                    {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                                                                </li>
                                                            </ul>
                                                            {{-- <div class="content-btm">
                                                                <a class="view-btn2" href="car-deatils.html">
                                                                    <svg width="35" height="21"
                                                                        viewBox="0 0 35 21"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 20C5.47715 20 1 15.7467 1 10.5C1 5.25329 5.47715 1 11 1"
                                                                            stroke-linecap="round" />
                                                                        <path
                                                                            d="M14.2597 3C14.1569 3 14.0583 3.04166 13.9856 3.11582C13.9129 3.18997 13.8721 3.29055 13.8721 3.39542C13.8721 3.50029 13.9129 3.60086 13.9856 3.67502C14.0583 3.74917 14.1569 3.79083 14.2597 3.79083H15.8104C15.9132 3.79083 16.0118 3.74917 16.0845 3.67502C16.1572 3.60086 16.198 3.50029 16.198 3.39542C16.198 3.29055 16.1572 3.18997 16.0845 3.11582C16.0118 3.04166 15.9132 3 15.8104 3H14.2597ZM16.7795 3C16.6767 3 16.5781 3.04166 16.5054 3.11582C16.4327 3.18997 16.3919 3.29055 16.3919 3.39542C16.3919 3.50029 16.4327 3.60086 16.5054 3.67502C16.5781 3.74917 16.6767 3.79083 16.7795 3.79083H21.3346C21.4374 3.79083 21.536 3.74917 21.6087 3.67502C21.6814 3.60086 21.7222 3.50029 21.7222 3.39542C21.7222 3.29055 21.6814 3.18997 21.6087 3.11582C21.536 3.04166 21.4374 3 21.3346 3H16.7795Z" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M15.2292 5.76953C15.1264 5.76953 15.0278 5.81119 14.9551 5.88535C14.8824 5.9595 14.8415 6.06008 14.8415 6.16495C14.8415 6.26982 14.8824 6.3704 14.9551 6.44455C15.0278 6.51871 15.1264 6.56037 15.2292 6.56037H24.1454C25.653 6.56037 26.5822 6.79999 27.3256 7.18493C27.9575 7.51194 28.4672 7.9467 29.1055 8.49119C29.2375 8.60368 29.3749 8.72073 29.5201 8.84271L29.6101 8.91824L29.726 8.93069C33.2653 9.31069 34.0622 10.5309 34.2246 11.1557V12.6893C34.2246 12.7942 34.1838 12.8948 34.1111 12.9689C34.0384 13.0431 33.9398 13.0847 33.8369 13.0847H32.8356C32.6511 11.9627 31.6943 11.1077 30.5418 11.1077C29.3893 11.1077 28.4325 11.9627 28.248 13.0847H21.2058C21.0212 11.9627 20.0645 11.1077 18.912 11.1077C17.7594 11.1077 16.8027 11.9627 16.6182 13.0847H14.7446C14.6418 13.0847 14.5432 13.1264 14.4705 13.2006C14.3978 13.2747 14.3569 13.3753 14.3569 13.4802C14.3569 13.585 14.3978 13.6856 14.4705 13.7598C14.5432 13.8339 14.6418 13.8756 14.7446 13.8756H16.6182C16.8027 14.9976 17.7594 15.8527 18.912 15.8527C20.0645 15.8527 21.0212 14.9976 21.2058 13.8756H28.248C28.4325 14.9976 29.3893 15.8527 30.5418 15.8527C31.6943 15.8527 32.6511 14.9976 32.8356 13.8756H33.8369C34.1454 13.8756 34.4412 13.7506 34.6593 13.5281C34.8774 13.3057 34.9999 13.0039 34.9999 12.6893V11.0626L34.99 11.0187C34.7431 9.92754 33.5791 8.57502 29.9239 8.15706C29.8217 8.07086 29.7215 7.98505 29.6227 7.90063C28.9828 7.35397 28.3942 6.851 27.6766 6.4795C26.7966 6.02418 25.7391 5.76953 24.1454 5.76953H15.2292ZM28.9912 13.4802C28.9912 13.0607 29.1545 12.6584 29.4453 12.3618C29.7361 12.0651 30.1306 11.8985 30.5418 11.8985C30.9531 11.8985 31.3475 12.0651 31.6383 12.3618C31.9291 12.6584 32.0925 13.0607 32.0925 13.4802C32.0925 13.8996 31.9291 14.302 31.6383 14.5986C31.3475 14.8952 30.9531 15.0618 30.5418 15.0618C30.1306 15.0618 29.7361 14.8952 29.4453 14.5986C29.1545 14.302 28.9912 13.8996 28.9912 13.4802ZM18.912 11.8985C18.5007 11.8985 18.1063 12.0651 17.8155 12.3618C17.5247 12.6584 17.3613 13.0607 17.3613 13.4802C17.3613 13.8996 17.5247 14.302 17.8155 14.5986C18.1063 14.8952 18.5007 15.0618 18.912 15.0618C19.3232 15.0618 19.7176 14.8952 20.0084 14.5986C20.2992 14.302 20.4626 13.8996 20.4626 13.4802C20.4626 13.0607 20.2992 12.6584 20.0084 12.3618C19.7176 12.0651 19.3232 11.8985 18.912 11.8985Z" />
                                                                        <path
                                                                            d="M11 8.14151C11 8.03664 11.0408 7.93606 11.1135 7.86191C11.1862 7.78775 11.2848 7.74609 11.3877 7.74609H15.7489C15.8517 7.74609 15.9503 7.78775 16.023 7.86191C16.0957 7.93606 16.1365 8.03664 16.1365 8.14151C16.1365 8.24638 16.0957 8.34696 16.023 8.42111C15.9503 8.49527 15.8517 8.53693 15.7489 8.53693H11.3877C11.2848 8.53693 11.1862 8.49527 11.1135 8.42111C11.0408 8.34696 11 8.24638 11 8.14151ZM26.6836 8.65278C26.7563 8.72694 26.7971 8.82749 26.7971 8.93234C26.7971 9.03719 26.7563 9.13775 26.6836 9.2119L26.6532 9.24294C26.2897 9.61367 25.7968 9.82197 25.2828 9.82203H19.1409C19.0381 9.82203 18.9395 9.78037 18.8668 9.70622C18.7941 9.63206 18.7532 9.53149 18.7532 9.42662C18.7532 9.32174 18.7941 9.22117 18.8668 9.14701C18.9395 9.07286 19.0381 9.0312 19.1409 9.0312H25.2826C25.4354 9.03122 25.5866 9.00055 25.7277 8.94095C25.8688 8.88134 25.997 8.79397 26.105 8.68382L26.1355 8.65278C26.2082 8.57866 26.3068 8.53701 26.4096 8.53701C26.5123 8.53701 26.6109 8.57866 26.6836 8.65278ZM19.5286 17.7304C19.5286 17.6255 19.5694 17.5249 19.6421 17.4508C19.7148 17.3766 19.8134 17.335 19.9162 17.335H21.5638C21.6666 17.335 21.7652 17.3766 21.8379 17.4508C21.9106 17.5249 21.9514 17.6255 21.9514 17.7304C21.9514 17.8352 21.9106 17.9358 21.8379 18.01C21.7652 18.0841 21.6666 18.1258 21.5638 18.1258H19.9162C19.8134 18.1258 19.7148 18.0841 19.6421 18.01C19.5694 17.9358 19.5286 17.8352 19.5286 17.7304ZM22.2422 17.7304C22.2422 17.6255 22.283 17.5249 22.3557 17.4508C22.4284 17.3766 22.527 17.335 22.6299 17.335H26.991C27.0939 17.335 27.1925 17.3766 27.2652 17.4508C27.3379 17.5249 27.3787 17.6255 27.3787 17.7304C27.3787 17.8352 27.3379 17.9358 27.2652 18.01C27.1925 18.0841 27.0939 18.1258 26.991 18.1258H22.6299C22.527 18.1258 22.4284 18.0841 22.3557 18.01C22.283 17.9358 22.2422 17.8352 22.2422 17.7304Z" />
                                                                    </svg>
                                                                    View Details
                                                                </a>
                                                                <div class="brand">
                                                                    <a href="single-brand-category.html">
                                                                        <img src="assets/img/home1/icon/mercedes-01.svg"
                                                                            alt="image">
                                                                    </a>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

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
    @include('storefront.layout.theme29to34.features-type-1')
    @include('storefront.layout.theme29to34.gallery-type-1')
    @include('storefront.layout.theme29to34.category-type-1')
    @include('storefront.layout.theme29to34.testimonial-type-1')
    @include('storefront.layout.theme29to34.brand-logo-type-1')

@endsection
@push('script-page')
@endpush
