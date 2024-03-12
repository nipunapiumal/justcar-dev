<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <?php if(isset($storethemesetting['enable_quick_link1']) && $storethemesetting['enable_quick_link1'] == 'on'): ?>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            <?php echo e(__($storethemesetting['quick_link_header_name1'])); ?>

                        </h4>
                        <ul class="links">
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
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            <?php echo e(__($storethemesetting['quick_link_header_name2'])); ?>

                        </h4>
                        <ul class="links">
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
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            <?php echo e(__($storethemesetting['quick_link_header_name3'])); ?>

                        </h4>
                        <ul class="links">
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
            <?php if(isset($storethemesetting['enable_quick_link4']) && $storethemesetting['enable_quick_link4'] == 'on'): ?>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            <?php echo e(__($storethemesetting['quick_link_header_name4'])); ?>

                        </h4>
                        <ul class="links">
                            <?php if(isset($storethemesetting['footer_menu_4']) && $storethemesetting['footer_menu_4']): ?>
                                <?php $__currentLoopData = json_decode($storethemesetting['footer_menu_4']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">

                <div class="footer-item clearfix">
                    <?php if(isset($storethemesetting['enable_email_subscriber']) && $storethemesetting['enable_email_subscriber'] == 'on'): ?>
                        <?php if($storethemesetting['enable_email_subscriber'] == 'on'): ?>
                            <h4><?php echo e(!empty($storethemesetting['subscriber_title']) ? $storethemesetting['subscriber_title'] : 'Always on time'); ?>

                            </h4>
                            <div class="Subscribe-box">
                                <p><?php echo e(!empty($storethemesetting['subscriber_sub_title']) ? $storethemesetting['subscriber_sub_title'] : 'Subscription here'); ?>

                                </p>
                                <?php echo e(Form::open(['route' => ['subscriptions.store_email', $store->id], 'method' => 'POST', 'class' => 'form-inline d-flex'])); ?>

                                <?php echo e(Form::email('email', null, ['class' => 'form-control', 'aria-label' => 'Enter your email address', 'placeholder' => __('Enter Your Email Address')])); ?>

                                <button class="btn button-theme" type="submit"><i
                                        class="fa fa-paper-plane"></i></button>
                                <?php echo e(Form::close()); ?>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                        <div class="clearfix"></div>
                        <div class="social-list-2">
                            <ul>
                                <?php if(!empty($storethemesetting['whatsapp'])): ?>
                                    <li>
                                        <a class="bg-whatsapp"
                                            href="https://wa.me/<?php echo e($storethemesetting['whatsapp']); ?>" target="_blank">
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
                        </div>
                    <?php endif; ?>

                </div>



            </div>

        </div>
    </div>

    <div class="copy sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if($storethemesetting['enable_footer'] == 'on'): ?>
                        <p> <?php echo e(\App\Models\Utility::getFooter($storethemesetting['footer_note'], $creator)); ?></p>
                    <?php endif; ?>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#language-selection-modal">
                        <i class="fa fa-language"></i> <?php echo e(\App\Models\Utility::getLangCodes($currantLang)); ?>

                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme23to28/footer-type-1.blade.php ENDPATH**/ ?>