<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover"
        data-bg-image="<?php echo e(asset('assets/theme35to37/images/page-title-bg-4.jpg')); ?>">
        <div class="container">
            <div class="content">
                <h2><?php echo e(__('Contact Us')); ?></h2>
                <ul class="list-unstyled">
                    <li class="d-inline">
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75"><?php echo e(__('Contact Us')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- Contact-area start -->
    <div class="contact-area pt-100">
        <div class="container">
            <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-30 color-1" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon">
                                <i class="fal fa-phone-plus"></i>
                            </div>
                            <div class="card-text">
                                <p>
                                    <a href="tel:<?php echo e($storethemesetting['contact_info_phone_no']); ?>">
                                        <?php echo e($storethemesetting['contact_info_phone_no']); ?>

                                    </a>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-30 color-2" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="card-text">
                                <p>
                                    <a href="mailto:<?php echo e($storethemesetting['contact_info_email']); ?>">
                                        <?php echo e($storethemesetting['contact_info_email']); ?>

                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-30 color-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="card-text">
                                <p>
                                    <?php echo nl2br(e($storethemesetting['office_address'])); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="pb-70"></div>

            <div class="row gx-xl-5">
                <div class="col-lg-6 mb-30" data-aos="fade-left">
                    <div class="content-title">
                        <span class="subtitle color-primary mb-15 d-block"><?php echo e(__('Get Connected')); ?></span>
                        <h2 class="mb-20 text-capitalize"><?php echo e(__("we'll be in touch shortly")); ?></h2>
                        
                    </div>
                </div>
                <div class="col-lg-6 mb-30 order-lg-first" data-aos="fade-right">
                    <?php echo Form::open(['route' => ['store.store-contact', $store->slug], 'id' => 'contactForm'], ['method' => 'POST']); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <input type="text" name="first_name" class="form-control" id="floating-full-name"
                                    placeholder="<?php echo e(__('First Name')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <input type="text" name="last_name" class="form-control" id="floating-full-name"
                                    placeholder="<?php echo e(__('Last Name')); ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-inner mb-30">
                                <input type="email" name="email" class="form-control" id="floating-full-name"
                                    placeholder="<?php echo e(__('Email')); ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-inner mb-30">
                                <input type="text" name="subject" class="form-control" id="floating-full-name"
                                    placeholder="<?php echo e(__('Subject')); ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-20">
                                <textarea class="form-control" placeholder="<?php echo e(__('Message')); ?>" name="message" id="floatingTextarea2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('Get In Touch')); ?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="pb-70"></div>

        </div>
    </div>
    <!-- Contact-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storefront.layout.theme35', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme35/contact/index.blade.php ENDPATH**/ ?>