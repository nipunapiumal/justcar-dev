<?php echo e(Form::model($advertisement, ['route' => ['advertisements.update', $advertisement->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="device" class="col-form-label"><?php echo e(__('Device')); ?></label>
            <select name="device" class="form-control" id="device" required>
                <option value="1" <?php echo e($advertisement->device == 1 ? 'selected' : ''); ?>>
                    <?php echo e(__('Desktop')); ?></option>
                <option value="2" <?php echo e($advertisement->device == 2 ? 'selected' : ''); ?>>
                    <?php echo e(__('Mobile')); ?></option>
            </select>
            <?php $__errorArgs = ['device'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="advertisement_type" class="col-form-label"><?php echo e(__('Advertisement Type')); ?></label>
            <select name="advertisement_type" class="form-control" id="advertisement_type" required>
                <option value=""><?php echo e(__('Advertisement Type')); ?></option>
                <option value="1" <?php echo e($advertisement->advertisement_type == 1 ? 'selected' : ''); ?>>
                    <?php echo e(__('Banner Image')); ?></option>
                <option value="2" <?php echo e($advertisement->advertisement_type == 2 ? 'selected' : ''); ?>>
                    <?php echo e(__('Google Ad code')); ?></option>
                <option value="3" <?php echo e($advertisement->advertisement_type == 3 ? 'selected' : ''); ?>>
                    <?php echo e(__('Interstitial Ad')); ?></option>
            </select>
            <?php $__errorArgs = ['advertisement_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div id="info-standard" style="<?php echo e($advertisement->advertisement_type == 1 ? '' : 'display:none'); ?>">
            <div class="form-group">
                <label for="info" class="col-form-label"><?php echo e(__('Banner Image')); ?></label>
                <input type="file" name="info" id="info" class="form-control custom-input-file">
                <?php $__errorArgs = ['info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-name" role="alert">
                        <strong class="text-danger"><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('url', __('Url'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::text('url', null, ['class' => 'form-control'])); ?>

                <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-name" role="alert">
                        <strong class="text-danger"><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-group" id="info-google"
            style="<?php echo e($advertisement->advertisement_type == 2 ? '' : 'display:none'); ?>">
            <?php echo e(Form::label('info', __('Google Ad code'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('info', $advertisement->advertisement_type == 2 ? $advertisement->info : '', ['class' => 'form-control', 'rows' => '4'])); ?>

            <?php $__errorArgs = ['info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div id="info-interstitial" style="<?php echo e($advertisement->advertisement_type == 3 ? '' : 'display:none'); ?>">
            <div class="form-group">
                <?php echo e(Form::label('url', __('Url'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::text('url', $advertisement->advertisement_type == 3 ? $advertisement->info : '', ['class' => 'form-control'])); ?>

            </div>
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary ms-2">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/advertisement/edit.blade.php ENDPATH**/ ?>