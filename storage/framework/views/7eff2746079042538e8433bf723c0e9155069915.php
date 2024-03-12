<?php echo e(Form::open(['url' => 'invoice', 'method' => 'post'])); ?>

<div class="row">
    <?php echo e(Form::hidden('product_id', $id)); ?>

    <div class="form-group">
        <?php echo e(Form::label('invoice_no', __('Invoice Number'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('invoice_no', null, ['class' => 'form-control', 'placeholder' => __('Invoice Number'), 'required' => 'required'])); ?>

        
    </div>
    <ul class="nav nav-tabs" role="tablist">
        <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>
        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                    id="<?php echo e($lang); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo e($lang); ?>" type="button"
                    role="tab" aria-controls="home"
                    aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="tab-content">
        <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                id="<?php echo e($lang); ?>" role="tabpanel" aria-labelledby="<?php echo e($lang); ?>-tab">
                <div class="form-group">
                    <?php echo e(Form::label('' . $lang . '_description', __('Description',[],$lang), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::textarea('' . $lang . '_description', null, ['class' => 'form-control', 'placeholder' => __('Invoice Desc 1',[], $lang), 'rows' => '4'])); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <h4><?php echo e(__('Client Information')); ?></h4>
    <hr>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('email', __('Email'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('company', __('Company'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('company', null, ['class' => 'form-control'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('address', __('Address'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('address', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('zip_code', __('Zip Code'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('zip_code', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('city', __('City'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('city', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('country', __('Country'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('country', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('phone_number', __('Phone Number'), ['class' => 'col-form-label'])); ?>

        <span class="text-danger">*</span>
        <?php echo e(Form::text('phone_number', null, ['class' => 'form-control'])); ?>

    </div>



    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Generate')); ?>" class="btn btn-primary ms-2">
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/invoice/create.blade.php ENDPATH**/ ?>