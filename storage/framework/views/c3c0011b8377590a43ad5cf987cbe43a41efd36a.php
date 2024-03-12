<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Main Information')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $profile = asset(Storage::url('uploads/profile/'));
        //$default_avatar = asset(Storage::url('uploads/default_avatar/avatar.png'));
    ?>



    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1><?php echo e(__('Profile')); ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="active"><?php echo e(__('Profile')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Contact 1 start -->
    <div class="contact-1 content-area-20">
        <div class="container">
            
            <div class="row g-0 contact-innner">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form" style="border-right: none">
                        <h3 class="mb-20"><?php echo e(__('Main Information')); ?></h3>
                        <?php echo e(Form::model($userDetail, ['route' => ['customer.profile.update', $slug, $userDetail], 'id' => 'contact-form', 'method' => 'put', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="form-floating mb-20">

                                    <div class="dp_user_thumb_content">
                                        <div class="wrap-custom-file mb25">
                                            <input type="file" name="profile" id="image1" accept=".gif, .jpg, .png">
                                            <label for="image1">
                                                <span>&nbsp;&nbsp;<?php echo e(__('Choose file here')); ?></span>
                                            </label>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <?php echo e(Form::text('name', null, ['class' => 'form-control','id' => 'floating-full-name','placeholder' => __('First Name')])); ?>

                                    <?php echo e(Form::label('floating-full-name', __('First Name'))); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <?php echo e(Form::text('email', null, ['class' => 'form-control','id' => 'floating-full-name','placeholder' => __('Enter User Email')])); ?>

                                    <?php echo e(Form::label('floating-full-name', __('Enter User Email'))); ?>

                                </div>
                            </div>
                            <h3 class="mb-20 mt-5"><?php echo e(__('Password Informations')); ?></h3>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="password" name="current_password" id="floating-full-name" class="form-control" placeholder="<?php echo e(__('Enter Current Password')); ?>">
                                    
                                    <?php echo e(Form::label('floating-full-name', __('Enter Current Password'))); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="password" name="new_password" id="floating-full-name" class="form-control" placeholder="<?php echo e(__('Enter New Password')); ?>">
                                    
                                    <?php echo e(Form::label('floating-full-name', __('Enter New Password'))); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="password" name="confirm_password" id="floating-full-name" class="form-control" placeholder="<?php echo e(__('Enter Re-type New Password')); ?>">
                                    
                                    <?php echo e(Form::label('floating-full-name', __('Enter Re-type New Password'))); ?>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-5"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact 1 end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        if ('<?php echo !empty($is_cart) && $is_cart == true; ?>') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme34/customer/profile.blade.php ENDPATH**/ ?>