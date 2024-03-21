@extends('storefront.layout.theme30')
@section('page-title')
    {{ $jobBoard->title }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Sub banner start -->
    <div class="contact-1 applyjob-board-title mt-50">
        <div class="container">
            <!-- Main title -->
                <div class="main-title text-center">
                    <h2 class="mb-50"> {{ $jobBoard->title }}</h2>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
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

            <div class="best-used-car pt-50">
                @if ($jobBoard->job_context)
                    <h4>{{ __('Job Context') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->job_context) !!}</p>
                @endif
                @if ($jobBoard->job_responsibility)
                    <h4>{{ __('Job Responsibility') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->job_responsibility) !!}</p>
                @endif
                @if ($jobBoard->vacancy)
                    <h4>{{ __('Vacancy') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->vacancy) !!}</p>
                @endif
                @if ($jobBoard->educational_requirements)
                    <h4>{{ __('Educational Requirements') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->educational_requirements) !!}</p>
                @endif
                @if ($jobBoard->experience_requirements)
                    <h4>{{ __('Experience Requirements') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->experience_requirements) !!}</p>
                @endif
                @if ($jobBoard->additional_requirements)
                    <h4>{{ __('Additional Requirements') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->additional_requirements) !!}</p>
                @endif
                @if ($jobBoard->employment_status)
                    <h4>{{ __('Employment Status') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->employment_status) !!}</p>
                @endif
                @if ($jobBoard->compensation_other_benefits)
                    <h4>{{ __('Compensation & Other Benefits') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->compensation_other_benefits) !!}</p>
                @endif
                @if ($jobBoard->salary)
                    <h4>{{ __('Salary') }}</h4>
                    <p class="job-description mb-30">{!! nl2br($jobBoard->salary) !!}</p>
                @endif
            </div>


        </div>
        <div class="container pt-100 pb-80 apply-form mb-50">
            {{-- <!-- Main title -->
        <div class="main-title text-center">
            <h1>Contact Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div> --}}
            <div class="row g-0 contact-innner">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form" style="border-right: none; margin:0px 20px !important;">
                        <div class="text-center">
                        <h4 class="mb-20">{{ __('Apply To') . ' ' . $jobBoard->position . ' (' . $jobBoard->title . ')' }}
                        </h4></div>
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
                                    <button type="submit" class="btn btn-5">{{ __('Apply') }}</button>
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
