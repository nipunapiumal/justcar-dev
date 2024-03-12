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
                    <h1 class="font-weight-bold text-dark">{{ __('Blog') }}</h1>
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
                <div class="blog-posts">

                    <div class="row">

                        @foreach ($blogs as $blog)
                            <div class="col-md-4 col-lg-3">
                                <article class="post post-medium border-0 pb-0 mb-5">
                                    <div class="post-image">
                                        <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                            @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                                <img alt="Image placeholder" style="height: 200px;object-fit: cover;" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                                    src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                            @else
                                                <img alt="Image placeholder" style="height: 200px;object-fit: cover;" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                                    src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                            @endif
                                        </a>
                                    </div>

                                    <div class="post-content">

                                        <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a
                                                href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                                {{ $blog->title }}</a></h2>
                                        {{-- <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad
                                            litora torquent per conubia nostra, per inceptos himenaeos.</p> --}}

                                        <div class="post-meta">
                                            {{-- <span><i class="far fa-user"></i> By <a href="#">Bob Doe</a> </span> --}}
                                            {{-- <span><i class="far fa-folder"></i> <a href="#">News</a>, <a
                                                    href="#">Design</a> </span> --}}
                                            <span><i class="fa fa-calendar"></i> <a href="#">{{ \App\Models\Utility::dateFormat($blog->created_at) }}</a></span>
                                            <span class="d-block mt-2"><a
                                                    href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}"
                                                    class="btn btn-xs btn-light text-1 text-uppercase">{{ __('Show More') }}</a></span>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>


                </div>
            </div>

        </div>

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            var blog = {{ sizeof($blogs) }};
            if (blog < 1) {
                window.location.href = "{{ route('store.slug', $store->slug) }}";
            }
        });
    </script>
@endpush
