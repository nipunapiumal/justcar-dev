<?php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::getValByName('company_logo');
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store->lang;
    }
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Store Theme Setting')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a>
    </li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('settings')); ?>"><?php echo e(__('Settings')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Store Theme Setting')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-bold mb-0 text-white"><?php echo e(__('Store Theme Setting')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
    <style>
        hr {
            margin: 8px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <?php if(Auth::user()->type == 'Owner'): ?>
                                <?php if($plan->premium_layouts == 'on' && $theme == 'themePlus1'): ?>
                                    <a href="#Style_Switcher" id="Style_Switcher_tab"
                                        class="list-group-item list-group-item-action">
                                        <?php echo e(__('Style Switcher')); ?>

                                        <div class="float-end">
                                            <i class="ti ti-chevron-right"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <a href="#Top_Bar_Setting" id="Top_Bar_Setting_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Top Bar Setting')); ?> <div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                
                                <?php if($theme != 'theme3'): ?>
                                    <a href="#Header_Setting" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Header Setting')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>
                                <a href="#Header_Navigation" id="Header_Navigation_tab"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Header Navigation')); ?>

                                        <div
                                            class="float-end">
                                            <i class="ti ti-chevron-right"></i>
                                        </div>
                                        </a>
                                <?php if($theme != 'theme1'): ?>
                                    <a href="#Quick_Contact_Info" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Sidebar Panel')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>
                                <?php if($theme != 'theme1'): ?>
                                    <a href="#Galleries" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Gallery')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>
                                <?php if($plan->job_board == 'on'): ?>
                                    <a href="#JobBoard" id="Header_Setting_tab"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Job Board')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>
                                <a href="#Features_Setting" id="Features_Setting_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Features Setting')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php if($theme != 'theme3'): ?>
                                    <a href="#Email_Subscriber_Setting" id="Email_Subscriber_Setting_tab"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Email Subscriber Setting')); ?>

                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                <?php endif; ?>
                                <a href="#Categories" id="Categories_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Categories')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <a href="#Testimonials" id="Testimonials_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Testimonials')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php if($theme != 'theme3'): ?>
                                    <a href="#Brand_Logo" id="Brand_Logo_tab"
                                        class="list-group-item list-group-item-action"><?php echo e(__('Brand Logo')); ?><div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <?php endif; ?>

                                
                                <a href="#Footer_1" id="Footer_1_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Footer 1')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                
                                
                                <a href="#Footer_2" id="Footer_2_tab"
                                    class="list-group-item list-group-item-action"><?php echo e(__('Social Media & Copyright')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#Content_Sharing" id="Content_Sharing_tab"
                                    class="list-group-item list-group-item-action">
                                    <?php echo e(__('Content Sharing')); ?>

                                    <div class="float-end">
                                        <i class="ti ti-chevron-right"></i>
                                    </div>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <?php if(Auth::user()->type == 'Owner'): ?>

                    <div class="col-xl-9">
                        <?php echo e(Form::open(['route' => ['store.storeeditproducts', [$store->slug, $theme]], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>


                        <?php if(in_array($theme, Utility::styleSwitcherEnabledThemes())): ?>
                            <div class="active" id="Style_Switcher">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Style Switcher')); ?></h5>
                                                    <small>
                                                        <?php echo e(__('Note: This detail will use to change header setting.')); ?></small>
                                                </div>

                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('premium_plus_primary_color', __('Primary Color'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::color('premium_plus_primary_color', !empty($getStoreThemeSetting['premium_plus_primary_color']) ? $getStoreThemeSetting['premium_plus_primary_color'] : '', ['class' => 'form-control'])); ?>

                                                                <?php $__errorArgs = ['premium_plus_primary_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('premium_plus_secondary_color', __('Secondary Color'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::color('premium_plus_secondary_color', !empty($getStoreThemeSetting['premium_plus_secondary_color']) ? $getStoreThemeSetting['premium_plus_secondary_color'] : '', ['class' => 'form-control'])); ?>

                                                                <?php $__errorArgs = ['premium_plus_secondary_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('premium_plus_tertiary_color', __('Tertiary Color'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::color('premium_plus_tertiary_color', !empty($getStoreThemeSetting['premium_plus_tertiary_color']) ? $getStoreThemeSetting['premium_plus_tertiary_color'] : '', ['class' => 'form-control'])); ?>

                                                                <?php $__errorArgs = ['premium_plus_tertiary_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3">
                                                            <div class="form-group">

                                                                <?php echo e(Form::label('premium_plus_quaternary_color', __('Quaternary Color'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::color('premium_plus_quaternary_color', !empty($getStoreThemeSetting['premium_plus_quaternary_color']) ? $getStoreThemeSetting['premium_plus_quaternary_color'] : '', ['class' => 'form-control'])); ?>

                                                                <?php $__errorArgs = ['premium_plus_quaternary_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_title" role="alert">
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
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if($theme != 'theme2'): ?>
                            <div class="active" id="Top_Bar_Setting">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Top Bar Setting')); ?>

                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="<?php echo e(asset(Storage::url('uploads/guide/guide4.jpeg'))); ?>">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        <?php echo e(__('Note: This detail will use to change header setting.')); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_top_bar" value="off">
                                                        <?php if(!empty($getStoreThemeSetting['enable_top_bar'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_top_bar" id="enable_top_bar"
                                                                <?php echo e($getStoreThemeSetting['enable_top_bar'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_top_bar" id="enable_top_bar">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_top_bar"><?php echo e(__('Enable')); ?>

                                                            <?php echo e(__('Top Bar Setting')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-md-12 mt-3">
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

                                                                        <?php
                                                                            $data = !empty($getStoreThemeSetting['top_bar_title']) ? json_decode($getStoreThemeSetting['top_bar_title']) : '';
                                                                            if (empty($data->$lang)) {
                                                                                $value = '';
                                                                            } else {
                                                                                $value = $data->$lang == '**********' ? '' : $data->$lang;
                                                                            }
                                                                        ?>


                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_top_bar_title', __('Top Bar Title'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_top_bar_title', $value, ['class' => 'form-control', 'placeholder' => __('Enter Top Bar Title')])); ?>

                                                                            <?php $__errorArgs = ['top_bar_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-top_bar_title"
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
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>




                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('top_bar_number', __('Top Bar Number'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('top_bar_number', !empty($getStoreThemeSetting['top_bar_number']) ? $getStoreThemeSetting['top_bar_number'] : '', ['class' => 'form-control', 'placeholder' => __('Top Bar Number')])); ?>

                                                                <?php $__errorArgs = ['top_bar_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_number" role="alert">
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
                                                                <?php echo e(Form::label('top_bar_whatsapp', __('Whatsapp'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('top_bar_whatsapp', !empty($getStoreThemeSetting['top_bar_whatsapp']) ? $getStoreThemeSetting['top_bar_whatsapp'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Whatsapp')])); ?>

                                                                <?php $__errorArgs = ['top_bar_whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_whatsapp" role="alert">
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
                                                                <?php echo e(Form::label('top_bar_instagram', __('Instagram'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('top_bar_instagram', !empty($getStoreThemeSetting['top_bar_instagram']) ? $getStoreThemeSetting['top_bar_instagram'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Instagram')])); ?>

                                                                <?php $__errorArgs = ['top_bar_instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_instagram" role="alert">
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
                                                                <?php echo e(Form::label('top_bar_twitter', __('Twitter'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('top_bar_twitter', !empty($getStoreThemeSetting['top_bar_twitter']) ? $getStoreThemeSetting['top_bar_twitter'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Twitter')])); ?>

                                                                <?php $__errorArgs = ['top_bar_twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_twitter" role="alert">
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
                                                                <?php echo e(Form::label('top_bar_messenger', __('Messenger'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('top_bar_messenger', !empty($getStoreThemeSetting['top_bar_messenger']) ? $getStoreThemeSetting['top_bar_messenger'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Messenger')])); ?>

                                                                <?php $__errorArgs = ['top_bar_messenger'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_messenger" role="alert">
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
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                        

                        <?php if($theme != 'theme3'): ?>
                            <div class="active" id="Header_Setting">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Header Setting')); ?>

                                                        <?php if(!empty($getStoreThemeSetting['header_img'])): ?>
                                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                                class="view-img-link popup-img-dashboard" target="_blank"
                                                                href="<?php echo e(asset(Storage::url('uploads/guide/guide1.jpeg'))); ?>">
                                                                <i class="far fa-question-circle"></i></a>
                                                        <?php endif; ?>

                                                        
                                                    </h5>

                                                    <small>
                                                        <?php echo e(__('Note: This detail will use to change header setting.')); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_header_img" value="off">
                                                        <?php if(isset($getStoreThemeSetting['enable_header_img'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_header_img" id="enable_header_img"
                                                                <?php echo e($getStoreThemeSetting['enable_header_img'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_header_img" id="enable_header_img">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_header_img"><?php echo e(__('Enable Header Img')); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="header_img"
                                                                    class="col-form-label"><?php echo e(__('Header Image')); ?>

                                                                </label>
                                                                <input type="file" name="header_img" id="header_img"
                                                                    value="<?php echo e(!empty($getStoreThemeSetting['header_img']) ? $getStoreThemeSetting['header_img'] : ''); ?>"
                                                                    class="form-control custom-input-file">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                            <h4 class="mt-3"><?php echo e(__('autoGallery')); ?></h4>
                                                            <div class="text-center">
                                                                <small>
                                                                    <?php echo __('autoGallery introducing text', [
                                                                        'url' =>
                                                                            "<a class='ag-trigger' data-type='header_img' data-url='" .
                                                                            route('auto-gallery.show', ['header_img']) .
                                                                            "' href='javascript:void(0)' >" .
                                                                            __('autoGallery') .
                                                                            '</a>',
                                                                    ]); ?>

                                                                </small>
                                                                <?php echo e(Form::hidden('ag_header_img')); ?>

                                                            </div>
                                                            <a class="btn btn-sm btn-primary ag-trigger mt-2 mb-2"
                                                                data-type='header_img'
                                                                data-url="<?php echo e(route('auto-gallery.show', ['header_img'])); ?>"><i
                                                                    class="fas fa-plus"></i>
                                                                <?php echo e(__('Browse')); ?>

                                                            </a>
                                                        </div>
                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                        id="Header_Setting_<?php echo e($lang); ?>-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Header_Setting_<?php echo e($lang); ?>"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Header_Setting_<?php echo e($lang); ?>"
                                                                    role="tabpanel"
                                                                    aria-labelledby="Header_Setting_<?php echo e($lang); ?>-tab">


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_header_title', __('Header Title'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_header_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['header_title'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Header Title')])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_header_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-header_title"
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
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_header_desc', __('Header Description'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_header_desc', \App\Models\Utility::getTranslation($getStoreThemeSetting['header_desc'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Header Description')])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_header_desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-header_desc"
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
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_button_text', __('Header Button Text'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_button_text', \App\Models\Utility::getTranslation($getStoreThemeSetting['button_text'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Header Button Text')])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_button_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-button_text"
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
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php endif; ?>
                        <div class="active" id="Header_Navigation">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5>
                                                    <?php echo e(__('Header Navigation')); ?>

                                                  
                                                </h5>

                                                <small>
                                                    <?php echo e(__('Here, you can arrange your navigation menu in the order that you prefer.')); ?>

                                                </small>
                                            </div>
                                            <div class="text-end">
                                                <a class="btn btn-sm btn-primary mt-2"
                                                href="<?php echo e(route('custom-page.index')); ?>" 
                                                
                                                
                                                
                                                >
                                                <i
                                            class="fas fa-plus"></i>
                                            <?php echo e(__('Create')); ?> <?php echo e(__('Custom Page')); ?>

                                    </a>
                                                
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label"><?php echo e(__('Selection Area')); ?>

                                                            </label>
                                                        </div>
                                                        <div id="item-list">
                                                            <ul class="list-group menu-list"
                                                                id="sortable-list" data-name="selection_nav_menu[]"
                                                                style="list-style-type: none">
                                                                <li class="list-group-item disabled">
                                                                    <i class="fas fa-angle-double-down"></i>
                                                                    <?php echo e(__('Drop Here')); ?>

                                                                </li>
                                                                        <?php $__currentLoopData = Utility::defaultMenuV2($getStoreThemeSetting, $store, $plan,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                            <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                            <?php if(isset($page_slug_url->name)): ?>
                                                                                <li class="list-group-item"
                                                                                    data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                </li>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <li class="list-group-item"
                                                                                data-name="<?php echo e($menu_title); ?>">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                <?php echo e(__($menu_title)); ?>

                                                                            </li>
                                                                        <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                            </ul>
                                                        </div>
                                                        <div id="sorted-info">
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label"><?php echo e(__('Primary Menu')); ?>

                                                            </label>
                                                        </div>
                                                        
                                                        <div class="menu">
                                                            <ul class="list-group menu-list"
                                                                id="sortable-primary" data-name="primary_nav_menu[]"
                                                                style="list-style-type: none">
                                                                <li class="list-group-item disabled">
                                                                    <i class="fas fa-angle-double-down"></i>
                                                                    <?php echo e(__('Drop Here')); ?>

                                                                </li>
                                                                <?php if(isset($getStoreThemeSetting['primary_nav_menu']) && $getStoreThemeSetting['primary_nav_menu']): ?>
                                                                    <?php $__currentLoopData = json_decode($getStoreThemeSetting['primary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                            <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                            <?php if(isset($page_slug_url->name)): ?>
                                                                                <li class="list-group-item"
                                                                                    data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                </li>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <li class="list-group-item"
                                                                                data-name="<?php echo e($menu_title); ?>">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                <?php echo e(__($menu_title)); ?>

                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>



                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label"><?php echo e(__('Secondary Menu')); ?>

                                                            </label>
                                                        </div>
                                                        
                                                        <div class="menu">
                                                            <ul class="list-group menu-list"
                                                                id="sortable-secondary" data-name="secondary_nav_menu[]"
                                                                style="list-style-type: none">
                                                                <li class="list-group-item disabled">
                                                                    <i class="fas fa-angle-double-down"></i>
                                                                    <?php echo e(__('Drop Here')); ?>

                                                                </li>
                                                                <?php if(isset($getStoreThemeSetting['secondary_nav_menu']) && $getStoreThemeSetting['secondary_nav_menu']): ?>
                                                                    <?php $__currentLoopData = json_decode($getStoreThemeSetting['secondary_nav_menu']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                            <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                            <?php if(isset($page_slug_url->name)): ?>
                                                                                <li class="list-group-item"
                                                                                    data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                </li>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <li class="list-group-item"
                                                                                data-name="<?php echo e($menu_title); ?>">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                <?php echo e(__($menu_title)); ?>

                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($theme != 'theme1'): ?>
                            <div class="active">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Slider Setting')); ?></h5>
                                                    <small>
                                                        <?php echo e(__('Note: If you enable the Slider Settings, Header Settings will not work!')); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_slider_settings"
                                                            value="off">
                                                        <?php if(isset($getStoreThemeSetting['enable_slider_settings'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_slider_settings" id="enable_slider_settings"
                                                                <?php echo e($getStoreThemeSetting['enable_slider_settings'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_slider_settings" id="enable_slider_settings">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_slider_settings"><?php echo e(__('Enable Slider Settings')); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="setting-card">
                                                    <div class="row mt-3" id="sliders">
                                                        <?php
                                                            $i = 1;
                                                            $locale = App::getLocale();
                                                            $slider_settings = [];
                                                            if (isset(json_decode($getStoreThemeSetting['slider_settings'])->$locale)) {
                                                                $slider_settings = json_decode($getStoreThemeSetting['slider_settings'])->$locale;
                                                            } elseif (isset(json_decode($getStoreThemeSetting['slider_settings'])->en)) {
                                                                $slider_settings = json_decode($getStoreThemeSetting['slider_settings'])->en;
                                                            }

                                                            $index = 0;

                                                        ?>
                                                        <?php if($slider_settings): ?>
                                                            <?php

                                                            ?>
                                                            <?php $__currentLoopData = $slider_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row slider align-items-start "
                                                                    id="slider-<?php echo e($i); ?>">
                                                                    <div class="col-md-4">

                                                                        <input type="hidden" name="slider_image_old[]"
                                                                            value="<?php echo e($sliderSettings->slider_image); ?>">
                                                                        <a class="popup-img-dashboard" target="_blank"
                                                                            href="<?php echo e(asset(Storage::url('uploads/store_logo/' . $sliderSettings->slider_image))); ?>">
                                                                            <img class="img-whp img-thumbnail img-fluid cover"
                                                                                style="height: 135px;width:200px;object-fit:cover"
                                                                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $sliderSettings->slider_image))); ?>"
                                                                                alt="Image"></a>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <input type="file" name="slider_image[]"
                                                                                class="form-control custom-input-file"
                                                                                placeholder="<?php echo e(__('Slider Image')); ?>">
                                                                        </div>


                                                                        <ul class="nav nav-tabs" role="tablist">
                                                                            <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li class="nav-item" role="presentation">
                                                                                    <button
                                                                                        class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                                        id="Slider_Setting_<?php echo e($key); ?>-<?php echo e($lang); ?>-tab"
                                                                                        data-bs-toggle="tab"
                                                                                        data-bs-target="#Slider_Setting_<?php echo e($key); ?>-<?php echo e($lang); ?>"
                                                                                        type="button" role="tab"
                                                                                        aria-controls="home"
                                                                                        aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                        <div class="tab-content">
                                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                                    id="Slider_Setting_<?php echo e($key); ?>-<?php echo e($lang); ?>"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="Slider_Setting_<?php echo e($key); ?>-<?php echo e($lang); ?>-tab">


                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <?php

                                                                                                if (isset(json_decode($getStoreThemeSetting['slider_settings'])->$lang)) {
                                                                                                    $current_slider_settings = json_decode($getStoreThemeSetting['slider_settings'])->$lang;
                                                                                                }

                                                                                            ?>
                                                                                            <?php echo e(Form::text('' . $lang . '_slider_title[]', isset($current_slider_settings) ? $current_slider_settings[$key]->slider_title : '', ['class' => 'form-control', 'placeholder' => __('Enter Slider Title')])); ?>

                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <?php echo e(Form::text('' . $lang . '_slider_description[]', isset($current_slider_settings) ? $current_slider_settings[$key]->slider_description : '', ['class' => 'form-control', 'placeholder' => __('Enter Slider Description')])); ?>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                        
                                                                        
                                                                    </div>
                                                                    <hr>

                                                                    <?php if($i != 1): ?>
                                                                        <div class="col-md-12 mb-3 text-center">
                                                                            <button type="button"
                                                                                class="btn btn-default text-danger"
                                                                                onclick="removeSlider(<?php echo e($i); ?>)">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php
                                                                    $i++;
                                                                    $index++;
                                                                ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <div class="row slider align-items-start">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <input type="file" name="slider_image[]"
                                                                            class="form-control custom-input-file"
                                                                            placeholder="<?php echo e(__('Slider Image')); ?>">
                                                                    </div>
                                                                </div>
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                                    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li class="nav-item" role="presentation">
                                                                            <button
                                                                                class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                                id="Slider_Setting_0-<?php echo e($lang); ?>-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#Slider_Setting_0-<?php echo e($lang); ?>"
                                                                                type="button" role="tab"
                                                                                aria-controls="home"
                                                                                aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                                <div class="tab-content">
                                                                    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                            id="Slider_Setting_0-<?php echo e($lang); ?>"
                                                                            role="tabpanel"
                                                                            aria-labelledby="Slider_Setting_0-<?php echo e($lang); ?>-tab">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::text('' . $lang . '_slider_title[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Title')])); ?>

                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::text('' . $lang . '_slider_description[]', null, ['class' => 'form-control', 'placeholder' => __('Enter Slider Description')])); ?>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                                
                                                                <hr>
                                                            </div>
                                                        <?php endif; ?>



                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                onclick="addNewSlider(<?php echo e(json_encode($store_languages)); ?>,'<?php echo e(basename(App::getLocale())); ?>')"><i
                                                                    class="fas fa-plus"></i>
                                                                <?php echo e(__('Add New Slider')); ?>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($theme != 'theme1'): ?>
                            <div class="active" id="Quick_Contact_Info">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Sidebar Panel')); ?>

                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="<?php echo e(asset(Storage::url('uploads/guide/guide6.jpeg'))); ?>">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        <?php echo e(__('Note: This detail will use to change header setting.')); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_sidebar_panel" value="off">
                                                        <?php if(isset($getStoreThemeSetting['enable_sidebar_panel'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_sidebar_panel" id="enable_sidebar_panel"
                                                                <?php echo e($getStoreThemeSetting['enable_sidebar_panel'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_sidebar_panel" id="enable_sidebar_panel">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_sidebar_panel"><?php echo e(__('Enable Sidebar Panel')); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="setting-card">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('contact_info_phone_no', __('Phone Number'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('contact_info_phone_no', isset($getStoreThemeSetting['contact_info_phone_no']) ? $getStoreThemeSetting['contact_info_phone_no'] : '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])); ?>

                                                        <?php $__errorArgs = ['contact_info_phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-quick_contact_info" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('contact_info_email', __('Email'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('contact_info_email', isset($getStoreThemeSetting['contact_info_email']) ? $getStoreThemeSetting['contact_info_email'] : '', ['class' => 'form-control', 'placeholder' => 'Email'])); ?>

                                                        <?php $__errorArgs = ['contact_info_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-quick_contact_info" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Quick_Contact_Info<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Quick_Contact_Info<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>

                                                    <div class="tab-content">



                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Quick_Contact_Info<?php echo e($lang); ?>"
                                                                role="tabpanel"
                                                                aria-labelledby="Quick_Contact_Info<?php echo e($lang); ?>-tab">

                                                                <div class="row">


                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_quick_contact_info', __('Quick Contact Info'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::textarea('' . $lang . '_quick_contact_info', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_contact_info'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Quick Contact Info', 'maxlength' => '300'])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_quick_contact_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-quick_contact_info"
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
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_office_address', __('Office Address'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::textarea('' . $lang . '_office_address', \App\Models\Utility::getTranslation($getStoreThemeSetting['office_address'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Office Address', 'maxlength' => '300'])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_office_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-office_address"
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
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_opening_hours', __('Opening Hours'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::textarea('' . $lang . '_opening_hours', \App\Models\Utility::getTranslation($getStoreThemeSetting['opening_hours'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Opening Hours', 'maxlength' => '300'])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_opening_hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-opening_hours"
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
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-6 mt-3">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('sidebar_panel_background_color', __('Background Color'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::color('sidebar_panel_background_color', !empty($getStoreThemeSetting['sidebar_panel_background_color']) ? $getStoreThemeSetting['sidebar_panel_background_color'] : '#0A2357', ['class' => 'form-control'])); ?>

                                                                <?php $__errorArgs = ['sidebar_panel_background_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_title" role="alert">
                                                                        <strong
                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('sidebar_panel_foreground_color', __('Foreground Color'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::color('sidebar_panel_foreground_color', !empty($getStoreThemeSetting['sidebar_panel_foreground_color']) ? $getStoreThemeSetting['sidebar_panel_foreground_color'] : '#ffffff', ['class' => 'form-control'])); ?>

                                                                <?php $__errorArgs = ['sidebar_panel_foreground_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-top_bar_title" role="alert">
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
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if($theme != 'theme1'): ?>
                            <div class="active" id="Galleries">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Gallery')); ?>

                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="<?php echo e(asset(Storage::url('uploads/guide/guide5.jpeg'))); ?>">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        <?php echo e(__('Note : This detail will use for make explore social media.')); ?>

                                                    </small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_gallery" value="off">
                                                        <?php if(!empty($getStoreThemeSetting['enable_gallery'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_gallery" id="enable_gallery"
                                                                <?php echo e($getStoreThemeSetting['enable_gallery'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_gallery" id="enable_gallery">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_gallery"><?php echo e(__('Enable Gallery')); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Galleries<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Galleries<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Galleries<?php echo e($lang); ?>" role="tabpanel"
                                                                aria-labelledby="Galleries<?php echo e($lang); ?>-tab">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_gallery_title', __('Title'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_gallery_title', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['gallery_title']) ? $getStoreThemeSetting['gallery_title'] : '', $lang), ['class' => 'form-control', 'placeholder' => 'Title'])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_gallery_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-gallery_title"
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
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_gallery_description', __('Description'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::textarea('' . $lang . '_gallery_description', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['gallery_description']) ? $getStoreThemeSetting['gallery_description'] : '', $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description'])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_gallery_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-gallery_description"
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
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>




                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($plan->job_board == 'on'): ?>
                            <div class="active" id="JobBoard">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Job Board')); ?></h5>
                                                    <small>
                                                        <?php echo e(__('Note : This detail will use for make explore social media.')); ?>

                                                    </small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_job_board" value="off">
                                                        <?php if(!empty($getStoreThemeSetting['enable_job_board'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_job_board" id="enable_job_board"
                                                                <?php echo e($getStoreThemeSetting['enable_job_board'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_job_board" id="enable_job_board">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_job_board"><?php echo e(__('Enable Job Board')); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="JobBoard<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#JobBoard<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="JobBoard<?php echo e($lang); ?>" role="tabpanel"
                                                                aria-labelledby="JobBoard<?php echo e($lang); ?>-tab">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_job_board_title', __('Title'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_job_board_title', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['job_board_title']) ? $getStoreThemeSetting['job_board_title'] : '', $lang), ['class' => 'form-control', 'placeholder' => 'Title'])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_job_board_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-gallery_title"
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
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_job_board_description', __('Description'), ['class' => 'col-form-label'])); ?>

                                                                            <?php echo e(Form::textarea('' . $lang . '_job_board_description', \App\Models\Utility::getTranslation(isset($getStoreThemeSetting['job_board_description']) ? $getStoreThemeSetting['job_board_description'] : '', $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description'])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_job_board_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-gallery_description"
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
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>




                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="active" id="Features_Setting">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5><?php echo e(__('Features Setting')); ?>

                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="<?php echo e(asset(Storage::url('uploads/guide/guide7.jpeg'))); ?>">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    <?php echo e(__('Note: This detail will use to change header setting.')); ?></small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_features" value="off">
                                                    <?php if(!empty($getStoreThemeSetting['enable_features'])): ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_features" id="enable_features"
                                                            <?php echo e($getStoreThemeSetting['enable_features'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <?php else: ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_features" id="enable_features">
                                                    <?php endif; ?>
                                                    <label class="form-check-label"
                                                        for="enable_features"><?php echo e(__('Enable Features')); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <hr class="">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_features1" value="off">
                                                            <?php if(!empty($getStoreThemeSetting['enable_features1'])): ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features1" id="enable_features1"
                                                                    <?php echo e($getStoreThemeSetting['enable_features1'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features1" id="enable_features1">
                                                            <?php endif; ?>
                                                            <label class="form-check-label"
                                                                for="enable_features1"><?php echo e(__('Enable Features 1')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('features_icon1', __('Features Font Icon 1'), ['class' => 'col-form-label'])); ?>


                                                            <?php
                                                                $iconList = Storage::get('uploads/fa_icon_list/fa_5.txt');
                                                                $iconList = explode(',', $iconList);
                                                            ?>

                                                            <select class="form-control icon-select" name="features_icon1"
                                                                id="features_icon1">
                                                                <?php $__currentLoopData = $iconList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<i class='<?php echo e($icon); ?>'></i>"
                                                                        <?php echo e(!empty($getStoreThemeSetting['features_icon1']) && $getStoreThemeSetting['features_icon1'] == "<i class='$icon'></i>" ? 'selected' : ''); ?>>
                                                                        <?php echo e($icon); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                            


                                                            
                                                            <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2"
                                                                target="_blank">
                                                                <small><?php echo e(__('Please click here to find font')); ?></small>
                                                                ... <b
                                                                    class="text-sm font-weight-bold"><?php echo e(__('fontawesome.com')); ?></b>
                                                            </a>
                                                            <?php $__errorArgs = ['features_icon1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-features_icon1" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Features_Setting0<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Features_Setting0<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Features_Setting0<?php echo e($lang); ?>"
                                                                role="tabpanel"
                                                                aria-labelledby="Features_Setting0<?php echo e($lang); ?>-tab">
                                                                <div class="row">
                                                                    <?php if($theme != 'theme5'): ?>
                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_features_title1', __('Features Title 1'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_features_title1', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_title1'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter features Title 1')])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang . '_features_title1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span class="invalid-features_title1"
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
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_features_description1', __('Features Description 1'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_features_description1', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_description1'], $lang), ['class' => 'form-control', 'placeholder' => __('Features Description 1')])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_features_description1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-features_description1"
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
                                                                    <?php endif; ?>
                                                                </div>


                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <hr class="">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_features2" value="off">
                                                            <?php if(!empty($getStoreThemeSetting['enable_features2'])): ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features2" id="enable_features2"
                                                                    <?php echo e($getStoreThemeSetting['enable_features2'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features2" id="enable_features2">
                                                            <?php endif; ?>
                                                            <label class="form-check-label"
                                                                for="enable_features2"><?php echo e(__('Enable Features 2')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('features_icon2', __('Features Font Icon 2'), ['class' => 'col-form-label'])); ?>

                                                            <select class="form-control icon-select" name="features_icon2"
                                                                id="features_icon2">
                                                                <?php $__currentLoopData = $iconList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<i class='<?php echo e($icon); ?>'></i>"
                                                                        <?php echo e(!empty($getStoreThemeSetting['features_icon2']) && $getStoreThemeSetting['features_icon2'] == "<i class='$icon'></i>" ? 'selected' : ''); ?>>
                                                                        <?php echo e($icon); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                            
                                                            <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2"
                                                                target="_blank">
                                                                <small><?php echo e(__('Please click here to find font')); ?></small>
                                                                ... <b
                                                                    class="text-sm font-weight-bold"><?php echo e(__('fontawesome.com')); ?></b>
                                                            </a>
                                                            <?php $__errorArgs = ['features_icon2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-features_icon2" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Features_Setting1<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Features_Setting1<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Features_Setting1<?php echo e($lang); ?>"
                                                                role="tabpanel"
                                                                aria-labelledby="Features_Setting1<?php echo e($lang); ?>-tab">
                                                                <div class="row">
                                                                    <?php if($theme != 'theme5'): ?>
                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_features_title2', __('Features Title 1'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_features_title2', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_title2'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter features Title 2')])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang . '_features_title2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span class="invalid-features_title1"
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
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_features_description2', __('Features Description 1'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_features_description2', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_description2'], $lang), ['class' => 'form-control', 'placeholder' => __('Features Description 2')])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_features_description2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-features_description1"
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
                                                                    <?php endif; ?>
                                                                </div>


                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                    
                                                </div>
                                                <div class="row">
                                                    <hr class="">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_features3" value="off">
                                                            <?php if(!empty($getStoreThemeSetting['enable_features3'])): ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features3" id="enable_features3"
                                                                    <?php echo e($getStoreThemeSetting['enable_features3'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_features3" id="enable_features3">
                                                            <?php endif; ?>
                                                            <label class="form-check-label"
                                                                for="enable_features3"><?php echo e(__('Enable Features 3')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('features_icon3', __('Features Font Icon 3'), ['class' => 'col-form-label'])); ?>

                                                            <select class="form-control icon-select" name="features_icon3"
                                                                id="features_icon3">
                                                                <?php $__currentLoopData = $iconList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<i class='<?php echo e($icon); ?>'></i>"
                                                                        <?php echo e(!empty($getStoreThemeSetting['features_icon3']) && $getStoreThemeSetting['features_icon3'] == "<i class='$icon'></i>" ? 'selected' : ''); ?>>
                                                                        <?php echo e($icon); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            
                                                            <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2"
                                                                target="_blank">
                                                                <small><?php echo e(__('Please click here to find font')); ?></small>
                                                                ... <b
                                                                    class="text-sm font-weight-bold"><?php echo e(__('fontawesome.com')); ?></b>
                                                            </a>
                                                            <?php $__errorArgs = ['features_icon3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-features_icon3" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Features_Setting2<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Features_Setting2<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Features_Setting2<?php echo e($lang); ?>"
                                                                role="tabpanel"
                                                                aria-labelledby="Features_Setting2<?php echo e($lang); ?>-tab">
                                                                <div class="row">
                                                                    <?php if($theme != 'theme5'): ?>
                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_features_title3', __('Features Title 1'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_features_title3', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_title3'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter features Title 3')])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang . '_features_title3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span class="invalid-features_title1"
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
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_features_description3', __('Features Description 1'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_features_description3', \App\Models\Utility::getTranslation($getStoreThemeSetting['features_description3'], $lang), ['class' => 'form-control', 'placeholder' => __('Features Description 3')])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_features_description3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-features_description1"
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
                                                                    <?php endif; ?>
                                                                </div>


                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($theme != 'theme3'): ?>
                            <div class="active" id="Email_Subscriber_Setting">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Email Subscriber Setting')); ?> <?php if(!empty($getStoreThemeSetting['subscriber_img'])): ?>
                                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                                class="view-img-link popup-img-dashboard" target="_blank"
                                                                href="<?php echo e(asset(Storage::url('uploads/guide/guide2.jpeg'))); ?>">
                                                                <i class="far fa-question-circle"></i></a>
                                                        <?php endif; ?>
                                                    </h5>
                                                    <small>
                                                        <?php echo e(__('Note: This detail will use to change header setting.')); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_email_subscriber"
                                                            value="off">
                                                        <?php if(!empty($getStoreThemeSetting['enable_email_subscriber'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_email_subscriber"
                                                                id="enable_email_subscriber"
                                                                <?php echo e($getStoreThemeSetting['enable_email_subscriber'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_email_subscriber"
                                                                id="enable_email_subscriber">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_email_subscriber"><?php echo e(__('Enable Email Subscriber')); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <?php if($theme != 'theme5'): ?>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="logo"
                                                                    class="col-form-label"><?php echo e(__('Subscriber Background Image')); ?>



                                                                </label>
                                                                <?php if(!empty($getStoreThemeSetting['subscriber_img'])): ?>
                                                                    <input type="file" name="subscriber_img"
                                                                        id="subscriber_img"
                                                                        class="form-control custom-input-file"
                                                                        value="<?php echo e($getStoreThemeSetting['subscriber_img']); ?>">
                                                                <?php else: ?>
                                                                    <input type="file" name="subscriber_img"
                                                                        id="subscriber_img"
                                                                        class="form-control custom-input-file"
                                                                        value="">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Email_Subscriber_Setting<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Email_Subscriber_Setting<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Email_Subscriber_Setting<?php echo e($lang); ?>"
                                                                role="tabpanel"
                                                                aria-labelledby="Email_Subscriber_Setting<?php echo e($lang); ?>-tab">


                                                                <div class="row">


                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_subscriber_title', __('Subscriber Title'), ['class' => 'col-form-label  '])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_subscriber_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['subscriber_title'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Subscriber Title')])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_subscriber_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-subscriber_title"
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
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('' . $lang . '_subscriber_sub_title', __('Subscriber Sub Title'), ['class' => 'col-form-label  '])); ?>

                                                                            <?php echo e(Form::text('' . $lang . '_subscriber_sub_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['subscriber_sub_title'], $lang), ['class' => 'form-control', 'placeholder' => __('Enter Subscriber Sub Title')])); ?>

                                                                            <?php $__errorArgs = ['' . $lang . '_subscriber_sub_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-subscriber_sub_title"
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
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="active" id="Categories">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5><?php echo e(__('Categories')); ?>

                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="<?php echo e(asset(Storage::url('uploads/guide/guide8.jpeg'))); ?>">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    <?php echo e(__('Note : This detail will use for make explore social media.')); ?></small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_categories" value="off">
                                                    <?php if(!empty($getStoreThemeSetting['enable_categories'])): ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_categories" id="enable_categories"
                                                            <?php echo e($getStoreThemeSetting['enable_categories'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <?php else: ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_categories" id="enable_categories">
                                                    <?php endif; ?>
                                                    <label class="form-check-label"
                                                        for="enable_categories"><?php echo e(__('Enable Categories')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <ul class="nav nav-tabs mt-3" role="tablist">
                                                    <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="nav-item" role="presentation">
                                                            <button
                                                                class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Categories<?php echo e($lang); ?>-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#Categories<?php echo e($lang); ?>"
                                                                type="button" role="tab" aria-controls="home"
                                                                aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <div class="tab-content">
                                                    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                            id="Categories<?php echo e($lang); ?>" role="tabpanel"
                                                            aria-labelledby="Categories<?php echo e($lang); ?>-tab">
                                                            <div class="row">
                                                                <?php if($theme != 'theme5'): ?>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('' . $lang . '_categories', __('Categories'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('' . $lang . '_categories', \App\Models\Utility::getTranslation($getStoreThemeSetting['categories'], $lang), ['class' => 'form-control', 'placeholder' => 'Categories'])); ?>

                                                                                <?php $__errorArgs = ['' . $lang . '_categories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span class="invalid-categories"
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
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('' . $lang . '_categories_title', __('Categories Title'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::textarea('' . $lang . '_categories_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['categories_title'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Categories Title'])); ?>

                                                                                <?php $__errorArgs = ['' . $lang . '_categories_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span class="invalid-categories_title"
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
                                                                <?php endif; ?>
                                                            </div>


                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="active" id="Testimonials">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5><?php echo e(__('Testimonials')); ?>

                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="<?php echo e(asset(Storage::url('uploads/guide/guide3.jpeg'))); ?>">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    <?php echo e(__('Note : This detail will use for make explore social media.')); ?></small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_testimonial" value="off">
                                                    <?php if(!empty($getStoreThemeSetting['enable_testimonial'])): ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_testimonial" id="enable_testimonial"
                                                            <?php echo e($getStoreThemeSetting['enable_testimonial'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <?php else: ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_testimonial" id="enable_testimonial">
                                                    <?php endif; ?>
                                                    <label class="form-check-label"
                                                        for="enable_testimonial"><?php echo e(__('Enable Testimonials')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <ul class="nav nav-tabs mt-3" role="tablist">
                                                    <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="nav-item" role="presentation">
                                                            <button
                                                                class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Testimonials0<?php echo e($lang); ?>-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#Testimonials0<?php echo e($lang); ?>"
                                                                type="button" role="tab" aria-controls="home"
                                                                aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <div class="tab-content">
                                                    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                            id="Testimonials0<?php echo e($lang); ?>" role="tabpanel"
                                                            aria-labelledby="Testimonials0<?php echo e($lang); ?>-tab">
                                                            <div class="row">
                                                                <?php if($theme != 'theme5'): ?>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('' . $lang . '_testimonial_main_heading', __('Main Heading'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('' . $lang . '_testimonial_main_heading', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_main_heading'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Main Heading'])); ?>

                                                                                <?php $__errorArgs = ['' . $lang .
                                                                                    '_testimonial_main_heading'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="invalid-testimonial_main_heading"
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
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('' . $lang . '_testimonial_main_heading_title', __('Main Heading Title'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::textarea('' . $lang . '_testimonial_main_heading_title', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_main_heading_title'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Main Heading Title'])); ?>

                                                                                <?php $__errorArgs = ['' . $lang .
                                                                                    '_testimonial_main_heading_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="invalid-testimonial_main_heading_title"
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
                                                                <?php endif; ?>
                                                            </div>


                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="row">
                                                    <hr class="my-2">
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_testimonial1"
                                                                value="off">
                                                            <?php if(!empty($getStoreThemeSetting['enable_testimonial1'])): ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial1" id="enable_testimonial1"
                                                                    <?php echo e($getStoreThemeSetting['enable_testimonial1'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial1" id="enable_testimonial1">
                                                            <?php endif; ?>
                                                            <label class="form-check-label"
                                                                for="enable_testimonial1"><?php echo e(__('Enable Testimonial 1')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="testimonial_img1"
                                                                class="col-form-label"><?php echo e(__('Image')); ?>


                                                            </label>
                                                            <input type="file" class="form-control custom-input-file"
                                                                name="testimonial_img1" value="" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                        <h4 class="mt-3"><?php echo e(__('autoGallery')); ?></h4>
                                                        <div class="text-center">
                                                            <small>
                                                                <?php echo __('autoGallery introducing text', [
                                                                    'url' =>
                                                                        "<a class='ag-trigger' data-type='testimonial_img1' data-url='" .
                                                                        route('auto-gallery.show', ['testimonial_img|testimonial_img1']) .
                                                                        "' href='javascript:void(0)' >" .
                                                                        __('autoGallery') .
                                                                        '</a>',
                                                                ]); ?>

                                                            </small>
                                                            <?php echo e(Form::hidden('ag_testimonial_img1')); ?>

                                                        </div>
                                                        <a class="btn btn-sm btn-primary ag-trigger mt-2"
                                                            data-type='testimonial_img1'
                                                            data-url="<?php echo e(route('auto-gallery.show', ['testimonial_img|testimonial_img1'])); ?>"><i
                                                                class="fas fa-plus"></i>
                                                            <?php echo e(__('Browse')); ?>

                                                        </a>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Testimonials1<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Testimonials1<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Testimonials1<?php echo e($lang); ?>" role="tabpanel"
                                                                aria-labelledby="Testimonials1<?php echo e($lang); ?>-tab">
                                                                <div class="row">
                                                                    <?php if($theme != 'theme5'): ?>
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_name1', __('Name'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_testimonial_name1', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_name1'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Name'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_name1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_name1"
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
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_about_us1', __('About Us'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_testimonial_about_us1', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_about_us1'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'About Us'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_about_us1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_about_us1"
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
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_description1', __('Description'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::textarea('' . $lang . '_testimonial_description1', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_description1'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_description1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_description1"
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
                                                                    <?php endif; ?>
                                                                </div>


                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>


                                                    <hr class="my-2">
                                                    
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_testimonial2"
                                                                value="off">
                                                            <?php if(!empty($getStoreThemeSetting['enable_testimonial2'])): ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial2" id="enable_testimonial2"
                                                                    <?php echo e($getStoreThemeSetting['enable_testimonial2'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial2" id="enable_testimonial2">
                                                            <?php endif; ?>
                                                            <label class="form-check-label"
                                                                for="enable_testimonial2"><?php echo e(__('Enable Testimonial 2')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="testimonial_img2"
                                                                class="col-form-label"><?php echo e(__('Image')); ?>

                                                            </label>
                                                            <input type="file" class="form-control custom-input-file"
                                                                name="testimonial_img2" value="" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                        <h4 class="mt-3"><?php echo e(__('autoGallery')); ?></h4>
                                                        <div class="text-center">
                                                            <small>
                                                                <?php echo __('autoGallery introducing text', [
                                                                    'url' =>
                                                                        "<a class='ag-trigger' data-type='testimonial_img2' data-url='" .
                                                                        route('auto-gallery.show', ['testimonial_img|testimonial_img2']) .
                                                                        "' href='javascript:void(0)' >" .
                                                                        __('autoGallery') .
                                                                        '</a>',
                                                                ]); ?>

                                                            </small>
                                                            <?php echo e(Form::hidden('ag_testimonial_img2')); ?>

                                                        </div>
                                                        <a class="btn btn-sm btn-primary ag-trigger mt-2"
                                                            data-type='testimonial_img1'
                                                            data-url="<?php echo e(route('auto-gallery.show', ['testimonial_img|testimonial_img1'])); ?>"><i
                                                                class="fas fa-plus"></i>
                                                            <?php echo e(__('Browse')); ?>

                                                        </a>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Testimonials2<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Testimonials2<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Testimonials2<?php echo e($lang); ?>" role="tabpanel"
                                                                aria-labelledby="Testimonials2<?php echo e($lang); ?>-tab">
                                                                <div class="row">
                                                                    <?php if($theme != 'theme5'): ?>
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_name2', __('Name'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_testimonial_name2', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_name2'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Name'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_name2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_name2"
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
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_about_us2', __('About Us'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_testimonial_about_us2', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_about_us2'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'About Us'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_about_us2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_about_us2"
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
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_description2', __('Description'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::textarea('' . $lang . '_testimonial_description2', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_description2'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_description2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_description2"
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
                                                                    <?php endif; ?>
                                                                </div>


                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <hr class="my-2">
                                                    
                                                    <div class="col-12 py-2 text-right text-end">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <input type="hidden" name="enable_testimonial3"
                                                                value="off">
                                                            <?php if(!empty($getStoreThemeSetting['enable_testimonial3'])): ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial3" id="enable_testimonial3"
                                                                    <?php echo e($getStoreThemeSetting['enable_testimonial3'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="enable_testimonial3" id="enable_testimonial3">
                                                            <?php endif; ?>
                                                            <label class="form-check-label"
                                                                for="enable_testimonial3"><?php echo e(__('Enable Testimonial 3')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="testimonial_img3"
                                                                class="col-form-label"><?php echo e(__('Image')); ?>

                                                            </label>
                                                            <input type="file" class="form-control custom-input-file"
                                                                name="testimonial_img3" value="" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column">
                                                        <h4 class="mt-3"><?php echo e(__('autoGallery')); ?></h4>
                                                        <div class="text-center">
                                                            <small>
                                                                <?php echo __('autoGallery introducing text', [
                                                                    'url' =>
                                                                        "<a class='ag-trigger' data-type='testimonial_img3' data-url='" .
                                                                        route('auto-gallery.show', ['testimonial_img|testimonial_img3']) .
                                                                        "' href='javascript:void(0)' >" .
                                                                        __('autoGallery') .
                                                                        '</a>',
                                                                ]); ?>

                                                            </small>
                                                            <?php echo e(Form::hidden('ag_testimonial_img3')); ?>

                                                        </div>
                                                        <a class="btn btn-sm btn-primary ag-trigger mt-2"
                                                            data-type='testimonial_img1'
                                                            data-url="<?php echo e(route('auto-gallery.show', ['testimonial_img|testimonial_img1'])); ?>"><i
                                                                class="fas fa-plus"></i>
                                                            <?php echo e(__('Browse')); ?>

                                                        </a>
                                                    </div>
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Testimonials3<?php echo e($lang); ?>-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#Testimonials3<?php echo e($lang); ?>"
                                                                    type="button" role="tab" aria-controls="home"
                                                                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                id="Testimonials3<?php echo e($lang); ?>" role="tabpanel"
                                                                aria-labelledby="Testimonials3<?php echo e($lang); ?>-tab">
                                                                <div class="row">
                                                                    <?php if($theme != 'theme5'): ?>
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_name3', __('Name'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_testimonial_name3', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_name3'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Name'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_name3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_name3"
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
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_about_us3', __('About Us'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_testimonial_about_us3', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_about_us3'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'About Us'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_about_us3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_about_us3"
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
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_testimonial_description3', __('Description'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::textarea('' . $lang . '_testimonial_description3', \App\Models\Utility::getTranslation($getStoreThemeSetting['testimonial_description3'], $lang), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_testimonial_description3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-testimonial_description3"
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
                                                                    <?php endif; ?>
                                                                </div>


                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end">
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($theme != 'theme3'): ?>
                            <div class="active" id="Brand_Logo">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Brand Logo')); ?>

                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="<?php echo e(asset(Storage::url('uploads/guide/guide10.jpeg'))); ?>">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        <?php echo e(__('Note : This detail will use for make explore social media.')); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_brand_logo" value="off">
                                                        <?php if(!empty($getStoreThemeSetting['enable_brand_logo'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_brand_logo" id="enable_brand_logo"
                                                                <?php echo e($getStoreThemeSetting['enable_brand_logo'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_brand_logo" id="enable_brand_logo">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_brand_logo"><?php echo e(__('Enable Brand Logo')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="file"
                                                                    class="col-form-label"><?php echo e(__('Brand Logo')); ?></label>
                                                                <input type="file" name="file[]" id="file"
                                                                    class="form-control custom-input-file" multiple>
                                                            </div>
                                                            <div id="img-count"
                                                                class="badge badge-success rounded-pill">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-wrapper p-3 lead-common-box">
                                                                <?php if(isset($getStoreThemeSetting['brand_logo']) && $getStoreThemeSetting['brand_logo'] != null): ?>
                                                                    <?php $__currentLoopData = explode(',', $getStoreThemeSetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="card mb-3 border shadow-none product_Image"
                                                                            data-value="<?php echo e($file); ?>">
                                                                            <div class="px-3 py-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col ml-n2">
                                                                                        <p
                                                                                            class="card-text small text-muted">
                                                                                            <?php echo e(Form::hidden('brand_logo_old[]', $file)); ?>

                                                                                            <img class="rounded"
                                                                                                src=" <?php echo e(asset(Storage::url('uploads/store_logo/' . $file))); ?>"
                                                                                                width="70px"
                                                                                                alt="Image placeholder"
                                                                                                data-dz-thumbnail>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto actions">
                                                                                        <a class="action-item"
                                                                                            href=" <?php echo e(asset(Storage::url('uploads/store_logo/' . $file))); ?>"
                                                                                            download=""
                                                                                            data-toggle="tooltip"
                                                                                            data-original-title="<?php echo e(__('Download')); ?>">
                                                                                            <i
                                                                                                class="fas fa-download"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-auto actions">
                                                                                        <a name="deleteRecord"
                                                                                            class="action-item deleteRecord"
                                                                                            data-name="<?php echo e($file); ?>">
                                                                                            <i class="fas fa-trash"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($theme != 'theme3' && $theme != 'theme4'): ?>
                            <div class="active" id="Footer_1">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo e(__('Footer 1')); ?>

                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                            class="view-img-link popup-img-dashboard" target="_blank"
                                                            href="<?php echo e(asset(Storage::url('uploads/guide/guide9.jpeg'))); ?>">
                                                            <i class="far fa-question-circle"></i></a>
                                                    </h5>
                                                    <small>
                                                        <?php echo e(__('Note : This detail will use for make explore social media.')); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="form-check form-switch form-switch-right">
                                                        <input type="hidden" name="enable_footer_note"
                                                            value="off">
                                                        <?php if(!empty($getStoreThemeSetting['enable_footer_note'])): ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_footer_note" id="enable_footer_note"
                                                                <?php echo e($getStoreThemeSetting['enable_footer_note'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                        <?php else: ?>
                                                            <input type="checkbox" class="form-check-input mx-2"
                                                                name="enable_footer_note" id="enable_footer_note">
                                                        <?php endif; ?>
                                                        <label class="form-check-label"
                                                            for="enable_footer_note"><?php echo e(__('Enable Footer Note')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class=" setting-card">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <?php echo e(Form::label('footer_logo', __('Footer Logo'), ['class' => 'col-form-label'])); ?>

                                                            <input type="file" name="footer_logo" id="footer_logo"
                                                                class="form-control custom-input-file">
                                                            <?php $__errorArgs = ['footer_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-footer_logo" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        
                                                        <div class="col-6 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link1"
                                                                    value="off">
                                                                <?php if(!empty($getStoreThemeSetting['enable_quick_link1'])): ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link1"
                                                                        id="enable_quick_link1"
                                                                        <?php echo e($getStoreThemeSetting['enable_quick_link1'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <?php else: ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link1"
                                                                        id="enable_quick_link1">
                                                                <?php endif; ?>
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link1"><?php echo e(__('Enable Quick Link 1')); ?></label>
                                                            </div>
                                                        </div>

                                                        

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                        id="Personalized_Footer_1<?php echo e($lang); ?>-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Personalized_Footer_1<?php echo e($lang); ?>"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Personalized_Footer_1<?php echo e($lang); ?>"
                                                                    role="tabpanel"
                                                                    aria-labelledby="Personalized_Footer_1<?php echo e($lang); ?>-tab">
                                                                    <div class="row">
                                                                        <?php if($theme != 'theme5'): ?>
                                                                            
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('' . $lang . '_quick_link_header_name1', __('Footer Quick Link Header Name 1'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('' . $lang . '_quick_link_header_name1', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name1'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 1'])); ?>

                                                                                    <?php $__errorArgs = ['' . $lang .
                                                                                        '_quick_link_header_name1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                        <span
                                                                                            class="invalid-quick_link_header_name1"
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

                                                                            
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>

                                                        


                                                        <hr>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link2"
                                                                    value="off">
                                                                <?php if(!empty($getStoreThemeSetting['enable_quick_link2'])): ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link2"
                                                                        id="enable_quick_link2"
                                                                        <?php echo e($getStoreThemeSetting['enable_quick_link2'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <?php else: ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link2"
                                                                        id="enable_quick_link2">
                                                                <?php endif; ?>
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link2"><?php echo e(__('Enable Quick Link 2')); ?></label>
                                                            </div>
                                                        </div>

                                                        

                                                        

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                        id="Footer_12<?php echo e($lang); ?>-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Footer_12<?php echo e($lang); ?>"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Footer_12<?php echo e($lang); ?>" role="tabpanel"
                                                                    aria-labelledby="Footer_12<?php echo e($lang); ?>-tab">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('' . $lang . '_quick_link_header_name2', __('Footer Quick Link Header Name 2'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('' . $lang . '_quick_link_header_name2', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name2'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 2'])); ?>

                                                                                <?php $__errorArgs = ['' . $lang .
                                                                                    '_quick_link_header_name2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="invalid-quick_link_header_name1"
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
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>



                                                        




                                                        



                                                        <hr>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link3"
                                                                    value="off">
                                                                <?php if(!empty($getStoreThemeSetting['enable_quick_link3'])): ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link3"
                                                                        id="enable_quick_link3"
                                                                        <?php echo e($getStoreThemeSetting['enable_quick_link3'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <?php else: ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link3"
                                                                        id="enable_quick_link3">
                                                                <?php endif; ?>
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link3"><?php echo e(__('Enable Quick Link 3')); ?></label>
                                                            </div>
                                                        </div>

                                                        

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                        id="Footer_13<?php echo e($lang); ?>-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Footer_13<?php echo e($lang); ?>"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Footer_13<?php echo e($lang); ?>" role="tabpanel"
                                                                    aria-labelledby="Footer_13<?php echo e($lang); ?>-tab">
                                                                    <div class="row">
                                                                        
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('' . $lang . '_quick_link_header_name3', __('Footer Quick Link Header Name 3'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('' . $lang . '_quick_link_header_name3', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name3'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 3'])); ?>

                                                                                <?php $__errorArgs = ['' . $lang .
                                                                                    '_quick_link_header_name3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="invalid-quick_link_header_name1"
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
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        

                                                        <hr>
                                                        <div class="col-12 py-2 text-right text-end">
                                                            <div class="form-check form-switch form-switch-right mb-2">
                                                                <input type="hidden" name="enable_quick_link4"
                                                                    value="off">
                                                                <?php if(!empty($getStoreThemeSetting['enable_quick_link4'])): ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link4"
                                                                        id="enable_quick_link4"
                                                                        <?php echo e($getStoreThemeSetting['enable_quick_link4'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <?php else: ?>
                                                                    <input type="checkbox" class="form-check-input mx-2"
                                                                        name="enable_quick_link4"
                                                                        id="enable_quick_link4">
                                                                <?php endif; ?>
                                                                <label class="form-check-label"
                                                                    for="enable_quick_link4"><?php echo e(__('Enable Quick Link 4')); ?></label>
                                                            </div>
                                                        </div>

                                                        

                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-item" role="presentation">
                                                                    <button
                                                                        class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                        id="Footer_14<?php echo e($lang); ?>-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#Footer_14<?php echo e($lang); ?>"
                                                                        type="button" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                                                    id="Footer_14<?php echo e($lang); ?>" role="tabpanel"
                                                                    aria-labelledby="Footer_14<?php echo e($lang); ?>-tab">
                                                                    <div class="row">
                                                                        
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('' . $lang . '_quick_link_header_name4', __('Footer Quick Link Header Name 4'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('' . $lang . '_quick_link_header_name4', \App\Models\Utility::getTranslation($getStoreThemeSetting['quick_link_header_name4'], $lang), ['class' => 'form-control', 'placeholder' => 'Enter Footer Quick Link Header Name 4'])); ?>

                                                                                <?php $__errorArgs = ['' . $lang .
                                                                                    '_quick_link_header_name4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="invalid-quick_link_header_name4"
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
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <div class="col-12 bg-light rounded">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3 mt-3">
                                                                <h4><?php echo e(__('Selection Area')); ?></h4>
                                                                <div>
                                                                    <ul class="list-group menu-list" id="sortable-list-v2" data-name="selection_footer_menu[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <?php echo e(__('Drop Here')); ?>

                                                                        </li>

                                                                        <?php $__currentLoopData = Utility::defaultMenuV2($getStoreThemeSetting, $store, $plan,true,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                            <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                            <?php if(isset($page_slug_url->name)): ?>
                                                                                <li class="list-group-item"
                                                                                    data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                    <i
                                                                                        class="fas fa-arrows-alt"></i>
                                                                                    <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                </li>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <li class="list-group-item"
                                                                                data-name="<?php echo e($menu_title); ?>">
                                                                                <i
                                                                                    class="fas fa-arrows-alt"></i>
                                                                                <?php echo e(__($menu_title)); ?>

                                                                            </li>
                                                                        <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                       
                                                                    </ul>
                                                                </div>
                                                                <div id="sorted-info-v2">
                                                                    
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center flex-column">
                                                                <small>
                                                                    <?php echo e(__('Please utilize the selection area to drag and drop links into each column within the footer area.')); ?>

                                                                </small>
                                                                <i class="fas fa-share fa-2x" style="rotate: 95deg;"></i>

                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6><?php echo e(__('Footer Area', ['number' => 1])); ?></h6>
                                                               
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-1" data-name="footer_menu_1[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                <?php echo e(Utility::getTranslation($getStoreThemeSetting['quick_link_header_name1'], $lang)); ?>

                                                                            </div>
                                                                            <?php echo e(__('Drop Here')); ?>

                                                                            </div>
                                                                          </li>
                                                                        <?php if(isset($getStoreThemeSetting['footer_menu_1']) && $getStoreThemeSetting['footer_menu_1']): ?>
                                                                            <?php $__currentLoopData = json_decode($getStoreThemeSetting['footer_menu_1']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                                    <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                                    <?php if(isset($page_slug_url->name)): ?>
                                                                                        <li class="list-group-item"
                                                                                            data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                        </li>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <li class="list-group-item"
                                                                                        data-name="<?php echo e($menu_title); ?>">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        <?php echo e(__($menu_title)); ?>

                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6><?php echo e(__('Footer Area', ['number' => 2])); ?></h6>
                                                      
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-2" data-name="footer_menu_2[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                <?php echo e(Utility::getTranslation($getStoreThemeSetting['quick_link_header_name2'], $lang)); ?>

                                                                            </div>
                                                                            <?php echo e(__('Drop Here')); ?>

                                                                            </div>
                                                                          </li>
                                                                       
                                                                        <?php if(isset($getStoreThemeSetting['footer_menu_2']) && $getStoreThemeSetting['footer_menu_2']): ?>
                                                                            <?php $__currentLoopData = json_decode($getStoreThemeSetting['footer_menu_2']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                                    <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                                    <?php if(isset($page_slug_url->name)): ?>
                                                                                        <li class="list-group-item"
                                                                                            data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                        </li>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <li class="list-group-item"
                                                                                        data-name="<?php echo e($menu_title); ?>">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        <?php echo e(__($menu_title)); ?>

                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6><?php echo e(__('Footer Area', ['number' => 3])); ?></h6>
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-3" data-name="footer_menu_3[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                <?php echo e(Utility::getTranslation($getStoreThemeSetting['quick_link_header_name3'], $lang)); ?>

                                                                            </div>
                                                                            <?php echo e(__('Drop Here')); ?>

                                                                            </div>
                                                                          </li>
                                                                        <?php if(isset($getStoreThemeSetting['footer_menu_3']) && $getStoreThemeSetting['footer_menu_3']): ?>
                                                                            <?php $__currentLoopData = json_decode($getStoreThemeSetting['footer_menu_3']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                                    <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                                    <?php if(isset($page_slug_url->name)): ?>
                                                                                        <li class="list-group-item"
                                                                                            data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                        </li>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <li class="list-group-item"
                                                                                        data-name="<?php echo e($menu_title); ?>">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        <?php echo e(__($menu_title)); ?>

                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6><?php echo e(__('Footer Area', ['number' => 4])); ?></h6>
                                                                
                                                                <div class="menu">
                                                                    <ul class="list-group menu-list"
                                                                        id="sortable-footer-4" data-name="footer_menu_4[]"
                                                                        style="list-style-type: none">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                                                                            <i class="fas fa-angle-double-down"></i>
                                                                            <div class="ms-2 me-auto">
                                                                              <div class="fw-bold">
                                                                                <?php echo e(Utility::getTranslation($getStoreThemeSetting['quick_link_header_name4'], $lang)); ?>

                                                                            </div>
                                                                            <?php echo e(__('Drop Here')); ?>

                                                                            </div>
                                                                          </li>
                                                                        <?php if(isset($getStoreThemeSetting['footer_menu_4']) && $getStoreThemeSetting['footer_menu_4']): ?>
                                                                            <?php $__currentLoopData = json_decode($getStoreThemeSetting['footer_menu_4']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if(is_numeric($menu_title) && floor($menu_title) == $menu_title): ?>
                                                                                    <?php $page_slug_url = App\Models\PageOption::get_page_slug($menu_title); ?>
                                                                                    <?php if(isset($page_slug_url->name)): ?>
                                                                                        <li class="list-group-item"
                                                                                            data-name="<?php echo e($page_slug_url->id); ?>">
                                                                                            <i
                                                                                                class="fas fa-arrows-alt"></i>
                                                                                            <?php echo e(ucfirst($page_slug_url->name)); ?>

                                                                                        </li>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <li class="list-group-item"
                                                                                        data-name="<?php echo e($menu_title); ?>">
                                                                                        <i class="fas fa-arrows-alt"></i>
                                                                                        <?php echo e(__($menu_title)); ?>

                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        

                                                        





















                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        

                        <div class="active" id="Footer_2">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5><?php echo e(__('Social Media & Copyright')); ?>

                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('View Image')); ?>"
                                                        class="view-img-link popup-img-dashboard" target="_blank"
                                                        href="<?php echo e(asset(Storage::url('uploads/guide/guide9.jpeg'))); ?>">
                                                        <i class="far fa-question-circle"></i></a>
                                                </h5>
                                                <small>
                                                    <?php echo e(__('Note : This detail will use for make explore social media.')); ?></small>
                                            </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch form-switch-right">
                                                    <input type="hidden" name="enable_footer" value="off">
                                                    <?php if(!empty($getStoreThemeSetting['enable_footer'])): ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_footer" id="enable_footer"
                                                            <?php echo e($getStoreThemeSetting['enable_footer'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    <?php else: ?>
                                                        <input type="checkbox" class="form-check-input mx-2"
                                                            name="enable_footer" id="enable_footer">
                                                    <?php endif; ?>

                                                    <label class="form-check-label"
                                                        for="enable_footer"><?php echo e(__('Enable Footer')); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fas fa-envelope"></i>
                                                            <?php echo e(Form::label('email', __('Email'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('email', !empty($getStoreThemeSetting['email']) ? $getStoreThemeSetting['email'] : '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Email')])); ?>

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
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('whatsapp', __('Whatsapp'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('whatsapp', !empty($getStoreThemeSetting['whatsapp']) ? $getStoreThemeSetting['whatsapp'] : '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'https://www.whatsapp.com/'])); ?>

                                                            <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-whatsapp" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-facebook-square" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('facebook', __('Facebook'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('facebook', !empty($getStoreThemeSetting['facebook']) ? $getStoreThemeSetting['facebook'] : '', ['class' => 'form-control', 'placeholder' => 'https://www.facebook.com/'])); ?>

                                                            <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-facebook" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('instagram', __('Instagram'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('instagram', !empty($getStoreThemeSetting['instagram']) ? $getStoreThemeSetting['instagram'] : '', ['class' => 'form-control', 'placeholder' => 'https://www.instagram.com/'])); ?>

                                                            <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-instagram" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('twitter', __('Twitter'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('twitter', !empty($getStoreThemeSetting['twitter']) ? $getStoreThemeSetting['twitter'] : '', ['class' => 'form-control', 'placeholder' => 'https://twitter.com/'])); ?>

                                                            <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-twitter" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <?php if($theme != 'theme5'): ?>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                                                <?php echo e(Form::label('youtube', __('Youtube'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('youtube', !empty($getStoreThemeSetting['youtube']) ? $getStoreThemeSetting['youtube'] : '', ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/'])); ?>

                                                                <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="invalid-youtube" role="alert">
                                                                        <strong
                                                                            class="text-danger"><?php echo e($message); ?></strong>
                                                                    </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <i class="fas fa-copyright" aria-hidden="true"></i>
                                                            <?php echo e(Form::label('footer_note', __('Footer Note'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('footer_note', !empty($getStoreThemeSetting['footer_note']) ? $getStoreThemeSetting['footer_note'] : '', ['class' => 'form-control', 'placeholder' => __('Footer Note')])); ?>

                                                            <?php if(!$copyright_plan->price): ?>
                                                                <small class="text-xs">
                                                                    <?php echo __('join copyright plan', [
                                                                        'default_copyright_text' => __('Free Car Dealer Website Powered By') . ' ' . env('APP_NAME'),
                                                                        'copyright_plan' => "<a href='" . route('copyright-plan.index') . "'>" . __('Copyright Plan') . '</a>',
                                                                    ]); ?>.
                                                                </small>
                                                            <?php endif; ?>
                                                            <?php $__errorArgs = ['footer_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-footer_note" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <?php echo e(Form::label('storejs', __('Store Custom JS'), ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::textarea('storejs', !empty($getStoreThemeSetting['storejs']) ? $getStoreThemeSetting['storejs'] : '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Store Custom JS')])); ?>


                                                        <?php $__errorArgs = ['storejs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-storejs" role="alert">
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
                                            <div class="text-end">
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <?php echo Form::close(); ?>



                        <?php echo e(Form::open(['route' => ['theme.sharing.content', [$store->slug, $theme]], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <div id="Content_Sharing">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5><?php echo e(__('Content Sharing')); ?></h5>
                                                <small>
                                                    <?php echo e(__('Here you can share content between themes. Note: Content of the selected theme\'s will be copied to the :theme!', ['theme' => \App\Models\Utility::getThemeMapping($theme)])); ?>

                                                </small>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label class="col-form-label"
                                                                for="example3cols3Input"><?php echo e(__('Select the Theme')); ?></label>
                                                        </div>
                                                    </div>


                                                    <?php $__currentLoopData = \App\Models\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key != $theme): ?>
                                                            <?php
                                                                $theme_name = \App\Models\Utility::getThemeMapping($key);
                                                            ?>
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-inline mb-3">
                                                                    <input type="radio"
                                                                        id="sharing-content-<?php echo e($key); ?>"
                                                                        name="theme_name" value="<?php echo e($key); ?>"
                                                                        class="form-check-input">
                                                                    <label class="form-check-label"
                                                                        for="sharing-content-<?php echo e($key); ?>"><?php echo e($theme_name); ?></label>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($plan->free_layouts == 'on'): ?>
                                                        <?php $__currentLoopData = \App\Models\Utility::premiumThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($key != $theme): ?>
                                                                <?php
                                                                    $theme_name = \App\Models\Utility::getThemeMapping($key);
                                                                ?>
                                                                <div class="col-md-3">
                                                                    <div class="form-check form-check-inline mb-3">
                                                                        <input type="radio"
                                                                            id="sharing-content-<?php echo e($key); ?>"
                                                                            name="theme_name"
                                                                            value="<?php echo e($key); ?>"
                                                                            class="form-check-input">
                                                                        <label class="form-check-label"
                                                                            for="sharing-content-<?php echo e($key); ?>"><?php echo e($theme_name); ?></label>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-sm-12 px-2">
                                                <div class="text-end">
                                                    <?php echo e(Form::hidden('themefile', null, ['id' => 'themefile'])); ?>

                                                    <?php echo e(Form::submit(__('Share Content to :theme', ['theme' => \App\Models\Utility::getThemeMapping($theme)]), ['class' => 'btn btn-xs btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>


                    </div>
                <?php endif; ?>

            </div>
            <!-- [ sample-page ] end -->
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
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
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({
                initEmpty: false,
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                isFirstItemUndeletable: true
            })
        });

        $(".deleteRecord").click(function() {
            var name = $(this).data("name");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: '<?php echo e(route('brand.file.delete', [$store->slug, $theme, '_name'])); ?>'.replace('_name',
                    name),
                type: 'DELETE',
                data: {
                    "name": name,
                    "_token": token,
                },
                success: function(response) {
                    show_toastr('Success', response.success, 'success');
                    $('.product_Image[data-value="' + response.name + '"]').remove();
                },
                error: function(response) {
                    show_toastr('Error', response.error, 'error');
                }
            });
        });
    </script>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
    <script>
        var Dropzones = function() {
            var e = $('[data-toggle="dropzone1"]'),
                t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function() {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "<?php echo e(route('store.storeeditproducts', [$store->slug, $theme])); ?>",
                    headers: {
                        'x-csrf-token': CSRF_TOKEN,
                    },
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: n.get(0),
                    previewTemplate: n.html(),
                    maxFiles: 10,
                    parallelUploads: 10,
                    autoProcessQueue: true,
                    uploadMultiple: true,
                    acceptedFiles: a ? null : "image/*",
                    success: function(file, response) {
                        if (response.status == "success") {
                            show_toastr('success', response.success, 'success');
                            
                        } else {
                            show_toastr('Error', response.msg, 'error');
                        }
                    },
                    error: function(file, response) {
                        // Dropzones.removeFile(file);
                        if (response.error) {
                            show_toastr('Error', response.error, 'error');
                        } else {
                            show_toastr('Error', response, 'error');
                        }
                    },
                    init: function() {
                        var myDropzone = this;
                    }

                }, n.html(""), e.dropzone(i)
            }))
        }()

        $("#eventBtn").click(function() {
            $("#BigButton").clone(true).appendTo("#fileUploadsContainer").find("input").val("").end();
        });
        $("#testimonial_eventBtn").click(function() {
            $("#BigButton2").clone(true).appendTo("#fileUploadsContainer2").find("input").val("").end();
        });

        $(document).on('click', '#remove', function() {
            var qq = $('.BigButton').length;

            if (qq > 1) {
                var dd = $(this).attr('data-id');

                $(this).parents('#BigButton').remove();
            }
        });
        $("input[type='file']").on("change", function() {
            var numFiles = $(this).get(0).files.length
            $('#img-count').html(numFiles + ' Images selected');
        });

        $('.list-group-sortable-exclude').sortable({
            placeholderClass: 'list-group-item',
            items: ':not(.disabled)'
        });

        $(document).ready(function() {
            $("#sortable-list, #sortable-primary, #sortable-secondary").sortable({
                connectWith: ".menu-list",
                placeholder: "ui-state-highlight",
                stop: function(event, ui) {
                    // Handle the end of sorting if needed

                    $("#sorted-info").html("");
                    generateHiddenInputs($("#sortable-list"),"sorted-info");
                    generateHiddenInputs($("#sortable-primary"),"sorted-info");
                    generateHiddenInputs($("#sortable-secondary"),"sorted-info");
                    // // Iterate through each li element and extract data-name attribute
                    // $sortableList.find("li").each(function() {
                    //     if ($(this).data("name")) {
                    //         // Create a hidden field dynamically
                    //         var hiddenField = $("<input>").attr("type", "hidden")
                    //             .attr("name", "selection_nav_menu[]").val($(this).data(
                    //                 "name"));

                    //         // Append the hidden field to the "info" element
                    //         $("#sorted-info").append(hiddenField);
                    //     }

                    // });

                    // $sortablePrimary.find("li").each(function() {

                    //     if ($(this).data("name")) {
                    //         // Create a hidden field dynamically
                    //         var hiddenField = $("<input>").attr("type", "hidden")
                    //             .attr("name", "primary_nav_menu[]").val($(this).data("name"));

                    //         // Append the hidden field to the "info" element
                    //         $("#sorted-info").append(hiddenField);
                    //     }


                    // });

                    // $sortableSecondary.find("li").each(function() {
                    //     if ($(this).data("name")) {
                    //         // Create a hidden field dynamically
                    //         var hiddenField = $("<input>").attr("type", "hidden")
                    //             .attr("name", "secondary_nav_menu[]").val($(this).data(
                    //                 "name"));

                    //         // Append the hidden field to the "info" element
                    //         $("#sorted-info").append(hiddenField);
                    //     }

                    // });
                },
                // receive: function(event, ui) {
                //     // Callback when an item is dropped into the list
                //     console.log("Item dropped into menu");
                // },
                // create: function(event, ui) {
                //     console.log('create');
                // },
                // change: function(event, ui) {
                //     console.log('change');
                // }
            });

            $("#sortable-list-v2, #sortable-footer-1, #sortable-footer-2, #sortable-footer-3, #sortable-footer-4").sortable({
                connectWith: ".menu-list",
                placeholder: "ui-state-highlight",
                stop: function(event, ui) {
                    // Handle the end of sorting if needed

                    $("#sorted-info-v2").html("");

                    generateHiddenInputs($("#sortable-list-v2"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-1"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-2"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-3"),"sorted-info-v2");
                    generateHiddenInputs($("#sortable-footer-4"),"sorted-info-v2");

                   
                },
                
            });
        });


        // $(document).on('change', '#footer_type_1', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-1").removeClass('hide');
        //         $(".personalized-footer-type-1").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-1").addClass('hide');
        //         $(".personalized-footer-type-1").removeClass('hide');
        //     }
        // });
        // $(document).on('change', '#footer_type_2', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-2").removeClass('hide');
        //         $(".personalized-footer-type-2").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-2").addClass('hide');
        //         $(".personalized-footer-type-2").removeClass('hide');
        //     }
        // });
        // $(document).on('change', '#footer_type_3', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-3").removeClass('hide');
        //         $(".personalized-footer-type-3").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-3").addClass('hide');
        //         $(".personalized-footer-type-3").removeClass('hide');
        //     }
        // });
        // $(document).on('change', '#footer_type_4', function(e) {
        //     if ($(this).val() == 1) {
        //         $(".standard-footer-type-4").removeClass('hide');
        //         $(".personalized-footer-type-4").addClass('hide');
        //     } else {
        //         $(".standard-footer-type-4").addClass('hide');
        //         $(".personalized-footer-type-4").removeClass('hide');
        //     }
        // });

        $('.list-group-sortable-exclude').sortable({
            placeholderClass: 'list-group-item',
            items: ':not(.disabled)'
        });

        $(document).ready(function() {
            $(".drpdwn-page-slug-urls").html($("#drpdwn-page-slug-urls").html());
        });

        


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/edit_theme.blade.php ENDPATH**/ ?>