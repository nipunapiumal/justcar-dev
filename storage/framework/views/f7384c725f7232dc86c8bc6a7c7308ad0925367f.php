<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Blog')); ?>

<?php $__env->stopSection(); ?>
<?php
    if (!empty(session()->get('lang'))) {
        $currantLang = session()->get('lang');
    } else {
        $currantLang = $store->lang;
    }
    $languages = \App\Models\Utility::languages();
    
?>
<?php $__env->startSection('content'); ?>
    <section class="blog_post_container inner_page_section_spacing">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="for_blog">
                            <div class="thumb">
                                
                                <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blog->blog_cover_image)): ?>
                                    <img alt="Image placeholder" class="img-whp" style="height: 254px;object-fit: cover;"
                                        src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blog->blog_cover_image))); ?>">
                                <?php else: ?>
                                    <img alt="Image placeholder" class="img-whp" style="height: 254px;object-fit: cover;"
                                        src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="details">
                                <div class="wrapper">
                                    <div class="bp_meta">
                                        <ul>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)">
                                                    <span class="flaticon-calendar-1"></span>
                                                    <?php echo e(\App\Models\Utility::dateFormat($blog->created_at)); ?>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="title">
                                        <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>">
                                            <?php echo e($blog->title); ?>

                                        </a>
                                    </h4>
                                    <a href="<?php echo e(route('store.store_blog_view', [$store->slug, $blog->id])); ?>"
                                        class="more_listing"><?php echo e(__('Show More')); ?>

                                        <span class="icon">
                                            <span class="fas fa-plus"></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            var blog = <?php echo e(sizeof($blogs)); ?>;
            if (blog < 1) {
                window.location.href = "<?php echo e(route('store.slug', $store->slug)); ?>";
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nippasmac/Sites/justcar-dev/resources/views/storefront/theme6/store_blog.blade.php ENDPATH**/ ?>