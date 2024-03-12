<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Thread')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('language-bar'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="card-body">
                <div class="content-box d-flex">
                    <div class="content-box-left d-flex justify-content-center align-items-center">
                        <a href="#" class="user user_1" data-id="1">
                            <div class="circle">
                                <div class="circle-avatar">
                                    <span class="avatar tip" title="<?php echo e($thread->getCreatorName()); ?>"
                                        style="background-color: <?php echo e(Utility::generateHexColor()); ?>;">
                                        <?php echo e(strtoupper(substr($thread->getCreatorName(), 0, 1))); ?>

                                    </span>
                                </div>
                                <div class="small-circle offline"></div>
                            </div>
                        </a>

                    </div>
                    <div class="content-box-middle">
                        <h4>
                            <a href="<?php echo e(route('forum.show', [$thread->id])); ?>">
                                <?php echo e($thread->title); ?>

                            </a>
                        </h4>
                        <div class="meta-box">

                            <a href="javascript:void(0)">
                                <span class="badge bg-primary">
                                    <i class="fas fa-clock"></i>
                                    <?php echo e(\App\Models\Utility::dateFormat($thread->created_at)); ?>

                                </span>
                            </a>
                            <a href="javascript:void(0)">
                                <span class="badge bg-primary">
                                    <i class="fa fa-folder"></i>
                                    <?php echo e($thread->getCategory()); ?>

                                </span>
                            </a>
                            <?php if(Auth::user()->creatorId() == $thread->created_by || Auth::user()->type == 'super admin'): ?>
                                <a href="<?php echo e(route('forum.edit', $thread->id)); ?>">
                                    <span class="badge bg-info">
                                        <i class="ti ti-pencil"></i>
                                        <?php echo e(__('Edit')); ?>

                                    </span>
                                </a>
                                <a class="bs-pass-para" href="javascript:void(0)" data-title="<?php echo e(__('Delete Lead')); ?>"
                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                    data-confirm-yes="delete-form-<?php echo e($thread->id); ?>" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                    <span class="badge bg-danger">
                                        <i class="ti ti-trash"></i>
                                        <?php echo e(__('Delete')); ?>

                                    </span>
                                </a>
                                <?php echo Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['forum.destroy', $thread->id],
                                    'id' => 'delete-form-' . $thread->id,
                                ]); ?>

                                <?php echo Form::close(); ?>

                            <?php endif; ?>


                        </div>
                        <p class="mt-1">
                            <?php echo e($thread->description); ?>

                        </p>
                    </div>
                    <div class="content-box-right d-flex justify-content-center flex-column">

                        <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                            title="<?php echo e(__('Views')); ?>">
                            <i class="fa fa-eye"></i>
                            <span>0 <?php echo e(__('Views')); ?></span>
                        </div>
                        <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                            title="<?php echo e(__('Replies')); ?>">
                            <i class="far fa-comment"></i>
                            <span><?php echo e($thread->getReplyCount()); ?> <?php echo e(__('Replies')); ?></span>
                        </div>
                        <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                            title="<?php echo e(__('Created at')); ?>">
                            <i class="fas fa-clock"></i>
                            <span> <?php echo e($thread->created_at->diffForHumans()); ?></span>
                        </div>
                        <?php if($thread->getLastReplyTime()): ?>
                            <div class="tip text-muted" data-toggle="tooltip" data-bs-placement="top"
                                title="<?php echo e(__('Last reply time')); ?>">
                                <i class="fa fa-reply"></i>
                                <span><?php echo e($thread->getLastReplyTime()->diffForHumans()); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(count($threads) == 0): ?>
        <div class="alert alert-dark" role="alert">
            <?php echo e(__('No data found')); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/thread/home.blade.php ENDPATH**/ ?>