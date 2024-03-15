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
                    <li class="active">{{ __('Blog') }}</li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- Sub Banner end -->

    <!-- Blog body start -->
    <div class="blog-body content-area content-area-20">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1 class="mb-10">{{ __('Blog') }}</h1>
                <div class="title-border">
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                    <div class="title-border-inner"></div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-1">
                            <div class="blog-image">
                                @if (!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image))
                                    <img class="img-fluid img-height-250 w-100" alt="{{ $blog->title }}"
                                        src="{{ asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image)) }}">
                                @else
                                    <img class="img-fluid img-height-250 w-100" alt="{{ $blog->title }}"
                                        src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}">
                                @endif
                                <div class="date-box">
                                    <span>{{date("d", strtotime($blog->created_at))}}</span>
                                    {{date("M", strtotime($blog->created_at))}}
                                </div>
                                {{-- <div class="profile-user">
                                    <img src="img/avatar/avatar-1.png" alt="user">
                                </div> --}}
                            </div>
                            <div class="detail">
                                {{-- <div class="post-meta clearfix">
                                    <ul>
                                        <li class="user-name">
                                            <strong><a href="#">Maria Blank</a></strong>
                                        </li>
                                        <li><a href="#"><i class="flaticon-comment"></i></a>17K</li>
                                        <li><a href="#"><i class="flaticon-calendar"></i></a>73k</li>
                                    </ul>
                                </div> --}}
                                <h4>
                                    <a href="{{ route('store.store_blog_view', [$store->slug, $blog->id]) }}">{{ $blog->title }}</a>
                                </h4>
                                {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy,</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- Page navigation start -->
            {{-- <div class="pagination-box hidden-mb-45 text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="car-list-leftsidebar.html"><i class="fa fa-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div> --}}
        </div>
    </div>
    <!-- Blog body end -->
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
