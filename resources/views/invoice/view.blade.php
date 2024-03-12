@extends('layouts.pdf')
@push('css-page')
@endpush
@section('content')
    <style>
        body {
            margin: 1rem;
            font-family: sans-serif;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #293240;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        .w-100 {
            width: 100% !important;
        }

        .text-end {
            text-align: right !important;
        }

        .text-muted {
            --bs-text-opacity: 1;
            color: #6c757d !important;
        }

        .info-header td {
            padding-left: 30px;
        }

        /* .product-info tr:first-child {
                                                                border-top: 1px solid;
                                                                border-bottom: 1px solid;
                                                            } */

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .d-flex {
            display: flex !important;
        }

        .justify-content-end {
            justify-content: flex-end !important;
        }

        .justify-content-between {
            justify-content: space-between !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .pt-2 {
            padding-top: 0.5rem !important;
        }

        .pb-2 {
            padding-bottom: 0.5rem !important;
        }

        .text-start {
            text-align: left !important;
        }

        table {
            border-collapse: collapse;
        }


        /* .fixed-bottom {
                        position: fixed;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        z-index: 1030;
                    } */

        .mt-2 {
            margin-top: 0.5rem !important;
        }


        .m-0 {
            margin: 0 !important;
        }

        .m-1 {
            margin: 0.25rem !important;
        }

        .m-2 {
            margin: 0.5rem !important;
        }

        .m-3 {
            margin: 1rem !important;
        }

        .m-4 {
            margin: 1.5rem !important;
        }

        .m-5 {
            margin: 3rem !important;
        }

        .m-auto {
            margin: auto !important;
        }
    </style>

    @php
        $logo = asset(Storage::url('uploads/logo/'));
        $company_logo = \App\Models\Utility::GetLogo();
        $lang = App::getLocale();

        $product_price = $product->net_price != 0 ? $product->net_price : 0;
        //product count tax
        $taxes = Utility::tax($product->product_tax);
        $itemTaxes = [];
        $producttax = 0;
    @endphp

    <div class="text-end">
        <img style="max-width: 300px;"
            src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
            alt="{{ config('app.name', 'Storego') }}" class="logo logo-lg nav-sidebar-logo" />
    </div>

    <h4 class="mb-0"><b>{{ $customer->company }}</b></h4>
    <div>{{ $customer->name }}</div>
    <div>{{ $customer->address }}</div>
    <div>{{ $customer->zip_code }} {{ $customer->city }} </div>
    <div>{{ $customer->phone_number }} </div>

    <div class="info-header d-flex justify-content-end text-end">
        <table border="0" class="mt-5 w-100">
            <tr>
                {{-- <td class="pl-4">
                    <b>Client No</b>
                    <br>
                    0114563434
                </td> --}}
                <td class="pl-4 text-end">
                    <div><b>{{ __('Invoice') }} {{ __('Date') }}</b></div>
                    <div>{{ \App\Models\Utility::dateFormat($invoice->created_at) }}</div>
                </td>

            </tr>
        </table>
    </div>
    <h3 class="mt-3">{{ __('Invoice Number') }} #{{ $invoice->invoice_no }}</h3>
    <p>
        @php
            if ($invoice->description) {
                $desc = json_decode($invoice->description);
                $desc = $desc->$lang;
            }
        @endphp
        {!! nl2br($desc) !!}
    </p>

    <table class="mt-5 w-100">
        <tr style="border-top: 1px solid;border-bottom: 1px solid;">
            <th class="pt-2 pb-2 text-start">
                POS
            </th>
            <th class="pt-2 pb-2 text-start">
                {{ __('Description') }}
            </th>
            <th class="pt-2 pb-2 text-end">
                {{ __('Total') }} {{ env('CURRENCY_SYMBOL') }}
            </th>
        </tr>
        <tr>
            <td>
                1
            </td>
            <td>
                {{ $product->getVehicleBrand() }} {{ $product->getVehicleModel() }}
                <br>
                {{ __('Fin Number') }} {{ $product->fin_number }}
                <br>
                {{ __('First Register Year') }}/{{ __('month') }}
                {{ $product->register_year }}/{{ $product->register_month }}
                <br>
                {{ __('Millage (km)') }} {{ $product->millage }}
                <br>
                {{ $fuel_type->name }}
                - {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                - {{ $product->power }} ({{ $product->power_type }})
                <br>
                <table>
                    <tr>
                        <td>{{ __('Interior Color') }}</td>
                        <td style="padding-left: 10px">
                            <div
                                style="height: 20px;width:20px;background-color:{{ $product->interior_color }};border:1px solid">
                            </div>
                        </td>
                        <td style="padding-left: 10px">{{ __('Exterior Color') }}</td>
                        <td style="padding-left: 10px">
                            <div
                                style="height: 20px;width:20px;background-color:{{ $product->exterior_color }};border:1px solid">
                            </div>
                        </td>
                    </tr>
                </table>
                <br>
                {{ __('Equipments') }}
                <ul>
                    @foreach (json_decode($product->equipments) as $key_equipment => $equipment)
                        <li>{{ $equipment }}</li>
                    @endforeach
                </ul>
                {{-- <br> --}}
                {{-- {{ __('Interior Design') }}
                <ul>
                    @foreach (json_decode($product->interior_design) as $key_interior_design => $interior_design)
                        <li>{{ $interior_design }}</li>
                    @endforeach
                </ul> --}}


            </td>
            <td class="text-end">
                {{ \App\Models\Utility::priceFormat($product->net_price) }}
            </td>


        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>

                <table class="w-100">
                    <tr style="border-bottom: 1px solid">
                        <td>
                            <div>{{ __('Total') }} {{ __('Net') }}</div>
                        </td>
                        <td class="text-end">{{ \App\Models\Utility::priceFormat($product_price) }}</td>
                    </tr>
                    @if (!empty($taxes))
                        @foreach ($taxes as $tax)
                            @if (!empty($tax))
                                <tr style="border-bottom: 1px solid">
                                    @php
                                        $producttax = Utility::taxRate($tax->rate, $product_price, 1);
                                        $itemTax['tax_name'] = $tax->name;
                                        $itemTax['tax'] = $tax->rate;
                                        $itemTaxes[] = $itemTax;

                                        echo '<td>' . $tax->name . ' ' . $tax->rate . '%' . '</td>';
                                        echo '<td class="text-end">' . Utility::priceFormat($producttax) . '</td>';
                                    @endphp
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    @php
                        $subtotal = Utility::priceFormat($product_price + $producttax);
                    @endphp


                    <tr style="border-bottom: 2px solid red;">
                        <td><b>{{ __('Total') }}</b></td>
                        <td class="text-end"><b>{{ $subtotal }}</b></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="m-3">
        <p class="text-muted mt-4"><small>{{ Utility::getValByName($lang . '_terms_and_conditions') }}</small></p>

        <table border="0" class="mt-2 w-100 text-muted">
            <tr style="border-top: 1px solid;border-bottom: 1px solid;">
                <td>
                    {{ Utility::getValByName('title_text') }}
                    <br>
                    {{ Utility::getValByName('address') }}
                    <br>
                    {{ Utility::getValByName('zip_code') }} {{ Utility::getValByName('city') }}
                    <br>
                    @if ($vat_number = Utility::getValByName('vat_number'))
                        <div>{{ __('Vat Number') }}: {{ $vat_number }}</div>
                    @endif
                </td>
                <td>
                    @if ($phone_number = Utility::getValByName('phone_number'))
                        <div>{{ __('Phone No') }}: {{ $phone_number }}</div>
                    @endif
                    @if ($fax_number = Utility::getValByName('fax_number'))
                        <div> {{ __('Fax Number') }}: {{ $fax_number }}</div>
                    @endif
                    @if ($email = Utility::getValByName('email'))
                        <div> {{ __('Email') }}: {{ $email }}</div>
                    @endif
                    @if ($website = Utility::getValByName('website'))
                        <div>{{ __('Website') }}: {{ $website }}</div>
                    @endif

                </td>
                <td class="text-end">
                    {!! nl2br(Utility::getValByName('bank_number')) !!}
                </td>
            </tr>

        </table>
    </div>
@endsection
@push('script-page')
@endpush
