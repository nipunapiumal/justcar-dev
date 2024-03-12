@extends('storefront.layout.theme13to15')
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
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2>{{ __('Blog') }}</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                                <li>{{$blogs->title}}</li>
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
                    <div class="single-blog-post blog-details">
                        <div class="blog-image">
                            @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                    <img alt="Image placeholder" style="height: 510px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                @else
                                    <img alt="Image placeholder" style="height: 510px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                @endif
                        </div>
                        <div class="blog-post-meta">
                            <span><i class="far fa-calendar-alt"></i> {{\App\Models\Utility::dateFormat($blogs->created_at)}}</span>
                            {{-- <span><i class="fa fa-comment-o"></i>By Power-boosts</span> --}}
                        </div>
                        <div class="blog-post-text" style="border-bottom: none;">
                            <h4>{{$blogs->title}}</h4>
                               <div>
                                {!! $blogs->detail !!}
                               </div>
                            {{-- <div class="social-icons">
                                <a href="https://www.facebook.com/devitems/" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/devitemsllc" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="https://dribbble.com/devitemsllc" class="dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="https://www.pinterest.com/" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                <a href="https://www.youtube.com/channel/UC0KLL1Ylo1JrcSUZOeX3tqQ" class="youtube"><i class="fa fa-youtube"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="ht-single-widget">
                        <h4 class="widget-title">{{__('Popular post')}} </h4>
                        <div class="ht-widget-item">
                            <div class="widget-content">
                                @foreach($blog_posts as $blog)
                                <div class="popular-post">
                                    <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                        @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                        <img alt="{{$blogs->title}}" style="width: 90px;height: 90px;object-fit: cover;"
                                            src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                    @else
                                        <img alt="{{$blogs->title}}" style="width: 90px;height: 90px;object-fit: cover;"
                                            src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                    @endif
                                    </a>
                                    <div class="post-text">
                                        <span>{{ \App\Models\Utility::dateFormat($blog->created_at) }}</span>
                                        <h6><a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">{{$blogs->title}}</a></h6>
                                        {{-- <span>Post by <span>Power-boosts</span></span> --}}
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
    {{-- <div class="slice bg-white mt-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <!-- Article body -->
                    <article>
                        <div>
                            <h5 class="float-left">{{$blogs->title}}</h5>
                            <span class="float-right">{{\App\Models\Utility::dateFormat($blogs->created_at)}}</span>
                            <span class="clearfix"></span>
                        </div>
                        <figure class="figure mt-0 w-100 text-center">
                            @if (!empty($blogs->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blogs->blog_cover_image))
                                <img alt="Image placeholder" src="{{asset(Storage::url('uploads/store_logo/'.$blogs->blog_cover_image))}}" class="img-fluid rounded">
                            @else
                                <img alt="Image placeholder" src="{{asset(Storage::url('uploads/store_logo/default.jpg'))}}" class="img-fluid rounded">
                            @endif
                        </figure>
                        <p class="lead">{!! $blogs->detail !!}</p>
                    </article>
                </div>
            </div>
            @if (!empty($socialblogs) && $socialblogs->enable_social_button == 'on')
                <div id="share" class="text-center"></div>
            @endif
        </div>
    </div> --}}
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
