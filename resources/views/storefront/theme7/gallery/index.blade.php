@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Gallery') }}
@endsection
@push('css-page')
@endpush
@section('content')
    @php($store_logo = asset(Storage::url('uploads/gallery_image/')))
    <!-- Inner Page Breadcrumb -->
   <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">{{ __('Gallery') }}</h2>
                        <ol class="breadcrumb fn-sm">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Gallery') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Grid View -->
    <section class="our-listing pt0 bgc-f9 pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3">

                    <div class="sidebar_recent_viewed_widgets">
                        <h4 class="title">{{ __('Categories') }}</h4>
                        @foreach ($galleryCategories as $category)
                            <div class="d-flex mb20">
                                <div class="flex-shrink-0" onclick="location.href='{{route('store.gallery',[$store->slug,$category->id])}}'">
                                    @if ($category->categorie_img)
                                        <img alt="Image placeholder"
                                            src="{{ $store_logo }}/{{ $category->categorie_img }}"
                                            class="align-self-start mr-3 cover" alt="images"
                                            style="width: 50px;height:50px">
                                    @else
                                        <img alt="Image placeholder" src="{{ $store_logo }}/default.jpg"
                                            class="align-self-start mr-3" alt="images" style="width: 50px;height:50px">
                                    @endif
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="post_title">{{ $category->name }}</h5>
                                    <p>{{ date('M d, Y',strtotime($category->created_at))}}</p>
                                    {{-- <p>Base - 2021</p> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-8 col-xl-9">
                    {{-- <div class="row">
                        <div class="listing_filter_row db-767">
                            <div class="col-lg-5">
                                <div class="page_control_shorting left_area tac-sm mb30-767 mt15">
                                    <p>We found <span class="heading-color fw600">4733</span> Cars available for you</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="page_control_shorting right_area text-end tac-xsd">
                                    <ul>
                                        <li class="list-inline-item short_by_text listone">Sort by:</li>
                                        <li class="list-inline-item listwo">
                                            <select class="selectpicker show-tick">
                                                <option>Date: newest First</option>
                                                <option>Most Recent</option>
                                                <option>Recent</option>
                                                <option>Best Selling</option>
                                                <option>Old Review</option>
                                            </select>
                                        </li>
                                        <li class="list-inline-item list-gird"><a href="#"><img
                                                    src="images/icon/list-grid.svg" alt="list-grid.svg"></a></li>
                                        <li class="list-inline-item list-list"><a href="#"><img
                                                    src="images/icon/list-list.svg" alt="list-list.svg"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-6 col-xl-3">
                                <div class="car-listing gallery p0 bdr_none">
                                    <div class="thumb">
                                        {{-- <div class="tag">FEATURED</div> --}}
                                        @if (!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img))
                                            <a class="popup-img" href="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}">
                                                <img class="img-whp cover" src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}" alt="sp5s1.jpg"></a>
                                            {{-- <img alt="Image placeholder"
                                                src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}"
                                                class="h100p cover"> --}}
                                        @else
                                            <img alt="Image placeholder"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                class="h100p">
                                        @endif
                                       
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="mbp_pagination mt10">
                                <ul class="page_navigation">
                                    <li class="page-item">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span
                                                class="fa fa-arrow-left"></span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="fa fa-arrow-right"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
