<?php
    $logo = asset(Storage::url('uploads/logo/'));
    $logo_light = \App\Models\Utility::getValByName('company_logo_light');
    $logo_dark = \App\Models\Utility::getValByName('company_logo_dark');
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
?>
<?php $__env->startSection('page-title'); ?>
    <?php if(Auth::user()->type == 'super admin'): ?>
        <?php echo e(__('Setting')); ?>

    <?php else: ?>
        <?php echo e(__('Setting')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <?php if(Auth::user()->type == 'super admin'): ?>
            <h5 class="h4 d-inline-block font-weight-bold mb-0 text-white"><?php echo e(__('Setting')); ?></h5>
        <?php else: ?>
            <h5 class="h4 d-inline-block font-weight-bold mb-0 text-white"><?php echo e(__('Setting')); ?></h5>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Setting')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
    <style>
        hr {
            margin: 8px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,

        })
        $(".list-group-item").click(function() {
            $('.list-group-item').filter(function() {
                return this.href == id;
            }).parent().removeClass('text-primary');
        });
    </script>
    <script>
        $(document).ready(function() {
            if ($('.gdpr_fulltime').is(':checked')) {

                $('.fulltime').show();
            } else {

                $('.fulltime').hide();
            }

            $('#gdpr_cookie').on('change', function() {
                if ($('.gdpr_fulltime').is(':checked')) {

                    $('.fulltime').show();
                } else {

                    $('.fulltime').hide();
                }
            });
        });
    </script>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,

        })
        $(".list-group-item").click(function() {
            $('.list-group-item').filter(function() {
                return this.href == id;
            }).parent().removeClass('text-primary');
        });
    </script>
    <script>
        function check_theme(color_val) {
            $('.theme-color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <?php if(Auth::user()->type == 'Owner'): ?>
                                

                                
                            <?php endif; ?>

                            <?php if(Auth::user()->type == 'super admin'): ?>
                                <a href="#site-setting" id="site_setting_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Site Settings')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#payment-setting" id="payment-setting_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Payment Setting')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#email-settings"
                                    class="list-group-item list-group-item-action dash-link "><?php echo e(__('Email Setting')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>

                                <a href="#recaptcha-settings"
                                    class="list-group-item list-group-item-action"><?php echo e(__('ReCaptcha Setting')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>

                                <a href="#term-and-condition"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Term & condition')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>

                                <a href="#car2db-api" class="list-group-item list-group-item-action"><?php echo e(__('Car2db API')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <?php if(Auth::user()->type == 'Owner'): ?>
                        
                        
                        
                        
                        
                        
                        
                        
                    <?php endif; ?>

                    <?php if(Auth::user()->type == 'super admin'): ?>
                        <div class="" id="site-setting">
                            <?php echo e(Form::model($settings, ['route' => 'business.setting', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Site Settings')); ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5><?php echo e(__('Logo dark')); ?></h5>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <div class=" setting-card">
                                                                <div class="logo-content mt-4">
                                                                    <img src="<?php echo e(asset(Storage::url('uploads/logo/logo-dark.png'))); ?>"
                                                                        width="170px" class="img_setting">
                                                                    
                                                                </div>
                                                                <div class="choose-files mt-5">
                                                                    <label for="logo_dark">
                                                                        <div class=" bg-primary full_logo"> <i
                                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                        </div>
                                                                        <input type="file" name="logo_dark"
                                                                            id="logo_dark" class="form-control file"
                                                                            data-filename="logo_dark">
                                                                    </label>
                                                                </div>
                                                                <?php $__errorArgs = ['logo_dark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="row">
                                                                        <span class="invalid-logo" role="alert">
                                                                            <strong
                                                                                class="text-danger"><?php echo e($message); ?></strong>
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
                                                            <h5><?php echo e(__('Logo Light')); ?></h5>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <div class=" setting-card">
                                                                <div class="logo-content mt-4">
                                                                    <img src="<?php echo e(asset(Storage::url('uploads/logo/logo-light.png'))); ?>"
                                                                        width="170px" class=" img_setting">
                                                                    
                                                                </div>
                                                                <div class="choose-files mt-5">
                                                                    <label for="logo_light">
                                                                        <div class=" bg-primary"> <i
                                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                        </div>
                                                                        <input type="file" class="form-control file"
                                                                            name="logo_light" id="logo_light"
                                                                            data-filename="logo_light">
                                                                    </label>
                                                                </div>
                                                                <?php $__errorArgs = ['logo_light'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="row">
                                                                        <span class="invalid-logo" role="alert">
                                                                            <strong
                                                                                class="text-danger"><?php echo e($message); ?></strong>
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
                                                            <h5><?php echo e(__('Favicon')); ?></h5>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <div class=" setting-card">
                                                                <div class="logo-content mt-3">
                                                                    <img src="<?php echo e($logo . '/' . 'favicon.png'); ?>"
                                                                        width="50px" height="50px"
                                                                        class="img_setting favicon">
                                                                </div>
                                                                
                                                                <div class="choose-files mt-5">
                                                                    <label for="favicon">
                                                                        <div class=" bg-primary favicon_update"> <i
                                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                        </div>
                                                                        <input type="file" class="form-control file"
                                                                            id="favicon" name="favicon"
                                                                            data-filename="favicon_update">
                                                                    </label>
                                                                </div>
                                                                <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="row">
                                                                        <span class="invalid-logo" role="alert">
                                                                            <strong
                                                                                class="text-danger"><?php echo e($message); ?></strong>
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
                                                    <?php echo e(Form::label('title_text', __('Title Text'), ['class' => 'form-label'])); ?>

                                                    <?php echo e(Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')])); ?>

                                                    <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-title_text" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'form-label'])); ?>

                                                    <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                                    <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-footer_text" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <?php echo e(Form::label('default_language', __('Default Language'), ['class' => 'form-label'])); ?>

                                                    <div class="changeLanguage">
                                                        <select name="default_language" id="default_language"
                                                            class="form-control" data-toggle="select">
                                                            <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option <?php if($lang == $language): ?> selected <?php endif; ?>
                                                                    value="<?php echo e($language); ?>">
                                                                    <?php echo e(Str::upper($language)); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('currency_symbol', __('Currency Symbol*'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('currency_symbol', $settings['currency_symbol'], ['class' => 'form-control'])); ?>

                                                        <small><?php echo e(__('Note: This value will assign when any new store created by Store Owner.')); ?></small>
                                                        <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-currency_symbol" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 mb-0">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('currency', __('Currency *'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('currency', $settings['currency'], ['class' => 'form-control font-style'])); ?>

                                                        <small><?php echo e(__('Note: This value will assign when any new store created by Store Owner.')); ?></small>
                                                        <small>
                                                            <a href="https://stripe.com/docs/currencies"
                                                                target="_blank"><?php echo e(__('you can find out here..')); ?></a>
                                                        </small>
                                                        <br>
                                                        <small>
                                                            <?php echo e(__('This value will assign when any new store created by Store Owner.')); ?>

                                                        </small>

                                                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-currency" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                    </div>
                                                </div>
                                                <div class="form-group col-6 col-md-3">
                                                    <div class="custom-control custom-switch p-0">
                                                        <label class="form-check-label"
                                                            for="gdpr_cookie"><?php echo e(__('GDPR Cookie')); ?></label><br>
                                                        <input type="checkbox"
                                                            class="form-check-input gdpr_fulltime gdpr_type"
                                                            data-toggle="switchbutton" data-onstyle="primary"
                                                            name="gdpr_cookie" id="gdpr_cookie"
                                                            <?php echo e(isset($settings['gdpr_cookie']) && $settings['gdpr_cookie'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    </div>
                                                </div>

                                                <div class="form-group col-6 col-md-3">
                                                    <div class="custom-control form-switch p-0">
                                                        <label class="form-check-label"
                                                            for="display_landing_page"><?php echo e(__('Enable Landing Page')); ?></label><br>
                                                        <input type="checkbox" name="display_landing_page"
                                                            class="form-check-input" id="display_landing_page"
                                                            data-toggle="switchbutton"
                                                            <?php echo e($settings['display_landing_page'] == 'on' ? 'checked="checked"' : ''); ?>

                                                            data-onstyle="primary">
                                                    </div>
                                                </div>

                                                <div class="form-group col-6 col-md-3">
                                                    <div class="custom-control form-switch p-0">
                                                        <label class="form-check-label"
                                                            for="SITE_RTL"><?php echo e(__('RTL')); ?></label><br>
                                                        <input type="checkbox" class="form-check-input"
                                                            data-toggle="switchbutton" data-onstyle="primary"
                                                            name="SITE_RTL" id="SITE_RTL"
                                                            <?php echo e($settings['SITE_RTL'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6 col-md-3">
                                                    <div class="custom-control form-switch p-0">
                                                        <label class="form-check-label"
                                                            for="signup_button"><?php echo e(__('Sign Up')); ?></label><br>
                                                        <input type="checkbox" name="signup_button"
                                                            class="form-check-input" id="signup_button"
                                                            data-toggle="switchbutton"
                                                            <?php echo e(Utility::getValByName('signup_button') == 'on' ? 'checked="checked"' : ''); ?>

                                                            data-onstyle="primary">
                                                    </div>
                                                </div>
                                                <div class="form-group col-6 col-md-3">
                                                    <div class="custom-control form-switch p-0">
                                                        <label class="form-check-label"
                                                            for="premium_free_trial"><?php echo e(__('Premium Plan Free Trial')); ?></label><br>
                                                        <input type="checkbox" name="premium_free_trial"
                                                            class="form-check-input" id="premium_free_trial"
                                                            data-toggle="switchbutton"
                                                            <?php echo e(Utility::getValByName('premium_free_trial') == 'on' ? 'checked="checked"' : ''); ?>

                                                            data-onstyle="primary">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <?php echo e(Form::label('cookie_text', __('GDPR Cookie Text'), ['class' => 'fulltime form-label'])); ?>

                                                    <?php echo Form::textarea(
                                                        'cookie_text',
                                                        isset($settings['cookie_text']) && $settings['cookie_text'] ? $settings['cookie_text'] : '',
                                                        ['class' => 'form-control fulltime', 'style' => 'display: hidden;resize: none;', 'rows' => '2'],
                                                    ); ?>


                                                </div>
                                                <div class="setting-card setting-logo-box p-3">
                                                    <div class="row">
                                                        <h5><?php echo e(__('Theme Customizer')); ?></h5>
                                                        <div class="col-4 my-auto">
                                                            <h6 class="mt-2">
                                                                <i data-feather="credit-card"
                                                                    class="me-2"></i><?php echo e(__('Primary color settings')); ?>

                                                            </h6>
                                                            <hr class="my-2" />
                                                            <div class="theme-color themes-color">
                                                                <a href="#!"
                                                                    class="<?php echo e($settings['color'] == 'theme-1' ? 'active_color' : ''); ?>"
                                                                    data-value="theme-1"
                                                                    onclick="check_theme('theme-1')"></a>
                                                                <input type="radio" class="theme_color" name="color"
                                                                    value="theme-1" style="display: none;">

                                                                <a href="#!"
                                                                    class="<?php echo e($settings['color'] == 'theme-2' ? 'active_color' : ''); ?>"
                                                                    data-value="theme-2"
                                                                    onclick="check_theme('theme-2')"></a>
                                                                <input type="radio" class="theme_color" name="color"
                                                                    value="theme-2" style="display: none;">

                                                                <a href="#!"
                                                                    class="<?php echo e($settings['color'] == 'theme-3' ? 'active_color' : ''); ?>"
                                                                    data-value="theme-3"
                                                                    onclick="check_theme('theme-3')"></a>
                                                                <input type="radio" class="theme_color" name="color"
                                                                    value="theme-3" style="display: none;">

                                                                <a href="#!"
                                                                    class="<?php echo e($settings['color'] == 'theme-4' ? 'active_color' : ''); ?>"
                                                                    data-value="theme-4"
                                                                    onclick="check_theme('theme-4')"></a>
                                                                <input type="radio" class="theme_color" name="color"
                                                                    value="theme-4" style="display: none;">

                                                                <a href="#!"
                                                                    class="<?php echo e($settings['color'] == 'theme-5' ? 'active_color' : ''); ?>"
                                                                    data-value="theme-5"
                                                                    onclick="check_theme('theme-5')"></a>
                                                                <input type="radio" class="theme_color" name="color"
                                                                    value="theme-5" style="display: none;">

                                                                <a href="#!"
                                                                    class="<?php echo e($settings['color'] == 'theme-6' ? 'active_color' : ''); ?>"
                                                                    data-value="theme-6"
                                                                    onclick="check_theme('theme-6')"></a>
                                                                <input type="radio" class="theme_color" name="color"
                                                                    value="theme-6" style="display: none;">
                                                            </div>
                                                        </div>
                                                        <div class="col-4 my-auto mt-2">
                                                            <h6 class="">
                                                                <i data-feather="layout"
                                                                    class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                                            </h6>
                                                            <hr class="my-2" />
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="cust-theme-bg" name="cust_theme_bg"
                                                                    <?php echo e(Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : ''); ?> />
                                                                <label class="form-check-label f-w-600 pl-1"
                                                                    for="cust-theme-bg"><?php echo e(__('Transparent layout')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 my-auto mt-2">
                                                            <h6 class="">
                                                                <i data-feather="sun"
                                                                    class="me-2"></i><?php echo e(__('Layout settings')); ?>

                                                            </h6>
                                                            <hr class="my-2" />
                                                            <div class="form-check form-switch mt-2">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="cust-darklayout" name="cust_darklayout"
                                                                    <?php echo e(Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : ''); ?> />
                                                                <label class="form-check-label f-w-600 pl-1"
                                                                    for="cust-darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-footer p-0">
                                                    <div class="col-sm-12 mt-3 px-2">
                                                        <div class="text-end">
                                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                        <div class="card" id="payment-setting">
                            <div class="card-header">
                                <h5><?php echo e('Payment Setting'); ?></h5>
                                <small
                                    class="text-dark font-weight-bold"><?php echo e(__('This detail will use for make purchase of plan')); ?></small>
                            </div>
                            <div class="card-body">
                                <form id="setting-form" method="post" action="<?php echo e(route('payment.setting')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                            <label class="col-form-label"><?php echo e(__('Currency')); ?></label>
                                                            <input type="text" name="currency" class="form-control"
                                                                id="currency" value="<?php echo e(env('CURRENCY')); ?>" required>
                                                            <small class="text-xs">
                                                                <?php echo e(__('Note: Add currency code as per three-letter ISO code')); ?>.
                                                                <a href="https://stripe.com/docs/currencies"
                                                                    target="_blank"><?php echo e(__('you can find out here..')); ?></a>
                                                            </small>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                            <label for="currency_symbol"
                                                                class="col-form-label"><?php echo e(__('Currency Symbol')); ?></label>
                                                            <input type="text" name="currency_symbol"
                                                                class="form-control" id="currency_symbol"
                                                                value="<?php echo e(env('CURRENCY_SYMBOL')); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq justify-content-center">
                                        <div class="col-sm-12 col-md-10 col-xxl-12">
                                            <div class="accordion accordion-flush" id="accordionExample">
                                                <!-- Strip -->
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading-2-2">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                            aria-expanded="true" aria-controls="collapse1">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Stripe')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse1" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-2" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_stripe_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_stripe_enabled"
                                                                            id="is_stripe_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_stripe_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'col-form-label'])); ?>

                                                                        <?php echo e(Form::text('stripe_key', isset($admin_payment_setting['stripe_key']) ? $admin_payment_setting['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')])); ?>

                                                                        <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span class="invalid-stripe_key" role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
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

                                                                        <?php echo e(Form::text('stripe_secret', isset($admin_payment_setting['stripe_secret']) ? $admin_payment_setting['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')])); ?>

                                                                        <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span class="invalid-stripe_secret"
                                                                                role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                            aria-expanded="true" aria-controls="collapse2">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Paypal')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse2" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-3" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_paypal_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_paypal_enabled"
                                                                            id="is_paypal_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="paypal_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['paypal_mode']) || $admin_payment_setting['paypal_mode'] == '' || $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="paypal_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
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
                                                                        <input type="text" name="paypal_client_id"
                                                                            id="paypal_client_id" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['paypal_client_id']) || is_null($admin_payment_setting['paypal_client_id']) ? '' : $admin_payment_setting['paypal_client_id']); ?>"
                                                                            placeholder="<?php echo e(__('Client ID')); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_secret_key"
                                                                            class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                        <input type="text" name="paypal_secret_key"
                                                                            id="paypal_secret_key" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['paypal_secret_key']) || is_null($admin_payment_setting['paypal_secret_key']) ? '' : $admin_payment_setting['paypal_secret_key']); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse3"
                                                            aria-expanded="true" aria-controls="collapse3">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Paystack')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse3" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-4" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_paystack_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_paystack_enabled"
                                                                            id="is_paystack_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                            value="<?php echo e(!isset($admin_payment_setting['paystack_public_key']) || is_null($admin_payment_setting['paystack_public_key']) ? '' : $admin_payment_setting['paystack_public_key']); ?>"
                                                                            placeholder="<?php echo e(__('Public Key')); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                        <input type="text" name="paystack_secret_key"
                                                                            id="paystack_secret_key" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['paystack_secret_key']) || is_null($admin_payment_setting['paystack_secret_key']) ? '' : $admin_payment_setting['paystack_secret_key']); ?>"
                                                                            placeholder="<?php echo e(__('Secret Key')); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- FLUTTERWAVE -->
                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header" id="heading-2-5">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse4"
                                                            aria-expanded="true" aria-controls="collapse4">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Flutterwave')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse4" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-5" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden"
                                                                            name="is_flutterwave_enabled" value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_flutterwave_enabled"
                                                                            id="is_flutterwave_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_flutterwave_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paypal_client_id"
                                                                            class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                        <input type="text"
                                                                            name="flutterwave_public_key"
                                                                            id="flutterwave_public_key"
                                                                            class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['flutterwave_public_key']) || is_null($admin_payment_setting['flutterwave_public_key']) ? '' : $admin_payment_setting['flutterwave_public_key']); ?>"
                                                                            placeholder="Public Key">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                        <input type="text"
                                                                            name="flutterwave_secret_key"
                                                                            id="flutterwave_secret_key"
                                                                            class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['flutterwave_secret_key']) || is_null($admin_payment_setting['flutterwave_secret_key']) ? '' : $admin_payment_setting['flutterwave_secret_key']); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse5"
                                                            aria-expanded="true" aria-controls="collapse5">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Razorpay')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse5" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-6" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_razorpay_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_razorpay_enabled"
                                                                            id="is_razorpay_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                            value="<?php echo e(!isset($admin_payment_setting['razorpay_public_key']) || is_null($admin_payment_setting['razorpay_public_key']) ? '' : $admin_payment_setting['razorpay_public_key']); ?>"
                                                                            placeholder="Public Key">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paystack_secret_key"
                                                                            class="col-form-label">
                                                                            <?php echo e(__('Secret Key')); ?></label>
                                                                        <input type="text" name="razorpay_secret_key"
                                                                            id="razorpay_secret_key" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['razorpay_secret_key']) || is_null($admin_payment_setting['razorpay_secret_key']) ? '' : $admin_payment_setting['razorpay_secret_key']); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse6"
                                                            aria-expanded="true" aria-controls="collapse6">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Paytm')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse6" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-7" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_paytm_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_paytm_enabled" id="is_paytm_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="paytm_mode"
                                                                                            value="local"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['paytm_mode']) || $admin_payment_setting['paytm_mode'] == '' || $admin_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Local')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="paytm_mode"
                                                                                            value="production"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
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
                                                                        <input type="text" name="paytm_merchant_id"
                                                                            id="paytm_merchant_id" class="form-control"
                                                                            value="<?php echo e(isset($admin_payment_setting['paytm_merchant_id']) ? $admin_payment_setting['paytm_merchant_id'] : ''); ?>"
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
                                                                            value="<?php echo e(isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key'] : ''); ?>"
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
                                                                            value="<?php echo e(isset($admin_payment_setting['paytm_industry_type']) ? $admin_payment_setting['paytm_industry_type'] : ''); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse7"
                                                            aria-expanded="true" aria-controls="collapse7">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Mercado Pago')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse7" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-8" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_mercado_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_mercado_enabled"
                                                                            id="is_mercado_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="mercado_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e((isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == '') || (isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="mercado_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
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
                                                                            value="<?php echo e(isset($admin_payment_setting['mercado_access_token']) ? $admin_payment_setting['mercado_access_token'] : ''); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse8"
                                                            aria-expanded="true" aria-controls="collapse8">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Mollie')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse8" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-9" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_mollie_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_mollie_enabled"
                                                                            id="is_mollie_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_mollie_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_api_key"
                                                                            class="col-form-label"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                        <input type="text" name="mollie_api_key"
                                                                            id="mollie_api_key" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['mollie_api_key']) || is_null($admin_payment_setting['mollie_api_key']) ? '' : $admin_payment_setting['mollie_api_key']); ?>"
                                                                            placeholder="Mollie Api Key">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_profile_id"
                                                                            class="col-form-label"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                                        <input type="text" name="mollie_profile_id"
                                                                            id="mollie_profile_id" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['mollie_profile_id']) || is_null($admin_payment_setting['mollie_profile_id']) ? '' : $admin_payment_setting['mollie_profile_id']); ?>"
                                                                            placeholder="Mollie Profile Id">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_partner_id"
                                                                            class="col-form-label"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                                        <input type="text" name="mollie_partner_id"
                                                                            id="mollie_partner_id" class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['mollie_partner_id']) || is_null($admin_payment_setting['mollie_partner_id']) ? '' : $admin_payment_setting['mollie_partner_id']); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse9"
                                                            aria-expanded="true" aria-controls="collapse9">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('Skrill')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse9" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-10" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_skrill_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_skrill_enabled"
                                                                            id="is_skrill_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_skrill_enabled"><?php echo e(__('Enable')); ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mollie_api_key"
                                                                            class="col-form-label"><?php echo e(__('Skrill Email')); ?></label>
                                                                        <input type="email" name="skrill_email"
                                                                            id="skrill_email" class="form-control"
                                                                            value="<?php echo e(isset($admin_payment_setting['skrill_email']) ? $admin_payment_setting['skrill_email'] : ''); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse10"
                                                            aria-expanded="true" aria-controls="collapse10">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('CoinGate')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse10" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-11" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden" name="is_coingate_enabled"
                                                                            value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_coingate_enabled"
                                                                            id="is_coingate_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="sandbox"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(!isset($admin_payment_setting['coingate_mode']) || $admin_payment_setting['coingate_mode'] == '' || $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2">
                                                                            <div class="border card p-3">
                                                                                <div class="form-check">
                                                                                    <label
                                                                                        class="form-check-labe text-dark">
                                                                                        <input type="radio"
                                                                                            name="coingate_mode"
                                                                                            value="live"
                                                                                            class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
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
                                                                            value="<?php echo e(!isset($admin_payment_setting['coingate_auth_token']) || is_null($admin_payment_setting['coingate_auth_token']) ? '' : $admin_payment_setting['coingate_auth_token']); ?>"
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
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse11"
                                                            aria-expanded="true" aria-controls="collapse11">
                                                            <span class="d-flex align-items-center">
                                                                <i class="ti ti-credit-card text-primary"></i>
                                                                <?php echo e(__('PaymentWall')); ?>

                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapse11" class="accordion-collapse collapse"
                                                        aria-labelledby="heading-2-12" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-6 py-2">
                                                                    
                                                                </div>
                                                                <div class="col-6 py-2 text-end">
                                                                    <div
                                                                        class="form-check form-switch form-switch-right mb-2">
                                                                        <input type="hidden"
                                                                            name="is_paymentwall_enabled" value="off">
                                                                        <input type="checkbox"
                                                                            class="form-check-input mx-2"
                                                                            name="is_paymentwall_enabled"
                                                                            id="is_paymentwall_enabled"
                                                                            <?php echo e(isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label"
                                                                            for="is_paymentwall_enabled"><?php echo e(__('Enable')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paymentwall_public_key"
                                                                            class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                        <input type="text"
                                                                            name="paymentwall_public_key"
                                                                            id="paymentwall_public_key"
                                                                            class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['paymentwall_public_key']) || is_null($admin_payment_setting['paymentwall_public_key']) ? '' : $admin_payment_setting['paymentwall_public_key']); ?>"
                                                                            placeholder="<?php echo e(__('Public Key')); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="paymentwall_private_key"
                                                                            class="col-form-label"><?php echo e(__('Private Key')); ?></label>
                                                                        <input type="text"
                                                                            name="paymentwall_private_key"
                                                                            id="paymentwall_private_key"
                                                                            class="form-control"
                                                                            value="<?php echo e(!isset($admin_payment_setting['paymentwall_private_key']) || is_null($admin_payment_setting['paymentwall_private_key']) ? '' : $admin_payment_setting['paymentwall_private_key']); ?>"
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
                                    <div class="card-footer p-0">
                                        <div class="col-sm-12 mt-3 px-2">
                                            <div class="text-end">
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div id="email-settings" class="tab-pane">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            <?php echo e(__('Email settings')); ?>

                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <?php echo e(Form::open(['route' => 'email.setting', 'method' => 'post'])); ?>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                                <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')])); ?>

                                                <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                                <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_port" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                                <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_username" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

                                                <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_password" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                                <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_encryption" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                                <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_from_address" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                                <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_from_name" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>
                                        <div class="col-lg-12 ">
                                            <div class="row">
                                                <div class=" text-end">
                                                    <div class="card-footer p-0">
                                                        <div class="col-sm-12 mt-3 px-2">
                                                            <div class="d-flex justify-content-between">
                                                                <a href="#" data-ajax-popup="true" data-size="md"
                                                                    data-url="<?php echo e(route('test.mail')); ?>"
                                                                    data-title="<?php echo e(__('Send Test Mail')); ?>"
                                                                    class="btn btn-xs  btn-primary send_email">
                                                                    <?php echo e(__('Send Test Mail')); ?>

                                                                </a>
                                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="recaptcha-settings" class="card">
                            <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>"
                                accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <h5 class=""><?php echo e(__('ReCaptcha settings')); ?></h5><small
                                                    class="text-secondary font-weight-bold"><a
                                                        href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                        target="_blank" class="text-blue">
                                                        <small>(<?php echo e(__('How to Get Google reCaptcha Site and Secret key')); ?>)</small>
                                                    </a></small>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 text-end">
                                                <div class="col switch-width">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" data-toggle="switchbutton"
                                                            data-onstyle="primary" class="" value="yes"
                                                            name="recaptcha_module" id="recaptcha_module"
                                                            <?php echo e(!empty(env('RECAPTCHA_MODULE')) && env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : ''); ?>>
                                                        <label class="custom-control-label form-control-label px-2"
                                                            for="recaptcha_module "></label><br>
                                                        <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                            target="_blank" class="text-blue">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <?php echo csrf_field(); ?>
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_key"
                                                    class="form-label"><?php echo e(__('Google Recaptcha Key')); ?></label>
                                                <input class="form-control"
                                                    placeholder="<?php echo e(__('Enter Google Recaptcha Key')); ?>"
                                                    name="google_recaptcha_key" type="text"
                                                    value="<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>" id="google_recaptcha_key">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_secret"
                                                    class="form-label"><?php echo e(__('Google Recaptcha Secret')); ?></label>
                                                <input class="form-control "
                                                    placeholder="<?php echo e(__('Enter Google Recaptcha Secret')); ?>"
                                                    name="google_recaptcha_secret" type="text"
                                                    value="<?php echo e(env('NOCAPTCHA_SECRET')); ?>"
                                                    id="google_recaptcha_secret">
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            <div class="col-sm-12 mt-3 px-2">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="term-and-condition" class="card">
                            <form method="POST" action="<?php echo e(route('term-and-condition.store')); ?>"
                                accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <h5 class=""><?php echo e(__('Term & condition')); ?></h5>
                                                <small class="text-secondary font-weight-bold"><a
                                                        href="<?php echo e(route('terms', app()->getLocale())); ?>"
                                                        target="_blank" class="text-blue">
                                                        <small><?php echo e(route('terms', app()->getLocale())); ?></small>
                                                    </a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php echo csrf_field(); ?>
                                        <?php
                                            $languages = App\Models\Utility::languages();
                                        ?>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="nav-item" role="presentation">
                                                    <button
                                                        class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                        id="<?php echo e($lang); ?>-tab" data-bs-toggle="tab"
                                                        data-bs-target="#<?php echo e($lang); ?>" type="button"
                                                        role="tab" aria-controls="home"
                                                        aria-selected="true"><?php echo e(Str::upper($lang)); ?></button>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <?php
                                                
                                                $term = Utility::getAdminSetting('term_and_condition');
                                                $lang = App::getLocale();
                                                if ($term) {
                                                    $term = json_decode($term);
                                                    $term = $term->$lang;
                                                }
                                            ?>
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                    id="<?php echo e($lang); ?>" role="tabpanel"
                                                    aria-labelledby="<?php echo e($lang); ?>-tab">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 mt-3">
                                                            <?php echo e(Form::label('' . $lang . '_contents', __('Content'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::textarea('' . $lang . '_contents', $term, ['class' => 'form-control', 'rows' => 20, 'placeholder' => __('Content')])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        
                                        <div class="card-footer p-0">
                                            <div class="col-sm-12 mt-3 px-2">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="car2db-api" class="card">
                            <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>"
                                accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <h5 class=""><?php echo e(__('Car2db API')); ?></h5><small
                                                    class="text-secondary font-weight-bold"><a
                                                        href="https://api.car2db.com/api/auto/v1/" target="_blank"
                                                        class="text-blue">
                                                        <small>(<?php echo e(__('Car database REST API Car2Db.com')); ?>)</small>
                                                    </a></small>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 text-end">
                                                <div class="col switch-width">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" data-toggle="switchbutton"
                                                            data-onstyle="primary" class="" value="yes"
                                                            name="car2db_module" id="car2db_module"
                                                            <?php echo e(!empty(env('CAR2DB_MODULE')) && env('CAR2DB_MODULE') == 'yes' ? 'checked="checked"' : ''); ?>>
                                                        <label class="custom-control-label form-control-label px-2"
                                                            for="car2db_module "></label><br>
                                                        <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                            target="_blank" class="text-blue">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <?php echo csrf_field(); ?>
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="car2db_api_key"
                                                    class="form-label"><?php echo e(__('API Key')); ?></label>
                                                <input class="form-control" name="car2db_api_key" type="text"
                                                    value="" id="car2db_api_key">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="car2db_api_url"
                                                    class="form-label"><?php echo e(__('API URL')); ?></label>
                                                <input class="form-control " name="car2db_api_url" type="text"
                                                    value="" id="car2db_api_url">
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            <div class="col-sm-12 mt-3 px-2">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
            <!-- [ sample-page ] end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>

    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            show_toastr('Success', "<?php echo e(__('Link copied')); ?>", 'success');
        }



        $(document).ready(function() {

            $(document).on('click', 'input[name="theme_color"]', function() {
                var eleParent = $(this).attr('data-theme');
                $('#themefile').val(eleParent);
                var imgpath = $(this).attr('data-imgpath');
                $('.' + eleParent + '_img').attr('src', imgpath);
            });


            setTimeout(function(e) {
                var checked = $("input[type=radio][name='theme_color']:checked");
                $('#themefile').val(checked.attr('data-theme'));
                $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
            }, 300);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/index.blade.php ENDPATH**/ ?>