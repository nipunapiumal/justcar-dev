<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Area Start-->
    <div class="breadcrumb-area bg-9">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="breadcrumb-text text-left">
                        <h2><?php echo e(__('Contact Us')); ?></h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><?php echo e(__('Contact Us')); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Area Start -->
    <div class="contact-form-area pt-100 pb-150">
        <div class="container">
            <div class="contact-form-wrapper fix">
              <?php echo Form::open(array('route' => array('store.store-contact', $store->slug),'id'=>'contact-form'),['method'=>'POST']); ?>

               
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="first_name" placeholder="<?php echo e(__('First Name')); ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="last_name" placeholder="<?php echo e(__('Last Name')); ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" placeholder="<?php echo e(__('Email')); ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="phone" placeholder="<?php echo e(__('Phone No')); ?>">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="subject" placeholder="<?php echo e(__('Subject')); ?>">
                    </div>
                </div>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="<?php echo e(__('Message')); ?>"></textarea>
                <button type="submit" class="submit-btn default-btn gradient">
                    <span><?php echo e(__('Get In Touch')); ?></span>
                </button>
                
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme13to15', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme13/contact/index.blade.php ENDPATH**/ ?>