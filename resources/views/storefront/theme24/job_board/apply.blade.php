@extends('storefront.layout.theme24')
@section('page-title')
    {{ $jobBoard->title }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ $jobBoard->title }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ $jobBoard->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Contact 1 start -->
    <div class="contact-1 content-area-20">
        <div class="container">
            {{-- <div class="row">
                <div class="col-12"></div>

            </div> --}}

            <div class="best-used-car">
                @if ($jobBoard->job_context)
                    <h3>{{ __('Job Context') }}</h3>
                    <p>{!! nl2br($jobBoard->job_context) !!}</p>
                @endif
                @if ($jobBoard->job_responsibility)
                    <h3>{{ __('Job Responsibility') }}</h3>
                    <p>{!! nl2br($jobBoard->job_responsibility) !!}</p>
                @endif
                @if ($jobBoard->vacancy)
                    <h3>{{ __('Vacancy') }}</h3>
                    <p>{!! nl2br($jobBoard->vacancy) !!}</p>
                @endif
                @if ($jobBoard->educational_requirements)
                    <h3>{{ __('Educational Requirements') }}</h3>
                    <p>{!! nl2br($jobBoard->educational_requirements) !!}</p>
                @endif
                @if ($jobBoard->experience_requirements)
                    <h3>{{ __('Experience Requirements') }}</h3>
                    <p>{!! nl2br($jobBoard->experience_requirements) !!}</p>
                @endif
                @if ($jobBoard->additional_requirements)
                    <h3>{{ __('Additional Requirements') }}</h3>
                    <p>{!! nl2br($jobBoard->additional_requirements) !!}</p>
                @endif
                @if ($jobBoard->employment_status)
                    <h3>{{ __('Employment Status') }}</h3>
                    <p>{!! nl2br($jobBoard->employment_status) !!}</p>
                @endif
                @if ($jobBoard->compensation_other_benefits)
                    <h3>{{ __('Compensation & Other Benefits') }}</h3>
                    <p>{!! nl2br($jobBoard->compensation_other_benefits) !!}</p>
                @endif
                @if ($jobBoard->salary)
                    <h3>{{ __('Salary') }}</h3>
                    <p>{!! nl2br($jobBoard->salary) !!}</p>
                @endif
            </div>


        </div>
        <div class="container">
            {{-- <!-- Main title -->
        <div class="main-title text-center">
            <h1>Contact Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div> --}}
            <div class="row g-0 contact-innner">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form" style="border-right: none">
                        <h3 class="mb-20 mt-50 text-center">{{ __('Apply To') . ' ' . $jobBoard->position . ' (' . $jobBoard->title . ')' }}
                        </h3>
                        {{ Form::open(['url' => 'job-applicants', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'contact-form']) }}

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    {{ Form::hidden('job_board', $jobBoard->id) }}
                                    <input type="text" name="name" class="form-control" id="floating-full-name"
                                        placeholder="{{ __('Name') }}">
                                    <label for="floating-full-name">{{ __('Name') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="email" class="form-control" id="floating-full-name"
                                        placeholder="{{ __('Email') }}">
                                    <label for="floating-full-name">{{ __('Email') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <span>{{ __('Your CV') . ' (' . __('Accept File Type: pdf') . ')' }} </span>
                                    <input type="file" name="cv" class="form-control">
                                    {{-- <label>{{ __('your CV') }}</label> --}}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-floating mb-20">
                                    <textarea class="form-control" placeholder="{{ __('Message') }}" name="message" id="floatingTextarea2"></textarea>
                                    <label for="floatingTextarea2">{{ __('Message') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-6">{{ __('Apply') }}</button>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact 1 end -->
@endsection
@push('script-page')
    <script></script>
@endpush
