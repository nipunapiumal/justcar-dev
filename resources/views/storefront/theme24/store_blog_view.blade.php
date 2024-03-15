@extends('storefront.layout.theme24')
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
    <!-- Sub banner start -->
    {{-- <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Blog') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ $blogs->title }}</li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- Sub Banner end -->

    <!-- Blog body start -->
    <div class="blog-body content-area-4 content-area-20">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1 class="mb-10">{{ $blogs->title }}</h1>
                <div class="title-border">
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <!-- Blog 1 start -->
                    <div class="blog-1 blog-big mb-50">
                        <div class="blog-photo">
                            @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                <img class="img-fluid w-100" alt="{{ $blogs->title }}"
                                    style="height: 616px;object-fit: cover;"
                                    src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                            @else
                                <img class="img-fluid w-100" alt="{{ $blogs->title }}"
                                    style="height: 416px;object-fit: cover;"
                                    src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                            @endif
                        </div>
                        <div class="detail">
                            <h3>
                                <a href="javascript:void(0)">{{ $blogs->title }}</a>
                            </h3>
                            <p class="text-muted"><i class="fa fa-calendar"></i>
                                {{ \App\Models\Utility::dateFormat($blogs->created_at) }}</p>
                            {!! $blogs->detail !!}
                            <br>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">

                        <!-- Recent posts start -->
                        <div class="widget recent-posts">
                            <h3 class="sidebar-title">{{ __('Popular post') }}</h3>
                            @foreach ($blog_posts as $blog)
                                <div class="d-flex mb-4 recent-posts-box">
                                    <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                        @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                            <img alt="{{ $blogs->title }}" class="flex-shrink-0 me-3"
                                                style="height: 70px;object-fit: cover;"
                                                src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                        @else
                                            <img alt="{{ $blogs->title }}" class="flex-shrink-0 me-3"
                                                style="width: 70px;height: 70px;object-fit: cover;"
                                                src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                        @endif
                                    </a>
                                    <div class="detail align-self-center">
                                        <h5>
                                            <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                                {{ $blogs->title }}</a>
                                        </h5>
                                        <div class="listing-post-meta">
                                            {{-- $345,00 |  --}}
                                            <a href="#">
                                                <i class="fa fa-calendar"></i>
                                                {{ \App\Models\Utility::dateFormat($blog->created_at) }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog body end -->
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
