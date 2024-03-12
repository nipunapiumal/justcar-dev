<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title"><?php echo e(__('Contact Us')); ?></h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('store.slug', $store->slug)); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Contact Us')); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Contact -->
    <section class="our-faq bgc-f9 pt0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form_grid">
                        <div class="wrapper">
                            <?php echo Form::open(
                                ['route' => ['store.store-contact', $store->slug], 'class' => 'contact_form'],
                                ['method' => 'POST'],
                            ); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('First Name')); ?>*</label>
                                        <input class="form-control" type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('Last Name')); ?>*</label>
                                        <input class="form-control" type="text" name="last_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('Email')); ?>*</label>
                                        <input class="form-control email" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('Phone No')); ?></label>
                                        <input class="form-control" type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('Subject')); ?></label>
                                        <input class="form-control" type="text" name="subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('Message')); ?></label>
                                        <textarea name="message" class="form-control" rows="6" maxlength="1000"></textarea>
                                    </div>
                                    <div class="form-group mb0">
                                        <button type="submit" class="btn btn-thm"><?php echo e(__('Get In Touch')); ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $("#pro_scroll").click(function() {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 1000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme9/contact/index.blade.php ENDPATH**/ ?>