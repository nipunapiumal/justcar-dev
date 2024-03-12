@extends('storefront.layout.theme36')
@section('page-title')
    {{ $blogs->title }}
@endsection
@php
    if (!empty(session()->get('lang'))) {
        $currantLang = session()->get('lang');
    } else {
        $currantLang = $store->lang;
    }
    $languages = \App\Models\Utility::languages();
@endphp
@section('content')
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
        <div class="container">
            <div class="content">
                <h2>{{ $blogs->title }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ $blogs->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Blog-details-area start -->
    <div class="blog-details-area pt-100 pb-60">
        <div class="container">
            <div class="row justify-content-center gx-xl-5">
                <div class="col-lg-8">
                    <div class="blog-description mb-40">
                        <article class="item-single">
                            <div class="image">
                                <div class="lazy-container ratio ratio-16-9">
                                    @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                        <img class="lazyload img-fluid w-100" alt="{{ $blogs->title }}"
                                            style="height: 616px;object-fit: cover;"
                                            src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}"
                                            data-src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                    @else
                                        <img class="lazyload img-fluid w-100" alt="{{ $blogs->title }}"
                                            style="height: 416px;object-fit: cover;"
                                            src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                    @endif

                                    {{-- <img class="lazyload" src="assets/images/placeholder.png"
                                        data-src="assets/images/blog/blog-1.jpg" alt="Blog Image"> --}}
                                </div>
                                {{-- <a href="blog-details.html" class="btn btn-md btn-primary"><i
                                        class="fas fa-share-alt"></i>Share Now</a> --}}
                            </div>
                            <div class="content">
                                <ul class="info-list">
                                    {{-- <li><i class="fal fa-user"></i>Admin</li> --}}
                                    <li><i class="fal fa-calendar"></i>
                                        {{ date('d', strtotime($blog->created_at)) }}
                                        {{ date('M', strtotime($blog->created_at)) }}</li>
                                    {{-- <li><i class="fal fa-tag"></i>Internet</li> --}}
                                </ul>
                                <h4 class="title">
                                    {{ $blogs->title }}
                                </h4>
                                <p>
                                    {!! $blogs->detail !!}
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <aside class="widget-area pb-10">
                        <div class="widget widget-search bg-light mb-30">
                            <h4 class="title mb-15">Search Posts</h4>
                            <form class="search-form">
                                <input type="search" class="search-input" placeholder="Search Here">
                                <button class="btn-search" type="submit">
                                    <i class="far fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="widget widget-post bg-light mb-30">
                            <h4 class="title mb-15">Recent Posts</h4>
                            <article class="article-item mb-30">
                                <div class="image">
                                    <a href="blog-details.html" class="lazy-container ratio ratio-1-1">
                                        <img class="lazyload" src="assets/images/placeholder.png"
                                            data-src="assets/images/blog/blog-1.jpg" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="lc-2">
                                        <a href="blog-details.html">Top Best Car Trending in 2012, Lowest Price Range For
                                            Now</a>
                                    </h6>
                                    <ul class="info-list">
                                        <li><i class="fal fa-user"></i>Admin</li>
                                        <li><i class="fal fa-calendar"></i>18 Jan 2021</li>
                                    </ul>
                                    <div class="time">
                                        2 days ago
                                    </div>
                                </div>
                            </article>
                            <article class="article-item mb-30">
                                <div class="image">
                                    <a href="blog-details.html" class="lazy-container ratio ratio-1-1">
                                        <img class="lazyload" src="assets/images/placeholder.png"
                                            data-src="assets/images/blog/blog-2.jpg" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="lc-2">
                                        <a href="blog-details.html">Price list of Toyota Cars 2022, The Change of Interior
                                            & Exterior</a>
                                    </h6>
                                    <ul class="info-list">
                                        <li><i class="fal fa-user"></i>Admin</li>
                                        <li><i class="fal fa-calendar"></i>18 Jan 2021</li>
                                    </ul>
                                    <div class="time">
                                        2 days ago
                                    </div>
                                </div>
                            </article>
                            <article class="article-item mb-30">
                                <div class="image">
                                    <a href="blog-details.html" class="lazy-container ratio ratio-1-1">
                                        <img class="lazyload" src="assets/images/placeholder.png"
                                            data-src="assets/images/blog/blog-3.jpg" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="lc-2">
                                        <a href="blog-details.html">Get Started With Top 10 Beautiful Best Places For Your
                                            Next Tour</a>
                                    </h6>
                                    <ul class="info-list">
                                        <li><i class="fal fa-user"></i>Admin</li>
                                        <li><i class="fal fa-calendar"></i>18 Jan 2021</li>
                                    </ul>
                                    <div class="time">
                                        2 days ago
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="widget widget-blog-categories bg-light mb-30">
                            <h4 class="title mb-15">Categories</h4>
                            <ul class="list-unstyled m-0">
                                <li class="d-flex align-items-center justify-content-between">
                                    <a href="blogs.html"><i class="fal fa-folder"></i>Technology</a>
                                    <span class="tqy">(11)</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <a href="blogs.html"><i class="fal fa-folder"></i>Business</a>
                                    <span class="tqy">(02)</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <a href="blogs.html"><i class="fal fa-folder"></i>Android</a>
                                    <span class="tqy">(45)</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <a href="blogs.html"><i class="fal fa-folder"></i>iOS</a>
                                    <span class="tqy">(26)</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <a href="blogs.html"><i class="fal fa-folder"></i>Watch</a>
                                    <span class="tqy">(45)</span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget-tag bg-light mb-30">
                            <h4 class="title mb-15">Tags</h4>
                            <ul class="list-unstyled m-0">
                                <li class="d-inline-block"><a href="blogs.html">Technology</a></li>
                                <li class="d-inline-block"><a href="blogs.html">Business</a></li>
                                <li class="d-inline-block"><a href="blogs.html">Marketing</a></li>
                                <li class="d-inline-block"><a href="blogs.html">App</a></li>
                                <li class="d-inline-block"><a href="blogs.html">Social</a></li>
                                <li class="d-inline-block"><a href="blogs.html">Politics</a></li>
                            </ul>
                        </div>
                        <div class="widget widget-social-link bg-light mb-30">
                            <h4 class="title mb-15">Follow Us</h4>
                            <div class="social-link">
                                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.dribbble.com/" target="_blank"><i class="fab fa-dribbble"></i></a>
                                <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </aside>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Blog-details-area end -->
@endsection
