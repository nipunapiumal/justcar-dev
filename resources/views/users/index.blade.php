@extends('layouts.admin')
@section('page-title')
    {{ __('Users') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-2">{{ __('Users') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
@endsection
@section('action-btn')
    <div class="pr-2">
        <a href="#" data-size="md" data-url="{{ route('store-resource.create') }}" data-ajax-popup="true"
            data-title="{{ __('Create New User') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="{{ __('Create') }}"><i class="ti ti-plus"></i></a>
    </div>
@endsection
@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>
                                    <th>{{ __('User Name') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    {{-- <th>{{ __('Stores') }}</th> --}}
                                    {{-- <th>{{ __('Plan') }}</th> --}}
                                    <th>{{ __('Created At') }}</th>
                                    {{-- <th>{{ __('Store Display') }}</th> --}}
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $usr)
                                    <tr>
                                        <td>{{ $usr->name }}</td>
                                        <td><span class="badge bg-light text-dark">{{ \App\Models\Utility::getUserRoles($usr->type) }}</span></td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ \App\Models\Utility::dateFormat($usr->created_at) }}</td>
                                        
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="{{ route('users.edit', $usr->id) }}"
                                                        data-ajax-popup="true" data-title="{{ __('Edit User') }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Edit') }}"><i
                                                            class="ti ti-pencil text-white"></i></a>
                                                </div>
                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                        href="#" data-title="{{ __('Delete Lead') }}"
                                                        data-confirm="{{ __('Are You Sure?') }}"
                                                        data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                                        data-confirm-yes="delete-form-{{ $usr->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Delete ') }}">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['store-resource.destroy', $usr->id],
                                                        'id' => 'delete-form-' . $usr->id,
                                                    ]) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="{{ route('user.reset', \Crypt::encrypt($usr->id)) }}"
                                                        data-ajax-popup="true" data-title="{{ __('Reset Password') }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Reset Password') }}"> <i
                                                            class="fas fa-key text-white"></i></a>
                                                </div>
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="{{ route('auto-login',["id"=>$usr->id,"token"=>Str::random(32)]) }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Auto Login') }}"><i
                                                            class="fas fa-sign-in-alt text-white"></i>
                                                    </a>
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
