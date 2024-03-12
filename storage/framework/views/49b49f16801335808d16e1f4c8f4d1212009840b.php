<?php if($storethemesetting['enable_footer'] == 'on'): ?>
    <!-- Footer-area start -->
    <footer class="footer-area bg-img bg-s-cover"
        data-bg-image="<?php echo e(asset('assets/theme35to37/images/footer-bg-1.jpg')); ?>">
        <div class="overlay opacity-70"></div>
        <div class="footer-top pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget" data-aos="fade-up">
                            <div class="navbar-brand">
                                <a href="<?php echo e(route('store.slug', $store->slug)); ?>">
                                    <?php if(
                                        !empty($storethemesetting['footer_logo']) &&
                                            \Storage::exists('uploads/store_logo/' . $storethemesetting['footer_logo'])): ?>
                                        <img src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $storethemesetting['footer_logo']))); ?>"
                                            alt="Footer logo" class="lazyload">
                                    <?php else: ?>
                                        <img class="lazyload"
                                            src="<?php echo e(asset(Storage::url('uploads/store_logo/footer_logo.png'))); ?>"
                                            alt="Footer logo">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <?php if($storethemesetting['enable_top_bar'] == 'on'): ?>
                                <p>
                                    <?php echo e(!empty($storethemesetting['top_bar_title']) ? $storethemesetting['top_bar_title'] : '<b>FREE SHIPPING</b> world wide for all orders over $199'); ?>

                                </p>
                            <?php endif; ?>
                            <div class="social-link">
                                <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                    <a href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['facebook'])): ?>
                                    <a href="<?php echo e($storethemesetting['facebook']); ?>" target="_blank">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['twitter'])): ?>
                                    <a href="<?php echo e($storethemesetting['twitter']); ?>" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['email'])): ?>
                                    <a href="mailto:<?php echo e($storethemesetting['email']); ?>" target="_blank">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['instagram'])): ?>
                                    <a href="<?php echo e($storethemesetting['instagram']); ?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($storethemesetting['youtube'])): ?>
                                    <a href="<?php echo e($storethemesetting['youtube']); ?>" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on'): ?>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm">
                            <div class="footer-widget" data-aos="fade-up">
                                <h4><?php echo e(__($storethemesetting['quick_link_header_name1'])); ?></h4>
                                <ul class="footer-links">
                                    <?php if(isset($storethemesetting['footer_menu_1']) && $storethemesetting['footer_menu_1']): ?>
                                        <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_1']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link2']) && $storethemesetting['enable_quick_link2'] == 'on'): ?>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm">
                            <div class="footer-widget" data-aos="fade-up">
                                <h4><?php echo e(__($storethemesetting['quick_link_header_name2'])); ?></h4>
                                <ul class="footer-links">
                                    <?php if(isset($storethemesetting['footer_menu_2']) && $storethemesetting['footer_menu_2']): ?>
                                        <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_2']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($storethemesetting['enable_quick_link3']) && $storethemesetting['enable_quick_link3'] == 'on'): ?>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-5">
                            <div class="footer-widget" data-aos="fade-up">
                                <h4><?php echo e(__($storethemesetting['quick_link_header_name3'])); ?></h4>
                                <ul class="footer-links">
                                    <?php if(isset($storethemesetting['footer_menu_3']) && $storethemesetting['footer_menu_3']): ?>
                                        <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_3']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($info = Utility::generateLink($menu_title, $storethemesetting, $store, $plan)): ?>
                                                <li>
                                                    <a href="<?php echo e($info['link_url']); ?>">
                                                        <?php echo e($info['link_name']); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- subscriber-->
                    <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on'): ?>
                        <?php if($storethemesetting['enable_email_subscriber'] == 'on'): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="footer-widget" data-aos="fade-up">
                                    <h4><?php echo e(!empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time'); ?>

                                    </h4>
                                    <p class="lh-1 mb-20">
                                        <?php echo e(!empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here'); ?>

                                    </p>
                                    <div class="newsletter-form">
                                        <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST'])); ?>

                                        <div class="form-group">
                                            <?php echo e(Form::email('email', null, ['class' => 'form-control radius-0', 'aria-label' => __('Email Address'), 'placeholder' => __('Email Address')])); ?>

                                            <button class="btn btn-md btn-primary"
                                                type="submit"><?php echo e(__('Subscribe')); ?></button>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="copy-right-area border-top">
            <div class="container">
                <div class="copy-right-content">
                    <span>
                        <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?>

                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area end-->
<?php endif; ?>

<!-- Go to Top -->
<div class="go-top"><i class="fal fa-angle-up"></i></div>
<!-- Go to Top -->

<!-- Jquery JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/jquery.min.js')); ?>">
    >
</script>
<!-- Bootstrap JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/bootstrap.min.js')); ?>">
    >
</script>
<!-- Counter JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/jquery.counterup.min.js')); ?>">
    >
</script>
<!-- Nice Select JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/jquery.nice-select.min.js')); ?>">
    >
</script>
<!-- Magnific Popup JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/jquery.magnific-popup.min.js')); ?>">
    >
</script>
<!-- Swiper Slider JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/swiper-bundle.min.js')); ?>">
    >
</script>
<!-- Lazysizes -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/lazysizes.min.js')); ?>">
    >
</script>
<!-- Noui Range Slider JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/nouislider.min.js')); ?>">
    >
</script>
<!-- AOS JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/aos.min.js')); ?>">
    >
</script>
<!-- Mouse Hover JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/vendors/mouse-hover-move.js')); ?>">
    >
</script>
<!-- Main script JS -->
<script src="<?php echo e(asset('assets/theme35to37/js/script.js')); ?>">
    >
</script>

<!-- Custom js from entire application here -->
<script src="<?php echo e(asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>
<?php echo $__env->make('storefront.layout.additional-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/theme35to37/footer-type-1.blade.php ENDPATH**/ ?>