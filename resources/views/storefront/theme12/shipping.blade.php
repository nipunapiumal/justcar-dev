@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Shipping') }}
@endsection
@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb style2 bgc-white bt1 bgc-f9 bt1 inner_page_section_spacing">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">{{ __('My Cart') }}</h2>
                        <p class="subtitle">{{ __('Fill the form below so we can send you the orders invoice.') }}</p>
                        {{-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cars for Sale</li>
                        </ol> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Checkouts Content -->
    <section class="shop-checkouts pt0 bgc-f9 pb100">
        <div class="container">

            {{ Form::model($cust_details, ['route' => ['store.customer', $store->slug], 'method' => 'POST']) }}
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout_form style2">
                        <h4 class="title mb30">{{ __('Billing information') }}</h4>
                        <div class="checkout_coupon ui_kit_button">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb30">
                                            {{ Form::label('name', __('First Name'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => __('Enter Your First Name'), 'required' => 'required']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb30">
                                            {{ Form::label('last_name', __('Last Name'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => __('Enter Your Last Name'), 'required' => 'required']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb30">
                                            {{ Form::label('phone', __('Phone'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '(99) 12345 67890', 'required' => 'required']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb30">
                                            {{ Form::label('email', __('Email'), ['class' => 'form-control-label']) }}
                                            {{ Form::email('email', Utility::CustomerAuthCheck($store->slug) ? Auth::guard('customers')->user()->email : '', ['class' => 'form-control', 'placeholder' => __('Enter Your Email Address'), 'required' => 'required']) }}
                                        </div>
                                    </div>
                                    @if (!empty($store_payment_setting['custom_field_title_1']))
                                        <div class="col-sm-6">
                                            <div class="mb30">
                                                {{ Form::label('custom_field_title_1', $store_payment_setting['custom_field_title_1'], ['class' => 'form-control-label']) }}
                                                {{ Form::text('custom_field_title_1', old('custom_field_title_1'), ['class' => 'form-control', 'placeholder' => 'Enter ' . $store_payment_setting['custom_field_title_1'], 'required' => 'required']) }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($store_payment_setting['custom_field_title_2']))
                                        <div class="col-sm-6">
                                            <div class="mb30">
                                                {{ Form::label('custom_field_title_2', $store_payment_setting['custom_field_title_2'], ['class' => 'form-control-label']) }}
                                                {{ Form::text('custom_field_title_2', old('custom_field_title_2'), ['class' => 'form-control', 'placeholder' => 'Enter ' . $store_payment_setting['custom_field_title_1'], 'required' => 'required']) }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($store_payment_setting['custom_field_title_3']))
                                        <div class="col-sm-6">
                                            <div class="mb30">
                                                {{ Form::label('custom_field_title_3', $store_payment_setting['custom_field_title_3'], ['class' => 'form-control-label']) }}
                                                {{ Form::text('custom_field_title_3', old('custom_field_title_3'), ['class' => 'form-control', 'placeholder' => 'Enter ' . $store_payment_setting['custom_field_title_1'], 'required' => 'required']) }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($store_payment_setting['custom_field_title_4']))
                                        <div class="col-sm-6">
                                            <div class="mb30">
                                                {{ Form::label('custom_field_title_4', $store_payment_setting['custom_field_title_4'], ['class' => 'form-control-label']) }}
                                                {{ Form::text('custom_field_title_4', old('custom_field_title_4'), ['class' => 'form-control', 'placeholder' => 'Enter ' . $store_payment_setting['custom_field_title_1'], 'required' => 'required']) }}
                                            </div>
                                        </div>
                                    @endif



                                    <div class="col-sm-12">
                                        <div class="mb30">
                                            {{ Form::label('billingaddress', __('Address'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('billing_address', old('billing_address'), ['class' => 'form-control', 'placeholder' => __('Billing Address'), 'required' => 'required']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb30">
                                            {{ Form::label('billing_country', __('Country'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('billing_country', old('billing_country'), ['class' => 'form-control', 'placeholder' => __('Billing Country'), 'required' => 'required']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb30">
                                            {{ Form::label('billing_city', __('City'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('billing_city', old('billing_city'), ['class' => 'form-control', 'placeholder' => __('Billing City'), 'required' => 'required']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb30">
                                            {{ Form::label('billing_postalcode', __('Postal Code'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('billing_postalcode', old('billing_postalcode'), ['class' => 'form-control', 'placeholder' => __('Billing Postal Code')]) }}
                                        </div>
                                    </div>

                                    @if ($store->enable_shipping == 'on' && $shippings->count() > 0)
                                        <div class="col-md-6">
                                            <div class="mb30">
                                                {{ Form::label('location_id', __('Location'), ['class' => 'form-control-label']) }}
                                                {{ Form::select('location_id', $locations, null, ['class' => 'form-control change_location', 'required' => 'required']) }}
                                            </div>
                                        </div>
                                    @endif

                                    <h4 class="title">{{ __('Shipping informations') }}</h4>
                                    <h6 class="mb30">
                                        {{ __('Fill the form below so we can send you the orders invoice.') }}
                                        <b>
                                            <a href="javascript:void(0)" onclick="billing_data()" id="billing_data"
                                                data-toggle="tooltip" data-placement="top" title="Same As Billing Address">
                                                <span class="btn-inner--text">{{ __('Copy Address') }}</span>
                                            </a>
                                        </b>
                                    </h6>

                                    <div class="col-md-12">
                                        <div class="mb30">
                                            {{ Form::label('shipping_address', __('Address'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('shipping_address', old('shipping_address'), ['class' => 'form-control', 'placeholder' => __('Shipping Address')]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb30">
                                            {{ Form::label('shipping_country', __('Country'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('shipping_country', old('shipping_country'), ['class' => 'form-control', 'placeholder' => __('Shipping Country')]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb30">
                                            {{ Form::label('shipping_city', __('City'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('shipping_city', old('shipping_city'), ['class' => 'form-control', 'placeholder' => __('Shipping City')]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb30">
                                            {{ Form::label('shipping_postalcode', __('Postal Code'), ['class' => 'form-control-label']) }}
                                            {{ Form::text('shipping_postalcode', old('shipping_postalcode'), ['class' => 'form-control', 'placeholder' => __('Shipping Postal Code')]) }}
                                        </div>
                                    </div>
                                    <h5>
                                        <u> <a href="{{ route('store.slug', $store->slug) }}"
                                                class="">{{ __('Return to shop') }}</a></u>
                                    </h5>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div id="location_hide" style="display: none">
                        <div class="card">
                            <div class="card-header">
                                <h6>{{ __('Select Shipping') }}</h6>
                            </div>
                            <div class="card-body" id="shipping_location_content">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb10">
                            <label for="stripe_coupon">{{ __('Coupon') }}</label>
                            <input type="text" id="stripe_coupon" name="coupon" class="form-control coupon hidd_val"
                                placeholder="{{ __('Enter Coupon Code') }}">
                            <input type="hidden" name="coupon" class="form-control hidden_coupon " value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb30">
                            <button type="submit" class="btn btn-thm btn-block apply-coupon">{{ __('Apply') }}</button>
                            {{-- <a href="#" class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a> --}}
                        </div>
                    </div>

                    <div class="order_sidebar_widget mb30">
                        <h4 class="title">{{ __('Summary') }}</h4>


                        @if (!empty($products))
                            @php
                                $total = 0;
                                $sub_tax = 0;
                                $sub_total = 0;
                            @endphp
                            @foreach ($products as $product)
                                @if (isset($product['variant_id']) && !empty($product['variant_id']))
                                    <div class="row mb-2 pb-2 delimiter-bottom">
                                        <div class="col-8">
                                            <div class="media align-items-center">
                                                @if (!empty($product['image']))
                                                    <img alt="Image placeholder" src="{{ asset($product['image']) }}"
                                                        class="" style="width:66px;">
                                                @else
                                                    <img alt="Image placeholder"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        class="" style="width:66px;">
                                                @endif
                                                <div class="media-body">
                                                    <div class="sum-title lh-100">
                                                        <small
                                                            class="font-weight-bold mb-0">{{ $product['product_name'] . ' - ( ' . $product['variant_name'] . ' ) ' }}</small>
                                                    </div>
                                                    @php
                                                        $total_tax = 0;
                                                    @endphp
                                                    <small class="text-muted s-dim">
                                                        {{ $product['quantity'] }} x
                                                        {{ \App\Models\Utility::priceFormat($product['variant_price']) }}
                                                        @if (!empty($product['tax']))
                                                            +
                                                            @foreach ($product['tax'] as $tax)
                                                                @php
                                                                    $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                    $total_tax += $sub_tax;
                                                                @endphp

                                                                {{ \App\Models\Utility::priceFormat($sub_tax) . ' (' . $tax['tax_name'] . ' ' . $tax['tax'] . '%)' }}
                                                            @endforeach
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 text-right lh-100">
                                            <small class="text-dark">{{ __('Price') }}</small>
                                            <p class="text-dark s-rate t-black15">
                                                @php
                                                    $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                    $subtotal = $product['variant_price'] * $product['quantity'];
                                                    $sub_total += $subtotal;
                                                @endphp
                                                {{ \App\Models\Utility::priceFormat($totalprice) }}
                                            </p>
                                            @php
                                                $total += $totalprice;
                                            @endphp
                                        </div>
                                    </div>
                                @else
                                    <div class="row mb-2 pb-2 delimiter-bottom">
                                        <div class="col-8">
                                            <div class="d-flex align-items-center">
                                                @if (!empty($product['image']))
                                                    <img alt="Image placeholder" src="{{ asset($product['image']) }}"
                                                        class="" style="width:66px;">
                                                @else
                                                    <img alt="Image placeholder"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        class="" style="width:66px;">
                                                @endif
                                                <div class="media-body">
                                                    <div class="sum-title lh-100">
                                                        <small
                                                            class="font-weight-bold mb-0">{{ $product['product_name'] }}</small>
                                                    </div>
                                                    @php
                                                        $total_tax = 0;
                                                    @endphp
                                                    <small class="text-muted s-dim">
                                                        {{ $product['quantity'] }} x
                                                        {{ \App\Models\Utility::priceFormat($product['price']) }}
                                                        @if (!empty($product['tax']))
                                                            +
                                                            @foreach ($product['tax'] as $tax)
                                                                @php
                                                                    $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                    $total_tax += $sub_tax;
                                                                @endphp

                                                                {{ \App\Models\Utility::priceFormat($sub_tax) . ' (' . $tax['tax_name'] . ' ' . $tax['tax'] . '%)' }}
                                                            @endforeach
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 text-right lh-100" style="text-align: right">
                                            <small class="text-dark">{{ __('Price') }}</small>
                                            <p class="text-dark s-rate t-black15">
                                                @php
                                                    $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                    $subtotal = $product['price'] * $product['quantity'];
                                                    $sub_total += $subtotal;
                                                @endphp
                                                {{ \App\Models\Utility::priceFormat($totalprice) }}
                                            </p>
                                            @php
                                                $total += $totalprice;
                                            @endphp
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        <ul>
                            <li class="subtitle">
                                <p>{{ __('Subtotal (Before Tax)') }} <span
                                        class="float-end totals">{{ \App\Models\Utility::priceFormat(!empty($sub_total) ? $sub_total : 0) }}</span>
                                </p>

                            </li>
                            @foreach ($taxArr['tax'] as $k => $tax)
                                <li class="subtitle">
                                    <p>{{ $tax }}
                                        <span
                                            class="float-end totals">{{ \App\Models\Utility::priceFormat($taxArr['rate'][$k]) }}</span>
                                    </p>

                                </li>
                            @endforeach

                            <li class="subtitle">
                                <p>{{ __('Coupon') }} <span
                                        class="float-end totals">{{ \App\Models\Utility::priceFormat(0) }}</span></p>
                            </li>
                            <!-- Shipping -->
                            @if ($store->enable_shipping == 'on')
                                <li class="subtitle shipping_price_add" style="display: none">
                                    <p>{{ __('Shipping Price') }} <span class="float-end shipping_price totals"
                                            data-value="">$9,218.00</span></p>
                                </li>


                                <li class="subtitle">
                                    <input type="hidden" class="product_total" value="{{ $total }}">
                                    <input type="hidden" class="total_pay_price"
                                        value="{{ App\Models\Utility::priceFormat($total) }}">
                                    <p>{{ __('Total') }}
                                        <span class="float-end totals pro_total_price"
                                            data-original="{{ \App\Models\Utility::priceFormat(!empty($total) ? $total : 0) }}">
                                            {{ \App\Models\Utility::priceFormat(!empty($total) ? $total : '0') }}</span>
                                    </p>
                                </li>
                            @endif

                        </ul>
                    </div>
                    <div class="ui_kit_button payment_widget_btn">
                        <button type="submit" class="btn btn-thm btn-block">{{ __('Next step') }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>

    </section>
@endsection
@push('script-page')
    <script>
        function billing_data() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        }

        $(document).ready(function() {
            $('.change_location').trigger('change');

            setTimeout(function() {
                var shipping_id = $("input[name='shipping_id']:checked").val();
                getTotal(shipping_id);
            }, 200);
        });

        $(document).on('change', '.shipping_mode', function() {
            var shipping_id = this.value;
            getTotal(shipping_id);
        });

        function getTotal(shipping_id) {
            var pro_total_price = $('.pro_total_price').attr('data-original');
            if (shipping_id == undefined) {
                $('.shipping_price_add').hide();
                return false
            } else {
                $('.shipping_price_add').show();
            }

            $.ajax({
                url: '{{ route('user.shipping', [$store->slug, '_shipping']) }}'.replace('_shipping', shipping_id),
                data: {
                    "pro_total_price": pro_total_price,
                    "_token": "{{ csrf_token() }}",
                },
                method: 'POST',
                context: this,
                dataType: 'json',

                success: function(data) {
                    var price = data.price + pro_total_price;
                    $('.shipping_price').html(data.price);
                    $('.shipping_price').attr('data-value', data.price);
                    $('.pro_total_price').html(data.total_price);
                }
            });
        }

        $(document).on('change', '.change_location', function() {
            var location_id = $('.change_location').val();

            if (location_id == 0) {
                $('#location_hide').hide();

            } else {
                $('#location_hide').show();

            }

            $.ajax({
                url: '{{ route('user.location', [$store->slug, '_location_id']) }}'.replace('_location_id',
                    location_id),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                method: 'POST',
                context: this,
                dataType: 'json',

                success: function(data) {
                    var html = '';
                    var shipping_id =
                        '{{ isset($cust_details['shipping_id']) ? $cust_details['shipping_id'] : '' }}';
                    $.each(data.shipping, function(key, value) {
                        var checked = '';
                        if (shipping_id != '' && shipping_id == value.id) {
                            checked = 'checked';
                        }

                        html +=
                            '<div class="shipping_location"><input type="radio" name="shipping_id" data-id="' +
                            value.price + '" value="' + value.id + '" id="shipping_price' +
                            key + '" class="shipping_mode" ' + checked + '>' +
                            ' <label name="shipping_label" for="shipping_price' + key +
                            '" class="shipping_label"> ' + value.name + '</label></div>';

                    });
                    $('#shipping_location_content').html(html);
                }
            });
        });

        $(document).on('click', '.apply-coupon', function(e) {
            e.preventDefault();

            var ele = $(this);
            var coupon = ele.closest('.row').find('.coupon').val();
            var hidden_field = $('.hidden_coupon').val();
            var price = $('#card-summary .product_total').val();
            var shipping_price = $('#card-summary .shipping_price').attr('data-value');

            if (coupon == hidden_field && coupon != "") {
                show_toastr('Error', 'Coupon Already Used', 'error');
            } else {
                if (coupon != '') {

                    $.ajax({
                        url: '{{ route('apply.productcoupon') }}',
                        datType: 'json',
                        data: {
                            price: price,
                            shipping_price: shipping_price,
                            store_id: {{ $store->id }},
                            coupon: coupon
                        },
                        success: function(data) {
                            $('#stripe_coupon, #paypal_coupon').val(coupon);
                            if (data.is_success) {
                                $('.hidden_coupon').val(coupon);
                                $('.hidden_coupon').attr(data);

                                $('.dicount_price').html(data.discount_price);

                                var html = '';
                                html +=
                                    '<span class="text-sm font-weight-bold s-p-total pro_total_price" data-original="' +
                                    data.final_price_data_value + '">' + data.final_price + '</span>'
                                $('.final_total_price').html(html);


                                // $('.coupon-tr').show().find('.coupon-price').text(data.discount_price);
                                // $('.final-price').text(data.final_price);
                                show_toastr('Success', data.message, 'success');
                            } else {
                                // $('.coupon-tr').hide().find('.coupon-price').text('');
                                // $('.final-price').text(data.final_price);
                                show_toastr('Error', data.message, 'error');
                            }
                        }
                    })
                } else {
                    $.ajax({
                        url: '{{ route('apply.removecoupn') }}',
                        datType: 'json',
                        data: {
                            price: "price",
                            shipping_price: "shipping_price",
                            slug: {{ $store->id }},
                            coupon: "coupon"
                        },
                        success: function(data) {}
                    });
                    var hidd_cou = $('.hidd_val').val();

                    if (hidd_cou == "") {
                        var total_pa_val = $(".total_pay_price").val();
                        $(".final_total_price").html(total_pa_val);
                        $(".dicount_price").html(0.00);

                    }
                    show_toastr('Error', '{{ __('Invalid Coupon Code.') }}', 'error');
                }
            }

        });
    </script>
@endpush
