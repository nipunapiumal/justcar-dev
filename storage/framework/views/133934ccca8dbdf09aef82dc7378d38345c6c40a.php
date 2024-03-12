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
    <!-- Blog Single Post -->
    <section class="blog_post_container bt1 pt50 pb0 mt70-992">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="for_blog blog_single_post">
                        <div class="details">
                            <div class="wrapper">
                                <h2 class="title"><?php echo e($blogs->title); ?></h2>
                                <div class="bp_meta">
                                    <ul class="mb0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)">
                                                <span
                                                    class="flaticon-calendar-1"></span><?php echo e(\App\Models\Utility::dateFormat($blogs->created_at)); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-single-post-thumb">
                        <?php if(!empty($blogs->blog_cover_image) && \Storage::exists('uploads/store_logo/' . $blogs->blog_cover_image)): ?>
                            <img alt="<?php echo e($blogs->title); ?>"
                                src="<?php echo e(asset(Storage::url('uploads/store_logo/' . $blogs->blog_cover_image))); ?>"
                                class="img-whp" style="max-height: 450px;object-fit: cover;">
                        <?php else: ?>
                            <img alt="<?php echo e($blogs->title); ?>" src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>"
                                class="img-whp" style="max-height: 450px;object-fit: cover;">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Blog Single Post -->
  <section class="blog_post_container pt50 pb70">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <div class="main_blog_post_content">
            <div class="mbp_thumb_post">
              
              <div class="para mb25 mt20"><?php echo $blogs->detail; ?></div>
            </div>
          </div> 
        </div>
      </div>
    </div>
	</section>

    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            var blog = <?php echo e($blogs); ?>;
            if (blog == '') {
                window.location.href = "<?php echo e(route('store.slug', $store->slug)); ?>";
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/theme6/store_blog_view.blade.php ENDPATH**/ ?>