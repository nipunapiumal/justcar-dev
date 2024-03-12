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
    {{-- <div class="container mt-10">
        <div class="row">
            <div class="card-group">
                @foreach ($blogs as $blog)
                    <div class="{{($blogs->count() == 1)?'col-6':'col-lg-4'}}">
                        <div class="card border-0 text-white hover-scale-110 hover-shadow-lg overflow-hidden">
                            <figure class="figure">
                                @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                    <img alt="Image placeholder" class="img-fluid" src="{{asset(Storage::url('uploads/store_logo/'.$blog->blog_cover_image))}}">
                                @else
                                    <img alt="Image placeholder" class="img-fluid" src="{{asset(Storage::url('uploads/store_logo/default.jpg'))}}">
                                @endif
                            </figure>
                            <span class="mask hover-mask bg-dark opacity-7"></span>
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <div class="text-center">
                                    <div class="animate-item--visible opacity-10">
                                        <a href="{{route('store.store_blog_view',[$store->slug,$blog->id])}}" class="h3 text-white mb-1 stretched-link">{{$blog->title}}</a>
                                        <p class="card-text text-white">{{\App\Models\Utility::dateFormat($blog->created_at)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
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
