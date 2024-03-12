@extends('layouts.forum')
@section('page-title')
    {{ __('Gallery Category') }}
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
        <div class="card-body table-border-style">
            <h5></h5>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable ">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">
                                        {{ __('Category') }}
                                    </th>
                                    <th class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr data-name="{{ $category->name }}">
                                        <td>{{ $category->name }}</td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="{{ route('forumzone.edit', $category->id) }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Edit') }}" data-tooltip="Edit"><i
                                                            class="ti ti-pencil text-white"></i></a>
                                                </div>

                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                        href="#" data-title="{{ __('Delete Lead') }}"
                                                        data-confirm="{{ __('Are You Sure?') }}"
                                                        data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                                        data-confirm-yes="delete-form-{{ $category->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Delete') }}">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['forumzone.destroy', $category->id],
                                                        'id' => 'delete-form-' . $category->id,
                                                    ]) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
