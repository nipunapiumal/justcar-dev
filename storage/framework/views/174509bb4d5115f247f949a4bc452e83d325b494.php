<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery Category')); ?>

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
        <div class="card-body table-border-style">
            <h5></h5>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable ">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">
                                        <?php echo e(__('Category')); ?>

                                    </th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-name="<?php echo e($category->name); ?>">
                                        <td><?php echo e($category->name); ?></td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="<?php echo e(route('forumzone.edit', $category->id)); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Edit')); ?>" data-tooltip="Edit"><i
                                                            class="ti ti-pencil text-white"></i></a>
                                                </div>

                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                        href="#" data-title="<?php echo e(__('Delete Lead')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="delete-form-<?php echo e($category->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete')); ?>">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['forumzone.destroy', $category->id],
                                                        'id' => 'delete-form-' . $category->id,
                                                    ]); ?>

                                                    <?php echo Form::close(); ?>

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

<?php echo $__env->make('layouts.forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/thread_category/index.blade.php ENDPATH**/ ?>