@extends('storefront.layout.theme13to15')
@section('page-title')
    {{ __('Blog') }}
@endsection
@push('css-page')
    
@endpush
@php
    if(!empty(session()->get('lang')))
    {
        $currantLang = session()->get('lang');
    }else{
        $currantLang = $store->lang;
    }
    $languages=\App\Models\Utility::languages();

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
                            <li>{{ __('Blog') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   <!-- Blog Two Area Start -->
   <div class="blog-two-area ptb-100">
    <div class="container">
        {{-- <div class="section-title-light pb-60 text-center fix">
            <h5>{{__('Read Our Latest Blog News')}}</h5>
            <h2>{{__('Latest Blog Post')}}</h2>
        </div> --}}
        <div class="m-rl-n-15px">
            <div class="blog-carousel">
                @foreach($blogs as $blog)
                <div class="p-lr-15px">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                    <img alt="Image placeholder" style="height: 217px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                @else
                                    <img alt="Image placeholder" style="height: 217px;object-fit: cover;"
                                        src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                @endif
                                <span class="blog-info">
                                        {{-- <span class="s-blog-info"><i class="fa fa-pencil-square-o"></i>By <span>Power-boosts</span></span> --}}
                                <span class="s-blog-info"><i class="fa fa-pencil-square-o"></i>{{ \App\Models\Utility::dateFormat($blog->created_at) }}</span>
                                </span>
                            </a>
                        </div>
                        <div class="blog-text">
                            <h5><a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">
                                {{ $blog->title }}
                            </a></h5>
                            {{-- <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer...</p> --}}
                            <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}" class="default-btn"><span>{{ __('Show More') }}</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Blog Two Area End -->
    {{-- <hr>
    <div class="container mt-10">
        <div class="row">
            <div class="card-group">
                @foreach($blogs as $blog)
                    <div class="{{($blogs->count() == 1)?'col-6':'col-lg-4'}}">
                        <div class="card border-0 text-white hover-scale-110 hover-shadow-lg overflow-hidden">
                            <figure class="figure">
                                @if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/'.$blog->blog_cover_image))
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
        $(document).ready(function () {
            var blog = {{sizeof($blogs)}};
            if (blog < 1) {
                window.location.href = "{{route('store.slug',$store->slug)}}";
            }
        });
    </script>
@endpush
