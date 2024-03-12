<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Layouts')); ?>

<?php $__env->stopSection(); ?>
<?php
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Layouts')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Layouts')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 'Owner'): ?>

        <?php echo e(Form::open(['route' => ['store.changetheme', $store_settings->id], 'method' => 'POST', 'id' => 'theme-changer'])); ?>

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5><?php echo e(__('Free Layouts')); ?>


                            </h5>
                        </div>

                        <?php if(isset($store_settings['theme_dir'])): ?>
                            <div class="text-end">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                    <span class="ms-2"><?php echo e(__('Active Theme')); ?>:
                                        <b> <?php echo e(\App\Models\Utility::getThemeMapping($store_settings['theme_dir'])); ?></b>
                                    </span>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        

                        

                        
                        <div class="row theme-changer">
                            
                            <?php $__currentLoopData = \App\Models\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $key_mapping = \App\Models\Utility::getThemeMapping($key);
                                ?>
                                <div class="col-6 col-md-3 cc-selector mb-2">
                                    <div class="mb-3 screen image">
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg'))); ?>"
                                            class="img-center pro_max_width pro_max_height <?php echo e($key); ?>_img <?php echo e(isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key ? 'active' : ''); ?>">
                                        <div class="actions">
                                            <a href="">
                                                <button type="button" class="btn btn-default delete-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </a>
                                            <a href="">
                                                <button type="button" class="btn btn-default edit-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutters-xs theme_color" id="<?php echo e($key); ?>">
                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                <label class="colorinput">
                                                    <input name="theme_color" type="radio" value="white-black-color.css"
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

                                                    <button type="button" class="btn btn-xs btn-primary"
                                                        title="<?php echo e(__('Save')); ?>"
                                                        style="display: none;padding: 4px 10px;"><i
                                                            class="fas fa-save"></i></button>
                                                    
                                                </div>
                                                <div style="margin-left: 5px">
                                                    <?php if(isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key): ?>
                                                        <a title="<?php echo e(__('Edit')); ?>"
                                                            href="<?php echo e(route('store.editproducts', [$store_settings->slug, $key_mapping])); ?>"
                                                            class="btn btn-outline-primary theme_btn" type="button"
                                                            id="button-addon2" style="padding: 4px 10px;"><i
                                                                class="ti ti-pencil"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                    </div>

                </div>
                <div class="card">
                    
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5><?php echo e(__('Premium Layouts')); ?>


                            </h5>
                        </div>
                        <?php if(isset($store_settings['theme_dir'])): ?>
                            <div class="text-end">
                                <span class="d-flex align-items-center ">
                                    <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                    <span class="ms-2"><?php echo e(__('Active Theme')); ?>:
                                        <b> <?php echo e(\App\Models\Utility::getThemeMapping($store_settings['theme_dir'])); ?></b>
                                    </span>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        
                        <h5 class="mt-3 mb-4"><?php echo e(__('Premium Layouts')); ?></h5>
                        <div class="row theme-changer">
                            <?php $__currentLoopData = \App\Models\Utility::premiumPlusThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $key_mapping = \App\Models\Utility::getThemeMapping($key); ?>
                                <div class="col-12 col-md-3 cc-selector mb-2">
                                    <div class="mb-3 screen image">
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg'))); ?>"
                                            class="img-center pro_max_width pro_max_height <?php echo e($key); ?>_img <?php echo e(isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key ? 'active' : ''); ?>">
                                        <div class="actions">
                                            <a href="">
                                                <button type="button"
                                                    class="btn btn-default delete-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </a>
                                            <a href="">
                                                <button type="button" class="btn btn-default edit-image-btn pull-right">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutters-xs theme_color" id="<?php echo e($key); ?>">
                                            <div class="col-12 d-flex justify-content-center align-items-center">
                                                <label class="colorinput">
                                                    <input name="theme_color" type="radio"
                                                        value="white-black-color.css" data-theme="<?php echo e($key); ?>"
                                                        data-imgpath="<?php echo e(asset(Storage::url('uploads/store_theme/' . $key . '/Home.jpg'))); ?>"
                                                        class="colorinput-input"
                                                        <?php echo e(isset($store_settings['store_theme']) && $store_settings['store_theme'] == $key ? 'checked' : ''); ?>>
                                                    <span class="colorinput-color-v2"></span>
                                                    <label style="font-size: 12px">&nbsp;
                                                        <?php echo e(__('Set')); ?>

                                                        <?php echo e($key_mapping); ?></label>
                                                </label>
                                                <div style="margin-left: 5px">
                                                    <button data-premiumplan="<?php echo e($plan->premium_layouts); ?>"
                                                        data-planpage="<?php echo e(route('plans.index')); ?>"
                                                        data-trial="<?php echo e(Auth::user()->free_trial_status); ?>" type="button"
                                                        class="btn btn-xs btn-primary" title="<?php echo e(__('Save')); ?>"
                                                        style="display: none;padding-left:12px;padding-right:12px;"><i
                                                            class="fas fa-save"></i></button>
                                                    
                                                </div>
                                                <div style="margin-left: 5px">
                                                    <?php if(isset($store_settings['theme_dir']) && $store_settings['theme_dir'] == $key): ?>
                                                        <a title="<?php echo e(__('Edit')); ?>"
                                                            href="<?php echo e(route('store.editproducts', [$store_settings->slug, $key_mapping])); ?>"
                                                            class="btn btn-outline-primary theme_btn" type="button"
                                                            id="button-addon2"
                                                            style="padding-left:12px;padding-right:12px;"><i
                                                                class="ti ti-pencil"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        

                    </div>
                    <div class="card-footer">
                        <div class="col-sm-12 px-2">
                            <div class="text-end">
                                <?php echo e(Form::hidden('content_sharing', 0, ['id' => 'content-sharing'])); ?>

                                <?php echo e(Form::hidden('themefile', null, ['id' => 'themefile'])); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/settings/layout.blade.php ENDPATH**/ ?>