<ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>

    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                id="<?php echo e($lang); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo e($lang); ?>" type="button"
                role="tab" aria-controls="home" aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php echo e(Form::open(['url' => 'custom-page', 'method' => 'post'])); ?>

<div class="row mt-4">
    <div class="form-group col-md-6">
        <div class="custom-control form-switch">
            <input type="checkbox" class="form-check-input" name="enable_page_header" id="enable_page_header">
            <?php echo e(Form::label('enable_page_header', __('Page Header Display'), ['class' => 'form-check-label mb-3'])); ?>

        </div>
    </div>
</div>

<div class="tab-content" id="myTabContent">

    <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
            id="<?php echo e($lang); ?>" role="tabpanel" aria-labelledby="<?php echo e($lang); ?>-tab">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <?php echo e(Form::label('' . $lang . '_name', __('Name'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::text('' . $lang . '_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')])); ?>

                    </div>
                </div>

                <h5><?php echo e(__('Page Meta Tags')); ?></h5>
                <hr>
                <div class="col-12">
                    <div class="form-group">
                        <?php echo e(Form::label('' . $lang . '_meta_title', __('Meta Title'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::text('' . $lang . '_meta_title', null, ['class' => 'form-control', 'placeholder' => __('Meta Title')])); ?>

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?php echo e(Form::label('' . $lang . '_meta_description', __('Meta Description'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::text('' . $lang . '_meta_description', null, ['class' => 'form-control', 'placeholder' => __('Meta Description')])); ?>

                    </div>
                </div>
                <div class="form-group col-md-12">
                    <?php echo e(Form::label('' . $lang . '_contents', __('Content'), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::textarea('' . $lang . '_contents', null, ['class' => 'form-control summernote-simple', 'rows' => 3, 'placeholder' => __('Content')])); ?>

                </div>

            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/pageoption/create.blade.php ENDPATH**/ ?>