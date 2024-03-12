@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Career With Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Career With Us') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Career With Us') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- services-2 start -->
    <div class="services-2 content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>{{ !empty($storethemesetting['job_board_title']) ? $storethemesetting['job_board_title'] : 'Career With Us' }}
                </h1>
                <p>{{ !empty($storethemesetting['job_board_description']) ? $storethemesetting['job_board_description'] : 'Apply Now' }}
                </p>
            </div>
            <div class="row">
                @foreach ($jobBoards as $jobBoard)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-info-2">
                            <div class="icon">
                                <i class="flaticon-support-2"></i>
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
@endsection
@push('script-page')
    <script></script>
@endpush
