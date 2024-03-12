@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Cart') }}
@endsection
@section('content')
@section('head-title')
    {{ __('Welcome') . ', ' . \Illuminate\Support\Facades\Auth::guard('customers')->user()->name }}
@endsection
@section('content')

    <!-- Shop Checkouts Content -->
    <section class="shop-cart bgc-f9 mt50-lg inner_page_section_spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping_cart_tabs">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="prder" role="tabpanel" aria-labelledby="prder-tab">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="order_complete_message text-center">
                                            @if ($order->status == 'pending')
                                                <button class="btn btn-sm btn-success">{{ __('Pending') }}</button>
                                            @elseif($order->status == 'Cancel Order')
                                                <button class="btn btn-sm btn-danger">{{ __('Order Canceled') }}</button>
                                            @else
                                                <button class="btn btn-sm btn-success">{{ __('Delivered') }}</button>
                                            @endif
                                            <h2 class="title">{{ __('Order detail') }}</h2>
                                            {{-- <p class="para">Thank you. Your order has been received.</p> --}}
                                            <a href="{{ route('customer.home', $store->slug) }}"
                                                class="btn btn-white btn-white btn-icon rounded-pill hover-translate-y-n3"
                                                id="pro_scroll">
                                                <span class="btn-inner--text">{{ __('Back to order') }}</span>
                                                <span class="btn-inner--icon"><i class="fas fa-angle-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-7 m-auto">
                                        <div class="shop_order_box">
                                            <div class="order_list_raw">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th class="thead_title">{{ __('Item') }}</th>
                                                                <th class="thead_title">{{ __('Quantity') }}</th>
                                                                <th class="thead_title">{{ __('Price') }}</th>
                                                                <th class="thead_title">{{ __('Total') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $sub_tax = 0;
                                                                $total = 0;
                                                            @endphp
                                                            @foreach ($order_products as $key => $product)
                                                                @if ($product->variant_id != 0)
                                                                    <tr>
                                                                        <td class="text-left">
                                                                            <span class="h6 text-sm">
                                                                                {{ $product->product_name . ' - ( ' . $product->variant_name . ' )' }}
                                                                            </span>
                                                                            @if (!empty($product->tax))
                                                                                @php
                                                                                    $total_tax = 0;
                                                                                @endphp
                                                                                @foreach ($product->tax as $tax)
                                                                                    @php
                                                                                        $sub_tax = ($product->variant_price * $product->quantity * $tax->tax) / 100;
                                                                                        $total_tax += $sub_tax;
                                                                                    @endphp
                                                                                    {{ $tax->tax_name . ' ' . $tax->tax . '%' . ' (' . $sub_tax . ')' }}
                                                                                @endforeach
                                                                            @else
                                                                                @php
                                                                                    $total_tax = 0;
                                                                                @endphp
                                                                            @endif

                                                                        </td>
                                                                        <td>
                                                                            {{ $product->quantity }}
                                                                        </td>
                                                                        <td>
                                                                            {{ App\Models\Utility::priceFormat($product->variant_price) }}
                                                                        </td>
                                                                        <td>
                                                                            {{ App\Models\Utility::priceFormat($product->variant_price * $product->quantity + $total_tax) }}
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <td class="total">
                                                                            <span class="h6 text-sm">
                                                                                {{ $product->product_name }}
                                                                            </span>
                                                                            @if (!empty($product->tax))
                                                                                @php
                                                                                    $total_tax = 0;
                                                                                @endphp
                                                                                @foreach ($product->tax as $tax)
                                                                                    @php
                                                                                        $sub_tax = ($product->price * $product->quantity * $tax->tax) / 100;
                                                                                        $total_tax += $sub_tax;
                                                                                    @endphp
                                                                                    {{ $tax->tax_name . ' ' . $tax->tax . '%' . ' (' . $sub_tax . ')' }}
                                                                                @endforeach
                                                                            @else
                                                                                @php
                                                                                    $total_tax = 0;
                                                                                @endphp
                                                                            @endif

                                                                        </td>
                                                                        <td>
                                                                            {{ $product->quantity }}
                                                                        </td>
                                                                        <td>
                                                                            {{ App\Models\Utility::priceFormat($product->price) }}
                                                                        </td>
                                                                        <td>
                                                                            {{ App\Models\Utility::priceFormat($product->price * $product->quantity + $total_tax) }}
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                @if ($order->status == 'delivered' && !empty($product->downloadable_prodcut))
                                                                    <tr>
                                                                        <td colspan="4">
                                                                            <div class="card card-body mb-0 py-0">
                                                                                <div class="card my-5 bg-secondary">
                                                                                    <div class="card-body">
                                                                                        <div
                                                                                            class="row justify-content-between align-items-center">
                                                                                            <div
                                                                                                class="col-md-6 order-md-2 mb-4 mb-md-0">
                                                                                                <div
                                                                                                    class="d-flex align-items-center justify-content-md-end">
                                                                                                    <button
                                                                                                        data-id="{{ $order->id }}"
                                                                                                        data-value="{{ asset(Storage::url('uploads/downloadable_prodcut' . '/' . $product->downloadable_prodcut)) }}"
                                                                                                        class="btn btn-sm btn-primary downloadable_prodcut">{{ __('Download') }}</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-md-6 order-md-1">
                                                                                                <span
                                                                                                    class="h6 text-muted d-inline-block mr-3 mb-0"></span>
                                                                                                <span
                                                                                                    class="h5 mb-0">{{ __('Get your product from here') }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="order_details mb60">
                                                <h4 class="title mb40">{{ __('Items from Order ') . $order->order_id }}</h4>
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead class="thead-light">

                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ __('Sub Total') }} :</td>
                                                                <td>{{ App\Models\Utility::priceFormat($sub_total) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Estimated Tax') }} :</td>
                                                                <td>{{ App\Models\Utility::priceFormat($final_taxs) }}</td>
                                                            </tr>
                                                            @if (!empty($discount_price))
                                                                <tr>
                                                                    <td>{{ __('Apply Coupon') }} :</td>
                                                                    <td>{{ $discount_price }}</td>
                                                                </tr>
                                                            @endif
                                                            @if (!empty($shipping_data))
                                                                @if (!empty($discount_value))
                                                                    <tr>
                                                                        <td>{{ __('Shipping Price') }} :</td>
                                                                        <td>{{ App\Models\Utility::priceFormat($shipping_data->shipping_price) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{ __('Grand Total') }} :</th>
                                                                        <th>{{ App\Models\Utility::priceFormat($grand_total + $shipping_data->shipping_price - $discount_value) }}
                                                                        </th>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <td>{{ __('Shipping Price') }} :</td>
                                                                        <td>{{ App\Models\Utility::priceFormat($shipping_data->shipping_price) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{ __('Grand Total') }} :</th>
                                                                        <th>{{ App\Models\Utility::priceFormat($sub_total + $shipping_data->shipping_price + $final_taxs) }}
                                                                        </th>
                                                                    </tr>
                                                                @endif
                                                            @elseif(!empty($discount_value))
                                                                <tr>
                                                                    <th>{{ __('Grand  Total') }} :</th>
                                                                    <th>{{ App\Models\Utility::priceFormat($grand_total - $discount_value) }}
                                                                    </th>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <th>{{ __('Grand  Total') }} :</th>
                                                                    <th>{{ App\Models\Utility::priceFormat($grand_total) }}
                                                                    </th>
                                                                </tr>
                                                            @endif

                                                            <th>{{ __('Payment Type') }} :</th>
                                                            <th>{{ $order['payment_type'] }}</th>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="order_details mb60">
                                                <h4 class="title mb40">{{ __('Shipping Information') }}</h4>
                                                <address class="mb-0 text-sm">
                                                    <dl class="row mt-4 align-items-center">
                                                        <dt class="col-sm-3 h6 text-sm">{{ __('Company') }}</dt>
                                                        <dd class="col-sm-9 text-sm"> {{ $user_details->shipping_address }}
                                                        </dd>
                                                        <dt class="col-sm-3 h6 text-sm">{{ __('City') }}</dt>
                                                        <dd class="col-sm-9 text-sm">{{ $user_details->shipping_city }}
                                                        </dd>
                                                        <dt class="col-sm-3 h6 text-sm">{{ __('Country') }}</dt>
                                                        <dd class="col-sm-9 text-sm"> {{ $user_details->shipping_country }}
                                                        </dd>
                                                        <dt class="col-sm-3 h6 text-sm">{{ __('Postal Code') }}</dt>
                                                        <dd class="col-sm-9 text-sm">
                                                            {{ $user_details->shipping_postalcode }}</dd>
                                                        <dt class="col-sm-3 h6 text-sm">{{ __('Phone') }}</dt>
                                                        <dd class="col-sm-9 text-sm">{{ $user_details->phone }}</dd>
                                                        @if (!empty($location_data && $shipping_data))
                                                            <dt class="col-sm-3 h6 text-sm">{{ __('Location') }}</dt>
                                                            <dd class="col-sm-9 text-sm">{{ $location_data->name }}</dd>
                                                            <dt class="col-sm-3 h6 text-sm">{{ __('Shipping Method') }}
                                                            </dt>
                                                            <dd class="col-sm-9 text-sm">
                                                                {{ $shipping_data->shipping_name }}</dd>
                                                        @endif
                                                    </dl>
                                                </address>
                                            </div>
                                            <div class="order_details mb60">
                                                <h4 class="title mb40">{{ __('Billing Information') }}</h4>
                                                <dl class="row mt-4 align-items-center">
                                                    <dt class="col-sm-3 h6 text-sm">{{ __('Company') }}</dt>
                                                    <dd class="col-sm-9 text-sm"> {{ $user_details->billing_address }}</dd>
                                                    <dt class="col-sm-3 h6 text-sm">{{ __('City') }}</dt>
                                                    <dd class="col-sm-9 text-sm">{{ $user_details->billing_city }}</dd>
                                                    <dt class="col-sm-3 h6 text-sm">{{ __('Country') }}</dt>
                                                    <dd class="col-sm-9 text-sm"> {{ $user_details->billing_country }}</dd>
                                                    <dt class="col-sm-3 h6 text-sm">{{ __('Postal Code') }}</dt>
                                                    <dd class="col-sm-9 text-sm">{{ $user_details->billing_postalcode }}
                                                    </dd>
                                                    <dt class="col-sm-3 h6 text-sm">{{ __('Phone') }}</dt>
                                                    <dd class="col-sm-9 text-sm">{{ $user_details->phone }}</dd>
                                                    @if (!empty($location_data && $shipping_data))
                                                        <dt class="col-sm-3 h6 text-sm">{{ __('Location') }}</dt>
                                                        <dd class="col-sm-9 text-sm">{{ $location_data->name }}</dd>
                                                        <dt class="col-sm-3 h6 text-sm">{{ __('Shipping Method') }}</dt>
                                                        <dd class="col-sm-9 text-sm">{{ $shipping_data->shipping_name }}
                                                        </dd>
                                                    @endif
                                                </dl>
                                            </div>
                                            <div class="order_details mb60">
                                                <h6 class="title mb-4">{{ __('Extra Information') }}</h6>
                                                <dl class="row mt-4 align-items-center">
                                                    <dt class="col-sm-3 h6 text-sm">
                                                        {{ $store_payment_setting['custom_field_title_1'] }}</dt>
                                                    <dd class="col-sm-9 text-sm"> {{ $user_details->custom_field_title_1 }}
                                                    </dd>
                                                    <dt class="col-sm-3 h6 text-sm">
                                                        {{ $store_payment_setting['custom_field_title_2'] }}</dt>
                                                    <dd class="col-sm-9 text-sm"> {{ $user_details->custom_field_title_2 }}
                                                    </dd>
                                                    <dt class="col-sm-3 h6 text-sm">
                                                        {{ $store_payment_setting['custom_field_title_3'] }}</dt>
                                                    <dd class="col-sm-9 text-sm">{{ $user_details->custom_field_title_3 }}
                                                    </dd>
                                                    <dt class="col-sm-3 h6 text-sm">
                                                        {{ $store_payment_setting['custom_field_title_4'] }}</dt>
                                                    <dd class="col-sm-9 text-sm">
                                                        {{ $user_details->custom_field_title_4 }}</dd>
                                                </dl>
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
    <script type="text/javascript">
        $(document).on('click', '.downloadable_prodcut', function() {

            var download_product = $(this).attr('data-value');
            var order_id = $(this).attr('data-id');

            var data = {
                download_product: download_product,
                order_id: order_id,
            }

            $.ajax({
                url: '{{ route('user.downloadable_prodcut', $store->slug) }}',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {
                        show_toastr("success", data.message + '<br> <b>' + data.msg + '<b>', data[
                            "status"]);
                        $('.downloadab_msg').html('<span class="text-success">' + data.msg + '</sapn>');
                    } else {
                        show_toastr("Error", data.message + '<br> <b>' + data.msg + '<b>', data[
                            "status"]);
                    }
                }
            });
        });
    </script>
@endpush
