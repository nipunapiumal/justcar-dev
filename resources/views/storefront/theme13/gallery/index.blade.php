@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Gallery') }}
@endsection
@push('css-page')
@endpush
@section('content')
    @php($store_logo = asset(Storage::url('uploads/gallery_image/')))

    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2>{{ __('Gallery') }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{ __('Gallery') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section Area Start -->
    <div class="blog-section-area ptb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-6 col-xl-3">
                                <div class="car-listing gallery p0 bdr_none">
                                    <div class="thumb">
                                        @if (!empty($gallery->gallery_img) && \Storage::exists('uploads/gallery_image/' . $gallery->gallery_img))
                                            <a class="popup-img"
                                                href="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}">
                                                <img class="img-whp cover"
                                                    src="{{ asset(Storage::url('uploads/gallery_image/' . $gallery->gallery_img)) }}"
                                                    alt="sp5s1.jpg"></a>
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

                </div>
                <div class="col-lg-3 col-md-4">

                    <div class="ht-single-widget">
                        <h4 class="widget-title">{{ __('Categories') }} </h4>
                        <div class="ht-widget-item">
                            <div class="widget-content">

                                @foreach ($galleryCategories as $category)
                                    <div class="popular-post">
                                        <a href="{{ route('store.gallery', [$store->slug, $category->id]) }}">
                                            @if ($category->categorie_img)
                                                <img src="{{ $store_logo }}/{{ $category->categorie_img }}"
                                                    alt="" style="width: 50px;height:50px">
                                            @else
                                                <img src="{{ $store_logo }}/default.jpg" alt=""
                                                    style="width: 50px;height:50px">
                                            @endif
                                        </a>
                                        <div class="post-text">
                                            {{-- <span>2 days ago</span> --}}
                                            <h6><a
                                                    href="{{ route('store.gallery', [$store->slug, $category->id]) }}">{{ $category->name }}</a>
                                            </h6>
                                            {{-- <span>{{__('Created At')}} <span>{{ date('M d, Y',strtotime($category->created_at))}}</span></span> --}}
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section Area End -->
@endsection
