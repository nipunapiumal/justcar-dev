<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Thread')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-center">
                <a href="#" class="pe-3">
                    <div class="circle">
                        <div class="circle-avatar">
                            <span class="avatar tip" title="<?php echo e(Auth::user()->name); ?>"
                                style="background-color: <?php echo e(Utility::generateHexColor()); ?>;">
                                <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                            </span>
                        </div>
                        <div class="small-circle offline"></div>
                    </div>
                </a>
                <h2 class="mb-0">
                    <?php echo e($thread->title); ?>

                </h2>
            </div>
            <div class="mt-3">

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
                        data-confirm-yes="delete-form-<?php echo e($thread->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="<?php echo e(__('Delete')); ?>">
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
            <hr>
            <div>
                <?php echo $thread->body; ?>

            </div>
            <div class="social-list mt-5 d-flex justify-content-center">
                <ul class="p-0">
                    <li>
                        <a class="bg-whatsapp" href="https://wa.me/https://api.whatsapp.com/" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-facebook" href="https://www.facebook.com/" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-twitter" href="https://twitter.com/" target="_blank">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-github" href="mailto:test@test.com">
                            <i class="far fa-envelope"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-instagram" href="https://www.instagram.com/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a class="bg-youtube" href="https://www.youtube.com/" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="mt-5 replies">
                <?php $__currentLoopData = $sub_threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex align-items-center box">
                        <a href="javascript:void(0)" class="pe-3">
                            <div class="circle">
                                <div class="circle-avatar">
                                    <span class="avatar tip" title="<?php echo e($sub_thread->getCreatorName()); ?>"
                                        style="background-color: <?php echo e(Utility::generateHexColor()); ?>;">
                                        <?php echo e(strtoupper(substr($sub_thread->getCreatorName(), 0, 1))); ?>

                                    </span>
                                </div>
                                <div class="small-circle offline"></div>
                            </div>
                        </a>
                        <div class="w-100 mb-3 mt-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div><span class="text-primary">
                                        <b><?php echo e($sub_thread->getCreatorName()); ?></b>
                                    </span> <?php echo e(__('replied')); ?></div>
                                <div>
                                    <a href="javascript:void(0)">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-clock"></i>
                                            <?php echo e($sub_thread->created_at->diffForHumans()); ?>

                                        </span>
                                    </a>

                                    <?php if(Auth::user()->creatorId() == $sub_thread->created_by || Auth::user()->type == 'super admin'): ?>
                                        <a href="javascript:void(0)" data-size="lg"
                                            data-url="<?php echo e(route('thread_reply.edit', $sub_thread->id)); ?>" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Edit')); ?>" data-bs-placement="top">
                                            <span class="badge bg-primary">
                                                <i class="ti ti-pencil"></i>
                                                <?php echo e(__('Edit')); ?>

                                            </span>
                                        </a>
                                        <a class="bs-pass-para" href="javascript:void(0)"
                                            data-title="<?php echo e(__('Delete Lead')); ?>" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                            data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                            data-confirm-yes="delete-reply-<?php echo e($sub_thread->id); ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="<?php echo e(__('Delete')); ?>">
                                            <span class="badge bg-danger">
                                                <i class="ti ti-trash"></i>
                                                <?php echo e(__('Delete')); ?>

                                            </span>
                                        </a>
                                        <?php echo Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['thread_reply.destroy', $sub_thread->id],
                                            'id' => 'delete-reply-' . $sub_thread->id,
                                        ]); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr class="mt-1">
                            <div>
                                <?php echo $sub_thread->body; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>

        </div>

    </div>

    <div>
        <?php echo e(Form::open(['url' => 'thread_reply', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-1">
                <a href="#" class="pe-3">
                    <div class="circle">
                        <div class="circle-avatar">
                            <span class="avatar tip" title="<?php echo e(Auth::user()->name); ?>"
                                style="background-color: <?php echo e(Utility::generateHexColor()); ?>;">
                                <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                            </span>
                        </div>
                        <div class="small-circle offline"></div>
                    </div>
                </a>
            </div>
            <div class="col-11">
                <div class="form-group">
                    <?php echo e(Form::hidden('thread_id', $thread->id)); ?>

                    <?php echo e(Form::textarea('body', null, ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Body')])); ?>

                </div>
                <div class="form-group">
                    <input type="submit" value="<?php echo e(__('Add Reply')); ?>" class="btn btn-dark w-100">
                </div>
            </div>

        </div>
        <?php echo e(Form::close()); ?>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/thread/index.blade.php ENDPATH**/ ?>