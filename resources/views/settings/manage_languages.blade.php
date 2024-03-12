@extends('layouts.admin')
@section('page-title')
    {{ __('Manage Languages') }}
@endsection
@php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Manage Languages') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Manage Languages') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    @if (Auth::user()->type == 'Owner')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5 class="">
                            {{ __('Manage Languages') }}
                        </h5>
                    </div> --}}
                    <form method="POST"
                        action="{{ route('owner.manage.language', $store_settings->slug) }}"
                        accept-charset="UTF-8">
                        @csrf
                        <div class="card-body p-4">
                            <div class="row">
                                @foreach (App\Models\Utility::languages() as $lang)
                                    <div class="col-sm-2 form-group">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input"
                                                name="lang[]" value="{{ $lang }}"
                                                {{ in_array($lang, $store_languages) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="twilio_module">
                                                {{ Str::upper($lang) }}
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="card-footer">
                                    <div class="col-sm-12 px-2">
                                        <div class="d-flex justify-content-end">
                                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
@endpush
