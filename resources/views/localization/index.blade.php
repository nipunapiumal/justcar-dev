@extends('layouts.admin')
@section('page-title')
    {{ __('Language') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-2">{{ __('Language') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Language') }}</li>
@endsection
@section('content')
    <div class="row">
     
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="language-wrap">
                        <div class="row">
                            <div class="col-lg-1 language-list-wrap">
                                <div class="language-list">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        @foreach($languages as $language)
                                            <li class="text-sm font-weight-bold">
                                                <a href="{{route('localization.show',[$language])}}" class="nav-link {{($language == $lang)?'active':''}}">{{Str::upper($language)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-11 language-form-wrap">
                                {{Form::open(array('url'=>'localization','method'=>'post'))}}
                                <div class="row">
                                    <div class="form-group col-12">
                                        {{Form::textarea('content',$jsonContent,array('class'=>'form-control','rows'=>'20','required'=>'required'))}}
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <div class="d-flex justify-content-end">
                                                    {{Form::hidden('lang',$lang)}}
                                                    {{Form::submit(__('Save Changes'),array('class'=>'btn btn-xs btn-primary'))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
