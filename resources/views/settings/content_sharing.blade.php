@extends('layouts.admin')
@section('page-title')
    {{ __('Content Sharing') }}
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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Content Sharing') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Content Sharing') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    @if (Auth::user()->type == 'Owner')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">
                            {{ __('Content Sharing') }}
                        </h5>
                        <small class="text-dark font-weight-bold">
                            {{ __('Here you can share content between stores. Note: Content of the selected store\'s will be copied to the :store!', ['store' => $store_settings->name]) }}
                        </small>
                    </div>
                    <form method="POST"
                        action="{{ route('store.sharing.content', $store_settings->slug) }}"
                        accept-charset="UTF-8">
                        @csrf
                        <div class="card-body p-4">
                            <h5> {{ __('Select the Store') }} </h5>
                            <div class="row">
                                @foreach (Auth::user()->stores as $store)
                                    @if ($store->is_active)
                                        @if (Auth::user()->current_store != $store->id)
                                            <div class="col-sm-3 form-group">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input type="radio"
                                                        id="sharing-content-{{ $store->slug }}"
                                                        name="slug" value="{{ $store->slug }}"
                                                        class="form-check-input">
                                                    <label class="form-check-label"
                                                        for="sharing-content-{{ $store->slug }}">{{ $store->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="card-footer">
                                    <div class="col-sm-12 px-2">
                                        <div class="d-flex justify-content-end">
                                            {{ Form::submit(__('Share Content to :theme', ['theme' => $store_settings->name]), ['class' => 'btn btn-xs btn-primary']) }}
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
