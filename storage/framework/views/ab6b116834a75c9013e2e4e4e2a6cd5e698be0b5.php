<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact Us')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
<!-- Sub banner start -->

<!-- Sub Banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-5 content-area-20">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1 class="mb-10"><?php echo e(__('Contact Us')); ?></h1>
            <div class="title-border">
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
            </div>
        </div>
        <div class="bg-white">
            <div class="row g-0">
                <div class="col-lg-7 col-md-12 col-sm-12 col-pad2">
                    <!-- Contact form start -->
                    <div class="contact-form contact-pad">
                        <h3>Send us a Message</h3>
                        <?php echo Form::open(array('route' => array('store.store-contact', $store->slug),'id'=>'contact_form'),['method'=>'POST']); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group name">
                                        <input type="text" name="first_name" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('First Name')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group email">
                                        <input type="text" name="last_name" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('Last Name')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group subject">
                                        <input type="text" name="email" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('Email')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group number">
                                        <input type="text" name="subject" class="form-control" id="floating-full-name" placeholder="<?php echo e(__('Subject')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group message">
                                        <textarea class="form-control" placeholder="<?php echo e(__('Message')); ?>" name="message" id="floatingTextarea2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send-btn text-center">
                                        <button type="submit" class="btn-6"><?php echo e(__('Get In Touch')); ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                    </div>
                    <!-- Contact form end -->
                </div>
                <?php if($storethemesetting['enable_sidebar_panel'] == 'on'): ?>
                <div class="col-lg-5 col-md-12 col-sm-12 col-pad2">
                    <!-- Contact details start -->
                    <div class="contact-details">
                        <h3><?php echo e(__('Quick contact info')); ?></h3>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fas fa-location-arrow"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4><?php echo e(__('Office Address')); ?></h4>
                                <p><?php echo nl2br(e($storethemesetting['office_address'])); ?></p>
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4><?php echo e(__('Contact Us')); ?></h4>
                                  <p>
                                    <a href="tel:<?php echo e($storethemesetting['contact_info_phone_no']); ?>"><?php echo e($storethemesetting['contact_info_phone_no']); ?></a>
                                  </p>
                                
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4><?php echo e(__('Email Address')); ?></h4>
                                <p>
                                    <a href="mailto:<?php echo e($storethemesetting['contact_info_email']); ?>"><?php echo e($storethemesetting['contact_info_email']); ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4><?php echo e(__('Opening Hours')); ?></h4>
                                <p><?php echo nl2br(e($storethemesetting['opening_hours'])); ?></p>
                                
                            </div>
                        </div>
                        
                        <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                        <h3><?php echo e(__('Follow us on')); ?></h3>
                        <ul class="social-list clearfix">
                            <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                        <li>
                                            <a class="bg-whatsapp"
                                                href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['facebook'])): ?>
                                        <li>
                                            <a class="facebook-bg" href="<?php echo e($storethemesetting['facebook']); ?>"
                                                target="_blank">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['twitter'])): ?>
                                        <li>
                                            <a class="twitter-bg" href="<?php echo e($storethemesetting['twitter']); ?>"
                                                target="_blank">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['email'])): ?>
                                        <li>
                                            <a class="bg-github" href="mailto:<?php echo e($storethemesetting['email']); ?>">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['instagram'])): ?>
                                        <li>
                                            <a class="bg-instagram" href="<?php echo e($storethemesetting['instagram']); ?>"
                                                target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(!empty($storethemesetting['youtube'])): ?>
                                        <li>
                                            <a class="bg-youtube" href="<?php echo e($storethemesetting['youtube']); ?>"
                                                target="_blank">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <!-- Contact details end -->
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Contact 1 end -->

   
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.'.$store->theme_dir.'', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme28/contact/index.blade.php ENDPATH**/ ?>