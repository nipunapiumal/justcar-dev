<?php echo e(Form::model($threadReply, ['route' => ['thread_reply.update', $threadReply->id], 'method' => 'PUT'])); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <div class="form-group">
                <?php echo e(Form::textarea('body', null, ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Body')])); ?>

            </div>
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary ms-2">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/thread_reply/edit.blade.php ENDPATH**/ ?>