@extends('storefront.layout.theme35')
@section('page-title')
{{ __('Career With Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
        <div class="container">
            <div class="content">
                <h2>{{ __('Career With Us') }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ __('Career With Us') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->


 <!-- services-2 start -->
 <div class="services-2 content-area-jobs pt-100 pb-100">
        <div class="container">
            <div class="row">
                @foreach ($jobBoards as $jobBoard)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-info-2">
                            <div class="icon">
                                <i class="far fa-user-circle"></i>
                            </div>
                            <div class="detail">
                                <h3><a
                                        href="{{ route('store.job-board.create', [$store->slug, $jobBoard->id]) }}">{{ $jobBoard->title }}</a>
                                </h3>
                                <p class="mb-0">{{ $jobBoard->position }}</p>
                                <p><small>{{ $jobBoard->job_category() }}</small></p>
                                <a href="{{ route('store.job-board.create', [$store->slug, $jobBoard->id]) }}"
                                    class="read-more">{{ __('Apply') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- services-2 end -->
<!-- Contact 1 end -->

   
@endsection
@push('script-page')
    <script></script>
@endpush
