<?php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    $user = Auth::user();
    
    if ($user->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
?>
<?php $__env->startPush('script-page'); ?>
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
<?php $__env->stopPush(); ?>
<?php
    
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Initial Setup')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white"><?php echo e(__('Initial Setup')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="alert alert-warning" role="alert">
                <?php echo e(__('Access your personalized dashboard by completing this section. You can conveniently modify these settings later within the dashboard to suit your preferences.')); ?>

            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="sticky-top" style="top:30px">
                        <div class="card ">
                            <div class="list-group list-group-flush" id="useradd-sidenav">

                                <?php
                                    $initial_setup = [];
                                    if ($user->initial_setup) {
                                        $initial_setup = json_decode($user->initial_setup);
                                    }
                                    
                                ?>



                                <a href="#company-overview"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Company Overview')); ?>

                                    <div class="float-end">
                                        <?php if(in_array('company-overview', $initial_setup)): ?>
                                            <i class="fas fa-check"></i>
                                        <?php else: ?>
                                            <i class="ti ti-chevron-right"></i>
                                        <?php endif; ?>

                                    </div>
                                </a>

                                

                                <a href="#layouts" class="list-group-item list-group-item-action"><?php echo e(__('Layouts')); ?>

                                    <div class="float-end">
                                        <?php if(in_array('layouts', $initial_setup)): ?>
                                            <i class="fas fa-check"></i>
                                        <?php else: ?>
                                            <i class="ti ti-chevron-right"></i>
                                        <?php endif; ?>

                                    </div>
                                </a>

                                <a href="#cookie-bot" class="list-group-item list-group-item-action"><?php echo e(__('Cookie Bot')); ?>

                                    <small class="text-muted">[<?php echo e(__('Optional')); ?>]</small>
                                    <div class="float-end">
                                        <?php if(in_array('cookie-bot', $initial_setup)): ?>
                                            <i class="fas fa-check"></i>
                                        <?php else: ?>
                                            <i class="ti ti-chevron-right"></i>
                                        <?php endif; ?>

                                    </div>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8">

                    <?php if(!in_array('company-overview', $initial_setup)): ?>
                        <div id="company-overview" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Company Overview')); ?></h5>
                            </div>

                            <div class="tab-pane " id="company-overview">
                                <?php echo e(Form::model($store_settings, ['route' => ['settings.store', $store_settings['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="border p-3 rounded stripe-payment-div">
                                    <div class="form-group">
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
                                    <div class="form-group">
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
                                        <div class="col-md-8 py-4">
                                            <div class="radio-button-group mts">
                                                <div class="item">
                                                    <label
                                                        class="btn btn-outline-primary <?php echo e($store_settings['enable_storelink'] == 'on' ? 'active' : ''); ?>">
                                                        <input type="radio" class="domain_click  radio-button"
                                                            name="enable_domain" value="enable_storelink"
                                                            id="enable_storelink"
                                                            <?php echo e($store_settings['enable_storelink'] == 'on' ? 'checked' : ''); ?>">
                                                        <?php echo e(__('Store Link')); ?>

                                                    </label>
                                                </div>
                                                <?php if($plan->enable_custdomain == 'on'): ?>
                                                    <div class="item">
                                                        <label
                                                            class="btn btn-outline-primary <?php echo e($store_settings['enable_domain'] == 'on' ? 'active' : ''); ?>">
                                                            <input type="radio" class="domain_click radio-button"
                                                                name="enable_domain" value="enable_domain"
                                                                id="enable_domain"
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
                                        <div class="form-group" id="StoreLink"
                                            style="<?php echo e($store_settings['enable_storelink'] == 'on' ? 'display: block' : 'display: none'); ?>">
                                            <?php echo e(Form::label('store_link', __('Store Link'), ['class' => 'form-label'])); ?>

                                            <div class="input-group">
                                                <input type="text" value="<?php echo e($store_settings['store_url']); ?>"
                                                    id="myInput" class="form-control d-inline-block"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="copyText()" id="button-addon2"><i class="far fa-copy"></i>
                                                        <?php echo e(__('Copy Link')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group domain"
                                            style="<?php echo e($store_settings['enable_domain'] == 'on' ? 'display:block' : 'display:none'); ?>">
                                            <?php echo e(Form::label('store_domain', __('Custom Domain'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('domains', $store_settings['domains'], ['class' => 'form-control', 'placeholder' => __('xyz.com')])); ?>

                                        </div>
                                        <?php if($plan->enable_custsubdomain == 'on'): ?>
                                            <div class="form-group sundomain"
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
                                        <div class="form-group" id="StoreLink">
                                            <?php echo e(Form::label('store_link', __('Store Link'), ['class' => 'form-label'])); ?>

                                            <div class="input-group">
                                                <input type="text" value="<?php echo e($store_settings['store_url']); ?>"
                                                    id="myInput" class="form-control d-inline-block"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="copyText()" id="button-addon2"><i
                                                            class="far fa-copy"></i>
                                                        <?php echo e(__('Copy Link')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
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
                                    <div class="form-group">
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
                                    <div class="form-group">
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
                                    <div class="form-group">
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
                                    <div class="form-group">
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
                                    <div class="form-group">
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
                                    <div class="form-group">
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
                                    <div class="row">
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
                                                                <input type="file" class="form-control file"
                                                                    name="logo" id="logo"
                                                                    data-filename="logo_update">
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
                                                                <input type="file" class="form-control file"
                                                                    name="logo_dark" id="logo_dark"
                                                                    data-filename="logo_update">
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
                                                                <input type="file" name="invoice_logo"
                                                                    id="invoice_logo" class="form-control file"
                                                                    data-filename="invoice_logo_update">
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
                                    </div>
                                </div>
                                <div class="col-sm-12 my-2 px-2">
                                    <div class="text-end">

                                        <input type="submit" value="<?php echo e(__('Continue')); ?>"
                                            class="btn btn-xs btn-primary">
                                    </div>
                                </div>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>

                    <?php endif; ?>


                    
                    <?php if(!in_array('layouts', $initial_setup)): ?>
                        <div id="layouts" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Layouts')); ?></h5>
                            </div>

                            <div class="tab-pane " id="layouts">
                                <?php echo e(Form::open(['route' => ['store.changetheme', $store_settings->id], 'method' => 'POST'])); ?>


                                <div class="border p-3 rounded stripe-payment-div">
                                    <div class="row">
                                        <h5 class="mt-3 mb-4"><?php echo e(__('Free Layouts')); ?></h5>
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="row theme-changer">
                                                <?php $__currentLoopData = \App\Models\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $key_mapping = \App\Models\Utility::getThemeMapping($key); ?>
                                                    <div class="col-6 col-md-4 cc-selector mb-2">
                                                        <div class="mb-3 screen image">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg'))); ?>"
                                                                class="img-center pro_max_width pro_max_height <?php echo e($key); ?>_img">
                                                            <div class="actions">
                                                                <a href="">
                                                                    <button type="button"
                                                                        class="btn btn-default delete-image-btn pull-right">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                    </button>
                                                                </a>
                                                                <a href="">
                                                                    <button type="button"
                                                                        class="btn btn-default edit-image-btn pull-right">
                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row gutters-xs theme_color"
                                                                id="<?php echo e($key); ?>">
                                                                <div
                                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                                    <label class="colorinput">
                                                                        <input name="theme_color" type="radio"
                                                                            value="white-black-color.css"
                                                                            data-theme="<?php echo e($key); ?>"
                                                                            data-imgpath="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg'))); ?>"
                                                                            class="colorinput-input"
                                                                            <?php echo e(isset($store_settings['store_theme']) && $store_settings['store_theme'] == $key ? 'checked' : ''); ?>>
                                                                        <span class="colorinput-color-v2"></span>
                                                                        <label style="font-size: 12px">&nbsp;
                                                                            <?php echo e(__('Set')); ?>

                                                                            <?php echo e($key_mapping); ?></label>
                                                                    </label>
                                                                    <div style="margin-left: 5px">
                                                                        <button type="submit"
                                                                            class="btn btn-xs btn-primary"
                                                                            title="<?php echo e(__('Save')); ?>"
                                                                            style="display: none;padding: 4px 10px;"><i
                                                                                class="fas fa-save"></i></button>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                            <?php if($plan->premium_layouts == 'on'): ?>
                                                <h5 class="mt-3 mb-4"><?php echo e(__('Premium Layouts')); ?></h5>
                                                <div class="row theme-changer">
                                                    <?php $__currentLoopData = \App\Models\Utility::premiumPlusThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $key_mapping = \App\Models\Utility::getThemeMapping($key); ?>
                                                        <div class="col-12 col-md-4 cc-selector mb-2">
                                                            <div class="mb-3 screen image">
                                                                <img src="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg'))); ?>"
                                                                    class="img-center pro_max_width pro_max_height <?php echo e($key); ?>_img">
                                                                <div class="actions">
                                                                    <a href="">
                                                                        <button type="button"
                                                                            class="btn btn-default delete-image-btn pull-right">
                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                        </button>
                                                                    </a>
                                                                    <a href="">
                                                                        <button type="button"
                                                                            class="btn btn-default edit-image-btn pull-right">
                                                                            <span
                                                                                class="glyphicon glyphicon-pencil"></span>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row gutters-xs theme_color"
                                                                    id="<?php echo e($key_mapping); ?>">
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center align-items-center">
                                                                        <label class="colorinput">
                                                                            <input name="theme_color" type="radio"
                                                                                value="white-black-color.css"
                                                                                data-theme="<?php echo e($key); ?>"
                                                                                data-imgpath="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg'))); ?>"
                                                                                class="colorinput-input"
                                                                                <?php echo e(isset($store_settings['store_theme']) && $store_settings['store_theme'] == $key ? 'checked' : ''); ?>>
                                                                            <span class="colorinput-color-v2"></span>
                                                                            <label style="font-size: 12px">&nbsp;
                                                                                <?php echo e(__('Set')); ?>

                                                                                <?php echo e($key); ?></label>
                                                                        </label>
                                                                        <div style="margin-left: 5px">
                                                                            <button type="submit"
                                                                                class="btn btn-xs btn-primary"
                                                                                title="<?php echo e(__('Save')); ?>"
                                                                                style="display: none;padding-left:12px;padding-right:12px;"><i
                                                                                    class="fas fa-save"></i></button>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>


                                        </div>
                                    </div>
                                </div>


                                
                                <?php echo e(Form::hidden('themefile', null, ['id' => 'themefile'])); ?>


                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!in_array('cookie-bot', $initial_setup)): ?>
                        <div id="cookie-bot" class="card">
                            <div class="card-header">
                                <h5><?php echo e(__('Cookie Bot')); ?>

                                    <small class="text-muted">[<?php echo e(__('Optional')); ?>]</small>
                                </h5>
                                <small class="text-dark font-weight-bold">
                                    <?php echo e(__("CookieScript is essential for GDPR, CCPA (California Consumer Privacy Act), and the 'EU Cookie Directive' compliance. Without a cookie script, websites risk non-compliance and potential warnings. Implementing CookieScript ensures a seamless way to meet these regulations and maintain user privacy.")); ?>

                                </small>
                            </div>

                            <div class="tab-pane " id="cookie-bot">
                                <?php echo e(Form::open(['route' => ['store.cookie.bot'], 'method' => 'PUT'])); ?>


                                <div class="border p-3 rounded stripe-payment-div">

                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check form-switch float-end">
                                                    <label class="form-check-label" for="is_cookiebot_enable">
                                                        <?php echo e(__('Enable')); ?>

                                                    </label>
                                                    <input type="checkbox" class="form-check-input"
                                                        id="is_cookiebot_enable" name="is_cookiebot_enable"
                                                        value="on"
                                                        <?php echo e($store_settings->is_cookiebot_enable == 'on' ? 'checked=checked' : ''); ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h5> <?php echo e(__('API Mode')); ?> </h5>

                                                <div class="row mt-2">
                                                    <div class="col-sm-3 form-group">
                                                        <div class="form-check form-check-inline mb">
                                                            <input type="radio" id="cookiebot_api_mode_sandbox"
                                                                name="cookiebot_api_mode" value="sandbox"
                                                                class="form-check-input"
                                                                <?php echo e($store_settings->cookiebot_api_mode == 'sandbox' ? 'checked' : ''); ?>>

                                                            <label class="form-check-label"
                                                                for="cookiebot_api_mode_sandbox"><?php echo e(__('Sandbox')); ?></label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb">
                                                            <input type="radio" id="cookiebot_api_mode_live"
                                                                name="cookiebot_api_mode" value="live"
                                                                class="form-check-input"
                                                                <?php echo e($store_settings->cookiebot_api_mode == 'live' ? 'checked' : ''); ?>>

                                                            <label class="form-check-label"
                                                                for="cookiebot_api_mode_live"><?php echo e(__('Live')); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h5> <?php echo e(__('Cookie Bot Group ID')); ?> </h5>

                                                <div class="col-lg col-md col-sm form-group">
                                                    <input class="form-control" name="cookie_bot_group_id" type="text"
                                                        value="<?php echo e($store_settings->cookiebot_group_id); ?>"
                                                        id="cookie_bot_group_id"
                                                        placeholder="Paste your Cookie bot Group ID here">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-12 my-2 px-2">
                                    <div class="text-end">

                                        <input type="submit" value="<?php echo e(__('Continue')); ?>"
                                            class="btn btn-xs btn-primary">
                                    </div>
                                </div>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminv2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/initial-setup.blade.php ENDPATH**/ ?>