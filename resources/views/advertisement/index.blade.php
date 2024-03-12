@extends('layouts.admin')
@section('page-title')
    {{ __('Advertisements') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Advertisements') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Advertisements') }}</li>
@endsection
@section('action-btn')
    <div class="pr-2">
        <a href="#" data-size="md" data-url="{{ route('advertisements.create') }}" data-ajax-popup="true"
            data-title="{{ __('Create New Advertisements') }}" class="btn btn-sm btn-primary btn-icon m-1"
            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Create ') }}"><i class="ti ti-plus"></i></a>
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
                                    <th scope="col" class="sort" data-sort="name">{{ __('Advertisement Type') }}</th>
                                    <th class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertisements as $advertisement)
                                    <tr data-name="{{ $advertisement->advertisement_type }}">
                                        <td>
                                            @if ($advertisement->advertisement_type == 1)
                                                {{ __('Banner Image') }}
                                            @elseif($advertisement->advertisement_type == 3)
                                                {{ __('Interstitial Ad') }}
                                            @else
                                                {{ __('Google Ad code') }}
                                            @endif

                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="{{ route('advertisements.edit', $advertisement->id) }}"
                                                        data-ajax-popup="true" data-title="{{ __('Edit Advertisements') }}"
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
                                                        data-confirm-yes="delete-form-{{ $advertisement->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Delete') }}">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['advertisements.destroy', $advertisement->id],
                                                        'id' => 'delete-form-' . $advertisement->id,
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
@push('script-page')
    <script>
        $(document).on('change', '#advertisement_type', function(e) {
            var advertisementType = $(this).val();



            if (advertisementType == 1) {
                $("#info-standard").show();
                $("#info-google").hide();
                $("#info-interstitial").hide();
            } else if (advertisementType == 2) {
                $("#info-standard").hide();
                $("#info-google").show();
                $("#info-interstitial").hide();
            } else if (advertisementType == 3) {
                $("#info-standard").hide();
                $("#info-google").hide();
                $("#info-interstitial").show();
            } else {
                $("#info-standard").hide();
                $("#info-google").hide();
                $("#info-interstitial").hide();
            }


        });
    </script>
@endpush
