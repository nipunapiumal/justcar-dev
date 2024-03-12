@extends('storefront.layout.theme6')
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
    <section class="blog_post_container inner_page_section_spacing">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-xl-4">
                        <div class="for_blog">
                            <div class="thumb">
                                {{-- <div class="tag">BLOG</div> --}}
                                @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                    <img alt="Image placeholder" class="img-whp" style="height: 254px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                @else
                                    <img alt="Image placeholder" class="img-whp" style="height: 254px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                @endif
                            </div>
                            <div class="details">
                                <div class="wrapper">
                                    <div class="bp_meta">
                                        <ul>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)">
                                                    <span class="flaticon-calendar-1"></span>
                                                    {{ \App\Models\Utility::dateFormat($blog->created_at) }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="title">
                                        <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h4>
                                    <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}"
                                        class="more_listing">{{ __('Show More') }}
                                        <span class="icon">
                                            <span class="fas fa-plus"></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
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
