@extends('layouts.pdf')
@push('css-page')
@endpush
@section('content')
    <style>
        .img-fluid {
            width: 100%;
        }

        body {
            font-size: 18px;
            margin: 20px;
        }

        .mt-5 {
            margin-top: 30px;
        }

        .mb-5 {
            margin-bottom: 30px;
        }
    </style>
    @php
        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
    @endphp
    <h1><u>{{ __('For Sale') }}</u></h1>
    <h4>{{ $product->name }}</h4>

    <table border="0" style="width: 100%">
        <tr>
            <td>
                <table border="0">
                    <tr>
                        <td>
                            {{ __('Millage (km)') }}
                        </td>
                        <td style="padding-left: 30px">
                            {{ $product->millage }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Power') }}
                        </td>
                        <td style="padding-left: 30px">
                            {{ $product->power }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Fuel Type') }}
                        </td>
                        <td style="padding-left: 30px">
                            {{ $fuel_type->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Transmission') }}
                        </td>
                        <td style="padding-left: 30px">
                            {{ \App\Models\Utility::getVehicleTransmission($product->transmission_id) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Interior Color') }}
                        </td>
                        <td style="padding-left: 30px">
                            <div
                                style="height: 20px;width:20px;background-color:{{ $product->interior_color }};border:1px solid">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Exterior Color') }}
                        </td>
                        <td style="padding-left: 30px;text-align:right">
                            <div
                                style="height: 20px;width:20px;background-color:{{ $product->exterior_color }};border:1px solid">
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td style="padding-left: 30px;text-align:right">
                <div>
                    @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                        <img style="width: 340px;height:210px;object-fit:cover"
                            src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}" alt="">
                    @endif
                </div>
            </td>
        </tr>

    </table>



    


    <h4 class="mt-3">{{ __('Equipments') }}</h4>
    <ul>
        @foreach (json_decode($product->equipments) as $key_equipment => $equipment)
            <li>{{ $equipment }}</li>
        @endforeach
    </ul>

    <h4 class="mt-3">{{ __('Interior Design') }}</h4>
    <ul>
        @foreach (json_decode($product->interior_design) as $key_interior_design => $interior_design)
            <li>{{ $interior_design }}</li>
        @endforeach
    </ul>

    <h4 class="mt-3">{{ __('Description') }}</h4>
    <p> {!! $product->description !!}</p>



    <table border="0">
        <tr>
            <td>
                <h4>{{ __('Contact Us') }}</h4>
                <h3>{{ $storethemesetting['top_bar_number'] }}</h3>
            </td>
            <td style="padding-left: 30px">
                <h4>{{ __('Price') }}</h4>
                <h3>
                    @if ($product->product_type == 1)
                    @else
                        @if ($product->net_price)
                            <span>
                                {{ __('Net') }}
                                {{ \App\Models\Utility::priceFormat($product->net_price) }}
                            </span>
                        @endif
                        <small>
                            <del>
                                {{ __('Gross') }} {{ \App\Models\Utility::priceFormat($product->price) }}
                            </del>
                        </small>
                    @endif
                </h3>
                {{-- <h4>{{ __('Price') }}</h4>
                <h3>
                    <span>
                        @if ($product->enable_product_variant == 'on')
                            {{ \App\Models\Utility::priceFormat(0) }}
                        @else
                            {{ \App\Models\Utility::priceFormat($product->price) }}
                        @endif
                    </span>
                </h3> --}}
            </td>
        </tr>
    </table>



    <div class="mt-5 mb-5">
        @php
            $svg = QrCode::generate(route('store.product.product_view', [$store->slug, $product->id]));
        @endphp
        <img src="data:image/svg+xml;base64,{{ base64_encode($svg) }}" width="200" />
    </div>
    <div class="col-lg-12">
        {!! \App\Models\Advertisement::getAdvertisement($store, 1) !!}
    </div>
    <p class="mt-3">
        {{ \App\Models\Utility::getFooter($storethemesetting['footer_note']) }}
    </p>
@endsection
@push('script-page')
@endpush
