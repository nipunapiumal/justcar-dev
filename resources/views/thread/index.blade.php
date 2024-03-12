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
        <div class="card-body">

            <div class="d-flex align-items-center">
                <a href="#" class="pe-3">
                    <div class="circle">
                        <div class="circle-avatar">
                            <span class="avatar tip" title="{{ Auth::user()->name }}"
                                style="background-color: {{ Utility::generateHexColor() }};">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="small-circle offline"></div>
                    </div>
                </a>
                <h2 class="mb-0">
                    {{ $thread->title }}
                </h2>
            </div>
            <div class="mt-3">

                <a href="javascript:void(0)">
                    <span class="badge bg-primary">
                        <i class="fas fa-clock"></i>
                        {{ \App\Models\Utility::dateFormat($thread->created_at) }}
                    </span>
                </a>
                <a href="javascript:void(0)">
                    <span class="badge bg-primary">
                        <i class="fa fa-folder"></i>
                        {{ $thread->getCategory() }}
                    </span>
                </a>
                @if (Auth::user()->creatorId() == $thread->created_by || Auth::user()->type == 'super admin')
                    <a href="{{ route('forum.edit', $thread->id) }}">
                        <span class="badge bg-info">
                            <i class="ti ti-pencil"></i>
                            {{ __('Edit') }}
                        </span>
                    </a>
                    <a class="bs-pass-para" href="javascript:void(0)" data-title="{{ __('Delete Lead') }}"
                        data-confirm="{{ __('Are You Sure?') }}"
                        data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                        data-confirm-yes="delete-form-{{ $thread->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ __('Delete') }}">
                        <span class="badge bg-danger">
                            <i class="ti ti-trash"></i>
                            {{ __('Delete') }}
                        </span>
                    </a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['forum.destroy', $thread->id],
                        'id' => 'delete-form-' . $thread->id,
                    ]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
            <hr>
            <div>
                {!! $thread->body !!}
            </div>
            <div class="social-list mt-5 d-flex justify-content-center">
                <ul class="p-0">
                    <li>
                        <a class="bg-whatsapp" href="https://wa.me/https://api.whatsapp.com/" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-facebook" href="https://www.facebook.com/" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-twitter" href="https://twitter.com/" target="_blank">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-github" href="mailto:test@test.com">
                            <i class="far fa-envelope"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-instagram" href="https://www.instagram.com/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-youtube" href="https://www.youtube.com/" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="mt-5 replies">
                @foreach ($sub_threads as $sub_thread)
                    <div class="d-flex align-items-center box">
                        <a href="javascript:void(0)" class="pe-3">
                            <div class="circle">
                                <div class="circle-avatar">
                                    <span class="avatar tip" title="{{ $sub_thread->getCreatorName() }}"
                                        style="background-color: {{ Utility::generateHexColor() }};">
                                        {{ strtoupper(substr($sub_thread->getCreatorName(), 0, 1)) }}
                                    </span>
                                </div>
                                <div class="small-circle offline"></div>
                            </div>
                        </a>
                        <div class="w-100 mb-3 mt-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div><span class="text-primary">
                                        <b>{{ $sub_thread->getCreatorName() }}</b>
                                    </span> {{ __('replied') }}</div>
                                <div>
                                    <a href="javascript:void(0)">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-clock"></i>
                                            {{ $sub_thread->created_at->diffForHumans() }}
                                        </span>
                                    </a>

                                    @if (Auth::user()->creatorId() == $sub_thread->created_by || Auth::user()->type == 'super admin')
                                        <a href="javascript:void(0)" data-size="lg"
                                            data-url="{{ route('thread_reply.edit', $sub_thread->id) }}" data-ajax-popup="true"
                                            data-title="{{ __('Edit') }}" data-bs-placement="top">
                                            <span class="badge bg-primary">
                                                <i class="ti ti-pencil"></i>
                                                {{ __('Edit') }}
                                            </span>
                                        </a>
                                        <a class="bs-pass-para" href="javascript:void(0)"
                                            data-title="{{ __('Delete Lead') }}" data-confirm="{{ __('Are You Sure?') }}"
                                            data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                            data-confirm-yes="delete-reply-{{ $sub_thread->id }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="{{ __('Delete') }}">
                                            <span class="badge bg-danger">
                                                <i class="ti ti-trash"></i>
                                                {{ __('Delete') }}
                                            </span>
                                        </a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['thread_reply.destroy', $sub_thread->id],
                                            'id' => 'delete-reply-' . $sub_thread->id,
                                        ]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-1">
                            <div>
                                {!! $sub_thread->body !!}
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>

    </div>

    <div>
        {{ Form::open(['url' => 'thread_reply', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
        <div class="row">
            <div class="col-1">
                <a href="#" class="pe-3">
                    <div class="circle">
                        <div class="circle-avatar">
                            <span class="avatar tip" title="{{ Auth::user()->name }}"
                                style="background-color: {{ Utility::generateHexColor() }};">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="small-circle offline"></div>
                    </div>
                </a>
            </div>
            <div class="col-11">
                <div class="form-group">
                    {{ Form::hidden('thread_id', $thread->id) }}
                    {{ Form::textarea('body', null, ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Body')]) }}
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ __('Add Reply') }}" class="btn btn-dark w-100">
                </div>
            </div>

        </div>
        {{ Form::close() }}

    </div>
@endsection
