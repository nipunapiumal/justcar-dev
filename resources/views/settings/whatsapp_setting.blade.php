@extends('layouts.admin')
@section('page-title')
    {{ __('Whatsapp Messaging') }}
@endsection
@php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Whatsapp Messaging') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Whatsapp Messaging') }}</h5>
    </div>
@endsection
@section('action-btn')
@endsection
@section('content')
    @if (Auth::user()->type == 'Owner')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5 class="">
                            {{ __('Whatsapp Messaging') }}
                        </h5>
                    </div> --}}
                    <div class="card-body p-4">
                        {{ Form::model($store_settings, ['route' => ['customMassage', $store_settings->slug], 'method' => 'POST']) }}
                        <div class="row">
                            <h6 class="font-weight-bold">{{ __('Order Variable') }}</h6>
                            <div class="form-group col-md-6">
                                <p class="mb-1">{{ __('Store Name') }} : <span
                                        class="pull-right text-primary">{store_name}</span></p>
                                <p class="mb-1">{{ __('Order No') }} : <span
                                        class="pull-right text-primary">{order_no}</span></p>
                                <p class="mb-1">{{ __('Customer Name') }} : <span
                                        class="pull-right text-primary">{customer_name}</span></p>
                                <p class="mb-1">{{ __('Billing Address') }} : <span
                                        class="pull-right text-primary">{billing_address}</span></p>
                                <p class="mb-1">{{ __('Billing Ccountry') }} : <span
                                        class="pull-right text-primary">{billing_country}</span></p>
                                <p class="mb-1">{{ __('Billing City') }} : <span
                                        class="pull-right text-primary">{billing_city}</span></p>
                                <p class="mb-1">{{ __('Billing Postalcode') }} : <span
                                        class="pull-right text-primary">{billing_postalcode}</span></p>
                                <p class="mb-1">{{ __('Shipping Address') }} : <span
                                        class="pull-right text-primary">{shipping_address}</span></p>
                                <p class="mb-1">{{ __('Shipping Country') }} : <span
                                        class="pull-right text-primary">{shipping_country}</span></p>

                                <p class="mb-1">{{ __('Shipping City') }} : <span
                                        class="pull-right text-primary">{shipping_city}</span></p>
                                <p class="mb-1">{{ __('Shipping Postalcode') }} : <span
                                        class="pull-right text-primary">{shipping_postalcode}</span></p>
                                <p class="mb-1">{{ __('Item Variable') }} : <span
                                        class="pull-right text-primary">{item_variable}</span></p>
                                <p class="mb-1">{{ __('Qty Total') }} : <span
                                        class="pull-right text-primary">{qty_total}</span></p>
                                <p class="mb-1">{{ __('Sub Total') }} : <span
                                        class="pull-right text-primary">{sub_total}</span></p>
                                <p class="mb-1">{{ __('Discount Amount') }} : <span
                                        class="pull-right text-primary">{discount_amount}</span></p>
                                <p class="mb-1">{{ __('Shipping Amount') }} : <span
                                        class="pull-right text-primary">{shipping_amount}</span></p>
                                <p class="mb-1">{{ __('Total Tax') }} : <span
                                        class="pull-right text-primary">{total_tax}</span></p>
                                <p class="mb-1">{{ __('Final Total') }} : <span
                                        class="pull-right text-primary">{final_total}</span></p>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="font-weight-bold">{{ __('Item Variable') }}</h6>
                                <p class="mb-1">{{ __('Sku') }} : <span class="pull-right text-primary">{sku}</span>
                                </p>
                                <p class="mb-1">{{ __('Quantity') }} : <span
                                        class="pull-right text-primary">{quantity}</span></p>
                                <p class="mb-1">{{ __('Product Name') }} : <span
                                        class="pull-right text-primary">{product_name}</span></p>
                                <p class="mb-1">{{ __('Variant Name') }} : <span
                                        class="pull-right text-primary">{variant_name}</span></p>
                                <p class="mb-1">{{ __('Item Tax') }} : <span
                                        class="pull-right text-primary">{item_tax}</span></p>
                                <p class="mb-1">{{ __('Item total') }} : <span
                                        class="pull-right text-primary">{item_total}</span></p>
                                <div class="form-group">
                                    <label for="storejs" class="col-form-label">{item_variable}</label>
                                    {{ Form::text('item_variable', null, ['class' => 'form-control', 'placeholder' => '{quantity} x {product_name} - {variant_name} + {item_tax} = {item_total}']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('content', __('Whatsapp Message'), ['class' => 'col-form-label']) }}
                                    {{ Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-end">
                            <div class="card-footer">
                                <div class="col-sm-12 px-2">
                                    <div class="d-flex justify-content-end">
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
@endpush
