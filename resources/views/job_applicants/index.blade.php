@extends('layouts.admin')
@section('page-title')
    {{ __('Job Applicants') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Job Applicants') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Job Applicants')}}</li>
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
                                    <th scope="col" class="sort" data-sort="name">{{ __('Title') }}
                                        <th scope="col" class="sort">{{ __('Position') }}</th>
                                    <th scope="col" class="sort">{{ __('Date') }}</th>
                                    </th>
                                    <th class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobApplicants as $jobApplicant)
                                    <tr>
                                        <td>{{ $jobApplicant->title }}</td>
                                        <td>{{ $jobApplicant->position }}</td>
                                        <td>{{ \App\Models\Utility::dateFormat($jobApplicant->created_at) }}</td>
                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="{{ route('job-applicants.show', $jobApplicant->id) }}"
                                                        data-ajax-popup="true" data-title="{{ __('View Job Applicants') }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('View') }}" data-tooltip="View"><i
                                                        class="ti ti-eye text-white"></i></a>
                                                </div>

                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                        href="#" data-title="{{ __('Delete Lead') }}"
                                                        data-confirm="{{ __('Are You Sure?') }}"
                                                        data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                                        data-confirm-yes="delete-form-{{ $jobApplicant->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Delete') }}">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['job-applicants.destroy', $jobApplicant->id], 'id' => 'delete-form-' . $jobApplicant->id]) !!}
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
