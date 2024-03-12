@extends('storefront.layout.themePlus1')
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
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ $blogs->title }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                        <li class="active">{{ __('Blog') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="post-image ms-0">
                            <a href="javascript:void(0)">
                                @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                    <img class="w-100 img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{ $blogs->title }}"
                                        style="height: 460px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                @else
                                    <img class="w-100 img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{ $blogs->title }}"
                                        style="height: 460px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                @endif
                                
                            </a>
                        </div>

                        <div class="post-date ms-0">
                            <span class="day">{{date("d", strtotime($blog->created_at))}}</span>
                            <span class="month">{{date("M", strtotime($blog->created_at))}}</span>
                        </div>

                        <div class="post-content ms-0">

                            <h2 class="font-weight-semi-bold"><a href="javascript:void(0)">
                                {{ $blogs->title }}</a></h2>

                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> <a href="#"> {{ \App\Models\Utility::dateFormat($blogs->created_at) }}</a> </span>
                            </div>

                            <div>
                                {!! $blogs->detail !!}
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            var blog = {{ $blogs }};
            if (blog == '') {
                window.location.href = "{{ route('store.slug', $store->slug) }}";
            }
        });
    </script>
@endpush
