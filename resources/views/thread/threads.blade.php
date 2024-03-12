@extends('layouts.forum')
@section('page-title')
    {{ __('Thread') }}
@endsection
@section('language-bar')
    {{-- <li class="nav-item">
        <select name="language" id="language" class="btn-primary custom_btn ms-2 me-2 language_option_bg"
            onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            @foreach (App\Models\Utility::languages() as $language)
                <option @if ($lang == $language) selected @endif value="{{ route('terms', $language) }}">
                    {{ Str::upper($language) }}</option>
            @endforeach
        </select>
    </li> --}}
@endsection
@section('content')
    @foreach ($threads as $thread)
        <div class="card">
            <div class="card-body">
                <div class="content-box d-flex">
                    <div class="content-box-left d-flex justify-content-center align-items-center">
                        <a href="#" class="user user_1" data-id="1">
                            <div class="circle">
                                <div class="circle-avatar">
                                    <span class="avatar tip" title="{{ $thread->getCreatorName() }}"
                                        style="background-color: {{ Utility::generateHexColor() }};">
                                        {{ strtoupper(substr($thread->getCreatorName(), 0, 1)) }}
                                    </span>
                                </div>
                                <div class="small-circle offline"></div>
                            </div>
                        </a>

                    </div>
                    <div class="content-box-middle">
                        <h4>
                            <a href="{{ route('forum.show', [$thread->id]) }}">
                                {{ $thread->title }}
                            </a>
                        </h4>
                        <div class="meta-box">

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
                                    data-confirm-yes="delete-form-{{ $thread->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="{{ __('Delete') }}">
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
                        <p class="mt-1">
                            {{ $thread->description }}
                        </p>
                    </div>
                    <div class="content-box-right d-flex justify-content-center flex-column">

                        <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                            title="{{ __('Views') }}">
                            <i class="fa fa-eye"></i>
                            <span>0 {{ __('Views') }}</span>
                        </div>
                        <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                            title="{{ __('Replies') }}">
                            <i class="far fa-comment"></i>
                            <span>{{ $thread->getReplyCount() }} {{ __('Replies') }}</span>
                        </div>
                        <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                            title="{{ __('Created at') }}">
                            <i class="fas fa-clock"></i>
                            <span> {{ $thread->created_at->diffForHumans() }}</span>
                        </div>
                        @if ($thread->getLastReplyTime())
                            <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                                title="{{ __('Last reply time') }}">
                                <i class="fa fa-reply"></i>
                                <span>{{ $thread->getLastReplyTime()->diffForHumans() }}</span>
                            </div>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
