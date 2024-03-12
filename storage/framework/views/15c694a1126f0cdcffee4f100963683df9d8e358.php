<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Thread')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('language-bar'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>
                <?php echo e(__('Post Thread')); ?>

            </h5>
        </div>
        <div class="card-body">
            <?php echo e(Form::open(['url' => 'forum', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <?php echo e(Form::label('title', __('Title'), ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Title'), 'required' => 'required'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('description', null, ['class' => 'form-control', 'placeholder' => __('Enter Description'), 'required' => 'required'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('category_id', __('Category'), ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::select('category_id', $categories, null, [
                            'class' => 'form-control',
                            'data-toggle' => 'select',
                        ])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('body', __('Body'), ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::textarea('body', null, ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Body')])); ?>

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

<?php echo $__env->make('layouts.forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/thread/create.blade.php ENDPATH**/ ?>