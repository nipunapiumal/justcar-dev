@extends('layouts.admin')
@section('page-title')
    {{ __('Job Category') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Job Category') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Job Category')}}</li>
@endsection
@section('action-btn')
        <div class="pr-2">
            <a href="#" data-size="md" data-url="{{ route('job_categorie.create') }}" data-ajax-popup="true"
                data-title="{{ __('Create New Job Category') }}" class="btn btn-sm btn-primary btn-icon m-1"
                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Create') }}"><i class="ti ti-plus"></i></a>
        </div>
@endsection
@section('filter')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable ">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort">{{ __('ID') }}</th>
                                    <th scope="col" class="sort" data-sort="name">{{ __('Category') }}
                                    </th>
                                    <th class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_categories as $job_category)
                                    <tr data-name="{{ $job_category->name }}">
                                        <td>{{ $job_category->id }}</td>
                                        <td>{{ $job_category->name }}</td>
                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="{{ route('job_categorie.edit', $job_category->id) }}"
                                                        data-ajax-popup="true" data-title="{{ __('Edit Category') }}"
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
                                                        data-confirm-yes="delete-form-{{ $job_category->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Delete') }}">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['job_categorie.destroy', $job_category->id], 'id' => 'delete-form-' . $job_category->id]) !!}
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
@push('script-page')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-user', function() {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function(index) {
                    var name = $(this).attr('data-name').toLowerCase();
                    if (name.includes(value.toLowerCase())) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endpush