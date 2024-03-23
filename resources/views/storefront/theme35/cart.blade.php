@extends('storefront.layout.theme35')
@section('page-title')
    {{ __('My Cart') }}
@endsection
@section('content')
    @php
        $cart = session()->get($store->slug);
    @endphp
    @if (!empty($cart['products']) || ($cart['products'] = []))
        <!-- Inner Page Breadcrumb -->
        <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
            <div class="container">
                <div class="content">
                    <h2> {{ __('My Cart') }}</h2>
                    <ul class="list-unstyled">
                        <li class="d-inline">
                            <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="d-inline">/</li>
                        <li class="d-inline active opacity-75"> {{ __('My Cart') }}</li>
                    </ul>
                </div>
            </div>
        </div>
 

<!-- Shop Checkouts Content -->

<div class="shopping-area cart ptb-100">
    <div class="container">
        <div class="row justify-content-center gx-xl-5">
            <div class="col-xl-9">
                <form action="#">
                    <div class="item-list border mb-30 table-responsive">
                        <table class="shopping-table">
                            <thead>
                                <tr class="table-heading">
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
                                    @endphp
                                    @foreach ($products['products'] as $key => $product)
                                        @if ($product['variant_id'] != 0)
                                        <tr class="item" data-id="{{ $key }}">
                                            <td class="product-img">
                                                <div class="image">
                                                    <a href="#">
                                                        @if (!empty($product['image']))
                                                            <img alt="Image placeholder"
                                                                src="{{ asset($product['image']) }}"
                                                                class="cover">
                                                        @else
                                                            <img alt="Image placeholder"
                                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                class="cover">
                                                        @endif
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="product-desc">
                                                <h6>
                                                    <a class="product-title mb-10" href="{{ route('store.product.product_view', [$store->slug, $product['id']]) }}">{{ $product['product_name'] }}</a>
                                                </h6>
                                            </td>
                                            <td class="product-price">
                                                <h6 class="m-0">{{ \App\Models\Utility::priceFormat($product['price']) }}</h6>
                                            </td>
                                            <td class="qty">
                                                <div class="quantity-input" data-id="{{ $key }}">
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
                                            <td class="product-price">
                                                @php
                                                    $total_tax = 0;
                                                @endphp
                                                <h6 class="m-0">
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
                                                </h6>
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
                                        @else
                                            <tr class="item" data-id="{{ $key }}">
                                                <td class="product-img">
                                                    <div class="image">
                                                        <a href="#">
                                                            @if (!empty($product['image']))
                                                                <img alt="Image placeholder"
                                                                    src="{{ asset($product['image']) }}"
                                                                    class="cover">
                                                            @else
                                                                <img alt="Image placeholder"
                                                                    src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                                    class="cover">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="product-desc">
                                                    <h6>
                                                        <a class="product-title mb-10" href="{{ route('store.product.product_view', [$store->slug, $product['id']]) }}">{{ $product['product_name'] }}</a>
                                                    </h6>
                                                </td>
                                                <td class="product-price">
                                                    <h6 class="m-0">{{ \App\Models\Utility::priceFormat($product['price']) }}</h6>
                                                </td>
                                                <td class="qty">
                                                    <div class="quantity-input" data-id="{{ $key }}">
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
                                                <td class="product-price">
                                                    @php
                                                        $total_tax = 0;
                                                    @endphp
                                                    <h6 class="m-0">
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
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="m-0">
                                                        @php
                                                                $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                                $total += $totalprice;
                                                            @endphp
                                                            {{ \App\Models\Utility::priceFormat($totalprice) }}
                                                    </h6>
                                                </td>
                                                <td class="pr25">
                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        onclick="removeItem('delete-product-cart-{{ $key }}')"
                                                        data-bs-original-title="{{ __('Move to trash') }}"><span
                                                            class="fal fa-trash-alt"></span></a>
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
                    <div class="btn-groups gap-3 justify-content-end w-100">
                        <a href="#" class="btn btn-md btn-outline" title="Back to Home" target="_self">Back to Home</a>
                        <a href="#" class="btn btn-md btn-primary" title="Checkout" target="_self" onclick="location.href='{{ route('user-address.useraddress', $store->slug) }}';">Checkout</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @else
        <!-- Our Error Page -->

         <!-- Inner Page Breadcrumb -->
         <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="{{ asset('assets/theme35to37/images/page-title-bg-4.jpg') }}">
            <div class="container">
                <div class="content">
                    <h2> {{ __('My Cart') }}</h2>
                    <ul class="list-unstyled">
                        <li class="d-inline">
                            <a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="d-inline">/</li>
                        <li class="d-inline active opacity-75"> {{ __('My Cart') }}</li>
                    </ul>
                </div>
            </div>
        </div>


        <section class="our-error bgc-f9 cart-section mt-100">
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
        {{-- <div class="main-content">
            <section class="mh-100vh d-flex align-items-center" data-offset-top="#header-main">
                <div class="bg-absolute-cover bg-size--contain d-flex align-items-center zindex0">
                    <figure class="w-100 px-4">
                        <img alt="Image placeholder" src="{{ asset('assets/img/bg-3.svg') }}" class="svg-inject">
                    </figure>
                </div>
                <div class="container pt-6 position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center">
                                <div class="row justify-content-center mb-5">
                                    <div class="col-md-5">
                                        <img alt="Image placeholder" src="{{ asset('assets/img/online-shopping.svg') }}"
                                            class="svg-inject img-fluid">
                                    </div>
                                </div>
                                <h6 class="h4 my-4">{{ __('Your cart is empty') }}.</h6>
                                
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
        </div> --}}
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
