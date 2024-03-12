@extends('layouts.forum')
@section('page-title')
    {{ __('Thread') }}
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>
                {{ __('Post Thread') }}
            </h5>
        </div>
        <div class="card-body">
            {{ Form::open(['url' => route('forum.update', $thread->id), 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        {{ Form::label('title', __('Title'), ['class' => 'col-form-label']) }}
                        {{ Form::text('title', $thread->title, ['class' => 'form-control', 'placeholder' => __('Enter Title'), 'required' => 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
                        {{ Form::text('description', $thread->description, ['class' => 'form-control', 'placeholder' => __('Enter Description'), 'required' => 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('category_id', __('Category'), ['class' => 'col-form-label']) }}
                        {{ Form::select('category_id', $categories, $thread->category_id, [
                            'class' => 'form-control',
                            'data-toggle' => 'select',
                        ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('body', __('Body'), ['class' => 'col-form-label']) }}
                        {{ Form::textarea('body', $thread->body, ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Body')]) }}
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
