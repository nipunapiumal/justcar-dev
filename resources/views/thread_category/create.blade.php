@extends('layouts.forum')
@section('page-title')
    {{ __('Thread') }}
@endsection
@section('content')
    <div class="pr-2 mb-4">
        <a href="{{ route('forumzone.index') }}" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="fas fa-list"></i> {{ __('List Categories') }}
        </a>
        <a href="{{ route('forumzone.create') }}" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="fas fa-plus"></i> {{ __('Create Category') }}
        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>
                {{ __('Create Category') }}
            </h5>
        </div>
        <div class="card-body">
            {{ Form::open(['url' => 'forumzone', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        {{ Form::label('name', __('Name'), ['class' => 'col-form-label']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Category'), 'required' => 'required']) }}
                    </div>
                </div>
                <div class="form-group col-12 d-flex justify-content-end col-form-label">
                    <input type="submit" value="{{ __('Save') }}" class="btn btn-primary ms-2">
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
