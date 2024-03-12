<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Email Templates')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Email Templates')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Email Templates')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('On-Off Email Template')): ?>
        $(document).on("click", ".email-template-checkbox", function () {
            var chbox = $(this);
            $.ajax({
                url: chbox.attr('data-url'),
                data: {_token: $('meta[name="csrf-token"]').attr('content'), status: chbox.val()},
                type: 'PUT',
                success: function (response) {
                    if (response.is_success) {
                        show_toastr('Success', response.success, 'success');
                        if (chbox.val() == 1) {
                            $('#' + chbox.attr('id')).val(0);
                        } else {
                            $('#' + chbox.attr('id')).val(1);
                        }
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (response) {
                    response = response.responseJSON;
                    if (response.is_success) {
                        show_toastr('Error', response.error, 'error');
                    } else {
                        show_toastr('Error', response, 'error');
                    }
                }
            })
        });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-btn'); ?>
    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table mb-0 dataTable">
                        <thead>
                            <tr>
                                <th width="90%"> <?php echo e(__('Name')); ?></th>
                                <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <th> <?php echo e(__('Action')); ?></th>
                                <?php elseif(\Auth::user()->type == 'Owner'): ?>
                                    <th> <?php echo e(__('On/Off')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $EmailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EmailTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($EmailTemplate->name); ?></td>
                                    <td class="Action">
                                        <span>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="<?php echo e(route('manage.email.language',[$EmailTemplate->id,\Auth::user()->lang])); ?>"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                    data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo e(__('View')); ?>"><i
                                                        class="ti ti-eye text-white"></i></a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/email_templates/index.blade.php ENDPATH**/ ?>