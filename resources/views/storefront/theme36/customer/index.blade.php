@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Cart') }}
@endsection
@section('content')
@section('head-title')
    {{ __('Welcome') . ', ' . \Illuminate\Support\Facades\Auth::guard('customers')->user()->name }}
@endsection
@section('content')

<!-- Breadcrumb Area Start-->
<div class="breadcrumb-area bg-9">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="breadcrumb-text text-left">
                    <h2>{{ __('Products you purchased') }}</h2>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                            <li>{{ __('Products you purchased') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Our Dashbord -->
    <section class="our-dashbord dashbord bgc-f9">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard_favorites_contents dashboard_my_lising_tabs p10-520">
                                <div class="row">

                                    <!-- Tab panes -->
                                    <div class="col-lg-12">
                                        <div class="tab-content row" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive my_lisging_table">
                                                        <table class="table">

                                                            @if (!empty($orders) && count($orders) > 0)
                                                            <thead class="table-light">
                                                                    <tr>
                                                                        <th class="thead_title" scope="col">
                                                                            {{ __('Order') }}</th>
                                                                        <th class="thead_title" scope="col"
                                                                            class="sort">{{ __('Date') }}</th>
                                                                        {{-- <th class="thead_title" scope="col"
                                                                            class="sort">{{ __('Value') }}</th> --}}
                                                                        <th class="thead_title" scope="col"
                                                                            class="sort">{{ __('Payment Type') }}</th>
                                                                        <th class="thead_title" scope="col"
                                                                            class="text-right">{{ __('Action') }}</th>
                                                                    </tr>
                                                                </thead>
                                                            @else
                                                                <tr>
                                                                    <td colspan="7">
                                                                        <div class="text-center">
                                                                            <i class="fas fa-folder-open text-gray"
                                                                                style="font-size: 48px;"></i>
                                                                            <h2>{{ __('Opps...') }}</h2>
                                                                            <h6> {!! __('No data Found.') !!} </h6>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            <tbody>
                                                                @foreach ($orders as $order)
                                                                    <tr>
                                                                        <th class="align-middle pl20" scope="row">
                                                                            <div class="car-listing bdr_none d-flex mb0">
                                                                              <div class="details ms-1">
                                                                                <h6 class="title">
                                                                                    <a href="{{ route('customer.order', [$store->slug, Crypt::encrypt($order->id)]) }}">
                                                                                        {{ '#' . $order->order_id }}
                                                                                    </a></h6>
                                                                                <h5 class="price">{{ \App\Models\Utility::priceFormat($order->price) }}</h5>
                                                                              </div>
                                                                            </div>
                                                                          </th>
                                                                          <td class="align-middle">{{ \App\Models\Utility::dateFormat($order->created_at) }}</td>
                                                                          <td class="align-middle">{{ $order->payment_type }}</td>
                                                                          
                                                                          <td class="editing_list align-middle">
                                                                            @if ($order->status != 'Cancel Order')
                                                                            <button type="button"
                                                                                class="btn btn-sm {{ $order->status == 'pending' ? 'btn-soft-info' : 'btn-soft-success' }} btn-icon rounded-pill">
                                                                                <span class="btn-inner--icon">
                                                                                    @if ($order->status == 'pending')
                                                                                        <i
                                                                                            class="fas fa-check soft-success"></i>
                                                                                    @else
                                                                                        <i
                                                                                            class="fa fa-check-double soft-success"></i>
                                                                                    @endif
                                                                                </span>
                                                                                @if ($order->status == 'pending')
                                                                                    <span class="btn-inner--text">
                                                                                        {{ __('Pending') }}:
                                                                                        {{ \App\Models\Utility::dateFormat($order->created_at) }}
                                                                                    </span>
                                                                                @else
                                                                                    <span class="btn-inner--text">
                                                                                        {{ __('Delivered') }}:
                                                                                        {{ \App\Models\Utility::dateFormat($order->updated_at) }}
                                                                                    </span>
                                                                                @endif
                                                                            </button>
                                                                        @else
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-soft-danger btn-icon rounded-pill">
                                                                                <span class="btn-inner--icon">
                                                                                    @if ($order->status == 'pending')
                                                                                        <i
                                                                                            class="fas fa-check soft-success"></i>
                                                                                    @else
                                                                                        <i
                                                                                            class="fa fa-check-double soft-success"></i>
                                                                                    @endif
                                                                                </span>
                                                                                <span class="btn-inner--text">
                                                                                    {{ __('Cancel Order') }}:
                                                                                    {{ \App\Models\Utility::dateFormat($order->created_at) }}
                                                                                </span>
                                                                            </button>
                                                                        @endif
                                                                            <ul class="d-inline">
                                                                                <li class="list-inline-item mb-1">
                                                                                  <a href="{{ route('customer.order', [$store->slug, Crypt::encrypt($order->id)]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Details') }}"><span class="flaticon-view"></span></a>
                                                                                </li>
                                                                              </ul>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-page')
@endpush
