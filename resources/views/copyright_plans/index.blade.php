@extends('layouts.admin')
@section('page-title')
    {{ __('Copyright Plans') }}
@endsection
@php
    // $dir = asset(Storage::url('uploads/plan'));
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Copyright Plans') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Copyright Plans') }}</h5>
    </div>
@endsection
@section('action-btn')

    @if (Auth::user()->type == 'super admin')
        @if (
            (isset($admin_payments_setting['is_stripe_enabled']) && $admin_payments_setting['is_stripe_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paypal_enabled']) && $admin_payments_setting['is_paypal_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paystack_enabled']) &&
                    $admin_payments_setting['is_paystack_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_flutterwave_enabled']) &&
                    $admin_payments_setting['is_flutterwave_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_razorpay_enabled']) &&
                    $admin_payments_setting['is_razorpay_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_mercado_enabled']) &&
                    $admin_payments_setting['is_mercado_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_paytm_enabled']) && $admin_payments_setting['is_paytm_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_mollie_enabled']) && $admin_payments_setting['is_mollie_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_skrill_enabled']) && $admin_payments_setting['is_skrill_enabled'] == 'on') ||
                (isset($admin_payments_setting['is_coingate_enabled']) &&
                    $admin_payments_setting['is_coingate_enabled'] == 'on'))
            <div class="pr-2">
                <a href="#" data-ajax-popup="true" data-size="lg" data-title="{{ __('Add Plan') }}"
                    data-url="{{ route('copyright-plan.create') }}" class="btn btn-sm btn-primary btn-icon m-1"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Add Plan') }}"><i
                        class="ti ti-plus"></i></a>
            </div>
        @endif
    @endif
@endsection
@section('content')
    <div class="row">
        @foreach ($copyright_plans as $copyright_plan)
            <div class="plan_card">
                <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                    style="
                                    visibility: visible;
                                    animation-delay: 0.2s;
                                    animation-name: fadeInUp;
                                  ">
                    <div class="card-body">
                        <span class="price-badge bg-primary">{{ $copyright_plan->name }}</span>
                        @if (\Auth::user()->type == 'Owner' && \Auth::user()->copyright_plan == $copyright_plan->id)
                            <div class="d-flex flex-row-reverse m-0 p-0 plan-active-status">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                    <span class="ms-2">{{ __('Active') }}</span>
                                </span>
                            </div>
                        @endif

                        <div class="text-end">
                            <div class="mb-3">
                                @if (\Auth::user()->type == 'super admin')
                                    <div class="action-btn bg-primary ms-2">
                                        <a href="#"
                                            data-url="{{ route('copyright-plan.edit', $copyright_plan->id) }}"
                                            class="mx-3 btn btn-sm d-inline-flex align-items-center" data-ajax-popup="true"
                                            data-title="{{ __('Edit Plan') }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="{{ __('Edit ') }}"><i
                                                class="fas fa-edit text-white"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <h4 class="f-w-600">
                            {{-- {{ __('Per Month') }} / {{ $copyright_plan->price }}{{ env('CURRENCY_SYMBOL') }} --}}
                            {{ $copyright_plan->price }}{{ env('CURRENCY_SYMBOL') }}
                        </h4>
                        <h6 class="f-w-600">
                            @if ($copyright_plan->price == 0)
                                {{ __('Duration') }} / {{ __('Unlimited') }}
                            @else
                                {{ __('Duration') }} / {{ env('STORAGE_PLAN_DURATION') }} {{ __('Months') }}
                            @endif
                        </h6>


                        <ul class="list-unstyled  my-4">
                            @if ($copyright_plan->price)
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary fas fa-check"></i></span>{{ __('Customize Footer') }}
                                </li>
                            @else
                                <li class="text-danger">
                                    <span class="theme-avtar">
                                        <i class="text-danger fas fa-times-circle"></i></span>{{ __('Customize Footer') }}
                                </li>
                            @endif
                        </ul>


                        {{-- <h4>{{ __('Total Amount (+19% VAT)') }}</h4>
                        @php
                            $priceWithTax = App\Models\CopyrightPlan::priceWithTax($copyright_plan->price);
                        @endphp
                        <h5> {{ $priceWithTax['pretty_with_tax'] }}</h5> --}}



                        <div class="storage-plan-card-detail">
                            @if ($copyright_plan->description)
                                <p class="mb-0">
                                    {{ $copyright_plan->description }}<br />
                                </p>
                            @endif
                        </div>

                        <div class="row">
                            @if (\Auth::user()->type != 'super admin')
                                @if (\Auth::user()->copyright_plan == $copyright_plan->id && date('Y-m-d') < \Auth::user()->copyright_plan_expire_date)
                                    <h5 class="h6 my-4">
                                        {{ __('Expired : ') }}
                                        {{ \Auth::user()->copyright_plan_expire_date ? \App\Models\Utility::dateFormat(\Auth::user()->copyright_plan_expire_date) : __('Unlimited') }}
                                    </h5>
                                @elseif(
                                    \Auth::user()->copyright_plan == $copyright_plan->id &&
                                        !empty(\Auth::user()->copyright_plan_expire_date) &&
                                        \Auth::user()->copyright_plan_expire_date < date('Y-m-d'))
                                    <div class="col-12">
                                        <p class="server-plan font-weight-bold text-center mx-sm-5">
                                            {{ __('Expired') }}
                                        </p>
                                    </div>
                                @elseif(\Auth::user()->copyright_plan == $copyright_plan->id)
                                    <div class="col-12">
                                        <a href="javascript:void(0)"
                                            class="btn btn-secondary disabled d-flex justify-content-center align-items-center ">{{ __('Subscribe') }}
                                            <i class="fas fa-arrow-right m-1"></i></a>
                                        <p></p>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <a href="{{ route('stripe', ['code' => \Illuminate\Support\Facades\Crypt::encrypt($copyright_plan->id), 'type' => 'copyright']) }}"
                                            class="btn btn-primary d-flex justify-content-center align-items-center ">{{ __('Subscribe') }}
                                            <i class="fas fa-arrow-right m-1"></i></a>
                                        <p></p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable ">
                            <thead>
                                <tr>
                                    <th> {{ __('Order Id') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Plan') }}</th>
                                    <th> {{ __('Price') }}</th>
                                    <th> {{ __('Payment Type') }}</th>
                                    <th> {{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>{{ $order->user_name }}</td>
                                        <td>{{ $order->copyright_plan_name }}</td>
                                        <td>{{ env('CURRENCY_SYMBOL') . $order->price }}</td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td>
                                            @if ($order->payment_status == 'succeeded')
                                                <i class="mdi mdi-circle text-success"></i>
                                                {{ ucfirst($order->payment_status) }}
                                            @else
                                                <i class="mdi mdi-circle text-danger"></i>
                                                {{ ucfirst($order->payment_status) }}
                                            @endif
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

@push('scripts')
    <script>
        // $(document).ready(function() {
        //     var tohref = '';
        //     @if (Auth::user()->is_register_trial == 1)
        //         tohref = $('#trial_{{ Auth::user()->interested_plan_id }}').attr("href");
        //     @elseif (Auth::user()->interested_plan_id != 0)
        //         tohref = $('#interested_plan_{{ Auth::user()->interested_plan_id }}').attr("href");
        //     @endif

        //     if (tohref != '') {
        //         window.location = tohref;
        //     }
        // });
    </script>
@endpush
