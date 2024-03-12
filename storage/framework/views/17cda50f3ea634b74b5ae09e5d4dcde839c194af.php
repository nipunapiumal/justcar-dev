<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

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
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Settings')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Settings')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 'Owner'): ?>
        <?php echo e(Form::model($store_settings, ['route' => ['settings.store', $store_settings['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    
                    <div class="card-body pt-0">
                        <div class=" setting-card">
                            <div class="row mt-2">
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Store Logo')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-3">
                                                    <img src="<?php echo e($store_logo . '/' . (isset($store_settings['logo']) && !empty($store_settings['logo']) ? $store_settings['logo'] : 'logo.png')); ?>"
                                                        width="140px" class="invoice_logo">
                                                </div>
                                                <div class="choose-files mt-4">
                                                    <label for="logo">
                                                        <div class=" bg-primary logo_update"> <i
                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                        </div>
                                                        <input type="file" class="form-control file" name="logo"
                                                            id="logo" data-filename="logo_update">
                                                    </label>
                                                </div>
                                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Store Logo Dark')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-3">
                                                    <img src="<?php echo e($store_logo . '/' . (isset($store_settings['logo_dark']) && !empty($store_settings['logo_dark']) ? $store_settings['logo_dark'] : 'logo.png')); ?>"
                                                        width="140px" class="invoice_logo">
                                                </div>
                                                <div class="choose-files mt-4">
                                                    <label for="logo_dark">
                                                        <div class=" bg-primary logo_update"> <i
                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                        </div>
                                                        <input type="file" class="form-control file" name="logo_dark"
                                                            id="logo_dark" data-filename="logo_update">
                                                    </label>
                                                </div>
                                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Invoice Logo')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-3">
                                                    <img src="<?php echo e($store_logo . '/' . (isset($store_settings['invoice_logo']) && !empty($store_settings['invoice_logo']) ? $store_settings['invoice_logo'] : 'invoice_logo.png')); ?>"
                                                        width="140px" class="invoice_logo">
                                                </div>
                                                <div class="choose-files mt-4">
                                                    <label for="invoice_logo">
                                                        <div class=" bg-primary logo_update"> <i
                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                        </div>
                                                        <input type="file" name="invoice_logo" id="invoice_logo"
                                                            class="form-control file" data-filename="invoice_logo_update">
                                                    </label>
                                                </div>
                                                <?php $__errorArgs = ['invoice_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="row">
                                                        <span class="invalid-invoice_logo" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('store_name', __('Store Name'), ['class' => 'form-label'])); ?>

                                    <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Store Name')]); ?>

                                    <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-store_name" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email')])); ?>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-email" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php if($plan->enable_custdomain == 'on' || $plan->enable_custsubdomain == 'on'): ?>
                                    <div class="col-md-6 py-4">
                                        <div class="radio-button-group mts">
                                            <div class="item">
                                                <label
                                                    class="btn btn-outline-primary <?php echo e($store_settings['enable_storelink'] == 'on' ? 'active' : ''); ?>">
                                                    <input type="radio" class="domain_click  radio-button"
                                                        name="enable_domain" value="enable_storelink" id="enable_storelink"
                                                        <?php echo e($store_settings['enable_storelink'] == 'on' ? 'checked' : ''); ?>">
                                                    <?php echo e(__('Store Link')); ?>

                                                </label>
                                            </div>
                                            <?php if($plan->enable_custdomain == 'on'): ?>
                                                <div class="item">
                                                    <label
                                                        class="btn btn-outline-primary <?php echo e($store_settings['enable_domain'] == 'on' ? 'active' : ''); ?>">
                                                        <input type="radio" class="domain_click radio-button"
                                                            name="enable_domain" value="enable_domain" id="enable_domain"
                                                            <?php echo e($store_settings['enable_domain'] == 'on' ? 'checked' : ''); ?>>
                                                        <?php echo e(__('Domain')); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($plan->enable_custsubdomain == 'on'): ?>
                                                <div class="item">
                                                    <label
                                                        class="btn btn-outline-primary <?php echo e($store_settings['enable_subdomain'] == 'on' ? 'active' : ''); ?>">
                                                        <input type="radio" class="domain_click radio-button"
                                                            name="enable_domain" value="enable_subdomain"
                                                            id="enable_subdomain"
                                                            <?php echo e($store_settings['enable_subdomain'] == 'on' ? 'checked' : ''); ?>>
                                                        <?php echo e(__('Sub Domain')); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-sm mt-2" id="domainnote" style="display: none">
                                            <?php echo e(__('Note : Before add custom domain, your domain A record is pointing to our server IP :')); ?><?php echo e($serverIp); ?>

                                            <br>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="StoreLink"
                                        style="<?php echo e($store_settings['enable_storelink'] == 'on' ? 'display: block' : 'display: none'); ?>">
                                        <?php echo e(Form::label('store_link', __('Store Link'), ['class' => 'form-label'])); ?>

                                        <div class="input-group">
                                            <input type="text" value="<?php echo e($store_settings['store_url']); ?>"
                                                id="myInput" class="form-control d-inline-block"
                                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                                readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button"
                                                    onclick="myFunction()" id="button-addon2"><i class="far fa-copy"></i>
                                                    <?php echo e(__('Copy Link')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 domain"
                                        style="<?php echo e($store_settings['enable_domain'] == 'on' ? 'display:block' : 'display:none'); ?>">
                                        <?php echo e(Form::label('store_domain', __('Custom Domain'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('domains', $store_settings['domains'], ['class' => 'form-control', 'placeholder' => __('xyz.com')])); ?>

                                    </div>
                                    <?php if($plan->enable_custsubdomain == 'on'): ?>
                                        <div class="form-group col-md-6 sundomain"
                                            style="<?php echo e($store_settings['enable_subdomain'] == 'on' ? 'display:block' : 'display:none'); ?>">
                                            <?php echo e(Form::label('store_subdomain', __('Sub Domain'), ['class' => 'form-label'])); ?>

                                            <div class="input-group">
                                                <?php echo e(Form::text('subdomain', $store_settings['slug'], ['class' => 'form-control', 'placeholder' => __('Enter Domain'), 'readonly'])); ?>

                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2">.<?php echo e($subdomain_name); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="form-group col-md-6" id="StoreLink">
                                        <?php echo e(Form::label('store_link', __('Store Link'), ['class' => 'form-label'])); ?>

                                        <div class="input-group">
                                            <input type="text" value="<?php echo e($store_settings['store_url']); ?>"
                                                id="myInput" class="form-control d-inline-block"
                                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                                readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button"
                                                    onclick="myFunction()" id="button-addon2"><i class="far fa-copy"></i>
                                                    <?php echo e(__('Copy Link')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('tagline', __('Tagline'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('tagline', null, ['class' => 'form-control', 'placeholder' => __('Tagline')])); ?>

                                    <?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-tagline" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('address', __('Address'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Address')])); ?>

                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-address" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('city', __('City'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('City')])); ?>

                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-city" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('state', __('State'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('State')])); ?>

                                    <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-state" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('zipcode', __('Zipcode'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => __('Zipcode')])); ?>

                                    <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-zipcode" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('country', __('Country'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('Country')])); ?>

                                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-country" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('store_default_language', __('Store Default Language'), ['class' => 'form-label'])); ?>

                                    <div class="changeLanguage">
                                        <select name="store_default_language" id="store_default_language"
                                            class="form-control" data-toggle="select">
                                            <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($store_lang == $language): ?> selected <?php endif; ?>
                                                    value="<?php echo e($language); ?>">
                                                    <?php echo e(Str::upper($language)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('decimal_number_format', __('Decimal Number Format'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::number('decimal_number', isset($store_settings['decimal_number']) ? $store_settings['decimal_number'] : 2, ['class' => 'form-control', 'placeholder' => __('decimal_number')])); ?>

                                    <?php $__errorArgs = ['decimal_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-decimal_number" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-4 mt-3">
                                    <label class="form-check-label" for="is_checkout_login_required"></label>
                                    <div class="custom-control form-switch">
                                        <input type="checkbox" class="form-check-input" name="is_checkout_login_required"
                                            id="is_checkout_login_required"
                                            <?php if($store_settings['is_checkout_login_required'] == null): ?> <?php if($settings['is_checkout_login_required'] == 'on'): ?>
                                                <?php echo e('checked=checked'); ?> <?php endif; ?>
                                    <?php elseif($store_settings['is_checkout_login_required'] == 'on'): ?> <?php echo e('checked=checked'); ?> <?php else: ?>
                                        <?php echo e(''); ?> <?php endif; ?>
                                    
                                    >
                                    <?php echo e(Form::label('is_checkout_login_required', __('Is Checkout Login Required'), ['class' => 'form-check-label mb-3'])); ?>

                                </div>
                            </div>
                            <?php if($plan->blog == 'on'): ?>
                                <div class="form-group col-md-4">
                                    <label class="form-check-label" for="blog_enable"></label>
                                    <div class="custom-control form-switch">
                                        <input type="checkbox" class="form-check-input" name="blog_enable"
                                            id="blog_enable"
                                            <?php echo e($store_settings['blog_enable'] == 'on' ? 'checked=checked' : ''); ?>>
                                        <?php echo e(Form::label('blog_enable', __('Blog Menu Dispay'), ['class' => 'form-check-label mb-3'])); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($plan->shipping_method == 'on'): ?>
                                <div class="form-group col-md-4">
                                    <label class="form-check-label" for="enable_shipping"></label>
                                    <div class="custom-control form-switch">
                                        <input type="checkbox" class="form-check-input" name="enable_shipping"
                                            id="enable_shipping"
                                            <?php echo e($store_settings['enable_shipping'] == 'on' ? 'checked=checked' : ''); ?>>
                                        <?php echo e(Form::label('enable_shipping', __('Shipping Method Enable'), ['class' => 'form-check-label mb-3'])); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group col-md-4 ">
                                <label class="form-check-label" for="enable_rating"></label>
                                <div class="custom-control form-switch">
                                    <input type="checkbox" class="form-check-input" name="enable_rating"
                                        id="enable_rating"
                                        <?php echo e($store_settings['enable_rating'] == 'on' ? 'checked=checked' : ''); ?>>
                                    <?php echo e(Form::label('enable_rating', __('Product Rating Display'), ['class' => 'form-check-label mb-3'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fab fa-google" aria-hidden="true"></i>
                                    <?php echo e(Form::label('google_analytic', __('Google Analytic'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('google_analytic', null, ['class' => 'form-control', 'placeholder' => 'UA-XXXXXXXXX-X'])); ?>

                                    <?php $__errorArgs = ['google_analytic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-google_analytic" role="alert">
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
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    <?php echo e(Form::label('facebook_pixel_code', __('Facebook Pixel'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('fbpixel_code', null, ['class' => 'form-control', 'placeholder' => 'UA-0000000-0'])); ?>

                                    <?php $__errorArgs = ['facebook_pixel_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-google_analytic" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <?php echo e(Form::label('storejs', __('Store Custom JS'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::textarea('storejs', null, ['class' => 'form-control', 'rows' => 3, 'placehold   er' => __('About')])); ?>

                                <?php $__errorArgs = ['storejs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-about" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <?php echo e(Form::label('metakeyword', __('Meta Keywords'), ['class' => 'form-label'])); ?>

                                <?php echo Form::textarea('metakeyword', null, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'placeholder' => __('Meta Keyword'),
                                ]); ?>

                                <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-about" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <?php echo e(Form::label('metadesc', __('Meta Description'), ['class' => 'form-label'])); ?>

                                <?php echo Form::textarea('metadesc', null, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'placeholder' => __('Meta Description'),
                                ]); ?>


                                <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-about" role="alert">
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
                <div class="card-footer">
                    <div class="col-sm-12 px-2">
                        <div class="text-end">
                            <button type="button" class="btn bs-pass-para btn-secondary btn-light"
                                data-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                data-confirm-yes="delete-form-<?php echo e($store_settings->id); ?>">
                                <span class="text-black"><?php echo e(__('Delete Store')); ?></span>
                            </button>
                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    <?php echo Form::open([
        'method' => 'DELETE',
        'route' => ['ownerstore.destroy', $store_settings->id],
        'id' => 'delete-form-' . $store_settings->id,
    ]); ?>

    <?php echo Form::close(); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/settings.blade.php ENDPATH**/ ?>