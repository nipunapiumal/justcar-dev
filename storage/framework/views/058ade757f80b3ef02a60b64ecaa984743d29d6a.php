<!-- Products categories-->
<?php if(isset($storethemesetting['enable_categories']) &&
        $storethemesetting['enable_categories'] == 'on' &&
        !empty($pro_categories)): ?>
    <?php if($storethemesetting['enable_categories'] == 'on'): ?>
        <section class="category-area category-1 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title title-inline mb-50" data-aos="fade-up">
                            <h2 class="title mb-0">
                                <?php echo e(!empty($storethemesetting['categories']) ? $storethemesetting['categories'] : 'Categories'); ?>

                            </h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product_count[$key] > 0): ?>
                                    <div class="col-lg-3 col-sm-6 mb-30" data-aos="fade-up">
                                        <a href="car-grid.html">
                                            <div class="category-item">
                                                <div class="d-flex flex-wrep justify-content-between mb-10">
                                                    <h4 class="category-title mb-10 text-truncate" data-tooltip="tooltip" data-bs-placement="top" title="<?php echo e($pro_categorie->name); ?>">
                                                        <?php echo e($pro_categorie->name); ?>

                                                    </h4>
                                                    <span class="category-qty h4 mb-10">(<?php echo e(!empty($product_count[$key]) ? $product_count[$key] : '0'); ?>)</span>
                                                </div>
                                                <div class="category-img">
                                                    <?php if(!empty($pro_categorie->categorie_img) && \Storage::exists('uploads/product_image/' . $pro_categorie->categorie_img)): ?>
                                                        <img alt="Image placeholder"
                                                            class="lazyload blur-up d-block w-100 img-height-250"
                                                            src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                            data-src="<?php echo e(asset(Storage::url('uploads/product_image/' . $pro_categorie->categorie_img))); ?>">
                                                    <?php else: ?>
                                                        <img alt="Image placeholder"
                                                            class="lazyload blur-up d-block w-100 img-height-250"
                                                            src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>"
                                                            data-src="<?php echo e(asset(Storage::url('uploads/product_image/default.jpg'))); ?>">
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme35to37/category-type-1.blade.php ENDPATH**/ ?>