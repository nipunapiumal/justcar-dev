<!-- Client Logo -->
<?php if(isset($storethemesetting['enable_brand_logo']) && $storethemesetting['enable_brand_logo'] == 'on'): ?>
<div class="customar-feedback-area mb-100">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="400ms">
            <div class="col-lg-12">
                <div class="sub-title">
                    <h6><?php echo e(__('Our Trusted Partners')); ?></h6>
                    <div class="dash"></div>
                </div>
                <div class="partner-slider">
                    <div class="marquee_text2">
                        <?php if(!empty($storethemesetting['brand_logo'])): ?>
                            <?php $__currentLoopData = explode(',', $storethemesetting['brand_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($value) && \Storage::exists('uploads/store_logo/' . $value)): ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/') . (!empty($value) ? $value : 'storego-image.png'))); ?>"
                                        alt="Footer logo" class="" style="max-width: 200px;">
                                <?php else: ?>
                                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/brand_logo.png'))); ?>"
                                        alt="Footer logo" class="">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/layout/theme29to34/brand-logo-type-1.blade.php ENDPATH**/ ?>