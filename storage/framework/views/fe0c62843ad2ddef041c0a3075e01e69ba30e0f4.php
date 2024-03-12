<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Site Settings')); ?>

<?php $__env->stopSection(); ?>
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
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Site Settings')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Site Settings')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        function check_theme(color_val) {
            $('.theme-color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 'Owner'): ?>
        <?php echo e(Form::model($settings, ['route' => 'business.setting', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Logo dark')); ?></h5>
                                    </div>

                                    <div class="card-body pt-0">
                                        <div class="setting-card">
                                            <div class="logo-content mt-4">
                                                
                                                <img src="<?php echo e($logo . '/' . (isset($logo_dark) && !empty($logo_dark) ? $logo_dark : 'logo-dark.png')); ?>"
                                                    width="170px" class="img_setting">
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_logo">
                                                    <div class=" bg-primary company_logo_update"> <i
                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                    </div>
                                                    <input type="file" name="logo_dark" id="company_logo"
                                                        class="form-control file " data-filename="company_logo_update">
                                                </label>
                                            </div>
                                            <?php $__errorArgs = ['company_logo'];
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
                                        <h5><?php echo e(__('Logo Light')); ?></h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-4">

                                                <img src="<?php echo e($logo . '/' . (isset($logo_light) && !empty($logo_light) ? $logo_light : 'logo-light.png')); ?>"
                                                    class=" img_setting" width="170px">
                                                
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_logo_light">
                                                    <div class=" bg-primary dark_logo_update"> <i
                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                    </div>
                                                    <input type="file" class="form-control file" name="logo_light"
                                                        id="company_logo_light" data-filename="dark_logo_update">
                                                </label>
                                            </div>
                                            <?php $__errorArgs = ['company_logo_light'];
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
                                        <h5><?php echo e(__('Favicon')); ?></h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class=" setting-card">
                                            <div class="logo-content mt-3">
                                                <img src="<?php echo e($logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png')); ?>"
                                                    width="50px" height="50px" class=" img_setting favicon">
                                                
                                            </div>
                                            <div class="choose-files mt-5">
                                                <label for="company_favicon">
                                                    <div class=" bg-primary company_favicon_update"> <i
                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                    </div>
                                                    <input type="file" class="form-control file" id="company_favicon"
                                                        name="favicon" data-filename="company_favicon_update">
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

                            <div class="form-group col-md-4">
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
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('address', __('Address'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Address')])); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('zip_code', __('Zip Code'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => __('Zip Code')])); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('city', __('City'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('City')])); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('vat_number', __('Vat Number'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('vat_number', null, ['class' => 'form-control', 'placeholder' => __('Vat Number')])); ?>

                                <small class="text-xs">
                                    <?php echo e(__('Vat Number is used in invoices and various other locations')); ?>.
                                </small>
                            </div>
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>


                                <?php if(!$copyright_plan->price): ?>
                                    <small class="text-xs">
                                        <?php echo __('join copyright plan', [
                                            'default_copyright_text' => __('Free Car Dealer Website Powered By') . ' ' . env('APP_NAME'),
                                            'copyright_plan' => "<a href='" . route('copyright-plan.index') . "'>" . __('Copyright Plan') . '</a>',
                                        ]); ?>.
                                    </small>
                                   
                                <?php endif; ?>


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
                                <?php echo e(Form::label('phone_number', __('Phone Number'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => __('Phone Number')])); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('fax_number', __('Fax Number'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('fax_number', null, ['class' => 'form-control', 'placeholder' => __('Fax Number')])); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email')])); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo e(Form::label('website', __('Website'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('Website')])); ?>

                            </div>
                            <div class="form-group col-md-12">
                                <?php echo e(Form::label('bank_number', __('Bank Transfer'), ['class' => 'col-form-label'])); ?>

                                <?php echo e(Form::textarea('bank_number', null, ['class' => 'form-control', 'rows' => '4'])); ?>

                                <small class="text-xs">
                                    <?php echo e(__('Note: Input your bank details including bank name.')); ?>

                                </small>
                            </div>

                            <ul class="nav nav-tabs" role="tablist">
                                <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                            id="<?php echo e($lang); ?>-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#<?php echo e($lang); ?>"
                                            type="button" role="tab"
                                            aria-controls="home"
                                            aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="tab-content">
                                <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                        id="<?php echo e($lang); ?>" role="tabpanel"
                                        aria-labelledby="<?php echo e($lang); ?>-tab">

                                        <div class="form-group col-md-12">
                                            <?php echo e(Form::label('' . $lang . '_terms_and_conditions', __('Term & condition'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::textarea('' . $lang . '_terms_and_conditions', null, ['class' => 'form-control', 'rows' => '4'])); ?>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                            

                            <div class="form-group col-md-6">
                                <label for="site_date_format" class="form-label"><?php echo e(__('Date Format')); ?></label>
                                <select type="text" name="site_date_format" class="form-control" data-toggle="select"
                                    id="site_date_format">
                                    <option value="M j, Y" <?php if(@$settings['site_date_format'] == 'M j, Y'): ?> selected="selected" <?php endif; ?>>
                                        Jan 1,2015</option>
                                    <option value="d-m-Y" <?php if(@$settings['site_date_format'] == 'd-m-Y'): ?> selected="selected" <?php endif; ?>>
                                        d-m-y</option>
                                    <option value="m-d-Y" <?php if(@$settings['site_date_format'] == 'm-d-Y'): ?> selected="selected" <?php endif; ?>>
                                        m-d-y</option>
                                    <option value="Y-m-d" <?php if(@$settings['site_date_format'] == 'Y-m-d'): ?> selected="selected" <?php endif; ?>>
                                        y-m-d</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="site_time_format" class="form-label"><?php echo e(__('Time Format')); ?></label>
                                <select type="text" name="site_time_format" class="form-control" data-toggle="select"
                                    id="site_time_format">
                                    <option value="g:i A" <?php if(@$settings['site_time_format'] == 'g:i A'): ?> selected="selected" <?php endif; ?>>
                                        10:30 PM</option>
                                    <option value="g:i a" <?php if(@$settings['site_time_format'] == 'g:i a'): ?> selected="selected" <?php endif; ?>>
                                        10:30 pm</option>
                                    <option value="H:i" <?php if(@$settings['site_time_format'] == 'H:i'): ?> selected="selected" <?php endif; ?>>
                                        22:30</option>
                                </select>
                            </div>

                            <div class="form-group col-6 col-md-3">
                                <div class="custom-control form-switch p-0">
                                    <label class="form-check-label" for="SITE_RTL"><?php echo e(__('RTL')); ?></label><br>
                                    <input type="checkbox" class="form-check-input" data-toggle="switchbutton"
                                        data-onstyle="primary" name="SITE_RTL" id="SITE_RTL"
                                        <?php echo e($settings['SITE_RTL'] == 'on' ? 'checked="checked"' : ''); ?>>
                                </div>
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
                                                data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-1"
                                                style="display: none;">

                                            <a href="#!"
                                                class="<?php echo e($settings['color'] == 'theme-2' ? 'active_color' : ''); ?>"
                                                data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-2"
                                                style="display: none;">

                                            <a href="#!"
                                                class="<?php echo e($settings['color'] == 'theme-3' ? 'active_color' : ''); ?>"
                                                data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-3"
                                                style="display: none;">

                                            <a href="#!"
                                                class="<?php echo e($settings['color'] == 'theme-4' ? 'active_color' : ''); ?>"
                                                data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-4"
                                                style="display: none;">

                                            <a href="#!"
                                                class="<?php echo e($settings['color'] == 'theme-5' ? 'active_color' : ''); ?>"
                                                data-value="theme-5" onclick="check_theme('theme-5')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-5"
                                                style="display: none;">

                                            <a href="#!"
                                                class="<?php echo e($settings['color'] == 'theme-6' ? 'active_color' : ''); ?>"
                                                data-value="theme-6" onclick="check_theme('theme-6')"></a>
                                            <input type="radio" class="theme_color" name="color" value="theme-6"
                                                style="display: none;">
                                        </div>
                                        
                                    </div>
                                    <div class="col-4 my-auto mt-2">
                                        <h6 class="">
                                            <i data-feather="layout" class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                        </h6>
                                        <hr class="my-2" />
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="cust-theme-bg"
                                                name="cust_theme_bg"
                                                <?php echo e(Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : ''); ?> />
                                            <label class="form-check-label f-w-600 pl-1"
                                                for="cust-theme-bg"><?php echo e(__('Transparent layout')); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-4 my-auto mt-2">
                                        <h6 class="">
                                            <i data-feather="sun" class="me-2"></i><?php echo e(__('Layout settings')); ?>

                                        </h6>
                                        <hr class="my-2" />
                                        <div class="form-check form-switch mt-2">
                                            <input type="checkbox" class="form-check-input" id="cust-darklayout"
                                                name="cust_darklayout"
                                                <?php echo e($settings['cust_darklayout'] == 'on' ? 'checked="checked"' : ''); ?> />
                                            <label class="form-check-label f-w-600 pl-1"
                                                for="cust-darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="col-sm-12 px-2">
                            <div class="text-end">
                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/site_setting.blade.php ENDPATH**/ ?>