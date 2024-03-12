<?php
    $dir = asset(Storage::url('uploads/plan'));
    $defaultDuration = 0;
    
?>
<?php $__env->startPush('script-page'); ?>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var type = window.location.hash.substr(1);
        $('.list-group-item').removeClass('active');
        $('.list-group-item').removeClass('text-primary');
        if (type != '') {
            $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
        } else {
            $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
        }

        $(document).on('click', '.list-group-item', function() {
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('text-primary');
            setTimeout(() => {
                $(this).addClass('active').removeClass('text-primary');
            }, 10);
        });

        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>

    <script type="text/javascript">
        <?php if(
            $storage_plan->price > 0.0 &&
                isset($admin_payments_details['is_stripe_enabled']) &&
                $admin_payments_details['is_stripe_enabled'] == 'on'): ?>
            var stripe = Stripe('<?php echo e($admin_payments_details['stripe_key']); ?>');
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
                        Swal.fire({
                            title: "<?php echo e(__('Agreement')); ?>",
                            html: jsLang.agreementText1,
                            showDenyButton: true,
                            confirmButtonText: "<?php echo e(__('Agree')); ?>",
                            denyButtonText: "<?php echo e(__('Deny')); ?>",
                        }).then((ok) => {
                            if (ok.isConfirmed) {
                                // Send the token to your server.
                                stripeTokenHandler(result.token);
                            }
                           
                        });

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

                // Submit the form
                form.submit();
            }
        <?php endif; ?>
        function preparePayment(ele, payment) {
            var coupon = $(ele).closest('.row').find('.coupon').val();
            var amount = 0;

            Swal.fire({
                title: "<?php echo e(__('Agreement')); ?>",
                html: jsLang.agreementText1,
                showDenyButton: true,
                // showCancelButton: true,
                confirmButtonText: "<?php echo e(__('Agree')); ?>",
                denyButtonText: "<?php echo e(__('Deny')); ?>",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?php echo e(route('plan.prepare.amount')); ?>',
                        datType: 'json',
                        data: {
                            storage_id: '<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>',
                            coupon: coupon
                        },
                        success: function(data) {

                            if (data.is_success == true) {
                                amount = data.price;
                                $('#coupon_use_id').val(data.coupon_id);
                                if (payment == 'paystack') {
                                    payWithPaystack(amount);
                                }
                                if (payment == 'flutterwave') {
                                    payWithRave(amount);
                                }
                                if (payment == 'razorpay') {
                                    payRazorPay(amount);
                                }
                                if (payment == 'mercado') {
                                    payMercado(amount);
                                }
                            } else {
                                show_toastr('Error', 'Paymenent request failed', 'error');
                            }

                        }
                    })
                }

            });




        }
        <?php if(isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on'): ?>
            function payWithPaystack(amount) {
                var coupon_id = $('#coupon_use_id').val();
                var paystack_callback = "<?php echo e(url('/paystack-plan')); ?>";
                var handler = PaystackPop.setup({
                    key: '<?php echo e($admin_payments_details['paystack_public_key']); ?>',
                    email: '<?php echo e(Auth::user()->email); ?>',
                    amount: amount * 100,
                    currency: '<?php echo e(env('CURRENCY')); ?>',
                    ref: 'pay_ref_id' + Math.floor((Math.random() * 1000000000) +
                        1
                    ),
                    // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    metadata: {
                        custom_fields: [{
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                        }]
                    },

                    callback: function(response) {
                        
                        window.location.href = paystack_callback + '/' + response.reference + '/' +
                            '<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>?coupon_id=' +
                            coupon_id;
                    },
                    onClose: function() {
                        alert('window closed');
                    }
                });
                handler.openIframe();
            }
        <?php endif; ?>
        <?php if(isset($admin_payments_details['is_flutterwave_enabled']) &&
                $admin_payments_details['is_flutterwave_enabled'] == 'on'): ?>
            

            function payWithRave(amount) {
                var coupon_id = $('#coupon_use_id').val();
                var API_publicKey = '<?php echo e($admin_payments_details['flutterwave_public_key']); ?>';
                var nowTim = "<?php echo e(date('d-m-Y-h-i-a')); ?>";
                var flutter_callback = "<?php echo e(url('/flutterwave-plan')); ?>";
                var x = getpaidSetup({
                    PBFPubKey: API_publicKey,
                    customer_email: '<?php echo e(Auth::user()->email); ?>',
                    amount: amount,
                    currency: '<?php echo e(env('CURRENCY')); ?>',
                    txref: nowTim + '__' + Math.floor((Math.random() * 1000000000)) + 'fluttpay_online-' +
                        <?php echo e(date('Y-m-d')); ?>,
                    meta: [{
                        metaname: "payment_id",
                        metavalue: "id"
                    }],
                    onclose: function() {},
                    callback: function(response) {

                        var txref = response.tx.txRef;

                        if (
                            response.tx.chargeResponseCode == "00" ||
                            response.tx.chargeResponseCode == "0"
                        ) {
                            window.location.href = flutter_callback + '/' + txref + '/' +
                                '<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>?coupon_id=' +
                                coupon_id;
                        } else {
                            // redirect to a failure page.
                        }
                        x.close(); // use this to close the modal immediately after payment.
                    }
                });
            }
        <?php endif; ?>
        <?php if(isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on'): ?>
            
            <?php
                $logo = asset(Storage::url('uploads/logo/'));
                $company_logo = \App\Models\Utility::getValByName('company_logo');
            ?>

            function payRazorPay(amount) {
                var razorPay_callback = '<?php echo e(url('razorpay-plan')); ?>';
                var totalAmount = amount * 100;
                var coupon_id = $('#coupon_use_id').val();
                var options = {
                    "key": "<?php echo e($admin_payments_details['razorpay_public_key']); ?>", // your Razorpay Key Id
                    "amount": totalAmount,
                    "name": 'Plan',
                    "currency": '<?php echo e(env('CURRENCY')); ?>',
                    "description": "",
                    "image": "<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>",
                    "handler": function(response) {
                        window.location.href = razorPay_callback + '/' + response.razorpay_payment_id + '/' +
                            '<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>?coupon_id=' +
                            coupon_id;
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        <?php endif; ?>
        <?php if(isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on'): ?>
            

            function payMercado(amount) {
                var coupon_id = $('#coupon_use_id').val();
                var data = {
                    coupon_id: coupon_id,
                    total_price: amount,
                    plan: <?php echo e($storage_plan->id); ?>,
                }
                console.log(data);
                $.ajax({
                    url: '<?php echo e(route('mercadopago.prepare.plan')); ?>',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            window.location.href = data.url;
                        } else {
                            show_toastr("Error", data.error, data["status"]);
                        }
                    }
                });
            }
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php
    $dir = asset(Storage::url('uploads/plan'));
    $dir_payment = asset(Storage::url('uploads/payments'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order Summary')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Order Summary')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('plans.index')); ?>"><?php echo e(__('Plan')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Order Summary')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            
            
            <div class="row">
                <div class="col-xl-4">
                    <div class="sticky-top" style="top:30px">
                        <div>
                            <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                                style="
                                                                        visibility: visible;
                                                                        animation-delay: 0.2s;
                                                                        animation-name: fadeInUp;
                                                                      ">
                                <div class="card-body">
                                    <span class="price-badge bg-primary">
                                        <?php echo e($storage_plan->name); ?>

                                    </span>
                                    <?php if(\Auth::user()->type == 'Owner' && \Auth::user()->plan == $storage_plan->id): ?>
                                        <div class="d-flex flex-row-reverse m-0 p-0 ">
                                            <span class="d-flex align-items-center ">
                                                <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                                <span class="ms-2"><?php echo e(__('Active')); ?></span>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="text-end">
                                        <div class="mb-3">
                                            <?php if(\Auth::user()->type == 'super admin'): ?>
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="#"
                                                        data-url="<?php echo e(route('storage_plans.edit', $storage_plan->id)); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Plan')); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Edit ')); ?>"><i
                                                            class="fas fa-edit text-white"></i></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <h6 class="f-w-600">
                                        <?php echo e($storage_plan->price); ?><?php echo e(env('CURRENCY_SYMBOL')); ?>

                                        
                                    </h6>
                                    <h6 class="f-w-600">
                                        <?php echo e(__('Duration')); ?> / <?php echo e(env('STORAGE_PLAN_DURATION')); ?> <?php echo e(__('Months')); ?>

                                    </h6>

                                    <?php if($credits && $storage_plan->price): ?>
                                        <h4 class="mb-4 f-w-600">
                                            <?php echo e(__('Credits')); ?> / <?php echo e($credits); ?><?php echo e(env('CURRENCY_SYMBOL')); ?>

                                            <small>
                                                <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="<?php echo e(__('You save this amount from your previous storage plan')); ?>"></i>
                                            </small>
                                        </h4>
                                    <?php endif; ?>

                                    <h4><?php echo e(__('Total Amount (+19% VAT)')); ?></h4>
                                    <?php
                                        $priceWithTax = App\Models\StoragePlan::priceWithTax($storage_plan->price);
                                    ?>
                                    <h5> <?php echo e($priceWithTax['pretty_with_tax']); ?></h5>


                                    <?php if($storage_plan->description): ?>
                                        <p class="mb-0">
                                            <?php echo e($storage_plan->description); ?><br />
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="list-group list-group-flush" id="useradd-sidenav">
                                <?php if(isset($admin_payments_details['is_stripe_enabled']) && $admin_payments_details['is_stripe_enabled'] == 'on'): ?>
                                    <a href="#stripe_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Stripe')); ?>

                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_paypal_enabled']) && $admin_payments_details['is_paypal_enabled'] == 'on'): ?>
                                    <a href="#paypal_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Paypal')); ?>

                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on'): ?>
                                    <a href="#paystack_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Paystack')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                <?php endif; ?>


                                <?php if(isset($admin_payments_details['is_flutterwave_enabled']) &&
                                        $admin_payments_details['is_flutterwave_enabled'] == 'on'): ?>
                                    <a href="#flutterwave_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Flutterwave')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on'): ?>
                                    <a href="#razorpay_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Razorpay')); ?> <div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on'): ?>
                                    <a href="#mercado_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Mercado Pago')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_paytm_enabled']) && $admin_payments_details['is_paytm_enabled'] == 'on'): ?>
                                    <a href="#paytm_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Paytm')); ?>

                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_mollie_enabled']) && $admin_payments_details['is_mollie_enabled'] == 'on'): ?>
                                    <a href="#mollie_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Mollie')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_skrill_enabled']) && $admin_payments_details['is_skrill_enabled'] == 'on'): ?>
                                    <a href="#skrill_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Skrill')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_coingate_enabled']) && $admin_payments_details['is_coingate_enabled'] == 'on'): ?>
                                    <a href="#coingate_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Coingate')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>

                                <?php if(isset($admin_payments_details['is_paymentwall_enabled']) &&
                                        $admin_payments_details['is_paymentwall_enabled'] == 'on'): ?>
                                    <a href="#paymentwall_payment"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Paymentwall')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 payment-btn">
                    <?php if(isset($admin_payments_details['is_stripe_enabled']) && $admin_payments_details['is_stripe_enabled'] == 'on'): ?>
                        
                        <div id="stripe_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Stripe')); ?></h5>
                            </div>
                            
                            <?php if(
                                $admin_payments_details['is_stripe_enabled'] == 'on' &&
                                    !empty($admin_payments_details['stripe_key']) &&
                                    !empty($admin_payments_details['stripe_secret'])): ?>
                                <div class="tab-pane <?php echo e(($admin_payments_details['is_stripe_enabled'] == 'on' && !empty($admin_payments_details['stripe_key']) && !empty($admin_payments_details['stripe_secret'])) == 'on' ? 'active' : ''); ?>"
                                    id="stripe_payment">
                                    <form role="form" action="<?php echo e(route('stripe.pay')); ?>" method="post"
                                        class="require-validation" id="payment-form">
                                        <?php echo csrf_field(); ?>

                                        <div class="border p-3 rounded stripe-payment-div">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="custom-radio">
                                                        <label
                                                            class="font-16 font-weight-bold"><?php echo e(__('Credit / Debit Card')); ?></label>
                                                    </div>
                                                    <p class="mb-0 pt-1 text-sm">
                                                        <?php echo e(__('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and American express.')); ?>

                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="card-name-on"
                                                            class="form-label text-dark"><?php echo e(__('Name on card')); ?></label>
                                                        <input type="text" name="name" id="card-name-on"
                                                            class="form-control required"
                                                            placeholder="<?php echo e(\Auth::user()->name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div id="card-element">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>
                                                    <div id="card-errors" role="alert"></div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-group w-100">
                                                            <label for="paypal_coupon"
                                                                class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                            <input type="text" id="stripe_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                        </div>
                                                        <div class="form-group ms-3 mt-4">
                                                            <a href="#" class="text-muted apply-coupon"
                                                                data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                                    class="fas fa-save"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="error" style="display: none;">
                                                        <div class='alert-danger alert'>
                                                            <?php echo e(__('Please correct the errors and try again.')); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                
                                                <input type="hidden" name="storage_id"
                                                    value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">
                                                <input type="submit" value="<?php echo e(__('Continue')); ?>"
                                                    class="btn btn-xs btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>
                    <?php if(isset($admin_payments_details['is_paypal_enabled']) && $admin_payments_details['is_paypal_enabled'] == 'on'): ?>
                        
                        <div id="paypal_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Paypal')); ?></h5>
                            </div>
                            
                            <?php if(
                                $admin_payments_details['is_paypal_enabled'] == 'on' &&
                                    !empty($admin_payments_details['paypal_client_id']) &&
                                    !empty($admin_payments_details['paypal_secret_key'])): ?>
                                <div class="tab-pane <?php echo e(($admin_payments_details['is_stripe_enabled'] != 'on' && $admin_payments_details['is_paypal_enabled'] == 'on' && !empty($admin_payments_details['paypal_client_id']) && !empty($admin_payments_details['paypal_secret_key'])) == 'on' ? 'active' : ''); ?>"
                                    id="paypal_payment">
                                    
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('storage.plan.pay.with.paypal')); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">

                                        <div class="border p-3 mb-3 rounded">
                                            <div class="row">
                                                <div class="col-md-12 mt-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-group w-100">
                                                            <label for="paypal_coupon"
                                                                class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                            <input type="text" id="paypal_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                        </div>

                                                        <div class="form-group ms-3 mt-4">
                                                            <a href="#" class="text-muted apply-coupon"
                                                                data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                                    class="fas fa-save"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <input type="button" value="<?php echo e(__('Continue')); ?>"
                                                    class="btn btn-xs btn-primary submit-btn">
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>
                    <?php if(isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on'): ?>
                        
                        <div id="paystack_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Paystack')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on'): ?>
                                <div id="paystack-payment" class="tabs-card">
                                    <div class="">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="paystack_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="paystack_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paymentwall-coupon-tr" style="display: none">
                                                <b><?php echo e(__('Coupon Discount')); ?></b> : <b
                                                    class="paymentwall-coupon-price"></b>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'paystack')">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_flutterwave_enabled']) &&
                            $admin_payments_details['is_flutterwave_enabled'] == 'on'): ?>
                        
                        <div id="flutterwave_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Flutterwave')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_flutterwave_enabled']) &&
                                    $admin_payments_details['is_flutterwave_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="flutterwave_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('plan.pay.with.paypal')); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="flutterwave_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="flutterwave_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'flutterwave')">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on'): ?>
                        
                        <div id="razorpay_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Razorpay')); ?> </h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="razorpay_payment">

                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('plan.pay.with.paypal')); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="razorpay_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="razorpay_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'razorpay')">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on'): ?>
                        
                        <div id="mercado_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Mercado Pago')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="mercado_payment">

                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('plan.pay.with.paypal')); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="mercado_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="mercado_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'mercado')">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_paytm_enabled']) && $admin_payments_details['is_paytm_enabled'] == 'on'): ?>
                        
                        <div id="paytm_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Paytm')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_paytm_enabled']) && $admin_payments_details['is_paytm_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="paytm_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('paytm.prepare.plan')); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">
                                        <input type="hidden" name="total_price" id="paytm_total_price"
                                            value="<?php echo e($storage_plan->price); ?>" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="mobile_number"><?php echo e(__('Mobile Number')); ?></label>
                                                        <input type="text" id="mobile_number" name="mobile_number"
                                                            class="form-control coupon"
                                                            placeholder="<?php echo e(__('Enter Mobile Number')); ?>">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-100">
                                                        <label for="paytm_coupon"
                                                            class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                        <input type="text" id="paytm_coupon" name="coupon"
                                                            class="form-control coupon"
                                                            placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                    </div>

                                                    <div class="form-group ms-3 mt-4">
                                                        <a href="#" class="text-muted apply-coupon"
                                                            data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                                class="fas fa-save"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_mollie_enabled']) && $admin_payments_details['is_mollie_enabled'] == 'on'): ?>
                        
                        <div id="mollie_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Mollie')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_mollie_enabled']) && $admin_payments_details['is_mollie_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="mollie_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('mollie.prepare.plan')); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">
                                        <input type="hidden" name="total_price" id="mollie_total_price"
                                            value="<?php echo e($storage_plan->price); ?>" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="mollie_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="mollie_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_skrill_enabled']) && $admin_payments_details['is_skrill_enabled'] == 'on'): ?>
                        
                        <div id="skrill_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Skrill')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_skrill_enabled']) && $admin_payments_details['is_skrill_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="skrill_payment">

                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('skrill.prepare.plan')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id"
                                            value="<?php echo e(date('Y-m-d')); ?>-<?php echo e(strtotime(date('Y-m-d H:i:s'))); ?>-payatm">
                                        <input type="hidden" name="order_id"
                                            value="<?php echo e(str_pad(!empty($order->id) ? $order->id + 1 : 0 + 1, 4, '100', STR_PAD_LEFT)); ?>">
                                        <?php
                                            $skrill_data = [
                                                'transaction_id' => md5(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'),
                                                'user_id' => 'user_id',
                                                'amount' => 'amount',
                                                'currency' => 'currency',
                                            ];
                                            session()->put('skrill_data', $skrill_data);
                                            
                                        ?>
                                        
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">
                                        <input type="hidden" name="total_price" id="skrill_total_price"
                                            value="<?php echo e($storage_plan->price); ?>" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="skrill_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="skrill_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>
                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_coingate_enabled']) && $admin_payments_details['is_coingate_enabled'] == 'on'): ?>
                        
                        <div id="coingate_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Coingate')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_coingate_enabled']) && $admin_payments_details['is_coingate_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="coingate_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="<?php echo e(route('coingate.prepare.plan')); ?>">
                                        <?php echo csrf_field(); ?>
                                        
                                        <input type="hidden" name="counpon" id="coingate_coupon" value="">
                                        <input type="hidden" name="storage_id"
                                            value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">
                                        <input type="hidden" name="total_price" id="coingate_total_price"
                                            value="<?php echo e($storage_plan->price); ?>" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="coingate_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="coingate_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>

                    <?php if(isset($admin_payments_details['is_paymentwall_enabled']) &&
                            $admin_payments_details['is_paymentwall_enabled'] == 'on'): ?>
                        
                        <div id="paymentwall_payment" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Paymentwall')); ?></h5>

                            </div>
                            
                            <?php if(isset($admin_payments_details['is_paymentwall_enabled']) &&
                                    $admin_payments_details['is_paymentwall_enabled'] == 'on'): ?>
                                <div class="tab-pane " id="paymentwall_payment">

                                    <form role="form" action="<?php echo e(route('paymentwall')); ?>" method="post"
                                        id="paymentwall-payment-form" class="w3-container w3-display-middle w3-card-4">
                                        <?php echo csrf_field(); ?>
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="paymentwall_coupon"
                                                        class="form-label"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="paymentwall_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                
                                                <input type="hidden" name="storage_id"
                                                    value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)); ?>">
                                                <button class="btn btn-xs btn-primary" type="submit"
                                                    id="pay_with_paymentwall">
                                                    <?php echo e(__('Pay Now')); ?>

                                                </button>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storage_plans/stripe.blade.php ENDPATH**/ ?>