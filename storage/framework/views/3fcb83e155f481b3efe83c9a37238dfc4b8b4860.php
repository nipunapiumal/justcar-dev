<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $cart = session()->get($store->slug);
    ?>
    <?php if(!empty($cart['products']) || ($cart['products'] = [])): ?>
        <!-- Inner Page Breadcrumb -->
        

        <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2 class="breadcrumb_title"><?php echo e(__('My Cart')); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('My Cart')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->
        <!-- Shop Checkouts Content -->
        <section class="shop-cart bgc-f9 pt0 inner-title">
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
                                                    <th class="pl30" colspan="1" scope="row"><?php echo e(__('Product')); ?>

                                                    </th>
                                                    <th scope="col"><?php echo e(__('Price')); ?></th>
                                                    <th scope="col"><?php echo e(__('Quantity')); ?></th>
                                                    <th scope="col"><?php echo e(__('Tax')); ?></th>
                                                    <th scope="col" class="text-center"><?php echo e(__('Total')); ?></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="table_body">
                                                <?php if(!empty($products)): ?>
                                                    <?php
                                                        $sub_tax = 0;
                                                        $total = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $products['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($product['variant_id'] != 0): ?>
                                                            <tr class="alert" data-id="<?php echo e($key); ?>">
                                                                <td>
                                                                    <?php if(!empty($product['image'])): ?>
                                                                        <img alt=""
                                                                            src="<?php echo e(asset($product['image'])); ?>"
                                                                            class="cover">
                                                                    <?php else: ?>
                                                                        <img alt=""
                                                                            src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                                            class="cover">
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td scope="row">
                                                                    <div class="media align-items-center">
                                                                        <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product['id']])); ?>"
                                                                            class="text-dark c-list-title mb-0 cart_word_break"><?php echo e($product['product_name'] . ' - ' . $product['variant_name']); ?></a>
                                                                    </div>
                                                                </td>
                                                                <td class="price">
                                                                    <div class="media-body pl-3">
                                                                        <span
                                                                            class="font-weight-bold mb-2 t-gray p-title"><?php echo e(__('Price')); ?></span>
                                                                        <div class="lh-100">
                                                                            <span
                                                                                class="t-black15 p-price font-weight-bold mb-0">
                                                                                <?php echo e(\App\Models\Utility::priceFormat($product['variant_price'])); ?>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="qty-box">
                                                                    <span
                                                                        class="font-weight-bold t-gray p-title"><?php echo e(__('Quantity')); ?></span>
                                                                    <div class="count-input" data-id="<?php echo e($key); ?>">
                                                                        <input type="button" value="<"
                                                                            class="qty-minus product_qty">
                                                                        <input type="text"
                                                                            value="<?php echo e($product['quantity']); ?>"
                                                                            data-id="<?php echo e($product['product_id']); ?>"
                                                                            class="bx-cart-qty qty form-control form-control-sm text-center product_qty_input"
                                                                            id="product_qty">
                                                                        <input type="button" value=">"
                                                                            class="qty-plus product_qty">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="font-weight-bold t-gray p-title">
                                                                        <?php echo e(__('Tax')); ?></div>
                                                                    <?php
                                                                        $total_tax = 0;
                                                                    ?>
                                                                    <?php if(!empty($product['tax'])): ?>
                                                                        <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php
                                                                                $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                                $total_tax += $sub_tax;
                                                                            ?>
                                                                            <p class="t-gray p-title mb-0">
                                                                                <?php echo e($tax['tax_name'] . ' ' . $tax['tax'] . '%' . ' (' . $sub_tax . ')'); ?>

                                                                            </p>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php else: ?>
                                                                        -
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="font-weight-bold t-gray p-title"><?php echo e(__('Total')); ?></span>
                                                                    <?php
                                                                        $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                                        $total += $totalprice;
                                                                    ?>
                                                                    <p class="pt-price t-black15">
                                                                        <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                                    </p>
                                                                </td>
                                                                <td class="text-right">
                                                                    <!-- Actions -->
                                                                    <div class="actions ml-3">
                                                                        <a href="#!" class="action-item mr-2"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="<?php echo e(__('Move to trash')); ?>"
                                                                            data-confirm="<?php echo e(__('Are You Sure?') . ' | ' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                                            data-confirm-yes="document.getElementById('delete-product-cart-<?php echo e($key); ?>').submit();">
                                                                            <i class="fas fa-times"></i>
                                                                        </a>
                                                                        <?php echo Form::open([
                                                                            'method' => 'DELETE',
                                                                            'route' => ['delete.cart_item', [$store->slug, $product['product_id'], $product['variant_id']]],
                                                                            'id' => 'delete-product-cart-' . $key,
                                                                        ]); ?>

                                                                        <?php echo Form::close(); ?>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="table-divider"></tr>
                                                        <?php else: ?>
                                                            <tr class="alert" data-id="<?php echo e($key); ?>">
                                                                <th class="pl30" scope="row">
                                                                    <div class="cart_list d-flex align-items-center">
                                                                        <div style="width: 95px;height: 95px;"
                                                                            class="pr-2">
                                                                            <a href="#">

                                                                                <?php if(!empty($product['image'])): ?>
                                                                                    <img alt="Image placeholder"
                                                                                        src="<?php echo e(asset($product['image'])); ?>"
                                                                                        class="cover">
                                                                                <?php else: ?>
                                                                                    <img alt="Image placeholder"
                                                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                                                        class="cover">
                                                                                <?php endif; ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="p-2" style="width:250px">
                                                                            <a href="<?php echo e(route('store.product.product_view', [$store->slug, $product['id']])); ?>"
                                                                                class="cart_title text-dark c-list-title mb-0 cart_word_break"><?php echo e($product['product_name']); ?></a>
                                                                        </div>

                                                                    </div>
                                                                    
                                                                </th>
                                                                <td> <?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?>

                                                                </td>
                                                                <td class="qty-box">

                                                                    <div class="count-input" data-id="<?php echo e($key); ?>">
                                                                        <input type="button" value="<"
                                                                            class="qty-minus product_qty">
                                                                        <input type="text"
                                                                            value="<?php echo e($product['quantity']); ?>"
                                                                            data-id="<?php echo e($product['product_id']); ?>"
                                                                            class="bx-cart-qty qty form-control form-control-sm text-center product_qty_input"
                                                                            id="product_qty">
                                                                        <input type="button" value=">"
                                                                            class="qty-plus product_qty">
                                                                    </div>


                                                                    
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <?php
                                                                        $total_tax = 0;
                                                                    ?>
                                                                    <?php if(!empty($product['tax'])): ?>
                                                                        <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php
                                                                                $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                                $total_tax += $sub_tax;
                                                                            ?>
                                                                            <?php echo e($tax['tax_name'] . ' ' . $tax['tax'] . '%' . ' (' . $sub_tax . ')'); ?>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php else: ?>
                                                                        -
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                                        $total += $totalprice;
                                                                    ?>
                                                                    <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                                </td>
                                                                <td class="pr25">
                                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        onclick="removeItem('delete-product-cart-<?php echo e($key); ?>')"
                                                                        data-bs-original-title="<?php echo e(__('Move to trash')); ?>"><span
                                                                            class="far fa-trash-alt"></span></a>
                                                                    <?php echo Form::open([
                                                                        'method' => 'DELETE',
                                                                        'route' => ['delete.cart_item', [$store->slug, $product['product_id'], $product['variant_id']]],
                                                                        'id' => 'delete-product-cart-' . $key,
                                                                    ]); ?>

                                                                    <?php echo Form::close(); ?>

                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>





                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="order_sidebar_widget style2">
                                    
                                    <ul class="mb15">
                                        
                                        <li class="subtitle">
                                            <p><?php echo e(__('Total value')); ?> <span
                                                    class="float-end cart-total totals color-orose">
                                                    <?php echo e(\App\Models\Utility::priceFormat(!empty($total) ? $total : 0)); ?></span>
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="ui_kit_button payment_widget_btn">
                                        <button type="button" class="btn btn-thm btn-block"
                                            onclick="location.href='<?php echo e(route('user-address.useraddress', $store->slug)); ?>';">
                                            <?php echo e(__('Proceed to checkout')); ?>

                                        </button>
                                        <button type="button" class="btn btn-light mt-2 btn-block"
                                            onclick="location.href='<?php echo e(route('store.slug', $store->slug)); ?>';">
                                            <?php echo e(__('Return to shop')); ?>

                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Our Error Page -->

        <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
            <div class="container">
                <div class="content">
                    <h2 class="breadcrumb_title"><?php echo e(__('My Cart')); ?></h2>
                    <ul class="list-unstyled">
                        <li class="d-inline">
                            <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                        </li>
                        <li class="d-inline">/</li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('My Cart')); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="our-error bgc-f9 cart-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 text-center">
                        <div class="error_page footer_apps_widget">
                            <!-- SVG illustration -->
                            <div class="row justify-content-center mb-5">
                                <div class="col-md-5">
                                    <img alt="Image placeholder" src="<?php echo e(asset('assets/img/online-shopping.svg')); ?>"
                                        class="svg-inject img-fluid">
                                </div>
                            </div>
                            <!-- Empty cart container -->
                            <h3 class="subtitle"><?php echo e(__('Your cart is empty')); ?>.</h3>
                            <p class="mb-4">
                                    <?php echo e(__('Your cart is currently empty. Return to our shop and check out the latest offers.
                                                                                                                                                                                                                                                                                                                                                                        We have some great items that are waiting for you')); ?>.
                                </p>
                             
                        </div>
                        <a class="btn_error btn-thm return-btn" href="<?php echo e(route('store.slug', $store->slug)); ?>">
                            <?php echo e(__('Return to shop')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </section>
        
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
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
                    url: '<?php echo e(route('user-product_qty.product_qty', ['__product_id', $store->slug, 'arrkeys'])); ?>'
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
                    url: '<?php echo e(route('user-product_qty.product_qty', ['__product_id', $store->slug, 'arrkeys'])); ?>'
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

            let text = "<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>";
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme36', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme36/cart.blade.php ENDPATH**/ ?>