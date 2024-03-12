<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Forum')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('language-bar'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="content-box d-flex">
            <div class="content-box-left d-flex justify-content-center align-items-center">
                <a href="#" class="user user_1" data-id="1">
                    <div class="circle">
                        <div class="circle-avatar">
                            <span class="avatar tip" data-name="admin" title=""
                                data-original-title="admin"
                                style="background-color: rgb(29, 132, 1); color: rgb(255, 255, 255); font-size: 180%; display: flex; border-radius: 45px; height: 45px; width: 45px; align-items: center; justify-content: center; text-align: center;">A</span>
                        </div>
                        <div class="small-circle offline"></div>
                    </div>
                </a>
                
            </div>
            <div class="content-box-middle">
                <h4>
                    <a href="">
                        New APIs and
                        Wordpress plugin added
                    </a>
                    
                </h4>
                <div class="meta-box">

                    <a href="#">
                        <span class="badge bg-primary">
                            <i class="fas fa-clock"></i>
                            21/12/2023 08:00 PM
                        </span>
                    </a>
                    <a href="#">
                        <span class="badge bg-primary">
                            <i class="fa fa-folder"></i>
                            General
                        </span>
                    </a>
                </div>
                <p class="mt-1">
                    New api feature to get the threads/categories list with links. A wordpress plugin has been
                    added in the download file
                </p>
            </div>
            <div class="content-box-right d-flex justify-content-center flex-column">

                <div class="tip text-muted" title="" data-original-title="Views">
                    <i class="fa fa-eye"></i>
                    <span>99 Views</span>
                </div>
                <div class="tip text-muted" title="" data-original-title="Replies">
                    <i class="far fa-comment"></i>
                    <span>3 Replies</span>
                </div>
                <div class="tip text-muted" title="" data-original-title="Created at">
                    <i class="fas fa-clock"></i>
                    <span>8 Hours</span>
                </div>
                <div class="tip text-muted" title="" data-original-title="Last reply time">
                    <i class="fa fa-reply"></i>
                    <span>8 Hours</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/forum/home.blade.php ENDPATH**/ ?>