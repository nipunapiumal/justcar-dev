<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payment')); ?>

<?php $__env->stopSection(); ?>
<?php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Payment')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Payment')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 'Owner'): ?>
        <div class="card" id="store_payment-setting">
            <div class="card-header">
                <h5><?php echo e('Payment'); ?></h5>
                <small
                    class="text-dark font-weight-bold"><?php echo e(__('This detail will use for collect payment on invoice from clients. On invoice client will find out pay now button based on your below configuration.')); ?></small>
            </div>
            <div class="card-body">

                <?php echo e(Form::open(['route' => ['owner.payment.setting', $store_settings->slug], 'method' => 'post', 'novalidate'])); ?>

                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <label class="col-form-label"><?php echo e(__('Currency')); ?></label>
                                        <input type="text" name="currency" class="form-control" id="currency"
                                            value="<?php echo e($store_settings['currency_code']); ?>" required>
                                        <small class="text-xs">
                                            <?php echo e(__('Note: Add currency code as per three-letter ISO code')); ?>.
                                            <a href="https://stripe.com/docs/currencies"
                                                target="_blank"><?php echo e(__('you can find out here..')); ?></a>
                                        </small>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <label for="currency_symbol"
                                            class="col-form-label"><?php echo e(__('Currency Symbol')); ?></label>
                                        <input type="text" name="currency_symbol" class="form-control"
                                            id="currency_symbol" value="<?php echo e($store_settings['currency']); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label mb-3"
                                                for="example3cols3Input"><?php echo e(__('Currency Symbol Position')); ?></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input type="radio" id="customRadio5"
                                                            name="currency_symbol_position" value="pre"
                                                            class="form-check-input"
                                                            <?php if($store_settings['currency_symbol_position'] == 'pre' || $store_settings['currency_symbol_position'] == null): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label"
                                                            for="customRadio5"><?php echo e(__('Pre')); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input type="radio" id="customRadio6"
                                                            name="currency_symbol_position" value="post"
                                                            class="form-check-input"
                                                            <?php if($store_settings['currency_symbol_position'] == 'post'): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label"
                                                            for="customRadio6"><?php echo e(__('Post')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label mb-3"
                                                for="example3cols3Input"><?php echo e(__('Currency Symbol Space')); ?></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input type="radio" id="customRadio7" name="currency_symbol_space"
                                                            value="with" class="form-check-input"
                                                            <?php if($store_settings['currency_symbol_space'] == 'with'): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label"
                                                            for="customRadio7"><?php echo e(__('With Space')); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input type="radio" id="customRadio8" name="currency_symbol_space"
                                                            value="without" class="form-check-input"
                                                            <?php if($store_settings['currency_symbol_space'] == 'without' || $store_settings['currency_symbol_space'] == null): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label"
                                                            for="customRadio8"><?php echo e(__('Without Space')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><?php echo e(__('Custom Field For Checkout')); ?></h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_1', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_1', !empty($store_payment_setting['custom_field_title_1']) ? $store_payment_setting['custom_field_title_1'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_2', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_2', !empty($store_payment_setting['custom_field_title_2']) ? $store_payment_setting['custom_field_title_2'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_3', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_3', !empty($store_payment_setting['custom_field_title_3']) ? $store_payment_setting['custom_field_title_3'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('custom_field_title_4', __('Custom Field Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('custom_field_title_4', !empty($store_payment_setting['custom_field_title_4']) ? $store_payment_setting['custom_field_title_4'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Custom Field Title')])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq justify-content-center">
                    <div class="col-sm-12 col-md-10 col-xxl-12">
                        <div class="accordion accordion-flush" id="accordionExample">

                            <!-- COD -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse0" aria-expanded="true" aria-controls="collapse0">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('COD')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse0" class="accordion-collapse collapse" aria-labelledby="heading-2-2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                                <small>
                                                    <?php echo e(__('Note : Enable or disable cash on delivery.')); ?></small><br>
                                                <small>
                                                    <?php echo e(__('This detail will use for make checkout of shopping cart.')); ?></small>
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="enable_cod" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="enable_cod" id="enable_cod"
                                                        <?php echo e($store_settings['enable_cod'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="enable_cod"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Telegram -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Telegram')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse01" class="accordion-collapse collapse" aria-labelledby="heading-2-2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                                <small>
                                                    <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="enable_telegram" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="enable_telegram" id="enable_telegram"
                                                        <?php echo e($store_settings['enable_telegram'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="enable_telegram"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('telegrambot', __('Telegram Access Token'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('telegrambot', $store_settings['telegrambot'], ['class' => 'form-control active telegrambot', 'placeholder' => '1234567890:AAbbbbccccddddxvGENZCi8Hd4B15M8xHV0'])); ?>

                                                    <p><?php echo e(__('Get Chat ID')); ?> :
                                                        https://api.telegram.org/bot-TOKEN-/getUpdates</p>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('telegramchatid', __('Telegram Chat Id'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('telegramchatid', $store_settings['telegramchatid'], ['class' => 'form-control active telegramchatid', 'placeholder' => '123456789'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Whatsapp -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Whatsapp')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse02" class="accordion-collapse collapse" aria-labelledby="heading-2-2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                                <small>
                                                    <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="enable_whatsapp" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="enable_whatsapp" id="enable_whatsapp"
                                                        <?php echo e($store_settings['enable_whatsapp'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="enable_whatsapp"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="whatsapp_number" id="whatsapp_number"
                                                        class="form-control input-mask" data-mask="+00 00000000000"
                                                        value="<?php echo e($store_settings['whatsapp_number']); ?>"
                                                        placeholder="+00 00000000000" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Transfer -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Bank Transfer')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse03" class="accordion-collapse collapse" aria-labelledby="heading-2-2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                                <small>
                                                    <?php echo e(__('Note: Input your bank details including bank name.')); ?></small>
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="enable_bank" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="enable_bank" id="enable_bank"
                                                        <?php echo e($store_settings['enable_bank'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="enable_bank"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea type="text" name="bank_number" id="bank_number" class="form-control" value=""
                                                        placeholder="<?php echo e(__('Bank Transfer Number')); ?>"><?php echo e($store_settings['bank_number']); ?>   </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Strip -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Stripe')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading-2-2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_stripe_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_stripe_enabled" id="is_stripe_enabled"
                                                        <?php echo e(isset($store_settings['is_stripe_enabled']) && $store_settings['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_stripe_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('stripe_key', isset($store_settings['stripe_key']) ? $store_settings['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')])); ?>

                                                    <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-stripe_key" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('stripe_secret', isset($store_settings['stripe_secret']) ? $store_settings['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')])); ?>

                                                    <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-stripe_secret" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Paypal -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Paypal')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading-2-3"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_paypal_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_paypal_enabled" id="is_paypal_enabled"
                                                        <?php echo e(isset($store_settings['is_paypal_enabled']) && $store_settings['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_paypal_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pb-4">
                                                <label class="paypal-label col-form-label"
                                                    for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label>
                                                <br>
                                                <div class="d-flex">
                                                    <div class="mr-2" style="margin-right: 15px;">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="paypal_mode"
                                                                        value="sandbox" class="form-check-input"
                                                                        <?php echo e(!isset($store_settings['paypal_mode']) || $store_settings['paypal_mode'] == '' || $store_settings['paypal_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Sandbox')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mr-2">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="paypal_mode"
                                                                        value="live" class="form-check-input"
                                                                        <?php echo e(isset($store_settings['paypal_mode']) && $store_settings['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Live')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paypal_client_id"
                                                        class="col-form-label"><?php echo e(__('Client ID')); ?></label>
                                                    <input type="text" name="paypal_client_id" id="paypal_client_id"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($store_settings['paypal_client_id']) || is_null($store_settings['paypal_client_id']) ? '' : $store_settings['paypal_client_id']); ?>"
                                                        placeholder="<?php echo e(__('Client ID')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paypal_secret_key"
                                                        class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                    <input type="text" name="paypal_secret_key" id="paypal_secret_key"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($store_settings['paypal_secret_key']) || is_null($store_settings['paypal_secret_key']) ? '' : $store_settings['paypal_secret_key']); ?>"
                                                        placeholder="<?php echo e(__('Secret Key')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Paystack -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Paystack')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading-2-4"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_paystack_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_paystack_enabled" id="is_paystack_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_paystack_enabled']) && $store_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_paystack_enabled"><?php echo e(__('Enable')); ?></label>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paypal_client_id"
                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                    <input type="text" name="paystack_public_key"
                                                        id="paystack_public_key" class="form-control"
                                                        value="<?php echo e(isset($store_payment_setting['paystack_public_key']) ? $store_payment_setting['paystack_public_key'] : ''); ?>"
                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paystack_secret_key"
                                                        class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                    <input type="text" name="paystack_secret_key"
                                                        id="paystack_secret_key" class="form-control"
                                                        value="<?php echo e(isset($store_payment_setting['paystack_secret_key']) ? $store_payment_setting['paystack_secret_key'] : ''); ?>"
                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FLUTTERWAVE -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Flutterwave')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading-2-5"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_flutterwave_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_flutterwave_enabled" id="is_flutterwave_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_flutterwave_enabled']) && $store_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_flutterwave_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paypal_client_id"
                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                    <input type="text" name="flutterwave_public_key"
                                                        id="flutterwave_public_key" class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['flutterwave_public_key']) || is_null($store_payment_setting['flutterwave_public_key']) ? '' : $store_payment_setting['flutterwave_public_key']); ?>"
                                                        placeholder="Public Key">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paystack_secret_key"
                                                        class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                    <input type="text" name="flutterwave_secret_key"
                                                        id="flutterwave_secret_key" class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['flutterwave_secret_key']) || is_null($store_payment_setting['flutterwave_secret_key']) ? '' : $store_payment_setting['flutterwave_secret_key']); ?>"
                                                        placeholder="Secret Key">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Razorpay -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Razorpay')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading-2-6"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_razorpay_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_razorpay_enabled" id="is_razorpay_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_razorpay_enabled']) && $store_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_razorpay_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paypal_client_id"
                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>

                                                    <input type="text" name="razorpay_public_key"
                                                        id="razorpay_public_key" class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['razorpay_public_key']) || is_null($store_payment_setting['razorpay_public_key']) ? '' : $store_payment_setting['razorpay_public_key']); ?>"
                                                        placeholder="Public Key">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paystack_secret_key" class="col-form-label">
                                                        <?php echo e(__('Secret Key')); ?></label>
                                                    <input type="text" name="razorpay_secret_key"
                                                        id="razorpay_secret_key" class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['razorpay_secret_key']) || is_null($store_payment_setting['razorpay_secret_key']) ? '' : $store_payment_setting['razorpay_secret_key']); ?>"
                                                        placeholder="Secret Key">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Paytm -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Paytm')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading-2-7"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_paytm_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_paytm_enabled" id="is_paytm_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_paytm_enabled']) && $store_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_paytm_enabled"><?php echo e(__('Enable')); ?></label>

                                                </div>
                                            </div>
                                            <div class="col-md-12 pb-4">
                                                <label class="paypal-label col-form-label"
                                                    for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label>
                                                <br>
                                                <div class="d-flex">
                                                    <div class="mr-2" style="margin-right: 15px;">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="paytm_mode"
                                                                        value="local" class="form-check-input"
                                                                        <?php echo e(!isset($store_payment_setting['paytm_mode']) || $store_payment_setting['paytm_mode'] == '' || $store_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Local')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mr-2">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="paytm_mode"
                                                                        value="production" class="form-check-input"
                                                                        <?php echo e(isset($store_payment_setting['paytm_mode']) && $store_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Production')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="paytm_public_key"
                                                        class="col-form-label"><?php echo e(__('Merchant ID')); ?></label>
                                                    <input type="text" name="paytm_merchant_id" id="paytm_merchant_id"
                                                        class="form-control"
                                                        value="<?php echo e(isset($store_payment_setting['paytm_merchant_id']) ? $store_payment_setting['paytm_merchant_id'] : ''); ?>"
                                                        placeholder="<?php echo e(__('Merchant ID')); ?>" />
                                                    <?php if($errors->has('paytm_merchant_id')): ?>
                                                        <span class="invalid-feedback d-block">
                                                            <?php echo e($errors->first('paytm_merchant_id')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="paytm_secret_key"
                                                        class="col-form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                    <input type="text" name="paytm_merchant_key"
                                                        id="paytm_merchant_key" class="form-control"
                                                        value="<?php echo e(isset($store_payment_setting['paytm_merchant_key']) ? $store_payment_setting['paytm_merchant_key'] : ''); ?>"
                                                        placeholder="<?php echo e(__('Merchant Key')); ?>" />
                                                    <?php if($errors->has('paytm_merchant_key')): ?>
                                                        <span class="invalid-feedback d-block">
                                                            <?php echo e($errors->first('paytm_merchant_key')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="paytm_industry_type"
                                                        class="col-form-label"><?php echo e(__('Industry Type')); ?></label>
                                                    <input type="text" name="paytm_industry_type"
                                                        id="paytm_industry_type" class="form-control"
                                                        value="<?php echo e(isset($store_payment_setting['paytm_industry_type']) ? $store_payment_setting['paytm_industry_type'] : ''); ?>"
                                                        placeholder="<?php echo e(__('Industry Type')); ?>" />
                                                    <?php if($errors->has('paytm_industry_type')): ?>
                                                        <span class="invalid-feedback d-block">
                                                            <?php echo e($errors->first('paytm_industry_type')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mercado Pago-->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Mercado Pago')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading-2-8"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_mercado_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_mercado_enabled" id="is_mercado_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_mercado_enabled']) && $store_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_mercado_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pb-4">
                                                <label class="coingate-label col-form-label"
                                                    for="mercado_mode"><?php echo e(__('Mercado Mode')); ?></label>
                                                <br>
                                                <div class="d-flex">
                                                    <div class="mr-2" style="margin-right: 15px;">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="mercado_mode"
                                                                        value="sandbox" class="form-check-input"
                                                                        <?php echo e((isset($store_payment_setting['mercado_mode']) && $store_payment_setting['mercado_mode'] == '') || (isset($store_payment_setting['mercado_mode']) && $store_payment_setting['mercado_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Sandbox')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mr-2">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="mercado_mode"
                                                                        value="live" class="form-check-input"
                                                                        <?php echo e(isset($store_payment_setting['mercado_mode']) && $store_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Live')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mercado_access_token"
                                                        class="col-form-label"><?php echo e(__('Access Token')); ?></label>
                                                    <input type="text" name="mercado_access_token"
                                                        id="mercado_access_token" class="form-control"
                                                        value="<?php echo e(isset($store_payment_setting['mercado_access_token']) ? $store_payment_setting['mercado_access_token'] : ''); ?>"
                                                        placeholder="<?php echo e(__('Access Token')); ?>" />
                                                    <?php if($errors->has('mercado_secret_key')): ?>
                                                        <span class="invalid-feedback d-block">
                                                            <?php echo e($errors->first('mercado_access_token')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mollie -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Mollie')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading-2-9"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_mollie_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_mollie_enabled" id="is_mollie_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_mollie_enabled']) && $store_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_mollie_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mollie_api_key"
                                                        class="col-form-label"><?php echo e(__('Mollie Api Key')); ?></label>
                                                    <input type="text" name="mollie_api_key" id="mollie_api_key"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['mollie_api_key']) || is_null($store_payment_setting['mollie_api_key']) ? '' : $store_payment_setting['mollie_api_key']); ?>"
                                                        placeholder="Mollie Api Key">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mollie_profile_id"
                                                        class="col-form-label"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                    <input type="text" name="mollie_profile_id" id="mollie_profile_id"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['mollie_profile_id']) || is_null($store_payment_setting['mollie_profile_id']) ? '' : $store_payment_setting['mollie_profile_id']); ?>"
                                                        placeholder="Mollie Profile Id">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mollie_partner_id"
                                                        class="col-form-label"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                    <input type="text" name="mollie_partner_id" id="mollie_partner_id"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['mollie_partner_id']) || is_null($store_payment_setting['mollie_partner_id']) ? '' : $store_payment_setting['mollie_partner_id']); ?>"
                                                        placeholder="Mollie Partner Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Skrill -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-10">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('Skrill')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading-2-10"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_skrill_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_skrill_enabled" id="is_skrill_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_skrill_enabled']) && $store_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_skrill_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mollie_api_key"
                                                        class="col-form-label"><?php echo e(__('Skrill Email')); ?></label>
                                                    <input type="email" name="skrill_email" id="skrill_email"
                                                        class="form-control"
                                                        value="<?php echo e(isset($store_payment_setting['skrill_email']) ? $store_payment_setting['skrill_email'] : ''); ?>"
                                                        placeholder="<?php echo e(__('Mollie Api Key')); ?>" />
                                                    <?php if($errors->has('skrill_email')): ?>
                                                        <span class="invalid-feedback d-block">
                                                            <?php echo e($errors->first('skrill_email')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CoinGate -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-11">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('CoinGate')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading-2-11"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_coingate_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_coingate_enabled" id="is_coingate_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_coingate_enabled']) && $store_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_coingate_enabled"><?php echo e(__('Enable')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pb-4">
                                                <label class="col-form-label"
                                                    for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label>
                                                <br>
                                                <div class="d-flex">
                                                    <div class="mr-2" style="margin-right: 15px;">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="coingate_mode"
                                                                        value="sandbox" class="form-check-input"
                                                                        <?php echo e(!isset($store_payment_setting['coingate_mode']) || $store_payment_setting['coingate_mode'] == '' || $store_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Sandbox')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mr-2">
                                                        <div class="border card p-3">
                                                            <div class="form-check">
                                                                <label class="form-check-labe text-dark">
                                                                    <input type="radio" name="coingate_mode"
                                                                        value="live" class="form-check-input"
                                                                        <?php echo e(isset($store_payment_setting['coingate_mode']) && $store_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                    <?php echo e(__('Live')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="coingate_auth_token"
                                                        class="col-form-label"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                    <input type="text" name="coingate_auth_token"
                                                        id="coingate_auth_token" class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['coingate_auth_token']) || is_null($store_payment_setting['coingate_auth_token']) ? '' : $store_payment_setting['coingate_auth_token']); ?>"
                                                        placeholder="CoinGate Auth Token">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- PaymentWall -->
                            <div class="accordion-item card">
                                <h2 class="accordion-header" id="heading-2-12">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
                                        <span class="d-flex align-items-center">
                                            <i class="ti ti-credit-card text-primary"></i>
                                            <?php echo e(__('PaymentWall')); ?>

                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading-2-12"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-6 py-2">
                                                
                                            </div>
                                            <div class="col-6 py-2 text-end">
                                                <div class="form-check form-switch form-switch-right mb-2">
                                                    <input type="hidden" name="is_paymentwall_enabled" value="off">
                                                    <input type="checkbox" class="form-check-input mx-2"
                                                        name="is_paymentwall_enabled" id="is_paymentwall_enabled"
                                                        <?php echo e(isset($store_payment_setting['is_paymentwall_enabled']) && $store_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <label class="form-check-label"
                                                        for="is_paymentwall_enabled"><?php echo e(__('Enable')); ?>

                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paymentwall_public_key"
                                                        class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                    <input type="text" name="paymentwall_public_key"
                                                        id="paymentwall_public_key" class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['paymentwall_public_key']) || is_null($store_payment_setting['paymentwall_public_key']) ? '' : $store_payment_setting['paymentwall_public_key']); ?>"
                                                        placeholder="<?php echo e(__('Public Key')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="paymentwall_private_key"
                                                        class="col-form-label"><?php echo e(__('Private Key')); ?></label>
                                                    <input type="text" name="paymentwall_private_key"
                                                        id="paymentwall_private_key" class="form-control"
                                                        value="<?php echo e(!isset($store_payment_setting['paymentwall_private_key']) || is_null($store_payment_setting['paymentwall_private_key']) ? '' : $store_payment_setting['paymentwall_private_key']); ?>"
                                                        placeholder="<?php echo e(__('Private Key')); ?>">
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
            <div class="card-footer">
                <div class="col-sm-12 px-2">
                    <div class="text-end">
                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/payments.blade.php ENDPATH**/ ?>