@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Product Details') }}
@endsection
@section('content')
    @php
    $cart = session()->get($store->slug);
    @endphp
    @if (!empty($cart['products']) || ($cart['products'] = []))
        <!-- Inner Page Breadcrumb -->
        <section class="inner_page_breadcrumb style2 bgc-f9 bt1 inner_page_section_spacing">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb_content style2">
                            <h2 class="breadcrumb_title">{{ __('My Cart') }}</h2>
                            {{-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cars for Sale</li>
                            </ol> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Shop Checkouts Content -->
        <section class="shop-cart bgc-f9 pt0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8 col-xl-9">
                                <div class="shopping_cart_tabs ovyh">
                                    <div class="shopping_cart_table">
                                        <table class="table table-responsive table-borderless">

                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="pl30" colspan="1" scope="row">{{ __('Product') }}
                                                    </th>
                                                    <th scope="col">{{ __('Price') }}</th>
                                                    <th scope="col">{{ __('Quantity') }}</th>
                                                    <th scope="col">{{ __('Tax') }}</th>
                                                    <th scope="col" class="text-center">{{ __('Total') }}</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="table_body">
                                                @if (!empty($products))
                                                    @php
                                                        $sub_tax = 0;
                                                        $total = 0;
                                                    @endphp
                                                    @foreach ($products['products'] as $key => $product)
                                                        @if ($product['variant_id'] != 0)
                                                            <tr class="alert" data-id="{{ $key }}">
                                                                <td>
                                                                    @if (!empty($product['image']))
                                                                        <img alt=""
                                                                            src="{{ asset($product['image']) }}"
                                                                            class="" style="width:66px;">
                                                                    @else
                                                                        <img alt=""
                                                                            src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                            class="" style="width:66px;">
                                                                    @endif
                                                                </td>
                                                                <td scope="row">
                                                                    <div class="media align-items-center">
                                                                        <a href="{{ route('store.product.product_view', [$store->slug, $product['id']]) }}"
                                                                            class="text-dark c-list-title mb-0 cart_word_break">{{ $product['product_name'] . ' - ' . $product['variant_name'] }}</a>
                                                                    </div>
                                                                </td>
                                                                <td class="price">
                                                                    <div class="media-body pl-3">
                                                                        <span
                                                                            class="font-weight-bold mb-2 t-gray p-title">{{ __('Price') }}</span>
                                                                        <div class="lh-100">
                                                                            <span
                                                                                class="t-black15 p-price font-weight-bold mb-0">
                                                                                {{ \App\Models\Utility::priceFormat($product['variant_price']) }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="qty-box">
                                                                    <span
                                                                        class="font-weight-bold t-gray p-title">{{ __('Quantity') }}</span>
                                                                    <div class="count-input" data-id="{{ $key }}">
                                                                        <input type="button" value="<"
                                                                            class="qty-minus product_qty">
                                                                        <input type="text"
                                                                            value="{{ $product['quantity'] }}"
                                                                            data-id="{{ $product['product_id'] }}"
                                                                            class="bx-cart-qty qty form-control form-control-sm text-center product_qty_input"
                                                                            id="product_qty">
                                                                        <input type="button" value=">"
                                                                            class="qty-plus product_qty">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="font-weight-bold t-gray p-title">
                                                                        {{ __('Tax') }}</div>
                                                                    @php
                                                                        $total_tax = 0;
                                                                    @endphp
                                                                    @if (!empty($product['tax']))
                                                                        @foreach ($product['tax'] as $tax)
                                                                            @php
                                                                                $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                                $total_tax += $sub_tax;
                                                                            @endphp
                                                                            <p class="t-gray p-title mb-0">
                                                                                {{ $tax['tax_name'] . ' ' . $tax['tax'] . '%' . ' (' . $sub_tax . ')' }}
                                                                            </p>
                                                                        @endforeach
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="font-weight-bold t-gray p-title">{{ __('Total') }}</span>
                                                                    @php
                                                                        $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                                        $total += $totalprice;
                                                                    @endphp
                                                                    <p class="pt-price t-black15">
                                                                        {{ \App\Models\Utility::priceFormat($totalprice) }}
                                                                    </p>
                                                                </td>
                                                                <td class="text-right">
                                                                    <!-- Actions -->
                                                                    <div class="actions ml-3">
                                                                        <a href="#!" class="action-item mr-2"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="{{ __('Move to trash') }}"
                                                                            data-confirm="{{ __('Are You Sure?') . ' | ' . __('This action can not be undone. Do you want to continue?') }}"
                                                                            data-confirm-yes="document.getElementById('delete-product-cart-{{ $key }}').submit();">
                                                                            <i class="fas fa-times"></i>
                                                                        </a>
                                                                        {!! Form::open([
                                                                            'method' => 'DELETE',
                                                                            'route' => ['delete.cart_item', [$store->slug, $product['product_id'], $product['variant_id']]],
                                                                            'id' => 'delete-product-cart-' . $key,
                                                                        ]) !!}
                                                                        {!! Form::close() !!}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="table-divider"></tr>
                                                        @else
                                                            <tr class="alert" data-id="{{ $key }}">
                                                                <th class="pl30" scope="row">
                                                                    <ul class="cart_list">
                                                                        <li class="list-inline-item">

                                                                            <a href="#">

                                                                                @if (!empty($product['image']))
                                                                                    <img alt="Image placeholder"
                                                                                        src="{{ asset($product['image']) }}"
                                                                                        class="" style="width:66px;">
                                                                                @else
                                                                                    <img alt="Image placeholder"
                                                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                                        class="" style="width:66px;">
                                                                                @endif
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="{{ route('store.product.product_view', [$store->slug, $product['id']]) }}"
                                                                                class="cart_title text-dark c-list-title mb-0 cart_word_break">{{ $product['product_name'] }}</a>
                                                                        </li>
                                                                    </ul>
                                                                </th>
                                                                <td> {{ \App\Models\Utility::priceFormat($product['price']) }}
                                                                </td>
                                                                <td class="qty-box">

                                                                    <div class="count-input" data-id="{{ $key }}">
                                                                        <input type="button" value="<"
                                                                            class="qty-minus product_qty">
                                                                        <input type="text"
                                                                            value="{{ $product['quantity'] }}"
                                                                            data-id="{{ $product['product_id'] }}"
                                                                            class="bx-cart-qty qty form-control form-control-sm text-center product_qty_input"
                                                                            id="product_qty">
                                                                        <input type="button" value=">"
                                                                            class="qty-plus product_qty">
                                                                    </div>


                                                                    {{-- <input data-id="{{ $product['product_id'] }}"
                                                                        class="cart_count bx-cart-qty qty form-control form-control-sm text-center product_qty_input"
                                                                        id="product_qty" placeholder="4" type="number"
                                                                        value="{{ $product['quantity'] }}"> --}}
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $total_tax = 0;
                                                                    @endphp
                                                                    @if (!empty($product['tax']))
                                                                        @foreach ($product['tax'] as $tax)
                                                                            @php
                                                                                $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                                $total_tax += $sub_tax;
                                                                            @endphp
                                                                            {{ $tax['tax_name'] . ' ' . $tax['tax'] . '%' . ' (' . $sub_tax . ')' }}
                                                                        @endforeach
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                                        $total += $totalprice;
                                                                    @endphp
                                                                    {{ \App\Models\Utility::priceFormat($totalprice) }}
                                                                </td>
                                                                <td class="pr25">
                                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        onclick="removeItem('delete-product-cart-{{ $key }}')"
                                                                        data-bs-original-title="{{ __('Move to trash') }}"><span
                                                                            class="flaticon-trash"></span></a>
                                                                    {!! Form::open([
                                                                        'method' => 'DELETE',
                                                                        'route' => ['delete.cart_item', [$store->slug, $product['product_id'], $product['variant_id']]],
                                                                        'id' => 'delete-product-cart-' . $key,
                                                                    ]) !!}
                                                                    {!! Form::close() !!}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif





                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                {{-- <div class="shopping_cart_tabs">
                                    <div class="shopping_cart_table">
                                        <div class="checkout_form mt30">
                                            <div class="checkout_coupon">
                                                <form class="df db-sm">
                                                    <input class="form-control coupon_input" type="search"
                                                        placeholder="Coupon code" aria-label="Search">
                                                    <button type="button" class="btn btn-thm">Apply Coupon</button>
                                                    <button type="button" class="btn btn3">Update Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="order_sidebar_widget style2">
                                    {{-- <h4 class="title">Cart Totals</h4> --}}
                                    <ul class="mb15">
                                        {{-- <li class="subtitle">
                                            <p>Subtotal <span class="float-end">$13,000</span></p>
                                        </li> --}}
                                        <li class="subtitle">
                                            <p>{{ __('Total value') }} <span
                                                    class="float-end cart-total totals color-orose">
                                                    {{ \App\Models\Utility::priceFormat(!empty($total) ? $total : 0) }}</span>
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="ui_kit_button payment_widget_btn">
                                        <button type="button" class="btn btn-thm btn-block"
                                            onclick="location.href='{{ route('user-address.useraddress', $store->slug) }}';">
                                            {{ __('Proceed to checkout') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="main-content">
            <section class="mh-100vh d-flex align-items-center" data-offset-top="#header-main">
                <!-- SVG background -->
                <div class="bg-absolute-cover bg-size--contain d-flex align-items-center zindex0">
                    <figure class="w-100 px-4">
                        <img alt="Image placeholder" src="{{ asset('assets/img/bg-3.svg') }}" class="svg-inject">
                    </figure>
                </div>
                <div class="container pt-6 position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center">
                                <!-- SVG illustration -->
                                <div class="row justify-content-center mb-5">
                                    <div class="col-md-5">
                                        <img alt="Image placeholder" src="{{ asset('assets/img/online-shopping.svg') }}"
                                            class="svg-inject img-fluid">
                                    </div>
                                </div>
                                <!-- Empty cart container -->
                                <h6 class="h4 my-4">{{ __('Your cart is empty') }}.</h6>
                                <p class="px-md-5">
                                    {{ __('Your cart is currently empty. Return to our shop and check out the latest offers.
                                                                                                                                                                                                                                                                                                                                    We have some great items that are waiting for you') }}.
                                </p>
                                <a href="{{ route('store.slug', $store->slug) }}"
                                    class="btn btn-sm btn-primary btn-icon rounded-pill my-5">
                                    <span class="btn-inner--icon"><i class="fas fa-angle-left"></i></span>
                                    <span class="btn-inner--text">{{ __('Return to shop') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection
@push('script-page')
    <script>
        $(document).on('click', '.product_qty', function(e) {
            e.preventDefault();
            var currEle = $(this);
            var product_id = $(this).siblings(".bx-cart-qty").attr('data-id');
            var arrkey = $(this).parents('tr').attr('data-id');

            setTimeout(function() {
                if (currEle.hasClass('qty-minus') == true) {
                    qty_id = currEle.next().val()
                } else {
                    qty_id = currEle.prev().val()
                }

                if (qty_id == 0 || qty_id == '' || qty_id < 0) {
                    location.reload();
                    return false;
                }

                $.ajax({
                    url: '{{ route('user-product_qty.product_qty', ['__product_id', $store->slug, 'arrkeys']) }}'
                        .replace('__product_id', product_id).replace('arrkeys', arrkey),
                    type: "post",
                    headers: {
                        'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "product_qty": qty_id,
                    },
                    success: function(response) {
                        if (response.status == "Error") {
                            show_toastr('Error', response.error, 'error');
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {
                            location.reload(); // then reload the page.(3)
                        }
                    },
                    error: function(result) {
                        console.log('error12');
                    }
                });
            }, 100);
        })

        $(".product_qty_input").on('blur', function(e) {
            e.preventDefault();

            var product_id = $(this).attr('data-id');
            var arrkey = $(this).parents('div').attr('data-id');
            var qty_id = $(this).val();
            console.log(product_id, arrkey, qty_id);

            setTimeout(function() {
                if (qty_id == 0 || qty_id == '' || qty_id < 0) {
                    location.reload();
                    return false;
                }

                $.ajax({
                    url: '{{ route('user-product_qty.product_qty', ['__product_id', $store->slug, 'arrkeys']) }}'
                        .replace('__product_id', product_id).replace('arrkeys', arrkey),
                    type: "post",
                    headers: {
                        'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "product_qty": qty_id,
                    },
                    success: function(response) {
                        if (response.status == "Error") {
                            show_toastr('Error', response.error, 'error');
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {
                            location.reload(); // then reload the page.(3)
                        }
                    },
                    error: function(result) {
                        // console.log('error12');
                    }
                });
            }, 500);
        });

        function qtyChange(product_id, arrkey, qty_id) {

        }

        function removeItem(element) {

            let text = "{{ __('This action can not be undone. Do you want to continue?') }}";
            if (confirm(text) == true) {
                document.getElementById(element).submit();
            }



        }

        $(document).on('click', '.qty-plus', function() {
            $(this).prev().val(+$(this).prev().val() + 1);
        });

        $(document).on('click', '.qty-minus', function() {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        });
    </script>
@endpush
