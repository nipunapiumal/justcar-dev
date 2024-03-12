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
    <!-- Blog Single Post -->
    <section class="blog_post_container bt1 pt50 pb0 mt70-992">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="for_blog blog_single_post">
                        <div class="details">
                            <div class="wrapper">
                                <h2 class="title">{{ $blogs->title }}</h2>
                                <div class="bp_meta">
                                    <ul class="mb0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)">
                                                <span
                                                    class="flaticon-calendar-1"></span>{{ \App\Models\Utility::dateFormat($blogs->created_at) }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-single-post-thumb">
                        @if (!empty($blogs->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blogs->blog_cover_image))
                            <img alt="{{ $blogs->title }}"
                                src="{{ asset(Storage::url('uploads/store_logo/' . $blogs->blog_cover_image)) }}"
                                class="img-whp" style="max-height: 450px;object-fit: cover;">
                        @else
                            <img alt="{{ $blogs->title }}" src="{{ asset(Storage::url('uploads/store_logo/default.jpg')) }}"
                                class="img-whp" style="max-height: 450px;object-fit: cover;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Blog Single Post -->
  <section class="blog_post_container pt50 pb70">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <div class="main_blog_post_content">
            <div class="mbp_thumb_post">
              {{-- <h4>Description</h4> --}}
              <div class="para mb25 mt20">{!! $blogs->detail !!}</div>
            </div>
          </div> 
        </div>
      </div>
    </div>
	</section>

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
