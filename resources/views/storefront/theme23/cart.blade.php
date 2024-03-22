@extends('storefront.layout.theme23')
@section('page-title')
    {{ __('My Cart') }}
@endsection
@section('content')
    @php
        $cart = session()->get($store->slug);
    @endphp
    @if (!empty($cart['products']) || ($cart['products'] = []))
        <!-- Inner Page Breadcrumb -->
        <section class="inner_page_breadcrumb style2 bgc-f9 bt1 inner_page_section_spacing cart-section">
            <div class="container">
                <!-- Main title -->
                <div class="main-title text-center">
                    <h1 class="mb-10">{{ __('My Cart') }}</h1>
                    <div class="title-border">
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                        <div class="title-border-inner"></div>
                    </div>
                </div>
        </section>

<!-- Shop cart start -->
<div class="shop-cart mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="shop-table cart">
                    <thead>
                    <tr>
                        <th class="product-subtotal t-600"></th>
                        <th  class="product-name t-600">{{ __('Product') }}</th>
                        <th class="description t-600">{{ __('Price') }}</th>
                        <th class="product-price t-600">{{ __('Quantity') }}</th>
                        <th class="product-quantity t-600">{{ __('Tax') }}</th>
                        <th class="product-subtotal t-600">{{ __('Total') }}</th>
                        <th class="product-remove">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($products))
                            @php
                            $sub_tax = 0;
                            $total = 0;
                            // dump($products['products']);
                            // exit;
                            @endphp
                            @foreach ($products['products'] as $key => $product)
                                @php
                                    if (!isset($product['variant_price'])) {
                                        $product['variant_price'] = 0;
                                    }
                                @endphp
                                @if ($product['variant_id'] != 0)
                                    <tr>
                                        <td class="product-thumbnail">
                                            @if (!empty($product['image']))
                                                <img alt=""
                                                    src="{{ asset($product['image']) }}"
                                                    class="cover">
                                            @else
                                                <img alt=""
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="cover">
                                            @endif
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('store.product.product_view', [$store->slug, $product['id']]) }}">{{ $product['product_name'] }}</a>
                                        </td>
                                        <td class="d_none">{{ \App\Models\Utility::priceFormat($product['price']) }}</td>
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
                                        <td class="d_none">
                                            @php
                                                $total_tax = 0;
                                            @endphp
                                            @if (!empty($product['tax']))
                                                @foreach ($product['tax'] as $tax)
                                                @php
                                                    $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                                                    $total_tax += $sub_tax;
                                                @endphp
                                                @endforeach
                                                <p class="t-gray p-title mb-0">
                                                    {{ $tax['tax_name'] . ' ' . $tax['tax'] . '%' . ' (' . $sub_tax . ')' }}
                                                </p>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td class="d_none">
                                            @php
                                                $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                $total += $totalprice;
                                            @endphp
                                            <p class="pt-price t-black15">
                                                {{ \App\Models\Utility::priceFormat($totalprice) }}
                                            </p>
                                        </td>
                                        <td class="pr25">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                onclick="removeItem('delete-product-cart-{{ $key }}')"
                                                data-bs-original-title="{{ __('Move to trash') }}"><span
                                                    class="lnr lnr-cross"></span></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['delete.cart_item', [$store->slug, $product['product_id'], $product['variant_id']]],
                                                'id' => 'delete-product-cart-' . $key,
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    <tr class="table-divider"></tr>
                                @else
                                    <tr>
                                        <td class="product-thumbnail">
                                            @if (!empty($product['image']))
                                                <img alt=""
                                                    src="{{ asset($product['image']) }}"
                                                    class="cover">
                                            @else
                                                <img alt=""
                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                    class="cover">
                                            @endif
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('store.product.product_view', [$store->slug, $product['id']]) }}">{{ $product['product_name'] }}</a>
                                        </td>
                                        <td class="d_none">{{ \App\Models\Utility::priceFormat($product['price']) }}</td>
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
                                        <td >
                                            @php
                                                $total_tax = 0;
                                            @endphp
                                            @if (!empty($product['tax']))
                                                @foreach ($product['tax'] as $tax)
                                                @php
                                                    $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                                                    $total_tax += $sub_tax;
                                                @endphp
                                                @endforeach
                                                <p class="t-gray p-title mb-0">
                                                    {{ $tax['tax_name'] . ' ' . $tax['tax'] . '%' . ' (' . $sub_tax . ')' }}
                                                </p>
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
                                                    class="lnr lnr-cross"></span></a>
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
            <div class="col-lg-4">
                <div class="cart-total-box">
                    <h5>Cart Totals</h5>
                    <hr>
                    <ul>
                        <li>
                            Subtotal<span class="pull-right"> {{ \App\Models\Utility::priceFormat($product['price']) }}</span>
                        </li>
                        <li>
                            VAT <span class="pull-right">{{ $tax['tax_name'] . ' ' . $tax['tax'] . '%' . ' (' . $sub_tax . ')' }}</span>
                        </li>
                    </ul>
                    <hr>
                    <p class="mar-b-50">
                        Grand Total<span class="pull-right">{{ \App\Models\Utility::priceFormat($totalprice) }}</span>
                    </p>
                    <br>
                    
                    <button class="btn w-100 btn-md button-theme mb-2" type="button" onclick="location.href='{{ route('user-address.useraddress', $store->slug) }}';">Proceed To Checkout</button>
                    <a href="#" class="btn btns-black w-100 btn-md mb-2" type="button">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop cart end -->
    @else
        <!-- Our Error Page -->
        <section class="our-error bgc-f9 cart-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 text-center">
                        <div class="error_page footer_apps_widget">
                            <!-- SVG illustration -->
                            <div class="row justify-content-center mb-5">
                                <div class="col-md-5">
                                    <img alt="Image placeholder" src="{{ asset('assets/img/online-shopping.svg') }}"
                                        class="svg-inject img-fluid">
                                </div>
                            </div>
                            <!-- Empty cart container -->
                            <h3 class="subtitle">{{ __('Your cart is empty') }}.</h3>
                            <p class="mb-4">
                                    {{ __('Your cart is currently empty. Return to our shop and check out the latest offers.
                                                                                                                                                                                                                                                                                                                                                                        We have some great items that are waiting for you') }}.
                                </p>
                             
                        </div>
                        <a class="btn_error btn-thm return-btn" href="{{ route('store.slug', $store->slug) }}">
                            {{ __('Return to shop') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
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
