<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Forum')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="pr-2 mb-4">
        <a href="<?php echo e(route('forumzone.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="fas fa-list"></i> <?php echo e(__('List Categories')); ?>

        </a>
        <a href="<?php echo e(route('forumzone.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="fas fa-plus"></i> <?php echo e(__('Create Category')); ?>

        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>
                <?php echo e(__('Create Category')); ?>

            </h5>
        </div>
        <div class="card-body">
            <?php echo e(Form::open(['url' => 'forumzone', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Category'), 'required' => 'required'])); ?>

                    </div>
                </div>
                <div class="form-group col-12 d-flex justify-content-end col-form-label">
                    <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/forum_category/create.blade.php ENDPATH**/ ?>