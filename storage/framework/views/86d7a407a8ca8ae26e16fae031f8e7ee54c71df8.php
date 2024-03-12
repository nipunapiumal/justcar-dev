<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1><?php echo e(__('Contact Us')); ?></h1>
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('store.slug', $store->slug)); ?>"><?php echo e(__('Home')); ?></a></li>
                <li class="active"><?php echo e(__('Contact Us')); ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-20">
    <div class="container">
        
        <div class="row g-0 contact-innner">
            <div class="col-lg-7 col-md-12">
                <div class="contact-form" style="border-right: none">
                    <h3 class="mb-20"><?php echo e(__('Contact Us')); ?></h3>
                    <?php echo Form::open(array('route' => array('store.store-contact', $store->slug),'id'=>'contact-form'),['method'=>'POST']); ?>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="first_name" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('First Name')); ?>">
                                    <label for="floating-full-name"><?php echo e(__('First Name')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="last_name" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('Last Name')); ?>">
                                    <label for="floating-full-name"><?php echo e(__('Last Name')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="email" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('Email')); ?>">
                                    <label for="floating-full-name"><?php echo e(__('Email')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="phone" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('Phone No')); ?>">
                                    <label for="floating-full-name"><?php echo e(__('Phone No')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="text" name="subject" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('Subject')); ?>">
                                    <label for="floating-full-name"><?php echo e(__('Subject')); ?></label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-floating mb-20">
                                    <textarea class="form-control" placeholder="<?php echo e(__('Message')); ?>" name="message" id="floatingTextarea2"></textarea>
                                    <label for="floatingTextarea2"><?php echo e(__('Message')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-5"><?php echo e(__('Get In Touch')); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="contact-info">
                    <h3 class="mb-20"><?php echo e(__('Quick contact info')); ?></h3>
                    <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                    <div class="ci-box d-flex mb-30">
                        <div class="icon">
                            <i class="flaticon-pin"></i>
                        </div>
                        <div class="detail align-self-center">
                            <h4><?php echo e(__('Office Address')); ?></h4>
                            <p><?php echo nl2br(e($storethemesetting['office_address'])); ?></p>
                        </div>
                    </div>
                    <div class="ci-box d-flex mb-30">
                        <div class="icon">
                            <i class="flaticon-phone"></i>
                        </div>
                        <div class="detail align-self-center">
                            <h4><?php echo e(__('Contact Us')); ?></h4>
                            
                                <a href="tel:<?php echo e($storethemesetting['contact_info_phone_no']); ?>"><?php echo e($storethemesetting['contact_info_phone_no']); ?></a>
                                /
                            
                            
                                <a href="mailto:<?php echo e($storethemesetting['contact_info_email']); ?>"><?php echo e($storethemesetting['contact_info_email']); ?></a>
                            
                            
                        </div>
                    </div>
                    
                    <div class="ci-box d-flex mb-40">
                        <div class="icon">
                            <i class="flaticon-mail"></i>
                        </div>
                        <div class="detail align-self-center">
                            <h4><?php echo e(__('Opening Hours')); ?></h4>
                            <p><?php echo nl2br(e($storethemesetting['opening_hours'])); ?></p>
                            
                        </div>
                    </div>
                    <?php endif; ?>

                    <h3 class="mb-20">Follow Us</h3>
                    <div class="social-media social-media-two">
                        <div class="social-list">
                            <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                        <div class="icon whatsapp"
                                            onclick="location.href='https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>'">
                                            <div class="tooltip">Whatsapp</div>
                                            <span><i class="fab fa-whatsapp"></i></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['facebook'])): ?>
                                        <div class="icon facebook"
                                            onclick="location.href='<?php echo e($storethemesetting['facebook']); ?>'">
                                            <div class="tooltip">Facebook</div>
                                            <span><i class="fab fa-facebook"></i></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['twitter'])): ?>
                                        <div class="icon twitter"
                                            onclick="location.href='<?php echo e($storethemesetting['twitter']); ?>'">
                                            <div class="tooltip">Twitter</div>
                                            <span><i class="fab fa-twitter"></i></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['email'])): ?>
                                        <div class="icon github"
                                            onclick="location.href='mailto:<?php echo e($storethemesetting['email']); ?>'">
                                            <div class="tooltip">Email</div>
                                            <span><i class="fa fa-envelope"></i></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['instagram'])): ?>
                                        <div class="icon instagram"
                                            onclick="location.href='<?php echo e($storethemesetting['instagram']); ?>'">
                                            <div class="tooltip">Instagram</div>
                                            <span><i class="fab fa-instagram"></i></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['youtube'])): ?>
                                        <div class="icon youtube mr-0"
                                            onclick="location.href='<?php echo e($storethemesetting['youtube']); ?>'">
                                            <div class="tooltip">Youtube</div>
                                            <span><i class="fab fa-youtube"></i></span>
                                        </div>
                                    <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- Contact 1 end -->

   
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme16to21', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme16/contact/index.blade.php ENDPATH**/ ?>