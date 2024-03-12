@extends('storefront.layout.theme37')
@section('page-title')
    {{ __('Blog') }}
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
                <h2>{{ __('Blog') }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ __('Blog') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Blog-area start -->
    <div class="blog-area blog-1 ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <article class="card mb-30">
                            <div class="card-img radius-0 mb-30">
                                <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}"
                                    class="lazy-container ratio ratio-5-4">
                                    @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                        <img class="lazyload" style="height:450px;object-fit:cover"
                                            alt="{{ $blog->title }}"
                                            src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}"
                                            data-src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                    @else
                                        <img class="lazyload" style="height:450px;object-fit:cover"
                                            alt="{{ $blog->title }}"
                                            src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                    @endif
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="card-title">
                                    <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                                <p class="card-text">
                                    {{ date('d', strtotime($blog->created_at)) }}
                                    {{ date('M', strtotime($blog->created_at)) }}
                                </p>
                                <div class="mt-20">
                                    <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}"
                                        class="btn btn-lg btn-primary">
                                        {{ __('Show More') }}
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            {{-- <div class="pagination mt-30 justify-content-center" data-aos="fade-up">
                <a href="blogs.html" class="page-numbers radius-0 prev">Prev</a>
                <span class="page-numbers radius-0 current" aria-current="page">1</span>
                <a href="blogs.html" class="page-numbers radius-0">2</a>
                <a href="blogs.html" class="page-numbers radius-0">3</a>
                <a href="blogs.html" class="page-numbers radius-0">4</a>
                <a href="blogs.html" class="page-numbers radius-0 next">Next</a>
            </div> --}}
        </div>
    </div>
    <!-- Blog-area end -->
@endsection
