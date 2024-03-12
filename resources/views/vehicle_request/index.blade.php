@extends('layouts.admin')
@section('page-title')
    {{__('Vehicle Requests')}}
@endsection
@section('title')
<h5 class="h4 d-inline-block font-weight-bold mb-0 text-white">{{__('Vehicle Requests')}}</h5>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Vehicle Requests') }}</li>
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
                                    <th>{{ __('Vehicle Brand') }}</th>
                                    <th>{{ __('Vehicle Model') }}</th>
                                    <th>{{ __('Equipments') }}</th>
                                    <th>{{ __('Interior Design') }}</th>
                                    <th>{{ __('Exterior Color') }}</th>
                                    <th>{{ __('Interior Color') }}</th>
                                    <th>{{ __('Created By') }}</th>
                                    <th>{{ __('Created at') }}</th>
                                    {{-- <th class="text-right">{{ __('Action') }}</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicle_requests as $prequest)
                                    <tr>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->vehicle_brand }}</div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->vehicle_model }}</div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->equipments }}</div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->interior_design }}</div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->exterior_color }}</div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->interior_color }}</div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold">{{ $prequest->created_by }}</div>
                                        </td>
                                       
                                        <td>{{ \App\Models\Utility::getDateFormated($prequest->created_at,true) }}</td>
                                        {{-- <td>
                                            <div>
                                                <a href="" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td> --}}
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
