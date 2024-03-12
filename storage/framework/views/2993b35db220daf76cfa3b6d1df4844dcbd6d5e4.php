<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
    $coupon_price = !empty($coupon_price) ? $coupon_price : 0;
    $shipping_price = !empty($shipping_price) ? $shipping_price : 0;
    ?>
    <input type="hidden" id="return_url">
    <input type="hidden" id="return_order_id">
    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb style2 bgc-white bt1 bgc-f9 bt1 inner_page_section_spacing">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title"><?php echo e(__('Payment')); ?></h2>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Checkouts Content -->
    <section class="shop-checkouts pt0 bgc-f9 pb100">
        <div class="container">

           
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout_form style2">
                        <!-- COD -->
                        <?php if($store['enable_cod'] == 'on'): ?>
                            <div class="card">
                                <div class="box-space">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('COD')); ?></label>
                                            </div>
                                            <p class="text-muted mt-2 mb-0 text-12"><?php echo e(__('Cash on delivery is a type of transaction in which payment for a good is made at the time of delivery.')); ?></p>
                                        </div>
                                        <div class="col-12 col-lg col-md-4 text-right">
                                            <i class="fas fa-truck fa-2x mb-2"></i>
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('user.cod',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-thm btn-block" id="cash_on_delivery"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    <!-- Add money using Telegram -->
                        <?php if($store['enable_telegram'] == 'on'): ?>
                            <div class="card">
                                <div class="box-space">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <label class="h6 mb-0 lh-180" for="radio-payment-whatsapp"><?php echo e(__('Telegram')); ?></label>
                                            <p class="text-muted mt-2 mb-0 text-12">
                                                <?php echo e(__('Click to chat. The click to chat feature lets customers click an URL in order to directly start a chat with another person or business via WhatsApp. ... QR code. As you know, having to add a phone number to
                                                your contacts in order to start up a WhatsApp message can take a little while')); ?>.....</p>
                                        </div>
                                        <div class="col-md-4 col-md-4 col-sm-12 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/telegram.svg')); ?>" width="75" class="ml-2">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('user.telegram',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id">
                                                <div class="form-group mt-3">
                                                    <button type="button" class="btn btn-thm btn-block" id="owner-telegram"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    <!-- Add money using Stripe -->
                        <?php if(isset($store_payments['is_stripe_enabled']) && $store_payments['is_stripe_enabled'] == 'on'): ?>
                            <form role="form" action="<?php echo e(route('stripe.post',$store->slug)); ?>" method="post" class="require-validation" id="payment-form">
                                <?php echo csrf_field(); ?>
                                <div class="card">
                                    <div class="box-space">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Stripe')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-12">
                                                <p class="text-muted mt-2 mb-0 text-12"><?php echo e(__('Safe money transfer using your bank account. We support Mastercard, Visa, Maestro and Skrill.')); ?></p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 text-right">
                                                <img alt="Image placeholder" src="<?php echo e(asset('assets/theme1/img/mastercard.png')); ?>" width="40" class="mr-2">
                                                <img alt="Image placeholder" src="<?php echo e(asset('assets/theme1/img/visa.png')); ?>" width="40" class="mr-2">
                                                <img alt="Image placeholder" src="<?php echo e(asset('assets/theme1/img/skrill.png')); ?>" width="40">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="card-name-on" class="form-control-label t-gray font-600"><?php echo e(__('Name on card')); ?></label>
                                                    <input type="text" name="name" id="card-name-on" class="form-control required" placeholder="Enter Your Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="card-element"></div>
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <div class="col-md-10">
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert text_sm'><?php echo e(__('Please correct the errors and try again.')); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 text-right pr-0">
                                            <div class="form-group">
                                                <input type="hidden" name="plan_id">
                                                <button class="btn btn-thm btn-block" type="submit">
                                                    <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>

                    <!-- Add money using PayPal -->
                        <?php if(isset($store_payments['is_paypal_enabled']) && $store_payments['is_paypal_enabled'] == 'on'): ?>
                            <div class="card">
                                <div class="box-space">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(('Paypal')); ?></label>
                                            <p class="text-muted mt-2 mb-0 text-12"><?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to PayPal to finish complete your purchase.')); ?></p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/theme1/img/paypa.png')); ?>" width="100" class="ml-2">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('pay.with.paypal',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id">
                                                <div class="form-group mt-3">
                                                    <button class="btn btn-thm btn-block" type="submit">
                                                        <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                    </button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    <!-- Add money using whatsapp -->
                        <?php if($store['enable_whatsapp'] == 'on'): ?>
                            <div class="card">
                                <div class="box-space">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <label class="h6 mb-0 lh-180" for="radio-payment-whatsapp"><?php echo e(__('WhatsApp')); ?></label>
                                            <p class="text-muted mt-2 mb-0 text-12"><?php echo e(__('Click to chat. The click to chat feature lets customers click an URL in order to directly start a chat with another person or business via WhatsApp. ... QR code. As you know, having to add a phone number to
                                                your contacts in order to start up a WhatsApp message can take a little while')); ?>.....</p>
                                        </div>
                                        <div class="col-md-4 col-md-4 col-sm-12 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/whatsapp.png')); ?>" width="75" class="ml-2">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('user.whatsapp',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id">
                                                <div class="form-group mt-3">
                                                    <button type="button" class="btn btn-thm btn-block" id="owner-whatsapp"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-space pt-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label t-gray font-600"><?php echo e(__('Phone Number')); ?></label>
                                                <input class="form-control input-primary" name="wts_number" id="wts_number" type="text" placeholder="Enter Your Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    <!-- Add money using Bank Transfer -->
                        <?php if($store['enable_bank'] == 'on'): ?>
                            <div class="card">
                                <div class="box-space">
                                    <div class="row">

                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <p class="white_space text_sm"><?php echo e($store->bank_number); ?></p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/bank.png')); ?>" width="70">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('user.bank_transfer',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id">
                                                <div class="form-group mt-3">
                                                    <button type="button" class="btn btn-thm btn-block" id="bank_transfer"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    <!-- Add money using Paystack -->
                        <?php if(isset($store_payments['is_paystack_enabled']) && $store_payments['is_paystack_enabled']=='on'): ?>
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                            <script src="https://checkout.paystack.com/service-worker.js"></script>
                            
                            <script>
                                function payWithPaystack() {
                                    var paystack_callback = "<?php echo e(url('/paystack')); ?>";
                                    var order_id = '<?php echo e($order_id = time()); ?>';
                                    var slug = '<?php echo e($store->slug); ?>';
                                    var handler = PaystackPop.setup({
                                        key: '<?php echo e($store_payments['paystack_public_key']); ?>',
                                        email: '<?php echo e($cust_details['email']); ?>',
                                        amount: $('.total_price').data('value') * 100,
                                        currency: '<?php echo e($store['currency_code']); ?>',
                                        ref: 'pay_ref_id' + Math.floor((Math.random() * 1000000000) +
                                            1
                                        ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                        metadata: {
                                            custom_fields: [{
                                                display_name: "Mobile Number",
                                                variable_name: "mobile_number",
                                                value: "<?php echo e($cust_details['phone']); ?>"
                                            }]
                                        },

                                        callback: function (response) {
                                            console.log(response.reference, order_id);
                                            window.location.href = paystack_callback + '/' + slug + '/' + response.reference + '/' + <?php echo e($order_id); ?>;
                                        },
                                        onClose: function () {
                                            alert('window closed');
                                        }
                                    });
                                    handler.openIframe();
                                }

                            </script>
                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Paystack')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Paystack to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/paystack-logo.jpg')); ?>" width="110">
                                            <input type="hidden" name="product_id">
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button class="btn btn-thm btn-block" type="button" onclick="payWithPaystack()">
                                                        <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($store_payments['is_flutterwave_enabled']) && $store_payments['is_flutterwave_enabled']=='on'): ?>

                            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                            
                            <script>

                                function payWithRave() {
                                    var API_publicKey = '<?php echo e($store_payments['flutterwave_public_key']); ?>';
                                    var nowTim = "<?php echo e(date('d-m-Y-h-i-a')); ?>";
                                    var order_id = '<?php echo e($order_id = time()); ?>';
                                    var flutter_callback = "<?php echo e(url('/flutterwave')); ?>";
                                    var x = getpaidSetup({
                                        PBFPubKey: API_publicKey,
                                        customer_email: '<?php echo e($cust_details['email']); ?>',
                                        amount: $('.total_price').data('value'),
                                        customer_phone: '<?php echo e($cust_details['phone']); ?>',
                                        currency: '<?php echo e($store['currency_code']); ?>',
                                        txref: nowTim + '__' + Math.floor((Math.random() * 1000000000)) + 'fluttpay_online-' +
                                        <?php echo e(date('Y-m-d')); ?>,
                                        meta: [{
                                            metaname: "payment_id",
                                            metavalue: "id"
                                        }],
                                        onclose: function () {
                                        },
                                        callback: function (response) {

                                            var txref = response.tx.txRef;

                                            if (
                                                response.tx.chargeResponseCode == "00" ||
                                                response.tx.chargeResponseCode == "0"
                                            ) {
                                                window.location.href = flutter_callback + '/<?php echo e($store->slug); ?>/' + txref + '/' + <?php echo e($order_id); ?>;
                                            } else {
                                                // redirect to a failure page.
                                            }
                                            x.close(); // use this to close the modal immediately after payment.
                                        }
                                    });
                                }
                            </script>
                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Flutterwave')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Flutterwave to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/flutterwave_logo.png')); ?>" width="110">
                                            <input type="hidden" name="product_id">
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button class="btn btn-thm btn-block" type="button" onclick="payWithRave()">
                                                        <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if(isset($store_payments['is_razorpay_enabled']) && $store_payments['is_razorpay_enabled'] == 'on'): ?>
                            <?php
                                $logo         =asset(Storage::url('uploads/logo/'));
                                $company_logo =\App\Models\Utility::getValByName('company_logo');
                            ?>
                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                            
                            <script>

                                function payRazorPay() {
                                    var getAmount = $('.total_price').data('value');
                                    var order_id = '<?php echo e($order_id = time()); ?>';
                                    var product_id = '<?php echo e($order_id); ?>';
                                    var useremail = '<?php echo e($cust_details['email']); ?>';
                                    var razorPay_callback = '<?php echo e(url('razorpay')); ?>';
                                    var totalAmount = getAmount * 100;
                                    var product_array = '<?php echo e($encode_product); ?>';
                                    var product = JSON.parse(product_array.replace(/&quot;/g, '"'));


                                    var coupon_id = $('.hidden_coupon').attr('data_id');
                                    var dicount_price = $('.dicount_price').html();

                                    var options = {
                                        "key": "<?php echo e($store_payments['razorpay_public_key']); ?>", // your Razorpay Key Id
                                        "amount": totalAmount,
                                        "name": product,
                                        "currency": '<?php echo e($store['currency_code']); ?>',
                                        "description": "Order Id : " + order_id,
                                        "image": "<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo-dark.png')); ?>",
                                        "handler": function (response) {
                                            window.location.href = razorPay_callback + '/<?php echo e($store->slug); ?>/' + response.razorpay_payment_id + '/' + order_id;
                                        },
                                        "theme": {
                                            "color": "#528FF0"
                                        }
                                    };

                                    var rzp1 = new Razorpay(options);
                                    rzp1.open();
                                }
                            </script>
                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Razorpay')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Razorpay to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/razorpay.png')); ?>" width="110">
                                            <input type="hidden" name="product_id">
                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button class="btn btn-thm btn-block" type="button" onclick="payRazorPay()">
                                                        <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if(isset($store_payments['is_paytm_enabled']) && $store_payments['is_paytm_enabled'] == 'on'): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Paytm')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Paytm to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/Paytm.png')); ?>" width="110">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('paytm.prepare.payments',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e(date('Y-m-d')); ?>-<?php echo e(strtotime(date('Y-m-d H:i:s'))); ?>-payatm">
                                                <input type="hidden" name="order_id" value="<?php echo e(str_pad(!empty($order->id) ? $order->id + 1 : 0 + 1, 4, "100", STR_PAD_LEFT)); ?>">
                                                <?php
                                                    $skrill_data = [
                                                        'transaction_id' => md5(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'),
                                                        'user_id' => 'user_id',
                                                        'amount' => 'amount',
                                                        'currency' => 'currency',
                                                    ];
                                                    session()->put('skrill_data', $skrill_data);
                                                ?>
                                                <div class="form-group mt-3">
                                                    <div class="text-sm-right ">
                                                        <button type="submit" class="btn btn-thm btn-block"><?php echo e(__('Pay Now')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if(isset($store_payments['is_mercado_enabled']) && $store_payments['is_mercado_enabled'] == 'on'): ?>
                            <script>
                                function payMercado() {

                                    var product_array = '<?php echo e($encode_product); ?>';
                                    var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
                                    var order_id = '<?php echo e($order_id = time()); ?>';

                                    var total_price = $('#Subtotal .total_price').attr('data-value');
                                    var coupon_id = $('.hidden_coupon').attr('data_id');
                                    var dicount_price = $('.dicount_price').html();

                                    var data = {
                                        coupon_id: coupon_id,
                                        dicount_price: dicount_price,
                                        total_price: total_price,
                                        product: product,
                                        order_id: order_id,
                                    }
                                    $.ajax({
                                        url: '<?php echo e(route('mercadopago.prepare',$store->slug)); ?>',
                                        method: 'POST',
                                        data: data,
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function (data) {
                                            if (data.status == 'success') {
                                                window.location.href = data.url;
                                            } else {
                                                show_toastr("Error", data.success, data["status"]);
                                            }
                                        }
                                    });
                                }
                            </script>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Mercado Pago')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/mercadopago.png')); ?>" width="110">

                                            <div class="form-group mt-3">
                                                <div class="text-sm-right ">
                                                    <button type="button" class="btn btn-thm btn-block" onclick="payMercado()"><?php echo e(__('Pay Now')); ?></button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if(isset($store_payments['is_mollie_enabled']) && $store_payments['is_mollie_enabled'] == 'on'): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Mercado Pago')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/mollie.png')); ?>" width="100">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('mollie.prepare.payments',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e(date('Y-m-d')); ?>-<?php echo e(strtotime(date('Y-m-d H:i:s'))); ?>-payatm">
                                                <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                                <div class="form-group mt-3">
                                                    <div class="text-sm-right ">
                                                        <button type="submit" class="btn btn-thm btn-block"><?php echo e(__('Pay Now')); ?></button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($store_payments['is_skrill_enabled']) && $store_payments['is_skrill_enabled'] == 'on'): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('Skrill')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/skrill.png')); ?>" width="100">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('skrill.prepare.payments',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="transaction_id" value="<?php echo e(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'); ?>">
                                                <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                                <div class="form-group mt-3">
                                                    <div class="text-sm-right ">
                                                        <button type="submit" class="btn btn-thm btn-block"><?php echo e(__('Pay Now')); ?></button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($store_payments['is_coingate_enabled']) && $store_payments['is_coingate_enabled'] == 'on'): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('CoinGate')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to Mercado Pago to finish complete your purchase')); ?>.
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/coingate.png')); ?>" width="100">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('coingate.prepare',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="transaction_id" value="<?php echo e(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'); ?>">
                                                <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                                <div class="form-group mt-3">
                                                    <div class="text-sm-right ">
                                                        <button type="submit" class="btn btn-thm btn-block"><?php echo e(__('Pay Now')); ?></button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($store_payments['is_paymentwall_enabled']) && $store_payments['is_paymentwall_enabled'] == 'on'): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-md-8">
                                            <div>
                                                <label class="h6 mb-0 lh-180" for="radio-payment-paypal"><?php echo e(__('PaymentWall')); ?></label>
                                            </div>
                                            <p class="text_sm text-muted mt-2 mb-0">
                                                <?php echo e(__('Pay your order using the most known and secure platform for online money transfers. You will be redirected to PaymentWall to finish complete your purchase')); ?>.
                                            </p>
                                        </div>

                                        <div class="col-12 col-lg-4 col-md-4 text-right">
                                            <img alt="Image placeholder" src="<?php echo e(asset('assets/img/Paymentwall.png')); ?>" width="50%">
                                            <form class="w3-container w3-display-middle w3-card-4" method="POST" action="<?php echo e(route('paymentwall.session.store',$store->slug)); ?>">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="transaction_id" value="<?php echo e(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'); ?>">
                                                <input type="hidden" name="desc" value="<?php echo e(time()); ?>">
                                                <div class="form-group mt-3">
                                                    <div class="text-sm-right ">
                                                        <button type="submit" class="btn btn-thm btn-block"><?php echo e(__('Pay Now')); ?></button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    

                    <div class="order_sidebar_widget mb30">
                        <h4 class="title"><?php echo e(__('Summary')); ?> (<?php echo e($total_item); ?> items)</h4>


                        <?php if(!empty($products)): ?>
                            <?php
                                $total = 0;
                                $sub_tax = 0;
                                $sub_total = 0;
                            ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($product['variant_id']) && !empty($product['variant_id'])): ?>
                                    <div class="row mb-2 pb-2 delimiter-bottom">
                                        <div class="col-8">
                                            <div class="media align-items-center">
                                                <?php if(!empty($product['image'])): ?>
                                                    <img alt="Image placeholder" src="<?php echo e(asset($product['image'])); ?>"
                                                        class="" style="width:66px;">
                                                <?php else: ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        class="" style="width:66px;">
                                                <?php endif; ?>
                                                <div class="media-body">
                                                    <div class="sum-title lh-100">
                                                        <small
                                                            class="font-weight-bold mb-0"><?php echo e($product['product_name'] . ' - ( ' . $product['variant_name'] . ' ) '); ?></small>
                                                    </div>
                                                    <?php
                                                        $total_tax = 0;
                                                    ?>
                                                    <small class="text-muted s-dim">
                                                        <?php echo e($product['quantity']); ?> x
                                                        <?php echo e(\App\Models\Utility::priceFormat($product['variant_price'])); ?>

                                                        <?php if(!empty($product['tax'])): ?>
                                                            +
                                                            <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                    $total_tax += $sub_tax;
                                                                ?>

                                                                <?php echo e(\App\Models\Utility::priceFormat($sub_tax) . ' (' . $tax['tax_name'] . ' ' . $tax['tax'] . '%)'); ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 text-right lh-100">
                                            <small class="text-dark"><?php echo e(__('Price')); ?></small>
                                            <p class="text-dark s-rate t-black15">
                                                <?php
                                                    $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                    $subtotal = $product['variant_price'] * $product['quantity'];
                                                    $sub_total += $subtotal;
                                                ?>
                                                <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                            </p>
                                            <?php
                                                $total += $totalprice;
                                            ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row mb-2 pb-2 delimiter-bottom">
                                        <div class="col-8">
                                            <div class="d-flex align-items-center">
                                                <?php if(!empty($product['image'])): ?>
                                                    <img alt="Image placeholder" src="<?php echo e(asset($product['image'])); ?>"
                                                        class="" style="width:66px;">
                                                <?php else: ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                                        class="" style="width:66px;">
                                                <?php endif; ?>
                                                <div class="media-body">
                                                    <div class="sum-title lh-100">
                                                        <small
                                                            class="font-weight-bold mb-0"><?php echo e($product['product_name']); ?></small>
                                                    </div>
                                                    <?php
                                                        $total_tax = 0;
                                                    ?>
                                                    <small class="text-muted s-dim">
                                                        <?php echo e($product['quantity']); ?> x
                                                        <?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?>

                                                        <?php if(!empty($product['tax'])): ?>
                                                            +
                                                            <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                    $total_tax += $sub_tax;
                                                                ?>

                                                                <?php echo e(\App\Models\Utility::priceFormat($sub_tax) . ' (' . $tax['tax_name'] . ' ' . $tax['tax'] . '%)'); ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 text-right lh-100" style="text-align: right">
                                            <small class="text-dark"><?php echo e(__('Price')); ?></small>
                                            <p class="text-dark s-rate t-black15">
                                                <?php
                                                    $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                    $subtotal = $product['price'] * $product['quantity'];
                                                    $sub_total += $subtotal;
                                                ?>
                                                <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                            </p>
                                            <?php
                                                $total += $totalprice;
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <ul>
                            <li class="subtitle">
                                <p><?php echo e(__('Subtotal (Before Tax)')); ?> <span
                                        class="float-end totals"><?php echo e(\App\Models\Utility::priceFormat(!empty($sub_total) ? $sub_total : 0)); ?></span>
                                </p>

                            </li>
                            <?php $__currentLoopData = $taxArr['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="subtitle">
                                    <p><?php echo e($tax); ?>

                                        <span
                                            class="float-end totals"><?php echo e(\App\Models\Utility::priceFormat($taxArr['rate'][$k])); ?></span>
                                    </p>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <li class="subtitle">
                                <p><?php echo e(__('Coupon')); ?> <span
                                        class="float-end totals"><?php echo e(\App\Models\Utility::priceFormat(0)); ?></span></p>
                            </li>
                            <!-- Shipping -->
                            <?php if($store->enable_shipping == 'on'): ?>
                                <li class="subtitle shipping_price_add" style="display: none">
                                    <p><?php echo e(__('Shipping Price')); ?> <span class="float-end shipping_price totals"
                                            data-value="">$9,218.00</span></p>
                                </li>


                                <li class="subtitle">
                                    <input type="hidden" class="product_total" value="<?php echo e($total); ?>">
                                    <input type="hidden" class="total_pay_price"
                                        value="<?php echo e(App\Models\Utility::priceFormat($total)); ?>">
                                    <p><?php echo e(__('Total')); ?>

                                        <span class="float-end totals pro_total_price"
                                            data-original="<?php echo e(\App\Models\Utility::priceFormat(!empty($total) ? $total : 0)); ?>">
                                            <?php echo e(\App\Models\Utility::priceFormat(!empty($total) ? $total : '0')); ?></span>
                                    </p>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>
    <?php if(isset($store_payments['is_stripe_enabled']) && $store_payments['is_stripe_enabled'] == 'on'): ?>
        <script src="https://js.stripe.com/v3/"></script>
        <script type="text/javascript">
            var stripe = Stripe('<?php echo e(isset($store_payments['stripe_key']) ? $store_payments['stripe_key'] : ''); ?>');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '14px',
                    color: '#32325d',
                },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $("#card-errors").html(result.error.message);
                        show_toastr('Error', result.error.message, 'error');
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        </script>
    <?php endif; ?>
    <script>
        $(document).on('click', '#owner-whatsapp', function() {
            var product_array = '<?php echo e($encode_product); ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';
            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();

            var data = {
                type: 'whatsapp',
                coupon_id: coupon_id,
                dicount_price: dicount_price,
                total_price: total_price,
                product: product,
                order_id: order_id,
                wts_number: $('#wts_number').val()
            }
            getWhatsappUrl(dicount_price, total_price, coupon_id, data);

            $.ajax({
                url: '<?php echo e(route('user.whatsapp', $store->slug)); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {

                        removesession();
                        show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);

                        setTimeout(function() {
                            var get_url_msg_url = $('#return_url').val();
                            var append_href = get_url_msg_url +
                                '<?php echo e(route('user.order', [$store->slug, Crypt::encrypt(!empty($order->id) ? $order->id + 1 : 0 + 1)])); ?>';
                            window.open(append_href, '_blank');
                        }, 1000);

                        setTimeout(function() {
                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);

                            window.location.href = url;
                        }, 1000);

                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }

                }
            });

        });
        $(document).on('click', '#owner-telegram', function() {
            var product_array = '<?php echo e($encode_product); ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';
            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();


            var data = {
                type: 'telegram',
                coupon_id: coupon_id,
                dicount_price: dicount_price,
                total_price: total_price,
                product: product,
                order_id: order_id,
            }

            getWhatsappUrl(dicount_price, total_price, coupon_id, data);

            $.ajax({
                url: '<?php echo e(route('user.telegram', $store->slug)); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {

                        show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);

                        setTimeout(function() {

                            removesession();

                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);

                            window.location.href = url;
                        }, 1000);

                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        });
        $(document).on('click', '#cash_on_delivery', function() {
            var product_array = '<?php echo e($encode_product); ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';

            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();

            var data = {
                coupon_id: coupon_id,
                dicount_price: dicount_price,
                total_price: total_price,
                product: product,
                order_id: order_id,
            }

            $.ajax({
                url: '<?php echo e(route('user.cod', $store->slug)); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {
                        show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);

                        setTimeout(function() {
                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);
                            window.location.href = url;
                        }, 1000);
                        removesession();
                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        });
        $(document).on('click', '#bank_transfer', function() {
            var product_array = '<?php echo e($encode_product); ?>';
            var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
            var order_id = '<?php echo e($order_id = time()); ?>';
            var total_price = $('#Subtotal .total_price').attr('data-value');
            var coupon_id = $('.hidden_coupon').attr('data_id');
            var dicount_price = $('.dicount_price').html();

            var data = {
                coupon_id: coupon_id,
                dicount_price: dicount_price,
                total_price: total_price,
                product: product,
                order_id: order_id,
            }
            $.ajax({
                url: '<?php echo e(route('user.bank_transfer', $store->slug)); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {

                        removesession();

                        show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);
                        setTimeout(function() {
                            var url =
                                '<?php echo e(route('store-complete.complete', [$store->slug, ':id'])); ?>';
                            url = url.replace(':id', data.order_id);
                            window.location.href = url;
                        }, 1000);
                    } else {
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        });
    </script>
    <script>
        // Apply Coupon
        $(document).on('click', '.apply-coupon', function(e) {
            e.preventDefault();

            var ele = $(this);
            var coupon = ele.closest('.row').find('.coupon').val();
            var hidden_field = $('.hidden_coupon').val();
            var price = $('#card-summary .product_total').val();
            var shipping_price = $('#card-summary .shipping_price').attr('data-value');

            if (coupon == hidden_field) {
                show_toastr('Error', 'Coupon Already Used', 'error');
            } else {
                if (coupon != '') {
                    $.ajax({
                        url: '<?php echo e(route('apply.productcoupon')); ?>',
                        datType: 'json',
                        data: {
                            price: price,
                            shipping_price: shipping_price,
                            store_id: <?php echo e($store->id); ?>,
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
                                    '<span class="text-sm font-weight-bold total_price" data-value="' +
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
                    show_toastr('Error', '<?php echo e(__('Invalid Coupon Code.')); ?>', 'error');
                }
            }

        });

        //for create/get Whatsapp Url
        function getWhatsappUrl(coupon = '', finalprice = '', coupon_id = '', data = '') {
            $.ajax({
                url: '<?php echo e(route('get.whatsappurl', $store->slug)); ?>',
                method: 'post',
                data: {
                    dicount_price: coupon,
                    finalprice: finalprice,
                    coupon_id: coupon_id,
                    data: data
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#return_url').val(data.url);
                        $('#return_order_id').val(data.order_id);

                    } else {
                        $('#return_url').val('')
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        }

        //for create/get Telegram Url
        function getTelegramUrl(coupon = '', finalprice = '', coupon_id = '', data = '') {
            $.ajax({
                url: '<?php echo e(route('get.whatsappurl', $store->slug)); ?>',
                method: 'post',
                data: {
                    dicount_price: coupon,
                    finalprice: finalprice,
                    coupon_id: coupon_id,
                    data: data
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#return_url').val(data.url);
                        $('#return_order_id').val(data.order_id);

                    } else {
                        $('#return_url').val('')
                        show_toastr("Error", data.success, data["status"]);
                    }
                }
            });
        }

        function removesession(slug) {
            $.ajax({
                url: '<?php echo e(route('remove.session', $store->slug)); ?>',
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme12/payment.blade.php ENDPATH**/ ?>